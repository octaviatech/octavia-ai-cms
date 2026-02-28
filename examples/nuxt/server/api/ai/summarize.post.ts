import { octaviaSdk } from "../../utils/octavia";

export default defineEventHandler(async (event) => {
  const body = await readBody(event);
  const text = String(body?.text || "");
  return await octaviaSdk.summarize(text);
});

