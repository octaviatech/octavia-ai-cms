<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class TagsResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TagWrapper>
     */
    public function create($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/tags/create", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\TagWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TagList>
     */
    public function getAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/tags/getAll", $options, \Octavia\CmsSDK\Types\TagList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\TagSearchResult>
     */
    public function search(array $options = []): Envelope
    {
        return $this->client->request("GET", "/tags/search", $options, \Octavia\CmsSDK\Types\TagSearchResult::class);
    }

}
