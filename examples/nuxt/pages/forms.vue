<script setup lang="ts">
// The SDK and the API key stay on the server; this page calls only the
// `/api` route handlers below.
type FormItem = {
  id: string;
  title: string;
  slug: string;
  isActive: boolean;
  sections: number;
};

type Summary = {
  summary?: string;
  tokens?: { prompt?: number; completion?: number; total?: number };
};

const form = ref<FormItem | null>(null);
const formId = ref("");
const email = ref("");
const locale = ref("en");
const error = ref("");
const submitted = ref("");

const text = ref("");
const summary = ref<Summary | null>(null);
const summarizing = ref(false);

// `forms/getAll` only reports a submissions count, with no id or title, so the
// form is fetched by id once one is entered.
const loadForm = async (id: string) => {
  if (!id) {
    form.value = null;
    return;
  }
  try {
    form.value = await $fetch<FormItem>(`/api/forms/${id}`);
  } catch {
    form.value = null;
  }
};

watch(formId, (id) => void loadForm(id));

const submitForm = async () => {
  if (!formId.value || !email.value) {
    error.value = "Form ID and email are required.";
    return;
  }
  error.value = "";
  await $fetch(`/api/forms/${formId.value}/submit`, {
    method: "POST",
    // `idSubmit(formId, { language, values })` — the fields go inside `values`.
    body: { language: locale.value, values: { email: email.value } },
  });
  submitted.value = `Submitted to form ${formId.value} (${locale.value}).`;
  email.value = "";
};

const runSummarize = async () => {
  if (!text.value) {
    error.value = "Text is required to summarize.";
    return;
  }
  error.value = "";
  summarizing.value = true;
  try {
    summary.value = await $fetch<Summary>("/api/ai/summarize", {
      method: "POST",
      body: { text: text.value },
    });
  } catch (e) {
    error.value = String(e);
  } finally {
    summarizing.value = false;
  }
};
</script>

<template>
  <main class="mx-auto max-w-5xl p-6">
    <div class="mb-6 flex items-center justify-between">
      <h1 class="text-3xl font-bold">Form Page</h1>
      <div class="flex gap-2">
        <NuxtLink class="rounded bg-slate-800 px-4 py-2" to="/">Home</NuxtLink>
        <NuxtLink class="rounded bg-slate-800 px-4 py-2" to="/blog">Blog Page</NuxtLink>
      </div>
    </div>

    <p v-if="error" class="mb-4 rounded bg-red-900/40 p-3 text-red-300">{{ error }}</p>
    <p v-if="submitted" class="mb-4 rounded bg-emerald-900/40 p-3 text-emerald-300">{{ submitted }}</p>

    <section class="mb-6 rounded border border-slate-800 bg-slate-900 p-4">
      <h2 class="mb-3 text-xl font-semibold">Selected Form</h2>
      <div v-if="form" class="rounded border border-slate-800 bg-slate-950 p-3">
        <p class="font-medium">{{ form.title || "(untitled form)" }}</p>
        <p class="text-xs text-slate-400">
          id: {{ form.id }} · slug: {{ form.slug }} · {{ form.sections }} section(s)<span v-if="!form.isActive"> · inactive</span>
        </p>
      </div>
      <p v-else class="text-sm text-slate-400">Enter a form ID below to load it.</p>
    </section>

    <section class="mb-6 rounded border border-slate-800 bg-slate-900 p-4">
      <h2 class="mb-3 text-xl font-semibold">Submit Form</h2>
      <div class="space-y-3">
        <input v-model="formId" class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2" placeholder="Form ID" />
        <input v-model="email" class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2" placeholder="Email" />
        <input
          v-model="locale"
          class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
          placeholder="Language (en/es)"
        />
        <button class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950" @click="submitForm">Submit</button>
      </div>
    </section>

    <section class="rounded border border-slate-800 bg-slate-900 p-4">
      <h2 class="mb-3 text-xl font-semibold">AI Summarize</h2>
      <div class="space-y-3">
        <textarea
          v-model="text"
          class="h-36 w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
          placeholder="Paste text to summarize"
        />
        <button
          class="rounded bg-violet-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50"
          :disabled="summarizing"
          @click="runSummarize"
        >
          {{ summarizing ? "Summarizing…" : "Summarize" }}
        </button>
        <div v-if="summary" class="rounded border border-slate-800 bg-slate-950 p-3">
          <p class="text-sm text-slate-400">Summary</p>
          <p class="whitespace-pre-wrap">{{ summary.summary || "(empty)" }}</p>
          <p v-if="summary.tokens?.total" class="mt-2 text-xs text-slate-500">
            tokens: {{ summary.tokens.total }}
          </p>
        </div>
      </div>
    </section>
  </main>
</template>
