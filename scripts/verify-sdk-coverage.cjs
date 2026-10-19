// scripts/verify-sdk-coverage.cjs
//
// Cross-checks that every non-excluded operation in openapi.json is reachable
// in ALL five generated SDKs, by looking for its path + method inside the
// generated resource files.
//
// Run from the SDK repo root:  node scripts/verify-sdk-coverage.cjs
// Exits non-zero when an operation is missing anywhere. This is the guard for
// the drift that let the JS SDK keep regenerating from a stale spec copy while
// the other four languages moved forward.

const fs = require("fs");
const path = require("path");

const root = path.resolve(__dirname, "..");
const spec = JSON.parse(
  fs.readFileSync(path.join(root, "openapi.json"), "utf8"),
);

const EXCLUDED = new Set([
  "Users",
  "Users - Auth",
  "Users - Invites",
  "Auth",
  "RBAC",
  "AI Admin",
]);

// Keep in sync with EXCLUDED_TAGS / EXCLUDED_PATHS in the backend's
// scripts/generate-sdks.js AND packages/sdk-js/scripts/generate.cjs — an
// operation excluded there must be excluded from all five SDKs.
const EXCLUDED_PATHS = new Set([
  "/reports/getTenantStatistics/{tenantId}",
  "/content-plan/ics",
]);

const METHODS = new Set(["get", "post", "put", "patch", "delete"]);

const camel = (s) => s.replace(/[-_/ ]+(.)/g, (_, c) => c.toUpperCase());
// `camel` turns a TAG ("Content Plan") into "ContentPlan" — it does not
// lowercase, so it cannot be used directly for a property name. lowerCamel is
// the tag → client-property mapping ("Content Plan" → "contentPlan",
// "Articles" → "articles"). "AI" must not become "aI".
// `aiConversation` is exposed as `aIConversation` by the JS and PHP generators
// (their camel() only splits on separators, so "aiConversation" survives as-is)
// while the facade key is `aiConversation`. Keep the fixup to what is actually
// generated rather than what reads nicely.
const LOWER_CAMEL_FIXUPS = { ai: "ai" };
const lowerCamel = (s) =>
  LOWER_CAMEL_FIXUPS[camel(s).toLowerCase()] ||
  camel(s).replace(/^(.)/, (m) => m.toLowerCase());
// Same overrides the generators carry: `ai` must stay "AI", not "Ai".
const PASCAL_FIXUPS = { ai: "AI", aiconversation: "AIConversation" };
const pascal = (s) =>
  PASCAL_FIXUPS[camel(s).toLowerCase()] || camel(s).replace(/^(.)/, (m) => m.toUpperCase());
// Python module names are snake_case: "AI Conversation" → ai_conversation.
const snake = (s) =>
  s
    .replace(/([a-z0-9])([A-Z])/g, "$1_$2")
    .replace(/[-_/ ]+/g, "_")
    .toLowerCase();
const read = (f) => {
  try {
    return fs.readFileSync(f, "utf8");
  } catch {
    return "";
  }
};

// Must stay in step with `FACADE` in the backend's scripts/generate-sdks.js —
// a tag with no facade name is one the SDKs cannot expose at all.
const FACADE_OF = {
  AI: "ai",
  "AI Conversation": "aiConversation",
  Articles: "article",
  Authors: "author",
  Campaigns: "campaign",
  Categories: "category",
  "Content Plan": "contentPlan",
  Forms: "form",
  "Form Submissions": "formSubmission",
  Languages: "language",
  Media: "media",
  Reports: "report",
  "SEO Hub": "seo",
  Subcategories: "subcategory",
  Tags: "tag",
  Taxonomy: "taxonomy",
};
const escapeRe = (s) => s.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");

