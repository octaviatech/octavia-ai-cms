# Next.js App Router Example

## What it demonstrates

A Next.js app that proxies Octavia calls through Route Handlers so the API key is never exposed to the browser.
This example now uses `@octaviatech/cms` SDK on the server side.
`octaviaServerClient` includes:
- blog list/create/publish
- form list/submit
- reports statistics
- ai summarize

Pages:
- `/blog`
- `/forms`

## Why server proxy is used

`OCTAVIA_API_KEY` is read only on the server. The UI calls internal `/api/octavia/*` routes.

## Setup

```bash
cp .env.example .env.local
```

Set:

- `OCTAVIA_API_KEY`

## Run

```bash
npm install
npm run dev
```

## Troubleshooting

- 401/403: check key and project ID.
- Wrong URL: verify base URL.
- Route errors: ensure env vars are loaded in `.env.local`.
