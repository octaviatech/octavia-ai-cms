import { useEffect, useState } from "react";
import { octaviaClient, type Content, type FormItem, type Statistics } from "./lib/octaviaClient";

type Page = "blog" | "forms" | "insights";

export function App() {
  const [page, setPage] = useState<Page>("blog");
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");
  const [notice, setNotice] = useState("");

  const [items, setItems] = useState<Content[]>([]);
  const [title, setTitle] = useState("");
  const [body, setBody] = useState("");
  const [locale, setLocale] = useState("en");

  const [forms, setForms] = useState<FormItem[]>([]);
  const [formId, setFormId] = useState("");
  const [email, setEmail] = useState("");

  const [statistics, setStatistics] = useState<Statistics | null>(null);
  const [summary, setSummary] = useState("");

  const refreshBlog = async () => {
    setItems(await octaviaClient.list());
  };

  const refreshForms = async () => {
    setForms(await octaviaClient.listForms());
  };

  const refreshAll = async () => {
    setLoading(true);
    setError("");
    try {
      await Promise.all([refreshBlog(), refreshForms()]);
    } catch (e) {
      setError((e as Error).message);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    void refreshAll();
  }, []);

  const createArticle = async () => {
    if (!title.trim() || !body.trim()) {
      setError("Title and body are required.");
      return;
    }
    setLoading(true);
    setError("");
    setNotice("");
    try {
      await octaviaClient.create({ title, body, locale });
      setTitle("");
      setBody("");
      setNotice("Article created as a draft.");
      await refreshBlog();
    } catch (e) {
      setError((e as Error).message);
    } finally {
      setLoading(false);
    }
  };

  const publishArticle = async (id: string) => {
    setLoading(true);
    setError("");
    setNotice("");
    try {
      await octaviaClient.publish(id);
      setNotice("Article published.");
      await refreshBlog();
    } catch (e) {
      setError((e as Error).message);
    } finally {
      setLoading(false);
    }
  };

  const submitForm = async () => {
    if (!formId.trim() || !email.trim()) {
      setError("Form ID and email are required.");
      return;
    }
    setLoading(true);
    setError("");
    setNotice("");
    try {
      await octaviaClient.submitForm(formId, { email }, locale);
      setEmail("");
      setNotice("Form submitted.");
    } catch (e) {
      setError((e as Error).message);
    } finally {
      setLoading(false);
    }
  };

  const loadStatistics = async () => {
    setLoading(true);
    setError("");
    try {
      setStatistics(await octaviaClient.getStatistics());
    } catch (e) {
      setError((e as Error).message);
    } finally {
      setLoading(false);
    }
  };

  const runSummarize = async () => {
    const source = body.trim() || items.find((item) => item.body)?.body || "";
    if (!source) {
      setError("Write an article body below, or create an article first, to summarize.");
      return;
    }
    setLoading(true);
    setError("");
    setNotice("");
    try {
      const result = await octaviaClient.summarize(source);
      setSummary(result.summary);
    } catch (e) {
      setError((e as Error).message);
    } finally {
      setLoading(false);
    }
  };

  return (
    <main className="min-h-screen bg-slate-950 text-slate-100">
      <div className="mx-auto max-w-5xl p-6">
        <h1 className="mb-2 text-3xl font-bold">Octavia CMS - React + Vite</h1>
        <p className="mb-6 text-sm text-slate-400">
          The browser talks to this app&apos;s dev-server proxy. The API key stays on the server.
        </p>

        <div className="mb-6 flex flex-wrap gap-2">
          <button
            className={`rounded px-4 py-2 ${page === "blog" ? "bg-cyan-500 text-slate-950" : "bg-slate-800"}`}
            onClick={() => setPage("blog")}
          >
            Blog Page
          </button>
          <button
            className={`rounded px-4 py-2 ${page === "forms" ? "bg-cyan-500 text-slate-950" : "bg-slate-800"}`}
            onClick={() => setPage("forms")}
          >
            Form Page
          </button>
          <button
            className={`rounded px-4 py-2 ${page === "insights" ? "bg-cyan-500 text-slate-950" : "bg-slate-800"}`}
            onClick={() => setPage("insights")}
          >
            AI &amp; Statistics
          </button>
          <button className="rounded bg-slate-700 px-4 py-2" onClick={() => void refreshAll()}>
            Refresh
          </button>
        </div>

        {error ? <p className="mb-4 rounded bg-red-900/40 p-3 text-red-300">{error}</p> : null}
        {notice ? <p className="mb-4 rounded bg-emerald-900/40 p-3 text-emerald-300">{notice}</p> : null}

        {page === "blog" ? (
          <section className="space-y-6">
            <div className="rounded border border-slate-800 bg-slate-900 p-4">
              <h2 className="mb-3 text-xl font-semibold">Create Article</h2>
              <div className="space-y-3">
                <input
                  className="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
                  placeholder="Title"
                  value={title}
                  onChange={(e) => setTitle(e.target.value)}
                />
                <textarea
                  className="h-36 w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
                  placeholder="Body"
                  value={body}
                  onChange={(e) => setBody(e.target.value)}
                />
                <input
                  className="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
                  placeholder="Locale (en/fa)"
                  value={locale}
                  onChange={(e) => setLocale(e.target.value)}
                />
                <button
                  className="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50"
                  disabled={loading}
                  onClick={() => void createArticle()}
                >
                  Create
                </button>
              </div>
            </div>

            <div className="rounded border border-slate-800 bg-slate-900 p-4">
              <h2 className="mb-3 text-xl font-semibold">Blog List</h2>
              <ul className="space-y-2">
                {items.map((item) => (
                  <li
                    key={item.id}
                    className="flex items-center justify-between rounded border border-slate-800 bg-slate-950 p-3"
                  >
                    <div>
                      <p className="font-medium">{item.title}</p>
                      <p className="text-sm text-slate-400">
                        {item.locale} · {item.status}
                      </p>
                    </div>
                    <button
                      className="rounded bg-emerald-500 px-3 py-1 text-sm font-medium text-slate-950 disabled:opacity-50"
                      disabled={item.status === "published" || loading}
                      onClick={() => void publishArticle(item.id)}
                    >
                      Publish
                    </button>
                  </li>
                ))}
                {items.length === 0 ? <li className="text-sm text-slate-500">No articles yet.</li> : null}
              </ul>
            </div>
          </section>
        ) : null}

        {page === "forms" ? (
          <section className="space-y-6">
            <div className="rounded border border-slate-800 bg-slate-900 p-4">
              <h2 className="mb-3 text-xl font-semibold">Available Forms</h2>
              <ul className="space-y-2">
                {forms.map((f) => (
                  <li key={f.id} className="rounded border border-slate-800 bg-slate-950 p-3">
                    <p className="font-medium">{f.title || "(untitled form)"}</p>
                    <p className="text-xs text-slate-400">id: {f.id}</p>
                  </li>
                ))}
                {forms.length === 0 ? <li className="text-sm text-slate-500">No forms yet.</li> : null}
              </ul>
            </div>

            <div className="rounded border border-slate-800 bg-slate-900 p-4">
              <h2 className="mb-3 text-xl font-semibold">Submit Form</h2>
              <div className="space-y-3">
                <input
                  className="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
                  placeholder="Form ID"
                  value={formId}
                  onChange={(e) => setFormId(e.target.value)}
                />
                <input
                  className="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
                  placeholder="Email"
                  value={email}
                  onChange={(e) => setEmail(e.target.value)}
                />
                <button
                  className="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50"
                  disabled={loading}
                  onClick={() => void submitForm()}
                >
                  Submit
                </button>
              </div>
            </div>
          </section>
        ) : null}

        {page === "insights" ? (
          <section className="space-y-6">
            <div className="rounded border border-slate-800 bg-slate-900 p-4">
              <h2 className="mb-1 text-xl font-semibold">AI Summarize</h2>
              <p className="mb-3 text-sm text-slate-400">
                Summarizes the body you typed on the Blog page, or the first article body on the list.
              </p>
              <button
                className="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50"
                disabled={loading}
                onClick={() => void runSummarize()}
              >
                Summarize
              </button>
              {summary ? (
                <p className="mt-3 rounded border border-slate-800 bg-slate-950 p-3 text-sm">{summary}</p>
              ) : null}
            </div>

            <div className="rounded border border-slate-800 bg-slate-900 p-4">
              <h2 className="mb-1 text-xl font-semibold">Tenant Statistics</h2>
              <p className="mb-3 text-sm text-slate-400">Usage counters reported by `report.getStatistics`.</p>
              <button
                className="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950 disabled:opacity-50"
                disabled={loading}
                onClick={() => void loadStatistics()}
              >
                Load statistics
              </button>
              {statistics ? (
                <dl className="mt-3 grid grid-cols-2 gap-2 sm:grid-cols-3">
                  {Object.entries(statistics)
                    .filter(([, value]) => typeof value === "number" || typeof value === "string")
                    .map(([key, value]) => (
                      <div key={key} className="rounded border border-slate-800 bg-slate-950 p-3">
                        <dt className="text-xs text-slate-400">{key}</dt>
                        <dd className="text-lg font-semibold">{String(value)}</dd>
                      </div>
                    ))}
                </dl>
              ) : null}
            </div>
          </section>
        ) : null}
      </div>
    </main>
  );
}
