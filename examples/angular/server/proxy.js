const express = require('express');
const cors = require('cors');
const CMS = require('@octaviatech/cms').default;
require('dotenv').config();
const app = express();
app.use(cors());
app.use(express.json());

// The API key is the only credential. It is read here, on the server, and never
// reaches the browser — this proxy is the reason the Angular app is safe to ship.
const cms = CMS.init(process.env.OCTAVIA_API_KEY || '', { timeoutMs: 10000 });

// The API returns a multilingual map. Read the first locale that is present
// rather than assuming one, since only registered locales can exist.
const pickText = (value) => {
  const map = value || {};
  for (const locale of ['en', 'fa']) {
    if (typeof map[locale] === 'string' && map[locale]) return { text: map[locale], locale };
  }
  const first = Object.values(map).find((v) => typeof v === 'string' && v);
  return { text: typeof first === 'string' ? first : '', locale: 'en' };
};

const mapArticle = (a) => {
  const title = pickText(a?.mainTitle);
  const body = pickText(a?.content);
  return {
    id: a?._id || '',
    title: title.text,
    body: body.text,
    locale: title.locale,
    status: a?.isPublished ? 'published' : 'draft',
    createdAt: a?.createdAt || '',
  };
};

const fail = (r, out) =>
  r.status(out.statusCode || 400).json({ error: out.error?.message || 'Request failed' });

app.get('/demo/content', async (_, r) => {
  try {
    const out = await cms.article.getAll({ query: { page: 1, limit: 20, sortOrder: 'desc' } });
    if (!out.ok) return fail(r, out);
    // List rows are keyed by resource name, not `items`.
    r.json((out.data?.articleListItem || []).map(mapArticle));
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.post('/demo/content', async (q, r) => {
  try {
    const lang = (q.body?.locale || 'en').slice(0, 2);
    const out = await cms.article.create({
      mainTitle: { [lang]: q.body?.title || 'Untitled' },
      content: { [lang]: q.body?.body || '' },
      // `category` is an array of IDs even for a single category.
      category: [process.env.OCTAVIA_CATEGORY_ID || ''],
      author: process.env.OCTAVIA_AUTHOR_ID || '',
      isPublished: false,
    });
    if (!out.ok) return fail(r, out);
    r.json(mapArticle(out.data));
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

// There is no publish endpoint. Publishing is a field update; `archive` is a
// soft-delete and must not be used here.
app.post('/demo/content/:id/publish', async (q, r) => {
  try {
    const out = await cms.article.update({ id: q.params.id, isPublished: true });
    if (!out.ok) return fail(r, out);
    r.json(mapArticle(out.data));
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

// `form.getAll` returns only a submissions count per form — no id, title or
// slug — so it cannot drive a form picker. `getById` returns the real form.
app.get('/demo/forms/:id', async (q, r) => {
  try {
    const out = await cms.form.getById(q.params.id);
    if (!out.ok) return fail(r, out);
    const form = out.data?.form;
    if (!form) return r.status(404).json({ error: 'Form not found' });
    r.json({
      id: form._id || '',
      title: pickText(form.title).text,
      slug: form.slug || '',
      isActive: Boolean(form.isActive),
      sections: Array.isArray(form.sections) ? form.sections.length : 0,
    });
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.post('/demo/forms/:id/submit', async (q, r) => {
  try {
    const { language = 'en', ...values } = q.body || {};
    const out = await cms.formSubmission.idSubmit(q.params.id, { language, values });
    if (!out.ok) return fail(r, out);
    r.json(out.data);
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.get('/demo/reports/statistics', async (_, r) => {
  try {
    const out = await cms.report.getStatistics();
    if (!out.ok) return fail(r, out);
    r.json(out.data);
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.post('/demo/ai/summarize', async (q, r) => {
  try {
    const out = await cms.ai.summarize({ text: q.body?.text || '', maxWords: 80 });
    if (!out.ok) return fail(r, out);
    r.json(out.data);
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.listen(4000, () => console.log('Proxy on http://localhost:4000'));
