package main

import (
	"encoding/json"
	"errors"
	"log"

	"octavia-go-fiber-example/internal/octavia"

	"github.com/gofiber/fiber/v2"
)

func main() {
	app := fiber.New()
	client, err := octavia.NewClient()
	if err != nil {
		log.Fatal(err)
	}

	// The routes mirror the four steps every example in this folder shows:
	// list, create, publish, submit. The last two add AI and reports.
	app.Get("/api/content", func(c *fiber.Ctx) error {
		rows, err := client.List()
		if err != nil {
			return fail(c, err)
		}
		return c.JSON(rows)
	})
	app.Post("/api/content", func(c *fiber.Ctx) error {
		var payload struct {
			Title  string `json:"title"`
			Body   string `json:"body"`
			Locale string `json:"locale"`
		}
		if err := json.Unmarshal(c.Body(), &payload); err != nil {
			return fail(c, err)
		}
		row, err := client.Create(payload.Title, payload.Body, payload.Locale)
		if err != nil {
			return fail(c, err)
		}
		return c.JSON(row)
	})
	app.Post("/api/content/:id/publish", func(c *fiber.Ctx) error {
		row, err := client.Publish(c.Params("id"))
		if err != nil {
			return fail(c, err)
		}
		return c.JSON(row)
	})
	app.Get("/api/forms", func(c *fiber.Ctx) error {
		rows, err := client.ListForms()
		if err != nil {
			return fail(c, err)
		}
		return c.JSON(rows)
	})
	app.Post("/api/forms/:id/submit", func(c *fiber.Ctx) error {
		var payload struct {
			Language string         `json:"language"`
			Values   map[string]any `json:"values"`
		}
		if err := json.Unmarshal(c.Body(), &payload); err != nil {
			return fail(c, err)
		}
		out, err := client.SubmitForm(c.Params("id"), payload.Values, payload.Language)
		if err != nil {
			return fail(c, err)
		}
		return c.JSON(out)
	})
	app.Get("/api/reports/statistics", func(c *fiber.Ctx) error {
		stats, err := client.GetStatistics()
		if err != nil {
			return fail(c, err)
		}
		return c.JSON(stats)
	})
	app.Post("/api/ai/summarize", func(c *fiber.Ctx) error {
		var payload struct {
			Text string `json:"text"`
		}
		if err := json.Unmarshal(c.Body(), &payload); err != nil {
			return fail(c, err)
		}
		out, err := client.Summarize(payload.Text)
		if err != nil {
			return fail(c, err)
		}
		return c.JSON(out)
	})

	app.Get("/", func(c *fiber.Ctx) error {
		return c.Type("html").SendString(page)
	})

	log.Fatal(app.Listen(":8080"))
}

// fail turns an SDK error into a JSON error, mirroring the status the API
// reported so the browser can tell a 400 from a 404.
func fail(c *fiber.Ctx, err error) error {
	status := fiber.StatusBadRequest
	var apiErr *octavia.APIError
	if errors.As(err, &apiErr) && apiErr.Status >= 400 && apiErr.Status < 600 {
		status = apiErr.Status
	}
	return c.Status(status).JSON(map[string]string{"error": err.Error()})
}

