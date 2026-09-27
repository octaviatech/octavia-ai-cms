// The package is "type": "module", so a .js file under dist/cjs would be
// parsed as ESM. Rename the CommonJS build to .cjs and rewrite the relative
// requires between its own files.
import fs from "node:fs";
import path from "node:path";

const dir = path.resolve("dist/cjs");

function collect(d, acc = []) {
  for (const e of fs.readdirSync(d, { withFileTypes: true })) {
    const p = path.join(d, e.name);
    if (e.isDirectory()) collect(p, acc);
    else if (e.name.endsWith(".js")) acc.push(p);
  }
  return acc;
}

const files = collect(dir);

for (const file of files) {
  const src = fs.readFileSync(file, "utf8");
  // e.g. require("./client") or require("./resources/ai")
  const out = src.replace(/require\((["'])(\.\.?\/[^"']*?)\1\)/g, (m, q, spec) => {
    if (spec.endsWith(".cjs")) return m;
    const abs = path.resolve(path.dirname(file), spec);
    const target =
      fs.existsSync(abs) && fs.statSync(abs).isDirectory() ? spec + "/index.cjs" : spec + ".cjs";
    return `require(${q}${target}${q})`;
  });
  const target = file.replace(/\.js$/, ".cjs");
  fs.writeFileSync(target, out);
  fs.unlinkSync(file);
}

// dist/cjs/index.cjs is the package entry; make sure it exists.
const entry = path.join(dir, "index.cjs");
if (!fs.existsSync(entry)) {
  throw new Error("dist/cjs/index.cjs was not produced");
}

console.log(`renamed ${files.length} CommonJS file(s) to .cjs`);
