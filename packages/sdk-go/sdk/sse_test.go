package sdk

import "testing"

func TestParseSSEFrame(t *testing.T) {
	ev, ok := parseSSEFrame("event: content_chunk\ndata: {\"text\":\"hi\"}")
	if !ok || ev.Event != "content_chunk" {
		t.Fatalf("expected content_chunk frame, got ok=%v ev=%+v", ok, ev)
	}
	data, isMap := ev.Data.(map[string]any)
	if !isMap || data["text"] != "hi" {
		t.Fatalf("expected decoded JSON data, got %#v", ev.Data)
	}

	// A non-JSON payload stays a string — several AI endpoints stream deltas.
	ev, ok = parseSSEFrame("data: raw delta")
	if !ok || ev.Event != "message" || ev.Data != "raw delta" {
		t.Fatalf("expected a default 'message' event carrying raw text, got ok=%v ev=%+v", ok, ev)
	}

	// Comment-only heartbeats must not surface as empty events.
	if _, ok := parseSSEFrame(": keepalive"); ok {
		t.Fatal("a comment-only frame must not produce an event")
	}

	ev, _ = parseSSEFrame("event: progress\ndata: {\"a\":1}\nid: 7\nretry: 500")
	if ev.ID != "7" || ev.Retry != 500 {
		t.Fatalf("id/retry not parsed: %+v", ev)
	}

	// Repeated data: fields join with newlines, per the SSE spec.
	ev, _ = parseSSEFrame("event: complete\ndata: one\ndata: two")
	if ev.Data != "one\ntwo" {
		t.Fatalf("multi-line data not joined: %#v", ev.Data)
	}

	// CRLF is legal on the wire even though our own server emits LF.
	if ev, _ := parseSSEFrame("event: done\r\ndata: {}"); ev.Event != "done" {
		t.Fatal("CRLF line endings not handled")
	}

	// An empty data payload must not become nil-by-accident.
	if ev, _ := parseSSEFrame("event: empty\ndata:"); ev.Data != "" {
		t.Fatalf("expected an empty string payload, got %#v", ev.Data)
	}
}