const page = `<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Octavia AI CMS — Go Fiber example</title>
<style>
  body { font: 15px/1.5 system-ui, sans-serif; margin: 2rem auto; max-width: 60rem; padding: 0 1rem; }
  h1 { font-size: 1.4rem; }
  section { border: 1px solid #d4d4d8; border-radius: 6px; padding: 1rem; margin-bottom: 1rem; }
  h2 { font-size: 1rem; margin-top: 0; }
  input, textarea, select, button { font: inherit; padding: .35rem .5rem; }
  textarea { width: 100%; min-height: 5rem; }
  pre { background: #f4f4f5; padding: .75rem; overflow-x: auto; border-radius: 4px; }
  .row { display: flex; gap: .5rem; flex-wrap: wrap; align-items: center; }
  .tag { font-size: .75rem; border-radius: 999px; padding: .1rem .5rem; background: #e4e4e7; }
  .tag.published { background: #bbf7d0; }
</style>
</head>
<body>
<h1>Octavia AI CMS — Go Fiber example</h1>
<p>The key is read from <code>OCTAVIA_API_KEY</code> on the server. This page only
calls this app's own <code>/api</code> routes; the key is never sent to the browser.</p>

<section>
  <h2>1. List articles</h2>
  <div class="row"><button onclick="call('GET','/api/content')">Load articles</button></div>
  <pre id="articles">—</pre>
</section>

<section>
  <h2>2. Create an article</h2>
  <p>Sends <code>mainTitle</code>, <code>content</code> and a <code>category</code> array.</p>
  <div class="row">
    <input id="title" placeholder="Title" size="30">
    <select id="locale"><option>en</option><option>fa</option></select>
  </div>
  <p><textarea id="body" placeholder="Content"></textarea></p>
  <div class="row">
    <button onclick="create()">Create draft</button>
    <span id="created"></span>
  </div>
  <pre id="createOut">—</pre>
</section>

<section>
  <h2>3. Publish</h2>
  <p>There is no publish endpoint — publishing sets <code>isPublished</code> through update.</p>
  <div class="row">
    <input id="publishId" placeholder="Article ID" size="36">
    <button onclick="publish()">Publish</button>
  </div>
  <pre id="publishOut">—</pre>
</section>

<section>
  <h2>4. Submit a form</h2>
  <div class="row">
    <button onclick="call('GET','/api/forms')">Load forms</button>
    <input id="formId" placeholder="Form ID" size="36">
    <input id="fieldName" placeholder="field name" value="email">
    <input id="fieldValue" placeholder="field value" value="dev@example.com">
    <button onclick="submit()">Submit</button>
  </div>
  <pre id="forms">—</pre>
</section>

<section>
  <h2>5. AI summary and reports</h2>
  <div class="row">
    <input id="summaryText" placeholder="Text to summarize" size="40"
           value="The Octavia AI CMS API is authenticated with a single x-api-key header.">
    <button onclick="summarize()">Summarize</button>
    <button onclick="call('GET','/api/reports/statistics')">Statistics</button>
  </div>
  <pre id="extra">—</pre>
</section>

<script>
let lastId = "";

async function call(method, path, body) {
  const res = await fetch(path, {
    method,
    headers: { "Content-Type": "application/json" },
    body: body ? JSON.stringify(body) : undefined,
  });
  const json = await res.json().catch(() => ({}));
  return { ok: res.ok, json };
}

function show(id, data) {
  document.getElementById(id).textContent = JSON.stringify(data, null, 2);
}

async function create() {
  const out = await call("POST", "/api/content", {
    title: document.getElementById("title").value,
    body: document.getElementById("body").value,
    locale: document.getElementById("locale").value,
  });
  show("createOut", out.json);
  lastId = out.json.id || "";
  document.getElementById("publishId").value = lastId;
  document.getElementById("created").textContent = out.ok ? "draft created" : "failed";
}

async function publish() {
  const id = document.getElementById("publishId").value || lastId;
  const out = await call("POST", "/api/content/" + id + "/publish");
  show("publishOut", out.json);
  listArticles();
}

async function submit() {
  const values = { [document.getElementById("fieldName").value]: document.getElementById("fieldValue").value };
  const out = await call("POST", "/api/forms/" + document.getElementById("formId").value + "/submit",
                         { language: "en", values });
  show("extra", out.json);
}

async function summarize() {
  const out = await call("POST", "/api/ai/summarize", { text: document.getElementById("summaryText").value });
  show("extra", out.json);
}

async function listArticles() {
  const out = await call("GET", "/api/content");
  const rows = Array.isArray(out.json) ? out.json : [];
  show("articles", rows);
  const forms = await call("GET", "/api/forms");
  const formRows = Array.isArray(forms.json) ? forms.json : [];
  show("forms", formRows);
  if (formRows[0]) document.getElementById("formId").value = formRows[0].id;
}

listArticles();
</script>
</body>
</html>
`
