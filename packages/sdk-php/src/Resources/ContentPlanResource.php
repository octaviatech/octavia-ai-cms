<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class ContentPlanResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ContentPlanList>
     */
    public function getAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/content-plan/getAll", $options, \Octavia\CmsSDK\Types\ContentPlanList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ContentPlanItemWrapper>
     */
    public function create($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/content-plan/create", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\ContentPlanItemWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ContentPlanItemWrapper>
     */
    public function update($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/content-plan/update", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\ContentPlanItemWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ContentPlanItemWrapper>
     */
    public function deleteId($id, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/content-plan/delete/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\ContentPlanItemWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\StartDraftWrapper>
     */
    public function idStartDraft($id, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/content-plan/" . rawurlencode($id) . "/start-draft", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\StartDraftWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ScheduleWrapper>
     */
    public function idSchedule($id, $body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/content-plan/" . rawurlencode($id) . "/schedule", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\ScheduleWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ContentGapReport>
     */
    public function gaps(array $options = []): Envelope
    {
        return $this->client->request("GET", "/content-plan/gaps", $options, \Octavia\CmsSDK\Types\ContentGapReport::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ContentPlanItemWrapper>
     */
    public function ideasFromAi($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/content-plan/ideas/from-ai", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\ContentPlanItemWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CalendarIdeas>
     */
    public function aiGenerateIdeas($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/content-plan/ai/generate-ideas", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CalendarIdeas::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CalendarPeriodPlan>
     */
    public function aiPlanPeriod($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/content-plan/ai/plan-period", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CalendarPeriodPlan::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CalendarBestTime>
     */
    public function aiBestTime(array $options = []): Envelope
    {
        return $this->client->request("POST", "/content-plan/ai/best-time", $options, \Octavia\CmsSDK\Types\CalendarBestTime::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CalendarReschedule>
     */
    public function aiReschedule($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/content-plan/ai/reschedule", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CalendarReschedule::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CadenceWrapper>
     */
    public function cadenceGET(array $options = []): Envelope
    {
        return $this->client->request("GET", "/content-plan/cadence", $options, \Octavia\CmsSDK\Types\CadenceWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CadenceWrapper>
     */
    public function cadencePUT($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/content-plan/cadence", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CadenceWrapper::class);
    }

}
