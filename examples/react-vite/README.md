# React + Vite Example

## What it demonstrates
A TypeScript React app that:
- creates/lists/publishes blog content
- loads forms and submits form answers
- summarizes text with `ai.summarize` and shows `report.getStatistics`
- has three pages inside app: Blog, Form and AI & Statistics

## Where the API key lives
Not in the browser. `server/octaviaProxy.ts` is a Vite plugin that mounts a
middleware under `/api/octavia/*` on the dev server; it is the only code that
reads `OCTAVIA_API_KEY`, and it calls `@octaviatech/cms` with it. The browser
only does `fetch("/api/octavia/...")` — see `src/lib/octaviaClient.ts`.

Vite inlines `import.meta.env.*` into the shipped JavaScript, so a key
referenced from a component would be readable by every visitor. The proxy
exists to make that impossible.

| Browser route | Server-side SDK call |
| --- | --- |
| `GET /api/octavia/articles` | `cms.article.getAll` |
| `POST /api/octavia/articles` | `cms.article.create` |
| `POST /api/octavia/articles/:id/publish` | `cms.article.update({ isPublished: true })` |
| `GET /api/octavia/forms/:id` | `cms.form.getById` |
| `POST /api/octavia/forms/:id/submit` | `cms.formSubmission.idSubmit` |
| `POST /api/octavia/ai/summarize` | `cms.ai.summarize` |
| `GET /api/octavia/statistics` | `cms.report.getStatistics` |

The form is fetched **by id**, entered by the user, rather than listed.
`cms.form.getAll` returns only a submissions count per form — no id, title or
slug — so it cannot drive a form picker.

## Setup
```bash
cp .env.example .env
```
Fill:
- `OCTAVIA_API_KEY`
- `OCTAVIA_CATEGORY_ID`
- `OCTAVIA_AUTHOR_ID`

The plugin reads these from the Node process environment, so `npm run dev` must
be started in a shell that has them exported (e.g. via `dotenv` or your shell
profile). They are never referenced from `src/`.

## Run
```bash
npm install
npm run dev
```

## Troubleshooting
- 401/403: verify API key.
- create errors: verify category/author IDs.
- `OCTAVIA_API_KEY is not set on the dev server`: the variable is missing from
  the process that started `vite`.

## Production
The dev-server proxy is dev-only (`apply: "serve"`). A production deploy must
put an equivalent server-side route in front of the built bundle. Serving
`dist/` on its own will render the UI but every `/api/octavia/*` call will 404.
