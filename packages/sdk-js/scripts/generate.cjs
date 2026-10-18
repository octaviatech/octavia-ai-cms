const fs = require('fs');
const path = require('path');

const repoRoot = path.resolve(__dirname, '../..', '..');
// SDK_OUT_ROOT points at the public SKD repo's packages dir (see
// scripts/generate-sdks.js); defaults to this repo's packages/ checkout.
const packagesRoot = process.env.SDK_OUT_ROOT
  ? path.resolve(process.env.SDK_OUT_ROOT)
  : path.join(repoRoot, 'packages');
// The spec INPUT is the backend repo's `openapi.json` (the single source of
// truth, rebuilt with `npm run openapi:build`). This repo keeps a COPY at its
// root for the published-spec link — reading that copy silently regenerates
// stale code whenever the copy lags behind, which is exactly what happened
// through Phase 3. So:
//   1. OPENAPI_SRC (or CMS_REPO_ROOT) wins when set;
//   2. otherwise the root copy is used, but only if it is NOT older than the
//      backend spec we can find;
//   3. a mismatch is reported loudly instead of being ignored.
const rootCopy = path.join(repoRoot, 'openapi.json');
const backendSpec = process.env.OPENAPI_SRC
  ? path.resolve(process.env.OPENAPI_SRC)
  : process.env.CMS_REPO_ROOT
    ? path.join(path.resolve(process.env.CMS_REPO_ROOT), 'openapi.json')
    : null;

const exists = (p) => {
  try {
    return fs.existsSync(p);
  } catch {
    return false;
  }
};

let openapiPath = rootCopy;
if (backendSpec && exists(backendSpec)) {
  openapiPath = backendSpec;
  if (exists(rootCopy) && fs.statSync(rootCopy).mtimeMs < fs.statSync(backendSpec).mtimeMs) {
    console.warn(
      '[sdk-js] WARNING: the openapi.json copy at the SDK repo root is older than ' +
      `${backendSpec}.\n[sdk-js] Generating from the newer backend spec, but refresh the ` +
      'published copy before releasing:\n' +
      `          copy "${backendSpec}" "${rootCopy}"`,
    );
  }
} else if (!exists(rootCopy)) {
  console.error(
    '[sdk-js] no openapi.json found.\n' +
      'Set OPENAPI_SRC=<backend repo>/openapi.json (or CMS_REPO_ROOT=<backend repo>) ' +
      'and run `npm run openapi:build` there first.',
  );
  process.exit(1);
}

const outResourcesDir = path.join(packagesRoot, 'sdk-js/src/resources');
const outGeneratedDir = path.join(packagesRoot, 'sdk-js/src/generated');

const op = JSON.parse(fs.readFileSync(openapiPath, 'utf8'));

const httpMethods = new Set(['get', 'post', 'put', 'patch', 'delete']);

const toPascal = (s) => s
  .replace(/[^a-zA-Z0-9]+/g, ' ')
  .split(' ')
  .filter(Boolean)
  .map(w => w[0].toUpperCase() + w.slice(1))
  .join('');

const toCamel = (s) => {
  if (s.toUpperCase() === s) return s.toLowerCase();
  const p = toPascal(s);
  return p ? p[0].toLowerCase() + p.slice(1) : p;
};

const pathToMethodName = (pathStr) => {
  const segments = pathStr.split('/').filter(Boolean);
  const rest = segments.slice(1); // drop resource segment
  const out = [];
  for (let i = 0; i < rest.length; i++) {
    const seg = rest[i];
    const m = seg.match(/^\{(.+)\}$/);
    if (m) {
      const param = m[1];
      const prev = out[out.length - 1] || '';
      if (!prev.toLowerCase().includes(param.toLowerCase())) {
        out.push(param);
      }
    } else {
      out.push(seg);
    }
  }
  return toCamel(out.join(' '));
};

// A path can carry several methods (GET + PUT on the same URL), which would
// otherwise collapse into one identifier. Qualify with the method in that case.
const methodNameFor = (pathStr, method, seenOnPath) => {
  const base = pathToMethodName(pathStr);
  if (!base) return method.toLowerCase();
  if (!seenOnPath.has(pathStr)) return base;
  return toCamel(`${base} ${method}`);
};

