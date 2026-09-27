using System.Net.Http.Headers;
using System.Text;
using System.Text.Json;
using System.Text.Json.Serialization;
using Octavia.CmsSDK.Resources;

namespace Octavia.CmsSDK;

public sealed class ApiError : Exception
{
    public int Status { get; }
    public string? Payload { get; }

    public ApiError(string message, int status, string? payload = null) : base(message)
    {
        Status = status;
        Payload = payload;
    }
}

public sealed record CMSError(string Message, int? StatusCode = null);
public sealed record CMSMeta(JsonElement? Pagination = null);

/// <param name="T">
/// The payload model. Endpoints that answer with a free-form object use
/// <see cref="JsonElement"/> rather than a generated record.
/// </param>
public sealed record CMSResponse<T>(
    bool Ok,
    T? Data,
    CMSError? Error = null,
    CMSMeta? Meta = null
);

public sealed class ClientConfig
{
    public string BaseUrl { get; }
    public string ApiKey { get; }
    public TimeSpan? Timeout { get; }
    public bool ThrowOnError { get; }

    public ClientConfig(string baseUrl, string apiKey, TimeSpan? timeout = null, bool throwOnError = false)
    {
        if (string.IsNullOrWhiteSpace(baseUrl)) throw new ArgumentException("baseUrl is required", nameof(baseUrl));
        if (string.IsNullOrWhiteSpace(apiKey)) throw new ArgumentException("apiKey is required", nameof(apiKey));

        BaseUrl = baseUrl.TrimEnd('/');
        ApiKey = apiKey;
        Timeout = timeout;
        ThrowOnError = throwOnError;
    }
}

public sealed class Client
{
    // Property names on the wire are camelCase; the models carry
    // JsonPropertyName, but a Dictionary payload (values, relation maps) has
    // no attributes, so case-insensitive matching is the fallback. Enums are
    // declared with EnumMember values matching the wire strings, which
    // JsonStringEnumConverter honours.
    private static readonly JsonSerializerOptions JsonOptions = new()
    {
        PropertyNameCaseInsensitive = true,
        Converters = { new JsonStringEnumConverter() },
    };

    // @generated fields:begin
    public AIResource AI { get; }
    public AIConversationResource AIConversation { get; }
    public ArticlesResource Articles { get; }
    public AuthorsResource Authors { get; }
    public CategoriesResource Categories { get; }
    public FormsResource Forms { get; }
    public FormSubmissionsResource FormSubmissions { get; }
    public LanguagesResource Languages { get; }
    public ReportsResource Reports { get; }
    public SubcategoriesResource Subcategories { get; }
    public TagsResource Tags { get; }
    // @generated fields:end

    private readonly ClientConfig _config;
    private readonly HttpClient _http;

    public Client(ClientConfig config, HttpClient? httpClient = null)
    {
        _config = config;
        _http = httpClient ?? new HttpClient();

        if (_config.Timeout.HasValue)
        {
            _http.Timeout = _config.Timeout.Value;
        }

        // @generated ctor:begin
        AI = new AIResource(this);
        AIConversation = new AIConversationResource(this);
        Articles = new ArticlesResource(this);
        Authors = new AuthorsResource(this);
        Categories = new CategoriesResource(this);
        Forms = new FormsResource(this);
        FormSubmissions = new FormSubmissionsResource(this);
        Languages = new LanguagesResource(this);
        Reports = new ReportsResource(this);
        Subcategories = new SubcategoriesResource(this);
        Tags = new TagsResource(this);
        // @generated ctor:end
    }

    public async Task<CMSResponse<JsonElement>> RequestAsync(string method, string path, Dictionary<string, string?>? query = null, object? body = null)
    {
        return await RequestAsync<JsonElement>(method, path, query, body);
    }

    /// <summary>
    /// Sends the request and deserializes the envelope's <c>data</c> into
    /// <typeparamref name="T"/>. Every resource method names the model its
    /// endpoint returns, so a server-side field change surfaces at compile time
    /// here rather than as a null at the call site.
    /// </summary>
    public async Task<CMSResponse<T>> RequestAsync<T>(string method, string path, Dictionary<string, string?>? query = null, object? body = null)
    {
        var url = _config.BaseUrl + path + BuildQuery(query);

        using var req = new HttpRequestMessage(new HttpMethod(method), url);
        req.Headers.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
        req.Headers.Add("x-api-key", _config.ApiKey);

        if (body != null)
        {
            var json = JsonSerializer.Serialize(body);
            req.Content = new StringContent(json, Encoding.UTF8, "application/json");
        }

        using var res = await _http.SendAsync(req);
        var payload = await res.Content.ReadAsStringAsync();

        if (!res.IsSuccessStatusCode)
        {
            var msg = TryGetMessage(payload) ?? $"Request failed with status {(int)res.StatusCode}";
            if (_config.ThrowOnError)
            {
                throw new ApiError(msg, (int)res.StatusCode, payload);
            }

            return new CMSResponse<T>(false, default, new CMSError(msg, (int)res.StatusCode));
        }

        return ParseResponse<T>(payload);
    }

    public Task<CMSResponse<JsonElement>> HealthAsync() => RequestAsync<JsonElement>("GET", "/healthz");

    private static string BuildQuery(Dictionary<string, string?>? query)
    {
        if (query == null || query.Count == 0) return string.Empty;

        var parts = new List<string>();
        foreach (var kv in query)
        {
            if (kv.Value == null) continue;
            parts.Add($"{Uri.EscapeDataString(kv.Key)}={Uri.EscapeDataString(kv.Value)}");
        }

        return parts.Count == 0 ? string.Empty : "?" + string.Join("&", parts);
    }

    private static string? TryGetMessage(string payload)
    {
        try
        {
            using var doc = JsonDocument.Parse(payload);
            if (doc.RootElement.TryGetProperty("message", out var msg))
            {
                return msg.GetString();
            }
        }
        catch
        {
            // ignore parse failures for non-json payloads
        }

        return null;
    }

    private static CMSResponse<T> ParseResponse<T>(string payload)
    {
        try
        {
            using var doc = JsonDocument.Parse(payload);
            var root = doc.RootElement;

            if (root.TryGetProperty("success", out var successProp) && root.TryGetProperty("data", out var dataProp))
            {
                var ok = successProp.ValueKind == JsonValueKind.True;
                CMSMeta? meta = null;

                if (dataProp.ValueKind == JsonValueKind.Object && dataProp.TryGetProperty("pagination", out var pg))
                {
                    meta = new CMSMeta(pg.Clone());
                }

                return new CMSResponse<T>(ok, Deserialize<T>(dataProp), null, meta);
            }

            return new CMSResponse<T>(true, Deserialize<T>(root));
        }
        catch
        {
            return new CMSResponse<T>(true, default);
        }
    }

    private static T? Deserialize<T>(JsonElement element)
    {
        // A null or absent payload stays null instead of deserializing into an
        // empty model, so `Data is null` keeps meaning "the server sent nothing".
        if (element.ValueKind is JsonValueKind.Null or JsonValueKind.Undefined)
        {
            return default;
        }

        return element.Deserialize<T>(JsonOptions);
    }
}
