<?php

declare(strict_types=1);

namespace Octavia\CmsSDK;

// @generated uses:begin
use Octavia\CmsSDK\Resources\AIResource;
use Octavia\CmsSDK\Resources\AIConversationResource;
use Octavia\CmsSDK\Resources\ArticlesResource;
use Octavia\CmsSDK\Resources\AuthorsResource;
use Octavia\CmsSDK\Resources\CampaignsResource;
use Octavia\CmsSDK\Resources\CategoriesResource;
use Octavia\CmsSDK\Resources\ContentPlanResource;
use Octavia\CmsSDK\Resources\FormsResource;
use Octavia\CmsSDK\Resources\FormSubmissionsResource;
use Octavia\CmsSDK\Resources\LanguagesResource;
use Octavia\CmsSDK\Resources\MediaResource;
use Octavia\CmsSDK\Resources\ReportsResource;
use Octavia\CmsSDK\Resources\SEOHubResource;
use Octavia\CmsSDK\Resources\SubcategoriesResource;
use Octavia\CmsSDK\Resources\TagsResource;
use Octavia\CmsSDK\Resources\TaxonomyResource;
// @generated uses:end
use RuntimeException;

class ApiError extends RuntimeException
{
    public int $status;
    public array|string|null $payload;

    public function __construct(string $message, int $status, array|string|null $payload = null)
    {
        parent::__construct($message, $status);
        $this->status = $status;
        $this->payload = $payload;
    }
}

class ClientConfig
{
    public string $baseUrl;
    public string $apiKey;
    public int $timeoutMs;
    public bool $throwOnError;

    public function __construct(string $baseUrl, string $apiKey, int $timeoutMs = 0, bool $throwOnError = false)
    {
        if ($baseUrl === '') {
            throw new RuntimeException('baseUrl is required');
        }
        if ($apiKey === '') {
            throw new RuntimeException('apiKey is required');
        }
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->apiKey = $apiKey;
        $this->timeoutMs = $timeoutMs;
        $this->throwOnError = $throwOnError;
    }
}

class Client
{
    // @generated fields:begin
    public AIResource $ai;
    public AIConversationResource $aIConversation;
    public ArticlesResource $articles;
    public AuthorsResource $authors;
    public CampaignsResource $campaigns;
    public CategoriesResource $categories;
    public ContentPlanResource $contentPlan;
    public FormsResource $forms;
    public FormSubmissionsResource $formSubmissions;
    public LanguagesResource $languages;
    public MediaResource $media;
    public ReportsResource $reports;
    public SEOHubResource $sEOHub;
    public SubcategoriesResource $subcategories;
    public TagsResource $tags;
    public TaxonomyResource $taxonomy;
    // @generated fields:end

    private ClientConfig $config;

    public function __construct(ClientConfig $config)
    {
        $this->config = $config;
        // @generated ctor:begin
        $this->ai = new AIResource($this);
        $this->aIConversation = new AIConversationResource($this);
        $this->articles = new ArticlesResource($this);
        $this->authors = new AuthorsResource($this);
        $this->campaigns = new CampaignsResource($this);
        $this->categories = new CategoriesResource($this);
        $this->contentPlan = new ContentPlanResource($this);
        $this->forms = new FormsResource($this);
        $this->formSubmissions = new FormSubmissionsResource($this);
        $this->languages = new LanguagesResource($this);
        $this->media = new MediaResource($this);
        $this->reports = new ReportsResource($this);
        $this->sEOHub = new SEOHubResource($this);
        $this->subcategories = new SubcategoriesResource($this);
        $this->tags = new TagsResource($this);
        $this->taxonomy = new TaxonomyResource($this);
        // @generated ctor:end
    }

    /**
     * @template T of Envelope
     * @param class-string<T>|null $dataType
     * @return T
     */
    public function request(string $method, string $path, ?array $options = null, ?string $dataType = null): Envelope
    {
        $options = $this->normalizeOptions($options ?? []);
        $query = $options['query'] ?? [];
        $body = $options['body'] ?? null;

        $url = $this->config->baseUrl . $path . $this->buildQuery($query);

        // The gateway derives the tenant and service state from the key itself,
        // so the SDK sends no header the caller could spoof.
        $allHeaders = [
            'Content-Type: application/json',
            'x-api-key: ' . $this->config->apiKey,
        ];

        $curl = curl_init($url);
        if ($curl === false) {
            throw new RuntimeException('Failed to initialize curl');
        }

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $allHeaders);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($this->config->timeoutMs > 0) {
            curl_setopt($curl, CURLOPT_TIMEOUT_MS, $this->config->timeoutMs);
        }

