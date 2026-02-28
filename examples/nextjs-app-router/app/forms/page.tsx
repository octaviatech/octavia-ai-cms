"use client";

import Link from "next/link";
import { useEffect, useState } from "react";

type FormItem = {
  id: string;
  title: string;
  slug: string;
};

async function call<T>(url: string, init?: RequestInit): Promise<T> {
  const res = await fetch(url, init);
  if (!res.ok) throw new Error(await res.text());
  return res.json();
}

export default function FormsPage() {
  const [forms, setForms] = useState<FormItem[]>([]);
  const [formId, setFormId] = useState("");
  const [email, setEmail] = useState("");
  const [locale, setLocale] = useState("en");
  const [error, setError] = useState("");

  const refresh = async () => {
    try {
      setForms(await call("/api/octavia/forms"));
    } catch (e) {
      setError((e as Error).message);
    }
  };

  useEffect(() => {
    void refresh();
  }, []);

  const submitForm = async () => {
    if (!formId || !email) {
      setError("Form ID and email are required.");
      return;
    }
    await call(`/api/octavia/forms/${formId}/submit`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ email, language: locale }),
    });
    setEmail("");
  };

  return (
    <main className="mx-auto max-w-5xl p-6">
      <div className="mb-6 flex items-center justify-between">
        <h1 className="text-3xl font-bold">Form Page</h1>
        <div className="flex gap-2">
          <Link className="rounded bg-slate-800 px-4 py-2" href="/blog">
            Blog Page
          </Link>
          <button className="rounded bg-slate-700 px-4 py-2" onClick={() => void refresh()}>
            Refresh
          </button>
        </div>
      </div>

      {error ? <p className="mb-4 rounded bg-red-900/40 p-3 text-red-300">{error}</p> : null}

      <section className="mb-6 rounded border border-slate-800 bg-slate-900 p-4">
        <h2 className="mb-3 text-xl font-semibold">Available Forms</h2>
        <ul className="space-y-2">
          {forms.map((f) => (
            <li key={f.id} className="rounded border border-slate-800 bg-slate-950 p-3">
              <p className="font-medium">{f.title || "(untitled form)"}</p>
              <p className="text-xs text-slate-400">id: {f.id}</p>
            </li>
          ))}
        </ul>
      </section>

      <section className="rounded border border-slate-800 bg-slate-900 p-4">
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
          <input
            className="w-full rounded border border-slate-700 bg-slate-950 px-3 py-2"
            placeholder="Locale (en/fa)"
            value={locale}
            onChange={(e) => setLocale(e.target.value)}
          />
          <button className="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950" onClick={() => void submitForm()}>
            Submit
          </button>
        </div>
      </section>
    </main>
  );
}

