// scripts/list-untyped-sdk-methods.cjs
//
// Lists the methods whose generated payload is still the SDK escape hatch
// (`any` / `JsonElement` / `mixed` / `unknown`) instead of a named schema, so
// the remaining sdk:check "untyped" count can be reviewed by hand.
//
//   node scripts/list-untyped-sdk-methods.cjs

const fs = require("fs");
const path = require("path");

const root = path.resolve(__dirname, "..");

const TARGETS = [
  {
    lang: "go",
    dir: "packages/sdk-go/sdk",
    files: null, // every .go except client/cms/models
    re: /func \(r \*\w+Resource\) (\w+)\([^)]*\)\s+CMSResponse\[any\]\s*\{\s*\n\s*return RequestInto\[any\]\(r\.client,\s*"(\w+)",\s*"([^"]+)"/g,
    label: (m) => `${m[2]} ${m[3]}  (${m[1]})`,
  },
  {
    lang: "js",
    dir: "packages/sdk-js/src/resources",
    files: null,
    re: /(\w+)\([^)]*\): Promise<Ops\.\w+> \{\s*\n\s*return this\.client\.request<unknown>\("(\w+)",\s*`([^`]+)`/g,
    label: (m) => `${m[2]} ${m[3]}  (${m[1]})`,
  },
];

for (const target of TARGETS) {
  const dir = path.join(root, target.dir);
  const rows = [];
  for (const file of fs.readdirSync(dir)) {
    if (!file.endsWith(".go") && !file.endsWith(".ts")) continue;
    if (/^(client|cms|models|index|registry)\./.test(file)) continue;
    const src = fs.readFileSync(path.join(dir, file), "utf8");
    target.re.lastIndex = 0;
    let m;
    while ((m = target.re.exec(src))) rows.push(`${file}: ${target.label(m)}`);
  }
  console.log(`\n=== ${target.lang}: ${rows.length} method(s) with an untyped payload`);
  for (const row of rows) console.log("  - " + row);
}
