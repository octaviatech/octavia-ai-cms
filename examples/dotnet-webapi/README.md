# .NET 8 Web API Example

## What it demonstrates
A .NET 8 minimal API that proxies Octavia create/list/publish endpoints and exposes Swagger.

## Setup
Set environment variables:
- `OCTAVIA_API_BASE_URL`
- `OCTAVIA_API_KEY`
- `OCTAVIA_PROJECT_ID`

Or update `appsettings.json` defaults for local development.

## Run
```bash
dotnet restore
dotnet run
```
Open Swagger at `http://localhost:5000/swagger` (or printed URL).

## Troubleshooting
- 401/403: check key and project id.
- Base URL: verify Octavia API base URL.
- Env precedence: environment variables override appsettings values.
