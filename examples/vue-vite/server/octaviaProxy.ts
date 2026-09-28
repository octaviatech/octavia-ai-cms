// Dev-server proxy. This is the only place the API key is read.
//
// Identical to the React example's `server/octaviaProxy.ts` on purpose: the two
// examples differ only in the UI layer, and the server side is framework-agnostic.
//
// Vite inlines `import.meta.env.*` into the browser bundle, so a key referenced
// from a component is readable by every visitor. The key is therefore read from
// the Node environment here, in a Vite plugin hook that never runs in the
// browser, and the browser only ever talks to `/api/octavia/*`.
//
// The browser cannot proxy to Octavia itself, because the SDK is not
// HTTP-proxyable with a header: the gateway derives the tenant from `x-api-key`,
// so the call has to be made with the SDK, server side.
import type { IncomingMessage, ServerResponse } from "node:http";
import CMS from "@octaviatech/cms";
import type { Plugin } from "vite";

const PREFIX = "/api/octavia";

type CmsInstance = ReturnType<typeof CMS.init>;

function readJson(req: IncomingMessage): Promise<any> {
  return new Promise((resolve, reject) => {
    const chunks: Buffer[] = [];
    req.on("data", (chunk: Buffer) => chunks.push(chunk));
    req.on("end", () => {
      const raw = Buffer.concat(chunks).toString("utf8").trim();
      if (!raw) return resolve({});
      try {
        resolve(JSON.parse(raw));
      } catch {
        reject(new Error("Request body is not valid JSON"));
      }
    });
    req.on("error", reject);
  });
}

function sendJson(res: ServerResponse, status: number, payload: unknown): void {
  const body = JSON.stringify(payload ?? null);
  res.statusCode = status;
  res.setHeader("Content-Type", "application/json; charset=utf-8");
  res.setHeader("Cache-Control", "no-store");
  res.end(body);
}

/**
 * The API returns a multilingual map. Read the first locale that is actually
 * present rather than assuming `en` exists, then fall back to whatever is there.
 */
function pickText(value: unknown): { text: string; locale: string } {
  const map = (value ?? {}) as Record<string, unknown>;
  for (const locale of ["en", "fa"]) {
    const text = map[locale];
    if (typeof text === "string" && text) return { text, locale };
  }
  const first = Object.values(map).find((v) => typeof v === "string" && v);
  return { text: typeof first === "string" ? first : "", locale: "en" };
}

/** An ID is returned as a raw string or as a populated object. Accept both. */
function readId(value: unknown): string {
  if (typeof value === "string") return value;
  if (value && typeof value === "object" && "_id" in value) {
    return String((value as { _id: unknown })._id ?? "");
  }
  return "";
}

/**
 * `create` and `update` wrap the article in `{ article }`, while `getAll` rows
 * and `getById` payloads are shaped differently. Unwrap the wrapper, then look
 * for the article under every key the API might use.
 */
function readArticle(raw: unknown): any {
  const root = (raw ?? {}) as Record<string, unknown>;
  const wrapped = (root.article ?? root) as Record<string, unknown>;
  const row = (wrapped.article ?? wrapped) as Record<string, unknown>;
  return row;
}

function mapArticle(raw: unknown) {
  const article = readArticle(raw);
  const title = pickText(article.mainTitle);
  const body = pickText(article.content);
  return {
    id: readId(article._id),
    title: title.text,
    body: body.text,
    locale: title.locale,
    status: article.isPublished ? "published" : "draft",
    createdAt: article.createdAt || "",
  };
}

function mapForm(raw: unknown) {
  const root = (raw ?? {}) as Record<string, unknown>;
  const form = (root.form ?? root) as Record<string, unknown>;
  return {
    id: readId(form._id),
    title: pickText(form.title).text,
    slug: form.slug || "",
  };
}

/** `cms.article.update` returns the wrapper under `data`, so unwrap defensively. */
function unwrapData(raw: unknown): unknown {
  const root = (raw ?? {}) as Record<string, unknown>;
  return "data" in root ? root.data : root;
}

function toStatus(error: { statusCode?: number }): number {
  const code = Number(error.statusCode);
  return Number.isInteger(code) && code >= 400 && code < 600 ? code : 502;
}

function normalizeLanguage(value: unknown): string {
  return typeof value === "string" && value.trim() ? value.trim() : "en";
}

