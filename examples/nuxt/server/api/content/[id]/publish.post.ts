export default defineEventHandler(async (event) => {
  const config = useRuntimeConfig();
  const id = getRouterParam(event, 'id');
  return await $fetch(`/v1/cms/content/${id}/publish`, { method: 'POST', baseURL: config.octaviaApiBaseUrl, headers: { Authorization: `Bearer ${config.octaviaApiKey}`, 'x-octavia-project-id': config.octaviaProjectId } });
});
