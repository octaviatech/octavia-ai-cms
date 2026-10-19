import assert from "node:assert";
import { parseSseFrame } from "../dist/esm/http.js";

// Frame parsing is the part of SSE that silently goes wrong: a split chunk, a
// comment heartbeat, or a non-JSON payload all break a naive split-on-newline
// reader. These are the shapes the AI endpoints actually emit.

const parsed = parseSseFrame('event: content_chunk\ndata: {"text":"hi"}');
assert.equal(parsed.event, "content_chunk");
assert.deepEqual(parsed.data, { text: "hi" });

const multiLine = parseSseFrame("event: complete\ndata: line one\ndata: line two");
assert.equal(multiLine.event, "complete");
assert.equal(multiLine.data, "line one\nline two", "repeated data: fields join with newlines");

const plain = parseSseFrame("data: raw delta");
assert.equal(plain.event, "message", "a frame with no event: is the default 'message'");
assert.equal(plain.data, "raw delta", "a non-JSON payload is handed back as text");

assert.equal(parseSseFrame(": keepalive"), null, "a comment-only frame yields nothing");

const withMeta = parseSseFrame('event: progress\ndata: {"a":1}\nid: 7\nretry: 500');
assert.equal(withMeta.id, "7");
assert.equal(withMeta.retry, 500);

// CRLF is legal on the wire even though our own server emits LF.
assert.equal(parseSseFrame("event: done\r\ndata: {}").event, "done");

// A value with no leading space after the colon is still valid.
assert.equal(parseSseFrame("data:{\"text\":\"tight\"}").data.text, "tight");

// An empty data payload must not become undefined.
assert.equal(parseSseFrame("event: empty\ndata:").data, "");

console.log("SSE frame parsing OK");