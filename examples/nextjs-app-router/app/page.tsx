"use client";
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
export default function Home() {
  const [items, setItems] = useState<Content[]>([]);
  const [title, setTitle] = useState("");
  const [body, setBody] = useState("");
  const [locale, setLocale] = useState("en-US");
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
    if (!title || !body || !locale) {
      setError("All fields are required.");
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
    <main
      style={{ fontFamily: "sans-serif", maxWidth: 820, margin: "2rem auto" }}
    >
      <h1>Octavia AI CMS — Next.js</h1>
      {error && <p style={{ color: "crimson" }}>{error}</p>}
      <input
        placeholder="Title"
        value={title}
        onChange={(e) => setTitle(e.target.value)}
      />
      <br />
      <textarea
        placeholder="Body"
        value={body}
        onChange={(e) => setBody(e.target.value)}
      />
      <br />
      <input value={locale} onChange={(e) => setLocale(e.target.value)} />
      <br />
      <button onClick={() => void create()}>Create</button>{" "}
      <button onClick={() => void refresh()}>Refresh</button>
      <ul>
        {items.map((i) => (
          <li key={i.id}>
            {i.title} ({i.status}){" "}
            <button
              disabled={i.status === "published"}
              onClick={() => void publish(i.id)}
            >
              Publish
            </button>
          </li>
        ))}
      </ul>
    </main>
  );
}
