<?php

declare(strict_types=1);

namespace Octavia\CmsSDK;

/**
 * One Server-Sent Event (D-24).
 *
 * Produced by {@see Client::streamSSE()} and yielded in arrival order.
 */
final class SseEvent
{
    public function __construct(
        public readonly string $event,
        public readonly mixed $data,
        public readonly ?string $id = null,
        public readonly ?int $retry = null,
    ) {
    }

    /**
     * Parse one `event:`/`data:` block.
     *
     * Returns null for an empty frame (a comment-only heartbeat, or blank
     * padding), so callers can skip it instead of yielding a meaningless event.
     */
    public static function parse(string $frame): ?self
    {
        $event = 'message';
        $id = null;
        $retry = null;
        $dataLines = [];

        foreach (preg_split('/\r\n|\r|\n/', $frame) ?: [] as $rawLine) {
            if ($rawLine === '' || str_starts_with($rawLine, ':')) {
                continue;
            }

            $colon = strpos($rawLine, ':');
            $field = $colon === false ? $rawLine : substr($rawLine, 0, $colon);
            $value = $colon === false ? '' : substr($rawLine, $colon + 1);
            if (str_starts_with($value, ' ')) {
                $value = substr($value, 1);
            }

            if ($field === 'event') {
                $event = $value;
            } elseif ($field === 'data') {
                $dataLines[] = $value;
            } elseif ($field === 'id') {
                $id = $value;
            } elseif ($field === 'retry' && is_numeric($value)) {
                $retry = (int) $value;
            }
        }

        if ($dataLines === [] && $event === 'message') {
            return null;
        }

        $rawData = implode("\n", $dataLines);
        $data = $rawData;
        if ($rawData !== '') {
            // A non-JSON payload stays text — several AI endpoints stream plain
            // deltas rather than JSON objects.
            $decoded = json_decode($rawData, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $data = $decoded;
            }
        }

        return new self($event, $data, $id, $retry);
    }
}