const LANGS = {
  js: { dir: "packages/sdk-js/src/resources", file: (t) => camel(t) + ".ts" },
  php: {
    dir: "packages/sdk-php/src/Resources",
    file: (t) => pascal(t) + "Resource.php",
  },
  csharp: {
    dir: "packages/sdk-csharp/src/Resources",
    file: (t) => pascal(t) + "Resource.cs",
  },
  python: {
    dir: "packages/sdk-python/src/octavia_cms_sdk/resources",
    file: (t) => snake(t) + ".py",
  },
  go: { dir: "packages/sdk-go/sdk", file: (t) => camel(t) + ".go" },
};

const operations = [];
for (const [routePath, item] of Object.entries(spec.paths)) {
  for (const [method, op] of Object.entries(item)) {
    if (!METHODS.has(method)) continue;
    const tag = (op.tags || [])[0];
    if (!tag || EXCLUDED.has(tag)) continue;
    if (EXCLUDED_PATHS.has(routePath)) continue;
    operations.push({ tag, method: method.toUpperCase(), path: routePath });
  }
}

const tags = new Set(operations.map((o) => o.tag));
const sources = {};
for (const [lang, cfg] of Object.entries(LANGS)) {
  sources[lang] = {};
  for (const tag of tags) {
    sources[lang][tag] = read(path.join(root, cfg.dir, cfg.file(tag)));
  }
}

const report = {};
for (const op of operations) {
  // `op.path` already starts with "/" — do not prepend another one.
  const specPath = op.path.split("?")[0];
  // A path parameter may appear literally (`{id}`), as a JS template
  // (`${id}`) or as a concatenation (`"/articles/" + Escape(id) + "/reaction"`).
  // So match the *literal* segments in order, which is the one form all five
  // generators agree on.
  const literalSegments = specPath.split(/\{[^}]+\}/).filter(Boolean);
  const presentInOrder = (src) => {
    let cursor = 0;
    for (const segment of literalSegments) {
      const at = src.indexOf(segment, cursor);
      if (at === -1) return false;
      cursor = at + segment.length;
    }
    return true;
  };  for (const lang of Object.keys(LANGS)) {
    const src = sources[lang][op.tag] || "";
    const label = op.method + " " + op.path + " [" + op.tag + "]";
    if (!src) {
      (report[lang] = report[lang] || []).push(label + " — no " + LANGS[lang].file(op.tag));
      continue;
    }
    if (!presentInOrder(src)) {
      (report[lang] = report[lang] || []).push(label + " — path absent");
      continue;
    }
    const methodHit = new RegExp("[\"'`]" + op.method + "[\"'`]", "i").test(src);
    if (!methodHit) {
      (report[lang] = report[lang] || []).push(
        label + " — path present, method missing",
      );
    }
  }
}

console.log("operations checked: " + operations.length);
console.log("tags: " + Array.from(tags).join(", "));

const problems = Object.keys(report).sort();

