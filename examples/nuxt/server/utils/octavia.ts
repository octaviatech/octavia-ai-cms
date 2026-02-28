import CMS from "@octaviatech/cms";

export type Content = {
  id: string;
  title: string;
  body: string;
  locale: string;
  status: "draft" | "published";
  createdAt: string;
};

const cms = CMS.init(process.env.OCTAVIA_API_KEY || "", { timeoutMs: 10000 });

const mapArticle = (a: any): Content => ({
  id: a?.id || a?._id || "",
  title: a?.mainTitle?.en || a?.mainTitle?.fa || "",
  body: a?.body?.en || a?.body?.fa || "",
  locale: a?.mainTitle?.fa ? "fa" : "en",
  status: a?.isPublished ? "published" : "draft",
  createdAt: a?.createdAt || "",
});

const ensureOk = <T>(res: { ok: boolean; data: T | null; error?: { message?: string } }): T => {
  if (!res.ok || !res.data) throw createError({ statusCode: 400, statusMessage: res.error?.message || "Octavia SDK request failed" });
  return res.data;
};

export const octaviaSdk = {
  async list(): Promise<Content[]> {
    const data: any = ensureOk(await cms.article.getAll({ page: 1, limit: 20, sortOrder: "desc" }));
    const items = Array.isArray(data?.items) ? data.items : [];
    return items.map(mapArticle);
  },
  async create(payload: { title: string; body: string; locale: string }): Promise<Content> {
    const lang = payload.locale?.startsWith("fa") ? "fa" : "en";
    const data = ensureOk(await cms.article.create({
      mainTitle: { [lang]: payload.title },
      body: { [lang]: payload.body },
      category: process.env.OCTAVIA_CATEGORY_ID || "CATEGORY_ID",
      author: process.env.OCTAVIA_AUTHOR_ID || "AUTHOR_ID",
    }));
    return mapArticle(data);
  },
  async publish(id: string): Promise<Content> {
    ensureOk(await cms.article.archive({ id }));
    return mapArticle(ensureOk(await cms.article.getById(id)));
  },
  async listForms() {
    const data: any = ensureOk(await cms.form.getAll({ query: { page: 1, limit: 20 } }));
    const items = Array.isArray(data?.items) ? data.items : [];
    return items.map((f: any) => ({
      id: f?.id || f?._id || "",
      title: f?.title?.en || f?.title?.fa || "",
      slug: f?.slug || "",
    }));
  },
  async submitForm(formId: string, values: Record<string, unknown>, language = "en") {
    return ensureOk(await cms.formSubmission.createSubmission({ formId, language, values }));
  },
  async statistics() {
    return ensureOk(await cms.report.getStatistics());
  },
  async summarize(text: string) {
    return ensureOk(await cms.ai.summarize({ text, maxWords: 80 }));
  },
};
