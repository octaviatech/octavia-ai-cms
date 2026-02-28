import { octaviaSdk } from "../../../utils/octavia";

export default defineEventHandler(async (event) => {
  const id = getRouterParam(event, "id") || "";
  const body = await readBody(event);
  return await octaviaSdk.submitForm(id, body || {});
});

