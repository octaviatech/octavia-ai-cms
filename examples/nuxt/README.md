# Nuxt 3 Example

## What it demonstrates
Nuxt server routes proxying Octavia API so the API key stays server-side.

## Setup
```bash
cp .env.example .env
```
Set `OCTAVIA_API_BASE_URL`, `OCTAVIA_API_KEY`, `OCTAVIA_PROJECT_ID`.

## Run
```bash
npm install
npm run dev
```

## Troubleshooting
- 401/403: check key and project ID.
- Base URL: verify `OCTAVIA_API_BASE_URL`.
- Runtime config: ensure env vars are loaded before starting Nuxt.
