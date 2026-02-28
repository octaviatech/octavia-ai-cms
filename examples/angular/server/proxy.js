const express = require('express');
const cors = require('cors');
const CMS = require('@octaviatech/cms').default;
require('dotenv').config();
const app = express();
app.use(cors()); app.use(express.json());

const cms = CMS.init(process.env.OCTAVIA_API_KEY || '', { timeoutMs: 10000 });

const mapArticle = (a) => ({
  id: a?.id || a?._id || '',
  title: a?.mainTitle?.en || a?.mainTitle?.fa || '',
  body: a?.body?.en || a?.body?.fa || '',
  locale: a?.mainTitle?.fa ? 'fa' : 'en',
  status: a?.isPublished ? 'published' : 'draft',
  createdAt: a?.createdAt || '',
});

app.get('/demo/content', async (_, r) => {
  try {
    const out = await cms.article.getAll({ page: 1, limit: 20, sortOrder: 'desc' });
    if (!out.ok) return r.status(400).json({ error: out.error?.message || 'Request failed' });
    const items = Array.isArray(out.data?.items) ? out.data.items.map(mapArticle) : [];
    r.json(items);
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.post('/demo/content', async (q, r) => {
  try {
    const lang = q.body?.locale?.startsWith('fa') ? 'fa' : 'en';
    const payload = {
      mainTitle: { [lang]: q.body?.title || 'Untitled' },
      body: { [lang]: q.body?.body || '' },
      category: process.env.OCTAVIA_CATEGORY_ID || 'CATEGORY_ID',
      author: process.env.OCTAVIA_AUTHOR_ID || 'AUTHOR_ID',
    };
    const out = await cms.article.create(payload);
    if (!out.ok) return r.status(400).json({ error: out.error?.message || 'Request failed' });
    r.json(mapArticle(out.data));
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.post('/demo/content/:id/publish', async (q, r) => {
  try {
    const out = await cms.article.archive({ id: q.params.id });
    if (!out.ok) return r.status(400).json({ error: out.error?.message || 'Request failed' });
    r.json(out.data);
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.get('/demo/forms', async (_, r) => {
  try {
    const out = await cms.form.getAll({ page: 1, limit: 20 });
    if (!out.ok) return r.status(400).json({ error: out.error?.message || 'Request failed' });
    const items = Array.isArray(out.data?.items)
      ? out.data.items.map((f) => ({
          id: f?.id || f?._id || '',
          title: f?.title?.en || f?.title?.fa || '',
          slug: f?.slug || '',
        }))
      : [];
    r.json(items);
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.post('/demo/forms/:id/submit', async (q, r) => {
  try {
    const out = await cms.formSubmission.createSubmission({
      formId: q.params.id,
      language: q.body?.language || 'en',
      values: q.body || {},
    });
    if (!out.ok) return r.status(400).json({ error: out.error?.message || 'Request failed' });
    r.json(out.data);
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.get('/demo/reports/statistics', async (_, r) => {
  try {
    const out = await cms.report.getStatistics();
    if (!out.ok) return r.status(400).json({ error: out.error?.message || 'Request failed' });
    r.json(out.data);
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.post('/demo/ai/summarize', async (q, r) => {
  try {
    const out = await cms.ai.summarize(q.body || {});
    if (!out.ok) return r.status(400).json({ error: out.error?.message || 'Request failed' });
    r.json(out.data);
  } catch (e) {
    r.status(500).json({ error: e.message });
  }
});

app.listen(4000, () => console.log('Proxy on http://localhost:4000'));
