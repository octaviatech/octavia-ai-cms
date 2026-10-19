from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Iterator, List, Optional

from ..models import (
    TaxonomyAudit,
    CategorySeoSuggestion,
    TagSuggestions,
    TagMergeResult,
    TagUsageRefresh,
    AuthorBioSuggestion,
    AuthorSuggestions,
)

if TYPE_CHECKING:
    from ..client import Client

class TaxonomyResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def audit(self, *, query: Optional[Dict[str, Any]] = None) -> TaxonomyAudit:
        return self._client.request_typed(TaxonomyAudit, "GET", "/taxonomy/audit", query=query, body=None)

    def categorySeo(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> CategorySeoSuggestion:
        return self._client.request_typed(CategorySeoSuggestion, "POST", "/taxonomy/category-seo", query=query, body=body)

    def suggestTags(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> TagSuggestions:
        return self._client.request_typed(TagSuggestions, "POST", "/taxonomy/suggest-tags", query=query, body=body)

    def tagsMerge(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> TagMergeResult:
        return self._client.request_typed(TagMergeResult, "POST", "/taxonomy/tags/merge", query=query, body=body)

    def tagsRefreshUsage(self, *, query: Optional[Dict[str, Any]] = None) -> TagUsageRefresh:
        return self._client.request_typed(TagUsageRefresh, "POST", "/taxonomy/tags/refreshUsage", query=query, body=None)

    def authorBio(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AuthorBioSuggestion:
        return self._client.request_typed(AuthorBioSuggestion, "POST", "/taxonomy/author-bio", query=query, body=body)

    def authorsSuggest(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> AuthorSuggestions:
        return self._client.request_typed(AuthorSuggestions, "POST", "/taxonomy/authors/suggest", query=query, body=body)