const resolveRefName = (ref) => {
  const m = ref.match(/^#\/components\/schemas\/(.+)$/);
  return m ? m[1] : null;
};

const schemaToTs = (schema, opts = {}) => {
  const refPrefix = opts.refPrefix || '';
  if (!schema) return 'unknown';
  if (schema.$ref) {
    const name = resolveRefName(schema.$ref);
    return name ? `${refPrefix}${name}` : 'unknown';
  }
  if (schema.oneOf) {
    return schema.oneOf.map(s => schemaToTs(s, opts)).join(' | ');
  }
  if (schema.anyOf) {
    return schema.anyOf.map(s => schemaToTs(s, opts)).join(' | ');
  }
  if (schema.allOf) {
    return schema.allOf.map(s => schemaToTs(s, opts)).join(' & ');
  }

  const t = schema.type;
  if (!t) return 'unknown';

  if (t === 'string') {
    if (schema.enum) return schema.enum.map(v => JSON.stringify(v)).join(' | ');
    return 'string';
  }
  if (t === 'integer' || t === 'number') return 'number';
  if (t === 'boolean') return 'boolean';
  if (t === 'array') {
    const item = schemaToTs(schema.items || {}, opts);
    return `Array<${item}>`;
  }
  if (t === 'object') {
    const props = schema.properties || {};
    const required = new Set(schema.required || []);
    const lines = [];
    for (const [key, propSchema] of Object.entries(props)) {
      const optional = required.has(key) ? '' : '?';
      lines.push(`  ${key}${optional}: ${schemaToTs(propSchema, opts)};`);
    }

    let additional = schema.additionalProperties;
    if (additional === true) {
      lines.push('  [key: string]: unknown;');
    } else if (additional && typeof additional === 'object') {
      lines.push(`  [key: string]: ${schemaToTs(additional, opts)};`);
    }

    if (lines.length === 0) return 'Record<string, unknown>';
    return `{
${lines.join('\n')}
}`;
  }

  return 'unknown';
};

const inferTypeFromExample = (val) => {
  if (val === null) return 'null';
  const t = typeof val;
  if (t === 'string') return 'string';
  if (t === 'number') return 'number';
  if (t === 'boolean') return 'boolean';
  if (Array.isArray(val)) {
    if (val.length === 0) return 'unknown[]';
    const types = [...new Set(val.map(inferTypeFromExample))];
    const inner = types.length === 1 ? types[0] : types.map(x => `(${x})`).join(' | ');
    return `Array<${inner}>`;
  }
  if (t === 'object') {
    const lines = [];
    for (const [k, v] of Object.entries(val)) {
      lines.push(`  ${k}: ${inferTypeFromExample(v)};`);
    }
    if (!lines.length) return 'Record<string, unknown>';
    return `{
${lines.join('\n')}
}`;
  }
  return 'unknown';
};

const pickSuccessResponse = (responses) => {
  const codes = Object.keys(responses || {}).filter(c => /^2\d\d$/.test(c)).sort();
  if (codes.length) return responses[codes[0]];
  return null;
};

// Auth, RBAC and user-account surface is deliberately not part of the public SDK.
const EXCLUDED_TAGS = new Set(['Users', 'Users - Auth', 'Users - Invites', 'Auth', 'RBAC', 'AI Admin']);
// Tenant-scoped admin endpoints that take the tenant as a path parameter: an SDK
// consumer is already inside their tenant, so passing it again is redundant.
// MUST stay identical to EXCLUDED_PATHS in the backend's scripts/generate-sdks.js
// — the four other generators already honour it and this one did not, so the JS
// SDK alone exposed `getTenantStatistics` until Phase 3 caught it.
const EXCLUDED_PATHS = new Set(['/reports/getTenantStatistics/{tenantId}']);

const operations = [];
const multiMethodPaths = new Set();
for (const [p, methods] of Object.entries(op.paths)) {
  const verbs = Object.keys(methods).filter(m => httpMethods.has(m));
  if (verbs.length > 1) multiMethodPaths.add(p);
  for (const [method, def] of Object.entries(methods)) {
    if (!httpMethods.has(method)) continue;
    const tag = (def.tags && def.tags[0]) || 'default';
    if (EXCLUDED_TAGS.has(tag)) continue;
    if (EXCLUDED_PATHS.has(p)) continue;
    const params = (def.parameters || []).filter(x => x && x.in === 'path');
    const queryParams = (def.parameters || []).filter(x => x && x.in === 'query');
    const hasBody = Boolean(def.requestBody);
    operations.push({
      path: p,
      method: method.toUpperCase(),
      tag,
      params,
      queryParams,
      hasBody,
      def,
    });
  }
}

fs.mkdirSync(outResourcesDir, { recursive: true });
fs.mkdirSync(outGeneratedDir, { recursive: true });

// Generate component schemas
const schemaLines = [];
schemaLines.push('// Auto-generated from openapi.json');
const components = (op.components && op.components.schemas) || {};
for (const [name, schema] of Object.entries(components)) {
  schemaLines.push(`export type ${name} = ${schemaToTs(schema)};`);
  schemaLines.push('');
}
fs.writeFileSync(path.join(outGeneratedDir, 'schemas.ts'), schemaLines.join('\n'));

// Generate operation types
const opLines = [];
opLines.push('// Auto-generated from openapi.json');
opLines.push('import type * as Schemas from "./schemas";');
opLines.push('');

const toTypeName = (tag, methodName) => toPascal(`${tag} ${methodName}`);

for (const opItem of operations) {
  const methodName = methodNameFor(opItem.path, opItem.method, multiMethodPaths);
  const base = toTypeName(opItem.tag, methodName);

  // Path params type
  if (opItem.params.length) {
    const lines = opItem.params.map(p => {
      const t = schemaToTs(p.schema || {}, { refPrefix: 'Schemas.' });
      const optional = p.required ? '' : '?';
      return `  ${p.name}${optional}: ${t};`;
    });
    opLines.push(`export type ${base}Path = {`);
    opLines.push(lines.join('\n'));
    opLines.push('};');
    opLines.push('');
  } else {
    opLines.push(`export type ${base}Path = {};`);
    opLines.push('');
  }

  // Query params type
  if (opItem.queryParams.length) {
    const lines = opItem.queryParams.map(p => {
      const t = schemaToTs(p.schema || {}, { refPrefix: 'Schemas.' });
      const optional = p.required ? '' : '?';
      return `  ${p.name}${optional}: ${t};`;
    });
    opLines.push(`export type ${base}Query = {`);
    opLines.push(lines.join('\n'));
    opLines.push('};');
    opLines.push('');
  } else {
    opLines.push(`export type ${base}Query = {};`);
    opLines.push('');
  }

  // Body type
  if (opItem.hasBody) {
    const content = opItem.def.requestBody?.content || {};
    const json = content['application/json'] || {};
    const schema = json.schema;
    const bodyType = schemaToTs(schema, { refPrefix: 'Schemas.' });
    opLines.push(`export type ${base}Body = ${bodyType};`);
    opLines.push('');
  } else {
    opLines.push(`export type ${base}Body = undefined;`);
    opLines.push('');
  }

  // Response type
  const resp = pickSuccessResponse(opItem.def.responses || {});
  let respType = 'unknown';
  if (resp && resp.content && resp.content['application/json']) {
    const json = resp.content['application/json'];
    if (json.schema) respType = schemaToTs(json.schema, { refPrefix: 'Schemas.' });
    else if (json.example) respType = inferTypeFromExample(json.example);
  }
  opLines.push(`export type ${base}Response = ${respType};`);
  opLines.push('');
}

fs.writeFileSync(path.join(outGeneratedDir, 'operations.ts'), opLines.join('\n'));

// Generate resources
const byTag = new Map();
for (const opItem of operations) {
  if (!byTag.has(opItem.tag)) byTag.set(opItem.tag, []);
  byTag.get(opItem.tag).push(opItem);
}

const indexExports = [];
const resourceNames = [];
const keep = new Set(['index.ts', 'registry.ts']);

for (const [tag, ops] of byTag.entries()) {
  const className = `${toPascal(tag)}Resource`;
  const fileName = `${toCamel(tag)}.ts`;
  keep.add(fileName);
  resourceNames.push({ tag, className, fileName });

  const lines = [];
  lines.push('import { OctaviaClient } from "../client";');
  lines.push('import { RequestOptions } from "../types";');
  lines.push('import type * as Ops from "../generated/operations";');
  lines.push('');
  lines.push(`export class ${className} {`);
  lines.push('  private client: OctaviaClient;');
  lines.push('');
  lines.push('  constructor(client: OctaviaClient) {');
  lines.push('    this.client = client;');
  lines.push('  }');
  lines.push('');

  for (const opItem of ops) {
    const methodName = methodNameFor(opItem.path, opItem.method, multiMethodPaths);
    const base = toTypeName(opItem.tag, methodName);
    const params = opItem.params.map(p => p.name);

    const pathExpr = opItem.path.replace(/\{([^}]+)\}/g, (_, n) => `\${encodeURIComponent(${n})}`);

    let signature = '';
    let callOptions = 'options';
    let optsType = `RequestOptions<Ops.${base}Query>`;

    if (params.length && opItem.hasBody) {
      const typedParams = params.map(n => `${n}: Ops.${base}Path["${n}"]`).join(', ');
      signature = `${methodName}(${typedParams}, body: Ops.${base}Body, options?: ${optsType})`;
      callOptions = '{ ...(options || {}), body }';
    } else if (params.length) {
      const typedParams = params.map(n => `${n}: Ops.${base}Path["${n}"]`).join(', ');
      signature = `${methodName}(${typedParams}, options?: ${optsType})`;
    } else if (opItem.hasBody) {
      signature = `${methodName}(body: Ops.${base}Body, options?: ${optsType})`;
      callOptions = '{ ...(options || {}), body }';
    } else {
      signature = `${methodName}(options?: ${optsType})`;
    }

    lines.push(`  ${signature}: Promise<Ops.${base}Response> {`);
    lines.push(`    return this.client.request<Ops.${base}Response>("${opItem.method}", \`${pathExpr}\`, ${callOptions});`);
    lines.push('  }');
    lines.push('');
  }

  lines.push('}');
  lines.push('');

  fs.writeFileSync(path.join(outResourcesDir, fileName), lines.join('\n'));
  indexExports.push(`export { ${className} } from "./${fileName.replace('.ts','')}";`);
}

