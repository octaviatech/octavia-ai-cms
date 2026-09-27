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

}
