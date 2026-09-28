# Nuxt 3 Example

## What it demonstrates
Nuxt server routes using the `@octaviatech/cms` SDK so the API key stays server-side.
Includes:
- blog create / list / publish
- form list / submit
- `cms.report.getStatistics` on the home dashboard
- `cms.ai.summarize` on the forms page

## Setup
```bash
cp .env.example .env
```
Set `OCTAVIA_API_KEY`, `OCTAVIA_CATEGORY_ID`, `OCTAVIA_AUTHOR_ID`.
(`NUXT_OCTAVIA_API_KEY` and friends work too — they are the runtimeConfig form.)
The key is read from runtimeConfig in `server/` only. No page imports the SDK.

## Run
```bash
npm install
npm run dev
```

Pages: `/` (statistics), `/blog` (articles), `/forms` (forms + AI summarize).

## API notes this example follows
- One header: `x-api-key`. The gateway resolves the tenant from the key.
- Articles are created with `mainTitle`, `content` and `category` — `body` is
  not a field, and `category` is an array of IDs even for one category.
- There is no publish endpoint; publishing is `article.update({ id, isPublished: true })`.
- List rows are keyed by resource name: `data.articleListItem`, `data.formListItem`.
- Form submission is `formSubmission.idSubmit(formId, { language, values })`.

## Troubleshooting
- 401/403: check API key.
- create errors: verify category/author IDs.
- Runtime config: ensure env vars are loaded before starting Nuxt.