fs.writeFileSync(path.join(outResourcesDir, 'index.ts'), indexExports.join('\n') + '\n');

// The generator only overwrites what it emits, so a resource whose tag dropped out
// of the spec would linger forever. Prune anything the current run didn't produce.
for (const f of fs.readdirSync(outResourcesDir)) {
  if (!f.endsWith('.ts') || keep.has(f)) continue;
  fs.unlinkSync(path.join(outResourcesDir, f));
  console.log(`  pruned ${f}`);
}

const registryLines = [];
registryLines.push('export const resourceRegistry = {');
for (const r of resourceNames) {
  registryLines.push(`  ${toCamel(r.tag)}: "${r.className}",`);
}
registryLines.push('} as const;');
registryLines.push('');
fs.writeFileSync(path.join(outResourcesDir, 'registry.ts'), registryLines.join('\n'));

// The entry points are hand-written, so a resource added to the spec later gets a
// file but no way to reach it. Keep their resource lists in sync with the spec.
//
// This map must stay identical to the FACADE map in scripts/generate-sdks.js.
// It previously fell one entry short ('AI' was missing) and special-cased `ai`
// inline in the emitted block, which made the completeness check below emit a
// spurious warning on every run and left the two generators able to disagree.
const FACADE = {
  'AI': 'ai', 'AI Conversation': 'aiConversation', 'Articles': 'article',
  'Authors': 'author', 'Categories': 'category', 'Form Submissions': 'formSubmission',
  'Forms': 'form', 'Languages': 'language',
  // Phase 3 / H + I — keep in sync with scripts/generate-sdks.js.
  'Taxonomy': 'taxonomy', 'Media': 'media',
  'Reports': 'report', 'Subcategories': 'subcategory', 'Tags': 'tag',
};
const unknownTags = resourceNames.filter((r) => !FACADE[r.tag]).map((r) => r.tag);
for (const tag of new Set(unknownTags)) console.log(`  WARN no facade name for tag "${tag}"`);

