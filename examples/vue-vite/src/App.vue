<script setup lang="ts">
import { computed, onMounted, ref } from "vue";
import { octaviaClient, type Content, type FormItem, type Statistics } from "./lib/octaviaClient";

type Page = "blog" | "forms" | "insights";

const page = ref<Page>("blog");
const loading = ref(false);
const error = ref("");
const notice = ref("");

const title = ref("");
const body = ref("");
const locale = ref("en");
const items = ref<Content[]>([]);

const forms = ref<FormItem[]>([]);
const formId = ref("");
const email = ref("");

const statistics = ref<Statistics | null>(null);
const summary = ref("");

// `report.getStatistics` also returns nested objects; show the flat counters.
const statEntries = computed(() =>
  Object.entries(statistics.value ?? {}).filter(
    ([, value]) => typeof value === "number" || typeof value === "string",
  ),
);

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
  notice.value = "";
  try {
    await octaviaClient.create({ title: title.value, body: body.value, locale: locale.value });
    title.value = "";
    body.value = "";
    notice.value = "Article created as a draft.";
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
  notice.value = "";
  try {
    await octaviaClient.publish(id);
    notice.value = "Article published.";
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
  notice.value = "";
  try {
    await octaviaClient.submitForm(formId.value, { email: email.value }, locale.value);
    email.value = "";
    notice.value = "Form submitted.";
  } catch (e) {
    error.value = (e as Error).message;
  } finally {
    loading.value = false;
  }
};

const loadStatistics = async () => {
  loading.value = true;
  error.value = "";
  try {
    statistics.value = await octaviaClient.getStatistics();
  } catch (e) {
    error.value = (e as Error).message;
  } finally {
    loading.value = false;
  }
};

const runSummarize = async () => {
  const source = body.value.trim() || items.value.find((item) => item.body)?.body || "";
  if (!source) {
    error.value = "Write an article body below, or create an article first, to summarize.";
    return;
  }
  loading.value = true;
  error.value = "";
  notice.value = "";
  try {
    const result = await octaviaClient.summarize(source);
    summary.value = result.summary;
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
      <h1 class="mb-2 text-3xl font-bold">Octavia CMS - Vue + Vite</h1>
      <p class="mb-6 text-sm text-slate-400">
        The browser talks to this app's own dev-server proxy. The API key stays on the server.
      </p>

      <div class="mb-6 flex flex-wrap gap-2">
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
        <button
          class="rounded px-4 py-2"
          :class="page === 'insights' ? 'bg-cyan-500 text-slate-950' : 'bg-slate-800'"
          @click="page = 'insights'"
        >
          AI &amp; Statistics
        </button>
        <button class="rounded bg-slate-700 px-4 py-2" @click="refreshAll">Refresh</button>
      </div>

      <p v-if="error" class="mb-4 rounded bg-red-900/40 p-3 text-red-300">{{ error }}</p>
      <p v-if="notice" class="mb-4 rounded bg-emerald-900/40 p-3 text-emerald-300">{{ notice }}</p>

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
            <li v-if="items.length === 0" class="text-sm text-slate-500">No articles yet.</li>
          </ul>
        </div>
      </section>

      <section v-else-if="page === 'forms'" class="space-y-6">
        <div class="rounded border border-slate-800 bg-slate-900 p-4">
          <h2 class="mb-3 text-xl font-semibold">Available Forms</h2>
          <ul class="space-y-2">
            <li v-for="f in forms" :key="f.id" class="rounded border border-slate-800 bg-slate-950 p-3">
              <p class="font-medium">{{ f.title || "(untitled form)" }}</p>
              <p class="text-xs text-slate-400">id: {{ f.id }}</p>
            </li>
            <li v-if="forms.length === 0" class="text-sm text-slate-500">No forms yet.</li>
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

      <section v-else class="space-y-6">
        <div class="rounded border border-slate-800 bg-slate-900 p-4">
          <h2 class="mb-1 text-xl font-semibold">AI Summarize</h2>
          <p class="mb-3 text-sm text-slate-400">
            Summarizes the body you typed on the Blog page, or the first article body on the list.
          </p>
          <button
            class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50"
            :disabled="loading"
            @click="runSummarize"
          >
            Summarize
          </button>
          <p v-if="summary" class="mt-3 rounded border border-slate-800 bg-slate-950 p-3 text-sm">{{ summary }}</p>
        </div>

        <div class="rounded border border-slate-800 bg-slate-900 p-4">
          <h2 class="mb-1 text-xl font-semibold">Tenant Statistics</h2>
          <p class="mb-3 text-sm text-slate-400">Usage counters reported by <code>report.getStatistics</code>.</p>
          <button
            class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50"
            :disabled="loading"
            @click="loadStatistics"
          >
            Load statistics
          </button>
          <dl v-if="statistics" class="mt-3 grid grid-cols-2 gap-2 sm:grid-cols-3">
            <div v-for="[key, value] in statEntries" :key="key" class="rounded border border-slate-800 bg-slate-950 p-3">
              <dt class="text-xs text-slate-400">{{ key }}</dt>
              <dd class="text-lg font-semibold">{{ value }}</dd>
            </div>
          </dl>
        </div>
      </section>
    </div>
  </main>
</template>
