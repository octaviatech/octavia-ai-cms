# Vue + Vite Example

## What it demonstrates
Vue 3 Composition API app with create/list/publish flows using `@octaviatech/cms`.

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
- 401/403: verify API key.
- create errors: verify category/author IDs.
- For production, move SDK calls to a backend proxy to avoid exposing keys.
