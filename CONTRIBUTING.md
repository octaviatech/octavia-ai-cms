# Contributing

Thanks for contributing to Octavia AI CMS examples.

## Development guidelines

- Keep examples minimal and runnable.
- Do not hardcode secrets.
- Use the common env vars:
  - `OCTAVIA_API_BASE_URL`
  - `OCTAVIA_API_KEY`
- Preserve the create/list/publish flow in all examples.

## Regenerating the SDKs

The SDKs are **generated** — never hand-edit `packages/*/src`. The source of
truth is the backend repo's `openapi.json`, built with `npm run openapi:build`
there.

`openapi.json` at this repo's root is a **copy** of that file, and it is what the
JavaScript generator reads by default. A stale copy regenerates stale code
silently (this happened once: the JS SDK sat three feature groups behind the
other four). So after any backend contract change:

```sh
# 1. in the backend repo
npm run openapi:build
npm run test:ci            # includes openapi:check + sdk:check

# 2. refresh the copy this repo generates from
copy <backend-repo>\openapi.json .\openapi.json

# 3. generate PHP / C# / Python / Go  (SDK_OUT_ROOT defaults to this repo)
node <backend-repo>\scripts\generate-sdks.js

# 4. generate JS
cd packages\sdk-js && npm run generate && npm test

# 5. verify every operation reached all five SDKs
cd ..\.. && node scripts\verify-sdk-coverage.cjs
```

`packages/sdk-js/scripts/generate.cjs` also accepts `OPENAPI_SRC=<path to
openapi.json>` (or `CMS_REPO_ROOT=<backend repo>`) to read the backend spec
directly and skip step 2; it prints a warning when the root copy is older than
the spec it was given.

Deliberately **not** in the public SDK: the `Users`, `Users - Auth`,
`Users - Invites`, `Auth`, `RBAC` and `AI Admin` tags, plus
`/reports/getTenantStatistics/{tenantId}` (an SDK consumer is already inside its
tenant). These lists are duplicated in the backend's `scripts/generate-sdks.js`,
in `packages/sdk-js/scripts/generate.cjs` and in
`scripts/verify-sdk-coverage.cjs` — change all three together.

## Pull requests

- Explain what example(s) changed.
- Include setup updates when commands change.
- Keep CI passing.
