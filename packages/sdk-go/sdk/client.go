package sdk

import (
	"bytes"
	"encoding/json"
	"errors"
	"io"
	"net/http"
	"net/url"
	"strings"
	"time"
)

type ApiError struct {
	Status  int
	Payload []byte
	Message string
}

func (e *ApiError) Error() string { return e.Message }

type CMSError struct {
	Message    string `json:"message"`
	StatusCode int    `json:"statusCode,omitempty"`
}

type CMSMeta struct {
	Pagination any `json:"pagination,omitempty"`
}

// CMSResponse is the envelope every endpoint answers with. T is the payload
// model; endpoints whose payload is a free-form object use any.
type CMSResponse[T any] struct {
	Ok    bool      `json:"ok"`
	Data  T         `json:"data"`
	Error *CMSError `json:"error,omitempty"`
	Meta  *CMSMeta  `json:"meta,omitempty"`
}

type ClientConfig struct {
	BaseURL      string
	ApiKey       string
	Timeout      time.Duration
	ThrowOnError bool
}

type Client struct {
	AI              *AIResource
	AIConversation  *AIConversationResource
	Articles        *ArticlesResource
	Authors         *AuthorsResource
	Categories      *CategoriesResource
	Forms           *FormsResource
	FormSubmissions *FormSubmissionsResource
	Languages       *LanguagesResource
	Reports         *ReportsResource
	Subcategories   *SubcategoriesResource
	Tags            *TagsResource
	config          ClientConfig
	http            *http.Client
}

func NewClient(cfg ClientConfig) (*Client, error) {
	if cfg.BaseURL == "" {
		return nil, errors.New("baseUrl is required")
	}
	if cfg.ApiKey == "" {
		return nil, errors.New("apiKey is required")
	}
	if cfg.Timeout == 0 {
		cfg.Timeout = 30 * time.Second
	}

	client := &Client{config: cfg, http: &http.Client{Timeout: cfg.Timeout}}
	client.AI = &AIResource{client: client}
	client.AIConversation = &AIConversationResource{client: client}
	client.Articles = &ArticlesResource{client: client}
	client.Authors = &AuthorsResource{client: client}
	client.Categories = &CategoriesResource{client: client}
	client.Forms = &FormsResource{client: client}
	client.FormSubmissions = &FormSubmissionsResource{client: client}
	client.Languages = &LanguagesResource{client: client}
	client.Reports = &ReportsResource{client: client}
	client.Subcategories = &SubcategoriesResource{client: client}
	client.Tags = &TagsResource{client: client}
	return client, nil
}

// Request sends an untyped call, for endpoints the generated resources do not
// cover. Typed callers use RequestInto.
func (c *Client) Request(method, path string, query map[string]any, body any) CMSResponse[any] {
	return RequestInto[any](c, method, path, query, body)
}

// RequestInto sends the request and decodes the envelope's data into T. Every
// resource method names the model its endpoint returns, so a renamed or dropped
// field surfaces here rather than as a zero value at the call site.
//
// A function rather than a method: Go does not allow a method to introduce its
// own type parameters.
func RequestInto[T any](c *Client, method, path string, query map[string]any, body any) CMSResponse[T] {
	fullURL := c.config.BaseURL + path + buildQuery(query)

	var buf io.Reader
	if body != nil {
		b, err := json.Marshal(body)
		if err != nil {
			return CMSResponse[T]{Ok: false, Error: &CMSError{Message: err.Error()}}
		}
		buf = bytes.NewReader(b)
	}

	req, err := http.NewRequest(method, fullURL, buf)
	if err != nil {
		return CMSResponse[T]{Ok: false, Error: &CMSError{Message: err.Error()}}
	}

	req.Header.Set("Content-Type", "application/json")
	req.Header.Set("x-api-key", c.config.ApiKey)

	resp, err := c.http.Do(req)
	if err != nil {
		return CMSResponse[T]{Ok: false, Error: &CMSError{Message: err.Error()}}
	}
	defer resp.Body.Close()

	payload, err := io.ReadAll(resp.Body)
	if err != nil {
		return CMSResponse[T]{Ok: false, Error: &CMSError{Message: err.Error()}}
	}

	if resp.StatusCode < 200 || resp.StatusCode >= 300 {
		msg := "Request failed"
		var parsed map[string]any
		if json.Unmarshal(payload, &parsed) == nil {
			if m, ok := parsed["message"].(string); ok {
				msg = m
			}
		}
		if c.config.ThrowOnError {
			panic((&ApiError{Status: resp.StatusCode, Payload: payload, Message: msg}).Error())
		}
		return CMSResponse[T]{Ok: false, Error: &CMSError{Message: msg, StatusCode: resp.StatusCode}}
	}

	return wrapResponse[T](payload)
}

func (c *Client) Health() CMSResponse[any] {
	return c.Request(http.MethodGet, "/healthz", nil, nil)
}

func wrapResponse[T any](payload []byte) CMSResponse[T] {
	// T is not `any` for the generated methods, so the envelope is decoded
	// twice: once loosely to read success and the pagination sibling, and once
	// into an envelope struct to get data as T.
	var env struct {
		Success bool   `json:"success"`
		Data    T      `json:"data"`
		Message string `json:"message"`
	}
	if json.Unmarshal(payload, &env) == nil {
		var loose map[string]any
		var meta *CMSMeta
		if json.Unmarshal(payload, &loose) == nil {
			if m, ok := loose["data"].(map[string]any); ok {
				if pg, exists := m["pagination"]; exists {
					meta = &CMSMeta{Pagination: pg}
				}
			}
		}
		if _, hasEnvelope := loose["success"]; hasEnvelope {
			return CMSResponse[T]{Ok: env.Success, Data: env.Data, Meta: meta}
		}
		// A payload that is not the standard envelope is the data itself.
		var bare T
		if json.Unmarshal(payload, &bare) == nil {
			return CMSResponse[T]{Ok: true, Data: bare}
		}
	}
	var zero T
	return CMSResponse[T]{Ok: true, Data: zero}
}

func buildQuery(query map[string]any) string {
	if len(query) == 0 {
		return ""
	}
	vals := url.Values{}
	for k, v := range query {
		if v == nil {
			continue
		}
		switch t := v.(type) {
		case string:
			if t == "" {
				continue
			}
			vals.Set(k, t)
		case []string:
			vals.Set(k, strings.Join(t, ","))
		case []any:
			parts := make([]string, 0, len(t))
			for _, it := range t {
				parts = append(parts, toString(it))
			}
			vals.Set(k, strings.Join(parts, ","))
		default:
			vals.Set(k, toString(v))
		}
	}
	qs := vals.Encode()
	if qs == "" {
		return ""
	}
	return "?" + qs
}

func toString(v any) string {
	b, err := json.Marshal(v)
	if err != nil {
		return ""
	}
	s := string(b)
	if len(s) >= 2 && s[0] == '"' && s[len(s)-1] == '"' {
		return s[1 : len(s)-1]
	}
	return s
}
