# Go Fiber Example

## What it demonstrates
A Go Fiber proxy server and minimal HTML UI for create/list/publish.

## Setup
```bash
cp .env.example .env
```
Export `OCTAVIA_API_BASE_URL`, `OCTAVIA_API_KEY`, `OCTAVIA_PROJECT_ID` in your shell or env loader.

## Run
```bash
go mod tidy
go run .
```
Open `http://localhost:8080`.

## Troubleshooting
- 401/403: check API key and project id.
- Base URL: verify `OCTAVIA_API_BASE_URL`.
- Empty response parsing: inspect raw proxy response.