const cmsPath = path.join(outResourcesDir, '..', 'cms.ts');
if (fs.existsSync(cmsPath)) {
  let t = fs.readFileSync(cmsPath, 'utf8');
  const rest = resourceNames.filter((r) => FACADE[r.tag]);
  const typeBlock = rest.map((r) => `  ${FACADE[r.tag]}: WrappedResource<OctaviaClient["${toCamel(r.tag)}"]>;`).join('\n');
  const assignBlock = rest.map((r) => `      ${FACADE[r.tag]}: wrapResource(client.${toCamel(r.tag)}),`).join('\n');
  t = t.replace(/[ \t]*\/\/ @generated resources:begin[\s\S]*?\/\/ @generated resources:end/,
    () => `  // @generated resources:begin\n${typeBlock}\n  // @generated resources:end`);
  t = t.replace(/[ \t]*\/\/ @generated assign:begin[\s\S]*?\/\/ @generated assign:end/,
    () => `      // @generated assign:begin\n${assignBlock}\n      // @generated assign:end`);
  fs.writeFileSync(cmsPath, t);
  console.log('  patched src/cms.ts');
}

const clientPath = path.join(outResourcesDir, '..', 'client.ts');
if (fs.existsSync(clientPath)) {
  let t = fs.readFileSync(clientPath, 'utf8');
  const imports = resourceNames.map((r) => `  ${r.className},`).join('\n');
  const fields = resourceNames.map((r) => `  readonly ${toCamel(r.tag)}: ${r.className};`).join('\n');
  const ctor = resourceNames.map((r) => `    this.${toCamel(r.tag)} = new ${r.className}(this);`).join('\n');
  t = t.replace(/[ \t]*\/\/ @generated imports:begin[\s\S]*?\/\/ @generated imports:end/,
    () => `  // @generated imports:begin\n${imports}\n  // @generated imports:end`);
  t = t.replace(/[ \t]*\/\/ @generated fields:begin[\s\S]*?\/\/ @generated fields:end/,
    () => `  // @generated fields:begin\n${fields}\n  // @generated fields:end`);
  t = t.replace(/[ \t]*\/\/ @generated ctor:begin[\s\S]*?\/\/ @generated ctor:end/,
    () => `    // @generated ctor:begin\n${ctor}\n    // @generated ctor:end`);
  fs.writeFileSync(clientPath, t);
  console.log('  patched src/client.ts');
}

console.log(`Generated ${resourceNames.length} resources.`);
