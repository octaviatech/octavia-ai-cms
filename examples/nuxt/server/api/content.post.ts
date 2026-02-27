export default defineEventHandler(async (event) => {
  const config = useRuntimeConfig();
  const body = await readBody(event);
  return await $fetch('/v1/cms/content', { method: 'POST', baseURL: config.octaviaApiBaseUrl, body, headers: { Authorization: `Bearer ${config.octaviaApiKey}`, 'x-octavia-project-id': config.octaviaProjectId } });
});
