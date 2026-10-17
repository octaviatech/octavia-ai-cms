using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class AIResource
{
    private readonly Client _client;

    public AIResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<AiSummaryResult>> SummarizeAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiSummaryResult>("POST", "/ai/summarize", query, body);
    }

    public Task<CMSResponse<JsonElement>> SummarizeStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/summarize/stream", query, body);
    }

    public Task<CMSResponse<JsonElement>> SummarizeArticleStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/summarizeArticle/stream", query, body);
    }

    public Task<CMSResponse<AiSeoResult>> SeoOptimizeAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiSeoResult>("POST", "/ai/seoOptimize", query, body);
    }

    public Task<CMSResponse<JsonElement>> SeoOptimizeStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/seoOptimize/stream", query, body);
    }

    public Task<CMSResponse<AiTitleResult>> GenerateTitleAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiTitleResult>("POST", "/ai/generateTitle", query, body);
    }

    public Task<CMSResponse<AiTranslateResult>> TranslateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiTranslateResult>("POST", "/ai/translate", query, body);
    }

    public Task<CMSResponse<JsonElement>> TranslateStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/translate/stream", query, body);
    }

    public Task<CMSResponse<AiContentResult>> GenerateContentAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiContentResult>("POST", "/ai/generateContent", query, body);
    }

    public Task<CMSResponse<AiImageResult>> GenerateImageAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiImageResult>("POST", "/ai/generateImage", query, body);
    }

    public Task<CMSResponse<AiArticleSeoResult>> OptimizeArticleAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiArticleSeoResult>("POST", "/ai/optimizeArticle", query, body);
    }

    public Task<CMSResponse<JsonElement>> OptimizeArticleStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/optimizeArticle/stream", query, body);
    }

    public Task<CMSResponse<AiArticleTranslateResult>> TranslateArticleAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiArticleTranslateResult>("POST", "/ai/translateArticle", query, body);
    }

    public Task<CMSResponse<JsonElement>> TranslateArticleStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/translateArticle/stream", query, body);
    }

    public Task<CMSResponse<AiFormTranslateResult>> TranslateFormAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiFormTranslateResult>("POST", "/ai/translateForm", query, body);
    }

    public Task<CMSResponse<RepurposeResult>> RepurposeAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<RepurposeResult>("POST", "/ai/repurpose", query, body);
    }

    public Task<CMSResponse<JsonElement>> RepurposeStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/repurpose/stream", query, body);
    }

    public Task<CMSResponse<SocialTemplate>> RepurposeTemplateGETAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SocialTemplate>("GET", "/ai/repurpose/template", query, null);
    }

    public Task<CMSResponse<SocialTemplate>> RepurposeTemplatePUTAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SocialTemplate>("PUT", "/ai/repurpose/template", query, body);
    }

    public Task<CMSResponse<SocialConnectionList>> SocialConnectionsAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SocialConnectionList>("GET", "/ai/social/connections", query, null);
    }

    public Task<CMSResponse<SocialConnection>> SocialLinkedinConnectAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SocialConnection>("PUT", "/ai/social/linkedin/connect", query, body);
    }

    public Task<CMSResponse<SocialConnection>> SocialTelegramConnectAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SocialConnection>("PUT", "/ai/social/telegram/connect", query, body);
    }

    public Task<CMSResponse<SocialConnection>> SocialTwitterConnectAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SocialConnection>("PUT", "/ai/social/twitter/connect", query, body);
    }

    public Task<CMSResponse<SocialPublishResult>> SocialLinkedinPublishAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SocialPublishResult>("POST", "/ai/social/linkedin/publish", query, body);
    }

    public Task<CMSResponse<SocialPublishResult>> SocialTelegramPublishAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SocialPublishResult>("POST", "/ai/social/telegram/publish", query, body);
    }

    public Task<CMSResponse<SocialPublishResult>> SocialTwitterPublishAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SocialPublishResult>("POST", "/ai/social/twitter/publish", query, body);
    }

    public Task<CMSResponse<JsonElement>> CreditsAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("GET", "/ai/credits", query, null);
    }

    public Task<CMSResponse<JsonElement>> EstimateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/estimate", query, body);
    }

    public Task<CMSResponse<JsonElement>> RunAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/run", query, body);
    }

    public Task<CMSResponse<JsonElement>> ProposalsPOSTAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/proposals", query, body);
    }

    public Task<CMSResponse<JsonElement>> ProposalsGETAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("GET", "/ai/proposals", query, null);
    }

    public Task<CMSResponse<JsonElement>> ProposalsIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("GET", "/ai/proposals/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<JsonElement>> ProposalsIdAcceptAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/proposals/" + Uri.EscapeDataString(id) + "/accept", query, null);
    }

    public Task<CMSResponse<JsonElement>> ProposalsIdRejectAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/proposals/" + Uri.EscapeDataString(id) + "/reject", query, null);
    }

    public Task<CMSResponse<JsonElement>> ProposalsIdUndoAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/proposals/" + Uri.EscapeDataString(id) + "/undo", query, null);
    }

    public Task<CMSResponse<JsonElement>> ProposalsBulkAcceptAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/proposals/bulk-accept", query, body);
    }

    public Task<CMSResponse<JsonElement>> SettingsGETAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("GET", "/ai/settings", query, null);
    }

    public Task<CMSResponse<JsonElement>> SettingsPUTAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("PUT", "/ai/settings", query, body);
    }

    public Task<CMSResponse<JsonElement>> RevisionsArticleIdAsync(string articleId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("GET", "/articles/revisions/" + Uri.EscapeDataString(articleId) + "", query, null);
    }

    public Task<CMSResponse<JsonElement>> RevisionsArticleIdRevisionIdRestoreAsync(string articleId, string revisionId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/articles/revisions/" + Uri.EscapeDataString(articleId) + "/" + Uri.EscapeDataString(revisionId) + "/restore", query, null);
    }

}
