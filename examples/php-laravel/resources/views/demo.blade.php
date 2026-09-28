<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Octavia AI CMS — Laravel</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 820px; margin: 2rem auto; line-height: 1.5; }
        fieldset { border: 1px solid #ddd; border-radius: 6px; margin-bottom: 1.5rem; }
        legend { font-weight: 600; }
        input, textarea, button { font: inherit; padding: 0.4rem; }
        textarea { width: 100%; }
        button { cursor: pointer; }
        .error { color: crimson; }
        .muted { color: #666; }
        ul { padding-left: 1.2rem; }
        li { margin-bottom: 0.35rem; }
    </style>
</head>
<body>
<h1>Octavia AI CMS — Laravel</h1>

{{--
    This page calls this app's own routes only. The API key lives on the
    server, in the controller, and is never shipped to the browser. Never read
    an API key from a Blade view or any client-side code.
--}}

<p id="error" class="error"></p>

<fieldset>
    <legend>Article</legend>
    <label>Title <input id="title" placeholder="Title" /></label><br />
    <label>Body <textarea id="body" rows="3" placeholder="Body"></textarea></label>
    <label>Locale <input id="locale" value="en-US" /></label>
    <p>
        <button type="button" id="create">Create</button>
        <button type="button" id="refresh">Refresh</button>
    </p>
    <ul id="list"></ul>
</fieldset>

<fieldset>
    <legend>AI summary</legend>
    <textarea id="summarizeText" rows="3" placeholder="Text to summarize"></textarea>
    <p><button type="button" id="summarize">Summarize</button></p>
    <p id="summary" class="muted"></p>
</fieldset>

<fieldset>
    <legend>Tenant statistics</legend>
    <p><button type="button" id="loadStats">Load statistics</button></p>
    <pre id="stats" class="muted"></pre>
</fieldset>

<fieldset>
    <legend>Form submission</legend>
    <p class="muted">
        A form is fetched by id. <code>forms/getAll</code> returns only a
        submissions count per form, so it cannot drive a picker.
    </p>
    <label>Form id <input id="formId" placeholder="24-hex form id" /></label>
    <p><button type="button" id="loadForm">Load form</button></p>
    <p id="formInfo" class="muted"></p>
    <label>Field values (JSON)</label>
    <textarea id="formValues" rows="3">{"fullName":"John Doe","email":"john@example.com"}</textarea>
    <p><button type="button" id="submitForm">Submit</button></p>
</fieldset>

<script>
    // Every request here goes to this Laravel app, which proxies it to the CMS
    // with the PHP SDK. The browser holds no credential of any kind.
    const $ = (id) => document.getElementById(id);

    function showError(err) {
        $('error').textContent = err instanceof Error ? err.message : String(err);
    }

    async function call(url, init) {
        const res = await fetch(url, init);
        const body = await res.json();
        if (!res.ok) {
            throw new Error(body.error || `Request failed with status ${res.status}`);
        }
        return body;
    }

    const json = (payload) => ({
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload),
    });

    async function refreshContent() {
        try {
            const data = await call('/demo/content');
            const items = Array.isArray(data) ? data : data.items;
            const list = $('list');
            // Built with DOM nodes, not innerHTML, so article text is never
            // interpreted as markup.
            list.replaceChildren(...items.map((item) => {
                const li = document.createElement('li');
                const title = document.createElement('strong');
                title.textContent = item.title;
                const status = document.createElement('em');
                status.textContent = ` (${item.status})`;
                const body = document.createElement('div');
                body.className = 'muted';
                body.textContent = item.body || '';
                const publish = document.createElement('button');
                publish.type = 'button';
                publish.textContent = 'Publish';
                publish.disabled = item.status === 'published';
                publish.addEventListener('click', () => publishContent(item.id));
                li.append(title, status, body, publish);
                return li;
            }));
        } catch (err) {
            showError(err);
        }
    }

    async function createContent() {
        $('error').textContent = '';
        const title = $('title').value;
        const body = $('body').value;
        const locale = $('locale').value;
        if (!title || !body || !locale) {
            $('error').textContent = 'All fields are required.';
            return;
        }
        try {
            await call('/demo/content', json({ title, body, locale }));
            $('title').value = '';
            $('body').value = '';
            await refreshContent();
        } catch (err) {
            showError(err);
        }
    }

    async function publishContent(id) {
        try {
            await call(`/demo/content/${encodeURIComponent(id)}/publish`, { method: 'POST' });
            await refreshContent();
        } catch (err) {
            showError(err);
        }
    }

    async function summarize() {
        try {
            const data = await call('/demo/ai/summarize', json({
                text: $('summarizeText').value,
                maxWords: 80,
            }));
            $('summary').textContent = data.summary || '(empty)';
        } catch (err) {
            showError(err);
        }
    }

    async function loadStats() {
        try {
            $('stats').textContent = JSON.stringify(await call('/demo/reports/statistics'), null, 2);
        } catch (err) {
            showError(err);
        }
    }

    async function loadForm() {
        try {
            const form = await call(`/demo/forms/${encodeURIComponent($('formId').value.trim())}`);
            $('formInfo').textContent = `${form.title} (slug: ${form.slug}, sections: ${form.sections})`;
        } catch (err) {
            showError(err);
        }
    }

    async function submitForm() {
        try {
            let values;
            try {
                values = JSON.parse($('formValues').value);
            } catch {
                throw new Error('Field values must be valid JSON.');
            }
            await call(`/demo/forms/${encodeURIComponent($('formId').value.trim())}/submit`,
                json({ language: 'en', values }));
            $('formInfo').textContent = 'Submission accepted.';
        } catch (err) {
            showError(err);
        }
    }

    $('create').addEventListener('click', createContent);
    $('refresh').addEventListener('click', refreshContent);
    $('summarize').addEventListener('click', summarize);
    $('loadStats').addEventListener('click', loadStats);
    $('loadForm').addEventListener('click', loadForm);
    $('submitForm').addEventListener('click', submitForm);

    refreshContent();
</script>
</body>
</html>
