<?php

declare(strict_types=1);

namespace Octavia\CmsSDK;

/**
 * The response envelope every endpoint answers with.
 *
 * @template T
 */
class Envelope
{
    public bool $success;
    public int $statusCode;
    public string $message;

    /** @var T|null */
    public mixed $data;

    /**
     * @param T|null $data
     */
    public function __construct(bool $success, int $statusCode, string $message, mixed $data = null)
    {
        $this->success = $success;
        $this->statusCode = $statusCode;
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * Hydrate the payload, mapping `data` onto its generated type when the
     * caller asked for one.
     *
     * @param array<string, mixed> $payload
     * @param class-string|null     $dataType a class exposing static fromArray()
     * @return static<T>
     */
    public static function fromArray(array $payload, ?string $dataType = null): static
    {
        $data = $payload['data'] ?? null;
        if ($dataType !== null && is_array($data) && is_callable([$dataType, 'fromArray'])) {
            $data = $dataType::fromArray($data);
        }

        return new static(
            (bool) ($payload['success'] ?? false),
            (int) ($payload['statusCode'] ?? 0),
            (string) ($payload['message'] ?? ''),
            $data,
        );
    }
}
