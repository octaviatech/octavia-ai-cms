package sdk

import "net/url"

type ReportsResource struct {
    client *Client
}

func (r *ReportsResource) GetStatistics(query map[string]any) CMSResponse[TenantUsageStats] {
    return RequestInto[TenantUsageStats](r.client, "GET", "/reports/getStatistics", query, nil)
}

func (r *ReportsResource) GetUserStatisticsUserId(userId string, query map[string]any) CMSResponse[UserStats] {
    return RequestInto[UserStats](r.client, "GET", "/reports/getUserStatistics/" + url.PathEscape(userId), query, nil)
}

func (r *ReportsResource) GetAuthorStatisticsAuthorId(authorId string, query map[string]any) CMSResponse[AuthorStats] {
    return RequestInto[AuthorStats](r.client, "GET", "/reports/getAuthorStatistics/" + url.PathEscape(authorId), query, nil)
}

func (r *ReportsResource) GetAllUsersStatistics(query map[string]any) CMSResponse[UsersStatsPage] {
    return RequestInto[UsersStatsPage](r.client, "GET", "/reports/getAllUsersStatistics", query, nil)
}

func (r *ReportsResource) GetAllAuthorsStatistics(query map[string]any) CMSResponse[AuthorsStatsPage] {
    return RequestInto[AuthorsStatsPage](r.client, "GET", "/reports/getAllAuthorsStatistics", query, nil)
}

func (r *ReportsResource) ContentOverview(query map[string]any) CMSResponse[ContentOverviewReport] {
    return RequestInto[ContentOverviewReport](r.client, "GET", "/reports/contentOverview", query, nil)
}

func (r *ReportsResource) TopArticles(query map[string]any) CMSResponse[TopArticlesReport] {
    return RequestInto[TopArticlesReport](r.client, "GET", "/reports/topArticles", query, nil)
}

func (r *ReportsResource) AiUsageBreakdown(query map[string]any) CMSResponse[AiUsageBreakdownReport] {
    return RequestInto[AiUsageBreakdownReport](r.client, "GET", "/reports/aiUsageBreakdown", query, nil)
}

func (r *ReportsResource) FormsOverview(query map[string]any) CMSResponse[FormsOverviewReport] {
    return RequestInto[FormsOverviewReport](r.client, "GET", "/reports/formsOverview", query, nil)
}

func (r *ReportsResource) SubmissionsOverview(query map[string]any) CMSResponse[SubmissionsOverviewReport] {
    return RequestInto[SubmissionsOverviewReport](r.client, "GET", "/reports/submissionsOverview", query, nil)
}

func (r *ReportsResource) ChartContentTrend(query map[string]any) CMSResponse[ContentTrendReport] {
    return RequestInto[ContentTrendReport](r.client, "GET", "/reports/chart/contentTrend", query, nil)
}

func (r *ReportsResource) ChartSubmissionFunnel(query map[string]any) CMSResponse[SubmissionFunnelReport] {
    return RequestInto[SubmissionFunnelReport](r.client, "GET", "/reports/chart/submissionFunnel", query, nil)
}

func (r *ReportsResource) ChartEngagementTrend(query map[string]any) CMSResponse[EngagementTrendReport] {
    return RequestInto[EngagementTrendReport](r.client, "GET", "/reports/chart/engagementTrend", query, nil)
}

func (r *ReportsResource) PublishingPerformance(query map[string]any) CMSResponse[PublishingPerformanceReport] {
    return RequestInto[PublishingPerformanceReport](r.client, "GET", "/reports/publishingPerformance", query, nil)
}

func (r *ReportsResource) ContentHealth(query map[string]any) CMSResponse[ContentHealthReport] {
    return RequestInto[ContentHealthReport](r.client, "GET", "/reports/contentHealth", query, nil)
}

func (r *ReportsResource) CategoryPerformance(query map[string]any) CMSResponse[CategoryPerformanceReport] {
    return RequestInto[CategoryPerformanceReport](r.client, "GET", "/reports/categoryPerformance", query, nil)
}

func (r *ReportsResource) PeriodComparison(query map[string]any) CMSResponse[PeriodComparisonReport] {
    return RequestInto[PeriodComparisonReport](r.client, "GET", "/reports/periodComparison", query, nil)
}

func (r *ReportsResource) AiContentImpact(query map[string]any) CMSResponse[AiContentImpactReport] {
    return RequestInto[AiContentImpactReport](r.client, "GET", "/reports/aiContentImpact", query, nil)
}

func (r *ReportsResource) CommentOverview(query map[string]any) CMSResponse[CommentOverviewReport] {
    return RequestInto[CommentOverviewReport](r.client, "GET", "/reports/commentOverview", query, nil)
}

func (r *ReportsResource) DashboardConfigGET(query map[string]any) CMSResponse[DashboardConfigWrapper] {
    return RequestInto[DashboardConfigWrapper](r.client, "GET", "/reports/dashboardConfig", query, nil)
}

func (r *ReportsResource) DashboardConfigPUT(body any, query map[string]any) CMSResponse[DashboardConfigWrapper] {
    return RequestInto[DashboardConfigWrapper](r.client, "PUT", "/reports/dashboardConfig", query, body)
}
