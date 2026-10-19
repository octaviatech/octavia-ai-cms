package sdk

import "testing"

// Every resource the spec's non-excluded tags map to must be reachable from
// both `NewClient` and `InitCMS`.
//
// `go build` cannot catch a missing entry here: the resource files compile fine
// on their own, an unused exported type is not an error, and the coverage
// script only greps the resource FILES. That is how Campaigns, ContentPlan,
// Media, SEOHub and Taxonomy shipped as 40 unreachable methods while both
// checks stayed green.
func TestClientExposesEveryResource(t *testing.T) {
	client, err := NewClient(ClientConfig{BaseURL: CMSBaseURL, ApiKey: "test_key"})
	if err != nil {
		t.Fatalf("NewClient: %v", err)
	}

	resources := map[string]any{
		"AI":              client.AI,
		"AIConversation":  client.AIConversation,
		"Articles":        client.Articles,
		"Authors":         client.Authors,
		"Campaigns":       client.Campaigns,
		"Categories":      client.Categories,
		"ContentPlan":     client.ContentPlan,
		"Forms":           client.Forms,
		"FormSubmissions": client.FormSubmissions,
		"Languages":       client.Languages,
		"Media":           client.Media,
		"Reports":         client.Reports,
		"SEOHub":          client.SEOHub,
		"Subcategories":   client.Subcategories,
		"Tags":            client.Tags,
		"Taxonomy":        client.Taxonomy,
	}

	for name, resource := range resources {
		if resource == nil {
			t.Errorf("NewClient left %s nil — the resource exists but is unreachable", name)
		}
	}
}

func TestCMSFacadeExposesEveryResource(t *testing.T) {
	cms, err := InitCMS("test_key", nil)
	if err != nil {
		t.Fatalf("InitCMS: %v", err)
	}

	resources := map[string]any{
		"AI":             cms.AI,
		"AIConversation": cms.AIConversation,
		"Article":        cms.Article,
		"Author":         cms.Author,
		"Campaign":       cms.Campaign,
		"Category":       cms.Category,
		"ContentPlan":    cms.ContentPlan,
		"Form":           cms.Form,
		"FormSubmission": cms.FormSubmission,
		"Language":       cms.Language,
		"Media":          cms.Media,
		"Report":         cms.Report,
		"Seo":            cms.Seo,
		"Subcategory":    cms.Subcategory,
		"Tag":            cms.Tag,
		"Taxonomy":       cms.Taxonomy,
	}

	for name, resource := range resources {
		if resource == nil {
			t.Errorf("InitCMS left CMS.%s nil — the facade is missing this resource", name)
		}
	}

	// A facade entry that is wired but bound to a different client would still
	// pass a nil check, so assert each one issues requests through CMS.Raw.
	bound := map[string]*Client{
		"Campaign":    cms.Campaign.client,
		"ContentPlan": cms.ContentPlan.client,
		"Media":       cms.Media.client,
		"Seo":         cms.Seo.client,
		"Taxonomy":    cms.Taxonomy.client,
	}
	for name, got := range bound {
		if got != cms.Raw {
			t.Errorf("CMS.%s is bound to a different client than CMS.Raw", name)
		}
	}
}
