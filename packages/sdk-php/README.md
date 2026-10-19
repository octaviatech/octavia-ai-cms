# octavia/cms

Typed PHP client for the **Octavia AI CMS API** — multilingual articles, taxonomy, forms and submissions, AI automation, media, SEO, content planning and analytics — behind one client and one response shape.

- Generated from the OpenAPI spec, so it covers **every** public operation (229 of them).
- **Zero Composer dependencies.** Requires only PHP 8.1+ and `ext-curl`.
- Hydrates `data` into generated model classes, so `$envelope->data` is typed.
- Includes **real streaming** (SSE) with `yield`.

| | |
| --- | --- |
| Product | https://octaviatech.app/products/ai-cms |
| Website | https://octaviatech.app |
| API reference | https://developers.octaviatech.app |
| Examples | https://github.com/octaviatech/octavia-ai-cms/tree/main/examples |
| License | ISC |

---

## Install

```bash
composer require octavia/cms
```

Then autoload as usual:

```php
require __DIR__ . '/vendor/autoload.php';
```

---

## Quick start

```php
use Octavia\CmsSDK\CMS;

$cms = CMS::init('your-api-key');

$res = $cms->article->create([
    'mainTitle' => ['en' => 'Hello'],
    'body'      => ['en' => 'Content'],
    'category'  => ['CATEGORY_ID'],
    'author'    => 'AUTHOR_ID',
]);

if (!$res->success) {
    throw new RuntimeException($res->message);
}

print_r($res->data);
```

---

## Authentication

The API key is the only credential, and it is required. There is no OAuth and no header hook — the key is sent as the `x-api-key` header on every request, and that is the entire authentication story.

The base URL is fixed to `https://api.octaviatech.app/cms`, so there is no `baseUrl` option. Your tenant and the service status are resolved by the gateway from your key; you never send them.

Get a key:

1. Sign up at https://octaviatech.app
2. Dashboard → your service → **API Keys** → Create key

> Keep the key server-side. A key in a browser bundle or a public repo is a public key — proxy those requests through your backend instead.

---

## Initialize

```php
$cms = CMS::init('your-api-key', [
    'timeoutMs'   => 30_000,
    'throwOnError' => false,
]);
```

| Option | Type | Default | Notes |
| --- | --- | --- | --- |
| `timeoutMs` | `int` | `0` (no timeout) | Per-request timeout in milliseconds. Not applied to streaming. |
| `throwOnError` | `bool` | `false` | `false` returns a failed `Envelope`; `true` throws. |

`CMS::init` returns a facade. `$cms->raw` is the underlying `Client` if you need an endpoint the generated resources do not cover.

---

## Response shape

Every method returns the same envelope, so there is one error path to learn:

```php
final class Envelope
{
    public bool $success;
    public int $statusCode;
    public string $message;
    public mixed $data; // hydrated into a generated model when there is one
}
```

```php
$res = $cms->article->getAll(['query' => ['page' => 1, 'limit' => 10]]);

if (!$res->success) {
    error_log($res->statusCode . ': ' . $res->message);
} else {
    print_r($res->data);
}
```

`data` is hydrated into the generated model class for the endpoint, so `$res->data->totalPages` type-checks and autocompletes.

### Errors

With the default `throwOnError: false` you get an `Envelope` with `success === false`. Set `throwOnError: true` and a failed call throws `Octavia\CmsSDK\ApiError` instead:

```php
use Octavia\CmsSDK\ApiError;

$cms = CMS::init('your-api-key', ['throwOnError' => true]);

try {
    $cms->article->getById('6810f2c3a1b2c3d4e5f60718');
} catch (ApiError $e) {
    error_log($e->getStatusCode() . ': ' . $e->getMessage());
}
```

| Status | Meaning | Retry? |
| --- | --- | --- |
| `400` | Invalid request or missing field | No — fix the request |
| `401` | Missing or invalid API key | No |
| `403` | Key valid, role not permitted | No |
| `404` | Record not found | No |
| `406` | Validation failed | No — the message lists every offending field |
| `409` | The proposal is stale; the entity changed since it was made | No — re-run the action |
| `426` | Plan quota exhausted | No — upgrade, wait for the period to roll over, or free up quota |
| `429` | Transient rate limit | Yes, after the interval in `retry-after` |

