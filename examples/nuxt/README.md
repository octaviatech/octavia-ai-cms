# Nuxt 3 Example

## What it demonstrates
Nuxt server routes using `@octaviatech/cms` SDK so the API key stays server-side.

## Setup
```bash
cp .env.example .env
```
Set `OCTAVIA_API_KEY`, `OCTAVIA_CATEGORY_ID`, `OCTAVIA_AUTHOR_ID`.

## Run
```bash
npm install
npm run dev
```

## Troubleshooting
- 401/403: check API key.
- create errors: verify category/author IDs.
- Runtime config: ensure env vars are loaded before starting Nuxt.
