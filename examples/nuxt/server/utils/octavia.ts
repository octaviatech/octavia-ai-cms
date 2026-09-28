import CMS from "@octaviatech/cms";

// The API key is the only credential, and it is read here on the server through
// runtimeConfig. Nothing in this file may be imported by a `.vue` page — Nuxt
// would inline the value into the browser bundle.
// `NUXT_OCTAVIA_API_KEY` is the runtimeConfig form; `OCTAVIA_API_KEY` is the
// plain env var the other examples in this folder use. Either one works.
function serverConfig() {
  const config = useRuntimeConfig();
  return {
    apiKey: config.octaviaApiKey || process.env.OCTAVIA_API_KEY || "",
    categoryId: config.octaviaCategoryId || process.env.OCTAVIA_CATEGORY_ID || "",
    authorId: config.octaviaAuthorId || process.env.OCTAVIA_AUTHOR_ID || "",
  };
}

function getCms() {
  return CMS.init(serverConfig().apiKey, { timeoutMs: 10_000 });
}

export type Content = {
  id: string;
  title: string;
  body: string;
  locale: string;
  status: "draft" | "published";
  createdAt: string;
};

export type FormItem = {
  id: string;
  title: string;
  slug: string;
  isActive: boolean;
  sections: number;
};

function ensureOk<T>(res: { ok: boolean; data: T | null; error?: { message?: string } }): NonNullable<T> {
  if (!res.ok || res.data == null) {
    throw createError({
      statusCode: 502,
      statusMessage: res.error?.message || "Octavia SDK request failed",
    });
  }
  return res.data;
}

// The API returns a multilingual map. Only registered locales are present, so
// read the first one that actually exists rather than assuming `en` or `fa`.
function pickText(value: unknown): { text: string; locale: string } {
  const map = (value ?? {}) as Record<string, unknown>;
  for (const locale of ["en", "es", "fa"]) {
    const text = map[locale];
    if (typeof text === "string" && text) return { text, locale };
  }
  const entry = Object.entries(map).find(([, v]) => typeof v === "string" && v);
  return { text: (entry?.[1] as string) || "", locale: entry?.[0] || "en" };
}

// Single-article responses are wrapped: `{ article: {...} }`.
function unwrapArticle(data: unknown): any {
  const article = (data as { article?: unknown } | null)?.article;
  return article && typeof article === "object" ? article : data;
}

function mapArticle(raw: unknown): Content {
  const a = unwrapArticle(raw);
  const title = pickText(a?.mainTitle);
  const body = pickText(a?.content);
  return {
    id: a?._id || a?.id || "",
    title: title.text,
    body: body.text,
    locale: title.locale,
    status: a?.isPublished ? "published" : "draft",
    createdAt: a?.createdAt || "",
  };
}

export const octaviaSdk = {
  async list(): Promise<Content[]> {
    const data = ensureOk(
      await getCms().article.getAll({ query: { page: 1, limit: 20, sortOrder: "desc" } })
    );
    // List rows are keyed by resource name, not `items`.
    return (data.articleListItem ?? []).map(mapArticle);
  },

  async create(payload: { title: string; body: string; locale?: string }): Promise<Content> {
    const config = serverConfig();
    const lang = (payload.locale || "en").slice(0, 2);
    return mapArticle(
      ensureOk(
        await getCms().article.create({
          mainTitle: { [lang]: payload.title },
          // The field is `content`; `body` is rejected as an unknown property.
          content: { [lang]: payload.body },
          // `category` is an array of IDs even for a single category.
          category: [config.categoryId],
          author: config.authorId,
          isPublished: false,
        })
      )
    );
  },

  // There is no publish endpoint. Publishing is a field update.
  async publish(id: string): Promise<Content> {
    const cms = getCms();
    ensureOk(await cms.article.update({ id, isPublished: true }));
    return mapArticle(ensureOk(await cms.article.getById(id)));
  },

  // `form.getAll` returns only a submissions count per form — no id, title or
  // slug — so it cannot drive a form picker. `getById` returns the real form.
  async getForm(id: string): Promise<FormItem> {
    const form: any = ensureOk(await getCms().form.getById(id));
    return {
      id: form?._id || form?.id || "",
      title: pickText(form?.title).text,
      slug: form?.slug || "",
      isActive: Boolean(form?.isActive),
      sections: Array.isArray(form?.sections) ? form.sections.length : 0,
    };
  },

  async submitForm(formId: string, values: Record<string, unknown>, language = "en") {
    return ensureOk(await getCms().formSubmission.idSubmit(formId, { language, values }));
  },

  async statistics() {
    return ensureOk(await getCms().report.getStatistics());
  },

  async summarize(text: string) {
    return ensureOk(await getCms().ai.summarize({ text, maxWords: 80 }));
  },
};
