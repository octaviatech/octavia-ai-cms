# Go Fiber Example

## What it demonstrates
A backend-only Go Fiber API using the Go SDK.
Routes:
- `GET /api/content`
- `POST /api/content`
- `POST /api/content/:id/publish`
- `GET /api/forms`
- `POST /api/forms/:id/submit`
- `GET /api/reports/statistics`
- `POST /api/ai/summarize`

## Setup
```bash
cp .env.example .env
```
Export `OCTAVIA_API_KEY`, `OCTAVIA_CATEGORY_ID`, `OCTAVIA_AUTHOR_ID` in your shell or env loader.

## Run
```bash
go mod tidy
go run .
```
Server runs on `http://localhost:8080`.

## Troubleshooting
- 401/403: check API key.
- create errors: verify category/author IDs.
- SDK import issues: run `go mod tidy`.
