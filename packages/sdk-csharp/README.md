# Octavia.CmsSDK

Typed .NET client for the **Octavia AI CMS API** — articles, categories, tags, forms, submissions, AI automation, social publishing and analytics, behind one client and one response shape.

- Generated from the OpenAPI spec, so it covers **every** public operation.
- **Zero third-party dependencies** — `System.Text.Json` only.
- .NET 8+, nullable reference types enabled.

---

## Install

```bash
dotnet add package Octavia.CmsSDK
```

---

## Quick start

```csharp
using Octavia.CmsSDK;

var cms = CMS.Init("your-api-key");

var res = await cms.Article.CreateAsync(new
{
    mainTitle = new { en = "Hello" },
    body = new { en = "Content" },
    category = new[] { "CATEGORY_ID" },
    author = "AUTHOR_ID",
});

if (!res.Ok)
{
    throw new Exception(res.Error?.Message ?? "Request failed");
}

Console.WriteLine(res.Data?.Article?.Slug);
```

---

## Authentication

The API key is the only credential, and it is required. There is no OAuth, no refresh token and no header option — the key is sent as the `x-api-key` header on every request, and that is the entire authentication story.

The base URL is fixed to `https://api.octaviatech.app/cms` (exposed as `CMSConstants.BaseUrl`), so there is nothing to configure. Your tenant and the service status are resolved by the gateway from your key; you never send them.

Get a key:

1. Sign up at [octaviatech.app](https://octaviatech.app)
2. Dashboard → your service → **API Keys** → Create key

> Keep the key server-side. Read it from configuration, never hard-code it.

```csharp
var apiKey = Environment.GetEnvironmentVariable("OCTAVIA_API_KEY")
    ?? throw new InvalidOperationException("OCTAVIA_API_KEY is not set");

var cms = CMS.Init(apiKey);
```

---

## Initialize

```csharp
var cms = CMS.Init("your-api-key", new CMSOptions
{
    Timeout = TimeSpan.FromSeconds(30),
    ThrowOnError = false,
});
```

| Option         | Type       | Default    | Notes                                                      |
| -------------- | ---------- | ---------- | ---------------------------------------------------------- |
| `Timeout`      | `TimeSpan` | 30 seconds | Per-request timeout.                                       |
| `ThrowOnError` | `bool`     | `false`    | `false` returns `Ok = false`; `true` throws an `ApiError`. |

`CMS.Init` returns a facade. `cms.Raw` is the underlying `Client` if you need an endpoint the generated resources do not cover yet.

---

## Response shape

Every method returns `CMSResponse<T>`, with `T` bound to the endpoint's model:

```csharp
public sealed record CMSResponse<T>(
    bool Ok,
    T? Data,
    CMSError? Error = null,
    CMSMeta? Meta = null);
```

```csharp
var res = await cms.Article.GetAllAsync(new Dictionary<string, string?>
{
    ["page"] = "1",
    ["limit"] = "10",
});

if (!res.Ok)
{
    Console.Error.WriteLine($"{res.Error?.StatusCode}: {res.Error?.Message}");
    return;
}

foreach (var item in res.Data?.ArticleListItem ?? [])
{
    Console.WriteLine(item.Slug);
}
```

### Errors

With the default `ThrowOnError = false` you check `res.Ok`. Set it to `true` and the call throws an `ApiError`:

```csharp
try
{
    await cms.Article.GetByIdAsync("6810f2c3a1b2c3d4e5f60718");
}
catch (ApiError err)
{
    Console.Error.WriteLine($"{err.Status}: {err.Message}");
    Console.Error.WriteLine(err.Payload);
}
```

| Status | Meaning                          | Retry?                                                           |
| ------ | -------------------------------- | ---------------------------------------------------------------- |
| `400`  | Invalid request or missing field | No — fix the request                                             |
| `401`  | Missing or invalid API key       | No                                                               |
| `403`  | Key valid, role not permitted    | No                                                               |
| `404`  | Record not found                 | No                                                               |
| `426`  | Plan quota exhausted             | No — upgrade, wait for the period to roll over, or free up quota |
| `429`  | Transient rate limit             | Yes, after the interval in `retry-after`                         |

---

## Query parameters

Filters go in the query dictionary, passed as the first argument to read methods:

```csharp
var res = await cms.Article.GetAllAsync(new Dictionary<string, string?>
{
    ["page"] = "1",
    ["limit"] = "10",
    ["category"] = "CATEGORY_ID",
});

var hits = await cms.Article.SearchAsync(new Dictionary<string, string?>
{
    ["keyword"] = "typescript",
    ["limit"] = "5",
});
```

Write methods take the body as an anonymous object:

```csharp
await cms.Article.UpdateAsync(new
{
    id = "ARTICLE_ID",
    mainTitle = new { en = "Updated" },
});
```

---

## Resources

| Property             | Covers                                                  |
| -------------------- | ------------------------------------------------------- |
| `cms.Article`        | Articles, comments, reactions, engagement settings      |
| `cms.Author`         | Authors                                                 |
| `cms.Category`       | Categories                                              |
| `cms.Subcategory`    | Subcategories                                           |
| `cms.Tag`            | Tags                                                    |
| `cms.Form`           | Forms and captcha configuration                         |
| `cms.FormSubmission` | Submissions and their article relations                 |
| `cms.Language`       | Languages                                               |
| `cms.AI`             | Summarize, translate, SEO, repurpose, social publishing |
| `cms.AIConversation` | Multi-turn article drafting                             |
| `cms.Report`         | Statistics, charts, dashboard configuration             |
| `cms.Raw`            | The unwrapped client                                    |

Method names follow the route segments as generated, including the ones that read as a verb and a method together — `IdReactionPOSTAsync`, `EngagementSettingsPUTAsync`. The API reference lists every operation under its route.

---

## Common tasks

### Paginate

```csharp
var first = await cms.Article.GetAllAsync(new Dictionary<string, string?>
{
    ["page"] = "1",
    ["limit"] = "20",
});

Console.WriteLine(first.Data?.Pagination?.Total);
```

### Create multilingual content

`category` and `subCategory` take **arrays of IDs**, even when you have one. Text fields are maps from language code to string.

```csharp
await cms.Article.CreateAsync(new
{
    mainTitle = new { en = "Hello", es = "Hola" },
    body = new { en = "Content", es = "Contenido" },
    category = new[] { "6810f2c3a1b2c3d4e5f60718" },
    subCategory = new[] { "6810f2c3a1b2c3d4e5f60719" },
    author = "6810f2c3a1b2c3d4e5f60720",
});
```

Only languages registered through `cms.Language.CreateAsync` can be written.

### Summarize text

```csharp
var res = await cms.AI.SummarizeAsync(new Dictionary<string, string?>
{
    ["text"] = "Long article body…",
});

Console.WriteLine(res.Data);
```

### Dependency injection

`Client` takes a `ClientConfig`, so you can register it and build the facade yourself:

```csharp
services.AddSingleton(_ =>
{
    var client = new Client(new ClientConfig(CMSConstants.BaseUrl, apiKey));
    return new CMS(client);
});
```

---

## Cancellation

Pass a `CancellationToken` through `HttpClient`'s timeout, or call the low-level client when you need per-call cancellation:

```csharp
var raw = await cms.Raw.RequestAsync(HttpMethod.Get, "/articles/getAll",
    query: new Dictionary<string, string?> { ["page"] = "1" });
```

---

## Documentation

- API reference: https://developers.octaviatech.app
- Dashboard and API keys: https://octaviatech.app

---

## License

ISC
