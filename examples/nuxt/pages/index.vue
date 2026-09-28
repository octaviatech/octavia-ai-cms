<script setup lang="ts">
// This page never imports the SDK and never reads the API key — it only calls
// this app's own `/api` route handlers, which run server-side.
type Statistics = {
  articles?: number;
  forms?: number;
  submissions?: number;
  categories?: number;
  subCategories?: number;
  languages?: number;
  apiKeys?: number;
  admins?: number;
  ai_tokens?: number;
};

const stats = ref<Statistics | null>(null);
const error = ref("");

const loadStats = async () => {
  try {
    stats.value = await $fetch<Statistics>("/api/reports/statistics");
  } catch (e) {
    error.value = String(e);
  }
};

onMounted(() => {
  void loadStats();
});
</script>

<template>
  <main class="mx-auto max-w-3xl p-6">
    <h1 class="mb-4 text-3xl font-bold">Octavia CMS - Nuxt</h1>
    <p class="mb-6 text-slate-400">
      Three pages: this dashboard, the blog, and forms. The API key is read from
      runtimeConfig in server code only, so it never reaches the browser.
    </p>

    <p v-if="error" class="mb-4 rounded bg-red-900/40 p-3 text-red-300">{{ error }}</p>

    <section v-if="stats" class="mb-6 rounded border border-slate-800 bg-slate-900 p-4">
      <h2 class="mb-3 text-xl font-semibold">Statistics</h2>
      <dl class="grid grid-cols-2 gap-3 sm:grid-cols-3">
        <div
          v-for="(value, key) in {
            articles: stats.articles,
            forms: stats.forms,
            submissions: stats.submissions,
            categories: stats.categories,
            subCategories: stats.subCategories,
            languages: stats.languages,
            apiKeys: stats.apiKeys,
            admins: stats.admins,
            aiTokens: stats.ai_tokens,
          }"
          :key="key"
          class="rounded border border-slate-800 bg-slate-950 p-3"
        >
          <dt class="text-xs uppercase tracking-wide text-slate-400">{{ key }}</dt>
          <dd class="text-2xl font-semibold">{{ value ?? "—" }}</dd>
        </div>
      </dl>
      <button class="mt-4 rounded bg-slate-700 px-4 py-2" @click="loadStats">Refresh</button>
    </section>

    <div class="flex flex-wrap gap-3">
      <NuxtLink class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950" to="/blog">
        Go to Blog Page
      </NuxtLink>
      <NuxtLink class="rounded bg-slate-800 px-4 py-2 font-medium" to="/forms">
        Go to Form Page
      </NuxtLink>
    </div>
  </main>
</template>