---

## Query parameters

Filters go under `query`, never as loose top-level keys:

```php
$res = $cms->article->getAll([
    'query' => ['page' => 1, 'limit' => 10, 'category' => 'CATEGORY_ID'],
]);

$hits = $cms->article->search(['query' => ['keyword' => 'typescript', 'limit' => 5]]);
```

---

## Resources

| Property | Operations | Covers |
| --- | --- | --- |
| `$cms->article` | 35 | Articles, comments, reactions, engagement settings, revisions, readiness, translation state, per-locale SEO |
| `$cms->ai` | 47 | Summarize, translate, SEO, repurpose, autofill, proposals, credits, settings, event stream, social publishing |
| `$cms->aiConversation` | 6 | Multi-turn article drafting |
| `$cms->form` | 12 | Forms and captcha configuration |
| `$cms->formSubmission` | 20 | Submissions, relations, AI analysis, replies, digest |
| `$cms->report` | 28 | Statistics, charts, needs-attention, weekly digest, SEO health, AI acceptance |
| `$cms->category` | 6 | Categories |
| `$cms->subcategory` | 7 | Subcategories |
| `$cms->author` | 6 | Authors |
| `$cms->tag` | 3 | Tags |
| `$cms->language` | 5 | Languages |
| `$cms->media` | 7 | Media library, alt text, usage |
| `$cms->seo` | 8 | Site audit, cannibalization, refresh, redirects, hreflang, coverage |
| `$cms->taxonomy` | 7 | Taxonomy audit, category SEO, tag merge, author bio |
| `$cms->contentPlan` | 15 | Editorial calendar, campaigns, cadence, AI planning |
| `$cms->campaign` | 4 | Campaigns |
| `$cms->raw` | — | The unwrapped client |

---

## Streaming (Server-Sent Events)

Nine endpoints stream their results. Each has two methods: the ordinary call returning an `Envelope`, and a `…Live()` method returning a `\Generator` of `SseEvent` objects.

| Method | Streams |
| --- | --- |
| `$cms->ai->summarizeLive($body)` | `POST /ai/summarize/stream` |
| `$cms->ai->summarizeArticleLive($body)` | `POST /ai/summarizeArticle/stream` |
| `$cms->ai->seoOptimizeLive($body)` | `POST /ai/seoOptimize/stream` |
| `$cms->ai->translateLive($body)` | `POST /ai/translate/stream` |
| `$cms->ai->translateArticleLive($body)` | `POST /ai/translateArticle/stream` |
| `$cms->ai->optimizeArticleLive($body)` | `POST /ai/optimizeArticle/stream` |
| `$cms->ai->repurposeLive($body)` | `POST /ai/repurpose/stream` |
| `$cms->aiConversation->conversationGenerateLive($body)` | `POST /ai/conversation/generate/stream` |
| `$cms->ai->eventsLive()` | `GET /ai/events/stream` |

> The naming: an endpoint whose path already ends in `/stream` produces a plain `…Stream()` method, and its streaming companion is `…Live()` rather than `summarizeStreamStream`.

Each yields `SseEvent` objects with `event`, `data` (decoded array when the payload is JSON, raw string otherwise), and optional `id` / `retry`. Frames split across network chunks are reassembled, so a partial chunk never yields a half-frame.

```php
use Octavia\CmsSDK\SseEvent;

foreach ($cms->ai->summarizeLive(['text' => 'A long article body…']) as $frame) {
    if ($frame->event === 'content_chunk') {
        echo $frame->data['text'] ?? '';
    } elseif ($frame->event === 'complete') {
        echo PHP_EOL . "done" . PHP_EOL;
    } elseif ($frame->event === 'error') {
        error_log(print_r($frame->data, true));
    }
}
```

