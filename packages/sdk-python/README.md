# octavia-cms-sdk

Typed Python SDK for the **Octavia AI CMS API** — articles, categories, tags, forms, submissions, AI automation, social publishing and analytics, behind one client and one response shape.

- Generated from the OpenAPI spec, so it covers **every** public operation.
- **Zero third-party dependencies.** Uses `urllib` from the standard library, so there is nothing to compile.
- Python 3.10+.
- `res.data` is a generated dataclass, not a dict — fields are attributes, and you get real type hints.

---

## Install

```bash
pip install octavia-cms-sdk
```

```bash
poetry add octavia-cms-sdk
```

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

if not res["ok"]:
    raise RuntimeError(res["error"]["message"])

print(res["data"])
```

---

## Authentication

The API key is the only credential, and it is required. There is no OAuth, no refresh token and no header parameter — the key is sent as the `x-api-key` header on every request, and that is the entire authentication story.

The base URL is fixed to `https://api.octaviatech.app/cms`, so there is no `base_url` option on `CMS.init`. Your tenant and the service status are resolved by the gateway from your key; you never send them.

Get a key:

1. Sign up at [octaviatech.app](https://octaviatech.app)
2. Dashboard → your service → **API Keys** → Create key

> Keep the key server-side. Read it from the environment, never from source.

```python
import os
from octavia_cms_sdk import CMS

cms = CMS.init(os.environ["OCTAVIA_API_KEY"])
```

---

## Initialize

```python
cms = CMS.init(
    "your-api-key",
    timeout_ms=30_000,
    throw_on_error=False,
)
```

| Option | Type | Default | Notes |
| --- | --- | --- | --- |
| `timeout_ms` | `int` | no timeout | Per-request timeout in milliseconds. |
| `throw_on_error` | `bool` | `False` | `False` returns `{"ok": False}`; `True` raises. |

`timeoutMs` and `throwOnError` are accepted as camelCase aliases, so the option names match the other SDKs. The snake_case names above are the documented ones.

`CMS.init` returns a facade. `cms.raw` is the underlying `Client` if you need an endpoint the generated resources do not cover yet.

---

## Response shape

Every method returns the same envelope, so there is one error path to learn:

```python
{
    "ok": bool,
    "data": <dataclass | None>,
    "meta": {"pagination": <dataclass>} | None,
    "error": {"message": str, "statusCode": int} | None,
}
```

```python
res = cms.article.getAll(query={"page": 1, "limit": 10})

if res["ok"]:
    for item in res["data"].article_list_item:
        print(item.main_title.en)
    print(res["meta"]["pagination"].total)
else:
    print(res["error"]["message"])
```

`data` is a generated dataclass, so **fields are attributes, not string keys**:

```python
one = cms.article.getById("6810f2c3a1b2c3d4e5f60718")
print(one.data.article.slug)     # attribute access
```

If you need plain dictionaries, `from_dict` and `to_dict` are available on the models.

### Errors

With the default `throw_on_error=False` you get a returned dict with `ok: False`. Set `throw_on_error=True` and the call raises instead:

```python
from octavia_cms_sdk import ApiError

cms = CMS.init("your-api-key", throw_on_error=True)

try:
    cms.article.getById("6810f2c3a1b2c3d4e5f60718")
except ApiError as err:
    print(err.status, err.message, err.payload)
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

Filters go under `query`, never as loose keyword arguments:

```python
res = cms.article.getAll(query={"page": 1, "limit": 10, "category": "CATEGORY_ID"})

hits = cms.article.search(query={"keyword": "typescript", "limit": 5})
```

Read methods whose name starts with `get` or contains `search` also accept the filter dict directly, so both of these work:

```python
cms.article.getAll(query={"page": 1})
cms.article.getAll({"page": 1})
```

The explicit `query` form is the one to prefer — it is what the type hints describe, and the shorthand is a convenience layer on top.

---

## Resources

| Property | Covers |
| --- | --- |
| `cms.article` | Articles, comments, reactions, engagement settings |
| `cms.author` | Authors |
| `cms.category` | Categories |
| `cms.subcategory` | Subcategories |
| `cms.tag` | Tags |
| `cms.form` | Forms and captcha configuration |
| `cms.formSubmission` | Submissions and their article relations |
| `cms.language` | Languages |
| `cms.ai` | Summarize, translate, SEO, repurpose, social publishing |
| `cms.aiConversation` | Multi-turn article drafting |
| `cms.report` | Statistics, charts, dashboard configuration |
| `cms.raw` | The unwrapped client |

Method names follow the route segments as generated, including the ones that read as a verb and a method together — `idReactionPOST`, `engagementSettingsPUT`. The API reference lists every operation under its route.

---

## Common tasks

### Paginate

```python
first = cms.article.getAll(query={"page": 1, "limit": 20})
print(first.data.pagination.total)
```

### Create multilingual content

`category` and `subCategory` take **lists of IDs**, even when you have one. Text fields are dicts mapping language code to string.

```python
cms.article.create({
    "mainTitle": {"en": "Hello", "es": "Hola"},
    "body": {"en": "Content", "es": "Contenido"},
    "category": ["6810f2c3a1b2c3d4e5f60718"],
    "subCategory": ["6810f2c3a1b2c3d4e5f60719"],
    "author": "6810f2c3a1b2c3d4e5f60720",
})
```

Only languages registered through `cms.language.create` can be written.

### Summarize text

```python
res = cms.ai.summarize(query={"text": "Long article body…"})
print(res.data)
```

### Use the low-level client

```python
raw = cms.raw.request("GET", "/articles/getAll", query={"page": 1})
```

`request` returns the raw envelope from the API — `{success, statusCode, message, data}` — without the `ok`/`data`/`error` facade. Use it for endpoints the generated resources do not cover.

---

## Type checking

The models are dataclasses, so `mypy` and `pyright` work out of the box:

```python
from octavia_cms_sdk.models import Article

def title(article: Article) -> str:
    return article.main_title.en
```

---

## Documentation

- API reference: https://developers.octaviatech.app
- Dashboard and API keys: https://octaviatech.app

---

## License

ISC
