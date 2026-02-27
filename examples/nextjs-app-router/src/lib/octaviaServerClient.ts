import CMS, { GeneratedOperations as Ops } from "@octaviatech/cms";

export type Content = Record<string, unknown>;

const apiKey = process.env.OCTAVIA_API_KEY || "";
const cms = CMS.init(apiKey, { timeoutMs: 10000 });

function ensureOk<T>(res: { ok: boolean; data: T | null; error?: { message?: string } }): T {
  if (!res.ok || !res.data) {
    throw new Error(res.error?.message || "Octavia SDK request failed");
  }
  return res.data;
}

export const octaviaServerClient = {
  list: async () => {
    const res = await cms.article.getAll({
      query: { page: 1, limit: 20, sortOrder: "desc" },
    });
    return ensureOk(res);
  },
  create: async (payload: Ops.ArticlesCreateBody) => {
    const res = await cms.article.create(payload);
    return ensureOk(res);
  },
  publish: async (id: string) => {
    const res = await cms.article.archive({ id });
    return ensureOk(res);
  },
};
