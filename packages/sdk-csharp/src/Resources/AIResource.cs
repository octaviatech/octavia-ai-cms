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

    /// <summary>
    /// Streams this endpoint as Server-Sent Events (D-24), yielding one
    /// <see cref="SseEvent"/> per frame as it arrives.
    /// </summary>
    public IAsyncEnumerable<SseEvent> SummarizeLiveAsync(object body, Dictionary<string, string?>? query = null, CancellationToken cancellationToken = default)
    {
        return _client.StreamSSEAsync("POST", "/ai/summarize/stream", query, body, cancellationToken);
    }

    public Task<CMSResponse<JsonElement>> SummarizeArticleStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/summarizeArticle/stream", query, body);
    }

    /// <summary>
    /// Streams this endpoint as Server-Sent Events (D-24), yielding one
    /// <see cref="SseEvent"/> per frame as it arrives.
    /// </summary>
    public IAsyncEnumerable<SseEvent> SummarizeArticleLiveAsync(object body, Dictionary<string, string?>? query = null, CancellationToken cancellationToken = default)
    {
        return _client.StreamSSEAsync("POST", "/ai/summarizeArticle/stream", query, body, cancellationToken);
    }

    public Task<CMSResponse<AiSeoResult>> SeoOptimizeAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiSeoResult>("POST", "/ai/seoOptimize", query, body);
    }

    public Task<CMSResponse<JsonElement>> SeoOptimizeStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/seoOptimize/stream", query, body);
    }

    /// <summary>
    /// Streams this endpoint as Server-Sent Events (D-24), yielding one
    /// <see cref="SseEvent"/> per frame as it arrives.
    /// </summary>
    public IAsyncEnumerable<SseEvent> SeoOptimizeLiveAsync(object body, Dictionary<string, string?>? query = null, CancellationToken cancellationToken = default)
    {
        return _client.StreamSSEAsync("POST", "/ai/seoOptimize/stream", query, body, cancellationToken);
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

    /// <summary>
    /// Streams this endpoint as Server-Sent Events (D-24), yielding one
    /// <see cref="SseEvent"/> per frame as it arrives.
    /// </summary>
    public IAsyncEnumerable<SseEvent> TranslateLiveAsync(object body, Dictionary<string, string?>? query = null, CancellationToken cancellationToken = default)
    {
        return _client.StreamSSEAsync("POST", "/ai/translate/stream", query, body, cancellationToken);
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

    public Task<CMSResponse<AiAutofillResult>> AutofillArticleAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiAutofillResult>("POST", "/ai/autofillArticle", query, body);
    }

    public Task<CMSResponse<JsonElement>> OptimizeArticleStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/optimizeArticle/stream", query, body);
    }

    /// <summary>
    /// Streams this endpoint as Server-Sent Events (D-24), yielding one
    /// <see cref="SseEvent"/> per frame as it arrives.
    /// </summary>
    public IAsyncEnumerable<SseEvent> OptimizeArticleLiveAsync(object body, Dictionary<string, string?>? query = null, CancellationToken cancellationToken = default)
    {
        return _client.StreamSSEAsync("POST", "/ai/optimizeArticle/stream", query, body, cancellationToken);
    }

    public Task<CMSResponse<AiArticleTranslateResult>> TranslateArticleAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiArticleTranslateResult>("POST", "/ai/translateArticle", query, body);
    }

    public Task<CMSResponse<JsonElement>> TranslateArticleStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/translateArticle/stream", query, body);
    }

    /// <summary>
    /// Streams this endpoint as Server-Sent Events (D-24), yielding one
    /// <see cref="SseEvent"/> per frame as it arrives.
    /// </summary>
    public IAsyncEnumerable<SseEvent> TranslateArticleLiveAsync(object body, Dictionary<string, string?>? query = null, CancellationToken cancellationToken = default)
    {
        return _client.StreamSSEAsync("POST", "/ai/translateArticle/stream", query, body, cancellationToken);
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

    /// <summary>
    /// Streams this endpoint as Server-Sent Events (D-24), yielding one
    /// <see cref="SseEvent"/> per frame as it arrives.
    /// </summary>
    public IAsyncEnumerable<SseEvent> RepurposeLiveAsync(object body, Dictionary<string, string?>? query = null, CancellationToken cancellationToken = default)
    {
        return _client.StreamSSEAsync("POST", "/ai/repurpose/stream", query, body, cancellationToken);
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

    public Task<CMSResponse<CreditSnapshot>> CreditsAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CreditSnapshot>("GET", "/ai/credits", query, null);
    }

    public Task<CMSResponse<TokenEstimate>> EstimateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TokenEstimate>("POST", "/ai/estimate", query, body);
    }

    public Task<CMSResponse<JsonElement>> RunAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/run", query, body);
    }

    public Task<CMSResponse<AiRunList>> CreditsRunsAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiRunList>("GET", "/ai/credits/runs", query, null);
    }

    public Task<CMSResponse<JsonElement>> EventsStreamAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("GET", "/ai/events/stream", query, null);
    }

    /// <summary>
    /// Streams this endpoint as Server-Sent Events (D-24), yielding one
    /// <see cref="SseEvent"/> per frame as it arrives.
    /// </summary>
    public IAsyncEnumerable<SseEvent> EventsLiveAsync(Dictionary<string, string?>? query = null, CancellationToken cancellationToken = default)
    {
        return _client.StreamSSEAsync("GET", "/ai/events/stream", query, null, cancellationToken);
    }

    public Task<CMSResponse<AiProposal>> ProposalsPOSTAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiProposal>("POST", "/ai/proposals", query, body);
    }

    public Task<CMSResponse<List<AiProposal>>> ProposalsGETAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<List<AiProposal>>("GET", "/ai/proposals", query, null);
    }

    public Task<CMSResponse<AiProposalCount>> ProposalsCountAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiProposalCount>("GET", "/ai/proposals/count", query, null);
    }

    public Task<CMSResponse<AiProposal>> ProposalsIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiProposal>("GET", "/ai/proposals/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<AiProposalDecision>> ProposalsIdAcceptAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiProposalDecision>("POST", "/ai/proposals/" + Uri.EscapeDataString(id) + "/accept", query, null);
    }

    public Task<CMSResponse<AiProposal>> ProposalsIdRejectAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiProposal>("POST", "/ai/proposals/" + Uri.EscapeDataString(id) + "/reject", query, null);
    }

    public Task<CMSResponse<AiProposal>> ProposalsIdUndoAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiProposal>("POST", "/ai/proposals/" + Uri.EscapeDataString(id) + "/undo", query, null);
    }

    public Task<CMSResponse<List<AiProposalBulkResultItem>>> ProposalsBulkAcceptAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<List<AiProposalBulkResultItem>>("POST", "/ai/proposals/bulk-accept", query, body);
    }

    public Task<CMSResponse<AiSettings>> SettingsGETAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiSettings>("GET", "/ai/settings", query, null);
    }

    public Task<CMSResponse<AiSettings>> SettingsPUTAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiSettings>("PUT", "/ai/settings", query, body);
    }

    public Task<CMSResponse<ArticleRevisionList>> RevisionsArticleIdAsync(string articleId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleRevisionList>("GET", "/articles/revisions/" + Uri.EscapeDataString(articleId) + "", query, null);
    }

    public Task<CMSResponse<ArticleRevisionRestore>> RevisionsArticleIdRevisionIdRestoreAsync(string articleId, string revisionId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleRevisionRestore>("POST", "/articles/revisions/" + Uri.EscapeDataString(articleId) + "/" + Uri.EscapeDataString(revisionId) + "/restore", query, null);
    }

    public Task<CMSResponse<ArticleReadiness>> ReadinessArticleIdAsync(string articleId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleReadiness>("GET", "/articles/readiness/" + Uri.EscapeDataString(articleId) + "", query, null);
    }

    public Task<CMSResponse<TranslationStateReport>> TranslationStateArticleIdAsync(string articleId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TranslationStateReport>("GET", "/articles/translation-state/" + Uri.EscapeDataString(articleId) + "", query, null);
    }

    public Task<CMSResponse<TranslationStateDoc>> TranslationStateArticleIdLocaleCompleteAsync(string articleId, string locale, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TranslationStateDoc>("POST", "/articles/translation-state/" + Uri.EscapeDataString(articleId) + "/" + Uri.EscapeDataString(locale) + "/complete", query, body);
    }

}
