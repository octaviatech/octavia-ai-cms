using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

var builder = WebApplication.CreateBuilder(args);
var app = builder.Build();

string Value(string key, string fallback) => Environment.GetEnvironmentVariable(key) ?? fallback;

// The API key is the only credential. It is read here, on the server, and never
// returned to the client. The base URL is fixed inside the SDK, so there is
// nothing to configure and no project or tenant id to supply.
var octaviaKey = Value("OCTAVIA_API_KEY", builder.Configuration["Octavia:ApiKey"] ?? "");
var categoryId = Value("OCTAVIA_CATEGORY_ID", "");
var authorId = Value("OCTAVIA_AUTHOR_ID", "");
var cms = CMS.Init(octaviaKey, new CMSOptions { Timeout = TimeSpan.FromSeconds(10), ThrowOnError = false });

// The API returns a multilingual map. Read the first locale that is present
// rather than assuming one, since only registered locales can exist.
static (string Text, string Locale) PickText(Dictionary<string, string>? map)
{
    if (map is null) return ("", "en");
    foreach (var locale in new[] { "en", "fa" })
    {
        if (map.TryGetValue(locale, out var value) && !string.IsNullOrEmpty(value)) return (value, locale);
    }
    foreach (var pair in map)
    {
        if (!string.IsNullOrEmpty(pair.Value)) return (pair.Value, "en");
    }
    return ("", "en");
}

// `summary` is typed as an open map whose locales land in JsonExtensionData,
// so it needs reading through the raw JSON values rather than a dictionary.
// C# local functions cannot be overloaded, hence the distinct name.
static (string Text, string Locale) PickExtraText(MultilingualStringOrNull? map)
{
    if (map?.Extra is null) return ("", "en");
    foreach (var locale in new[] { "en", "fa" })
    {
        if (map.Extra.TryGetValue(locale, out var value)
            && value.ValueKind == JsonValueKind.String
            && !string.IsNullOrEmpty(value.GetString())) return (value.GetString()!, locale);
    }
    foreach (var pair in map.Extra)
    {
        if (pair.Value.ValueKind == JsonValueKind.String && !string.IsNullOrEmpty(pair.Value.GetString()))
            return (pair.Value.GetString()!, "en");
    }
    return ("", "en");
}

// `getAll` returns list items, which carry the title but not the full body —
// use `getById` when the body is needed.
app.MapGet("/demo/content", async () =>
{
    var res = await cms.Article.GetAllAsync(new Dictionary<string, string?>
    {
        ["page"] = "1",
        ["limit"] = "20",
        ["sortOrder"] = "desc",
    });
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });

    // List rows are keyed by resource name, not `items`.
    var items = res.Data?.ArticleListItem ?? Array.Empty<ArticleListItem>();
    return Results.Json(items.Select(a =>
    {
        var title = PickText(a.MainTitle);
        var summary = PickExtraText(a.Summary);
        return new
        {
            id = a.Id ?? "",
            title = title.Text,
            body = summary.Text,
            locale = title.Locale,
            status = a.IsPublished ? "published" : "draft",
            createdAt = a.CreatedAt.ToString("o"),
        };
    }).ToList());
});

app.MapPost("/demo/content", async (HttpRequest request) =>
{
    var data = await request.ReadFromJsonAsync<Dictionary<string, object?>>() ?? new();
    string Str(string key, string fallback) =>
        data.TryGetValue(key, out var v) && v?.ToString() is { Length: > 0 } s ? s : fallback;

    var lang = Str("locale", "en")[..2];
    var res = await cms.Article.CreateAsync(new
    {
        mainTitle = new Dictionary<string, string> { [lang] = Str("title", "Untitled") },
        content = new Dictionary<string, string> { [lang] = Str("body", "") },
        // `category` is an array of IDs even for a single category.
        category = new[] { categoryId },
        author = authorId,
        isPublished = false,
    });
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });
    if (res.Data?.Article is null) return Results.Json(new { });

    var article = res.Data.Article;
    var title = PickText(article.MainTitle);
    return Results.Json(new
    {
        id = article.Id ?? "",
        title = title.Text,
        body = PickText(article.Content).Text,
        locale = title.Locale,
        status = article.IsPublished ? "published" : "draft",
        createdAt = article.CreatedAt.ToString("o"),
    });
});

// There is no publish endpoint. Publishing is a field update; `archive` is a
// soft-delete and must not be used here.
app.MapPost("/demo/content/{id}/publish", async (string id) =>
{
    var res = await cms.Article.UpdateAsync(new { id, isPublished = true });
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });
    if (res.Data?.Article is null) return Results.Json(new { });

    var article = res.Data.Article;
    var title = PickText(article.MainTitle);
    return Results.Json(new
    {
        id = article.Id ?? "",
        title = title.Text,
        body = PickText(article.Content).Text,
        locale = title.Locale,
        status = article.IsPublished ? "published" : "draft",
        createdAt = article.CreatedAt.ToString("o"),
    });
});

// `forms/getAll` returns only a submissions count per form — no id, title or
// slug — so it cannot drive a form picker. `getById` returns the real form.
app.MapGet("/demo/forms/{id}", async (string id) =>
{
    var res = await cms.Form.GetByIdAsync(id);
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });
    if (res.Data?.Form is null) return Results.Json(new { });

    var form = res.Data.Form;
    var title = PickText(form.Title);
    return Results.Json(new
    {
        id = form.Id,
        title = title.Text,
        slug = form.Slug,
        isActive = form.IsActive,
        sections = form.Sections?.Length ?? 0,
    });
});
app.MapGet("/demo/content/{id}", async (string id) =>
{
    var res = await cms.Article.GetByIdAsync(id);
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });
    if (res.Data?.Article is null) return Results.Json(new { });

    var article = res.Data.Article;
    var title = PickText(article.MainTitle);
    return Results.Json(new
    {
        id = article.Id ?? "",
        title = title.Text,
        body = PickText(article.Content).Text,
        locale = title.Locale,
        status = article.IsPublished ? "published" : "draft",
        createdAt = article.CreatedAt.ToString("o"),
    });
});

app.MapPost("/demo/forms/{id}/submit", async (string id, HttpRequest request) =>
{
    var payload = await request.ReadFromJsonAsync<Dictionary<string, object?>>() ?? new();
    var language = payload.TryGetValue("language", out var lang) ? lang?.ToString() ?? "en" : "en";
    var values = payload.TryGetValue("values", out var vals) && vals is not null ? vals : payload;
    var res = await cms.FormSubmission.IdSubmitAsync(id, new { language, values });
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });
    return Results.Json(res.Data);
});

app.MapGet("/demo/reports/statistics", async () =>
{
    var res = await cms.Report.GetStatisticsAsync();
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });
    return Results.Json(res.Data);
});

app.MapPost("/demo/ai/summarize", async (HttpRequest request) =>
{
    var payload = await request.ReadFromJsonAsync<Dictionary<string, object?>>() ?? new();
    var text = payload.TryGetValue("text", out var t) ? t?.ToString() ?? "" : "";
    var res = await cms.AI.SummarizeAsync(new { text, maxWords = 80 });
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });
    return Results.Json(res.Data);
});

app.Run();
