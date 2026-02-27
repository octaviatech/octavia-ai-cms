export default defineEventHandler(async (event) => {
  const { octaviaSdk } = await import("../../utils/octavia");
  const id = getRouterParam(event, 'id');
  return await octaviaSdk.publish(id || "");
});
