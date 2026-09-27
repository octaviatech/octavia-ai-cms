# @octaviatech/cms

Typed JavaScript/TypeScript SDK for the **Octavia AI CMS API** — articles, categories, tags, forms, submissions, AI automation, social publishing and analytics, behind one client and one response shape.

- Generated from the OpenAPI spec, so it covers **every** public operation.
- **Zero runtime dependencies.** Ships its own typings.
- Works in Node.js 18+, Deno, Bun and any browser with `fetch`.
- Ships **both ESM and CommonJS**, with type definitions for `data` on every method.

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

1. Sign up at [octaviatech.app](https://octaviatech.app)
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
| `timeoutMs` | `number` | no timeout | Per-request timeout in milliseconds. |
| `throwOnError` | `boolean` | `false` | `false` returns `{ ok: false }`; `true` throws an `ApiError`. |

`CMS.init` returns a facade. `cms.raw` is the underlying `OctaviaClient` if you need an endpoint the generated resources do not cover yet.

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

| Property | Covers |
| --- | --- |
| `cms.article` | Articles, comments, reactions, engagement settings |
| `cms.author` | Authors |
| `cms.category` | Categories |
| `cms.subcategory` | Subcategories |
| `cms.tag` | Tags |
| `cms.form` | Forms and captcha configuration |
| `cms.formSubmission` | Submissions and their article relations |
| `cms.language` | Languages |
| `cms.ai` | Summarize, translate, SEO, repurpose, social publishing |
| `cms.aiConversation` | Multi-turn article drafting |
| `cms.report` | Statistics, charts, dashboard configuration |
| `cms.raw` | The unwrapped client |

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

Only languages that have been registered through `cms.language.create` can be written.

### Summarize text

```ts
const res = await cms.ai.summarize({ query: { text: "Long article body…" } });
console.log(res.data);
```

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

`createClient` returns the raw envelope from the API — `{ success, statusCode, message, data }` — without the `ok`/`data`/`error` facade. Use it for endpoints the generated resources do not cover.

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
- Dashboard and API keys: https://octaviatech.app

---

## License

ISC
