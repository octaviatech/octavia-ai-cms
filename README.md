# Octavia AI CMS — SDKs & Runnable Examples

Octavia AI CMS is an **AI-native, developer-friendly headless CMS** for teams that need to **create, translate, optimize (SEO), and publish content** faster.

This repository holds the official client SDKs and runnable examples for every supported language.

<p align="left">
  <a href="https://octaviatech.app/products/ai-cms"><strong>Website</strong></a> ·
  <a href="https://developers.octaviatech.app"><strong>Docs</strong></a> ·
  <a href="https://www.npmjs.com/package/@octaviatech/cms"><strong>npm</strong></a> ·
  <a href="https://pypi.org/project/octavia-cms-sdk/"><strong>PyPI</strong></a> ·
  <a href="https://www.nuget.org/packages/Octavia.CmsSDK"><strong>NuGet</strong></a>
</p>

---

## SDKs

Install the client for your language. Every SDK is generated from the OpenAPI spec, sends **only** the `x-api-key` header, and returns the same response shape.

| Language | Install | Registry |
| --- | --- | --- |
| JavaScript / TypeScript | `npm install @octaviatech/cms` | [npm](https://www.npmjs.com/package/@octaviatech/cms) |
| Python | `pip install octavia-cms-sdk` | [PyPI](https://pypi.org/project/octavia-cms-sdk/) |
| PHP | `composer require octavia/cms` | [Packagist](https://packagist.org/packages/octavia/cms) |
| Go | `go get github.com/octaviatech/octavia-ai-cms/packages/sdk-go/sdk` | GitHub |
| .NET | `dotnet add package Octavia.CmsSDK` | [NuGet](https://www.nuget.org/packages/Octavia.CmsSDK) |

Source for each lives in [`packages/`](packages); see its own README for usage.

## Quick start

```ts
import CMS from "@octaviatech/cms";

const cms = CMS.init("your-api-key");

const res = await cms.article.getAll({ query: { page: 1, limit: 10 } });

if (!res.ok) throw new Error(res.error?.message ?? "Request failed");

console.log(res.data);
```

## Authentication

The API key is the only credential, and it is required. It is sent as the `x-api-key` header on every request — there is no OAuth, no refresh token and no other header to configure.

Your tenant and the service status are resolved by the gateway from your key, so there is nothing to send for them.

Get a key:

1. Sign up at [octaviatech.app](https://octaviatech.app)
2. Dashboard → your service → **API Keys** → Create key

> Keep the key server-side. A key in a browser bundle is a public key — proxy those requests through your backend instead.

## Examples

Runnable demos for each stack live under [`examples/`](examples):

| Example | Stack |
| --- | --- |
| `react-vite/` | React + Vite + TypeScript single page demo |
| `nextjs-app-router/` | Next.js App Router with server route handlers |
| `angular/` | Angular with a local Node proxy |
| `vue-vite/` | Vue 3 + Vite + TypeScript single page demo |
| `nuxt/` | Nuxt 3 with server API routes |
| `dotnet-webapi/` | .NET 8 minimal API proxy demo |
| `php-laravel/` | Laravel proxy demo + Blade UI |
| `go-fiber/` | Go Fiber proxy demo + HTML page |
| `shared/` | Shared payloads and maintainer notes |

### Running an example

1. Pick a project under `examples/`.
2. Copy its `.env.example` to `.env`.
3. Set `OCTAVIA_API_KEY` (and `OCTAVIA_API_BASE_URL` if you are not using the default host).
4. Run the command from that example's README.

### Which examples hide the API key

Server proxy examples keep `OCTAVIA_API_KEY` on the server only — Next.js, Nuxt, Angular (local Express proxy), .NET, Laravel, and Go Fiber.

The React and Vue Vite demos call the API directly from the browser for simplicity. Do not ship a real key that way; use a proxy in production.

## Repository structure

```txt
packages/                 Official SDKs, one folder per language
  sdk-js/
  sdk-python/
  sdk-php/
  sdk-go/
  sdk-csharp/
examples/                 Runnable demos per stack
CONTRIBUTING.md
CODE_OF_CONDUCT.md
SECURITY.md
LICENSE
```

## Common troubleshooting

- **401 / 403**: check that `OCTAVIA_API_KEY` is set and valid.
- **Wrong API URL**: verify `OCTAVIA_API_BASE_URL` if you have overridden it, and drop any trailing slash.
- **CORS**: use a server-proxy example if your browser cannot reach the API directly.

## License

ISC — see [LICENSE](LICENSE).
