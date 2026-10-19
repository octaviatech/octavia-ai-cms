import { ApiError, ClientConfig, HttpMethod, RequestOptions } from "./types";

const normalizeBaseUrl = (baseUrl: string): string => baseUrl.replace(/\/$/, "");

const buildQuery = (query?: RequestOptions["query"]): string => {
  if (!query) return "";
  const params = new URLSearchParams();
  Object.entries(query).forEach(([key, value]) => {
    if (value === undefined || value === null) return;
    params.append(key, String(value));
  });
  const qs = params.toString();
  return qs ? `?${qs}` : "";
};

export class HttpClient {
  private baseUrl: string;
  private apiKey: string;
  private fetchImpl: typeof fetch;
  private timeoutMs?: number;

  constructor(config: ClientConfig) {
    if (!config.apiKey) throw new Error("apiKey is required");
    if (!config.baseUrl) throw new Error("baseUrl is required");

    this.baseUrl = normalizeBaseUrl(config.baseUrl);
    this.apiKey = config.apiKey;
    this.fetchImpl = config.fetchImpl || fetch;
    this.timeoutMs = config.timeoutMs;
  }

  async request<T>(method: HttpMethod, path: string, options: RequestOptions = {}): Promise<T> {
    const url = `${this.baseUrl}${path}${buildQuery(options.query)}`;

    // The gateway derives the tenant and service state from the key itself, so
    // the SDK sends no header the caller could spoof.
    const headers: HeadersInit = {
      "Content-Type": "application/json",
      "x-api-key": this.apiKey,
    };

    const controller = this.timeoutMs ? new AbortController() : undefined;
    const timeoutId = this.timeoutMs
      ? setTimeout(() => controller?.abort(), this.timeoutMs)
      : undefined;

    const body = options.body === undefined ? undefined : JSON.stringify(options.body);

    try {
      const res = await this.fetchImpl(url, {
        method,
        headers,
        body,
        signal: options.signal || controller?.signal,
      });

      const contentType = res.headers.get("content-type") || "";
      const isJson = contentType.includes("application/json");
      const payload = isJson ? await res.json() : await res.text();

      if (!res.ok) {
        const message =
          (payload && (payload.message || payload?.error)) ||
          `Request failed with status ${res.status}`;
        throw new ApiError(message, res.status, res.headers, payload);
      }

      return payload as T;
    } finally {
      if (timeoutId) clearTimeout(timeoutId);
    }
  }

  /**
   * Consume a `text/event-stream` endpoint as an async iterable of frames.
   *
   * `request()` cannot serve these: an SSE response is never
   * `application/json`, so it falls through to `res.text()` and the caller
   * gets one opaque blob instead of the incremental chunks the endpoint emits.
   * `EventSource` is not an option either — it cannot send `x-api-key`.
   *
   * `fetch` + a reader is the only transport that carries the custom header,
   * which is why this reads the body rather than delegating.
   *
   * @returns one {@link SseEvent} per parsed frame, in arrival order. The
   * iterator ends when the server closes the stream.
   */
  async *streamSSE(
    method: HttpMethod,
    path: string,
    options: RequestOptions = {},
  ): AsyncGenerator<SseEvent, void, undefined> {
    const url = `${this.baseUrl}${path}${buildQuery(options.query)}`;
    const headers: HeadersInit = {
      "Content-Type": "application/json",
      Accept: "text/event-stream",
      "x-api-key": this.apiKey,
    };
    const body = options.body === undefined ? undefined : JSON.stringify(options.body);

    // A stream is long-lived, so the normal request timeout must NOT apply —
    // it exists to bound a single call, not a multi-minute generation.
    const controller = options.signal ? undefined : new AbortController();
    const res = await this.fetchImpl(url, {
      method,
      headers,
      body,
      signal: options.signal ?? controller?.signal,
    });

    if (!res.ok) {
      const payload = await res.text();
      let message = `Stream failed with status ${res.status}`;
      try {
        const parsed = JSON.parse(payload);
        message = parsed?.message || parsed?.error || message;
      } catch {
        // A non-JSON error body is reported as-is.
      }
      throw new ApiError(message, res.status, res.headers, payload);
    }

    const reader = res.body?.getReader();
    if (!reader) {
      throw new ApiError("Response has no readable body for streaming", res.status, res.headers, null);
    }

    const decoder = new TextDecoder();
    let buffer = "";

    try {
      for (;;) {
        const { done, value } = await reader.read();
        if (done) break;

        buffer += decoder.decode(value, { stream: true });

        // SSE frames are separated by a blank line; a partial frame stays in
        // the buffer until the rest of it arrives.
        let boundary = buffer.indexOf("\n\n");
        while (boundary !== -1) {
          const frame = buffer.slice(0, boundary);
          buffer = buffer.slice(boundary + 2);
          const parsed = parseSseFrame(frame);
          if (parsed) yield parsed;
          boundary = buffer.indexOf("\n\n");
        }
      }

      const tail = parseSseFrame(buffer);
      if (tail) yield tail;
    } finally {
      reader.releaseLock();
      // Cancelling the transfer lets an early `break` close the connection
      // instead of leaving the socket open until the server times out.
      if (controller) controller.abort();
    }
  }
}

/** One Server-Sent Event: `event:` name and `data:` payload. */
export interface SseEvent {
  event: string;
  data: unknown;
  id?: string;
  retry?: number;
}

/** Parse a single `event:`/`data:` block. Comment-only frames yield null. */
export function parseSseFrame(frame: string): SseEvent | null {
  let event = "message";
  let id: string | undefined;
  let retry: number | undefined;
  const dataLines: string[] = [];

  for (const rawLine of frame.split(/\r\n|\r|\n/)) {
    if (!rawLine || rawLine.startsWith(":")) continue;
    const colon = rawLine.indexOf(":");
    const field = colon === -1 ? rawLine : rawLine.slice(0, colon);
    let value = colon === -1 ? "" : rawLine.slice(colon + 1);
    if (value.startsWith(" ")) value = value.slice(1);

    if (field === "event") event = value;
    else if (field === "data") dataLines.push(value);
    else if (field === "id") id = value;
    else if (field === "retry") {
      const n = Number(value);
      if (Number.isFinite(n)) retry = n;
    }
  }

  if (dataLines.length === 0 && event === "message") return null;

  const raw = dataLines.join("\n");
  let data: unknown = raw;
  if (raw) {
    try {
      data = JSON.parse(raw);
    } catch {
      // A non-JSON data payload is handed back as text — several endpoints
      // stream plain deltas rather than JSON.
    }
  }

  return { event, data, id, retry };
}
