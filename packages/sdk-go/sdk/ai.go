package sdk

type AIResource struct {
    client *Client
}

func (r *AIResource) Summarize(body any, query map[string]any) CMSResponse[AiSummaryResult] {
    return RequestInto[AiSummaryResult](r.client, "POST", "/ai/summarize", query, body)
}

func (r *AIResource) SummarizeStream(body any, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "POST", "/ai/summarize/stream", query, body)
}

func (r *AIResource) SummarizeArticleStream(body any, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "POST", "/ai/summarizeArticle/stream", query, body)
}

func (r *AIResource) SeoOptimize(body any, query map[string]any) CMSResponse[AiSeoResult] {
    return RequestInto[AiSeoResult](r.client, "POST", "/ai/seoOptimize", query, body)
}

func (r *AIResource) SeoOptimizeStream(body any, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "POST", "/ai/seoOptimize/stream", query, body)
}

func (r *AIResource) GenerateTitle(body any, query map[string]any) CMSResponse[AiTitleResult] {
    return RequestInto[AiTitleResult](r.client, "POST", "/ai/generateTitle", query, body)
}

func (r *AIResource) Translate(body any, query map[string]any) CMSResponse[AiTranslateResult] {
    return RequestInto[AiTranslateResult](r.client, "POST", "/ai/translate", query, body)
}

func (r *AIResource) TranslateStream(body any, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "POST", "/ai/translate/stream", query, body)
}

func (r *AIResource) GenerateContent(body any, query map[string]any) CMSResponse[AiContentResult] {
    return RequestInto[AiContentResult](r.client, "POST", "/ai/generateContent", query, body)
}

func (r *AIResource) GenerateImage(body any, query map[string]any) CMSResponse[AiImageResult] {
    return RequestInto[AiImageResult](r.client, "POST", "/ai/generateImage", query, body)
}

func (r *AIResource) OptimizeArticle(body any, query map[string]any) CMSResponse[AiArticleSeoResult] {
    return RequestInto[AiArticleSeoResult](r.client, "POST", "/ai/optimizeArticle", query, body)
}

func (r *AIResource) OptimizeArticleStream(body any, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "POST", "/ai/optimizeArticle/stream", query, body)
}

func (r *AIResource) TranslateArticle(body any, query map[string]any) CMSResponse[AiArticleTranslateResult] {
    return RequestInto[AiArticleTranslateResult](r.client, "POST", "/ai/translateArticle", query, body)
}

func (r *AIResource) TranslateArticleStream(body any, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "POST", "/ai/translateArticle/stream", query, body)
}

func (r *AIResource) TranslateForm(body any, query map[string]any) CMSResponse[AiFormTranslateResult] {
    return RequestInto[AiFormTranslateResult](r.client, "POST", "/ai/translateForm", query, body)
}

func (r *AIResource) Repurpose(body any, query map[string]any) CMSResponse[RepurposeResult] {
    return RequestInto[RepurposeResult](r.client, "POST", "/ai/repurpose", query, body)
}

func (r *AIResource) RepurposeStream(body any, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "POST", "/ai/repurpose/stream", query, body)
}

func (r *AIResource) RepurposeTemplateGET(query map[string]any) CMSResponse[SocialTemplate] {
    return RequestInto[SocialTemplate](r.client, "GET", "/ai/repurpose/template", query, nil)
}

func (r *AIResource) RepurposeTemplatePUT(body any, query map[string]any) CMSResponse[SocialTemplate] {
    return RequestInto[SocialTemplate](r.client, "PUT", "/ai/repurpose/template", query, body)
}

func (r *AIResource) SocialConnections(query map[string]any) CMSResponse[SocialConnectionList] {
    return RequestInto[SocialConnectionList](r.client, "GET", "/ai/social/connections", query, nil)
}

func (r *AIResource) SocialLinkedinConnect(body any, query map[string]any) CMSResponse[SocialConnection] {
    return RequestInto[SocialConnection](r.client, "PUT", "/ai/social/linkedin/connect", query, body)
}

func (r *AIResource) SocialTelegramConnect(body any, query map[string]any) CMSResponse[SocialConnection] {
    return RequestInto[SocialConnection](r.client, "PUT", "/ai/social/telegram/connect", query, body)
}

func (r *AIResource) SocialTwitterConnect(body any, query map[string]any) CMSResponse[SocialConnection] {
    return RequestInto[SocialConnection](r.client, "PUT", "/ai/social/twitter/connect", query, body)
}

func (r *AIResource) SocialLinkedinPublish(body any, query map[string]any) CMSResponse[SocialPublishResult] {
    return RequestInto[SocialPublishResult](r.client, "POST", "/ai/social/linkedin/publish", query, body)
}

func (r *AIResource) SocialTelegramPublish(body any, query map[string]any) CMSResponse[SocialPublishResult] {
    return RequestInto[SocialPublishResult](r.client, "POST", "/ai/social/telegram/publish", query, body)
}

func (r *AIResource) SocialTwitterPublish(body any, query map[string]any) CMSResponse[SocialPublishResult] {
    return RequestInto[SocialPublishResult](r.client, "POST", "/ai/social/twitter/publish", query, body)
}
