# @octaviatech/cms

Typed JavaScript/TypeScript SDK for the **Octavia AI CMS API** — multilingual articles, taxonomy, forms and submissions, AI automation, media, SEO, content planning and analytics — behind one client and one response shape.

- Generated from the OpenAPI spec, so it covers **every** public operation (229 of them).
- **Zero runtime dependencies.** Ships its own typings.
- Works in Node.js 18+, Deno, Bun and any browser with `fetch`.
- Ships **both ESM and CommonJS**.
- Includes **real streaming** (SSE) support with `for await`.

| | |
| --- | --- |
| Product | https://octaviatech.app/products/ai-cms |
| Website | https://octaviatech.app |
| API reference | https://developers.octaviatech.app |
| Examples | https://github.com/octaviatech/octavia-ai-cms/tree/main/examples |
| License | ISC |

---

## Install

```bash
npm install @octaviatech/cms
```

```bash
yarn add @octaviatech/cms
```

```bash
pnpm add @octaviatech/cms
```

Requires Node.js 18 or newer. Both module systems are published, so `import` and `require` both work without a bundler.

---

## Quick start

```ts
import CMS from "@octaviatech/cms";

const cms = CMS.init("your-api-key");

const res = await cms.article.create({
  mainTitle: { en: "Hello" },
  body: { en: "Content" },
  category: ["CATEGORY_ID"],
  author: "AUTHOR_ID",
});

if (!res.ok) throw new Error(res.error?.message ?? "Request failed");

console.log(res.data);
```

### ESM and CommonJS

```ts
import CMS, { ApiError, createClient } from "@octaviatech/cms";  // ESM
```

```js
const { CMS, ApiError, createClient } = require("@octaviatech/cms");  // CommonJS
```

`CMS` is available as both the default export (ESM) and a named export. The other exports are named only: `createClient` and `OctaviaClient` for the low-level client, `ApiError`, the resource classes, and `GeneratedSchemas` / `GeneratedOperations` for the raw spec types.

---

## Authentication

The API key is the only credential, and it is required. There is no OAuth, no refresh token and no header hook — the key is sent as the `x-api-key` header on every request, and that is the entire authentication story.

The base URL is fixed to `https://api.octaviatech.app/cms`, so there is no `baseUrl` option. Your tenant and the service status are resolved by the gateway from your key; you never send them.

Get a key:

1. Sign up at https://octaviatech.app
2. Dashboard → your service → **API Keys** → Create key

> Keep the key server-side. A key in a browser bundle is a public key — proxy those requests through your backend instead.

---

## Initialize

```ts
const cms = CMS.init("your-api-key", {
  timeoutMs: 30_000,
  throwOnError: false,
});
```

| Option | Type | Default | Notes |
| --- | --- | --- | --- |
| `timeoutMs` | `number` | no timeout | Per-request timeout in milliseconds. Not applied to streaming methods. |
| `throwOnError` | `boolean` | `false` | `false` returns `{ ok: false }`; `true` throws an `ApiError`. |

`CMS.init` returns a facade. `cms.raw` is the underlying `OctaviaClient` if you need an endpoint the generated resources do not cover.

---

## Response shape

Every method resolves to the same envelope, so there is one error path to learn:

```ts
type CMSResponse<T> = {
  ok: boolean;
  data: T | null;
  error?: { message: string; statusCode?: number };
  meta?: { pagination?: unknown };
};
```

```ts
const res = await cms.article.getAll({ query: { page: 1, limit: 10 } });

if (!res.ok) {
  console.error(res.error?.statusCode, res.error?.message);
} else {
  console.log(res.data);
  console.log(res.meta?.pagination);
}
```

`data` is typed from the spec, so `res.data` is not `any` — autocomplete and narrowing work out of the box.

### Errors

With the default `throwOnError: false` you get a resolved promise with `ok: false`. Set `throwOnError: true` and you get a rejected promise carrying an `ApiError`:

```ts
import CMS, { ApiError } from "@octaviatech/cms";

const cms = CMS.init("your-api-key", { throwOnError: true });

try {
  await cms.article.getById("6810f2c3a1b2c3d4e5f60718");
} catch (err) {
  if (err instanceof ApiError) {
    console.error(err.status, err.message, err.payload);
  }
}
```

`ApiError` carries `status`, `message`, the raw `payload`, and the response `headers` — so `retry-after` on a `429` is available as `err.headers.get("retry-after")`.

