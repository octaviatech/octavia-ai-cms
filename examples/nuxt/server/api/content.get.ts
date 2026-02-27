type Content = { id:string; title:string; body:string; locale:string; status:'draft'|'published'; createdAt:string };
export default defineEventHandler(async (): Promise<Content[]> => {
  const config = useRuntimeConfig();
  return await $fetch('/v1/cms/content', { baseURL: config.octaviaApiBaseUrl, headers: { Authorization: `Bearer ${config.octaviaApiKey}`, 'x-octavia-project-id': config.octaviaProjectId } });
});
