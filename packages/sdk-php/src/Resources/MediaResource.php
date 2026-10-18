<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class MediaResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\MediaAssetList>
     */
    public function getAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/media/getAll", $options, \Octavia\CmsSDK\Types\MediaAssetList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\MediaAssetWrapper>
     */
    public function create($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/media/create", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\MediaAssetWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\MediaAssetWrapper>
     */
    public function update($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/media/update", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\MediaAssetWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\MediaAssetWrapper>
     */
    public function deleteId($id, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/media/delete/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\MediaAssetWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\MediaUsage>
     */
    public function usage(array $options = []): Envelope
    {
        return $this->client->request("GET", "/media/usage", $options, \Octavia\CmsSDK\Types\MediaUsage::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\MediaMetadataSuggestion>
     */
    public function aiMetadata($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/media/ai/metadata", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\MediaMetadataSuggestion::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\MediaMissingAlt>
     */
    public function aiMissingAlt(array $options = []): Envelope
    {
        return $this->client->request("GET", "/media/ai/missingAlt", $options, \Octavia\CmsSDK\Types\MediaMissingAlt::class);
    }

}
