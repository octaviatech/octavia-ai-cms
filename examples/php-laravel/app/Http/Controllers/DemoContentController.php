<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Octavia\CmsSDK\CMS;

class DemoContentController extends Controller
{
    private function client(): CMS
    {
        return CMS::init((string) config('services.octavia.api_key'), [
            'timeoutMs' => 10000,
            'throwOnError' => false,
        ]);
    }

    private function mapArticle(array $a): array
    {
        return [
            'id' => $a['id'] ?? ($a['_id'] ?? ''),
            'title' => $a['mainTitle']['en'] ?? ($a['mainTitle']['fa'] ?? ''),
            'body' => $a['body']['en'] ?? ($a['body']['fa'] ?? ''),
            'locale' => isset($a['mainTitle']['fa']) ? 'fa' : 'en',
            'status' => !empty($a['isPublished']) ? 'published' : 'draft',
            'createdAt' => $a['createdAt'] ?? '',
        ];
    }

    public function index()
    {
        $res = $this->client()->article->getAll([
            'page' => 1,
            'limit' => 20,
            'sortOrder' => 'desc',
        ]);
        if (!$res['ok']) {
            return response()->json(['error' => $res['error']['message'] ?? 'Request failed'], 400);
        }
        $items = $res['data']['items'] ?? [];
        return response()->json(array_map(fn ($a) => $this->mapArticle((array) $a), $items));
    }

    public function store(Request $request)
    {
        $locale = (string) $request->input('locale', 'en');
        $lang = str_starts_with($locale, 'fa') ? 'fa' : 'en';
        $res = $this->client()->article->create([
            'mainTitle' => [$lang => (string) $request->input('title', 'Untitled')],
            'body' => [$lang => (string) $request->input('body', '')],
            'category' => (string) config('services.octavia.category_id', ''),
            'author' => (string) config('services.octavia.author_id', ''),
        ]);
        if (!$res['ok']) {
            return response()->json(['error' => $res['error']['message'] ?? 'Request failed'], 400);
        }
        return response()->json($this->mapArticle((array) ($res['data'] ?? [])));
    }

    public function publish(string $id)
    {
        $res = $this->client()->article->archive(['id' => $id]);
        if (!$res['ok']) {
            return response()->json(['error' => $res['error']['message'] ?? 'Request failed'], 400);
        }
        return response()->json($res['data'] ?? []);
    }

    public function forms()
    {
        $res = $this->client()->form->getAll([
            'page' => 1,
            'limit' => 20,
        ]);
        if (!$res['ok']) {
            return response()->json(['error' => $res['error']['message'] ?? 'Request failed'], 400);
        }
        $items = $res['data']['items'] ?? [];
        $mapped = array_map(function ($f) {
            return [
                'id' => $f['id'] ?? ($f['_id'] ?? ''),
                'title' => $f['title']['en'] ?? ($f['title']['fa'] ?? ''),
                'slug' => $f['slug'] ?? '',
            ];
        }, $items);
        return response()->json($mapped);
    }

    public function submitForm(Request $request, string $id)
    {
        $res = $this->client()->formSubmission->idSubmit($id, [
            'language' => (string) $request->input('language', 'en'),
            'values' => $request->input('values', $request->except(['language'])),
        ]);
        if (!$res['ok']) {
            return response()->json(['error' => $res['error']['message'] ?? 'Request failed'], 400);
        }
        return response()->json($res['data'] ?? []);
    }

    public function statistics()
    {
        $res = $this->client()->report->getStatistics();
        if (!$res['ok']) {
            return response()->json(['error' => $res['error']['message'] ?? 'Request failed'], 400);
        }
        return response()->json($res['data'] ?? []);
    }

    public function summarize(Request $request)
    {
        $res = $this->client()->ai->summarize([
            'text' => (string) $request->input('text', ''),
            'maxWords' => 80,
        ]);
        if (!$res['ok']) {
            return response()->json(['error' => $res['error']['message'] ?? 'Request failed'], 400);
        }
        return response()->json($res['data'] ?? []);
    }
}
