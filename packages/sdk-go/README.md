# Octavia AI CMS — Go SDK

Typed Go client for the **Octavia AI CMS API** — multilingual articles, taxonomy, forms and submissions, AI automation, media, SEO, content planning and analytics — behind one client and one response shape.

- Generated from the OpenAPI spec, so it covers **every** public operation (229 of them).
- **Zero third-party dependencies** — `net/http` only.
- Generic `CMSResponse[T]` envelope, so every payload is typed.
- Includes **real streaming** (SSE) as a channel.

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
go get github.com/octaviatech/octavia-ai-cms/packages/sdk-go@v0.4.0
```

Then:

```go
import sdk "github.com/octaviatech/octavia-ai-cms/packages/sdk-go/sdk"
```

Requires Go 1.21 or newer.

---

## Quick start

```go
package main

import (
	"fmt"
	"log"

	sdk "github.com/octaviatech/octavia-ai-cms/packages/sdk-go/sdk"
)

func main() {
	cms, err := sdk.InitCMS("your-api-key", nil)
	if err != nil {
		log.Fatal(err)
	}

	res := cms.Article.Create(map[string]any{
		"mainTitle": map[string]string{"en": "Hello"},
		"body":      map[string]string{"en": "Content"},
		"category":  []string{"CATEGORY_ID"},
		"author":    "AUTHOR_ID",
	}, nil)

	if !res.Ok {
		log.Fatal(res.Error.Message)
	}

	fmt.Println(res.Data)
}
```

---

## Authentication

The API key is the only credential, and it is required. There is no OAuth and no header hook — the key is sent as the `x-api-key` header on every request, and that is the entire authentication story.

The base URL is fixed to `https://api.octaviatech.app/cms`, so there is no `BaseURL` option on the facade. Your tenant and the service status are resolved by the gateway from your key; you never send them.

Get a key:

1. Sign up at https://octaviatech.app
2. Dashboard → your service → **API Keys** → Create key

> Keep the key server-side. A key in a client binary or a public repo is a public key — proxy those requests through your backend instead.

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
| `Timeout` | `time.Duration` | `0` (no timeout) | Per-request timeout. Not applied to streaming. |
| `ThrowOnError` | `bool` | `false` | `false` returns a response with `Ok == false`; `true` panics on a transport error. |

`InitCMS` returns a facade. `cms.Raw` is the underlying `Client` if you need an endpoint the generated resources do not cover.

---

## Response shape

Every method returns the same generic envelope, so there is one error path to learn:

```go
type CMSResponse[T any] struct {
	Ok    bool
	Data  T
	Error *CMSError // .Message, .StatusCode
	Meta  *CMSMeta  // .Pagination
}
```

```go
res := cms.Article.GetAll(map[string]any{"page": 1, "limit": 10})

if !res.Ok {
	log.Println(res.Error.StatusCode, res.Error.Message)
} else {
	fmt.Println(res.Data)
}
```

`Data` is typed from the spec, so it is a generated struct — not `map[string]any` — for every endpoint that declares a schema.

### Errors

With the default `ThrowOnError: false` you get a `CMSResponse` with `Ok == false` and `Error` populated. This SDK reports failures as values rather than errors, so check `Ok` after every call:

