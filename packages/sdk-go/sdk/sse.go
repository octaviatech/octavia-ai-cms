package sdk

// Server-Sent Events support (D-24).
//
// `RequestInto` cannot serve a `text/event-stream` endpoint: it reads the whole
// body and decodes it as JSON, so a caller gets one opaque value instead of the
// frames the endpoint emits. `StreamSSE` streams instead.
//
// Go has no async/await, so the idiomatic shape is a channel of frames the
// caller ranges over. The channel is closed when the stream ends; a transport or
// HTTP failure is delivered as the last frame with IsError set.

import (
	"bufio"
	"bytes"
	"encoding/json"
	"fmt"
	"net/http"
	"strings"
)

// SseEvent is one Server-Sent Event.
type SseEvent struct {
	// Event is the `event:` name, or "message" when the frame omits it.
	Event string
	// Data is the parsed JSON payload, or the raw string when it is not JSON.
	// Several AI endpoints stream plain deltas rather than JSON objects.
	Data any
	// ID is the `id:` field, if present.
	ID string
	// Retry is the `retry:` field in milliseconds, if present.
	Retry int
	// IsError reports that the stream failed rather than ended. Message then
	// carries the reason and the channel closes immediately afterwards.
	IsError bool
	// Message carries the failure reason when IsError is set.
	Message string
}

// parseSSEFrame parses one `event:`/`data:` block. A frame with nothing in it
// (a comment-only heartbeat, or blank padding) reports ok == false.
func parseSSEFrame(frame string) (SseEvent, bool) {
	event := "message"
	id := ""
	retry := 0
	var dataLines []string

	normalized := strings.ReplaceAll(strings.ReplaceAll(frame, "\r\n", "\n"), "\r", "\n")
	for _, line := range strings.Split(normalized, "\n") {
		if line == "" || strings.HasPrefix(line, ":") {
			continue
		}

		field := line
		value := ""
		if colon := strings.Index(line, ":"); colon != -1 {
			field = line[:colon]
			value = strings.TrimPrefix(line[colon+1:], " ")
		}

		switch field {
		case "event":
			event = value
		case "data":
			dataLines = append(dataLines, value)
		case "id":
			id = value
		case "retry":
			var n int
			if _, err := fmt.Sscan(value, &n); err == nil {
				retry = n
			}
		}
	}

	if len(dataLines) == 0 && event == "message" {
		return SseEvent{}, false
	}

	raw := strings.Join(dataLines, "\n")
	var data any = raw
	if raw != "" {
		var decoded any
		if err := json.Unmarshal([]byte(raw), &decoded); err == nil {
			data = decoded
		}
	}

	return SseEvent{Event: event, Data: data, ID: id, Retry: retry}, true
}

// buildStreamRequest assembles the request an SSE endpoint needs: the API key
// and an explicit Accept. It is separate from RequestInto's request so the
// header set cannot drift between the two paths.
func buildStreamRequest(config ClientConfig, method, path string, query map[string]any, body any) (*http.Request, error) {
	fullURL := config.BaseURL + path + buildQuery(query)

	buf := bytes.NewReader(nil)
	if body != nil {
		b, err := json.Marshal(body)
		if err != nil {
			return nil, err
		}
		buf = bytes.NewReader(b)
	}

	req, err := http.NewRequest(method, fullURL, buf)
	if err != nil {
		return nil, err
	}

	req.Header.Set("Content-Type", "application/json")
	req.Header.Set("Accept", "text/event-stream")
	req.Header.Set("x-api-key", config.ApiKey)
	return req, nil
}

// StreamSSE opens a `text/event-stream` endpoint and returns a channel of
// frames in arrival order, closed when the stream ends.
//
// No request timeout is applied: a generation can legitimately run for minutes,
// and a read deadline would cut the stream off mid-answer. Pass a cancellable
// request context to StreamSSEContext if the caller needs to stop early.
func StreamSSE(c *Client, method, path string, query map[string]any, body any) <-chan SseEvent {
	return StreamSSEContext(c.http, c.config, method, path, query, body, nil)
}

// StreamSSEContext is StreamSSE with an explicit HTTP client and request, so a
// caller can attach a cancellable context.
func StreamSSEContext(
	httpClient *http.Client,
	config ClientConfig,
	method, path string,
	query map[string]any,
	body any,
	req *http.Request,
) <-chan SseEvent {
	out := make(chan SseEvent)

	go func() {
		defer close(out)

		if req == nil {
			var err error
			req, err = buildStreamRequest(config, method, path, query, body)
			if err != nil {
				out <- SseEvent{IsError: true, Message: err.Error()}
				return
			}
		}

		resp, err := httpClient.Do(req)
		if err != nil {
			out <- SseEvent{IsError: true, Message: err.Error()}
			return
		}
		defer resp.Body.Close()

		if resp.StatusCode < 200 || resp.StatusCode >= 300 {
			out <- SseEvent{
				IsError: true,
				Message: "Stream failed with status " + resp.Status,
			}
			return
		}

		// A chunk boundary can fall anywhere — mid-field, mid-frame, even
		// mid-character — so a frame is only emitted once its terminating blank
		// line has arrived. bufio.Scanner handles that with a growing buffer.
		scanner := bufio.NewScanner(resp.Body)
		scanner.Buffer(make([]byte, 0, 64*1024), 8*1024*1024)

		var frame []string
		for scanner.Scan() {
			line := scanner.Text()
			if line != "" {
				frame = append(frame, line)
				continue
			}
			if len(frame) > 0 {
				if ev, ok := parseSSEFrame(strings.Join(frame, "\n")); ok {
					out <- ev
				}
				frame = frame[:0]
			}
		}

		if len(frame) > 0 {
			// The final frame need not be terminated by a blank line.
			if ev, ok := parseSSEFrame(strings.Join(frame, "\n")); ok {
				out <- ev
			}
		}

		if err := scanner.Err(); err != nil {
			out <- SseEvent{IsError: true, Message: err.Error()}
		}
	}()

	return out
}
