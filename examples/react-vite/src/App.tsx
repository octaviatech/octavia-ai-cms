import { useEffect, useState } from "react";
import { octaviaClient, type Content, type FormItem } from "./lib/octaviaClient";

type Page = "blog" | "forms";

export function App() {
  const [page, setPage] = useState<Page>("blog");
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");

  const [items, setItems] = useState<Content[]>([]);
  const [title, setTitle] = useState("");
  const [body, setBody] = useState("");
  const [locale, setLocale] = useState("en");

  const [forms, setForms] = useState<FormItem[]>([]);
  const [formId, setFormId] = useState("");
  const [email, setEmail] = useState("");

  const refreshBlog = async () => {
    setItems(await octaviaClient.listContent());
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
    try {
      await octaviaClient.createContent({ title, body, locale });
      setTitle("");
      setBody("");
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
    try {
      await octaviaClient.publishContent(id);
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
    try {
      await octaviaClient.submitForm(formId, { email }, locale);
      setEmail("");
    } catch (e) {
      setError((e as Error).message);
    } finally {
      setLoading(false);
    }
  };

  return (
    <main className="min-h-screen bg-slate-950 text-slate-100">
      <div className="mx-auto max-w-5xl p-6">
        <h1 className="mb-6 text-3xl font-bold">Octavia CMS - React + Vite</h1>

        <div className="mb-6 flex gap-2">
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
          <button className="rounded bg-slate-700 px-4 py-2" onClick={() => void refreshAll()}>
            Refresh
          </button>
        </div>

        {error ? <p className="mb-4 rounded bg-red-900/40 p-3 text-red-300">{error}</p> : null}

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
              </ul>
            </div>
          </section>
        ) : (
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
        )}
      </div>
    </main>
  );
}

