// Guards the two things users actually write against: that both entry points
// resolve, and that the ESM default export is the CMS class rather than the
// module namespace. A CJS-only build passes require() and breaks every
// `import CMS from "@octaviatech/cms"`, which is what this file exists to catch.
import assert from "node:assert";
import { createRequire } from "node:module";

const require = createRequire(import.meta.url);

const FACADE = [
  "ai",
  "aiConversation",
  "article",
  "author",
  "category",
  "form",
  "formSubmission",
  "language",
  "report",
  "subcategory",
  "tag",
  "raw",
];

const METHODS = {
  article: ["getAll", "getById", "getBySlug", "search", "advanceSearch", "create", "update", "archive"],
  ai: ["summarize", "translate", "repurpose"],
  aiConversation: ["conversationStart", "conversationGenerate"],
  tag: ["create", "getAll", "search"],
  report: ["getStatistics", "contentOverview"],
};

function checkFacade(label, CMS) {
  assert.equal(typeof CMS, "function", `${label}: CMS must be a class`);
  assert.equal(typeof CMS.init, "function", `${label}: CMS.init missing`);

  const cms = CMS.init("test_key", { timeoutMs: 5000 });
  for (const key of FACADE) {
    assert.ok(key in cms, `${label}: missing facade resource "${key}"`);
  }
  for (const [resource, methods] of Object.entries(METHODS)) {
    for (const m of methods) {
      assert.equal(
        typeof cms[resource][m],
        "function",
        `${label}: cms.${resource}.${m} missing`
      );
    }
  }
  console.log(`${label}: ${FACADE.length} facade resources, documented methods OK`);
}

const esm = await import("@octaviatech/cms");
checkFacade("ESM", esm.default);
assert.ok(esm.ApiError, "ESM: ApiError named export missing");
assert.equal(typeof esm.createClient, "function", "ESM: createClient missing");
assert.ok(esm.OctaviaClient, "ESM: OctaviaClient named export missing");

const cjs = require("@octaviatech/cms");
checkFacade("CJS", cjs.CMS ?? cjs.default ?? cjs);
assert.ok(cjs.ApiError, "CJS: ApiError missing");
assert.equal(typeof cjs.createClient, "function", "CJS: createClient missing");

console.log("Both entry points resolve and expose the same facade");
