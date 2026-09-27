using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class CategoriesResource
{
    private readonly Client _client;

    public CategoriesResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<CategoryWrapper>> CreateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CategoryWrapper>("POST", "/categories/create", query, body);
    }

    public Task<CMSResponse<CategoryWrapper>> UpdateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CategoryWrapper>("PUT", "/categories/update", query, body);
    }

    public Task<CMSResponse<CategoryDeleteResult>> DeleteIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CategoryDeleteResult>("DELETE", "/categories/delete/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<CategoryList>> GetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CategoryList>("GET", "/categories/getAll", query, null);
    }

    public Task<CMSResponse<CategoryWrapper>> GetByIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CategoryWrapper>("GET", "/categories/getById/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<CategoryWrapper>> GetBySlugAsync(string slug, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CategoryWrapper>("GET", "/categories/getBySlug/" + Uri.EscapeDataString(slug) + "", query, null);
    }

}
