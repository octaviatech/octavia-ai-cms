---
name: octavia-cms
description: Use when working with the Octavia AI CMS API — creating or reading articles, categories, subcategories, authors, tags or languages; building or submitting forms and reading submissions; calling the AI automation endpoints (summarize, translate, SEO, repurpose, social publishing, article generation); or reading reports and analytics. Covers authentication, the response envelope, pagination, the content-model dependency order, and the official SDKs for JavaScript, Python, PHP, C# and Go.
---

# Octavia AI CMS

## Auth

Send exactly one header: `x-api-key`. It is mandatory on every operation.

- Base URL: `https://api.octaviatech.app/cms`
- Never send `x-tenant-id`, `x-service-status`, `x-user-id`, or `Authorization`. The
  gateway sets those itself from the key. No SDK accepts them, and sending them
  yourself is wrong.
- If a snippet you have seen sets them, ignore that snippet.
- 401 = key missing or wrong. 403 = key valid, role lacks the permission.

## Prefer the SDK over raw HTTP

Use the official SDK for the language you are writing in. It sends the key, unwraps
the envelope, and covers the whole API.

npm install @octaviatech/cms        # JavaScript / TypeScript
pip install octavia-cms-sdk         # Python
composer require octavia/cms         # PHP 8.1+
dotnet add package Octavia.CmsSDK    # .NET 6+
go get github.com/octaviatech/octavia-ai-cms/packages/sdk-go

Reach for raw HTTP only when the SDK genuinely lacks the endpoint, and then still
send just `x-api-key`.

## The envelope

Every response, success or failure, is:

    { success: boolean, statusCode: number, message: string, data: any }

There is no bare array and no bare error. `data` is `null` on failures and on 204.

For error bodies, `data` is a detail object whose shape is NOT uniform. Branch on
`statusCode`; treat `data` as best-effort for logging.

## Pagination

List endpoints put `pagination` INSIDE `data`, next to the rows:

    data: { articleListItem: [...], pagination: { total, page, limit, totalPages } }

`pagination` is not a sibling of `data` and not top-level. `page` is 1-indexed, and
`total` counts the filtered set, not the page.

The row key is per-resource and NOT consistent, so do not guess it:

| Endpoint group              | Row key           |
| --------------------------- | ----------------- |
| Articles                    | `articleListItem` |
| Forms                       | `formListItem`    |
| Authors                     | `author`          |
| Categories                  | `category`        |
| Subcategories               | `subCategory`     |
| Form submissions            | `formSubmission`  |
| Languages                   | `language`        |
| Tags                        | `tag`             |
| Comments                    | `comments`        |
| User/author statistics page | `items`           |

Query parameters on a paginated call are `page` and `limit`. On `articles/getAll` you
can also pass `keyword`, `includeDeleted`, `includeUnpublished`, `includePrivate`,
`category`, `subCategory`, `author`, `tags`, `sortBy` (`createdAt` or `publishDate`)
and `sortOrder` (`asc` or `desc`).

## Result object per SDK

There are TWO shapes, and confusing them is the single most common mistake.

The **wire envelope** is what the server sends and what a raw/typed client returns:

    { success, statusCode, message, data }

The **facade result** is what the high-level `CMS.init` / `CMS::init` / `CMS.Init` /
`InitCMS` constructor returns. It differs per language, and PHP is the outlier:

| Language | Success | Payload | Error | Pagination |
| --- | --- | --- | --- | --- |
| JavaScript | `res.ok` | `res.data` | `res.error.message` | `res.meta.pagination` |
| Python | `res.ok` | `res.data` | `res.error["message"]` | `res.meta["pagination"]` |
| PHP | `res.success` | `res.data` | `res.message` | inside `res.data.pagination` |
| C# | `res.Ok` | `res.Data` | `res.Error.Message` | `res.Meta.Pagination` |
| Go | `res.Ok` | `res.Data` | `res.Error.Message` | `res.Meta.Pagination` |

PHP has NO facade wrapper. `CMS::init` hands back the raw `Envelope`, so there is no
`ok`, no `error` and no `meta` — read `$res->success` and `$res->message`, and read
pagination from `$res->data['pagination']`.

`meta` / `Meta` exists only on JS, Python, C# and Go, and only when the response
actually carries pagination. It is undefined otherwise, so guard it.

`meta` is populated by a SEPARATE loose decode of the raw JSON, not by the typed
model. So in one result object, `Data` is fully typed while `Meta.Pagination` is not:
a `map[string]any` in Go and a raw `JsonElement` in C#. Do not expect a struct field
like `Meta.Pagination.TotalPages` in Go — index the map instead.

Python's error carries ONLY `message` — there is no `statusCode` on it. In JS it is
optional, and in C# and Go it is a field on a structured error object. Do not read
`error.statusCode` in Python.

