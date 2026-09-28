import { octaviaSdk } from "../../utils/octavia";

export default defineEventHandler(async (event) => {
  const body = await readBody(event);
  const text = String(body?.text || "");
  if (!text) {
    throw createError({ statusCode: 400, statusMessage: "text is required" });
  }
  return await octaviaSdk.summarize(text);
});
