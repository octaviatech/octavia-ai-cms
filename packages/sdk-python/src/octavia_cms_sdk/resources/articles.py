from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    ArticleWrapper,
    ArticleList,
    SeoAnalysisResult,
    ArticleReactionTotals,
    ArticleReactionSummary,
    CommentWrapper,
    CommentListWrapper,
    CommentReactionTotals,
    CommentReactionSummary,
    EngagementSettings,
)

if TYPE_CHECKING:
    from ..client import Client

class ArticlesResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def create(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> ArticleWrapper:
        return self._client.request_typed(ArticleWrapper, "POST", "/articles/create", query=query, body=body)

    def update(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> ArticleWrapper:
        return self._client.request_typed(ArticleWrapper, "PUT", "/articles/update", query=query, body=body)

    def archive(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "PUT", "/articles/archive", query=query, body=body)

    def deleteId(self, id, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "DELETE", "/articles/delete/" + urllib.parse.quote(str(id)), query=query, body=None)

    def getAll(self, *, query: Optional[Dict[str, Any]] = None) -> ArticleList:
        return self._client.request_typed(ArticleList, "GET", "/articles/getAll", query=query, body=None)

    def getById(self, id, *, query: Optional[Dict[str, Any]] = None) -> ArticleWrapper:
        return self._client.request_typed(ArticleWrapper, "GET", "/articles/getById/" + urllib.parse.quote(str(id)), query=query, body=None)

    def getBySlug(self, slug, *, query: Optional[Dict[str, Any]] = None) -> ArticleWrapper:
        return self._client.request_typed(ArticleWrapper, "GET", "/articles/getBySlug/" + urllib.parse.quote(str(slug)), query=query, body=None)

    def getByCategoryId(self, categoryId, *, query: Optional[Dict[str, Any]] = None) -> ArticleList:
        return self._client.request_typed(ArticleList, "GET", "/articles/getByCategoryId/" + urllib.parse.quote(str(categoryId)), query=query, body=None)

    def getBySubCategoryId(self, subCategoryId, *, query: Optional[Dict[str, Any]] = None) -> ArticleList:
        return self._client.request_typed(ArticleList, "GET", "/articles/getBySubCategoryId/" + urllib.parse.quote(str(subCategoryId)), query=query, body=None)

    def getByAuthorId(self, authorId, *, query: Optional[Dict[str, Any]] = None) -> ArticleList:
        return self._client.request_typed(ArticleList, "GET", "/articles/getByAuthorId/" + urllib.parse.quote(str(authorId)), query=query, body=None)

    def getByTag(self, tag, *, query: Optional[Dict[str, Any]] = None) -> ArticleList:
        return self._client.request_typed(ArticleList, "GET", "/articles/getByTag/" + urllib.parse.quote(str(tag)), query=query, body=None)

    def getByCategorySlug(self, slug, *, query: Optional[Dict[str, Any]] = None) -> ArticleList:
        return self._client.request_typed(ArticleList, "GET", "/articles/getByCategorySlug/" + urllib.parse.quote(str(slug)), query=query, body=None)

    def getBySubCategorySlug(self, slug, *, query: Optional[Dict[str, Any]] = None) -> ArticleList:
        return self._client.request_typed(ArticleList, "GET", "/articles/getBySubCategorySlug/" + urllib.parse.quote(str(slug)), query=query, body=None)

    def search(self, *, query: Optional[Dict[str, Any]] = None) -> ArticleList:
        return self._client.request_typed(ArticleList, "GET", "/articles/search", query=query, body=None)

    def advanceSearch(self, *, query: Optional[Dict[str, Any]] = None) -> ArticleList:
        return self._client.request_typed(ArticleList, "GET", "/articles/advanceSearch", query=query, body=None)

    def seoAnalysisId(self, id, *, query: Optional[Dict[str, Any]] = None) -> SeoAnalysisResult:
        return self._client.request_typed(SeoAnalysisResult, "GET", "/articles/seoAnalysis/" + urllib.parse.quote(str(id)), query=query, body=None)

    def idReactionPOST(self, id, body: Any, *, query: Optional[Dict[str, Any]] = None) -> ArticleReactionTotals:
        return self._client.request_typed(ArticleReactionTotals, "POST", "/articles/" + urllib.parse.quote(str(id)) + "/reaction", query=query, body=body)

    def idReactionDELETE(self, id, *, query: Optional[Dict[str, Any]] = None) -> ArticleReactionTotals:
        return self._client.request_typed(ArticleReactionTotals, "DELETE", "/articles/" + urllib.parse.quote(str(id)) + "/reaction", query=query, body=None)

    def idReactionSummary(self, id, *, query: Optional[Dict[str, Any]] = None) -> ArticleReactionSummary:
        return self._client.request_typed(ArticleReactionSummary, "GET", "/articles/" + urllib.parse.quote(str(id)) + "/reactionSummary", query=query, body=None)

    def idCommentsPOST(self, id, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CommentWrapper:
        return self._client.request_typed(CommentWrapper, "POST", "/articles/" + urllib.parse.quote(str(id)) + "/comments", query=query, body=body)

    def idCommentsGET(self, id, *, query: Optional[Dict[str, Any]] = None) -> CommentListWrapper:
        return self._client.request_typed(CommentListWrapper, "GET", "/articles/" + urllib.parse.quote(str(id)) + "/comments", query=query, body=None)

    def commentsGetAll(self, *, query: Optional[Dict[str, Any]] = None) -> ArticleList:
        return self._client.request_typed(ArticleList, "GET", "/articles/comments/getAll", query=query, body=None)

    def commentsCommentIdPATCH(self, commentId, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CommentWrapper:
        return self._client.request_typed(CommentWrapper, "PATCH", "/articles/comments/" + urllib.parse.quote(str(commentId)), query=query, body=body)

    def commentsCommentIdDELETE(self, commentId, *, query: Optional[Dict[str, Any]] = None) -> Dict[str, Any]:
        return self._client.request_typed(Dict[str, Any], "DELETE", "/articles/comments/" + urllib.parse.quote(str(commentId)), query=query, body=None)

    def commentsCommentIdReactionPOST(self, commentId, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CommentReactionTotals:
        return self._client.request_typed(CommentReactionTotals, "POST", "/articles/comments/" + urllib.parse.quote(str(commentId)) + "/reaction", query=query, body=body)

    def commentsCommentIdReactionDELETE(self, commentId, *, query: Optional[Dict[str, Any]] = None) -> CommentReactionTotals:
        return self._client.request_typed(CommentReactionTotals, "DELETE", "/articles/comments/" + urllib.parse.quote(str(commentId)) + "/reaction", query=query, body=None)

    def commentsCommentIdReactionSummary(self, commentId, *, query: Optional[Dict[str, Any]] = None) -> CommentReactionSummary:
        return self._client.request_typed(CommentReactionSummary, "GET", "/articles/comments/" + urllib.parse.quote(str(commentId)) + "/reactionSummary", query=query, body=None)

    def engagementSettingsGET(self, *, query: Optional[Dict[str, Any]] = None) -> EngagementSettings:
        return self._client.request_typed(EngagementSettings, "GET", "/articles/engagementSettings", query=query, body=None)

    def engagementSettingsPUT(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> EngagementSettings:
        return self._client.request_typed(EngagementSettings, "PUT", "/articles/engagementSettings", query=query, body=body)
