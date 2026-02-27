# Go Fiber Example

## What it demonstrates
A Go Fiber proxy server and minimal HTML UI for create/list/publish using SDK.

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
Open `http://localhost:8080`.

## Troubleshooting
- 401/403: check API key.
- create errors: verify category/author IDs.
- Empty response parsing: inspect raw proxy response.