An API error is a normal return value, not an exception. Each SDK has a
throw-on-error option, but the behaviour differs:

- JS, C#, PHP: raise or throw when enabled.
- Go: PANICS. The panic value is a plain string, so recover with `defer`/`recover`.

Leave the option off unless the caller actually wants to catch.

## Init

    JavaScript  import { CMS } from "@octaviatech/cms"; const cms = CMS.init(key)
    Python      from octavia_cms_sdk import CMS; cms = CMS.init(key)
    PHP         $cms = \Octavia\CmsSDK\CMS::init($key);
    C#          var cms = Octavia.CmsSDK.CMS.Init(key);
    Go          cms, err := sdk.InitCMS(key, nil)

Read the key from the environment (`OCTAVIA_API_KEY`). Never hardcode it and never
commit it.

## Resources and method naming

Resource properties: `article`, `author`, `category`, `subcategory`, `form`,
`formSubmission`, `language`, `tag`, `report`, `ai`, `aiConversation`, `raw`.
`raw` is the underlying HTTP client for anything unlisted.

Method names are the same across languages; only the casing convention differs:

    JavaScript  cms.article.getAll()        Python    cms.article.get_all()
    PHP         $cms->article->getAll()     C#        cms.Article.GetAllAsync()
    Go          cms.Article.GetAll()

Go and C# name collection methods without a trailing `All` on some operations; check
the per-language SDK page rather than assuming a mechanical transform.

The `raw` client uses PLURAL resource names and returns the wire envelope; the facade
uses SINGULAR names and returns the wrapped result. They are not interchangeable, and
in JavaScript the raw client spells the conversation resource `aIConversation` against
the facade's `aiConversation`.

Several generated method names read badly but are correct — `idCommentsPOST`,
`commentsCommentIdPATCH`, `idReactionDELETE`, `captchaConfigGET`, `dashboardConfigPUT`,
`conversationConversationId`. They are derived from the URL path, and the verb suffix
is how the SDK disambiguates. Do not "fix" them. Also note `deleteId` is a method
name on most resources, while `form` really does have a plain `delete`.

Pagination field names diverge in exactly one place: Python rewrites `totalPages` to
`total_pages`. Every other language keeps the camelCase wire name.

### The full method list

`article` — create, update, archive, deleteId, getAll, getById, getBySlug,
getByCategoryId, getByCategorySlug, getBySubCategoryId, getBySubCategorySlug,
getByAuthorId, getByTag, search, advanceSearch, seoAnalysisId, idReactionPOST,
idReactionDELETE, idReactionSummary, idCommentsPOST, idCommentsGET, commentsGetAll,
commentsCommentIdPATCH, commentsCommentIdDELETE, commentsCommentIdReactionPOST,
commentsCommentIdReactionDELETE, commentsCommentIdReactionSummary,
engagementSettingsGET, engagementSettingsPUT

`ai` — summarize, summarizeStream, summarizeArticleStream, seoOptimize, seoOptimizeStream,
generateTitle, generateContent, generateImage, optimizeArticle, optimizeArticleStream,
translate, translateStream, translateArticle, translateArticleStream, translateForm,
repurpose, repurposeStream, repurposeTemplateGET, repurposeTemplatePUT,
socialConnections, socialLinkedinConnect, socialTwitterConnect, socialTelegramConnect,
socialLinkedinPublish, socialTwitterPublish, socialTelegramPublish

`aiConversation` — conversationStart, conversationContinue, conversationConversationId,
conversationGenerate, conversationGenerateStream, conversationRegenerate

`form` — create, update, delete, getAll, getById, getBySlug, getNextById,
captchaConfigGET, captchaConfigPUT, captchaConfigSecret

`formSubmission` — idSubmit, idInternalSubmit, submissionsGetAll, idGetAllSubmissions,
getSubmissionById, submissionUpdateId, submissionDeleteId, submissionIdRelations,
submissionIdRelationsFieldNameConnect, submissionIdRelationsFieldNameDisconnect,
submissionIdRelationsFieldNameReorder, submissionsRelationsBackfill

`report` — getStatistics, getTenantStatisticsTenantId, getUserStatisticsUserId,
getAuthorStatisticsAuthorId, getAllUsersStatistics, getAllAuthorsStatistics,
contentOverview, contentHealth, categoryPerformance, publishingPerformance, topArticles,
periodComparison, aiContentImpact, aiUsageBreakdown, commentOverview, formsOverview,
submissionsOverview, chartContentTrend, chartEngagementTrend, chartSubmissionFunnel,
dashboardConfigGET, dashboardConfigPUT

`author`, `category`, `subcategory` — create, update, deleteId, getAll, getById, getBySlug
(`subcategory` also has getByCategoryId).

