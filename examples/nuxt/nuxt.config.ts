export default defineNuxtConfig({
  devtools: { enabled: false },
  modules: ["@nuxtjs/tailwindcss"],
  typescript: { strict: true },
  // Server-only. `octaviaApiKey` is read exclusively from server/ code — the
  // SDK sends it as the single `x-api-key` header, and the gateway derives the
  // tenant from it. Nothing else needs to be sent.
  runtimeConfig: {
    octaviaApiKey: "",
    octaviaCategoryId: "",
    octaviaAuthorId: "",
  },
});
