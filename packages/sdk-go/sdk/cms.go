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
	Raw *Client
	// @generated fields:begin
	AI *AIResource
	AIConversation *AIConversationResource
	Article *ArticlesResource
	Author *AuthorsResource
	Campaign *CampaignsResource
	Category *CategoriesResource
	ContentPlan *ContentPlanResource
	Form *FormsResource
	FormSubmission *FormSubmissionsResource
	Language *LanguagesResource
	Media *MediaResource
	Report *ReportsResource
	Seo *SEOHubResource
	Subcategory *SubcategoriesResource
	Tag *TagsResource
	Taxonomy *TaxonomyResource
	// @generated fields:end
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
		Raw: client,
		// @generated ctor:begin
		AI: client.AI,
		AIConversation: client.AIConversation,
		Article: client.Articles,
		Author: client.Authors,
		Campaign: client.Campaigns,
		Category: client.Categories,
		ContentPlan: client.ContentPlan,
		Form: client.Forms,
		FormSubmission: client.FormSubmissions,
		Language: client.Languages,
		Media: client.Media,
		Report: client.Reports,
		Seo: client.SEOHub,
		Subcategory: client.Subcategories,
		Tag: client.Tags,
		Taxonomy: client.Taxonomy,
		// @generated ctor:end
	}, nil
}
