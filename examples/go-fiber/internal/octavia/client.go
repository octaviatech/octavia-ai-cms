package octavia

import (
	"os"
	"time"

	sdk "github.com/octaviatech/octavia-ai-cms/packages/sdk-go/sdk"
)

// Client is a thin wrapper over the official Octavia Go SDK. The SDK is the
// only thing that talks to the API — this file gives the Fiber routes typed
// inputs and a small, JSON-ready output shape.
//
// The API key is the only credential: the SDK sends it as the `x-api-key`
// header and the gateway resolves the tenant from it. There is no second
// header, and no project id to configure.
type Client struct {
	cms *sdk.CMS
}

// Content is the row shape the routes hand to the page. It is deliberately
// flat so the browser can render it without knowing the API model.
type Content struct {
	ID        string `json:"id"`
	Title     string `json:"title"`
	Body      string `json:"body"`
	Locale    string `json:"locale"`
	Status    string `json:"status"`
	CreatedAt string `json:"createdAt"`
}

// FormItem is the subset of a form the page shows.
type FormItem struct {
	ID    string `json:"id"`
	Title string `json:"title"`
	Slug  string `json:"slug"`
}

// APIError is a failed SDK response with the status the server reported, so
// the HTTP layer can mirror it instead of flattening everything to 400.
type APIError struct {
	Status  int
	Message string
}

func (e *APIError) Error() string { return e.Message }

// apiError turns a failed response into an APIError. It is a function rather
// than a method because Go does not allow a method to introduce its own type
// parameters.
func apiError[T any](res sdk.CMSResponse[T]) error {
	if res.Error != nil {
		return &APIError{Status: res.Error.StatusCode, Message: res.Error.Message}
	}
	return &APIError{Message: "Octavia SDK request failed"}
}

// NewClient builds the SDK client. OCTAVIA_API_KEY is the only required
// variable; Create reads the category and author ids per call.
func NewClient() (*Client, error) {
	cms, err := sdk.InitCMS(os.Getenv("OCTAVIA_API_KEY"), &sdk.CMSOptions{
		Timeout:      10 * time.Second,
		ThrowOnError: false,
	})
	if err != nil {
		return nil, err
	}
	return &Client{cms: cms}, nil
}

// The API stores text as a map from language code to string. These examples
// register `en` and `fa`, so read the first locale that is actually present
// rather than assuming one.
func pickText(values sdk.MultilingualString) (text, locale string) {
	for _, candidate := range []string{"en", "fa"} {
		if values[candidate] != "" {
			return values[candidate], candidate
		}
	}
	for lang, v := range values {
		if v != "" {
			return v, lang
		}
	}
	return "", "en"
}

func statusOf(isPublished bool) string {
	if isPublished {
		return "published"
	}
	return "draft"
}

func mapContent(id string, title, body sdk.MultilingualString, isPublished bool, createdAt string) Content {
	text, locale := pickText(title)
	bodyText, _ := pickText(body)
	return Content{
		ID:        id,
		Title:     text,
		Body:      bodyText,
		Locale:    locale,
		Status:    statusOf(isPublished),
		CreatedAt: createdAt,
	}
}

// List returns the first page of articles.
//
// Rows come back under a resource-specific key — `articleListItem`, not
// `items`. The list endpoint does not return `content`, so Body is empty
// here; Create and Publish return the full document.
func (c *Client) List() ([]Content, error) {
	res := c.cms.Article.GetAll(map[string]any{"page": 1, "limit": 20, "sortOrder": "desc"})
	if !res.Ok {
		return nil, apiError(res)
	}
	rows := make([]Content, 0, len(res.Data.ArticleListItem))
	for _, item := range res.Data.ArticleListItem {
		rows = append(rows, Content{
			ID:        item.ID,
			Title:     pick(item.MainTitle),
			Locale:    localeOf(item.MainTitle),
			Status:    statusOf(item.IsPublished),
			CreatedAt: item.CreatedAt,
		})
	}
	return rows, nil
}

func pick(values sdk.MultilingualString) string {
	text, _ := pickText(values)
	return text
}

