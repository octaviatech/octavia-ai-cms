import { octaviaSdk } from "../utils/octavia";

export default defineEventHandler(async (event) => {
  const body = await readBody(event);
  return await octaviaSdk.create({
    title: String(body?.title || ""),
    body: String(body?.body || ""),
    locale: body?.locale,
  });
});
