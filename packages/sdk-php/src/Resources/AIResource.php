<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class AIResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiSummaryResult>
     */
    public function summarize($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/summarize", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiSummaryResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function summarizeStream($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/summarize/stream", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function summarizeArticleStream($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/summarizeArticle/stream", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiSeoResult>
     */
    public function seoOptimize($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/seoOptimize", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiSeoResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function seoOptimizeStream($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/seoOptimize/stream", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiTitleResult>
     */
    public function generateTitle($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/generateTitle", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiTitleResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiTranslateResult>
     */
    public function translate($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/translate", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiTranslateResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function translateStream($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/translate/stream", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiContentResult>
     */
    public function generateContent($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/generateContent", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiContentResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiImageResult>
     */
    public function generateImage($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/generateImage", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiImageResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiArticleSeoResult>
     */
    public function optimizeArticle($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/optimizeArticle", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiArticleSeoResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function optimizeArticleStream($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/optimizeArticle/stream", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiArticleTranslateResult>
     */
    public function translateArticle($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/translateArticle", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiArticleTranslateResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function translateArticleStream($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/translateArticle/stream", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiFormTranslateResult>
     */
    public function translateForm($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/translateForm", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiFormTranslateResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\RepurposeResult>
     */
    public function repurpose($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/repurpose", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\RepurposeResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function repurposeStream($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/repurpose/stream", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SocialTemplate>
     */
    public function repurposeTemplateGET(array $options = []): Envelope
    {
        return $this->client->request("GET", "/ai/repurpose/template", $options, \Octavia\CmsSDK\Types\SocialTemplate::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SocialTemplate>
     */
    public function repurposeTemplatePUT($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/ai/repurpose/template", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SocialTemplate::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SocialConnectionList>
     */
    public function socialConnections(array $options = []): Envelope
    {
        return $this->client->request("GET", "/ai/social/connections", $options, \Octavia\CmsSDK\Types\SocialConnectionList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SocialConnection>
     */
    public function socialLinkedinConnect($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/ai/social/linkedin/connect", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SocialConnection::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SocialConnection>
     */
    public function socialTelegramConnect($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/ai/social/telegram/connect", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SocialConnection::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SocialConnection>
     */
    public function socialTwitterConnect($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/ai/social/twitter/connect", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SocialConnection::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SocialPublishResult>
     */
    public function socialLinkedinPublish($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/social/linkedin/publish", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SocialPublishResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SocialPublishResult>
     */
    public function socialTelegramPublish($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/social/telegram/publish", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SocialPublishResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SocialPublishResult>
     */
    public function socialTwitterPublish($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/social/twitter/publish", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SocialPublishResult::class);
    }

}
