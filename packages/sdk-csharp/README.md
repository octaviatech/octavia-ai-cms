# Octavia.CmsSDK

Typed .NET client for the **Octavia AI CMS API** — multilingual articles, taxonomy, forms and submissions, AI automation, media, SEO, content planning and analytics — behind one client and one response shape.

- Generated from the OpenAPI spec, so it covers **every** public operation (229 of them).
- **Zero third-party dependencies** — `HttpClient` only.
- Targets `net8.0`; hydrates responses into generated records.
- Includes **real streaming** (SSE) with `IAsyncEnumerable`.

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
dotnet add package Octavia.CmsSDK
```

```xml
<PackageReference Include="Octavia.CmsSDK" Version="0.4.0" />
```

---

## Quick start

```csharp
using Octavia.CmsSDK;

var cms = CMS.Init("your-api-key");

var res = await cms.Article.CreateAsync(new
{
    mainTitle = new { en = "Hello" },
    body      = new { en = "Content" },
    category  = new[] { "CATEGORY_ID" },
    author    = "AUTHOR_ID",
});

if (!res.Ok) throw new InvalidOperationException(res.Error?.Message ?? "Request failed");

Console.WriteLine(res.Data);
```

---

## Authentication

The API key is the only credential, and it is required. There is no OAuth and no header hook — the key is sent as the `x-api-key` header on every request, and that is the entire authentication story.

The base URL is fixed to `https://api.octaviatech.app/cms`, so there is no `BaseUrl` option. Your tenant and the service status are resolved by the gateway from your key; you never send them.

Get a key:

1. Sign up at https://octaviatech.app
2. Dashboard → your service → **API Keys** → Create key

> Keep the key server-side. A key in a client bundle or a public repo is a public key — proxy those requests through your backend instead.

---

## Initialize

```csharp
var cms = CMS.Init("your-api-key", new CMSOptions
{
    Timeout      = TimeSpan.FromSeconds(30),
    ThrowOnError = false,
});
```

| Option | Type | Default | Notes |
| --- | --- | --- | --- |
| `Timeout` | `TimeSpan?` | `null` (no timeout) | Per-request timeout. Not applied to streaming. |
| `ThrowOnError` | `bool` | `false` | `false` returns a response with `Ok == false`; `true` throws `ApiError`. |

`CMS.Init` returns a facade. `cms.Raw` is the underlying `Client` if you need an endpoint the generated resources do not cover.

---

## Response shape

Every method returns the same response record, so there is one error path to learn:

```csharp
public sealed record CMSResponse<T>(
    bool Ok,
    T? Data,
    CMSError? Error = null,
    CMSMeta? Meta = null
);
```

```csharp
var res = await cms.Article.GetAllAsync(new Dictionary<string, string?> { ["page"] = "1", ["limit"] = "10" });

if (!res.Ok)
{
    Console.Error.WriteLine($"{res.Error?.StatusCode}: {res.Error?.Message}");
}
else
{
    Console.WriteLine(res.Data);
    Console.WriteLine(res.Meta?.Pagination);
}
```

`Data` is typed from the spec, so it is not `JsonElement` for endpoints with a declared schema — autocomplete and null-checking work out of the box.

### Errors

With the default `ThrowOnError = false` you get a response with `Ok == false`. Set `ThrowOnError = true` and a failed call throws `ApiError` instead:

```csharp
using Octavia.CmsSDK;

var cms = CMS.Init("your-api-key", new CMSOptions { ThrowOnError = true });

try
{
    await cms.Article.GetByIdAsync("6810f2c3a1b2c3d4e5f60718");
}
catch (ApiError ex)
{
    Console.Error.WriteLine($"{ex.StatusCode}: {ex.Message}");
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

```csharp
var res = await cms.Article.GetAllAsync(new Dictionary<string, string?>
{
    ["page"] = "1",
    ["limit"] = "10",
    ["category"] = "CATEGORY_ID",
});
```

Request bodies are passed as anonymous objects and serialized with `System.Text.Json`.

---

## Resources

| Property | Operations | Covers |
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

Nine endpoints stream their results. Each has two methods: the ordinary call returning a `Task<CMSResponse<T>>`, and a `…LiveAsync()` method returning `IAsyncEnumerable<SseEvent>`.

| Method | Streams |
| --- | --- |
| `cms.AI.SummarizeLiveAsync(...)` | `POST /ai/summarize/stream` |
| `cms.AI.SummarizeArticleLiveAsync(...)` | `POST /ai/summarizeArticle/stream` |
| `cms.AI.SeoOptimizeLiveAsync(...)` | `POST /ai/seoOptimize/stream` |
| `cms.AI.TranslateLiveAsync(...)` | `POST /ai/translate/stream` |
| `cms.AI.TranslateArticleLiveAsync(...)` | `POST /ai/translateArticle/stream` |
| `cms.AI.OptimizeArticleLiveAsync(...)` | `POST /ai/optimizeArticle/stream` |
| `cms.AI.RepurposeLiveAsync(...)` | `POST /ai/repurpose/stream` |
| `cms.AIConversation.ConversationGenerateLiveAsync(...)` | `POST /ai/conversation/generate/stream` |
| `cms.AI.EventsLiveAsync()` | `GET /ai/events/stream` |

> The naming: an endpoint whose path already ends in `/stream` produces a plain `…StreamAsync()` method, and its streaming companion is `…LiveAsync()` rather than `SummarizeStreamStreamAsync`.

Each yields `SseEvent` objects with `Event`, `Data` (a `JsonElement` when the payload is JSON, a raw string otherwise), and optional `Id` / `Retry`. Frames split across network chunks are reassembled, so a partial chunk never yields a half-frame.

```csharp
await foreach (var frame in cms.AI.SummarizeLiveAsync(new { text = "A long article body…" }))
{
    switch (frame.Event)
    {
        case "content_chunk":
            Console.Write(frame.Data.ValueKind == JsonValueKind.String
                ? frame.Data.GetString()
                : frame.Data.GetProperty("text").GetString());
            break;
        case "complete":
            Console.WriteLine("\ndone");
            break;
        case "error":
            Console.Error.WriteLine(frame.Data);
            break;
    }
}
```

The enumeration ends when the server closes the stream. Breaking out of the loop disposes the request. `Timeout` is deliberately **not** applied to streaming — a generation can legitimately run for minutes. Pass a `CancellationToken` when the user can cancel:

```csharp
var cts = new CancellationTokenSource();
await foreach (var frame in cms.AI.EventsLiveAsync(cancellationToken: cts.Token)) { /* ... */ }
cts.Cancel();
```

---

## Common tasks

### Paginate

```csharp
var first = await cms.Article.GetAllAsync(new Dictionary<string, string?> { ["page"] = "1", ["limit"] = "20" });

