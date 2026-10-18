<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class CampaignsResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CampaignList>
     */
    public function getAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/campaigns/getAll", $options, \Octavia\CmsSDK\Types\CampaignList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CampaignWrapper>
     */
    public function create($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/campaigns/create", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CampaignWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CampaignWrapper>
     */
    public function update($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/campaigns/update", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CampaignWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CampaignWrapper>
     */
    public function deleteId($id, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/campaigns/delete/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\CampaignWrapper::class);
    }

}
