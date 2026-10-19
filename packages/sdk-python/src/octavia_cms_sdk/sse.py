# src/octavia_cms_sdk/sse.py
#
# Server-Sent Events support (D-24).
#
# `Client.request_typed` cannot serve a `text/event-stream` endpoint: it reads
# the whole body and parses it as JSON, so a caller gets one opaque blob
# instead of the frames the endpoint emits. These helpers stream instead.

from __future__ import annotations

import json
from dataclasses import dataclass
from typing import Any, Dict, Iterator, Optional

__all__ = ["SseEvent", "parse_sse_frame"]


@dataclass
class SseEvent:
    """One Server-Sent Event.

    Attributes:
        event: the `event:` name, or "message" when the frame omits it.
        data: the parsed JSON payload, or the raw text when it is not JSON.
        id: the `id:` field, if present.
        retry: the `retry:` field in milliseconds, if present and numeric.
    """

    event: str
    data: Any
    id: Optional[str] = None
    retry: Optional[int] = None


def parse_sse_frame(frame: str) -> Optional[SseEvent]:
    """Parse one `event:`/`data:` block.

    Returns None for a frame with nothing in it (a comment-only heartbeat, or
    blank padding), so callers can skip it without yielding an empty event.
    """
    event = "message"
    event_id: Optional[str] = None
    retry: Optional[int] = None
    data_lines = []

    for raw_line in frame.replace("\r\n", "\n").replace("\r", "\n").split("\n"):
        if not raw_line or raw_line.startswith(":"):
            continue
        colon = raw_line.find(":")
        field = raw_line if colon == -1 else raw_line[:colon]
        value = "" if colon == -1 else raw_line[colon + 1 :]
        if value.startswith(" "):
            value = value[1:]

        if field == "event":
            event = value
        elif field == "data":
            data_lines.append(value)
        elif field == "id":
            event_id = value
        elif field == "retry":
            try:
                retry = int(value)
            except ValueError:
                pass

    if not data_lines and event == "message":
        return None

    raw_data = "\n".join(data_lines)
    data: Any = raw_data
    if raw_data:
        try:
            data = json.loads(raw_data)
        except (ValueError, TypeError):
            # A non-JSON payload is handed back as text — several AI endpoints
            # stream plain deltas rather than JSON objects.
            pass

    return SseEvent(event=event, data=data, id=event_id, retry=retry)


def iter_sse_frames(chunks: Iterator[bytes]) -> Iterator[SseEvent]:
    """Reassemble SSE frames from an arbitrarily chunked byte iterator.

    A chunk boundary can fall anywhere — mid-field, mid-frame, even mid
    multi-byte character — so bytes are buffered until a whole frame (terminated
    by a blank line) is available. The last frame is emitted without one.
    """
    buffer = ""
    for raw in chunks:
        if isinstance(raw, bytes):
            buffer += raw.decode("utf-8", errors="replace")
        else:
            buffer += raw

        while "\n\n" in buffer:
            frame, buffer = buffer.split("\n\n", 1)
            parsed = parse_sse_frame(frame)
            if parsed is not None:
                yield parsed

    tail = parse_sse_frame(buffer)
    if tail is not None:
        yield tail


def sse_headers(api_key: str) -> Dict[str, str]:
    """Headers an SSE request needs: the API key and an explicit Accept."""
    return {
        "Content-Type": "application/json",
        "Accept": "text/event-stream",
        "x-api-key": api_key,
    }