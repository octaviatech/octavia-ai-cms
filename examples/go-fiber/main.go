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
	app.Static("/", "./templates")
	app.Get("/demo/content", func(c *fiber.Ctx) error { data, status := client.ListContent(); c.Status(status); return c.Send(data) })
	app.Post("/demo/content", func(c *fiber.Ctx) error { var payload map[string]any; _ = json.Unmarshal(c.Body(), &payload); data, status := client.CreateContent(payload); c.Status(status); return c.Send(data) })
	app.Post("/demo/content/:id/publish", func(c *fiber.Ctx) error { data, status := client.PublishContent(c.Params("id")); c.Status(status); return c.Send(data) })
	log.Fatal(app.Listen(":8080"))
}
