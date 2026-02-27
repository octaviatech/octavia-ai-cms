# Octavia AI CMS — SDKs & Runnable Examples

Octavia AI CMS is an **AI-native, developer-friendly headless CMS** for teams that need to **create, translate, optimize (SEO), and publish content** faster.

If you found this repo on GitHub and want to see it running in under 2 minutes: **pick a stack → set env → run**.

<p align="left">
  <a href="https://octaviatech.app/products/ai-cms"><strong>Website</strong></a> ·
  <a href="https://developers.octaviatech.app"><strong>Docs</strong></a> ·
  <a href="https://www.npmjs.com/package/@octaviatech/cms"><strong>NPM</strong></a>
</p>

## Quick start

1. Pick an example project under `examples/`.
2. Copy `.env.example` to `.env`.
3. Set these variables:
   - `OCTAVIA_API_BASE_URL`
   - `OCTAVIA_API_KEY`
   - `OCTAVIA_PROJECT_ID`
4. Run the project command from that example README.

## API contract used in all examples

- `POST /v1/cms/content` (create)
- `GET /v1/cms/content` (list)
- `POST /v1/cms/content/:id/publish` (publish)

Headers:
- `Authorization: Bearer <OCTAVIA_API_KEY>`
- `x-octavia-project-id: <OCTAVIA_PROJECT_ID>`

## Repository structure

```txt
examples/
  react-vite/               React + Vite + TypeScript single page demo
  nextjs-app-router/        Next.js App Router demo with server route handlers
  angular/                  Angular demo with local Node proxy
  vue-vite/                 Vue 3 + Vite + TypeScript single page demo
  nuxt/                     Nuxt 3 demo with server API routes
  dotnet-webapi/            .NET 8 minimal API proxy demo
  php-laravel/              Laravel proxy demo + Blade UI
  go-fiber/                 Go Fiber proxy demo + HTML page
  shared/                   Shared payloads and maintainer notes

.github/workflows/          CI checks for all examples
CONTRIBUTING.md
CODE_OF_CONDUCT.md
SECURITY.md
LICENSE
```

## Which examples hide the API key?

Server proxy examples keep `OCTAVIA_API_KEY` on the server only:
- Next.js
- Nuxt
- Angular (local Express proxy)
- .NET
- Laravel
- Go Fiber

Browser-direct examples for simplicity:
- React Vite
- Vue Vite

## Common troubleshooting

- **401/403**: check `OCTAVIA_API_KEY` and `OCTAVIA_PROJECT_ID`.
- **Wrong API URL**: verify `OCTAVIA_API_BASE_URL` and remove trailing slash issues.
- **CORS**: use server-proxy examples if your browser cannot call Octavia directly.

## License

MIT
