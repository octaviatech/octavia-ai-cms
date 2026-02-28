"use client";

import Link from "next/link";
import { useEffect, useState } from "react";

type Content = {
  id: string;
  title: string;
  body: string;
  locale: string;
  status: "draft" | "published";
  createdAt: string;
};

async function call<T>(url: string, init?: RequestInit): Promise<T> {
  const res = await fetch(url, init);
  if (!res.ok) throw new Error(await res.text());
  return res.json();
}

export default function BlogPage() {
  const [items, setItems] = useState<Content[]>([]);
  const [title, setTitle] = useState("");
  const [body, setBody] = useState("");
  const [locale, setLocale] = useState("en");
  const [error, setError] = useState("");

  const refresh = async () => {
    try {
      setItems(await call("/api/octavia/content"));
    } catch (e) {
      setError((e as Error).message);
    }
  };

  useEffect(() => {
    void refresh();
  }, []);

  const create = async () => {
    if (!title || !body) {
      setError("Title and body are required.");
      return;
    }
    await call("/api/octavia/content", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ title, body, locale }),
    });
    setTitle("");
    setBody("");
    await refresh();
  };

  const publish = async (id: string) => {
    await call(`/api/octavia/content/${id}/publish`, { method: "POST" });
    await refresh();
  };

  return (
    <main className="mx-auto max-w-5xl p-6">
      <div className="mb-6 flex items-center justify-between">
        <h1 className="text-3xl font-bold">Blog Page</h1>
        <div className="flex gap-2">
          <Link className="rounded bg-slate-800 px-4 py-2" href="/forms">
            Form Page
          </Link>
          <button className="rounded bg-slate-700 px-4 py-2" onClick={() => void refresh()}>
            Refresh
          </button>
        </div>
      </div>

      {error ? <p className="mb-4 rounded bg-red-900/40 p-3 text-red-300">{error}</p> : null}

      <section className="mb-6 rounded border border-slate-800 bg-slate-900 p-4">
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
          <button className="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950" onClick={() => void create()}>
            Create
          </button>
        </div>
      </section>

      <section className="rounded border border-slate-800 bg-slate-900 p-4">
        <h2 className="mb-3 text-xl font-semibold">Blog List</h2>
        <ul className="space-y-2">
          {items.map((i) => (
            <li key={i.id} className="flex items-center justify-between rounded border border-slate-800 bg-slate-950 p-3">
              <div>
                <p className="font-medium">{i.title}</p>
                <p className="text-sm text-slate-400">
                  {i.locale} · {i.status}
                </p>
              </div>
              <button
                className="rounded bg-emerald-500 px-3 py-1 text-sm font-medium text-slate-950 disabled:opacity-50"
                disabled={i.status === "published"}
                onClick={() => void publish(i.id)}
              >
                Publish
              </button>
            </li>
          ))}
        </ul>
      </section>
    </main>
  );
}