| Status | Meaning | Retry? |
| --- | --- | --- |
| `400` | Invalid request or missing field | No — fix the request |
| `401` | Missing or invalid API key | No |
| `403` | Key valid, role not permitted | No |
| `404` | Record not found | No |
| `406` | Validation failed | No — the message lists every offending field |
| `409` | The proposal is stale; the entity changed since it was made | No — re-run the action |
| `426` | Plan quota exhausted | No — upgrade, wait for the period to roll over, or free up quota |
| `429` | Transient rate limit | Yes, after the interval in `retry-after` |

---

## Query parameters

Filters go under `query`, never as loose top-level keys:

```ts
const res = await cms.article.getAll({
  query: { page: 1, limit: 10, category: "CATEGORY_ID" },
});

const hits = await cms.article.search({ query: { keyword: "typescript", limit: 5 } });
```

Read methods whose name starts with `get` or contains `search` also accept the filter object directly, so both of these work:

```ts
await cms.article.getAll({ query: { page: 1 } });
await cms.article.getAll({ page: 1 });
```

The explicit `query` form is the one to prefer — it is what the types describe, and the shorthand is a convenience layer on top.

---

## Resources

| Property | Operations | Covers |
| --- | --- | --- |
| `cms.article` | 35 | Articles, comments, reactions, engagement settings, revisions, readiness, translation state, per-locale SEO |
| `cms.ai` | 47 | Summarize, translate, SEO, repurpose, autofill, proposals, credits, settings, event stream, social publishing |
| `cms.aiConversation` | 6 | Multi-turn article drafting |
| `cms.form` | 12 | Forms and captcha configuration |
| `cms.formSubmission` | 20 | Submissions, relations, AI analysis, replies, digest |
| `cms.report` | 28 | Statistics, charts, needs-attention, weekly digest, SEO health, AI acceptance |
| `cms.category` | 6 | Categories |
| `cms.subcategory` | 7 | Subcategories |
| `cms.author` | 6 | Authors |
| `cms.tag` | 3 | Tags |
| `cms.language` | 5 | Languages |
| `cms.media` | 7 | Media library, alt text, usage |
| `cms.seo` | 8 | Site audit, cannibalization, refresh, redirects, hreflang, coverage |
| `cms.taxonomy` | 7 | Taxonomy audit, category SEO, tag merge, author bio |
| `cms.contentPlan` | 15 | Editorial calendar, campaigns, cadence, AI planning |
| `cms.campaign` | 4 | Campaigns |
| `cms.raw` | — | The unwrapped client |

---

## Streaming (Server-Sent Events)

Nine endpoints stream their results. Each one has two methods: the ordinary JSON call, and a `…Live()` method that yields frames as they arrive.

| Method | Streams |
| --- | --- |
| `cms.ai.summarizeLive` | `POST /ai/summarize/stream` |
| `cms.ai.summarizeArticleLive` | `POST /ai/summarizeArticle/stream` |
| `cms.ai.seoOptimizeLive` | `POST /ai/seoOptimize/stream` |
| `cms.ai.translateLive` | `POST /ai/translate/stream` |
| `cms.ai.translateArticleLive` | `POST /ai/translateArticle/stream` |
| `cms.ai.optimizeArticleLive` | `POST /ai/optimizeArticle/stream` |
| `cms.ai.repurposeLive` | `POST /ai/repurpose/stream` |
| `cms.aiConversation.conversationGenerateLive` | `POST /ai/conversation/generate/stream` |
| `cms.ai.eventsLive` | `GET /ai/events/stream` |

> The naming: an endpoint whose path already ends in `/stream` produces a plain `…Stream()` method, and its streaming companion is `…Live()` rather than `summarizeStreamStream`.

Each yields `SseEvent` objects with `event`, `data` (parsed JSON when the payload is JSON, raw text otherwise), and optional `id` / `retry`. Frames split across network chunks are reassembled, so a partial chunk never yields a half-frame.

```ts
for await (const frame of cms.ai.summarizeLive({ text: "A long article body…" })) {
  if (frame.event === "content_chunk") {
    process.stdout.write(String(frame.data?.text ?? ""));
  } else if (frame.event === "complete") {
    console.log("\ndone");
  } else if (frame.event === "error") {
    console.error(frame.data);
  }
}
```

The generator ends when the server closes the stream. `break`ing out of the loop cancels the underlying request. `timeoutMs` is deliberately **not** applied to streaming — a generation can legitimately run for minutes.

```ts
// An abort signal still works, for when the user navigates away.
const controller = new AbortController();

for await (const frame of cms.ai.eventsLive({ signal: controller.signal })) {
  console.log(frame.event);
}

controller.abort();
```

---

## Common tasks

### Paginate

