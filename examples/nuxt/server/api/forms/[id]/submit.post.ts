import { octaviaSdk } from "../../../utils/octavia";

export default defineEventHandler(async (event) => {
  const id = getRouterParam(event, "id") || "";
  const body = await readBody(event);
  // `{ language, values }` is the idSubmit body; `values` carries the fields.
  const { language, values } = body || {};
  return await octaviaSdk.submitForm(id, values || {}, language || "en");
});
