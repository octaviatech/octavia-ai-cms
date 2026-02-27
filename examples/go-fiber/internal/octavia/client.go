package octavia

import (
	"bytes"
	"encoding/json"
	"fmt"
	"io"
	"net/http"
	"os"
)

type Client struct { BaseURL, APIKey, ProjectID string }

type Content struct {
	ID        string `json:"id"`
	Title     string `json:"title"`
	Body      string `json:"body"`
	Locale    string `json:"locale"`
	Status    string `json:"status"`
	CreatedAt string `json:"createdAt"`
}

func NewClient() *Client { return &Client{BaseURL: os.Getenv("OCTAVIA_API_BASE_URL"), APIKey: os.Getenv("OCTAVIA_API_KEY"), ProjectID: os.Getenv("OCTAVIA_PROJECT_ID")} }
func (c *Client) Do(path, method string, payload any) ([]byte, int, error) {
	var body io.Reader
	if payload != nil { b, _ := json.Marshal(payload); body = bytes.NewBuffer(b) }
	req, _ := http.NewRequest(method, fmt.Sprintf("%s%s", c.BaseURL, path), body)
	req.Header.Set("Authorization", "Bearer "+c.APIKey)
	req.Header.Set("x-octavia-project-id", c.ProjectID)
	req.Header.Set("Content-Type", "application/json")
	res, err := http.DefaultClient.Do(req); if err != nil { return nil, 0, err }
	defer res.Body.Close(); data, _ := io.ReadAll(res.Body)
	return data, res.StatusCode, nil
}
