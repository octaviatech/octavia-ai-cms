# Laravel Example

## What it demonstrates
A Laravel proxy that talks to the Octavia AI CMS through the official PHP SDK
(`octavia/cms`), with a small Blade page driving it. The browser calls this
app; this app calls the SDK. No API call is made with raw `Http::` or curl.

The API key is read on the server only. It is never rendered into the Blade
view and never reaches browser code.

## Setup
```bash
cp .env.example .env
composer install
php artisan key:generate
```

Set these in `.env`:

| Variable | Purpose |
| --- | --- |
| `OCTAVIA_API_KEY` | The only credential. Required. |
| `OCTAVIA_CATEGORY_ID` | Category id used when creating an article. |
| `OCTAVIA_AUTHOR_ID` | Author id used when creating an article. |

There is no tenant id, no project id and no `Authorization` header. The gateway
derives the tenant and the service status from `x-api-key`, which is the single
header the SDK sends.

## Run
```bash
php artisan serve
```
Open `http://localhost:8000`.

## Routes

| Method | Route | SDK call |
| --- | --- | --- |
| `GET` | `/demo/content` | `article->getAll()` |
| `POST` | `/demo/content` | `article->create()` |
| `GET` | `/demo/content/{id}` | `article->getById()` |
| `POST` | `/demo/content/{id}/publish` | `article->update({ id, isPublished: true })` |
| `GET` | `/demo/forms/{id}` | `form->getById()` |
| `POST` | `/demo/forms/{id}/submit` | `formSubmission->idSubmit()` |
| `GET` | `/demo/reports/statistics` | `report->getStatistics()` |
| `POST` | `/demo/ai/summarize` | `ai->summarize()` |

## Notes that will bite you

- **Publishing is a field update, not an endpoint.** There is no
  `/articles/publish`. `article->archive()` is a soft-delete and is *not* how
  you publish. Send `article->update(['id' => $id, 'isPublished' => true])`.
- **The article body field is `content`, not `body`.** The create schema is
  `additionalProperties: false`, so sending `body` fails validation.
- **`category` is an array of ids**, even when you only have one.
- **List responses are keyed by resource name**: `articleListItem`,
  `formListItem`, not `items`.
- **Forms are fetched by id.** `form->getAll()` returns rows carrying only a
  submissions count — no id, title or slug — so a form picker cannot be built
  from the list. Use `form->getById()` and take the id from the UI.
- **The PHP response is an `Envelope`** with public `$success`, `$statusCode`,
  `$message` and `$data` — not the JavaScript `{ ok, data }` shape.

## Troubleshooting
- 401/403: check `OCTAVIA_API_KEY`.
- Create errors: verify `OCTAVIA_CATEGORY_ID` and `OCTAVIA_AUTHOR_ID` are real
  24-hex ids.
- Config cache: run `php artisan config:clear` after env changes.
