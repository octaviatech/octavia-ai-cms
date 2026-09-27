from __future__ import annotations

import urllib.parse
from typing import TYPE_CHECKING, Any, Dict, Optional

from ..models import (
    TenantUsageStats,
    UserStats,
    AuthorStats,
    UsersStatsPage,
    AuthorsStatsPage,
    ContentOverviewReport,
    TopArticlesReport,
    AiUsageBreakdownReport,
    FormsOverviewReport,
    SubmissionsOverviewReport,
    ContentTrendReport,
    SubmissionFunnelReport,
    EngagementTrendReport,
    PublishingPerformanceReport,
    ContentHealthReport,
    CategoryPerformanceReport,
    PeriodComparisonReport,
    AiContentImpactReport,
    CommentOverviewReport,
    DashboardConfigWrapper,
)

if TYPE_CHECKING:
    from ..client import Client

class ReportsResource:
    def __init__(self, client: Client) -> None:
        self._client = client

    def getStatistics(self, *, query: Optional[Dict[str, Any]] = None) -> TenantUsageStats:
        return self._client.request_typed(TenantUsageStats, "GET", "/reports/getStatistics", query=query, body=None)

    def getUserStatisticsUserId(self, userId, *, query: Optional[Dict[str, Any]] = None) -> UserStats:
        return self._client.request_typed(UserStats, "GET", "/reports/getUserStatistics/" + urllib.parse.quote(str(userId)), query=query, body=None)

    def getAuthorStatisticsAuthorId(self, authorId, *, query: Optional[Dict[str, Any]] = None) -> AuthorStats:
        return self._client.request_typed(AuthorStats, "GET", "/reports/getAuthorStatistics/" + urllib.parse.quote(str(authorId)), query=query, body=None)

    def getAllUsersStatistics(self, *, query: Optional[Dict[str, Any]] = None) -> UsersStatsPage:
        return self._client.request_typed(UsersStatsPage, "GET", "/reports/getAllUsersStatistics", query=query, body=None)

    def getAllAuthorsStatistics(self, *, query: Optional[Dict[str, Any]] = None) -> AuthorsStatsPage:
        return self._client.request_typed(AuthorsStatsPage, "GET", "/reports/getAllAuthorsStatistics", query=query, body=None)

    def contentOverview(self, *, query: Optional[Dict[str, Any]] = None) -> ContentOverviewReport:
        return self._client.request_typed(ContentOverviewReport, "GET", "/reports/contentOverview", query=query, body=None)

    def topArticles(self, *, query: Optional[Dict[str, Any]] = None) -> TopArticlesReport:
        return self._client.request_typed(TopArticlesReport, "GET", "/reports/topArticles", query=query, body=None)

    def aiUsageBreakdown(self, *, query: Optional[Dict[str, Any]] = None) -> AiUsageBreakdownReport:
        return self._client.request_typed(AiUsageBreakdownReport, "GET", "/reports/aiUsageBreakdown", query=query, body=None)

    def formsOverview(self, *, query: Optional[Dict[str, Any]] = None) -> FormsOverviewReport:
        return self._client.request_typed(FormsOverviewReport, "GET", "/reports/formsOverview", query=query, body=None)

    def submissionsOverview(self, *, query: Optional[Dict[str, Any]] = None) -> SubmissionsOverviewReport:
        return self._client.request_typed(SubmissionsOverviewReport, "GET", "/reports/submissionsOverview", query=query, body=None)

    def chartContentTrend(self, *, query: Optional[Dict[str, Any]] = None) -> ContentTrendReport:
        return self._client.request_typed(ContentTrendReport, "GET", "/reports/chart/contentTrend", query=query, body=None)

    def chartSubmissionFunnel(self, *, query: Optional[Dict[str, Any]] = None) -> SubmissionFunnelReport:
        return self._client.request_typed(SubmissionFunnelReport, "GET", "/reports/chart/submissionFunnel", query=query, body=None)

    def chartEngagementTrend(self, *, query: Optional[Dict[str, Any]] = None) -> EngagementTrendReport:
        return self._client.request_typed(EngagementTrendReport, "GET", "/reports/chart/engagementTrend", query=query, body=None)

    def publishingPerformance(self, *, query: Optional[Dict[str, Any]] = None) -> PublishingPerformanceReport:
        return self._client.request_typed(PublishingPerformanceReport, "GET", "/reports/publishingPerformance", query=query, body=None)

    def contentHealth(self, *, query: Optional[Dict[str, Any]] = None) -> ContentHealthReport:
        return self._client.request_typed(ContentHealthReport, "GET", "/reports/contentHealth", query=query, body=None)

    def categoryPerformance(self, *, query: Optional[Dict[str, Any]] = None) -> CategoryPerformanceReport:
        return self._client.request_typed(CategoryPerformanceReport, "GET", "/reports/categoryPerformance", query=query, body=None)

    def periodComparison(self, *, query: Optional[Dict[str, Any]] = None) -> PeriodComparisonReport:
        return self._client.request_typed(PeriodComparisonReport, "GET", "/reports/periodComparison", query=query, body=None)

    def aiContentImpact(self, *, query: Optional[Dict[str, Any]] = None) -> AiContentImpactReport:
        return self._client.request_typed(AiContentImpactReport, "GET", "/reports/aiContentImpact", query=query, body=None)

    def commentOverview(self, *, query: Optional[Dict[str, Any]] = None) -> CommentOverviewReport:
        return self._client.request_typed(CommentOverviewReport, "GET", "/reports/commentOverview", query=query, body=None)

    def dashboardConfigGET(self, *, query: Optional[Dict[str, Any]] = None) -> DashboardConfigWrapper:
        return self._client.request_typed(DashboardConfigWrapper, "GET", "/reports/dashboardConfig", query=query, body=None)

    def dashboardConfigPUT(self, body: Any, *, query: Optional[Dict[str, Any]] = None) -> DashboardConfigWrapper:
        return self._client.request_typed(DashboardConfigWrapper, "PUT", "/reports/dashboardConfig", query=query, body=body)
