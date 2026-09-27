<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class ArticlesResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleWrapper>
     */
    public function create($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/articles/create", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\ArticleWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleWrapper>
     */
    public function update($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/articles/update", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\ArticleWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function archive($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/articles/archive", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function deleteId($id, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/articles/delete/" . rawurlencode($id) . "", $options);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleList>
     */
    public function getAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/getAll", $options, \Octavia\CmsSDK\Types\ArticleList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleWrapper>
     */
    public function getById($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/getById/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\ArticleWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleWrapper>
     */
    public function getBySlug($slug, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/getBySlug/" . rawurlencode($slug) . "", $options, \Octavia\CmsSDK\Types\ArticleWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleList>
     */
    public function getByCategoryId($categoryId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/getByCategoryId/" . rawurlencode($categoryId) . "", $options, \Octavia\CmsSDK\Types\ArticleList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleList>
     */
    public function getBySubCategoryId($subCategoryId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/getBySubCategoryId/" . rawurlencode($subCategoryId) . "", $options, \Octavia\CmsSDK\Types\ArticleList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleList>
     */
    public function getByAuthorId($authorId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/getByAuthorId/" . rawurlencode($authorId) . "", $options, \Octavia\CmsSDK\Types\ArticleList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleList>
     */
    public function getByTag($tag, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/getByTag/" . rawurlencode($tag) . "", $options, \Octavia\CmsSDK\Types\ArticleList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleList>
     */
    public function getByCategorySlug($slug, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/getByCategorySlug/" . rawurlencode($slug) . "", $options, \Octavia\CmsSDK\Types\ArticleList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleList>
     */
    public function getBySubCategorySlug($slug, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/getBySubCategorySlug/" . rawurlencode($slug) . "", $options, \Octavia\CmsSDK\Types\ArticleList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleList>
     */
    public function search(array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/search", $options, \Octavia\CmsSDK\Types\ArticleList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleList>
     */
    public function advanceSearch(array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/advanceSearch", $options, \Octavia\CmsSDK\Types\ArticleList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SeoAnalysisResult>
     */
    public function seoAnalysisId($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/seoAnalysis/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\SeoAnalysisResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleReactionTotals>
     */
    public function idReactionPOST($id, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/articles/" . rawurlencode($id) . "/reaction", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\ArticleReactionTotals::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleReactionTotals>
     */
    public function idReactionDELETE($id, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/articles/" . rawurlencode($id) . "/reaction", $options, \Octavia\CmsSDK\Types\ArticleReactionTotals::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleReactionSummary>
     */
    public function idReactionSummary($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/" . rawurlencode($id) . "/reactionSummary", $options, \Octavia\CmsSDK\Types\ArticleReactionSummary::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CommentWrapper>
     */
    public function idCommentsPOST($id, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/articles/" . rawurlencode($id) . "/comments", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CommentWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CommentListWrapper>
     */
    public function idCommentsGET($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/" . rawurlencode($id) . "/comments", $options, \Octavia\CmsSDK\Types\CommentListWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ArticleList>
     */
    public function commentsGetAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/comments/getAll", $options, \Octavia\CmsSDK\Types\ArticleList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CommentWrapper>
     */
    public function commentsCommentIdPATCH($commentId, $body, array $options = []): Envelope
    {
        return $this->client->request("PATCH", "/articles/comments/" . rawurlencode($commentId) . "", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CommentWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function commentsCommentIdDELETE($commentId, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/articles/comments/" . rawurlencode($commentId) . "", $options);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CommentReactionTotals>
     */
    public function commentsCommentIdReactionPOST($commentId, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/articles/comments/" . rawurlencode($commentId) . "/reaction", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CommentReactionTotals::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CommentReactionTotals>
     */
    public function commentsCommentIdReactionDELETE($commentId, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/articles/comments/" . rawurlencode($commentId) . "/reaction", $options, \Octavia\CmsSDK\Types\CommentReactionTotals::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CommentReactionSummary>
     */
    public function commentsCommentIdReactionSummary($commentId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/comments/" . rawurlencode($commentId) . "/reactionSummary", $options, \Octavia\CmsSDK\Types\CommentReactionSummary::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\EngagementSettings>
     */
    public function engagementSettingsGET(array $options = []): Envelope
    {
        return $this->client->request("GET", "/articles/engagementSettings", $options, \Octavia\CmsSDK\Types\EngagementSettings::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\EngagementSettings>
     */
    public function engagementSettingsPUT($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/articles/engagementSettings", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\EngagementSettings::class);
    }

}
