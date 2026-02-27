export default defineNuxtConfig({
  devtools: { enabled: false },
  typescript: { strict: true },
  runtimeConfig: {
    octaviaApiBaseUrl: process.env.OCTAVIA_API_BASE_URL,
    octaviaApiKey: process.env.OCTAVIA_API_KEY,
    octaviaProjectId: process.env.OCTAVIA_PROJECT_ID
  }
});
