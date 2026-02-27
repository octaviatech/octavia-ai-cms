package octavia

import (
	"encoding/json"
	"os"
	"time"

	cmssdk "github.com/alex-yaghoubi/Octavia-Blog-service/packages/sdk-go/sdk"
)

type Client struct {
	cms *cmssdk.CMS
}

type Content struct {
	ID        string `json:"id"`
	Title     string `json:"title"`
	Body      string `json:"body"`
	Locale    string `json:"locale"`
	Status    string `json:"status"`
	CreatedAt string `json:"createdAt"`
}

func NewClient() (*Client, error) {
	cms, err := cmssdk.InitCMS(os.Getenv("OCTAVIA_API_KEY"), &cmssdk.CMSOptions{
		Timeout:      10 * time.Second,
		ThrowOnError: false,
	})
	if err != nil {
		return nil, err
	}
	return &Client{cms: cms}, nil
}

func mapArticle(a map[string]any) Content {
	id, _ := a["id"].(string)
	if id == "" {
		if v, ok := a["_id"].(string); ok {
			id = v
		}
	}
	mainTitle, _ := a["mainTitle"].(map[string]any)
	bodyMap, _ := a["body"].(map[string]any)
	title, _ := mainTitle["en"].(string)
	if title == "" {
		title, _ = mainTitle["fa"].(string)
	}
	body, _ := bodyMap["en"].(string)
	if body == "" {
		body, _ = bodyMap["fa"].(string)
	}
	createdAt, _ := a["createdAt"].(string)
	isPublished, _ := a["isPublished"].(bool)
	locale := "en"
	if _, ok := mainTitle["fa"]; ok {
		locale = "fa"
	}
	status := "draft"
	if isPublished {
		status = "published"
	}
	return Content{
		ID: id, Title: title, Body: body, Locale: locale, Status: status, CreatedAt: createdAt,
	}
}

func encode(v any) []byte {
	b, _ := json.Marshal(v)
	return b
}

func (c *Client) ListContent() ([]byte, int) {
	out := c.cms.Article.GetAll(map[string]any{"page": 1, "limit": 20, "sortOrder": "desc"})
	if !out.Ok {
		return encode(map[string]any{"error": out.Error.Message}), 400
	}
	data, _ := out.Data.(map[string]any)
	rawItems, _ := data["items"].([]any)
	items := make([]Content, 0, len(rawItems))
	for _, it := range rawItems {
		if m, ok := it.(map[string]any); ok {
			items = append(items, mapArticle(m))
		}
	}
	return encode(items), 200
}

func (c *Client) CreateContent(payload map[string]any) ([]byte, int) {
	title, _ := payload["title"].(string)
	body, _ := payload["body"].(string)
	locale, _ := payload["locale"].(string)
	lang := "en"
	if len(locale) >= 2 && locale[:2] == "fa" {
		lang = "fa"
	}
	out := c.cms.Article.Create(map[string]any{
		"mainTitle": map[string]any{lang: title},
		"body":      map[string]any{lang: body},
		"category":  os.Getenv("OCTAVIA_CATEGORY_ID"),
		"author":    os.Getenv("OCTAVIA_AUTHOR_ID"),
	}, nil)
	if !out.Ok {
		return encode(map[string]any{"error": out.Error.Message}), 400
	}
	article, _ := out.Data.(map[string]any)
	return encode(mapArticle(article)), 200
}

func (c *Client) PublishContent(id string) ([]byte, int) {
	out := c.cms.Article.Archive(map[string]any{"id": id}, nil)
	if !out.Ok {
		return encode(map[string]any{"error": out.Error.Message}), 400
	}
	one := c.cms.Article.GetById(id, nil)
	if !one.Ok {
		return encode(map[string]any{"error": one.Error.Message}), 400
	}
	article, _ := one.Data.(map[string]any)
	return encode(mapArticle(article)), 200
}

