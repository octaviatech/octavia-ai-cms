import CMS from "@octaviatech/cms";

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

const cms = CMS.init(import.meta.env.OCTAVIA_API_KEY || "", { timeoutMs: 10000 });

const mapArticle = (a: any): Content => ({
  id: a?.id || a?._id || "",
  title: a?.mainTitle?.en || a?.mainTitle?.fa || "",
  body: a?.body?.en || a?.body?.fa || "",
  locale: a?.mainTitle?.fa ? "fa" : "en",
  status: a?.isPublished ? "published" : "draft",
  createdAt: a?.createdAt || "",
});

const ensureOk = <T>(res: { ok: boolean; data: T | null; error?: { message?: string } }): T => {
  if (!res.ok || !res.data) throw new Error(res.error?.message || "Octavia SDK request failed");
  return res.data;
};

export const octaviaClient = {
  listContent: async (): Promise<Content[]> => {
    const out = await cms.article.getAll({ query: { page: 1, limit: 20, sortOrder: "desc" } });
    const data: any = ensureOk(out);
    const items = Array.isArray(data?.items) ? data.items : [];
    return items.map(mapArticle);
  },
  createContent: async (payload: Pick<Content, "title" | "body" | "locale">): Promise<Content> => {
    const lang = payload.locale.startsWith("fa") ? "fa" : "en";
    const out = await cms.article.create({
      mainTitle: { [lang]: payload.title },
      body: { [lang]: payload.body },
      category: import.meta.env.OCTAVIA_CATEGORY_ID || "CATEGORY_ID",
      author: import.meta.env.OCTAVIA_AUTHOR_ID || "AUTHOR_ID",
    });
    return mapArticle(ensureOk(out));
  },
  publishContent: async (id: string): Promise<Content> => {
    await ensureOk(await cms.article.archive({ id }));
    const one = await cms.article.getById(id);
    return mapArticle(ensureOk(one));
  },
  listForms: async (): Promise<FormItem[]> => {
    const out = await cms.form.getAll({ query: { page: 1, limit: 20 } });
    const data: any = ensureOk(out);
    const items = Array.isArray(data?.items) ? data.items : [];
    return items.map((f: any) => ({
      id: f?.id || f?._id || "",
      title: f?.title?.en || f?.title?.fa || "",
      slug: f?.slug || "",
    }));
  },
  submitForm: async (formId: string, values: Record<string, unknown>, language = "en") => {
    const out = await cms.formSubmission.createSubmission({ formId, language, values });
    return ensureOk(out);
  },
};
