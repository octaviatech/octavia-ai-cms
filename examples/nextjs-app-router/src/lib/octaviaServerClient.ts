import CMS from "@octaviatech/cms";

// The API key is the only credential. It is read here, on the server, and never
// reaches the browser — nothing in this file may be imported by a client component.
// The client is built lazily: `next build` imports route modules to collect page
// data, and initialising at module scope would throw on a keyless build machine.
function client() {
  return CMS.init(process.env.OCTAVIA_API_KEY || "", { timeoutMs: 10_000 });
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
    throw new Error(res.error?.message || "Octavia SDK request failed");
  }
  return res.data;
}

// The API returns a multilingual map. These examples register `en` and `fa`, so
// read the first one that is actually present rather than assuming a locale.
function pickText(value: unknown): { text: string; locale: string } {
  const map = (value ?? {}) as Record<string, unknown>;
  for (const locale of ["en", "fa"]) {
    const text = map[locale];
    if (typeof text === "string" && text) return { text, locale };
  }
  const first = Object.values(map).find((v) => typeof v === "string" && v);
  return { text: typeof first === "string" ? first : "", locale: "en" };
}

function mapArticle(a: any): Content {
  const title = pickText(a?.mainTitle);
  const body = pickText(a?.content);
  return {
    id: a?._id || "",
    title: title.text,
    body: body.text,
    locale: title.locale,
    status: a?.isPublished ? "published" : "draft",
    createdAt: a?.createdAt || "",
  };
}

export const octaviaServerClient = {
  list: async (): Promise<Content[]> => {
    const data = ensureOk(
      await client().article.getAll({ query: { page: 1, limit: 20, sortOrder: "desc" } })
    );
    // List rows are keyed by resource name, not `items`.
    return (data.articleListItem ?? []).map(mapArticle);
  },

  create: async (payload: { title: string; body: string; locale?: string }): Promise<Content> => {
    const lang = (payload.locale || "en").slice(0, 2);
    return mapArticle(
      ensureOk(
        await client().article.create({
          mainTitle: { [lang]: payload.title },
          content: { [lang]: payload.body },
          // `category` is an array of IDs even for a single category.
          category: [process.env.OCTAVIA_CATEGORY_ID || ""],
          author: process.env.OCTAVIA_AUTHOR_ID || "",
          isPublished: false,
        })
      )
    );
  },

  // There is no publish endpoint. Publishing is a field update.
  publish: async (id: string): Promise<Content> => {
    ensureOk(await client().article.update({ id, isPublished: true }));
    return mapArticle(ensureOk(await client().article.getById(id)));
  },

  // `form.getAll` returns only a submissions count per form — no id, title or
  // slug — so it cannot drive a form picker. `getById` returns the real form.
  getForm: async (id: string): Promise<FormItem> => {
    const form: any = ensureOk(await client().form.getById(id));
    return {
      id: form?._id || "",
      title: pickText(form?.title).text,
      slug: form?.slug || "",
      isActive: Boolean(form?.isActive),
      sections: Array.isArray(form?.sections) ? form.sections.length : 0,
    };
  },

  submitForm: async (formId: string, values: Record<string, unknown>, language = "en") => {
    return ensureOk(await client().formSubmission.idSubmit(formId, { language, values }));
  },

  getStatistics: async () => {
    return ensureOk(await client().report.getStatistics());
  },

  summarize: async (text: string) => {
    return ensureOk(await client().ai.summarize({ text, maxWords: 80 }));
  },
};
