<script setup lang="ts">
type Content = {
  id: string;
  title: string;
  body: string;
  locale: string;
  status: "draft" | "published";
  createdAt: string;
};

const items = ref<Content[]>([]);
const title = ref("");
const body = ref("");
const locale = ref("en");
const error = ref("");

const refresh = async () => {
  try {
    items.value = await $fetch("/api/content");
  } catch (e) {
    error.value = String(e);
  }
};

const create = async () => {
  if (!title.value || !body.value) {
    error.value = "Title and body are required.";
    return;
  }
  await $fetch("/api/content", {
    method: "POST",
    body: { title: title.value, body: body.value, locale: locale.value },
  });
  title.value = "";
  body.value = "";
  await refresh();
};

const publish = async (id: string) => {
  await $fetch(`/api/content/${id}/publish`, { method: "POST" });
  await refresh();
};

onMounted(() => {
  void refresh();
});
</script>

<template>
  <main class="mx-auto max-w-5xl p-6">
    <div class="mb-6 flex items-center justify-between">
      <h1 class="text-3xl font-bold">Blog Page</h1>
      <div class="flex gap-2">
        <NuxtLink class="rounded bg-slate-800 px-4 py-2" to="/forms">Form Page</NuxtLink>
        <button class="rounded bg-slate-700 px-4 py-2" @click="refresh">Refresh</button>
      </div>
    </div>

    <p v-if="error" class="mb-4 rounded bg-red-900/40 p-3 text-red-300">{{ error }}</p>

    <section class="mb-6 rounded border border-slate-800 bg-slate-900 p-4">
      <h2 class="mb-3 text-xl font-semibold">Create Article</h2>
      <div class="space-y-3">
        <input v-model="title" class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2" placeholder="Title" />
        <textarea v-model="body" class="h-36 w-full rounded border border-slate-700 bg-slate-950 px-3 py-2" placeholder="Body" />
        <input
          v-model="locale"
          class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
          placeholder="Locale (en/fa)"
        />
        <button class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950" @click="create">Create</button>
      </div>
    </section>

    <section class="rounded border border-slate-800 bg-slate-900 p-4">
      <h2 class="mb-3 text-xl font-semibold">Blog List</h2>
      <ul class="space-y-2">
        <li
          v-for="item in items"
          :key="item.id"
          class="flex items-center justify-between rounded border border-slate-800 bg-slate-950 p-3"
        >
          <div>
            <p class="font-medium">{{ item.title }}</p>
            <p class="text-sm text-slate-400">{{ item.locale }} · {{ item.status }}</p>
          </div>
          <button
            class="rounded bg-emerald-500 px-3 py-1 text-sm font-medium text-slate-950 disabled:opacity-50"
            :disabled="item.status === 'published'"
            @click="publish(item.id)"
          >
            Publish
          </button>
        </li>
      </ul>
    </section>
  </main>
</template>

