const assert = require("assert");
const { createClient, ApiError } = require("../dist/cjs/index.cjs");

function mockFetch(handler) {
  global.fetch = async (url, init) => handler(url, init);
}

async function run() {
  // 1) Constructor requires apiKey/baseUrl
  assert.throws(() => createClient({ baseUrl: "" , apiKey: "k" }), /baseUrl is required/);
  assert.throws(() => createClient({ baseUrl: "https://example.com", apiKey: "" }), /apiKey is required/);

  // 2) Headers are sent correctly
  let captured;
  mockFetch(async (url, init) => {
    captured = { url, init };
    return {
      ok: true,
      status: 200,
      headers: new Headers({ "content-type": "application/json" }),
      json: async () => ({ success: true }),
    };
  });

  const client = createClient({
    baseUrl: "https://api.example.com",
    apiKey: "test_key",
  });

  await client.health();
  assert.strictEqual(captured.url, "https://api.example.com/healthz");
  assert.strictEqual(captured.init.method, "GET");
  assert.strictEqual(captured.init.headers["x-api-key"], "test_key");
  // The gateway derives tenant and service state from the key, so the SDK must
  // not let a caller send them.
  assert.ok(!("x-tenant-id" in captured.init.headers));
  assert.ok(!("x-user-id" in captured.init.headers));
  assert.ok(!("x-service-status" in captured.init.headers));

  // 3) Query params encoding
  mockFetch(async (url, init) => {
    captured = { url, init };
    return {
      ok: true,
      status: 200,
      headers: new Headers({ "content-type": "application/json" }),
      json: async () => ({ success: true }),
    };
  });

  await client.articles.getAll({ query: { page: 2, keyword: "hello world" } });
  assert.ok(captured.url.includes("/articles/getAll"));
  assert.ok(captured.url.includes("page=2"));
  assert.ok(
    captured.url.includes("keyword=hello%20world") ||
      captured.url.includes("keyword=hello+world")
  );

  // 4) ApiError on non-2xx
  mockFetch(async () => ({
    ok: false,
    status: 401,
    headers: new Headers({ "content-type": "application/json" }),
    json: async () => ({ message: "Unauthorized" }),
  }));

  const client2 = createClient({
    baseUrl: "https://api.example.com",
    apiKey: "test_key",
  });

  let thrown = false;
  try {
    await client2.health();
  } catch (err) {
    thrown = true;
    assert.ok(err instanceof ApiError);
    assert.strictEqual(err.status, 401);
    assert.strictEqual(err.message, "Unauthorized");
  }
  assert.ok(thrown, "Expected ApiError to be thrown");

  console.log("SDK basic tests passed");
}

run().catch((err) => {
  console.error(err);
  process.exit(1);
});
