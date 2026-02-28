package main

import (
	"encoding/json"
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

	app.Get("/api/content", func(c *fiber.Ctx) error {
		data, status := client.ListContent()
		c.Status(status)
		return c.Send(data)
	})
	app.Post("/api/content", func(c *fiber.Ctx) error {
		var payload map[string]any
		_ = json.Unmarshal(c.Body(), &payload)
		data, status := client.CreateContent(payload)
		c.Status(status)
		return c.Send(data)
	})
	app.Post("/api/content/:id/publish", func(c *fiber.Ctx) error {
		data, status := client.PublishContent(c.Params("id"))
		c.Status(status)
		return c.Send(data)
	})
	app.Get("/api/forms", func(c *fiber.Ctx) error {
		data, status := client.ListForms()
		c.Status(status)
		return c.Send(data)
	})
	app.Post("/api/forms/:id/submit", func(c *fiber.Ctx) error {
		var payload map[string]any
		_ = json.Unmarshal(c.Body(), &payload)
		language, _ := payload["language"].(string)
		data, status := client.SubmitForm(c.Params("id"), payload, language)
		c.Status(status)
		return c.Send(data)
	})
	app.Get("/api/reports/statistics", func(c *fiber.Ctx) error {
		data, status := client.GetStatistics()
		c.Status(status)
		return c.Send(data)
	})
	app.Post("/api/ai/summarize", func(c *fiber.Ctx) error {
		var payload map[string]any
		_ = json.Unmarshal(c.Body(), &payload)
		text, _ := payload["text"].(string)
		data, status := client.Summarize(text)
		c.Status(status)
		return c.Send(data)
	})

	log.Fatal(app.Listen(":8080"))
}
