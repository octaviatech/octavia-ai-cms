import { octaviaSdk } from "../../utils/octavia";

export default defineEventHandler(async (event) => {
  const id = getRouterParam(event, "id");
  if (!id) {
    throw createError({ statusCode: 400, statusMessage: "A form id is required." });
  }
  return await octaviaSdk.getForm(id);
});
