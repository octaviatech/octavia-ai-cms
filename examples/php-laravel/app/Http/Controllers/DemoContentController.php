<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Octavia\CmsSDK\CMS;
use Octavia\CmsSDK\Envelope;
use Octavia\CmsSDK\Types\Article;
use Octavia\CmsSDK\Types\ArticleListItem;
use Octavia\CmsSDK\Types\Form;
use RuntimeException;

/**
 * Server-side proxy to the Octavia AI CMS.
 *
 * Every call below goes through the official PHP SDK (`octavia/cms`). The
 * browser never talks to the CMS and never sees the API key: it calls these
 * routes, and this controller holds the credential.
 *
 * Auth is one header, `x-api-key`, and the SDK sends nothing else. The gateway
 * resolves the tenant and the service status from that key, so there is no
 * tenant id, no project id and no Authorization header to configure.
 */
class DemoContentController extends Controller
{
    private function client(): CMS
    {
        $apiKey = (string) config('services.octavia.api_key');

        if ($apiKey === '') {
            throw new RuntimeException('OCTAVIA_API_KEY is not set. Add it to .env and run `php artisan config:clear`.');
        }

        return CMS::init($apiKey, [
            'timeoutMs' => 10000,
            'throwOnError' => false,
        ]);
    }

    /**
     * The SDK answers with an `Envelope`: `success`, `statusCode`, `message`,
     * `data`. It is not an array and it has no `error` member, so read the
     * public properties. Turning a failed call into a Laravel JSON error keeps
     * the upstream status code where it is a real HTTP status.
     */
    private function fail(Envelope $res): JsonResponse
    {
        $status = $res->statusCode >= 400 && $res->statusCode < 600 ? $res->statusCode : 502;

        return response()->json(['error' => $res->message], $status);
    }

    /**
     * The API returns a multilingual map. Read the first locale that is really
     * present instead of assuming `en` exists, then fall back to whatever the
     * server sent.
     *
     * @param  \Octavia\CmsSDK\Types\MultilingualString|\Octavia\CmsSDK\Types\MultilingualStringOrNull|array<string, mixed>|string|null  $map
     * @return array{0: string, 1: string} [text, locale]
     */
    private function pickText($map): array
    {
        if (is_string($map)) {
            return [$map, 'en'];
        }

        if ($map instanceof \Octavia\CmsSDK\Types\MultilingualString) {
            $entries = $map->toArray();
        } elseif (is_array($map)) {
            $entries = $map;
        } else {
            // `MultilingualStringOrNull` is an open map in the spec, so it
            // hydrates to a bare object with no typed accessors. Read it
            // through its own public properties.
            $entries = is_object($map) ? get_object_vars($map) : [];
        }

        foreach (['en', 'fa'] as $locale) {
            $value = $entries[$locale] ?? null;
            if (is_string($value) && $value !== '') {
                return [$value, $locale];
            }
        }

        foreach ($entries as $value) {
            if (is_string($value) && $value !== '') {
                return [$value, 'en'];
            }
        }

        return ['', 'en'];
    }

    /** `en-US` -> `en`; the API keys its maps by bare language code. */
    private function languageCode(?string $locale): string
    {
        $code = strtolower(trim((string) $locale));
        $code = preg_replace('/[^a-z]/', '', $code) ?? '';

        return $code === '' ? 'en' : substr($code, 0, 2);
    }

    /**
     * Read a property only when the model actually declares it. `getAll` rows
     * and full articles are different types: a list row has no `content`, and
     * touching a missing property on a generated model is a PHP warning.
     */
    private function field(object $model, string $name): mixed
    {
        return property_exists($model, $name) ? $model->{$name} : null;
    }

    /**
     * `getAll` rows carry the title but not the body, and `create`/`update`
     * answer with the full article. Both are shaped the same way here.
     *
     * A list row has no `content`, so its `body` stays empty until the article
     * is fetched by id. The row's `summary` is the natural fallback, but the
     * SDK models `MultilingualStringOrNull` as an open map, and its generated
     * class declares no properties, so that value is dropped during
     * hydration and cannot be read back here.
     */
    private function mapArticle(Article|ArticleListItem|null $article): array
    {
        if ($article === null) {
            return [];
        }

        [$title, $locale] = $this->pickText($this->field($article, 'mainTitle'));
        [$content] = $this->pickText($this->field($article, 'content'));
        [$summary] = $this->pickText($this->field($article, 'summary'));

        return [
            'id' => (string) ($this->field($article, '_id') ?? ''),
            'title' => $title,
            'body' => $content !== '' ? $content : $summary,
            'locale' => $locale,
            'status' => $this->field($article, 'isPublished') ? 'published' : 'draft',
            'createdAt' => $this->field($article, 'createdAt') ?: '',
        ];
    }

