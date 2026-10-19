import assert from "node:assert";
import { HttpClient } from "../dist/esm/http.js";

// End-to-end exercise of streamSSE with a stubbed fetch: the whole point of the
// method is that a chunk boundary can fall mid-frame, and only a reader that
// buffers proves that works.

const encoder = new TextEncoder();

const makeResponse = (chunks) => {
  let i = 0;
  return {
    ok: true,
    status: 200,
    headers: new Headers({ "content-type": "text/event-stream" }),
    body: {
      getReader: () => ({
        read: async () =>
          i < chunks.length
            ? { done: false, value: encoder.encode(chunks[i++]) }
            : { done: true, value: undefined },
        releaseLock: () => {},
      }),
    },
  };
};

const collect = async (gen) => {
  const out = [];
  for await (const frame of gen) out.push(frame);
  return out;
};

// Frames arriving split across arbitrary chunk boundaries — the case a naive
// `res.text()` reader cannot handle at all.
const client = new HttpClient({
  apiKey: "k",
  baseUrl: "https://example.test",
  fetchImpl: async () =>
    makeResponse([
      'event: start\ndata: {"n":0}\n',
      '\ndata: {"n":1}\n\nevent: conte',
      'nt_chunk\ndata: {"text":"Hel',
      'lo"}\n\n',
      'event: complete\ndata: {"n":3}\n\n',
    ]),
});

const frames = await collect(
  client.streamSSE("POST", "/ai/summarize/stream", { body: { text: "x" } })
);
assert.deepEqual(
  frames.map((f) => f.event),
  ["start", "message", "content_chunk", "complete"],
  "frames are reassembled across chunk boundaries"
);
assert.equal(frames[2].data.text, "Hello");

// A final frame with no trailing blank line must still be emitted.
const tailClient = new HttpClient({
  apiKey: "k",
  baseUrl: "https://example.test",
  fetchImpl: async () => makeResponse(["event: last\ndata: {}"]),
});
assert.equal((await collect(tailClient.streamSSE("GET", "/x")))[0].event, "last");

// An HTTP error must surface as an ApiError with the server's message, not as a
// stream that silently ends.
const errorClient = new HttpClient({
  apiKey: "k",
  baseUrl: "https://example.test",
  fetchImpl: async () => ({
    ok: false,
    status: 426,
    headers: new Headers({ "content-type": "application/json" }),
    text: async () => JSON.stringify({ message: "AI quota exceeded" }),
  }),
});
await assert.rejects(
  () => collect(errorClient.streamSSE("POST", "/ai/summarize/stream")),
  (err) => err.status === 426 && /quota/i.test(err.message),
);

// The API key must be sent: EventSource cannot, which is why we use fetch.
let seenHeaders;
const headerClient = new HttpClient({
  apiKey: "secret-key",
  baseUrl: "https://example.test",
  fetchImpl: async (_url, init) => {
    seenHeaders = init.headers;
    return makeResponse(["data: {}\n\n"]);
  },
});
await collect(headerClient.streamSSE("GET", "/ai/events/stream"));
assert.equal(seenHeaders["x-api-key"], "secret-key");
assert.match(seenHeaders.Accept, /text\/event-stream/);

console.log("SSE streaming OK");