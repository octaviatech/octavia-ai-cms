import { useEffect, useState } from "react";
import { octaviaClient, type Content, type FormItem } from "./lib/octaviaClient";

export function App() {
  const [title, setTitle] = useState("");
  const [body, setBody] = useState("");
  const [locale, setLocale] = useState("en-US");
  const [items, setItems] = useState<Content[]>([]);
  const [forms, setForms] = useState<FormItem[]>([]);
  const [formId, setFormId] = useState("");
  const [email, setEmail] = useState("");
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");

  const refresh = async () => {
    setLoading(true);
    setError("");
    try {
      setItems(await octaviaClient.listContent());
      setForms(await octaviaClient.listForms());
    } catch (e) {
      setError((e as Error).message);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    void refresh();
  }, []);

  const create = async () => {
    if (!title.trim() || !body.trim() || !locale.trim()) {
      setError("Title, body, and locale are required.");
      return;
    }
    setLoading(true);
    setError("");
    try {
      await octaviaClient.createContent({ title, body, locale });
      setTitle("");
      setBody("");
      await refresh();
    } catch (e) {
      setError((e as Error).message);
    } finally {
      setLoading(false);
    }
  };

  const publish = async (id: string) => {
    setLoading(true);
    setError("");
    try {
      await octaviaClient.publishContent(id);
      await refresh();
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
      await octaviaClient.submitForm(formId, { email });
      setEmail("");
    } catch (e) {
      setError((e as Error).message);
    } finally {
      setLoading(false);
    }
  };

  return (
    <main
      style={{ fontFamily: "sans-serif", maxWidth: 820, margin: "2rem auto" }}
    >
      <h1>Octavia AI CMS — React Vite</h1>
      {error && <p style={{ color: "crimson" }}>{error}</p>}
      <section>
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
        <input
          placeholder="Locale"
          value={locale}
          onChange={(e) => setLocale(e.target.value)}
        />
        <br />
        <button disabled={loading} onClick={() => void create()}>
          Create
        </button>{" "}
        <button disabled={loading} onClick={() => void refresh()}>
          Refresh
        </button>
      </section>
      <ul>
        {items.map((item) => (
          <li key={item.id}>
            <strong>{item.title}</strong> ({item.locale}) - {item.status}{" "}
            <button
              disabled={item.status === "published" || loading}
              onClick={() => void publish(item.id)}
            >
              Publish
            </button>
          </li>
        ))}
      </ul>
      <hr />
      <section>
        <h2>Form Demo</h2>
        <p>Available forms: {forms.length}</p>
        <input
          placeholder="Form ID"
          value={formId}
          onChange={(e) => setFormId(e.target.value)}
        />
        <br />
        <input
          placeholder="Email"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
        />
        <br />
        <button disabled={loading} onClick={() => void submitForm()}>
          Submit Form
        </button>
      </section>
    </main>
  );
}
