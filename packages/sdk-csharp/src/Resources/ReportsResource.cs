using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class ReportsResource
{
    private readonly Client _client;

    public ReportsResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<TenantUsageStats>> GetStatisticsAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TenantUsageStats>("GET", "/reports/getStatistics", query, null);
    }

    public Task<CMSResponse<UserStats>> GetUserStatisticsUserIdAsync(string userId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<UserStats>("GET", "/reports/getUserStatistics/" + Uri.EscapeDataString(userId) + "", query, null);
    }

    public Task<CMSResponse<AuthorStats>> GetAuthorStatisticsAuthorIdAsync(string authorId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AuthorStats>("GET", "/reports/getAuthorStatistics/" + Uri.EscapeDataString(authorId) + "", query, null);
    }

    public Task<CMSResponse<UsersStatsPage>> GetAllUsersStatisticsAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<UsersStatsPage>("GET", "/reports/getAllUsersStatistics", query, null);
    }

    public Task<CMSResponse<AuthorsStatsPage>> GetAllAuthorsStatisticsAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AuthorsStatsPage>("GET", "/reports/getAllAuthorsStatistics", query, null);
    }

    public Task<CMSResponse<ContentOverviewReport>> ContentOverviewAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ContentOverviewReport>("GET", "/reports/contentOverview", query, null);
    }

    public Task<CMSResponse<TopArticlesReport>> TopArticlesAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<TopArticlesReport>("GET", "/reports/topArticles", query, null);
    }

    public Task<CMSResponse<AiUsageBreakdownReport>> AiUsageBreakdownAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiUsageBreakdownReport>("GET", "/reports/aiUsageBreakdown", query, null);
    }

    public Task<CMSResponse<FormsOverviewReport>> FormsOverviewAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<FormsOverviewReport>("GET", "/reports/formsOverview", query, null);
    }

    public Task<CMSResponse<SubmissionsOverviewReport>> SubmissionsOverviewAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubmissionsOverviewReport>("GET", "/reports/submissionsOverview", query, null);
    }

    public Task<CMSResponse<ContentTrendReport>> ChartContentTrendAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ContentTrendReport>("GET", "/reports/chart/contentTrend", query, null);
    }

    public Task<CMSResponse<SubmissionFunnelReport>> ChartSubmissionFunnelAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubmissionFunnelReport>("GET", "/reports/chart/submissionFunnel", query, null);
    }

    public Task<CMSResponse<EngagementTrendReport>> ChartEngagementTrendAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<EngagementTrendReport>("GET", "/reports/chart/engagementTrend", query, null);
    }

    public Task<CMSResponse<PublishingPerformanceReport>> PublishingPerformanceAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<PublishingPerformanceReport>("GET", "/reports/publishingPerformance", query, null);
    }

    public Task<CMSResponse<ContentHealthReport>> ContentHealthAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ContentHealthReport>("GET", "/reports/contentHealth", query, null);
    }

    public Task<CMSResponse<CategoryPerformanceReport>> CategoryPerformanceAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CategoryPerformanceReport>("GET", "/reports/categoryPerformance", query, null);
    }

    public Task<CMSResponse<PeriodComparisonReport>> PeriodComparisonAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<PeriodComparisonReport>("GET", "/reports/periodComparison", query, null);
    }

    public Task<CMSResponse<AiContentImpactReport>> AiContentImpactAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiContentImpactReport>("GET", "/reports/aiContentImpact", query, null);
    }

    public Task<CMSResponse<CommentOverviewReport>> CommentOverviewAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CommentOverviewReport>("GET", "/reports/commentOverview", query, null);
    }

    public Task<CMSResponse<DashboardConfigWrapper>> DashboardConfigGETAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<DashboardConfigWrapper>("GET", "/reports/dashboardConfig", query, null);
    }

    public Task<CMSResponse<DashboardConfigWrapper>> DashboardConfigPUTAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<DashboardConfigWrapper>("PUT", "/reports/dashboardConfig", query, body);
    }

}
