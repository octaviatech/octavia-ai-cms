const express = require('express');
const cors = require('cors');
require('dotenv').config();
const app = express();
app.use(cors()); app.use(express.json());
const base = (process.env.OCTAVIA_API_BASE_URL || '').replace(/\/$/, '');
const headers = { 'Content-Type': 'application/json', Authorization: `Bearer ${process.env.OCTAVIA_API_KEY}`, 'x-octavia-project-id': process.env.OCTAVIA_PROJECT_ID || '' };
async function forward(path, init = {}) { const res = await fetch(`${base}${path}`, { ...init, headers: { ...headers, ...(init.headers || {}) } }); const body = await res.text(); if (!res.ok) throw new Error(`Octavia request failed: ${res.status} ${body}`); return JSON.parse(body); }
app.get('/demo/content', async (_, r) => { try { r.json(await forward('/v1/cms/content')); } catch (e) { r.status(500).json({ error: e.message }); } });
app.post('/demo/content', async (q, r) => { try { r.json(await forward('/v1/cms/content', { method: 'POST', body: JSON.stringify(q.body) })); } catch (e) { r.status(500).json({ error: e.message }); } });
app.post('/demo/content/:id/publish', async (q, r) => { try { r.json(await forward(`/v1/cms/content/${q.params.id}/publish`, { method: 'POST' })); } catch (e) { r.status(500).json({ error: e.message }); } });
app.listen(4000, () => console.log('Proxy on http://localhost:4000'));