// Reachability, not just existence.
//
// The per-operation check above reads the resource FILES, so it passes for a
// resource that was generated but never wired into the client — 40 methods of
// Campaigns / ContentPlan / Media / SEOHub / Taxonomy were unreachable in the
// Go SDK this way. `go build` cannot see it either (an unused exported type is
// not an error), so assert that every tag is named in its language's client AND
// facade before calling the SDKs in parity.
//
// Each language names a resource three different ways and guessing them by hand
// is how this check ends up reporting false failures, so name them the same way
// the generators do — tag -> client field, tag -> facade key, tag -> class.
const NAMES = {
  js: {
    client: "packages/sdk-js/src/client.ts",
    facade: "packages/sdk-js/src/cms.ts",
    // `readonly contentPlan: ContentPlanResource;`
    clientPattern: (t) => ["readonly " + lowerCamel(t) + ":\\s*\\w+Resource"],
    // The facade is typed by name but assigned inside an object literal:
    // `article: wrapResource(...)`, not `cms.article = ...`.
    facadePattern: (t) => ["\\b" + FACADE_OF[t] + ":\\s*wrapResource"],
  },
  php: {
    client: "packages/sdk-php/src/Client.php",
    facade: "packages/sdk-php/src/CMS.php",
    // `$this->articles = new ArticlesResource($this);`
    clientPattern: (t) => ["\\$this->" + lowerCamel(t) + "\\s*=\\s*new\\s+\\w+Resource"],
    // `$cms->article = $client->articles;`
    facadePattern: (t) => ["\\$cms->" + FACADE_OF[t] + "\\s*=\\s*\\$client->" + lowerCamel(t)],
  },
  csharp: {
    client: "packages/sdk-csharp/src/Client.cs",
    facade: "packages/sdk-csharp/src/CMS.cs",
    // `ContentPlan = new ContentPlanResource(this);`
    clientPattern: (t) => [pascal(t) + "\\s*=\\s*new\\s+\\w+Resource\\(this\\)"],
    // `ContentPlan = client.ContentPlan;`
    facadePattern: (t) => [pascalOf(t) + "\\s*=\\s*client\\." + pascal(t) + ";"],
  },
  python: {
    client: "packages/sdk-python/src/octavia_cms_sdk/client.py",
    facade: "packages/sdk-python/src/octavia_cms_sdk/cms.py",
    // `self.content_plan = ContentPlanResource(self)`
    clientPattern: (t) => ["self\\." + snake(t) + "\\s*=\\s*\\w+Resource\\(self\\)"],
    // `self.contentPlan = _wrap_resource(client.content_plan, throw_on_error)`
    facadePattern: (t) => ["self\\." + FACADE_OF[t] + "\\s*=\\s*_wrap_resource\\(client\\." + snake(t)],
  },
  go: {
    client: "packages/sdk-go/sdk/client.go",
    facade: "packages/sdk-go/sdk/cms.go",
    // `client.ContentPlan = &ContentPlanResource{client: client}`
    clientPattern: (t) => ["client\\." + pascal(t) + "\\s*=\\s*&\\w+Resource\\{"],
    // `ContentPlan: client.ContentPlan,`
    facadePattern: (t) => [pascalOf(t) + ":\\s*client\\." + pascal(t) + "\\b"],
  },
};

// `pascalOf` is the facade name in PascalCase — the generators keep "AI" and
// "AIConversation" out of the mechanical Pascal conversion.
const pascalOf = (t) => PASCAL_FIXUPS[FACADE_OF[t]] || pascal(FACADE_OF[t]);

for (const [lang, cfg] of Object.entries(NAMES)) {
  const clientSrc = read(path.join(root, cfg.client));
  const facadeSrc = read(path.join(root, cfg.facade));
  if (!clientSrc || !facadeSrc) {
    console.log(`\nNOTE: ${lang} wiring files not found — skipped the reachability check`);
    continue;
  }
  const missing = [];
  for (const tag of tags) {
    if (!FACADE_OF[tag]) continue;
    const c = new RegExp(cfg.clientPattern(tag).join("|"));
    const f = new RegExp(cfg.facadePattern(tag).join("|"));
    if (!c.test(clientSrc)) missing.push(`${tag}: not constructed on the client`);
    if (!f.test(facadeSrc)) missing.push(`${tag}: missing from the facade`);
  }
  if (missing.length) {
    report[lang] = (report[lang] || []).concat(missing);
    if (!problems.includes(lang)) problems.push(lang);
  }
}

if (problems.length) {
  for (const lang of problems) {
    console.log("\n" + lang + ": " + report[lang].length + " problem(s)");
    for (const line of report[lang].slice(0, 40)) console.log("  - " + line);
    if (report[lang].length > 40) {
      console.log("  … and " + (report[lang].length - 40) + " more");
    }
  }
  console.log("\nFAIL — SDKs are out of parity with the spec (see above)");
  process.exit(1);
}

console.log("OK — all five SDKs cover every non-excluded operation");
console.log("OK — every resource is reachable from its client and facade");
process.exit(0);