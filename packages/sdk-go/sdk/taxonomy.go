package sdk

type TaxonomyResource struct {
	client *Client
}

func (r *TaxonomyResource) Audit(query map[string]any) CMSResponse[TaxonomyAudit] {
	return RequestInto[TaxonomyAudit](r.client, "GET", "/taxonomy/audit", query, nil)
}

func (r *TaxonomyResource) CategorySeo(body any, query map[string]any) CMSResponse[CategorySeoSuggestion] {
	return RequestInto[CategorySeoSuggestion](r.client, "POST", "/taxonomy/category-seo", query, body)
}

func (r *TaxonomyResource) SuggestTags(body any, query map[string]any) CMSResponse[TagSuggestions] {
	return RequestInto[TagSuggestions](r.client, "POST", "/taxonomy/suggest-tags", query, body)
}

func (r *TaxonomyResource) TagsMerge(body any, query map[string]any) CMSResponse[TagMergeResult] {
	return RequestInto[TagMergeResult](r.client, "POST", "/taxonomy/tags/merge", query, body)
}

func (r *TaxonomyResource) TagsRefreshUsage(query map[string]any) CMSResponse[TagUsageRefresh] {
	return RequestInto[TagUsageRefresh](r.client, "POST", "/taxonomy/tags/refreshUsage", query, nil)
}

func (r *TaxonomyResource) AuthorBio(body any, query map[string]any) CMSResponse[AuthorBioSuggestion] {
	return RequestInto[AuthorBioSuggestion](r.client, "POST", "/taxonomy/author-bio", query, body)
}

func (r *TaxonomyResource) AuthorsSuggest(body any, query map[string]any) CMSResponse[AuthorSuggestions] {
	return RequestInto[AuthorSuggestions](r.client, "POST", "/taxonomy/authors/suggest", query, body)
}
