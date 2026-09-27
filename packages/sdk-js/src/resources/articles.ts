import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class ArticlesResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  create(body: Ops.ArticlesCreateBody, options?: RequestOptions<Ops.ArticlesCreateQuery>): Promise<Ops.ArticlesCreateResponse> {
    return this.client.request<Ops.ArticlesCreateResponse>("POST", `/articles/create`, { ...(options || {}), body });
  }

  update(body: Ops.ArticlesUpdateBody, options?: RequestOptions<Ops.ArticlesUpdateQuery>): Promise<Ops.ArticlesUpdateResponse> {
    return this.client.request<Ops.ArticlesUpdateResponse>("PUT", `/articles/update`, { ...(options || {}), body });
  }

  archive(body: Ops.ArticlesArchiveBody, options?: RequestOptions<Ops.ArticlesArchiveQuery>): Promise<Ops.ArticlesArchiveResponse> {
    return this.client.request<Ops.ArticlesArchiveResponse>("PUT", `/articles/archive`, { ...(options || {}), body });
  }

  deleteId(id: Ops.ArticlesDeleteIdPath["id"], options?: RequestOptions<Ops.ArticlesDeleteIdQuery>): Promise<Ops.ArticlesDeleteIdResponse> {
    return this.client.request<Ops.ArticlesDeleteIdResponse>("DELETE", `/articles/delete/${encodeURIComponent(id)}`, options);
  }

  getAll(options?: RequestOptions<Ops.ArticlesGetAllQuery>): Promise<Ops.ArticlesGetAllResponse> {
    return this.client.request<Ops.ArticlesGetAllResponse>("GET", `/articles/getAll`, options);
  }

  getById(id: Ops.ArticlesGetByIdPath["id"], options?: RequestOptions<Ops.ArticlesGetByIdQuery>): Promise<Ops.ArticlesGetByIdResponse> {
    return this.client.request<Ops.ArticlesGetByIdResponse>("GET", `/articles/getById/${encodeURIComponent(id)}`, options);
  }

  getBySlug(slug: Ops.ArticlesGetBySlugPath["slug"], options?: RequestOptions<Ops.ArticlesGetBySlugQuery>): Promise<Ops.ArticlesGetBySlugResponse> {
    return this.client.request<Ops.ArticlesGetBySlugResponse>("GET", `/articles/getBySlug/${encodeURIComponent(slug)}`, options);
  }

  getByCategoryId(categoryId: Ops.ArticlesGetByCategoryIdPath["categoryId"], options?: RequestOptions<Ops.ArticlesGetByCategoryIdQuery>): Promise<Ops.ArticlesGetByCategoryIdResponse> {
    return this.client.request<Ops.ArticlesGetByCategoryIdResponse>("GET", `/articles/getByCategoryId/${encodeURIComponent(categoryId)}`, options);
  }

  getBySubCategoryId(subCategoryId: Ops.ArticlesGetBySubCategoryIdPath["subCategoryId"], options?: RequestOptions<Ops.ArticlesGetBySubCategoryIdQuery>): Promise<Ops.ArticlesGetBySubCategoryIdResponse> {
    return this.client.request<Ops.ArticlesGetBySubCategoryIdResponse>("GET", `/articles/getBySubCategoryId/${encodeURIComponent(subCategoryId)}`, options);
  }

  getByAuthorId(authorId: Ops.ArticlesGetByAuthorIdPath["authorId"], options?: RequestOptions<Ops.ArticlesGetByAuthorIdQuery>): Promise<Ops.ArticlesGetByAuthorIdResponse> {
    return this.client.request<Ops.ArticlesGetByAuthorIdResponse>("GET", `/articles/getByAuthorId/${encodeURIComponent(authorId)}`, options);
  }

  getByTag(tag: Ops.ArticlesGetByTagPath["tag"], options?: RequestOptions<Ops.ArticlesGetByTagQuery>): Promise<Ops.ArticlesGetByTagResponse> {
    return this.client.request<Ops.ArticlesGetByTagResponse>("GET", `/articles/getByTag/${encodeURIComponent(tag)}`, options);
  }

  getByCategorySlug(slug: Ops.ArticlesGetByCategorySlugPath["slug"], options?: RequestOptions<Ops.ArticlesGetByCategorySlugQuery>): Promise<Ops.ArticlesGetByCategorySlugResponse> {
    return this.client.request<Ops.ArticlesGetByCategorySlugResponse>("GET", `/articles/getByCategorySlug/${encodeURIComponent(slug)}`, options);
  }

  getBySubCategorySlug(slug: Ops.ArticlesGetBySubCategorySlugPath["slug"], options?: RequestOptions<Ops.ArticlesGetBySubCategorySlugQuery>): Promise<Ops.ArticlesGetBySubCategorySlugResponse> {
    return this.client.request<Ops.ArticlesGetBySubCategorySlugResponse>("GET", `/articles/getBySubCategorySlug/${encodeURIComponent(slug)}`, options);
  }

  search(options?: RequestOptions<Ops.ArticlesSearchQuery>): Promise<Ops.ArticlesSearchResponse> {
    return this.client.request<Ops.ArticlesSearchResponse>("GET", `/articles/search`, options);
  }

  advanceSearch(options?: RequestOptions<Ops.ArticlesAdvanceSearchQuery>): Promise<Ops.ArticlesAdvanceSearchResponse> {
    return this.client.request<Ops.ArticlesAdvanceSearchResponse>("GET", `/articles/advanceSearch`, options);
  }

  seoAnalysisId(id: Ops.ArticlesSeoAnalysisIdPath["id"], options?: RequestOptions<Ops.ArticlesSeoAnalysisIdQuery>): Promise<Ops.ArticlesSeoAnalysisIdResponse> {
    return this.client.request<Ops.ArticlesSeoAnalysisIdResponse>("GET", `/articles/seoAnalysis/${encodeURIComponent(id)}`, options);
  }

  idReactionPOST(id: Ops.ArticlesIdReactionPOSTPath["id"], body: Ops.ArticlesIdReactionPOSTBody, options?: RequestOptions<Ops.ArticlesIdReactionPOSTQuery>): Promise<Ops.ArticlesIdReactionPOSTResponse> {
    return this.client.request<Ops.ArticlesIdReactionPOSTResponse>("POST", `/articles/${encodeURIComponent(id)}/reaction`, { ...(options || {}), body });
  }

  idReactionDELETE(id: Ops.ArticlesIdReactionDELETEPath["id"], options?: RequestOptions<Ops.ArticlesIdReactionDELETEQuery>): Promise<Ops.ArticlesIdReactionDELETEResponse> {
    return this.client.request<Ops.ArticlesIdReactionDELETEResponse>("DELETE", `/articles/${encodeURIComponent(id)}/reaction`, options);
  }

  idReactionSummary(id: Ops.ArticlesIdReactionSummaryPath["id"], options?: RequestOptions<Ops.ArticlesIdReactionSummaryQuery>): Promise<Ops.ArticlesIdReactionSummaryResponse> {
    return this.client.request<Ops.ArticlesIdReactionSummaryResponse>("GET", `/articles/${encodeURIComponent(id)}/reactionSummary`, options);
  }

  idCommentsPOST(id: Ops.ArticlesIdCommentsPOSTPath["id"], body: Ops.ArticlesIdCommentsPOSTBody, options?: RequestOptions<Ops.ArticlesIdCommentsPOSTQuery>): Promise<Ops.ArticlesIdCommentsPOSTResponse> {
    return this.client.request<Ops.ArticlesIdCommentsPOSTResponse>("POST", `/articles/${encodeURIComponent(id)}/comments`, { ...(options || {}), body });
  }

  idCommentsGET(id: Ops.ArticlesIdCommentsGETPath["id"], options?: RequestOptions<Ops.ArticlesIdCommentsGETQuery>): Promise<Ops.ArticlesIdCommentsGETResponse> {
    return this.client.request<Ops.ArticlesIdCommentsGETResponse>("GET", `/articles/${encodeURIComponent(id)}/comments`, options);
  }

  commentsGetAll(options?: RequestOptions<Ops.ArticlesCommentsGetAllQuery>): Promise<Ops.ArticlesCommentsGetAllResponse> {
    return this.client.request<Ops.ArticlesCommentsGetAllResponse>("GET", `/articles/comments/getAll`, options);
  }

  commentsCommentIdPATCH(commentId: Ops.ArticlesCommentsCommentIdPATCHPath["commentId"], body: Ops.ArticlesCommentsCommentIdPATCHBody, options?: RequestOptions<Ops.ArticlesCommentsCommentIdPATCHQuery>): Promise<Ops.ArticlesCommentsCommentIdPATCHResponse> {
    return this.client.request<Ops.ArticlesCommentsCommentIdPATCHResponse>("PATCH", `/articles/comments/${encodeURIComponent(commentId)}`, { ...(options || {}), body });
  }

  commentsCommentIdDELETE(commentId: Ops.ArticlesCommentsCommentIdDELETEPath["commentId"], options?: RequestOptions<Ops.ArticlesCommentsCommentIdDELETEQuery>): Promise<Ops.ArticlesCommentsCommentIdDELETEResponse> {
    return this.client.request<Ops.ArticlesCommentsCommentIdDELETEResponse>("DELETE", `/articles/comments/${encodeURIComponent(commentId)}`, options);
  }

  commentsCommentIdReactionPOST(commentId: Ops.ArticlesCommentsCommentIdReactionPOSTPath["commentId"], body: Ops.ArticlesCommentsCommentIdReactionPOSTBody, options?: RequestOptions<Ops.ArticlesCommentsCommentIdReactionPOSTQuery>): Promise<Ops.ArticlesCommentsCommentIdReactionPOSTResponse> {
    return this.client.request<Ops.ArticlesCommentsCommentIdReactionPOSTResponse>("POST", `/articles/comments/${encodeURIComponent(commentId)}/reaction`, { ...(options || {}), body });
  }

  commentsCommentIdReactionDELETE(commentId: Ops.ArticlesCommentsCommentIdReactionDELETEPath["commentId"], options?: RequestOptions<Ops.ArticlesCommentsCommentIdReactionDELETEQuery>): Promise<Ops.ArticlesCommentsCommentIdReactionDELETEResponse> {
    return this.client.request<Ops.ArticlesCommentsCommentIdReactionDELETEResponse>("DELETE", `/articles/comments/${encodeURIComponent(commentId)}/reaction`, options);
  }

  commentsCommentIdReactionSummary(commentId: Ops.ArticlesCommentsCommentIdReactionSummaryPath["commentId"], options?: RequestOptions<Ops.ArticlesCommentsCommentIdReactionSummaryQuery>): Promise<Ops.ArticlesCommentsCommentIdReactionSummaryResponse> {
    return this.client.request<Ops.ArticlesCommentsCommentIdReactionSummaryResponse>("GET", `/articles/comments/${encodeURIComponent(commentId)}/reactionSummary`, options);
  }

  engagementSettingsGET(options?: RequestOptions<Ops.ArticlesEngagementSettingsGETQuery>): Promise<Ops.ArticlesEngagementSettingsGETResponse> {
    return this.client.request<Ops.ArticlesEngagementSettingsGETResponse>("GET", `/articles/engagementSettings`, options);
  }

  engagementSettingsPUT(body: Ops.ArticlesEngagementSettingsPUTBody, options?: RequestOptions<Ops.ArticlesEngagementSettingsPUTQuery>): Promise<Ops.ArticlesEngagementSettingsPUTResponse> {
    return this.client.request<Ops.ArticlesEngagementSettingsPUTResponse>("PUT", `/articles/engagementSettings`, { ...(options || {}), body });
  }

}
