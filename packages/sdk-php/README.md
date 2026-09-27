# octavia/cms

Typed PHP SDK for the **Octavia AI CMS API** — articles, categories, tags, forms, submissions, AI automation, social publishing and analytics, behind one client and one response shape.

- Generated from the OpenAPI spec, so it covers **every** public operation.
- **Zero third-party dependencies.** Ships its own typed value objects.
- PHP 8.1+, PSR-4 autoloading.

---

## Install

```bash
composer require octavia/cms
```

---

## Quick start

```php
<?php

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

The API key is the only credential, and it is required. There is no OAuth, no refresh token and no header option — the key is sent as the `x-api-key` header on every request, and that is the entire authentication story.

The base URL is fixed to `https://api.octaviatech.app/cms` (exposed as `CMS::BASE_URL`), so there is nothing to configure. Your tenant and the service status are resolved by the gateway from your key; you never send them.

Get a key:

1. Sign up at [octaviatech.app](https://octaviatech.app)
2. Dashboard → your service → **API Keys** → Create key

> Keep the key server-side. Read it from the environment, never from source.

```php
$cms = CMS::init(getenv('OCTAVIA_API_KEY'));
```

---

## Initialize

```php
$cms = CMS::init('your-api-key', [
    'timeoutMs'    => 30_000,
    'throwOnError' => false,
]);
```

| Option | Type | Default | Notes |
| --- | --- | --- | --- |
| `timeoutMs` | `int` | `0` (no timeout) | Per-request timeout in milliseconds. |
| `throwOnError` | `bool` | `false` | `false` returns an `Envelope` with `success === false`; `true` throws an `ApiError`. |

`CMS::init` returns a facade. `$cms->raw` is the underlying `Client` if you need an endpoint the generated resources do not cover yet.

---

## Response shape

Every method returns an `Envelope` — the same shape the API itself answers with:

```php
$res->success;     // bool
$res->statusCode;  // int
$res->message;     // string
$res->data;        // the typed payload, or null
```

```php
$res = $cms->article->getAll(['page' => 1, 'limit' => 10]);

if ($res->success) {
    print_r($res->data);
    print_r($res->data->pagination);
} else {
    error_log($res->statusCode . ' ' . $res->message);
}
```

`data` is hydrated into a generated type, so you get real properties rather than string keys. Every type also implements `toArray()` when you need a plain array:

```php
$one = $cms->article->getById('6810f2c3a1b2c3d4e5f60718');

echo $one->data->article->slug;      // typed access
print_r($one->data->toArray());      // plain array
```

### Errors

With the default `throwOnError: false` every call returns an `Envelope` and you check `success`. Set `throwOnError: true` and failures throw instead:

```php
use Octavia\CmsSDK\ApiError;

$cms = CMS::init('your-api-key', ['throwOnError' => true]);

try {
    $cms->article->getById('6810f2c3a1b2c3d4e5f60718');
} catch (ApiError $err) {
    error_log($err->getStatusCode() . ' ' . $err->getMessage());
    print_r($err->getPayload());
}
```

| Status | Meaning | Retry? |
| --- | --- | --- |
| `400` | Invalid request or missing field | No — fix the request |
| `401` | Missing or invalid API key | No |
| `403` | Key valid, role not permitted | No |
| `404` | Record not found | No |
| `426` | Plan quota exhausted | No — upgrade, wait for the period to roll over, or free up quota |
| `429` | Transient rate limit | Yes, after the interval in `retry-after` |

---

## Query parameters

Filters go in the options array, passed straight through as query parameters:

```php
$res = $cms->article->getAll(['page' => 1, 'limit' => 10, 'category' => 'CATEGORY_ID']);

$hits = $cms->article->search(['keyword' => 'typescript', 'limit' => 5]);
```

For methods that also take a body, the options array carries it under `body`:

```php
$res = $cms->article->create($article, ['id' => 'ARTICLE_ID']);
```

---

## Resources

| Property | Covers |
| --- | --- |
| `$cms->article` | Articles, comments, reactions, engagement settings |
| `$cms->author` | Authors |
| `$cms->category` | Categories |
| `$cms->subcategory` | Subcategories |
| `$cms->tag` | Tags |
| `$cms->form` | Forms and captcha configuration |
| `$cms->formSubmission` | Submissions and their article relations |
| `$cms->language` | Languages |
| `$cms->ai` | Summarize, translate, SEO, repurpose, social publishing |
| `$cms->aiConversation` | Multi-turn article drafting |
| `$cms->report` | Statistics, charts, dashboard configuration |
| `$cms->raw` | The unwrapped client |

Method names follow the route segments as generated, including the ones that read as a verb and a method together — `idReactionPOST`, `engagementSettingsPUT`. The API reference lists every operation under its route.

---

## Common tasks

### Paginate

```php
$first = $cms->article->getAll(['page' => 1, 'limit' => 20]);
echo $first->data->pagination->total;
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

Only languages registered through `$cms->language->create` can be written.

### Summarize text

```php
$res = $cms->ai->summarize(['text' => 'Long article body…']);
print_r($res->data);
```

### Use the low-level client

```php
$raw = $cms->raw->request('GET', '/articles/getAll', ['page' => 1]);
```

`request` returns the raw envelope without the typed `data` mapping. Use it for endpoints the generated resources do not cover.

---

## Static analysis

The types are annotated for PHPStan and Psalm, so editors resolve the payload type on `data`:

```php
/** @var \Octavia\CmsSDK\Types\Article $article */
$article = $cms->article->getById($id)->data->article;
```

---

## Documentation

- API reference: https://developers.octaviatech.app
- Dashboard and API keys: https://octaviatech.app

---

## License

ISC
