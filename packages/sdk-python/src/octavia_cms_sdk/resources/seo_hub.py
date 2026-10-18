from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, List, Optional

from ..models import (
    SeoAuditReport,
    CannibalizationReport,
    RefreshCandidateReport,
    RefreshPlanItemWrapper,
    HreflangWrapper,
    RedirectList,
    TranslationCoverageReport,
    ContentTypeProfileWrapper,
)

if TYPE_CHECKING:
    from ..client import Client

class SEOHubResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def audit(self, *, query: Optional[Dict[str, Any]] = None) -> SeoAuditReport:
        return self._client.request_typed(SeoAuditReport, "GET", "/seo/audit", query=query, body=None)

    def cannibalization(self, *, query: Optional[Dict[str, Any]] = None) -> CannibalizationReport:
        return self._client.request_typed(CannibalizationReport, "GET", "/seo/cannibalization", query=query, body=None)

    def refresh(self, *, query: Optional[Dict[str, Any]] = None) -> RefreshCandidateReport:
        return self._client.request_typed(RefreshCandidateReport, "GET", "/seo/refresh", query=query, body=None)

    def refreshArticleIdPlanItem(self, articleId, *, query: Optional[Dict[str, Any]] = None) -> RefreshPlanItemWrapper:
        return self._client.request_typed(RefreshPlanItemWrapper, "POST", "/seo/refresh/" + urllib.parse.quote(str(articleId)) + "/plan-item", query=query, body=None)

    def hreflangArticleId(self, articleId, *, query: Optional[Dict[str, Any]] = None) -> HreflangWrapper:
        return self._client.request_typed(HreflangWrapper, "GET", "/seo/hreflang/" + urllib.parse.quote(str(articleId)), query=query, body=None)

    def redirects(self, *, query: Optional[Dict[str, Any]] = None) -> RedirectList:
        return self._client.request_typed(RedirectList, "GET", "/seo/redirects", query=query, body=None)

    def translationCoverage(self, *, query: Optional[Dict[str, Any]] = None) -> TranslationCoverageReport:
        return self._client.request_typed(TranslationCoverageReport, "GET", "/seo/translation-coverage", query=query, body=None)

    def contentTypes(self, *, query: Optional[Dict[str, Any]] = None) -> ContentTypeProfileWrapper:
        return self._client.request_typed(ContentTypeProfileWrapper, "GET", "/seo/content-types", query=query, body=None)
