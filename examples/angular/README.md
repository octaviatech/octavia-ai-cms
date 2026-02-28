# Angular Example

## What it demonstrates
Angular UI for:
- blog create/list/publish
- form list + submit
plus a local Node proxy using `@octaviatech/cms` SDK.

## Setup
```bash
cp .env.example .env
```
Set `OCTAVIA_API_KEY`, `OCTAVIA_CATEGORY_ID`, `OCTAVIA_AUTHOR_ID`.

## Run
```bash
npm install
npm start
```
- Angular UI: `http://localhost:4200`
- Proxy API: `http://localhost:4000`

## Troubleshooting
- 401/403: invalid API key.
- create errors: check `OCTAVIA_CATEGORY_ID` and `OCTAVIA_AUTHOR_ID`.
- CORS: proxy already enables CORS for local UI.
