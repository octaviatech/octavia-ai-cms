<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class AuthorsResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AuthorWrapper>
     */
    public function create($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/authors/create", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AuthorWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AuthorWrapper>
     */
    public function update($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/authors/update", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AuthorWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function deleteId($id, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/authors/delete/" . rawurlencode($id) . "", $options);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AuthorList>
     */
    public function getAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/authors/getAll", $options, \Octavia\CmsSDK\Types\AuthorList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AuthorWrapper>
     */
    public function getById($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/authors/getById/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\AuthorWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AuthorWrapper>
     */
    public function getBySlug($slug, array $options = []): Envelope
    {
        return $this->client->request("GET", "/authors/getBySlug/" . rawurlencode($slug) . "", $options, \Octavia\CmsSDK\Types\AuthorWrapper::class);
    }

}
