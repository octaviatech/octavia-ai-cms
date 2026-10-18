using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class SEOHubResource
{
    private readonly Client _client;

    public SEOHubResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<SeoAuditReport>> AuditAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SeoAuditReport>("GET", "/seo/audit", query, null);
    }

    public Task<CMSResponse<CannibalizationReport>> CannibalizationAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CannibalizationReport>("GET", "/seo/cannibalization", query, null);
    }

    public Task<CMSResponse<RefreshCandidateReport>> RefreshAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<RefreshCandidateReport>("GET", "/seo/refresh", query, null);
    }

    public Task<CMSResponse<RefreshPlanItemWrapper>> RefreshArticleIdPlanItemAsync(string articleId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<RefreshPlanItemWrapper>("POST", "/seo/refresh/" + Uri.EscapeDataString(articleId) + "/plan-item", query, null);
    }

    public Task<CMSResponse<HreflangWrapper>> HreflangArticleIdAsync(string articleId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<HreflangWrapper>("GET", "/seo/hreflang/" + Uri.EscapeDataString(articleId) + "", query, null);
    }

    public Task<CMSResponse<RedirectList>> RedirectsAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<RedirectList>("GET", "/seo/redirects", query, null);
    }

    public Task<CMSResponse<TranslationCoverageReport>> TranslationCoverageAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TranslationCoverageReport>("GET", "/seo/translation-coverage", query, null);
    }

    public Task<CMSResponse<ContentTypeProfileWrapper>> ContentTypesAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ContentTypeProfileWrapper>("GET", "/seo/content-types", query, null);
    }

}
