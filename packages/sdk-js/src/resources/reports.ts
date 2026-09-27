import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class ReportsResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  getStatistics(options?: RequestOptions<Ops.ReportsGetStatisticsQuery>): Promise<Ops.ReportsGetStatisticsResponse> {
    return this.client.request<Ops.ReportsGetStatisticsResponse>("GET", `/reports/getStatistics`, options);
  }

  getTenantStatisticsTenantId(tenantId: Ops.ReportsGetTenantStatisticsTenantIdPath["tenantId"], options?: RequestOptions<Ops.ReportsGetTenantStatisticsTenantIdQuery>): Promise<Ops.ReportsGetTenantStatisticsTenantIdResponse> {
    return this.client.request<Ops.ReportsGetTenantStatisticsTenantIdResponse>("GET", `/reports/getTenantStatistics/${encodeURIComponent(tenantId)}`, options);
  }

  getUserStatisticsUserId(userId: Ops.ReportsGetUserStatisticsUserIdPath["userId"], options?: RequestOptions<Ops.ReportsGetUserStatisticsUserIdQuery>): Promise<Ops.ReportsGetUserStatisticsUserIdResponse> {
    return this.client.request<Ops.ReportsGetUserStatisticsUserIdResponse>("GET", `/reports/getUserStatistics/${encodeURIComponent(userId)}`, options);
  }

  getAuthorStatisticsAuthorId(authorId: Ops.ReportsGetAuthorStatisticsAuthorIdPath["authorId"], options?: RequestOptions<Ops.ReportsGetAuthorStatisticsAuthorIdQuery>): Promise<Ops.ReportsGetAuthorStatisticsAuthorIdResponse> {
    return this.client.request<Ops.ReportsGetAuthorStatisticsAuthorIdResponse>("GET", `/reports/getAuthorStatistics/${encodeURIComponent(authorId)}`, options);
  }

  getAllUsersStatistics(options?: RequestOptions<Ops.ReportsGetAllUsersStatisticsQuery>): Promise<Ops.ReportsGetAllUsersStatisticsResponse> {
    return this.client.request<Ops.ReportsGetAllUsersStatisticsResponse>("GET", `/reports/getAllUsersStatistics`, options);
  }

  getAllAuthorsStatistics(options?: RequestOptions<Ops.ReportsGetAllAuthorsStatisticsQuery>): Promise<Ops.ReportsGetAllAuthorsStatisticsResponse> {
    return this.client.request<Ops.ReportsGetAllAuthorsStatisticsResponse>("GET", `/reports/getAllAuthorsStatistics`, options);
  }

  contentOverview(options?: RequestOptions<Ops.ReportsContentOverviewQuery>): Promise<Ops.ReportsContentOverviewResponse> {
    return this.client.request<Ops.ReportsContentOverviewResponse>("GET", `/reports/contentOverview`, options);
  }

  topArticles(options?: RequestOptions<Ops.ReportsTopArticlesQuery>): Promise<Ops.ReportsTopArticlesResponse> {
    return this.client.request<Ops.ReportsTopArticlesResponse>("GET", `/reports/topArticles`, options);
  }

  aiUsageBreakdown(options?: RequestOptions<Ops.ReportsAiUsageBreakdownQuery>): Promise<Ops.ReportsAiUsageBreakdownResponse> {
    return this.client.request<Ops.ReportsAiUsageBreakdownResponse>("GET", `/reports/aiUsageBreakdown`, options);
  }

  formsOverview(options?: RequestOptions<Ops.ReportsFormsOverviewQuery>): Promise<Ops.ReportsFormsOverviewResponse> {
    return this.client.request<Ops.ReportsFormsOverviewResponse>("GET", `/reports/formsOverview`, options);
  }

  submissionsOverview(options?: RequestOptions<Ops.ReportsSubmissionsOverviewQuery>): Promise<Ops.ReportsSubmissionsOverviewResponse> {
    return this.client.request<Ops.ReportsSubmissionsOverviewResponse>("GET", `/reports/submissionsOverview`, options);
  }

  chartContentTrend(options?: RequestOptions<Ops.ReportsChartContentTrendQuery>): Promise<Ops.ReportsChartContentTrendResponse> {
    return this.client.request<Ops.ReportsChartContentTrendResponse>("GET", `/reports/chart/contentTrend`, options);
  }

  chartSubmissionFunnel(options?: RequestOptions<Ops.ReportsChartSubmissionFunnelQuery>): Promise<Ops.ReportsChartSubmissionFunnelResponse> {
    return this.client.request<Ops.ReportsChartSubmissionFunnelResponse>("GET", `/reports/chart/submissionFunnel`, options);
  }

  chartEngagementTrend(options?: RequestOptions<Ops.ReportsChartEngagementTrendQuery>): Promise<Ops.ReportsChartEngagementTrendResponse> {
    return this.client.request<Ops.ReportsChartEngagementTrendResponse>("GET", `/reports/chart/engagementTrend`, options);
  }

  publishingPerformance(options?: RequestOptions<Ops.ReportsPublishingPerformanceQuery>): Promise<Ops.ReportsPublishingPerformanceResponse> {
    return this.client.request<Ops.ReportsPublishingPerformanceResponse>("GET", `/reports/publishingPerformance`, options);
  }

  contentHealth(options?: RequestOptions<Ops.ReportsContentHealthQuery>): Promise<Ops.ReportsContentHealthResponse> {
    return this.client.request<Ops.ReportsContentHealthResponse>("GET", `/reports/contentHealth`, options);
  }

  categoryPerformance(options?: RequestOptions<Ops.ReportsCategoryPerformanceQuery>): Promise<Ops.ReportsCategoryPerformanceResponse> {
    return this.client.request<Ops.ReportsCategoryPerformanceResponse>("GET", `/reports/categoryPerformance`, options);
  }

  periodComparison(options?: RequestOptions<Ops.ReportsPeriodComparisonQuery>): Promise<Ops.ReportsPeriodComparisonResponse> {
    return this.client.request<Ops.ReportsPeriodComparisonResponse>("GET", `/reports/periodComparison`, options);
  }

  aiContentImpact(options?: RequestOptions<Ops.ReportsAiContentImpactQuery>): Promise<Ops.ReportsAiContentImpactResponse> {
    return this.client.request<Ops.ReportsAiContentImpactResponse>("GET", `/reports/aiContentImpact`, options);
  }

  commentOverview(options?: RequestOptions<Ops.ReportsCommentOverviewQuery>): Promise<Ops.ReportsCommentOverviewResponse> {
    return this.client.request<Ops.ReportsCommentOverviewResponse>("GET", `/reports/commentOverview`, options);
  }

  dashboardConfigGET(options?: RequestOptions<Ops.ReportsDashboardConfigGETQuery>): Promise<Ops.ReportsDashboardConfigGETResponse> {
    return this.client.request<Ops.ReportsDashboardConfigGETResponse>("GET", `/reports/dashboardConfig`, options);
  }

  dashboardConfigPUT(body: Ops.ReportsDashboardConfigPUTBody, options?: RequestOptions<Ops.ReportsDashboardConfigPUTQuery>): Promise<Ops.ReportsDashboardConfigPUTResponse> {
    return this.client.request<Ops.ReportsDashboardConfigPUTResponse>("PUT", `/reports/dashboardConfig`, { ...(options || {}), body });
  }

}