```go
if !res.Ok && res.Error.StatusCode == 426 {
	// Plan quota exhausted — surface the upgrade CTA.
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

Only `InitCMS` itself returns an `error`, and only for a bad configuration.

---

## Query parameters

Filters go under `query`, never as loose top-level keys:

```go
res := cms.Article.GetAll(map[string]any{
	"page":     1,
	"limit":    10,
	"category": "CATEGORY_ID",
})
```

Request bodies are passed as `map[string]any` (or any JSON-marshalable value) and serialized with `encoding/json`.

---

## Resources

| Field | Operations | Covers |
| --- | --- | --- |
| `cms.Article` | 35 | Articles, comments, reactions, engagement settings, revisions, readiness, translation state, per-locale SEO |
| `cms.AI` | 47 | Summarize, translate, SEO, repurpose, autofill, proposals, credits, settings, event stream, social publishing |
| `cms.AIConversation` | 6 | Multi-turn article drafting |
| `cms.Form` | 12 | Forms and captcha configuration |
| `cms.FormSubmission` | 20 | Submissions, relations, AI analysis, replies, digest |
| `cms.Report` | 28 | Statistics, charts, needs-attention, weekly digest, SEO health, AI acceptance |
| `cms.Category` | 6 | Categories |
| `cms.Subcategory` | 7 | Subcategories |
| `cms.Author` | 6 | Authors |
| `cms.Tag` | 3 | Tags |
| `cms.Language` | 5 | Languages |
| `cms.Media` | 7 | Media library, alt text, usage |
| `cms.Seo` | 8 | Site audit, cannibalization, refresh, redirects, hreflang, coverage |
| `cms.Taxonomy` | 7 | Taxonomy audit, category SEO, tag merge, author bio |
| `cms.ContentPlan` | 15 | Editorial calendar, campaigns, cadence, AI planning |
| `cms.Campaign` | 4 | Campaigns |
| `cms.Raw` | — | The unwrapped client |

---

## Streaming (Server-Sent Events)

Nine endpoints stream their results. Each has two methods: the ordinary call returning `CMSResponse[T]`, and a `…Live()` method returning a `<-chan SseEvent`.

| Method | Streams |
| --- | --- |
| `cms.AI.SummarizeLive(...)` | `POST /ai/summarize/stream` |
| `cms.AI.SummarizeArticleLive(...)` | `POST /ai/summarizeArticle/stream` |
| `cms.AI.SeoOptimizeLive(...)` | `POST /ai/seoOptimize/stream` |
| `cms.AI.TranslateLive(...)` | `POST /ai/translate/stream` |
| `cms.AI.TranslateArticleLive(...)` | `POST /ai/translateArticle/stream` |
| `cms.AI.OptimizeArticleLive(...)` | `POST /ai/optimizeArticle/stream` |
| `cms.AI.RepurposeLive(...)` | `POST /ai/repurpose/stream` |
| `cms.AIConversation.ConversationGenerateLive(...)` | `POST /ai/conversation/generate/stream` |
| `cms.AI.EventsLive(...)` | `GET /ai/events/stream` |

> The naming: an endpoint whose path already ends in `/stream` produces a plain `…Stream()` method, and its streaming companion is `…Live()` rather than `SummarizeStreamStream`.

Each `SseEvent` carries `Event`, `Data` (decoded JSON as `any`, or the raw string when the payload is not JSON), and optional `ID` / `Retry`. Frames split across network chunks are reassembled, so a partial chunk never yields a half-frame. A failure arrives as a frame with `IsError` set, and the channel closes immediately after.

```go
for frame := range cms.AI.SummarizeLive(nil, map[string]any{"text": "A long article body…"}) {
	if frame.IsError {
		log.Println("stream failed:", frame.Message)
		break
	}

	switch frame.Event {
	case "content_chunk":
		if m, ok := frame.Data.(map[string]any); ok {
			fmt.Print(m["text"])
		}
	case "complete":
		fmt.Println("\ndone")
	case "error":
		fmt.Println("generation error:", frame.Data)
	}
}
```

The channel closes when the server closes the stream. `break`ing out of the range leaves the goroutine to finish the current read and exit — the response body is closed on return. `Timeout` is deliberately **not** applied to streaming, because a generation can legitimately run for minutes.

---

## Common tasks

### Paginate

```go
first := cms.Article.GetAll(map[string]any{"page": 1, "limit": 20})

