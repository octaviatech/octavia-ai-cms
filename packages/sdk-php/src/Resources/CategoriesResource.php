<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class CategoriesResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CategoryWrapper>
     */
    public function create($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/categories/create", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CategoryWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CategoryWrapper>
     */
    public function update($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/categories/update", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CategoryWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CategoryDeleteResult>
     */
    public function deleteId($id, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/categories/delete/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\CategoryDeleteResult::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CategoryList>
     */
    public function getAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/categories/getAll", $options, \Octavia\CmsSDK\Types\CategoryList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CategoryWrapper>
     */
    public function getById($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/categories/getById/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\CategoryWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CategoryWrapper>
     */
    public function getBySlug($slug, array $options = []): Envelope
    {
        return $this->client->request("GET", "/categories/getBySlug/" . rawurlencode($slug) . "", $options, \Octavia\CmsSDK\Types\CategoryWrapper::class);
    }

}
