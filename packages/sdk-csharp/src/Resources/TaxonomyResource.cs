using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class TaxonomyResource
{
    private readonly Client _client;

    public TaxonomyResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<TaxonomyAudit>> AuditAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TaxonomyAudit>("GET", "/taxonomy/audit", query, null);
    }

    public Task<CMSResponse<CategorySeoSuggestion>> CategorySeoAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CategorySeoSuggestion>("POST", "/taxonomy/category-seo", query, body);
    }

    public Task<CMSResponse<TagSuggestions>> SuggestTagsAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TagSuggestions>("POST", "/taxonomy/suggest-tags", query, body);
    }

    public Task<CMSResponse<TagMergeResult>> TagsMergeAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TagMergeResult>("POST", "/taxonomy/tags/merge", query, body);
    }

    public Task<CMSResponse<TagUsageRefresh>> TagsRefreshUsageAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TagUsageRefresh>("POST", "/taxonomy/tags/refreshUsage", query, null);
    }

    public Task<CMSResponse<AuthorBioSuggestion>> AuthorBioAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AuthorBioSuggestion>("POST", "/taxonomy/author-bio", query, body);
    }

    public Task<CMSResponse<AuthorSuggestions>> AuthorsSuggestAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AuthorSuggestions>("POST", "/taxonomy/authors/suggest", query, body);
    }

}
