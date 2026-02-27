# Vue + Vite Example

## What it demonstrates
Vue 3 Composition API app with create/list/publish flows using Octavia API.

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
- 401/403: verify credentials and project id.
- Base URL issues: verify API URL.
- CORS: use a server-proxy example if direct browser calls are blocked.
