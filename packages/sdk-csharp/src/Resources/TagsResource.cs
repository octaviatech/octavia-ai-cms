using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class TagsResource
{
    private readonly Client _client;

    public TagsResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<TagWrapper>> CreateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TagWrapper>("POST", "/tags/create", query, body);
    }

    public Task<CMSResponse<TagList>> GetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TagList>("GET", "/tags/getAll", query, null);
    }

    public Task<CMSResponse<TagSearchResult>> SearchAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TagSearchResult>("GET", "/tags/search", query, null);
    }

}
