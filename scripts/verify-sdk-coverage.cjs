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
const pascal = (s) => camel(s).replace(/^(.)/, (m) => m.toUpperCase());
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
if (!problems.length) {
  console.log("OK — all five SDKs cover every non-excluded operation");
  process.exit(0);
}
for (const lang of problems) {
  console.log("\n" + lang + ": " + report[lang].length + " missing");
  for (const line of report[lang].slice(0, 40)) console.log("  - " + line);
  if (report[lang].length > 40) {
    console.log("  … and " + (report[lang].length - 40) + " more");
  }
}
process.exit(1);