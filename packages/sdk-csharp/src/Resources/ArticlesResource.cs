using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class ArticlesResource
{
    private readonly Client _client;

    public ArticlesResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<ArticleWrapper>> CreateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleWrapper>("POST", "/articles/create", query, body);
    }

    public Task<CMSResponse<ArticleWrapper>> UpdateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleWrapper>("PUT", "/articles/update", query, body);
    }

    public Task<CMSResponse<JsonElement>> ArchiveAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("PUT", "/articles/archive", query, body);
    }

    public Task<CMSResponse<JsonElement>> DeleteIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("DELETE", "/articles/delete/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<ArticleList>> GetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleList>("GET", "/articles/getAll", query, null);
    }

    public Task<CMSResponse<ArticleWrapper>> GetByIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleWrapper>("GET", "/articles/getById/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<ArticleWrapper>> GetBySlugAsync(string slug, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleWrapper>("GET", "/articles/getBySlug/" + Uri.EscapeDataString(slug) + "", query, null);
    }

    public Task<CMSResponse<ArticleList>> GetByCategoryIdAsync(string categoryId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleList>("GET", "/articles/getByCategoryId/" + Uri.EscapeDataString(categoryId) + "", query, null);
    }

    public Task<CMSResponse<ArticleList>> GetBySubCategoryIdAsync(string subCategoryId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleList>("GET", "/articles/getBySubCategoryId/" + Uri.EscapeDataString(subCategoryId) + "", query, null);
    }

    public Task<CMSResponse<ArticleList>> GetByAuthorIdAsync(string authorId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleList>("GET", "/articles/getByAuthorId/" + Uri.EscapeDataString(authorId) + "", query, null);
    }

    public Task<CMSResponse<ArticleList>> GetByTagAsync(string tag, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleList>("GET", "/articles/getByTag/" + Uri.EscapeDataString(tag) + "", query, null);
    }

    public Task<CMSResponse<ArticleList>> GetByCategorySlugAsync(string slug, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleList>("GET", "/articles/getByCategorySlug/" + Uri.EscapeDataString(slug) + "", query, null);
    }

    public Task<CMSResponse<ArticleList>> GetBySubCategorySlugAsync(string slug, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleList>("GET", "/articles/getBySubCategorySlug/" + Uri.EscapeDataString(slug) + "", query, null);
    }

    public Task<CMSResponse<ArticleList>> SearchAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleList>("GET", "/articles/search", query, null);
    }

    public Task<CMSResponse<ArticleList>> AdvanceSearchAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleList>("GET", "/articles/advanceSearch", query, null);
    }

    public Task<CMSResponse<SeoAnalysisResult>> SeoAnalysisIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SeoAnalysisResult>("GET", "/articles/seoAnalysis/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<ArticleReactionTotals>> IdReactionPOSTAsync(string id, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleReactionTotals>("POST", "/articles/" + Uri.EscapeDataString(id) + "/reaction", query, body);
    }

    public Task<CMSResponse<ArticleReactionTotals>> IdReactionDELETEAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleReactionTotals>("DELETE", "/articles/" + Uri.EscapeDataString(id) + "/reaction", query, null);
    }

    public Task<CMSResponse<ArticleReactionSummary>> IdReactionSummaryAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleReactionSummary>("GET", "/articles/" + Uri.EscapeDataString(id) + "/reactionSummary", query, null);
    }

    public Task<CMSResponse<CommentWrapper>> IdCommentsPOSTAsync(string id, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CommentWrapper>("POST", "/articles/" + Uri.EscapeDataString(id) + "/comments", query, body);
    }

    public Task<CMSResponse<CommentListWrapper>> IdCommentsGETAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CommentListWrapper>("GET", "/articles/" + Uri.EscapeDataString(id) + "/comments", query, null);
    }

    public Task<CMSResponse<ArticleList>> CommentsGetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleList>("GET", "/articles/comments/getAll", query, null);
    }

    public Task<CMSResponse<MinedQuestionsWrapper>> CommentsMinedQuestionsAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<MinedQuestionsWrapper>("GET", "/articles/comments/minedQuestions", query, null);
    }

    public Task<CMSResponse<EffectivePolicyWrapper>> CommentsEffectivePolicyAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<EffectivePolicyWrapper>("GET", "/articles/comments/effectivePolicy", query, null);
    }

    public Task<CMSResponse<AiRunAccepted>> CommentsCommentIdModerateAsync(string commentId, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiRunAccepted>("POST", "/articles/comments/" + Uri.EscapeDataString(commentId) + "/moderate", query, body);
    }

    public Task<CMSResponse<AiRunAccepted>> CommentsCommentIdReplyDraftAsync(string commentId, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiRunAccepted>("POST", "/articles/comments/" + Uri.EscapeDataString(commentId) + "/reply-draft", query, body);
    }

    public Task<CMSResponse<CommentWrapper>> CommentsCommentIdPATCHAsync(string commentId, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CommentWrapper>("PATCH", "/articles/comments/" + Uri.EscapeDataString(commentId) + "", query, body);
    }

    public Task<CMSResponse<JsonElement>> CommentsCommentIdDELETEAsync(string commentId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("DELETE", "/articles/comments/" + Uri.EscapeDataString(commentId) + "", query, null);
    }

    public Task<CMSResponse<CommentReactionTotals>> CommentsCommentIdReactionPOSTAsync(string commentId, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CommentReactionTotals>("POST", "/articles/comments/" + Uri.EscapeDataString(commentId) + "/reaction", query, body);
    }

    public Task<CMSResponse<CommentReactionTotals>> CommentsCommentIdReactionDELETEAsync(string commentId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CommentReactionTotals>("DELETE", "/articles/comments/" + Uri.EscapeDataString(commentId) + "/reaction", query, null);
    }

    public Task<CMSResponse<CommentReactionSummary>> CommentsCommentIdReactionSummaryAsync(string commentId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CommentReactionSummary>("GET", "/articles/comments/" + Uri.EscapeDataString(commentId) + "/reactionSummary", query, null);
    }

    public Task<CMSResponse<EngagementSettings>> EngagementSettingsGETAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<EngagementSettings>("GET", "/articles/engagementSettings", query, null);
    }

    public Task<CMSResponse<EngagementSettings>> EngagementSettingsPUTAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<EngagementSettings>("PUT", "/articles/engagementSettings", query, body);
    }

    public Task<CMSResponse<ArticleSeoMeta>> ArticleIdSeoGETAsync(string articleId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleSeoMeta>("GET", "/articles/" + Uri.EscapeDataString(articleId) + "/seo", query, null);
    }

    public Task<CMSResponse<ArticleSeoMeta>> ArticleIdSeoPUTAsync(string articleId, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ArticleSeoMeta>("PUT", "/articles/" + Uri.EscapeDataString(articleId) + "/seo", query, body);
    }

}
