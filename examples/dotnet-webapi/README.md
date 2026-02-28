# .NET 8 Web API Example

## What it demonstrates
A .NET 8 minimal API using `Octavia.CmsSDK` for create/list/publish and exposing Swagger.
Additional endpoints:
- `GET /demo/forms`
- `POST /demo/forms/{id}/submit`
- `GET /demo/reports/statistics`
- `POST /demo/ai/summarize`

## Setup
Set environment variables:
- `OCTAVIA_API_KEY`
- `OCTAVIA_CATEGORY_ID`
- `OCTAVIA_AUTHOR_ID`

Or update `appsettings.json` defaults for local development.

## Run
```bash
dotnet restore
dotnet run
```
Open Swagger at `http://localhost:5000/swagger` (or printed URL).

## Troubleshooting
- 401/403: check API key.
- create errors: verify category/author IDs.
- Env precedence: environment variables override appsettings values.
