package sdk

import "net/url"

type SEOHubResource struct {
	client *Client
}

func (r *SEOHubResource) Audit(query map[string]any) CMSResponse[SeoAuditReport] {
	return RequestInto[SeoAuditReport](r.client, "GET", "/seo/audit", query, nil)
}

func (r *SEOHubResource) Cannibalization(query map[string]any) CMSResponse[CannibalizationReport] {
	return RequestInto[CannibalizationReport](r.client, "GET", "/seo/cannibalization", query, nil)
}

func (r *SEOHubResource) Refresh(query map[string]any) CMSResponse[RefreshCandidateReport] {
	return RequestInto[RefreshCandidateReport](r.client, "GET", "/seo/refresh", query, nil)
}

func (r *SEOHubResource) RefreshArticleIdPlanItem(articleId string, query map[string]any) CMSResponse[RefreshPlanItemWrapper] {
	return RequestInto[RefreshPlanItemWrapper](r.client, "POST", "/seo/refresh/"+url.PathEscape(articleId)+"/plan-item", query, nil)
}

func (r *SEOHubResource) HreflangArticleId(articleId string, query map[string]any) CMSResponse[HreflangWrapper] {
	return RequestInto[HreflangWrapper](r.client, "GET", "/seo/hreflang/"+url.PathEscape(articleId), query, nil)
}

func (r *SEOHubResource) Redirects(query map[string]any) CMSResponse[RedirectList] {
	return RequestInto[RedirectList](r.client, "GET", "/seo/redirects", query, nil)
}

func (r *SEOHubResource) TranslationCoverage(query map[string]any) CMSResponse[TranslationCoverageReport] {
	return RequestInto[TranslationCoverageReport](r.client, "GET", "/seo/translation-coverage", query, nil)
}

func (r *SEOHubResource) ContentTypes(query map[string]any) CMSResponse[ContentTypeProfileWrapper] {
	return RequestInto[ContentTypeProfileWrapper](r.client, "GET", "/seo/content-types", query, nil)
}
