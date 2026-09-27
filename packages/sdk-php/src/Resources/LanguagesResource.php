<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class LanguagesResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\LanguageWrapper>
     */
    public function create($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/languages/create", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\LanguageWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\LanguageList>
     */
    public function getAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/languages/getAll", $options, \Octavia\CmsSDK\Types\LanguageList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\Language>
     */
    public function getById($body, array $options = []): Envelope
    {
        return $this->client->request("GET", "/languages/getById", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\Language::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\LanguageWrapper>
     */
    public function update($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/languages/update", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\LanguageWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function deleteId($id, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/languages/delete/" . rawurlencode($id) . "", $options);
    }

}
