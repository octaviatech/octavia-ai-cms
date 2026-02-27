# Laravel Example

## What it demonstrates
A Laravel proxy with endpoints and a small Blade page for create/list/publish.

## Setup
```bash
cp .env.example .env
composer install
php artisan key:generate
```
Set `OCTAVIA_API_BASE_URL`, `OCTAVIA_API_KEY`, `OCTAVIA_PROJECT_ID` in `.env`.

## Run
```bash
php artisan serve
```
Open `http://localhost:8000`.

## Troubleshooting
- 401/403: check API key and project id.
- Base URL issues: verify `OCTAVIA_API_BASE_URL`.
- Config cache: run `php artisan config:clear` after env changes.
