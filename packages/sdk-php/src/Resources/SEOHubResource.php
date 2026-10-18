<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class SEOHubResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SeoAuditReport>
     */
    public function audit(array $options = []): Envelope
    {
        return $this->client->request("GET", "/seo/audit", $options, \Octavia\CmsSDK\Types\SeoAuditReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CannibalizationReport>
     */
    public function cannibalization(array $options = []): Envelope
    {
        return $this->client->request("GET", "/seo/cannibalization", $options, \Octavia\CmsSDK\Types\CannibalizationReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\RefreshCandidateReport>
     */
    public function refresh(array $options = []): Envelope
    {
        return $this->client->request("GET", "/seo/refresh", $options, \Octavia\CmsSDK\Types\RefreshCandidateReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\RefreshPlanItemWrapper>
     */
    public function refreshArticleIdPlanItem($articleId, array $options = []): Envelope
    {
        return $this->client->request("POST", "/seo/refresh/" . rawurlencode($articleId) . "/plan-item", $options, \Octavia\CmsSDK\Types\RefreshPlanItemWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\HreflangWrapper>
     */
    public function hreflangArticleId($articleId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/seo/hreflang/" . rawurlencode($articleId) . "", $options, \Octavia\CmsSDK\Types\HreflangWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\RedirectList>
     */
    public function redirects(array $options = []): Envelope
    {
        return $this->client->request("GET", "/seo/redirects", $options, \Octavia\CmsSDK\Types\RedirectList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TranslationCoverageReport>
     */
    public function translationCoverage(array $options = []): Envelope
    {
        return $this->client->request("GET", "/seo/translation-coverage", $options, \Octavia\CmsSDK\Types\TranslationCoverageReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ContentTypeProfileWrapper>
     */
    public function contentTypes(array $options = []): Envelope
    {
        return $this->client->request("GET", "/seo/content-types", $options, \Octavia\CmsSDK\Types\ContentTypeProfileWrapper::class);
    }

}
