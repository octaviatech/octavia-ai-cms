<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class SubcategoriesResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubCategoryWrapper>
     */
    public function create($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/subcategories/create", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubCategoryWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubCategoryWrapper>
     */
    public function update($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/subcategories/update", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\SubCategoryWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function deleteId($id, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/subcategories/delete/" . rawurlencode($id) . "", $options);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubCategoryList>
     */
    public function getAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/subcategories/getAll", $options, \Octavia\CmsSDK\Types\SubCategoryList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubCategoryWrapper>
     */
    public function getById($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/subcategories/getById/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\SubCategoryWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubCategoryWrapper>
     */
    public function getBySlug($slug, array $options = []): Envelope
    {
        return $this->client->request("GET", "/subcategories/getBySlug/" . rawurlencode($slug) . "", $options, \Octavia\CmsSDK\Types\SubCategoryWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\SubCategoryList>
     */
    public function getByCategoryId($categoryId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/subcategories/getByCategoryId/" . rawurlencode($categoryId) . "", $options, \Octavia\CmsSDK\Types\SubCategoryList::class);
    }

}
