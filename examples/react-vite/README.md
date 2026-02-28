# React + Vite Example

## What it demonstrates
A TypeScript React app that:
- creates/lists/publishes blog content
- loads forms and submits form answers
- has two pages inside app: Blog and Form

## Setup
```bash
cp .env.example .env
```
Fill:
- `OCTAVIA_API_KEY`
- `OCTAVIA_CATEGORY_ID`
- `OCTAVIA_AUTHOR_ID`

## Run
```bash
npm install
npm run dev
```

## Troubleshooting
- 401/403: verify API key.
- create errors: verify category/author IDs.
- For production, move SDK calls to a backend proxy to avoid exposing keys.
