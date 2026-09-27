// The sources are generated with extensionless relative imports, which tsc
// passes through verbatim — correct for bundlers, but Node's ESM loader needs
// the extension. Rewrite the emitted ESM output only, so the generator keeps
// producing the same sources.
import fs from "node:fs";
import path from "node:path";

const dir = path.resolve("dist/esm");

function collect(d, acc = []) {
  for (const e of fs.readdirSync(d, { withFileTypes: true })) {
    const p = path.join(d, e.name);
    if (e.isDirectory()) collect(p, acc);
    else if (e.name.endsWith(".js")) acc.push(p);
  }
  return acc;
}

const files = collect(dir);
let rewritten = 0;

for (const file of files) {
  const src = fs.readFileSync(file, "utf8");
  const out = src.replace(
    /((?:^|[\s;{}()=])(?:import|export)\s[^'"]*?from\s*|(?:^|[\s;{}()=])import\s*)(["'])(\.\.?\/[^"']*)\2/g,
    (m, lead, q, spec) => {
      if (/\.(js|mjs|cjs|json)$/.test(spec)) return m;
      rewritten++;
      const abs = path.resolve(path.dirname(file), spec);
      const isDir = fs.existsSync(abs) && fs.statSync(abs).isDirectory();
      const withExt = isDir ? spec + "/index.js" : spec + ".js";
      return lead + q + withExt + q;
    }
  );
  if (out !== src) fs.writeFileSync(file, out);
}

console.log(`added explicit extensions to ${rewritten} import(s) in ${files.length} file(s)`);
