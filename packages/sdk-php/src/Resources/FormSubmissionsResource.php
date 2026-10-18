<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class FormSubmissionsResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionWrapper>
     */
    public function idSubmit($id, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/" . rawurlencode($id) . "/submit", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionWrapper>
     */
    public function idInternalSubmit($id, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/" . rawurlencode($id) . "/internal-submit", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\FormSubmissionList>
     */
    public function submissionsGetAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/submissions/getAll", $options, \Octavia\CmsSDK\Types\FormSubmissionList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\FormSubmissionList>
     */
    public function idGetAllSubmissions($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/" . rawurlencode($id) . "/getAllSubmissions", $options, \Octavia\CmsSDK\Types\FormSubmissionList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionWrapper>
     */
    public function getSubmissionById($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/getSubmissionById/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\SubmissionWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\FormSubmissionRelations>
     */
    public function submissionIdRelations($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/submission/" . rawurlencode($id) . "/relations", $options, \Octavia\CmsSDK\Types\FormSubmissionRelations::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionWrapper>
     */
    public function submissionIdRelationsFieldNameConnect($id, $fieldName, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/submission/" . rawurlencode($id) . "/relations/" . rawurlencode($fieldName) . "/connect", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionWrapper>
     */
    public function submissionIdRelationsFieldNameDisconnect($id, $fieldName, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/submission/" . rawurlencode($id) . "/relations/" . rawurlencode($fieldName) . "/disconnect", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionWrapper>
     */
    public function submissionIdRelationsFieldNameReorder($id, $fieldName, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/submission/" . rawurlencode($id) . "/relations/" . rawurlencode($fieldName) . "/reorder", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\FormRelationsBackfill>
     */
    public function submissionsRelationsBackfill($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/submissions/relations/backfill", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\FormRelationsBackfill::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionRawWrapper>
     */
    public function submissionUpdateId($id, $body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/forms/submission/update/" . rawurlencode($id) . "", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionRawWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionRawWrapper>
     */
    public function submissionDeleteId($id, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/forms/submission/delete/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\SubmissionRawWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionInboxFacets>
     */
    public function submissionsFacets(array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/submissions/facets", $options, \Octavia\CmsSDK\Types\SubmissionInboxFacets::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionAnalysisResult>
     */
    public function submissionIdAnalyze($id, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/submission/" . rawurlencode($id) . "/analyze", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionAnalysisResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionBulkAnalysis>
     */
    public function submissionsAnalyze($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/submissions/analyze", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionBulkAnalysis::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionActivityWrapper>
     */
    public function submissionIdNotes($id, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/submission/" . rawurlencode($id) . "/notes", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionActivityWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionActivityList>
     */
    public function submissionIdActivity($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/submission/" . rawurlencode($id) . "/activity", $options, \Octavia\CmsSDK\Types\SubmissionActivityList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionReplyWrapper>
     */
    public function submissionIdReplyDraft($id, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/submission/" . rawurlencode($id) . "/reply-draft", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionReplyWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionReplyWrapper>
     */
    public function submissionIdReply($id, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/submission/" . rawurlencode($id) . "/reply", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubmissionReplyWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubmissionDigestWrapper>
     */
    public function submissionsDigest(array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/submissions/digest", $options, \Octavia\CmsSDK\Types\SubmissionDigestWrapper::class);
    }

}
