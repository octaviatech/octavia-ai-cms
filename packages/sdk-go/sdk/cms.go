package sdk

import "time"

const CMSSite = "https://octaviatech.app"
const CMSSignupURL = CMSSite
const CMSBaseURL = "https://api.octaviatech.app/cms"

type CMSOptions struct {
	Timeout      time.Duration
	ThrowOnError bool
}

type CMS struct {
	Raw            *Client
	Article        *ArticlesResource
	Author         *AuthorsResource
	Category       *CategoriesResource
	Subcategory    *SubcategoriesResource
	Form           *FormsResource
	FormSubmission *FormSubmissionsResource
	Language       *LanguagesResource
	Report         *ReportsResource
	AI             *AIResource
	AIConversation *AIConversationResource
	Tag            *TagsResource
}

func InitCMS(apiKey string, opts *CMSOptions) (*CMS, error) {
	timeout := time.Duration(0)
	throwOnError := false
	if opts != nil {
		timeout = opts.Timeout
		throwOnError = opts.ThrowOnError
	}

	client, err := NewClient(ClientConfig{
		BaseURL:      CMSBaseURL,
		ApiKey:       apiKey,
		Timeout:      timeout,
		ThrowOnError: throwOnError,
	})
	if err != nil {
		return nil, err
	}

	return &CMS{
		Raw:            client,
		Article:        client.Articles,
		Author:         client.Authors,
		Category:       client.Categories,
		Subcategory:    client.Subcategories,
		Form:           client.Forms,
		FormSubmission: client.FormSubmissions,
		Language:       client.Languages,
		Report:         client.Reports,
		AI:             client.AI,
		AIConversation: client.AIConversation,
		Tag:            client.Tags,
	}, nil
}
