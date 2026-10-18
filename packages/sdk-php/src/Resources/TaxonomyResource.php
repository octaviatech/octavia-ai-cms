<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class TaxonomyResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TaxonomyAudit>
     */
    public function audit(array $options = []): Envelope
    {
        return $this->client->request("GET", "/taxonomy/audit", $options, \Octavia\CmsSDK\Types\TaxonomyAudit::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CategorySeoSuggestion>
     */
    public function categorySeo($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/taxonomy/category-seo", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CategorySeoSuggestion::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TagSuggestions>
     */
    public function suggestTags($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/taxonomy/suggest-tags", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\TagSuggestions::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TagMergeResult>
     */
    public function tagsMerge($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/taxonomy/tags/merge", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\TagMergeResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TagUsageRefresh>
     */
    public function tagsRefreshUsage(array $options = []): Envelope
    {
        return $this->client->request("POST", "/taxonomy/tags/refreshUsage", $options, \Octavia\CmsSDK\Types\TagUsageRefresh::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AuthorBioSuggestion>
     */
    public function authorBio($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/taxonomy/author-bio", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AuthorBioSuggestion::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AuthorSuggestions>
     */
    public function authorsSuggest($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/taxonomy/authors/suggest", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AuthorSuggestions::class);
    }

}
