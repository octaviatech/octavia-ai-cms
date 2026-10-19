# octavia-cms-sdk

Typed Python client for the **Octavia AI CMS API** — multilingual articles, taxonomy, forms and submissions, AI automation, media, SEO, content planning and analytics — behind one client and one response shape.

- Generated from the OpenAPI spec, so it covers **every** public operation (229 of them).
- **Zero runtime dependencies** — standard library only.
- Hydrates responses into dataclasses, so attribute access is typed.
- Includes **real streaming** (SSE) as a generator.

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
pip install octavia-cms-sdk
```

Requires Python 3.10 or newer.

---

## Quick start

```python
from octavia_cms_sdk import CMS

cms = CMS.init("your-api-key")

res = cms.article.create({
    "mainTitle": {"en": "Hello"},
    "body": {"en": "Content"},
    "category": ["CATEGORY_ID"],
    "author": "AUTHOR_ID",
})

if not res.ok:
    raise RuntimeError(res.error.message)

print(res.data)
```

---

## Authentication

The API key is the only credential, and it is required. There is no OAuth and no header hook — the key is sent as the `x-api-key` header on every request, and that is the entire authentication story.

The base URL is fixed to `https://api.octaviatech.app/cms`, so there is no `base_url` option. Your tenant and the service status are resolved by the gateway from your key; you never send them.

Get a key:

1. Sign up at https://octaviatech.app
2. Dashboard → your service → **API Keys** → Create key

> Keep the key server-side. A key in a client bundle or a public repo is a public key — proxy those requests through your backend instead.

---

## Initialize

```python
cms = CMS.init("your-api-key", timeout_ms=30_000, throw_on_error=False)
```

| Option | Type | Default | Notes |
| --- | --- | --- | --- |
| `timeout_ms` | `int` | `None` (no timeout) | Per-request timeout in milliseconds. Not applied to streaming. |
| `throw_on_error` | `bool` | `False` | `False` returns a response with `ok=False`; `True` raises `ApiError`. |

Both snake_case and the JS-style camelCase spellings (`timeoutMs`, `throwOnError`) are accepted.

`CMS.init` returns a facade. `cms.raw` is the underlying `Client` if you need an endpoint the generated resources do not cover.

---

## Response shape

Every method returns the same response object, so there is one error path to learn:

```python
class CMSResponse:
    ok: bool
    data: T | None       # hydrated dataclass
    error: CMSError | None   # .message, .status
```

```python
res = cms.article.getAll(query={"page": 1, "limit": 10})

if not res.ok:
    print(res.error.status, res.error.message)
else:
    print(res.data.articles)
    print(res.data.pagination.total_pages)
```

`data` is hydrated into the dataclass the endpoint declares, so `res.data` is not a dict — autocomplete and type checking work out of the box.

### Errors

With the default `throw_on_error=False` you get a response with `ok=False`. Set `throw_on_error=True` and a failed call raises `ApiError` instead:

```python
from octavia_cms_sdk import ApiError

cms = CMS.init("your-api-key", throw_on_error=True)

try:
    cms.article.getById("6810f2c3a1b2c3d4e5f60718")
except ApiError as e:
    print(e.status, e)
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

```python
res = cms.article.getAll(query={"page": 1, "limit": 10, "category": "CATEGORY_ID"})
hits = cms.article.search(query={"keyword": "typescript", "limit": 5})
```

---

## Resources

| Property | Operations | Covers |
| --- | --- | --- |
| `cms.article` | 35 | Articles, comments, reactions, engagement settings, revisions, readiness, translation state, per-locale SEO |
| `cms.ai` | 47 | Summarize, translate, SEO, repurpose, autofill, proposals, credits, settings, event stream, social publishing |
| `cms.ai_conversation` | 6 | Multi-turn article drafting |
| `cms.form` | 12 | Forms and captcha configuration |
| `cms.form_submission` | 20 | Submissions, relations, AI analysis, replies, digest |
| `cms.report` | 28 | Statistics, charts, needs-attention, weekly digest, SEO health, AI acceptance |
| `cms.category` | 6 | Categories |
| `cms.subcategory` | 7 | Subcategories |
| `cms.author` | 6 | Authors |
| `cms.tag` | 3 | Tags |
| `cms.language` | 5 | Languages |
| `cms.media` | 7 | Media library, alt text, usage |
| `cms.seo` | 8 | Site audit, cannibalization, refresh, redirects, hreflang, coverage |
| `cms.taxonomy` | 7 | Taxonomy audit, category SEO, tag merge, author bio |
| `cms.content_plan` | 15 | Editorial calendar, campaigns, cadence, AI planning |
| `cms.campaign` | 4 | Campaigns |
| `cms.raw` | — | The unwrapped client |

---

## Streaming (Server-Sent Events)

Nine endpoints stream their results. Each has two methods: the ordinary call returning a response, and a `…Live()` method returning an iterator of `SseEvent` objects.

| Method | Streams |
| --- | --- |
| `cms.ai.summarizeLive(...)` | `POST /ai/summarize/stream` |
| `cms.ai.summarizeArticleLive(...)` | `POST /ai/summarizeArticle/stream` |
| `cms.ai.seoOptimizeLive(...)` | `POST /ai/seoOptimize/stream` |
| `cms.ai.translateLive(...)` | `POST /ai/translate/stream` |
| `cms.ai.translateArticleLive(...)` | `POST /ai/translateArticle/stream` |
| `cms.ai.optimizeArticleLive(...)` | `POST /ai/optimizeArticle/stream` |
| `cms.ai.repurposeLive(...)` | `POST /ai/repurpose/stream` |
| `cms.ai_conversation.conversationGenerateLive(...)` | `POST /ai/conversation/generate/stream` |
| `cms.ai.eventsLive()` | `GET /ai/events/stream` |

> The naming: an endpoint whose path already ends in `/stream` produces a plain `…Stream()` method, and its streaming companion is `…Live()` rather than `summarizeStreamStream`.

Each yields `SseEvent` objects with `event`, `data` (decoded object when the payload is JSON, raw string otherwise), and optional `id` / `retry`. Frames split across network chunks are reassembled, so a partial chunk never yields a half-frame.

```python
for frame in cms.ai.summarizeLive({"text": "A long article body…"}):
    if frame.event == "content_chunk":
        print(frame.data.get("text", ""), end="", flush=True)
    elif frame.event == "complete":
        print("\ndone")
    elif frame.event == "error":
        print(frame.data)
