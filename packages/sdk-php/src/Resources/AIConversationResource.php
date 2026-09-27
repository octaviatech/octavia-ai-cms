<?php

declare(strict_types=1);

namespace Octavia\CmsSDK\Resources;

use Octavia\CmsSDK\Client;
use Octavia\CmsSDK\Envelope;

class AIConversationResource
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ConversationStart>
     */
    public function conversationStart($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/conversation/start", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\ConversationStart::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AIConversationContinue>
     */
    public function conversationContinue($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/conversation/continue", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AIConversationContinue::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AIConversation>
     */
    public function conversationConversationId($conversationId, array $options = []): Envelope
    {
        return $this->client->request("GET", "/ai/conversation/" . rawurlencode($conversationId) . "", $options, \Octavia\CmsSDK\Types\AIConversation::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<null>
     */
    public function conversationGenerateStream($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/conversation/generate/stream", array_merge($options, ["body" => $body]));
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\ConversationGenerate>
     */
    public function conversationGenerate($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/conversation/generate", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\ConversationGenerate::class);
    }

    /**
     * @return \Octavia\CmsSDK\Envelope
     * @phpstan-return \Octavia\CmsSDK\Envelope<\Octavia\CmsSDK\Types\AIConversationRegenerate>
     */
    public function conversationRegenerate($body, array $options = []): Envelope
    {
        return $this->client->request("POST", "/ai/conversation/regenerate", array_merge($options, ["body" => $body]), \Octavia\CmsSDK\Types\AIConversationRegenerate::class);
    }

}
