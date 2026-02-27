
# Octavia AI CMS — SDKs & Runnable Examples

Octavia AI CMS is an **AI-native, developer-friendly headless CMS** for teams that need to **create, translate, optimize (SEO), and publish content** faster — without building and maintaining a complicated CMS stack.

If you found this repo from GitHub and want to “see it working”, start here: **pick a stack → set env → run**.

<p align="left">
  <a href="https://octaviatech.app/products/ai-cms"><strong>Website</strong></a> ·
  <a href="https://developers.octaviatech.app"><strong>Docs</strong></a> ·
  <a href="https://www.npmjs.com/package/@octaviatech/cms"><strong>NPM</strong></a>
</p>

---

## What is Octavia AI CMS?

Most CMS setups become painful when you need:
- **multi-language content**
- **consistent SEO**
- **fast publishing workflows**
- and **AI assistance** (rewrite, summarize, translate, generate)

Octavia AI CMS is built to handle these workflows cleanly:
- **Headless CMS**: content lives in Octavia, you consume it via API in any app.
- **AI-native**: built-in AI capabilities for content operations (create/translate/optimize).
- **Production-friendly**: supports real publishing flows, not just “notes in a database”.

> In short: it’s a CMS that helps you ship content faster, in multiple languages, with fewer tools and less glue code.

---

## Who is this for?

- SaaS founders & product teams shipping landing pages/docs/blog
- Marketing & SEO teams that want faster iteration with less engineering dependency
- Agencies managing content for multiple clients
- Developers who want a clean API + SDK and runnable examples

---

## What you can do with it

With any example in this repo, you will run a small app that can:

1) **Create content** (title/body/locale)  
2) **List content**  
3) **Publish content** (switch from draft → published)

This repo is intentionally focused on the “first success moment”.

---

## Quick start (pick your stack)

> Each example is a **real runnable project** (not a single file snippet).
> Every project has its own `README.md` and `.env.example`.

### 1) Choose an example

- React (Vite): `examples/react-vite`
- Next.js (App Router): `examples/nextjs-app-router`
- Angular: `examples/angular`
- Vue (Vite): `examples/vue-vite`
- Nuxt: `examples/nuxt`
- .NET Web API: `examples/dotnet-webapi`
- PHP (Laravel): `examples/php-laravel`
- Go (Fiber): `examples/go-fiber`

### 2) Configure environment variables

Every example uses the same env keys:

- `OCTAVIA_API_BASE_URL`
- `OCTAVIA_API_KEY`

Inside the example folder:

```bash
cp .env.example .env
````

Then fill the values.

> ✅ Never commit real keys. `.env` stays local.

---

## Prefer SDK? (JavaScript / TypeScript)

NPM package:

* [https://www.npmjs.com/package/@octaviatech/cms](https://www.npmjs.com/package/@octaviatech/cms)

Install:

```bash
npm i @octaviatech/cms
# or pnpm add @octaviatech/cms
# or yarn add @octaviatech/cms
```

Then follow the docs for authenticated client setup:

* [https://developers.octaviatech.app](https://developers.octaviatech.app)

---

## Repo structure (what you’ll find)

```txt
examples/
  react-vite/               React + Vite UI demo (create/list/publish)
  nextjs-app-router/        Next.js demo (server-safe API usage)
  angular/                  Angular demo
  vue-vite/                 Vue 3 demo
  nuxt/                     Nuxt 3 demo (server routes + UI)
  dotnet-webapi/            .NET demo (proxy endpoints)
  php-laravel/              Laravel demo (proxy endpoints)
  go-fiber/                 Go demo (proxy endpoints)
  shared/                   Shared demo payloads + notes
```

**Important:** some stacks (Next/Nuxt/.NET/PHP/Go) are implemented as “server proxy” demos so your API key never leaks to the browser.

---

## Common troubleshooting

* **401/403**: your `OCTAVIA_API_KEY` is missing/invalid, or `OCTAVIA_PROJECT_ID` is wrong.
* **CORS issues**: use server-proxy examples (Next/Nuxt/.NET/PHP/Go) instead of calling Octavia directly from browser.
* **Base URL wrong**: ensure `OCTAVIA_API_BASE_URL` matches your environment.

---

## Where to go next

* Docs: [https://developers.octaviatech.app](https://developers.octaviatech.app)
* Product overview: [https://octaviatech.app/products/ai-cms](https://octaviatech.app/products/ai-cms)
* JS package: [https://www.npmjs.com/package/@octaviatech/cms](https://www.npmjs.com/package/@octaviatech/cms)

---

## License

MIT