`language` — create, getAll, getById, update, deleteId

`tag` — create, getAll, search

The `raw` client adds `health()` → `GET /healthz` on top of these.

## Content model

An article cannot be written until its dependencies exist, in this order:

1. `language.create` — an article's `language` must already exist
2. `author.create`
3. `category.create`
4. `subcategory.create` — optional, needs a `categoryId`
5. `article.create`

`/articles/create` requires `mainTitle`, `content` and `category`, and its body is
`additionalProperties: false`, so an unknown key is a 422, not a silent drop.

- `category` and `subCategory` are ARRAYS of ids. A bare string is rejected.
- Titles and other text fields are multilingual maps: `{ "en": "…", "es": "…" }`.
- Created resources return the new id; capture it, later steps need it.

## Gotchas that produce wrong code

- `forms/getAll` returns ONLY a submissions count per form — no id, title or slug. It
  cannot drive a form picker. Use `form.getById(id)`.
- There is no publish endpoint. Publishing is a field update: set `isPublished: true`
  on `article.update`.
- `archive` is a SOFT delete. It is not a delete, and it is not a publish. The real
  remove is `delete`.
- Tags are free-form strings, not ids, on an article.
- Reports read from the tenant the key belongs to. The tenant is resolved from the
  key, not passed by you.
- `getTenantStatisticsTenantId` is the ONE method that exists only in the JavaScript
  SDK. It is absent from Python, PHP, C# and Go. Do not write it in another language
  — use the raw client there, or pick a different report.

## Two SDK bugs to route around

**1. In JavaScript and Python, `language.getById` silently sends the id to the query
string instead of the body.** The endpoint takes a body (`{id}`), but the facade
rewrites any single object argument on a method whose name starts with `get` or
contains `search` into a query. The request goes out wrong and you get a
plausible-looking error rather than an exception. PHP, Go and C# are unaffected.

Pass the body under an explicit `body` key, which the rewrite skips:

    cms.language.getById({ body: { id: "en" } })     // correct, JS and Python
    cms.language.getById({ id: "en" })               // WRONG in JS and Python

**2. Five generated types lose their data outside JavaScript.** The same generator
emitted a "list wrapper" type in four languages and wired it up in only one.

| Type                       | JS  | Python | PHP     | Go     | C#                      |
| -------------------------- | --- | ------ | ------- | ------ | ----------------------- |
| `MultilingualStringOrNull` | ok  | empty  | gone    | empty  | in `.Extra`             |
| `FormListItem`             | ok  | ok     | gone    | empty  | ok                      |
| `FormSubmissionEnriched`   | ok  | ok     | gone    | empty  | ok                      |
| `ReportGroupBy`            | ok  | empty  | gone    | empty  | in `.Extra`             |
| `ErrorResponse`            | n/a | empty  | gone    | empty  | in `.Extra`             |

- **PHP is the worst**: `fromArray()` builds an empty object and discards the input
  array, and the class declares no properties. The value is not degraded, it is
  unreachable.
- **Go** tags the field `json:"-"` with no `UnmarshalJSON` anywhere in the SDK, so the
  decoder skips it. All five are nested field types rather than whole method returns,
  so the damage is confined to those specific fields.
- **Python** stores the payload in `_raw` but nothing ever populates it.
- **C#** is the most forgiving: `JsonExtensionData` captures the unknown fields, so
  `.Extra?["key"]` works.
- **JavaScript is unaffected** — the generator produced real types there.

This matters most for **multilingual text**. `content` and `summary` on a localized
article are typed as the broken wrapper, so `mainTitle`, `content`, `summary`,
`title2`, `title3`, `name` and `description` are affected on every non-JS SDK.

Rule: **in PHP, read the raw `data` array instead of the model object.** In Go and
Python, expect these fields to be empty and fall back to the untyped map. If you need
multilingual text, JavaScript is the only SDK where it just works.

## Status codes

    200 ok            201 created        204 no content
    400 bad request   401 bad key         403 key valid, not permitted
    404 not found     422 validation     423 plan inactive
    426 seat limit    429 rate limited

## Rate limits

No SDK retries. A 429 is an ordinary error result, so back off yourself. Limits are
plan-dependent — check the dashboard for the current value rather than assuming one.

## Verify before you finish

- Only `x-api-key` is in the headers.
- The key comes from the environment.
- Success is checked on the language's real field, not JS's `ok` everywhere.
- `pagination` is read from inside `data`.

## Reference

- Full documentation: https://developers.octaviatech.app/api-reference/ai-cms/sdks/overview
- Endpoint map for planning: https://developers.octaviatech.app/llms.txt
- Working examples in every language: https://github.com/octaviatech/octavia-ai-cms/tree/main/examples