func localeOf(values sdk.MultilingualString) string {
	_, locale := pickText(values)
	return locale
}

// Create stores a draft article. Only mainTitle, content and category are
// required by the API, and unknown fields are rejected — so the body carries
// `content`, never `body`.
func (c *Client) Create(title, body, locale string) (*Content, error) {
	lang := "en"
	if len(locale) >= 2 {
		lang = locale[:2]
	}
	payload := map[string]any{
		"mainTitle": sdk.MultilingualString{lang: title},
		"content":   sdk.MultilingualString{lang: body},
		// category is an array of IDs, even for a single category.
		"category":    []string{os.Getenv("OCTAVIA_CATEGORY_ID")},
		"isPublished": false,
	}
	if author := os.Getenv("OCTAVIA_AUTHOR_ID"); author != "" {
		payload["author"] = author
	}

	res := c.cms.Article.Create(payload, nil)
	if !res.Ok {
		return nil, apiError(res)
	}
	row := mapContent(res.Data.Article.ID, res.Data.Article.MainTitle,
		res.Data.Article.Content, res.Data.Article.IsPublished, res.Data.Article.CreatedAt)
	return &row, nil
}

// Publish flips isPublished. There is no publish endpoint — `Archive` exists
// and soft-deletes (isDeleted=true), so it must not be used for this.
func (c *Client) Publish(id string) (*Content, error) {
	res := c.cms.Article.Update(map[string]any{"id": id, "isPublished": true}, nil)
	if !res.Ok {
		return nil, apiError(res)
	}
	one := c.cms.Article.GetById(id, nil)
	if !one.Ok {
		return nil, apiError(one)
	}
	row := mapContent(one.Data.Article.ID, one.Data.Article.MainTitle,
		one.Data.Article.Content, one.Data.Article.IsPublished, one.Data.Article.CreatedAt)
	return &row, nil
}

// ListForms returns the first page of forms.
//
// Rows come back under `formListItem`. The generated row type in this SDK
// version carries no fields, so this reads the same payload into the
// full sdk.Form model through the SDK's own RequestInto — still the SDK
// doing the request, not a hand-rolled one.
func (c *Client) ListForms() ([]FormItem, error) {
	res := sdk.RequestInto[struct {
		FormListItem []sdk.Form `json:"formListItem"`
	}](c.cms.Raw, "GET", "/forms/getAll", map[string]any{"page": 1, "limit": 20}, nil)

	if !res.Ok {
		return nil, apiError(res)
	}
	rows := make([]FormItem, 0, len(res.Data.FormListItem))
	for _, form := range res.Data.FormListItem {
		rows = append(rows, FormItem{
			ID:    form.ID,
			Title: pick(form.Title),
			Slug:  form.Slug,
		})
	}
	return rows, nil
}

// SubmitForm records a submission against a form. The form id is a path
// argument and the body carries the language and the field values.
//
// The response model of IdSubmit is opaque in this SDK version, so this
// reports what was submitted rather than a submission id it cannot read.
func (c *Client) SubmitForm(formID string, values map[string]any, language string) (map[string]any, error) {
	if language == "" {
		language = "en"
	}
	res := c.cms.FormSubmission.IdSubmit(formID, map[string]any{
		"language": language,
		"values":   values,
	}, nil)
	if !res.Ok {
		return nil, apiError(res)
	}
	return map[string]any{"formId": formID, "language": language, "values": values}, nil
}

// GetStatistics reports the tenant's usage counters.
func (c *Client) GetStatistics() (*sdk.TenantUsageStats, error) {
	res := c.cms.Report.GetStatistics(nil)
	if !res.Ok {
		return nil, apiError(res)
	}
	return &res.Data, nil
}

// Summarize shortens a piece of text.
func (c *Client) Summarize(text string) (*sdk.AiSummaryResult, error) {
	res := c.cms.AI.Summarize(map[string]any{"text": text, "maxWords": 80}, nil)
	if !res.Ok {
		return nil, apiError(res)
	}
	return &res.Data, nil
}
