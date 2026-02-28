import CMS, { GeneratedOperations as Ops } from "@octaviatech/cms";

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
};

const cms = CMS.init(process.env.OCTAVIA_API_KEY || "", { timeoutMs: 10000 });

function ensureOk<T>(res: { ok: boolean; data: T | null; error?: { message?: string } }): T {
  if (!res.ok || !res.data) {
    throw new Error(res.error?.message || "Octavia SDK request failed");
  }
  return res.data;
}

function mapArticle(a: any): Content {
  return {
    id: a?.id || a?._id || "",
    title: a?.mainTitle?.en || a?.mainTitle?.fa || "",
    body: a?.body?.en || a?.body?.fa || "",
    locale: a?.mainTitle?.fa ? "fa" : "en",
    status: a?.isPublished ? "published" : "draft",
    createdAt: a?.createdAt || "",
  };
}

export const octaviaServerClient = {
  list: async (): Promise<Content[]> => {
    const res = await cms.article.getAll({ query: { page: 1, limit: 20, sortOrder: "desc" } });
    const data: any = ensureOk(res);
    const items = Array.isArray(data?.items) ? data.items : [];
    return items.map(mapArticle);
  },
  create: async (payload: Pick<Content, "title" | "body" | "locale">): Promise<Content> => {
    const lang = payload.locale.startsWith("fa") ? "fa" : "en";
    const body: Ops.ArticlesCreateBody = {
      mainTitle: { [lang]: payload.title },
      body: { [lang]: payload.body },
      category: [process.env.OCTAVIA_CATEGORY_ID || "CATEGORY_ID"],
      author: process.env.OCTAVIA_AUTHOR_ID || "AUTHOR_ID",
    };
    return mapArticle(ensureOk(await cms.article.create(body)));
  },
  publish: async (id: string): Promise<Content> => {
    ensureOk(await cms.article.archive({ id }));
    return mapArticle(ensureOk(await cms.article.getById(id)));
  },
  listForms: async (): Promise<FormItem[]> => {
    const data: any = ensureOk(await cms.form.getAll({ query: { page: 1, limit: 20 } }));
    const items = Array.isArray(data?.items) ? data.items : [];
    return items.map((f: any) => ({
      id: f?.id || f?._id || "",
      title: f?.title?.en || f?.title?.fa || "",
      slug: f?.slug || "",
    }));
  },
  submitForm: async (formId: string, values: Record<string, unknown>, language = "en") => {
    return ensureOk(await cms.formSubmission.createSubmission({ formId, language, values }));
  },
  getStatistics: async () => {
    return ensureOk(await cms.report.getStatistics());
  },
  summarize: async (text: string) => {
    return ensureOk(await cms.ai.summarize({ text, maxWords: 80 }));
  },
};
