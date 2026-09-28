# Go Fiber Example

A backend-only Go Fiber app using the official **Octavia AI CMS Go SDK**.

## What it demonstrates

The same four steps as every example in this folder, plus the two richer calls:

| Route | What it shows |
| --- | --- |
| `GET /api/content` | List articles — rows live under `data.articleListItem`, not `items` |
| `POST /api/content` | Create a draft with `mainTitle`, `content` and a `category` array |
| `POST /api/content/:id/publish` | Publish by setting `isPublished` (there is no publish endpoint) |
| `GET /api/forms` | List forms — rows live under `data.formListItem` |
| `POST /api/forms/:id/submit` | Submit a form — `formSubmission.idSubmit(id, { language, values })` |
| `GET /api/reports/statistics` | Tenant usage counters |
| `POST /api/ai/summarize` | Shorten some text |

`GET /` serves a small HTML page that calls all of them.

## Install

```bash
go get github.com/octaviatech/octavia-ai-cms/packages/sdk-go/sdk
```

The SDK needs Go 1.21+ and has no third-party dependencies.

## Setup

```bash
cp .env.example .env
```

Export the variables in your shell or env loader:

| Variable | Required | Purpose |
| --- | --- | --- |
| `OCTAVIA_API_KEY` | yes | The only credential. Sent as the `x-api-key` header |
| `OCTAVIA_CATEGORY_ID` | for create | A category id; sent as `category: [id]` |
| `OCTAVIA_AUTHOR_ID` | optional | The article author; omitted when unset |

There is no `Authorization` header, no `x-tenant-id` and no project id — the
gateway resolves the tenant from your key.

## Run

```bash
go mod tidy
go run .
```

Server runs on `http://localhost:8080`.

## Notes on the SDK

Go methods take the **body first, then the query map**, and pass `nil` when
there is no query:

```go
res := cms.Article.Create(payload, nil)
one := cms.Article.GetById(id, nil)
```

Every call returns `CMSResponse[T]`. Check `res.Ok` and read
`res.Error.Message` rather than enabling `ThrowOnError`, which panics and
discards the status code.

This SDK version has two response models that are generated as empty structs:
`FormListItem` and `FormSubmissionEnriched`. `ListForms` therefore reads the
form list into the full `sdk.Form` model through the SDK's own
`sdk.RequestInto` helper, and `SubmitForm` reports the values it sent instead
of a submission id it cannot read. Both still go through the SDK — no
hand-rolled HTTP.

## Troubleshooting

- 401/403: check `OCTAVIA_API_KEY`.
- Create errors mentioning an unknown field: the endpoint rejects extra
  properties, and the field is `content`, not `body`.
- Create errors about `category`: it takes an array of ids, even for one.
- Need a module that is not in `go.sum` and the proxy returns 403:
  `GOPROXY=direct go mod tidy`.
