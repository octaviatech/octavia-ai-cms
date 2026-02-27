var builder = WebApplication.CreateBuilder(args);
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

var app = builder.Build();
app.UseSwagger();
app.UseSwaggerUI();

string Value(string key, string fallback) => Environment.GetEnvironmentVariable(key) ?? fallback;
var octaviaBase = Value("OCTAVIA_API_BASE_URL", builder.Configuration["Octavia:ApiBaseUrl"] ?? "").TrimEnd('/');
var octaviaKey = Value("OCTAVIA_API_KEY", builder.Configuration["Octavia:ApiKey"] ?? "");
var projectId = Value("OCTAVIA_PROJECT_ID", builder.Configuration["Octavia:ProjectId"] ?? "");

HttpRequestMessage Build(string path, HttpMethod method, object? payload = null)
{
    var msg = new HttpRequestMessage(method, $"{octaviaBase}{path}");
    msg.Headers.Add("Authorization", $"Bearer {octaviaKey}");
    msg.Headers.Add("x-octavia-project-id", projectId);
    if (payload is not null)
    {
        msg.Content = new StringContent(System.Text.Json.JsonSerializer.Serialize(payload), System.Text.Encoding.UTF8, "application/json");
    }
    return msg;
}

app.MapGet("/demo/content", async () =>
{
    using var client = new HttpClient();
    using var req = Build("/v1/cms/content", HttpMethod.Get);
    var res = await client.SendAsync(req);
    var body = await res.Content.ReadAsStringAsync();
    return Results.Content(body, "application/json", (int)res.StatusCode);
});

app.MapPost("/demo/content", async (HttpRequest request) =>
{
    var payload = await request.ReadFromJsonAsync<object>();
    using var client = new HttpClient();
    using var req = Build("/v1/cms/content", HttpMethod.Post, payload);
    var res = await client.SendAsync(req);
    var body = await res.Content.ReadAsStringAsync();
    return Results.Content(body, "application/json", (int)res.StatusCode);
});

app.MapPost("/demo/content/{id}/publish", async (string id) =>
{
    using var client = new HttpClient();
    using var req = Build($"/v1/cms/content/{id}/publish", HttpMethod.Post);
    var res = await client.SendAsync(req);
    var body = await res.Content.ReadAsStringAsync();
    return Results.Content(body, "application/json", (int)res.StatusCode);
});

app.Run();
