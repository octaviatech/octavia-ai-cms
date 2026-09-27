# Octavia CMS SDK (Go)

Typed Go SDK for the **Octavia AI CMS API** — articles, categories, tags, forms, submissions, AI automation, social publishing and analytics, behind one client and one response shape.

- Generated from the OpenAPI spec, so it covers **every** public operation.
- **Zero third-party dependencies** — standard library only.
- Go 1.21+.
- Generic `CMSResponse[T]`, so `Data` is your concrete model type, not `any`.

---

## Install

```bash
go get github.com/octaviatech/octavia-ai-cms/packages/sdk-go/sdk
```

---

## Quick start

```go
package main

import (
	"fmt"
	"os"

	sdk "github.com/octaviatech/octavia-ai-cms/packages/sdk-go/sdk"
)

func main() {
	cms, err := sdk.InitCMS(os.Getenv("OCTAVIA_API_KEY"), nil)
	if err != nil {
		panic(err)
	}

	res := cms.Article.Create(map[string]any{
		"mainTitle": map[string]any{"en": "Hello"},
		"body":      map[string]any{"en": "Content"},
		"category":  []string{"CATEGORY_ID"},
		"author":    "AUTHOR_ID",
	}, nil)

	if !res.Ok {
		panic(res.Error.Message)
	}

	fmt.Println(res.Data.Article.Slug)
}
```

---

## Authentication

The API key is the only credential, and it is required. There is no OAuth, no refresh token and no header option — the key is sent as the `x-api-key` header on every request, and that is the entire authentication story.

The base URL is fixed to `https://api.octaviatech.app/cms` (exposed as `sdk.CMSBaseURL`), so there is nothing to configure. Your tenant and the service status are resolved by the gateway from your key; you never send them.

Get a key:

1. Sign up at [octaviatech.app](https://octaviatech.app)
2. Dashboard → your service → **API Keys** → Create key

> Keep the key server-side. Read it from the environment, never from source.

---

## Initialize

```go
cms, err := sdk.InitCMS("your-api-key", &sdk.CMSOptions{
	Timeout:      30 * time.Second,
	ThrowOnError: true,
})
```

| Option | Type | Default | Notes |
| --- | --- | --- | --- |
| `Timeout` | `time.Duration` | `0` → 30s | Per-request timeout. Passing `nil` for options takes the defaults. |
| `ThrowOnError` | `bool` | `false` | `false` returns `Ok: false`; `true` returns an `*ApiError` from the call. |

`InitCMS` returns `(*CMS, error)` — the error is for a bad key or base URL, not for API failures. API failures come back on the response.

`cms.Raw` is the underlying `*Client` if you need an endpoint the generated resources do not cover yet.

---

## Response shape

Every method returns `CMSResponse[T]`, with `T` bound to the endpoint's model:

```go
type CMSResponse[T any] struct {
	Ok    bool
	Data  T
	Error *CMSError
	Meta  *CMSMeta
}
```

```go
res := cms.Article.GetAll(map[string]any{"page": 1, "limit": 10}, nil)

if !res.Ok {
	log.Println(res.Error.StatusCode, res.Error.Message)
	return
}

for _, item := range res.Data.ArticleListItem {
	fmt.Println(item.Slug)
}
```

### Errors

With the default `ThrowOnError: false` you check `res.Ok`. Set it to `true` and the call returns an `*ApiError` you can type-assert:

```go
res := cms.Article.GetById("6810f2c3a1b2c3d4e5f60718", nil)

var apiErr *sdk.ApiError
if errors.As(res.Error, &apiErr) {
	log.Println(apiErr.Status, string(apiErr.Payload))
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

Filters go in the `query` map. The second argument is the request body, so pass `nil` when there is none:

```go
res := cms.Article.GetAll(map[string]any{
	"page":     1,
	"limit":    10,
	"category": "CATEGORY_ID",
}, nil)

hits := cms.Article.Search(map[string]any{"keyword": "typescript", "limit": 5}, nil)
```

Every method takes `(body, query)` in that order:

```go
cms.Article.Create(article, nil)                 // body only
cms.Article.GetByCategoryId("CATEGORY_ID", nil)  // path arg + nil query
```

---

## Resources

| Field | Covers |
| --- | --- |
| `cms.Article` | Articles, comments, reactions, engagement settings |
| `cms.Author` | Authors |
| `cms.Category` | Categories |
| `cms.Subcategory` | Subcategories |
| `cms.Tag` | Tags |
| `cms.Form` | Forms and captcha configuration |
| `cms.FormSubmission` | Submissions and their article relations |
| `cms.Language` | Languages |
| `cms.AI` | Summarize, translate, SEO, repurpose, social publishing |
| `cms.AIConversation` | Multi-turn article drafting |
| `cms.Report` | Statistics, charts, dashboard configuration |
| `cms.Raw` | The unwrapped client |

Method names follow the route segments as generated, including the ones that read as a verb and a method together — `IdReactionPOST`, `EngagementSettingsPUT`. The API reference lists every operation under its route.

---

## Common tasks

### Paginate

```go
first := cms.Article.GetAll(map[string]any{"page": 1, "limit": 20}, nil)
fmt.Println(first.Data.Pagination.Total)
```

### Create multilingual content

`category` and `subCategory` take **slices of IDs**, even when you have one. Text fields are maps from language code to string.

```go
cms.Article.Create(map[string]any{
	"mainTitle":   map[string]any{"en": "Hello", "es": "Hola"},
	"body":        map[string]any{"en": "Content", "es": "Contenido"},
	"category":    []string{"6810f2c3a1b2c3d4e5f60718"},
	"subCategory": []string{"6810f2c3a1b2c3d4e5f60719"},
	"author":      "6810f2c3a1b2c3d4e5f60720"},
}, nil)
```

Only languages registered through `cms.Language.Create` can be written.

### Summarize text

```go
res := cms.AI.Summarize(map[string]any{"text": "Long article body…"}, nil)
fmt.Println(res.Data)
```

### Use the low-level client

```go
raw := cms.Raw.Request("GET", "/articles/getAll", map[string]any{"page": 1}, nil)
```

`Request` returns `CMSResponse[any]` for endpoints the generated resources do not cover.

---

## Context and cancellation

The generated methods do not take a `context.Context`. If you need cancellation, build the client with your own `http.Client` timeout and use the low-level `Request` for that call.

---

## Documentation

- API reference: https://developers.octaviatech.app
- Dashboard and API keys: https://octaviatech.app

---

## License

ISC
