package sdk

import "net/url"

type ArticlesResource struct {
    client *Client
}

func (r *ArticlesResource) Create(body any, query map[string]any) CMSResponse[ArticleWrapper] {
    return RequestInto[ArticleWrapper](r.client, "POST", "/articles/create", query, body)
}

func (r *ArticlesResource) Update(body any, query map[string]any) CMSResponse[ArticleWrapper] {
    return RequestInto[ArticleWrapper](r.client, "PUT", "/articles/update", query, body)
}

func (r *ArticlesResource) Archive(body any, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "PUT", "/articles/archive", query, body)
}

func (r *ArticlesResource) DeleteId(id string, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "DELETE", "/articles/delete/" + url.PathEscape(id), query, nil)
}

func (r *ArticlesResource) GetAll(query map[string]any) CMSResponse[ArticleList] {
    return RequestInto[ArticleList](r.client, "GET", "/articles/getAll", query, nil)
}

func (r *ArticlesResource) GetById(id string, query map[string]any) CMSResponse[ArticleWrapper] {
    return RequestInto[ArticleWrapper](r.client, "GET", "/articles/getById/" + url.PathEscape(id), query, nil)
}

func (r *ArticlesResource) GetBySlug(slug string, query map[string]any) CMSResponse[ArticleWrapper] {
    return RequestInto[ArticleWrapper](r.client, "GET", "/articles/getBySlug/" + url.PathEscape(slug), query, nil)
}

func (r *ArticlesResource) GetByCategoryId(categoryId string, query map[string]any) CMSResponse[ArticleList] {
    return RequestInto[ArticleList](r.client, "GET", "/articles/getByCategoryId/" + url.PathEscape(categoryId), query, nil)
}

func (r *ArticlesResource) GetBySubCategoryId(subCategoryId string, query map[string]any) CMSResponse[ArticleList] {
    return RequestInto[ArticleList](r.client, "GET", "/articles/getBySubCategoryId/" + url.PathEscape(subCategoryId), query, nil)
}

func (r *ArticlesResource) GetByAuthorId(authorId string, query map[string]any) CMSResponse[ArticleList] {
    return RequestInto[ArticleList](r.client, "GET", "/articles/getByAuthorId/" + url.PathEscape(authorId), query, nil)
}

func (r *ArticlesResource) GetByTag(tag string, query map[string]any) CMSResponse[ArticleList] {
    return RequestInto[ArticleList](r.client, "GET", "/articles/getByTag/" + url.PathEscape(tag), query, nil)
}

func (r *ArticlesResource) GetByCategorySlug(slug string, query map[string]any) CMSResponse[ArticleList] {
    return RequestInto[ArticleList](r.client, "GET", "/articles/getByCategorySlug/" + url.PathEscape(slug), query, nil)
}

func (r *ArticlesResource) GetBySubCategorySlug(slug string, query map[string]any) CMSResponse[ArticleList] {
    return RequestInto[ArticleList](r.client, "GET", "/articles/getBySubCategorySlug/" + url.PathEscape(slug), query, nil)
}

func (r *ArticlesResource) Search(query map[string]any) CMSResponse[ArticleList] {
    return RequestInto[ArticleList](r.client, "GET", "/articles/search", query, nil)
}

func (r *ArticlesResource) AdvanceSearch(query map[string]any) CMSResponse[ArticleList] {
    return RequestInto[ArticleList](r.client, "GET", "/articles/advanceSearch", query, nil)
}

func (r *ArticlesResource) SeoAnalysisId(id string, query map[string]any) CMSResponse[SeoAnalysisResult] {
    return RequestInto[SeoAnalysisResult](r.client, "GET", "/articles/seoAnalysis/" + url.PathEscape(id), query, nil)
}

func (r *ArticlesResource) IdReactionPOST(id string, body any, query map[string]any) CMSResponse[ArticleReactionTotals] {
    return RequestInto[ArticleReactionTotals](r.client, "POST", "/articles/" + url.PathEscape(id) + "/reaction", query, body)
}

func (r *ArticlesResource) IdReactionDELETE(id string, query map[string]any) CMSResponse[ArticleReactionTotals] {
    return RequestInto[ArticleReactionTotals](r.client, "DELETE", "/articles/" + url.PathEscape(id) + "/reaction", query, nil)
}

func (r *ArticlesResource) IdReactionSummary(id string, query map[string]any) CMSResponse[ArticleReactionSummary] {
    return RequestInto[ArticleReactionSummary](r.client, "GET", "/articles/" + url.PathEscape(id) + "/reactionSummary", query, nil)
}

func (r *ArticlesResource) IdCommentsPOST(id string, body any, query map[string]any) CMSResponse[CommentWrapper] {
    return RequestInto[CommentWrapper](r.client, "POST", "/articles/" + url.PathEscape(id) + "/comments", query, body)
}

func (r *ArticlesResource) IdCommentsGET(id string, query map[string]any) CMSResponse[CommentListWrapper] {
    return RequestInto[CommentListWrapper](r.client, "GET", "/articles/" + url.PathEscape(id) + "/comments", query, nil)
}

func (r *ArticlesResource) CommentsGetAll(query map[string]any) CMSResponse[ArticleList] {
    return RequestInto[ArticleList](r.client, "GET", "/articles/comments/getAll", query, nil)
}

func (r *ArticlesResource) CommentsCommentIdPATCH(commentId string, body any, query map[string]any) CMSResponse[CommentWrapper] {
    return RequestInto[CommentWrapper](r.client, "PATCH", "/articles/comments/" + url.PathEscape(commentId), query, body)
}

func (r *ArticlesResource) CommentsCommentIdDELETE(commentId string, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "DELETE", "/articles/comments/" + url.PathEscape(commentId), query, nil)
}

func (r *ArticlesResource) CommentsCommentIdReactionPOST(commentId string, body any, query map[string]any) CMSResponse[CommentReactionTotals] {
    return RequestInto[CommentReactionTotals](r.client, "POST", "/articles/comments/" + url.PathEscape(commentId) + "/reaction", query, body)
}

func (r *ArticlesResource) CommentsCommentIdReactionDELETE(commentId string, query map[string]any) CMSResponse[CommentReactionTotals] {
    return RequestInto[CommentReactionTotals](r.client, "DELETE", "/articles/comments/" + url.PathEscape(commentId) + "/reaction", query, nil)
}

func (r *ArticlesResource) CommentsCommentIdReactionSummary(commentId string, query map[string]any) CMSResponse[CommentReactionSummary] {
    return RequestInto[CommentReactionSummary](r.client, "GET", "/articles/comments/" + url.PathEscape(commentId) + "/reactionSummary", query, nil)
}

func (r *ArticlesResource) EngagementSettingsGET(query map[string]any) CMSResponse[EngagementSettings] {
    return RequestInto[EngagementSettings](r.client, "GET", "/articles/engagementSettings", query, nil)
}

func (r *ArticlesResource) EngagementSettingsPUT(body any, query map[string]any) CMSResponse[EngagementSettings] {
    return RequestInto[EngagementSettings](r.client, "PUT", "/articles/engagementSettings", query, body)
}