        if ($body !== null) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
        }

        $response = curl_exec($curl);
        if ($response === false) {
            $err = curl_error($curl);
            curl_close($curl);
            if ($this->config->throwOnError) {
                throw new RuntimeException('Request failed: ' . $err);
            }
            return new Envelope(false, 0, 'Request failed: ' . $err, null);
        }

        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $decoded = json_decode($response, true);
        $payload = $decoded !== null ? $decoded : $response;

        if ($status < 200 || $status >= 300) {
            $message = is_array($payload) && isset($payload['message']) ? $payload['message'] : 'Request failed';
            if ($this->config->throwOnError) {
                throw new ApiError($message, $status, $payload);
            }
            return new Envelope(false, $status, $message, null);
        }

        return Envelope::fromArray(is_array($payload) ? $payload : ['data' => $payload], $dataType);
    }

    public function health(): Envelope
    {
        return $this->request('GET', '/healthz');
    }

    /**
     * Consume a `text/event-stream` endpoint as a generator of frames (D-24).
     *
     * `request()` cannot serve these: it reads the whole body and parses it as
     * JSON, so a caller gets one opaque string instead of the frames the
     * endpoint emits.
     *
     * Uses `CURLOPT_WRITEFUNCTION` on a multi handle so each frame is handed
     * over the moment it arrives rather than at the end — a generation can run
     * for minutes and buffering it defeats the point.
     *
     * @return \Generator<int, SseEvent>
     */
    public function streamSSE(string $method, string $path, ?array $options = null): \Generator
    {
        $options = $this->normalizeOptions($options ?? []);
        $query = $options['query'] ?? [];
        $body = $options['body'] ?? null;

        $url = $this->config->baseUrl . $path . $this->buildQuery($query);

        // The gateway derives tenant and service state from the key itself, so
        // the SDK sends no header the caller could spoof.
        $headers = [
            'Content-Type: application/json',
            'Accept: text/event-stream',
            'x-api-key: ' . $this->config->apiKey,
        ];

        $curl = curl_init($url);
        if ($curl === false) {
            throw new RuntimeException('Failed to initialize curl');
        }

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        if ($body !== null) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
        }
        // Deliberately no CURLOPT_TIMEOUT: it exists to bound a single call,
        // and a generation is not one.

        $buffer = '';
        $running = null;

        curl_setopt($curl, CURLOPT_WRITEFUNCTION, function ($ch, $chunk) use (&$buffer) {
            $buffer .= (string) $chunk;
            return strlen((string) $chunk);
        });

        $multi = curl_multi_init();
        curl_multi_add_handle($multi, $curl);

        try {
            do {
                if (curl_multi_exec($multi, $running) !== CURLM_OK) {
                    break;
                }

                $info = curl_multi_info_read($multi);
                while ($info !== false) {
                    if ($info['result'] !== CURLE_OK) {
                        throw new ApiError(
                            'Stream failed: ' . curl_error($curl),
                            (int) curl_getinfo($curl, CURLINFO_HTTP_CODE),
                            null,
                        );
                    }
                    $info = curl_multi_info_read($multi);
                }

                // A chunk boundary can fall anywhere, so a partial frame stays in
                // the buffer until the rest of it arrives.
                while (($boundary = strpos($buffer, "\n\n")) !== false) {
                    $frame = substr($buffer, 0, $boundary);
                    $buffer = substr($buffer, $boundary + 2);
                    $parsed = SseEvent::parse($frame);
                    if ($parsed !== null) {
                        yield $parsed;
                    }
                }

                if ($running > 0) {
                    curl_multi_select($multi, 1.0);
                }
            } while ($running > 0);
        } finally {
            curl_multi_remove_handle($multi, $curl);
            curl_multi_close($multi);
            curl_close($curl);
        }

        // The final frame need not be terminated by a blank line.
        $tail = SseEvent::parse($buffer);
        if ($tail !== null) {
            yield $tail;
        }
    }

    private function normalizeOptions(array $options): array
    {
        $hasQuery = array_key_exists('query', $options);
        $hasBody = array_key_exists('body', $options);

        if (!$hasQuery && !$hasBody) {
            return ['query' => $options];
        }

        return $options;
    }

    private function buildQuery(array $query): string
    {
        if (count($query) === 0) {
            return '';
        }
        $filtered = [];
        foreach ($query as $k => $v) {
            if ($v === null) {
                continue;
            }
            if (is_array($v)) {
                $filtered[$k] = implode(',', array_map('strval', $v));
            } else {
                $filtered[$k] = $v;
            }
        }
        $qs = http_build_query($filtered);
        return $qs ? '?' . $qs : '';
    }
}
