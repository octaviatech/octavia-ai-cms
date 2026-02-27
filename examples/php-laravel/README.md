# Laravel Example

## What it demonstrates
A Laravel proxy with endpoints and a small Blade page for create/list/publish using SDK.

## Setup
```bash
cp .env.example .env
composer install
php artisan key:generate
```
Set `OCTAVIA_API_KEY`, `OCTAVIA_CATEGORY_ID`, `OCTAVIA_AUTHOR_ID` in `.env`.

## Run
```bash
php artisan serve
```
Open `http://localhost:8000`.

## Troubleshooting
- 401/403: check API key.
- create errors: verify category/author IDs.
- Config cache: run `php artisan config:clear` after env changes.
