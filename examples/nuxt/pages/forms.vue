<script setup lang="ts">
type FormItem = {
  id: string;
  title: string;
  slug: string;
};

const forms = ref<FormItem[]>([]);
const formId = ref("");
const email = ref("");
const locale = ref("en");
const error = ref("");

const refresh = async () => {
  try {
    forms.value = await $fetch("/api/forms");
  } catch (e) {
    error.value = String(e);
  }
};

const submitForm = async () => {
  if (!formId.value || !email.value) {
    error.value = "Form ID and email are required.";
    return;
  }
  await $fetch(`/api/forms/${formId.value}/submit`, {
    method: "POST",
    body: { email: email.value, language: locale.value },
  });
  email.value = "";
};

onMounted(() => {
  void refresh();
});
</script>

<template>
  <main class="mx-auto max-w-5xl p-6">
    <div class="mb-6 flex items-center justify-between">
      <h1 class="text-3xl font-bold">Form Page</h1>
      <div class="flex gap-2">
        <NuxtLink class="rounded bg-slate-800 px-4 py-2" to="/blog">Blog Page</NuxtLink>
        <button class="rounded bg-slate-700 px-4 py-2" @click="refresh">Refresh</button>
      </div>
    </div>

    <p v-if="error" class="mb-4 rounded bg-red-900/40 p-3 text-red-300">{{ error }}</p>

    <section class="mb-6 rounded border border-slate-800 bg-slate-900 p-4">
      <h2 class="mb-3 text-xl font-semibold">Available Forms</h2>
      <ul class="space-y-2">
        <li v-for="f in forms" :key="f.id" class="rounded border border-slate-800 bg-slate-950 p-3">
          <p class="font-medium">{{ f.title || "(untitled form)" }}</p>
          <p class="text-xs text-slate-400">id: {{ f.id }}</p>
        </li>
      </ul>
    </section>

    <section class="rounded border border-slate-800 bg-slate-900 p-4">
      <h2 class="mb-3 text-xl font-semibold">Submit Form</h2>
      <div class="space-y-3">
        <input v-model="formId" class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2" placeholder="Form ID" />
        <input v-model="email" class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2" placeholder="Email" />
        <input
          v-model="locale"
          class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
          placeholder="Locale (en/fa)"
        />
        <button class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950" @click="submitForm">Submit</button>
      </div>
    </section>
  </main>
</template>

