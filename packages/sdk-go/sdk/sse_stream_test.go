package sdk

import (
	"net/http"
	"net/http/httptest"
	"strings"
	"testing"
)

// End-to-end exercise of StreamSSE against a real httptest server. The whole
// point of the method is that a frame split across writes is still reassembled,
// which only a buffering reader can guarantee.
func TestStreamSSEReassemblesSplitFrames(t *testing.T) {
	server := httptest.NewServer(http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		if got := r.Header.Get("x-api-key"); got != "secret" {
			t.Errorf("api key not forwarded: %q", got)
		}
		if got := r.Header.Get("Accept"); !strings.Contains(got, "text/event-stream") {
			t.Errorf("Accept header not set for streaming: %q", got)
		}

		w.Header().Set("Content-Type", "text/event-stream")
		w.WriteHeader(http.StatusOK)
		flusher, _ := w.(http.Flusher)

		// Deliberately split mid-frame: the first write ends inside the
		// `content_chunk` event name.
		chunks := []string{
			"event: start\ndata: {\"n\":0}\n\n",
			"event: conte",
			"nt_chunk\ndata: {\"text\":\"Hel",
			"lo\"}\n\n",
			"event: complete\ndata: {\"n\":3}\n\n",
		}
		for _, chunk := range chunks {
			_, _ = w.Write([]byte(chunk))
			if flusher != nil {
				flusher.Flush()
			}
		}
	}))
	defer server.Close()

	client, err := NewClient(ClientConfig{BaseURL: server.URL, ApiKey: "secret"})
	if err != nil {
		t.Fatalf("NewClient: %v", err)
	}

	var events []string
	var chunkText string
	for ev := range StreamSSE(client, "POST", "/ai/summarize/stream", nil, map[string]any{"text": "x"}) {
		if ev.IsError {
			t.Fatalf("unexpected stream error: %s", ev.Message)
		}
		events = append(events, ev.Event)
		if ev.Event == "content_chunk" {
			if m, ok := ev.Data.(map[string]any); ok {
				chunkText, _ = m["text"].(string)
			}
		}
	}

	want := []string{"start", "content_chunk", "complete"}
	if len(events) != len(want) {
		t.Fatalf("got %d events %v, want %d %v", len(events), events, len(want), want)
	}
	for i := range want {
		if events[i] != want[i] {
			t.Fatalf("event %d = %q, want %q", i, events[i], want[i])
		}
	}
	if chunkText != "Hello" {
		t.Fatalf("reassembled chunk text = %q, want %q", chunkText, "Hello")
	}
}

// An HTTP error must arrive as an error frame rather than a silently empty
// stream.
func TestStreamSSEReportsHttpError(t *testing.T) {
	server := httptest.NewServer(http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		w.WriteHeader(http.StatusTooManyRequests)
		_, _ = w.Write([]byte(`{"message":"AI quota exceeded"}`))
	}))
	defer server.Close()

	client, _ := NewClient(ClientConfig{BaseURL: server.URL, ApiKey: "k"})

	frames := StreamSSE(client, "POST", "/ai/summarize/stream", nil, nil)
	count := 0
	var sawError bool
	for ev := range frames {
		count++
		if ev.IsError && strings.Contains(ev.Message, "429") {
			sawError = true
		}
	}

	if count != 1 {
		t.Fatalf("expected exactly one error frame, got %d", count)
	}
	if !sawError {
		t.Fatal("expected an error frame carrying the HTTP status")
	}
}
