<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class FormsResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\FormWrapper>
     */
    public function create($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/forms/create", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\FormWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\FormNullableWrapper>
     */
    public function update($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/forms/update", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\FormNullableWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function delete($body, array $options = []): Envelope
    {
        return $this->client->request("DELETE", "/forms/delete", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\FormList>
     */
    public function getAll(array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/getAll", $options, \Octavia\CmsSDK\Types\FormList::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\FormWrapper>
     */
    public function getBySlug($slug, array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/getBySlug/" . rawurlencode($slug) . "", $options, \Octavia\CmsSDK\Types\FormWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\FormWrapper>
     */
    public function getById($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/getById/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\FormWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\NextFormWrapper>
     */
    public function getNextById($id, array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/getNextById/" . rawurlencode($id) . "", $options, \Octavia\CmsSDK\Types\NextFormWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CaptchaConfigWrapper>
     */
    public function captchaConfigPUT($body, array $options = []): Envelope
    {
        return $this->client->request("PUT", "/forms/captcha/config", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CaptchaConfigWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CaptchaConfigWrapper>
     */
    public function captchaConfigGET(array $options = []): Envelope
    {
        return $this->client->request("GET", "/forms/captcha/config", $options, \Octavia\CmsSDK\Types\CaptchaConfigWrapper::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\CaptchaConfigWrapper>
     */
    public function captchaConfigSecret($body, array $options = []): Envelope
    {
        return $this->client->request("PATCH", "/forms/captcha/config/secret", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\CaptchaConfigWrapper::class);
    }

}