The generator ends when the server closes the stream. `break`ing out of the loop closes the cURL handle. `timeoutMs` is deliberately **not** applied to streaming — a generation can legitimately run for minutes.

---

## Common tasks

### Paginate

```php
$first = $cms->article->getAll(['query' => ['page' => 1, 'limit' => 20]]);

// $first->data->totalPages, ->total, ->page, ->limit
```

### Create multilingual content

`category` and `subCategory` take **arrays of IDs**, even when you have one. Text fields are maps from language code to string.

```php
$cms->article->create([
    'mainTitle'   => ['en' => 'Hello', 'es' => 'Hola'],
    'body'        => ['en' => 'Content', 'es' => 'Contenido'],
    'category'    => ['6810f2c3a1b2c3d4e5f60718'],
    'subCategory' => ['6810f2c3a1b2c3d4e5f60719'],
    'author'      => '6810f2c3a1b2c3d4e5f60720',
]);
```

Only languages that have been registered through `$cms->language->create()` can be written. An unregistered key is rejected with `406` listing the valid codes.

### Per-locale SEO

SEO metadata is read and written on its own endpoint, so you can change a meta title without resending the article. Pass `locale` to touch one language; omit it to read or replace the whole map.

```php
// Read every locale.
$cms->article->articleIdSeoGET('ARTICLE_ID');

// Write one locale only — other locales are left alone.
$cms->article->articleIdSeoPUT('ARTICLE_ID', [
    'metaTitle'       => 'A meta title under 60 characters',
    'metaDescription' => 'A description under 155 characters',
    'focusKeyword'    => 'typescript sdk',
    'robots'          => 'index,follow',
], ['query' => ['locale' => 'en']]);
```

### AI proposals

AI never writes to your content directly. It files a **proposal**; you review it and accept, reject, or undo. This is the loop every AI action follows.

```php
// 1. See what is waiting.
$pending = $cms->ai->proposalsCount(['query' => ['status' => 'pending']]);

// 2. Read them.
$list = $cms->ai->proposalsGET(['query' => ['status' => 'pending', 'limit' => 20]]);

// 3. Accept one — this writes through the normal domain service, so
//    validation, permissions and revisions all apply.
$cms->ai->proposalsIdAccept('PROPOSAL_ID');

// 4. Changed your mind: the previous value is restored.
$cms->ai->proposalsIdUndo('PROPOSAL_ID');
```

Accepting a proposal whose entity changed in the meantime returns `409` rather than overwriting the newer content.

```php
// Bulk accept: the response carries a per-item result.
$bulk = $cms->ai->proposalsBulkAccept(['ids' => ['A', 'B', 'C']]);
// $bulk->data->items: [['id' => 'A', 'status' => 'accepted'], ...]
```

### Summarize text

```php
$res = $cms->ai->summarize(['query' => ['text' => 'Long article body…']]);
print_r($res->data);
```

Or streamed, so the answer appears as it is written:

```php
foreach ($cms->ai->summarizeLive(['text' => 'Long article body…']) as $frame) {
    if ($frame->event === 'content_chunk') {
        echo $frame->data['text'] ?? '';
    }
}
```

### Check your AI balance before a bulk run

```php
$credits = $cms->ai->credits();
// $credits->data->used, ->limit, ->remaining

$estimate = $cms->ai->estimate(['action' => 'article.autofillMetadata']);
// $estimate->data->low, ->high — a range, not a fixed price
```

A plan that runs out of quota returns `426` on every AI endpoint, including streaming ones.

### Use the low-level client

```php
$raw = $cms->raw->request('GET', '/articles/getAll', ['query' => ['page' => 1]]);
```

The low-level client returns the raw envelope from the API without the facade. Use it for endpoints the generated resources do not cover. It also exposes `$client->streamSSE($method, $path, $options)` for hand-written streaming calls.

---

## Documentation

- API reference: https://developers.octaviatech.app
- Product: https://octaviatech.app/products/ai-cms
- Website: https://octaviatech.app
- Examples (Laravel and plain PHP among others): https://github.com/octaviatech/octavia-ai-cms/tree/main/examples

---

## License

ISC