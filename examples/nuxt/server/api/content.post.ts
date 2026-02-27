export default defineEventHandler(async (event) => {
  const { octaviaSdk } = await import("../utils/octavia");
  const body = await readBody(event);
  return await octaviaSdk.create(body);
});
