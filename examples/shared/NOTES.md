# Notes for example authors

Read this before changing any example. Every example talks to the same API and
must follow the same four rules. They exist because the first version of this
folder got them wrong.

## 1. Authentication is one header

Send `x-api-key` and nothing else. The gateway resolves the tenant and the
service status from that key.

```ts
const cms = CMS.init(process.env.OCTAVIA_API_KEY!);
```

There is no `Authorization` header, no `x-tenant-id`, no `x-octavia-project-id`,
and no `OCTAVIA_PROJECT_ID` variable. If you find yourself adding one, stop —
it means the API call is being made the wrong way.

**Never put the key in browser code.** Vite, Next.js and Nuxt all inline
`import.meta.env.*` into the shipped JavaScript, so a key referenced from a
component is readable by every visitor. Browser-facing examples call their own
server, and the server holds the key. See `react-vite/` and `vue-vite/` for the
proxy pattern.

## 2. `content`, not `body`

`/articles/create` requires `mainTitle`, `content` and `category`, and rejects
unknown fields (`additionalProperties: false`). `body` is not a field on an
article; sending it fails validation.

```ts
await cms.article.create({
  mainTitle: { en: "Hello" },
  content: { en: "Content" },
  category: ["<CATEGORY_ID>"],   // array of IDs, always
  author: "<AUTHOR_ID>",
});
```

Text fields are maps from language code to string, so `{ en: "..." }` for a
single language and `{ en: "...", es: "..." }` for two. `category` and
`subCategory` are arrays even when you have a single ID.

## 3. There is no publish endpoint

`/articles/publish` does not exist. The API has `archive`, which soft-deletes
(`isDeleted=true`) and is not a publish action. Publishing is a field:

```ts
await cms.article.update({ id, isPublished: true });
```

`isPublished` is accepted by both `create` and `update`.

## 4. Lists are named, not `items`

The list responses wrap rows under a resource-specific key. Reading `data.items`
returns `undefined` and the page silently shows nothing.

| Call | Property |
| --- | --- |
| `cms.article.getAll()` | `data.articleListItem` |
| `cms.form.getAll()` | `data.formListItem` |
| `cms.author.getAll()` | `data.author` |
| `cms.category.getAll()` | `data.category` |

Pagination is `data.pagination`, and through the facade also `res.meta.pagination`.

## 5. Response shape

Every SDK resolves to `{ ok, data, error, meta }`. `data` is the endpoint's own
payload, so list wrappers are `data.articleListItem`, not `data`.

```ts
const res = await cms.article.getAll({ query: { page: 1, limit: 20 } });
if (!res.ok) throw new Error(res.error?.message);
const rows = res.data?.articleListItem ?? [];
```

## SDK versions

The examples target the SDKs in this repository, currently `0.3.0`. Pin that
version, not an older one — method names moved between releases (for example
form submission is `formSubmission.idSubmit(id, body)` now).

| Language | Package | Version |
| --- | --- | --- |
| JS/TS | `@octaviatech/cms` | `^0.3.0` |
| Python | `octavia-cms-sdk` | `^0.3.0` |
| PHP | `octavia/cms` | `^0.3.0` |
| Go | `github.com/octaviatech/octavia-ai-cms/packages/sdk-go` | — |
| .NET | `Octavia.CmsSDK` | `^0.3.0` |

## What the examples should demonstrate

Each example covers the same four steps so they can be compared: list
articles, create one, publish it, and submit a form. The richer examples also
call `cms.ai.summarize` and `cms.report.getStatistics`, and a UI should actually
invoke them — unused code in a demo teaches the wrong lesson.
