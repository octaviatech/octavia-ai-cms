import { octaviaSdk } from "../../../utils/octavia";

export default defineEventHandler(async (event) => {
  const id = getRouterParam(event, "id") || "";
  return await octaviaSdk.publish(id);
});