Console.WriteLine(first.Meta?.Pagination); // { page, limit, total, totalPages }
```

### Create multilingual content

`category` and `subCategory` take **arrays of IDs**, even when you have one. Text fields are maps from language code to string.

```csharp
await cms.Article.CreateAsync(new
{
    mainTitle   = new { en = "Hello", es = "Hola" },
    body        = new { en = "Content", es = "Contenido" },
    category    = new[] { "6810f2c3a1b2c3d4e5f60718" },
    subCategory = new[] { "6810f2c3a1b2c3d4e5f60719" },
    author      = "6810f2c3a1b2c3d4e5f60720",
});
```

Only languages that have been registered through `cms.Language.CreateAsync` can be written. An unregistered key is rejected with `406` listing the valid codes.

### Per-locale SEO

SEO metadata is read and written on its own endpoint, so you can change a meta title without resending the article. Pass `locale` to touch one language; omit it to read or replace the whole map.

```csharp
// Read every locale.
await cms.Article.ArticleIdSeoGETAsync("ARTICLE_ID");

// Write one locale only — other locales are left alone.
await cms.Article.ArticleIdSeoPUTAsync("ARTICLE_ID", new
{
    metaTitle       = "A meta title under 60 characters",
    metaDescription = "A description under 155 characters",
    focusKeyword    = "typescript sdk",
    robots          = "index,follow",
}, query: new Dictionary<string, string?> { ["locale"] = "en" });
```

### AI proposals

AI never writes to your content directly. It files a **proposal**; you review it and accept, reject, or undo. This is the loop every AI action follows.

```csharp
// 1. See what is waiting.
var pending = await cms.AI.ProposalsCountAsync(new Dictionary<string, string?> { ["status"] = "pending" });

// 2. Read them.
var list = await cms.AI.ProposalsGETAsync(new Dictionary<string, string?>
{
    ["status"] = "pending",
    ["limit"] = "20",
});

// 3. Accept one — this writes through the normal domain service, so
//    validation, permissions and revisions all apply.
await cms.AI.ProposalsIdAcceptAsync("PROPOSAL_ID");

// 4. Changed your mind: the previous value is restored.
await cms.AI.ProposalsIdUndoAsync("PROPOSAL_ID");
```

Accepting a proposal whose entity changed in the meantime returns `409` rather than overwriting the newer content.

```csharp
// Bulk accept: the response carries a per-item result.
var bulk = await cms.AI.ProposalsBulkAcceptAsync(new { ids = new[] { "A", "B", "C" } });
// bulk.Data.Items: [{ id, status: "accepted" | "failed", reason? }, ...]
```

### Summarize text

```csharp
var res = await cms.AI.SummarizeAsync(query: new Dictionary<string, string?> { ["text"] = "Long article body…" });
Console.WriteLine(res.Data);
```

Or streamed, so the answer appears as it is written:

```csharp
await foreach (var frame in cms.AI.SummarizeLiveAsync(new { text = "Long article body…" }))
{
    if (frame.Event == "content_chunk") Console.Write(frame.Data);
}
```

### Check your AI balance before a bulk run

```csharp
var credits = await cms.AI.CreditsAsync();
Console.WriteLine(credits.Data); // { used, limit, remaining, ... }

var estimate = await cms.AI.EstimateAsync(new { action = "article.autofillMetadata" });
Console.WriteLine(estimate.Data); // { low, high } — a range, not a fixed price
```

A plan that runs out of quota returns `426` on every AI endpoint, including streaming ones.

### Use the low-level client

```csharp
var raw = await cms.Raw.RequestAsync("GET", "/articles/getAll",
    new Dictionary<string, string?> { ["page"] = "1" });
```

The low-level client returns the raw envelope from the API without the facade. Use it for endpoints the generated resources do not cover. It also exposes `client.StreamSSEAsync(method, path, ...)` for hand-written streaming calls.

---

## Documentation

- API reference: https://developers.octaviatech.app
- Product: https://octaviatech.app/products/ai-cms
- Website: https://octaviatech.app
- Examples (ASP.NET Core among others): https://github.com/octaviatech/octavia-ai-cms/tree/main/examples

---

## License

ISC