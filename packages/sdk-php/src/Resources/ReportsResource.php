<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class ReportsResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TenantUsageStats>
     */
    public function getStatistics(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/getStatistics", $options, \Octavia\CmsSDK\Types\TenantUsageStats::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\UserStats>
     */
    public function getUserStatisticsUserId($userId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/getUserStatistics/" . rawurlencode($userId) . "", $options, \Octavia\CmsSDK\Types\UserStats::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AuthorStats>
     */
    public function getAuthorStatisticsAuthorId($authorId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/getAuthorStatistics/" . rawurlencode($authorId) . "", $options, \Octavia\CmsSDK\Types\AuthorStats::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\UsersStatsPage>
     */
    public function getAllUsersStatistics(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/getAllUsersStatistics", $options, \Octavia\CmsSDK\Types\UsersStatsPage::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AuthorsStatsPage>
     */
    public function getAllAuthorsStatistics(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/getAllAuthorsStatistics", $options, \Octavia\CmsSDK\Types\AuthorsStatsPage::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ContentOverviewReport>
     */
    public function contentOverview(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/contentOverview", $options, \Octavia\CmsSDK\Types\ContentOverviewReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TopArticlesReport>
     */
    public function topArticles(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/topArticles", $options, \Octavia\CmsSDK\Types\TopArticlesReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiUsageBreakdownReport>
     */
    public function aiUsageBreakdown(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/aiUsageBreakdown", $options, \Octavia\CmsSDK\Types\AiUsageBreakdownReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\FormsOverviewReport>
     */
    public function formsOverview(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/formsOverview", $options, \Octavia\CmsSDK\Types\FormsOverviewReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionsOverviewReport>
     */
    public function submissionsOverview(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/submissionsOverview", $options, \Octavia\CmsSDK\Types\SubmissionsOverviewReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ContentTrendReport>
     */
    public function chartContentTrend(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/chart/contentTrend", $options, \Octavia\CmsSDK\Types\ContentTrendReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionFunnelReport>
     */
    public function chartSubmissionFunnel(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/chart/submissionFunnel", $options, \Octavia\CmsSDK\Types\SubmissionFunnelReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\EngagementTrendReport>
     */
    public function chartEngagementTrend(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/chart/engagementTrend", $options, \Octavia\CmsSDK\Types\EngagementTrendReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\PublishingPerformanceReport>
     */
    public function publishingPerformance(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/publishingPerformance", $options, \Octavia\CmsSDK\Types\PublishingPerformanceReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ContentHealthReport>
     */
    public function contentHealth(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/contentHealth", $options, \Octavia\CmsSDK\Types\ContentHealthReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CategoryPerformanceReport>
     */
    public function categoryPerformance(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/categoryPerformance", $options, \Octavia\CmsSDK\Types\CategoryPerformanceReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\PeriodComparisonReport>
     */
    public function periodComparison(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/periodComparison", $options, \Octavia\CmsSDK\Types\PeriodComparisonReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiContentImpactReport>
     */
    public function aiContentImpact(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/aiContentImpact", $options, \Octavia\CmsSDK\Types\AiContentImpactReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CommentOverviewReport>
     */
    public function commentOverview(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/commentOverview", $options, \Octavia\CmsSDK\Types\CommentOverviewReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\DashboardConfigWrapper>
     */
    public function dashboardConfigGET(array $options = []): Envelope
    {
        return $this->client->request("GET", "/reports/dashboardConfig", $options, \Octavia\CmsSDK\Types\DashboardConfigWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\DashboardConfigWrapper>
     */
    public function dashboardConfigPUT($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/reports/dashboardConfig", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\DashboardConfigWrapper::class);
    }

}
