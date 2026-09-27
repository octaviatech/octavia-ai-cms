import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class AIResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  summarize(body: Ops.AISummarizeBody, options?: RequestOptions<Ops.AISummarizeQuery>): Promise<Ops.AISummarizeResponse> {
    return this.client.request<Ops.AISummarizeResponse>("POST", `/ai/summarize`, { ...(options || {}), body });
  }

  summarizeStream(body: Ops.AISummarizeStreamBody, options?: RequestOptions<Ops.AISummarizeStreamQuery>): Promise<Ops.AISummarizeStreamResponse> {
    return this.client.request<Ops.AISummarizeStreamResponse>("POST", `/ai/summarize/stream`, { ...(options || {}), body });
  }

  summarizeArticleStream(body: Ops.AISummarizeArticleStreamBody, options?: RequestOptions<Ops.AISummarizeArticleStreamQuery>): Promise<Ops.AISummarizeArticleStreamResponse> {
    return this.client.request<Ops.AISummarizeArticleStreamResponse>("POST", `/ai/summarizeArticle/stream`, { ...(options || {}), body });
  }

  seoOptimize(body: Ops.AISeoOptimizeBody, options?: RequestOptions<Ops.AISeoOptimizeQuery>): Promise<Ops.AISeoOptimizeResponse> {
    return this.client.request<Ops.AISeoOptimizeResponse>("POST", `/ai/seoOptimize`, { ...(options || {}), body });
  }

  seoOptimizeStream(body: Ops.AISeoOptimizeStreamBody, options?: RequestOptions<Ops.AISeoOptimizeStreamQuery>): Promise<Ops.AISeoOptimizeStreamResponse> {
    return this.client.request<Ops.AISeoOptimizeStreamResponse>("POST", `/ai/seoOptimize/stream`, { ...(options || {}), body });
  }

  generateTitle(body: Ops.AIGenerateTitleBody, options?: RequestOptions<Ops.AIGenerateTitleQuery>): Promise<Ops.AIGenerateTitleResponse> {
    return this.client.request<Ops.AIGenerateTitleResponse>("POST", `/ai/generateTitle`, { ...(options || {}), body });
  }

  translate(body: Ops.AITranslateBody, options?: RequestOptions<Ops.AITranslateQuery>): Promise<Ops.AITranslateResponse> {
    return this.client.request<Ops.AITranslateResponse>("POST", `/ai/translate`, { ...(options || {}), body });
  }

  translateStream(body: Ops.AITranslateStreamBody, options?: RequestOptions<Ops.AITranslateStreamQuery>): Promise<Ops.AITranslateStreamResponse> {
    return this.client.request<Ops.AITranslateStreamResponse>("POST", `/ai/translate/stream`, { ...(options || {}), body });
  }

  generateContent(body: Ops.AIGenerateContentBody, options?: RequestOptions<Ops.AIGenerateContentQuery>): Promise<Ops.AIGenerateContentResponse> {
    return this.client.request<Ops.AIGenerateContentResponse>("POST", `/ai/generateContent`, { ...(options || {}), body });
  }

  generateImage(body: Ops.AIGenerateImageBody, options?: RequestOptions<Ops.AIGenerateImageQuery>): Promise<Ops.AIGenerateImageResponse> {
    return this.client.request<Ops.AIGenerateImageResponse>("POST", `/ai/generateImage`, { ...(options || {}), body });
  }

  optimizeArticle(body: Ops.AIOptimizeArticleBody, options?: RequestOptions<Ops.AIOptimizeArticleQuery>): Promise<Ops.AIOptimizeArticleResponse> {
    return this.client.request<Ops.AIOptimizeArticleResponse>("POST", `/ai/optimizeArticle`, { ...(options || {}), body });
  }

  optimizeArticleStream(body: Ops.AIOptimizeArticleStreamBody, options?: RequestOptions<Ops.AIOptimizeArticleStreamQuery>): Promise<Ops.AIOptimizeArticleStreamResponse> {
    return this.client.request<Ops.AIOptimizeArticleStreamResponse>("POST", `/ai/optimizeArticle/stream`, { ...(options || {}), body });
  }

  translateArticle(body: Ops.AITranslateArticleBody, options?: RequestOptions<Ops.AITranslateArticleQuery>): Promise<Ops.AITranslateArticleResponse> {
    return this.client.request<Ops.AITranslateArticleResponse>("POST", `/ai/translateArticle`, { ...(options || {}), body });
  }

  translateArticleStream(body: Ops.AITranslateArticleStreamBody, options?: RequestOptions<Ops.AITranslateArticleStreamQuery>): Promise<Ops.AITranslateArticleStreamResponse> {
    return this.client.request<Ops.AITranslateArticleStreamResponse>("POST", `/ai/translateArticle/stream`, { ...(options || {}), body });
  }

  translateForm(body: Ops.AITranslateFormBody, options?: RequestOptions<Ops.AITranslateFormQuery>): Promise<Ops.AITranslateFormResponse> {
    return this.client.request<Ops.AITranslateFormResponse>("POST", `/ai/translateForm`, { ...(options || {}), body });
  }

  repurpose(body: Ops.AIRepurposeBody, options?: RequestOptions<Ops.AIRepurposeQuery>): Promise<Ops.AIRepurposeResponse> {
    return this.client.request<Ops.AIRepurposeResponse>("POST", `/ai/repurpose`, { ...(options || {}), body });
  }

  repurposeStream(body: Ops.AIRepurposeStreamBody, options?: RequestOptions<Ops.AIRepurposeStreamQuery>): Promise<Ops.AIRepurposeStreamResponse> {
    return this.client.request<Ops.AIRepurposeStreamResponse>("POST", `/ai/repurpose/stream`, { ...(options || {}), body });
  }

  repurposeTemplateGET(options?: RequestOptions<Ops.AIRepurposeTemplateGETQuery>): Promise<Ops.AIRepurposeTemplateGETResponse> {
    return this.client.request<Ops.AIRepurposeTemplateGETResponse>("GET", `/ai/repurpose/template`, options);
  }

  repurposeTemplatePUT(body: Ops.AIRepurposeTemplatePUTBody, options?: RequestOptions<Ops.AIRepurposeTemplatePUTQuery>): Promise<Ops.AIRepurposeTemplatePUTResponse> {
    return this.client.request<Ops.AIRepurposeTemplatePUTResponse>("PUT", `/ai/repurpose/template`, { ...(options || {}), body });
  }

  socialConnections(options?: RequestOptions<Ops.AISocialConnectionsQuery>): Promise<Ops.AISocialConnectionsResponse> {
    return this.client.request<Ops.AISocialConnectionsResponse>("GET", `/ai/social/connections`, options);
  }

  socialLinkedinConnect(body: Ops.AISocialLinkedinConnectBody, options?: RequestOptions<Ops.AISocialLinkedinConnectQuery>): Promise<Ops.AISocialLinkedinConnectResponse> {
    return this.client.request<Ops.AISocialLinkedinConnectResponse>("PUT", `/ai/social/linkedin/connect`, { ...(options || {}), body });
  }

  socialTelegramConnect(body: Ops.AISocialTelegramConnectBody, options?: RequestOptions<Ops.AISocialTelegramConnectQuery>): Promise<Ops.AISocialTelegramConnectResponse> {
    return this.client.request<Ops.AISocialTelegramConnectResponse>("PUT", `/ai/social/telegram/connect`, { ...(options || {}), body });
  }

  socialTwitterConnect(body: Ops.AISocialTwitterConnectBody, options?: RequestOptions<Ops.AISocialTwitterConnectQuery>): Promise<Ops.AISocialTwitterConnectResponse> {
    return this.client.request<Ops.AISocialTwitterConnectResponse>("PUT", `/ai/social/twitter/connect`, { ...(options || {}), body });
  }

  socialLinkedinPublish(body: Ops.AISocialLinkedinPublishBody, options?: RequestOptions<Ops.AISocialLinkedinPublishQuery>): Promise<Ops.AISocialLinkedinPublishResponse> {
    return this.client.request<Ops.AISocialLinkedinPublishResponse>("POST", `/ai/social/linkedin/publish`, { ...(options || {}), body });
  }

  socialTelegramPublish(body: Ops.AISocialTelegramPublishBody, options?: RequestOptions<Ops.AISocialTelegramPublishQuery>): Promise<Ops.AISocialTelegramPublishResponse> {
    return this.client.request<Ops.AISocialTelegramPublishResponse>("POST", `/ai/social/telegram/publish`, { ...(options || {}), body });
  }

  socialTwitterPublish(body: Ops.AISocialTwitterPublishBody, options?: RequestOptions<Ops.AISocialTwitterPublishQuery>): Promise<Ops.AISocialTwitterPublishResponse> {
    return this.client.request<Ops.AISocialTwitterPublishResponse>("POST", `/ai/social/twitter/publish`, { ...(options || {}), body });
  }

}
