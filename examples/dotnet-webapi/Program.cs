using Octavia.CmsSDK;

var builder = WebApplication.CreateBuilder(args);
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

var app = builder.Build();
app.UseSwagger();
app.UseSwaggerUI();

string Value(string key, string fallback) => Environment.GetEnvironmentVariable(key) ?? fallback;
var octaviaKey = Value("OCTAVIA_API_KEY", builder.Configuration["Octavia:ApiKey"] ?? "");
var categoryId = Value("OCTAVIA_CATEGORY_ID", "");
var authorId = Value("OCTAVIA_AUTHOR_ID", "");
var cms = CMS.Init(octaviaKey, new CMSOptions { Timeout = TimeSpan.FromSeconds(10), ThrowOnError = false });

object MapArticle(System.Text.Json.JsonElement root)
{
    string id = root.TryGetProperty("id", out var idProp) ? idProp.GetString() ?? "" : "";
    string title = "";
    string body = "";
    if (root.TryGetProperty("mainTitle", out var mt))
    {
        if (mt.TryGetProperty("en", out var en)) title = en.GetString() ?? "";
        if (string.IsNullOrEmpty(title) && mt.TryGetProperty("fa", out var fa)) title = fa.GetString() ?? "";
    }
    if (root.TryGetProperty("body", out var bd))
    {
        if (bd.TryGetProperty("en", out var enb)) body = enb.GetString() ?? "";
        if (string.IsNullOrEmpty(body) && bd.TryGetProperty("fa", out var fab)) body = fab.GetString() ?? "";
    }
    var status = root.TryGetProperty("isPublished", out var p) && p.GetBoolean() ? "published" : "draft";
    var createdAt = root.TryGetProperty("createdAt", out var c) ? c.GetString() ?? "" : "";
    return new { id, title, body, locale = "en", status, createdAt };
}

app.MapGet("/demo/content", async () =>
{
    var res = await cms.Article.GetAllAsync(new Dictionary<string, string?> { ["page"] = "1", ["limit"] = "20", ["sortOrder"] = "desc" });
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });
    var items = new List<object>();
    if (res.Data is not null && res.Data.Value.TryGetProperty("items", out var list))
    {
        foreach (var it in list.EnumerateArray()) items.Add(MapArticle(it));
    }
    return Results.Json(items);
});

app.MapPost("/demo/content", async (HttpRequest request) =>
{
    var payload = await request.ReadFromJsonAsync<object>();
    var data = payload as Dictionary<string, object?> ?? new Dictionary<string, object?>();
    var title = data.TryGetValue("title", out var t) ? t?.ToString() ?? "Untitled" : "Untitled";
    var body = data.TryGetValue("body", out var b) ? b?.ToString() ?? "" : "";
    var locale = data.TryGetValue("locale", out var l) ? l?.ToString() ?? "en" : "en";
    var lang = locale.StartsWith("fa", StringComparison.OrdinalIgnoreCase) ? "fa" : "en";
    var res = await cms.Article.CreateAsync(new
    {
        mainTitle = new Dictionary<string, string> { [lang] = title },
        body = new Dictionary<string, string> { [lang] = body },
        category = categoryId,
        author = authorId
    });
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });
    return Results.Json(res.Data is null ? new { } : MapArticle(res.Data.Value));
});

app.MapPost("/demo/content/{id}/publish", async (string id) =>
{
    var res = await cms.Article.ArchiveAsync(new { id });
    if (!res.Ok) return Results.BadRequest(new { error = res.Error?.Message });
    return Results.Json(res.Data);
});

app.Run();
