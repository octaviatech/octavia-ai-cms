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
     * Stream this endpoint as Server-Sent Events (D-24).
     *
     * @return \Generator<int, \Octavia\CmsSDK\SseEvent>
     */
    public function summarizeLive($body, array $options = []): \Generator
    {
        return $this->client->streamSSE("POST", "/ai/summarize/stream", array_merge($options, ["body" => $body]));
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
     * Stream this endpoint as Server-Sent Events (D-24).
     *
     * @return \Generator<int, \Octavia\CmsSDK\SseEvent>
     */
    public function summarizeArticleLive($body, array $options = []): \Generator
    {
        return $this->client->streamSSE("POST", "/ai/summarizeArticle/stream", array_merge($options, ["body" => $body]));
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
     * Stream this endpoint as Server-Sent Events (D-24).
     *
     * @return \Generator<int, \Octavia\CmsSDK\SseEvent>
     */
    public function seoOptimizeLive($body, array $options = []): \Generator
    {
        return $this->client->streamSSE("POST", "/ai/seoOptimize/stream", array_merge($options, ["body" => $body]));
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
     * Stream this endpoint as Server-Sent Events (D-24).
     *
     * @return \Generator<int, \Octavia\CmsSDK\SseEvent>
     */
    public function translateLive($body, array $options = []): \Generator
    {
        return $this->client->streamSSE("POST", "/ai/translate/stream", array_merge($options, ["body" => $body]));
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
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiAutofillResult>
     */
    public function autofillArticle($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/autofillArticle", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiAutofillResult::class);
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
     * Stream this endpoint as Server-Sent Events (D-24).
     *
     * @return \Generator<int, \Octavia\CmsSDK\SseEvent>
     */
    public function optimizeArticleLive($body, array $options = []): \Generator
    {
        return $this->client->streamSSE("POST", "/ai/optimizeArticle/stream", array_merge($options, ["body" => $body]));
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
     * Stream this endpoint as Server-Sent Events (D-24).
     *
     * @return \Generator<int, \Octavia\CmsSDK\SseEvent>
     */
    public function translateArticleLive($body, array $options = []): \Generator
    {
        return $this->client->streamSSE("POST", "/ai/translateArticle/stream", array_merge($options, ["body" => $body]));
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
     * Stream this endpoint as Server-Sent Events (D-24).
     *
     * @return \Generator<int, \Octavia\CmsSDK\SseEvent>
     */
    public function repurposeLive($body, array $options = []): \Generator
    {
        return $this->client->streamSSE("POST", "/ai/repurpose/stream", array_merge($options, ["body" => $body]));
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

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CreditSnapshot>
     */
    public function credits(array $options = []): Envelope
    {
        return $this->client->request("GET", "/ai/credits", $options, \Octavia\CmsSDK\Types\CreditSnapshot::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TokenEstimate>
     */
    public function estimate($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/estimate", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\TokenEstimate::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function run($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/run", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiRunList>
     */
    public function creditsRuns(array $options = []): Envelope
    {
        return $this->client->request("GET", "/ai/credits/runs", $options, \Octavia\CmsSDK\Types\AiRunList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function eventsStream(array $options = []): Envelope
    {
        return $this->client->request("GET", "/ai/events/stream", $options);
    }

    /**
     * Stream this endpoint as Server-Sent Events (D-24).
     *
     * @return \Generator<int, \Octavia\CmsSDK\SseEvent>
     */
    public function eventsLive(array $options = []): \Generator
    {
        return $this->client->streamSSE("GET", "/ai/events/stream", $options);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiProposal>
     */
    public function proposalsPOST($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/proposals", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiProposal::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<array<int, \Octavia\CmsSDK\Types\AiProposal>>
     */
    public function proposalsGET(array $options = []): Envelope
    {
        return $this->client->request("GET", "/ai/proposals", $options, \Octavia\CmsSDK\Types\AiProposal::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiProposalCount>
     */
    public function proposalsCount(array $options = []): Envelope
    {
        return $this->client->request("GET", "/ai/proposals/count", $options, \Octavia\CmsSDK\Types\AiProposalCount::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiProposal>
     */
    public function proposalsId($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/ai/proposals/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\AiProposal::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiProposalDecision>
     */
    public function proposalsIdAccept($id, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/proposals/" . rawurlencode($id) . "/accept", $options, \Octavia\CmsSDK\Types\AiProposalDecision::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiProposal>
     */
    public function proposalsIdReject($id, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/proposals/" . rawurlencode($id) . "/reject", $options, \Octavia\CmsSDK\Types\AiProposal::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiProposal>
     */
    public function proposalsIdUndo($id, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/proposals/" . rawurlencode($id) . "/undo", $options, \Octavia\CmsSDK\Types\AiProposal::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<array<int, \Octavia\CmsSDK\Types\AiProposalBulkResultItem>>
     */
    public function proposalsBulkAccept($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/proposals/bulk-accept", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiProposalBulkResultItem::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiSettings>
     */
    public function settingsGET(array $options = []): Envelope
    {
        return $this->client->request("GET", "/ai/settings", $options, \Octavia\CmsSDK\Types\AiSettings::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AiSettings>
     */
    public function settingsPUT($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/ai/settings", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AiSettings::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleRevisionList>
     */
    public function revisionsArticleId($articleId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/revisions/" . rawurlencode($articleId) . "", $options, \Octavia\CmsSDK\Types\ArticleRevisionList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleRevisionRestore>
     */
    public function revisionsArticleIdRevisionIdRestore($articleId, $revisionId, array $options = []): Envelope
    {
        return $this->client->request("POST", "/articles/revisions/" . rawurlencode($articleId) . "/" . rawurlencode($revisionId) . "/restore", $options, \Octavia\CmsSDK\Types\ArticleRevisionRestore::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleReadiness>
     */
    public function readinessArticleId($articleId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/readiness/" . rawurlencode($articleId) . "", $options, \Octavia\CmsSDK\Types\ArticleReadiness::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TranslationStateReport>
     */
    public function translationStateArticleId($articleId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/translation-state/" . rawurlencode($articleId) . "", $options, \Octavia\CmsSDK\Types\TranslationStateReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TranslationStateDoc>
     */
    public function translationStateArticleIdLocaleComplete($articleId, $locale, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/articles/translation-state/" . rawurlencode($articleId) . "/" . rawurlencode($locale) . "/complete", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\TranslationStateDoc::class);
    }

}
