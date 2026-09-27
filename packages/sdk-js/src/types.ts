export type HttpMethod = "GET" | "POST" | "PUT" | "PATCH" | "DELETE";

export type Envelope<T> = {
  success: boolean;
  statusCode: number;
  message: string;
  data: T;
};

export type ApiErrorPayload = {
  success?: boolean;
  statusCode?: number;
  message?: string;
  data?: unknown;
};

export type ClientConfig = {
  baseUrl: string;
  apiKey: string;
  /**
   * Optional fetch implementation override (for environments without global fetch).
   */
  fetchImpl?: typeof fetch;
  /**
   * Optional request timeout in milliseconds.
   */
  timeoutMs?: number;
};

export type RequestOptions<Q = Record<string, string | number | boolean | null | undefined>> = {
  query?: Q;
  body?: unknown;
  signal?: AbortSignal;
};

export class ApiError extends Error {
  status: number;
  payload?: ApiErrorPayload | unknown;
  headers: Headers;

  constructor(message: string, status: number, headers: Headers, payload?: ApiErrorPayload | unknown) {
    super(message);
    this.name = "ApiError";
    this.status = status;
    this.payload = payload;
    this.headers = headers;
  }
}
