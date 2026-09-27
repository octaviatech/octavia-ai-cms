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
}
