using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class SubcategoriesResource
{
    private readonly Client _client;

    public SubcategoriesResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<SubCategoryWrapper>> CreateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubCategoryWrapper>("POST", "/subcategories/create", query, body);
    }

    public Task<CMSResponse<SubCategoryWrapper>> UpdateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubCategoryWrapper>("PUT", "/subcategories/update", query, body);
    }

    public Task<CMSResponse<JsonElement>> DeleteIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("DELETE", "/subcategories/delete/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<SubCategoryList>> GetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubCategoryList>("GET", "/subcategories/getAll", query, null);
    }

    public Task<CMSResponse<SubCategoryWrapper>> GetByIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubCategoryWrapper>("GET", "/subcategories/getById/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<SubCategoryWrapper>> GetBySlugAsync(string slug, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubCategoryWrapper>("GET", "/subcategories/getBySlug/" + Uri.EscapeDataString(slug) + "", query, null);
    }

    public Task<CMSResponse<SubCategoryList>> GetByCategoryIdAsync(string categoryId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubCategoryList>("GET", "/subcategories/getByCategoryId/" + Uri.EscapeDataString(categoryId) + "", query, null);
    }

}