fmt.Println(first.Meta.Pagination) // { page, limit, total, totalPages }
```

### Create multilingual content

`Category` and `SubCategory` take **slices of IDs**, even when you have one. Text fields are maps from language code to string.

```go
cms.Article.Create(map[string]any{
	"mainTitle":   map[string]string{"en": "Hello", "es": "Hola"},
	"body":        map[string]string{"en": "Content", "es": "Contenido"},
	"category":    []string{"6810f2c3a1b2c3d4e5f60718"},
	"subCategory": []string{"6810f2c3a1b2c3d4e5f60719"},
	"author":      "6810f2c3a1b2c3d4e5f60720",
}, nil)
```

Only languages that have been registered through `cms.Language.Create` can be written. An unregistered key is rejected with `406` listing the valid codes.

### Per-locale SEO

SEO metadata is read and written on its own endpoint, so you can change a meta title without resending the article. Pass `locale` to touch one language; omit it to read or replace the whole map.

```go
// Read every locale.
cms.Article.ArticleIdSeoGET("ARTICLE_ID", nil)

// Write one locale only — other locales are left alone.
cms.Article.ArticleIdSeoPUT("ARTICLE_ID", map[string]any{
	"metaTitle":       "A meta title under 60 characters",
	"metaDescription": "A description under 155 characters",
	"focusKeyword":    "typescript sdk",
	"robots":          "index,follow",
}, map[string]any{"locale": "en"})
```

### AI proposals

AI never writes to your content directly. It files a **proposal**; you review it and accept, reject, or undo. This is the loop every AI action follows.

```go
// 1. See what is waiting.
pending := cms.AI.ProposalsCount(map[string]any{"status": "pending"})

// 2. Read them.
list := cms.AI.ProposalsGET(map[string]any{"status": "pending", "limit": 20})

// 3. Accept one — this writes through the normal domain service, so
//    validation, permissions and revisions all apply.
cms.AI.ProposalsIdAccept("PROPOSAL_ID", nil)

// 4. Changed your mind: the previous value is restored.
cms.AI.ProposalsIdUndo("PROPOSAL_ID", nil)
```

Accepting a proposal whose entity changed in the meantime returns `409` rather than overwriting the newer content.

```go
// Bulk accept: the response carries a per-item result.
bulk := cms.AI.ProposalsBulkAccept(map[string]any{"ids": []string{"A", "B", "C"}}, nil)
// bulk.Data: []AiProposalBulkResultItem{{ID, Status, Reason}}
```

### Summarize text

```go
res := cms.AI.Summarize(map[string]any{"text": "Long article body…"}, nil)
fmt.Println(res.Data)
```

Or streamed, so the answer appears as it is written:

```go
for frame := range cms.AI.SummarizeLive(nil, map[string]any{"text": "Long article body…"}) {
	if frame.Event == "content_chunk" {
		if m, ok := frame.Data.(map[string]any); ok {
			fmt.Print(m["text"])
		}
	}
}
```

### Check your AI balance before a bulk run

```go
credits := cms.AI.Credits(nil)
fmt.Println(credits.Data.Used, credits.Data.Limit, credits.Data.Remaining, credits.Data.Available)

estimate := cms.AI.Estimate(map[string]any{"action": "article.autofillMetadata"}, nil)
fmt.Println(estimate.Data.ActionID, estimate.Data.EstimatedTokens)
```

A plan that runs out of quota returns `426` on every AI endpoint, including streaming ones.

### Use the low-level client

```go
raw := cms.Raw.Request("GET", "/articles/getAll", map[string]any{"page": 1}, nil)
```

The low-level client returns the raw envelope from the API without the facade. Use it for endpoints the generated resources do not cover. It also exposes `sdk.StreamSSE(client, method, path, query, body)` and `sdk.StreamSSEContext(...)` for hand-written streaming calls.

---

## Documentation

- API reference: https://developers.octaviatech.app
- Product: https://octaviatech.app/products/ai-cms
- Website: https://octaviatech.app
- Examples (Go Fiber among others): https://github.com/octaviatech/octavia-ai-cms/tree/main/examples

---

## License

ISC