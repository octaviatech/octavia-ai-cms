<script setup lang="ts">
import { onMounted, ref } from "vue";
import { octaviaClient, type Content, type FormItem } from "./lib/octaviaClient";

type Page = "blog" | "forms";

const page = ref<Page>("blog");
const loading = ref(false);
const error = ref("");

const title = ref("");
const body = ref("");
const locale = ref("en");
const items = ref<Content[]>([]);

const forms = ref<FormItem[]>([]);
const formId = ref("");
const email = ref("");

const refreshBlog = async () => {
  items.value = await octaviaClient.list();
};

const refreshForms = async () => {
  forms.value = await octaviaClient.listForms();
};

const refreshAll = async () => {
  loading.value = true;
  error.value = "";
  try {
    await Promise.all([refreshBlog(), refreshForms()]);
  } catch (e) {
    error.value = (e as Error).message;
  } finally {
    loading.value = false;
  }
};

const create = async () => {
  if (!title.value || !body.value) {
    error.value = "Title and body are required.";
    return;
  }
  loading.value = true;
  error.value = "";
  try {
    await octaviaClient.create({ title: title.value, body: body.value, locale: locale.value });
    title.value = "";
    body.value = "";
    await refreshBlog();
  } catch (e) {
    error.value = (e as Error).message;
  } finally {
    loading.value = false;
  }
};

const publish = async (id: string) => {
  loading.value = true;
  error.value = "";
  try {
    await octaviaClient.publish(id);
    await refreshBlog();
  } catch (e) {
    error.value = (e as Error).message;
  } finally {
    loading.value = false;
  }
};

const submitForm = async () => {
  if (!formId.value || !email.value) {
    error.value = "Form ID and email are required.";
    return;
  }
  loading.value = true;
  error.value = "";
  try {
    await octaviaClient.submitForm(formId.value, { email: email.value }, locale.value);
    email.value = "";
  } catch (e) {
    error.value = (e as Error).message;
  } finally {
    loading.value = false;
  }
};

onMounted(async () => {
  await refreshAll();
});
</script>

<template>
  <main class="min-h-screen bg-slate-950 text-slate-100">
    <div class="mx-auto max-w-5xl p-6">
      <h1 class="mb-6 text-3xl font-bold">Octavia CMS - Vue + Vite</h1>

      <div class="mb-6 flex gap-2">
        <button
          class="rounded px-4 py-2"
          :class="page === 'blog' ? 'bg-cyan-500 text-slate-950' : 'bg-slate-800'"
          @click="page = 'blog'"
        >
          Blog Page
        </button>
        <button
          class="rounded px-4 py-2"
          :class="page === 'forms' ? 'bg-cyan-500 text-slate-950' : 'bg-slate-800'"
          @click="page = 'forms'"
        >
          Form Page
        </button>
        <button class="rounded bg-slate-700 px-4 py-2" @click="refreshAll">Refresh</button>
      </div>

      <p v-if="error" class="mb-4 rounded bg-red-900/40 p-3 text-red-300">{{ error }}</p>

      <section v-if="page === 'blog'" class="space-y-6">
        <div class="rounded border border-slate-800 bg-slate-900 p-4">
          <h2 class="mb-3 text-xl font-semibold">Create Article</h2>
          <div class="space-y-3">
            <input v-model="title" class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2" placeholder="Title" />
            <textarea v-model="body" class="h-36 w-full rounded border border-slate-700 bg-slate-950 px-3 py-2" placeholder="Body" />
            <input
              v-model="locale"
              class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
              placeholder="Locale (en/fa)"
            />
            <button class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50" :disabled="loading" @click="create">
              Create
            </button>
          </div>
        </div>

        <div class="rounded border border-slate-800 bg-slate-900 p-4">
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
                :disabled="item.status === 'published' || loading"
                @click="publish(item.id)"
              >
                Publish
              </button>
            </li>
          </ul>
        </div>
      </section>

      <section v-else class="space-y-6">
        <div class="rounded border border-slate-800 bg-slate-900 p-4">
          <h2 class="mb-3 text-xl font-semibold">Available Forms</h2>
          <ul class="space-y-2">
            <li v-for="f in forms" :key="f.id" class="rounded border border-slate-800 bg-slate-950 p-3">
              <p class="font-medium">{{ f.title || "(untitled form)" }}</p>
              <p class="text-xs text-slate-400">id: {{ f.id }}</p>
            </li>
          </ul>
        </div>

        <div class="rounded border border-slate-800 bg-slate-900 p-4">
          <h2 class="mb-3 text-xl font-semibold">Submit Form</h2>
          <div class="space-y-3">
            <input v-model="formId" class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2" placeholder="Form ID" />
            <input v-model="email" class="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2" placeholder="Email" />
            <button
              class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50"
              :disabled="loading"
              @click="submitForm"
            >
              Submit
            </button>
          </div>
        </div>
      </section>
    </div>
  </main>
</template>

