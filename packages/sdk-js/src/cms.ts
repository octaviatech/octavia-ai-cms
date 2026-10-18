import { OctaviaClient } from "./client";
import type { ClientConfig } from "./types";
import { ApiError } from "./types";

export type CMSInitOptions = {
  timeoutMs?: number;
  /**
   * If true, throws on errors instead of returning { ok: false }.
   * Default: false
   */
  throwOnError?: boolean;
};

export type CMSResponse<T> = {
  ok: boolean;
  data: T | null;
  error?: { message: string; statusCode?: number };
  meta?: { pagination?: unknown };
};

type AwaitedOrSelf<T> = T extends Promise<infer R> ? R : T;
type DataOf<T> = T extends { data: infer D } ? D : unknown;
type WrappedMethod<F> = F extends (...args: infer P) => infer R
  ? (...args: P) => Promise<CMSResponse<DataOf<AwaitedOrSelf<R>>>>
  : never;
type WrappedResource<T> = {
  [K in keyof T]: T[K] extends (...args: any[]) => any ? WrappedMethod<T[K]> : T[K];
};

export type CMSInstance = {
  // @generated resources:begin
  ai: WrappedResource<OctaviaClient["ai"]>;
  aiConversation: WrappedResource<OctaviaClient["aIConversation"]>;
  article: WrappedResource<OctaviaClient["articles"]>;
  author: WrappedResource<OctaviaClient["authors"]>;
  campaign: WrappedResource<OctaviaClient["campaigns"]>;
  category: WrappedResource<OctaviaClient["categories"]>;
  contentPlan: WrappedResource<OctaviaClient["contentPlan"]>;
  form: WrappedResource<OctaviaClient["forms"]>;
  formSubmission: WrappedResource<OctaviaClient["formSubmissions"]>;
  language: WrappedResource<OctaviaClient["languages"]>;
  media: WrappedResource<OctaviaClient["media"]>;
  report: WrappedResource<OctaviaClient["reports"]>;
  seo: WrappedResource<OctaviaClient["sEOHub"]>;
  subcategory: WrappedResource<OctaviaClient["subcategories"]>;
  tag: WrappedResource<OctaviaClient["tags"]>;
  taxonomy: WrappedResource<OctaviaClient["taxonomy"]>;
  // @generated resources:end
  raw: OctaviaClient;
};

const DEFAULT_BASE_URL = "https://api.octaviatech.app/cms";
export const CMS_SITE = "https://octaviatech.app";
export const CMS_SIGNUP_URL = "https://octaviatech.app";

export default class CMS {
  static init(apiKey: string, options: CMSInitOptions = {}): CMSInstance {
    const client = new OctaviaClient({
      baseUrl: DEFAULT_BASE_URL,
      apiKey,
      timeoutMs: options.timeoutMs,
    } satisfies ClientConfig);

    const wrapResponse = <T>(payload: any): CMSResponse<T> => {
      if (payload && typeof payload === "object" && "success" in payload && "data" in payload) {
        const data = (payload as any).data ?? null;
        const meta =
          data && typeof data === "object" && "pagination" in data
            ? { pagination: (data as any).pagination }
            : undefined;
        return { ok: Boolean((payload as any).success), data, meta };
      }
      return { ok: true, data: payload ?? null };
    };

    const handleError = (err: unknown): CMSResponse<any> => {
      if (options.throwOnError) throw err;
      if (err instanceof ApiError) {
        return {
          ok: false,
          data: null,
          error: { message: err.message, statusCode: err.status },
        };
      }
      const message = err instanceof Error ? err.message : "Unknown error";
      return { ok: false, data: null, error: { message } };
    };

    const wrapResource = (resource: any) =>
      new Proxy(resource, {
        get(target, prop) {
          const value = (target as any)[prop];
          if (typeof value !== "function") return value;
          return async (...args: any[]) => {
            try {
              if (typeof prop === "string" && (prop.startsWith("get") || prop.includes("search"))) {
                const [queryOrOptions] = args;
                const looksLikeQuery =
                  queryOrOptions &&
                  typeof queryOrOptions === "object" &&
                  !("query" in queryOrOptions) &&
                  !("body" in queryOrOptions);
                if (looksLikeQuery && args.length === 1) {
                  const out = await value.call(target, { query: queryOrOptions });
                  return wrapResponse(out);
                }
              }
              const out = await value.apply(target, args);
              return wrapResponse(out);
            } catch (err) {
              return handleError(err);
            }
          };
        },
      });

    return {
      // @generated assign:begin
      ai: wrapResource(client.ai),
      aiConversation: wrapResource(client.aIConversation),
      article: wrapResource(client.articles),
      author: wrapResource(client.authors),
      campaign: wrapResource(client.campaigns),
      category: wrapResource(client.categories),
      contentPlan: wrapResource(client.contentPlan),
      form: wrapResource(client.forms),
      formSubmission: wrapResource(client.formSubmissions),
      language: wrapResource(client.languages),
      media: wrapResource(client.media),
      report: wrapResource(client.reports),
      seo: wrapResource(client.sEOHub),
      subcategory: wrapResource(client.subcategories),
      tag: wrapResource(client.tags),
      taxonomy: wrapResource(client.taxonomy),
      // @generated assign:end
      raw: client,
    };
  }
}
