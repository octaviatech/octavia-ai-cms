package main

import (
	"encoding/json"
	"log"
	"octavia-go-fiber-example/internal/octavia"

	"github.com/gofiber/fiber/v2"
)

func main() {
	app := fiber.New()
	client := octavia.NewClient()
	app.Static("/", "./templates")
	app.Get("/demo/content", func(c *fiber.Ctx) error { data, status, err := client.Do("/v1/cms/content", "GET", nil); if err != nil { return c.Status(500).JSON(fiber.Map{"error": err.Error()}) }; c.Status(status); return c.Send(data) })
	app.Post("/demo/content", func(c *fiber.Ctx) error { var payload map[string]any; _ = json.Unmarshal(c.Body(), &payload); data, status, err := client.Do("/v1/cms/content", "POST", payload); if err != nil { return c.Status(500).JSON(fiber.Map{"error": err.Error()}) }; c.Status(status); return c.Send(data) })
	app.Post("/demo/content/:id/publish", func(c *fiber.Ctx) error { data, status, err := client.Do("/v1/cms/content/"+c.Params("id")+"/publish", "POST", nil); if err != nil { return c.Status(500).JSON(fiber.Map{"error": err.Error()}) }; c.Status(status); return c.Send(data) })
	log.Fatal(app.Listen(":8080"))
}