```

The iterator ends when the server closes the stream. `break`ing out of the loop closes the response. `timeout_ms` is deliberately **not** applied to streaming — a generation can legitimately run for minutes.

---

## Common tasks

### Paginate

```python
first = cms.article.getAll(query={"page": 1, "limit": 20})

print(first.data.pagination.total_pages)  # { page, limit, total, totalPages }
```

### Create multilingual content

`category` and `subCategory` take **lists of IDs**, even when you have one. Text fields are dicts from language code to string.

```python
cms.article.create({
    "mainTitle": {"en": "Hello", "es": "Hola"},
    "body": {"en": "Content", "es": "Contenido"},
    "category": ["6810f2c3a1b2c3d4e5f60718"],
    "subCategory": ["6810f2c3a1b2c3d4e5f60719"],
    "author": "6810f2c3a1b2c3d4e5f60720",
})
```

Only languages that have been registered through `cms.language.create()` can be written. An unregistered key is rejected with `406` listing the valid codes.

### Per-locale SEO

SEO metadata is read and written on its own endpoint, so you can change a meta title without resending the article. Pass `locale` to touch one language; omit it to read or replace the whole map.

```python
# Read every locale.
cms.article.articleIdSeoGET("ARTICLE_ID")

# Write one locale only — other locales are left alone.
cms.article.articleIdSeoPUT("ARTICLE_ID", {
    "metaTitle": "A meta title under 60 characters",
    "metaDescription": "A description under 155 characters",
    "focusKeyword": "typescript sdk",
    "robots": "index,follow",
}, query={"locale": "en"})
```

### AI proposals

AI never writes to your content directly. It files a **proposal**; you review it and accept, reject, or undo. This is the loop every AI action follows.

```python
# 1. See what is waiting.
pending = cms.ai.proposalsCount(query={"status": "pending"})

# 2. Read them.
listing = cms.ai.proposalsGET(query={"status": "pending", "limit": 20})

# 3. Accept one — this writes through the normal domain service, so
#    validation, permissions and revisions all apply.
cms.ai.proposalsIdAccept("PROPOSAL_ID")

# 4. Changed your mind: the previous value is restored.
cms.ai.proposalsIdUndo("PROPOSAL_ID")
```

Accepting a proposal whose entity changed in the meantime returns `409` rather than overwriting the newer content.

```python
# Bulk accept: the response carries a per-item result.
bulk = cms.ai.proposalsBulkAccept({"ids": ["A", "B", "C"]})
# bulk.data.items: [{"id": "A", "status": "accepted"}, ...]
```

### Summarize text

```python
res = cms.ai.summarize(query={"text": "Long article body…"})
print(res.data)
```

Or streamed, so the answer appears as it is written:

```python
for frame in cms.ai.summarizeLive({"text": "Long article body…"}):
    if frame.event == "content_chunk":
        print(frame.data.get("text", ""), end="", flush=True)
```

### Check your AI balance before a bulk run

```python
credits = cms.ai.credits()
print(credits.data.used, credits.data.limit, credits.data.remaining)

estimate = cms.ai.estimate({"action": "article.autofillMetadata"})
print(estimate.data.low, estimate.data.high)  # a range, not a fixed price
```

A plan that runs out of quota returns `426` on every AI endpoint, including streaming ones.

### Use the low-level client

```python
raw = cms.raw.request("GET", "/articles/getAll", query={"page": 1})
```

The low-level client returns the raw envelope from the API without the facade. Use it for endpoints the generated resources do not cover. It also exposes `client.stream_sse(method, path, ...)` for hand-written streaming calls.

---

## Documentation

- API reference: https://developers.octaviatech.app
- Product: https://octaviatech.app/products/ai-cms
- Website: https://octaviatech.app
- Examples: https://github.com/octaviatech/octavia-ai-cms/tree/main/examples

---

## License

ISC