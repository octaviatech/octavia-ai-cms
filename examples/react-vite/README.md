# React + Vite Example

## What it demonstrates
A TypeScript React app that creates, lists, and publishes Octavia AI CMS content.

## Setup
```bash
cp .env.example .env
```
Fill:
- `OCTAVIA_API_BASE_URL`
- `OCTAVIA_API_KEY`
- `OCTAVIA_PROJECT_ID`

## Run
```bash
npm install
npm run dev
```

## Troubleshooting
- 401/403: verify API key and project ID.
- Base URL issues: ensure URL points to your Octavia API.
- CORS: use a server-proxy example if browser calls are blocked.