    private function mapForm(?Form $form): array
    {
        if ($form === null) {
            return [];
        }

        [$title] = $this->pickText($form->title);

        return [
            'id' => (string) $form->_id,
            'title' => $title,
            'slug' => (string) $form->slug,
            'isActive' => (bool) $form->isActive,
            'sections' => count($form->sections ?? []),
        ];
    }

    /** GET /demo/content — list articles, newest first. */
    public function index(): JsonResponse
    {
        $res = $this->client()->article->getAll([
            'page' => 1,
            'limit' => 20,
            'sortOrder' => 'desc',
        ]);

        if (!$res->success) {
            return $this->fail($res);
        }

        // List rows are keyed by resource name, not `items`.
        $rows = $res->data?->articleListItem ?? [];
        $articles = array_map(fn ($row) => $this->mapArticle($row), $rows);

        return response()->json([
            'items' => $articles,
            'pagination' => $res->data?->pagination,
        ]);
    }

    /** GET /demo/content/{id} — one article with its full body. */
    public function show(string $id): JsonResponse
    {
        $res = $this->client()->article->getById($id);

        if (!$res->success) {
            return $this->fail($res);
        }

        return response()->json($this->mapArticle($res->data?->article));
    }

    /** POST /demo/content — create a draft. */
    public function store(Request $request): JsonResponse
    {
        $language = $this->languageCode($request->input('locale', 'en'));

        $res = $this->client()->article->create([
            'mainTitle' => [$language => (string) $request->input('title', 'Untitled')],
            // The field is `content`. There is no `body` on an article, and the
            // create schema rejects unknown fields.
            'content' => [$language => (string) $request->input('body', '')],
            // `category` is an array of ids even when there is only one.
            'category' => array_values(array_filter([
                (string) config('services.octavia.category_id', ''),
            ])),
            'author' => (string) config('services.octavia.author_id', ''),
            'isPublished' => false,
        ]);

        if (!$res->success) {
            return $this->fail($res);
        }

        return response()->json($this->mapArticle($res->data?->article), 201);
    }

    /**
     * POST /demo/content/{id}/publish
     *
     * There is no publish endpoint. `/articles/archive` is a soft-delete and
     * must not be used here. Publishing is a field update.
     */
    public function publish(string $id): JsonResponse
    {
        $res = $this->client()->article->update([
            'id' => $id,
            'isPublished' => true,
        ]);

        if (!$res->success) {
            return $this->fail($res);
        }

        return response()->json($this->mapArticle($res->data?->article));
    }

    /**
     * GET /demo/forms/{id} — one form, with its fields.
     *
     * This is a by-id route on purpose. `form.getAll()` answers with
     * `formListItem` rows that only carry a submissions count: no id, no
     * title, no slug, so a form picker built on the list cannot work. The
     * working examples fetch the form by id instead and take the id from the
     * UI.
     */
    public function form(string $id): JsonResponse
    {
        $res = $this->client()->form->getById($id);

        if (!$res->success) {
            return $this->fail($res);
        }

        return response()->json($this->mapForm($res->data?->form));
    }

    /** POST /demo/forms/{id}/submit */
    public function submitForm(Request $request, string $id): JsonResponse
    {
        $language = (string) $request->input('language', 'en');
        $values = $request->input('values', []);

        $res = $this->client()->formSubmission->idSubmit($id, [
            'language' => $language,
            'values' => is_array($values) ? $values : [],
        ]);

        if (!$res->success) {
            return $this->fail($res);
        }

        return response()->json([
            'ok' => true,
            // `FormSubmissionEnriched` hydrates to a bare object with no typed
            // accessors, so the saved submission's id is not readable here.
            // The UI only needs to know the submit succeeded.
        ]);
    }

    /** GET /demo/reports/statistics */
    public function statistics(): JsonResponse
    {
        $res = $this->client()->report->getStatistics();

        if (!$res->success) {
            return $this->fail($res);
        }

        return response()->json($res->data?->toArray() ?? []);
    }

    /** POST /demo/ai/summarize */
    public function summarize(Request $request): JsonResponse
    {
        $res = $this->client()->ai->summarize([
            'text' => (string) $request->input('text', ''),
            'maxWords' => 80,
        ]);

        if (!$res->success) {
            return $this->fail($res);
        }

        return response()->json([
            'summary' => (string) ($res->data?->summary ?? ''),
            'tokens' => $res->data?->tokens?->toArray(),
        ]);
    }
}