```ts
const first = await cms.article.getAll({ query: { page: 1, limit: 20 } });

console.log(first.meta?.pagination); // { page, limit, total, totalPages }
```

### Create multilingual content

`category` and `subCategory` take **arrays of IDs**, even when you have one. Text fields are maps from language code to string.

```ts
await cms.article.create({
  mainTitle: { en: "Hello", es: "Hola" },
  body: { en: "Content", es: "Contenido" },
  category: ["6810f2c3a1b2c3d4e5f60718"],
  subCategory: ["6810f2c3a1b2c3d4e5f60719"],
  author: "6810f2c3a1b2c3d4e5f60720",
});
```

Only languages that have been registered through `cms.language.create` can be written. An unregistered key is rejected with `406` listing the valid codes.

### Per-locale SEO

SEO metadata is read and written on its own endpoint, so you can change a meta title without resending the article. Pass `locale` to touch one language; omit it to read or replace the whole map.

```ts
// Read every locale.
await cms.article.articleIdSeoGET("ARTICLE_ID");

// Write one locale only — other locales are left alone.
await cms.article.articleIdSeoPUT(
  "ARTICLE_ID",
  {
    metaTitle: "A meta title under 60 characters",
    metaDescription: "A description under 155 characters",
    focusKeyword: "typescript sdk",
    robots: "index,follow",
  },
  { query: { locale: "en" } },
);
```

### AI proposals

AI never writes to your content directly. It files a **proposal**; you review it and accept, reject, or undo. This is the loop every AI action follows.

```ts
// 1. See what is waiting.
const pending = await cms.ai.proposalsCount({ query: { status: "pending" } });

// 2. Read them.
const list = await cms.ai.proposalsGET({ query: { status: "pending", limit: 20 } });

// 3. Accept one — this writes through the normal domain service, so
//    validation, permissions and revisions all apply.
await cms.ai.proposalsIdAccept("PROPOSAL_ID");

// 4. Changed your mind: the previous value is restored.
await cms.ai.proposalsIdUndo("PROPOSAL_ID");
```

Accepting a proposal whose entity changed in the meantime returns `409` rather than overwriting the newer content.

```ts
// Bulk accept: the response carries a per-item result.
const bulk = await cms.ai.proposalsBulkAccept({ ids: ["A", "B", "C"] });
// bulk.data.items: [{ id, status: "accepted" | "failed", reason? }, ...]
```

### Summarize text

```ts
const res = await cms.ai.summarize({ query: { text: "Long article body…" } });
console.log(res.data);
```

Or streamed, so the answer appears as it is written:

```ts
for await (const frame of cms.ai.summarizeLive({ text: "Long article body…" })) {
  if (frame.event === "content_chunk") process.stdout.write(String(frame.data?.text ?? ""));
}
```

### Check your AI balance before a bulk run

```ts
const credits = await cms.ai.credits();
console.log(credits.data); // { used, limit, remaining, ... }

const estimate = await cms.ai.estimate({ action: "article.autofillMetadata" });
console.log(estimate.data); // { low, high } — a range, not a fixed price
```

A plan that runs out of quota returns `426` on every AI endpoint, including streaming ones.

### Cancel a request

```ts
const controller = new AbortController();

const promise = cms.article.getAll({
  query: { page: 1 },
  signal: controller.signal,
});

controller.abort();
await promise; // rejects with an AbortError
```

### Use the low-level client

```ts
const client = createClient({ baseUrl: "https://api.octaviatech.app/cms", apiKey: "your-api-key" });
const raw = await client.request("GET", "/articles/getAll", { page: 1 });
```

`createClient` returns the raw envelope from the API — `{ success, statusCode, message, data }` — without the `ok`/`data`/`error` facade. Use it for endpoints the generated resources do not cover. It also exposes `client.streamSSE(method, path, options)` for hand-written streaming calls.

---

## TypeScript

```ts
import type { CMSResponse } from "@octaviatech/cms";
import CMS from "@octaviatech/cms";

const cms = CMS.init(process.env.OCTAVIA_API_KEY!);
```

Generated schemas and operation types are exported for consumers that need the raw spec types:

```ts
import { GeneratedSchemas, GeneratedOperations } from "@octaviatech/cms";
```

---

## Documentation

- API reference: https://developers.octaviatech.app
- Product: https://octaviatech.app/products/ai-cms
- Website: https://octaviatech.app
- Examples (Next.js, Nuxt, Laravel, ASP.NET, Fiber, Vite, Vue, Angular): https://github.com/octaviatech/octavia-ai-cms/tree/main/examples

---

## License

ISC