# Angular Example

## What it demonstrates
Angular UI for create/list/publish plus a local Node proxy to keep API keys off the browser.

## Setup
```bash
cp .env.example .env
```
Set `OCTAVIA_API_BASE_URL`, `OCTAVIA_API_KEY`, `OCTAVIA_PROJECT_ID`.

## Run
```bash
npm install
npm start
```
- Angular UI: `http://localhost:4200`
- Proxy API: `http://localhost:4000`

## Troubleshooting
- 401/403: invalid key or project id.
- Base URL errors: confirm `OCTAVIA_API_BASE_URL`.
- CORS: proxy already enables CORS for local UI.