export const octaviaProxy = (): Plugin => ({
  name: "octavia-dev-proxy",
  // Dev only. A production deploy must ship an equivalent server-side proxy.
  apply: "serve",
  configureServer(server) {
    server.middlewares.use(async (req, res, next) => {
      const rawUrl = req.url || "/";
      const url = new URL(rawUrl, "http://localhost");
      if (!url.pathname.startsWith(PREFIX)) return next();

      const method = (req.method || "GET").toUpperCase();
      const route = url.pathname.slice(PREFIX.length) || "/";
      const segments = route.split("/").filter(Boolean).map(decodeURIComponent);

      const apiKey = process.env.OCTAVIA_API_KEY;
      if (!apiKey) {
        sendJson(res, 500, { error: "OCTAVIA_API_KEY is not set on the dev server." });
        return;
      }

      // Created per request so a key added to `.env` after boot is picked up.
      const cms: CmsInstance = CMS.init(apiKey, { timeoutMs: 10_000 });

      try {
        const body = method === "GET" || method === "HEAD" ? {} : await readJson(req);

        // GET /api/octavia/articles
        if (method === "GET" && route === "/articles") {
          const res1 = await cms.article.getAll({ query: { page: 1, limit: 20, sortOrder: "desc" } });
          if (!res1.ok) throw res1.error;
          const data = (res1.data ?? {}) as { articleListItem?: unknown[] };
          // List rows are keyed by resource name, not `items`.
          sendJson(res, 200, (data.articleListItem ?? []).map(mapArticle));
          return;
        }

        // POST /api/octavia/articles
        if (method === "POST" && route === "/articles") {
          const lang = normalizeLanguage(body.locale).slice(0, 2);
          const created = await cms.article.create({
            mainTitle: { [lang]: String(body.title ?? "") },
            content: { [lang]: String(body.body ?? "") },
            // `category` is an array of IDs even for a single category.
            category: [process.env.OCTAVIA_CATEGORY_ID || ""],
            author: process.env.OCTAVIA_AUTHOR_ID || "",
            isPublished: false,
          });
          if (!created.ok) throw created.error;
          sendJson(res, 201, mapArticle(unwrapData(created.data)));
          return;
        }

        // POST /api/octavia/articles/:id/publish
        // There is no publish endpoint. Publishing is a field update.
        if (method === "POST" && segments[0] === "articles" && segments[2] === "publish") {
          const id = segments[1];
          if (!id) {
            sendJson(res, 400, { error: "Article id is required." });
            return;
          }
          const updated = await cms.article.update({ id, isPublished: true });
          if (!updated.ok) throw updated.error;
          const one = await cms.article.getById(id);
          if (!one.ok) throw one.error;
          sendJson(res, 200, mapArticle(unwrapData(one.data)));
          return;
        }

        // GET /api/octavia/forms
        if (method === "GET" && route === "/forms") {
          const listed = await cms.form.getAll({ query: { page: 1, limit: 20 } });
          if (!listed.ok) throw listed.error;
          const data = (listed.data ?? {}) as { formListItem?: unknown[] };
          sendJson(res, 200, (data.formListItem ?? []).map(mapForm));
          return;
        }

        // POST /api/octavia/forms/:id/submit
        if (method === "POST" && segments[0] === "forms" && segments[2] === "submit") {
          const id = segments[1];
          if (!id) {
            sendJson(res, 400, { error: "Form id is required." });
            return;
          }
          const submitted = await cms.formSubmission.idSubmit(id, {
            language: normalizeLanguage(body.language),
            values: (body.values ?? {}) as Record<string, unknown>,
          });
          if (!submitted.ok) throw submitted.error;
          sendJson(res, 200, { ok: true });
          return;
        }

        // POST /api/octavia/ai/summarize
        if (method === "POST" && route === "/ai/summarize") {
          const summarized = await cms.ai.summarize({
            text: String(body.text ?? ""),
            maxWords: Number(body.maxWords) || 80,
          });
          if (!summarized.ok) throw summarized.error;
          sendJson(res, 200, { summary: (unwrapData(summarized.data) as any)?.summary || "" });
          return;
        }

        // GET /api/octavia/statistics
        if (method === "GET" && route === "/statistics") {
          const stats = await cms.report.getStatistics();
          if (!stats.ok) throw stats.error;
          sendJson(res, 200, unwrapData(stats.data) ?? {});
          return;
        }

        sendJson(res, 404, { error: `No Octavia proxy route for ${method} ${url.pathname}` });
      } catch (err) {
        const error = (err ?? {}) as { message?: string; statusCode?: number };
        sendJson(res, toStatus(error), { error: error.message || "Octavia SDK request failed" });
      }
    });
  },
});

export default octaviaProxy;
