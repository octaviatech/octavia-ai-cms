using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class AuthorsResource
{
    private readonly Client _client;

    public AuthorsResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<AuthorWrapper>> CreateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AuthorWrapper>("POST", "/authors/create", query, body);
    }

    public Task<CMSResponse<AuthorWrapper>> UpdateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AuthorWrapper>("PUT", "/authors/update", query, body);
    }

    public Task<CMSResponse<JsonElement>> DeleteIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("DELETE", "/authors/delete/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<AuthorList>> GetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AuthorList>("GET", "/authors/getAll", query, null);
    }

    public Task<CMSResponse<AuthorWrapper>> GetByIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AuthorWrapper>("GET", "/authors/getById/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<AuthorWrapper>> GetBySlugAsync(string slug, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AuthorWrapper>("GET", "/authors/getBySlug/" + Uri.EscapeDataString(slug) + "", query, null);
    }

}
