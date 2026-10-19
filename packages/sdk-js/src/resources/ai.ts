import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type { SseEvent } from "../http";
import type * as Ops from "../generated/operations";

export class AIResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  summarize(body: Ops.AISummarizeBody, options?: RequestOptions<Ops.AISummarizeQuery>): Promise<Ops.AISummarizeResponse> {
    return this.client.request<Ops.AISummarizeResponse>("POST", `/ai/summarize`, { ...(options || {}), body });
  }

  summarizeLive(body: Ops.AISummarizeStreamBody, options?: RequestOptions<Ops.AISummarizeStreamQuery>): AsyncGenerator<SseEvent, void, undefined> {
    return this.client.streamSSE("POST", `/ai/summarize/stream`, { ...(options || {}), body });
  }

  summarizeStream(body: Ops.AISummarizeStreamBody, options?: RequestOptions<Ops.AISummarizeStreamQuery>): Promise<Ops.AISummarizeStreamResponse> {
    return this.client.request<Ops.AISummarizeStreamResponse>("POST", `/ai/summarize/stream`, { ...(options || {}), body });
  }

  summarizeArticleLive(body: Ops.AISummarizeArticleStreamBody, options?: RequestOptions<Ops.AISummarizeArticleStreamQuery>): AsyncGenerator<SseEvent, void, undefined> {
    return this.client.streamSSE("POST", `/ai/summarizeArticle/stream`, { ...(options || {}), body });
  }

  summarizeArticleStream(body: Ops.AISummarizeArticleStreamBody, options?: RequestOptions<Ops.AISummarizeArticleStreamQuery>): Promise<Ops.AISummarizeArticleStreamResponse> {
    return this.client.request<Ops.AISummarizeArticleStreamResponse>("POST", `/ai/summarizeArticle/stream`, { ...(options || {}), body });
  }

  seoOptimize(body: Ops.AISeoOptimizeBody, options?: RequestOptions<Ops.AISeoOptimizeQuery>): Promise<Ops.AISeoOptimizeResponse> {
    return this.client.request<Ops.AISeoOptimizeResponse>("POST", `/ai/seoOptimize`, { ...(options || {}), body });
  }

  seoOptimizeLive(body: Ops.AISeoOptimizeStreamBody, options?: RequestOptions<Ops.AISeoOptimizeStreamQuery>): AsyncGenerator<SseEvent, void, undefined> {
    return this.client.streamSSE("POST", `/ai/seoOptimize/stream`, { ...(options || {}), body });
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

  translateLive(body: Ops.AITranslateStreamBody, options?: RequestOptions<Ops.AITranslateStreamQuery>): AsyncGenerator<SseEvent, void, undefined> {
    return this.client.streamSSE("POST", `/ai/translate/stream`, { ...(options || {}), body });
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

  autofillArticle(body: Ops.AIAutofillArticleBody, options?: RequestOptions<Ops.AIAutofillArticleQuery>): Promise<Ops.AIAutofillArticleResponse> {
    return this.client.request<Ops.AIAutofillArticleResponse>("POST", `/ai/autofillArticle`, { ...(options || {}), body });
  }

  optimizeArticleLive(body: Ops.AIOptimizeArticleStreamBody, options?: RequestOptions<Ops.AIOptimizeArticleStreamQuery>): AsyncGenerator<SseEvent, void, undefined> {
    return this.client.streamSSE("POST", `/ai/optimizeArticle/stream`, { ...(options || {}), body });
  }

  optimizeArticleStream(body: Ops.AIOptimizeArticleStreamBody, options?: RequestOptions<Ops.AIOptimizeArticleStreamQuery>): Promise<Ops.AIOptimizeArticleStreamResponse> {
    return this.client.request<Ops.AIOptimizeArticleStreamResponse>("POST", `/ai/optimizeArticle/stream`, { ...(options || {}), body });
  }

  translateArticle(body: Ops.AITranslateArticleBody, options?: RequestOptions<Ops.AITranslateArticleQuery>): Promise<Ops.AITranslateArticleResponse> {
    return this.client.request<Ops.AITranslateArticleResponse>("POST", `/ai/translateArticle`, { ...(options || {}), body });
  }

  translateArticleLive(body: Ops.AITranslateArticleStreamBody, options?: RequestOptions<Ops.AITranslateArticleStreamQuery>): AsyncGenerator<SseEvent, void, undefined> {
    return this.client.streamSSE("POST", `/ai/translateArticle/stream`, { ...(options || {}), body });
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

  repurposeLive(body: Ops.AIRepurposeStreamBody, options?: RequestOptions<Ops.AIRepurposeStreamQuery>): AsyncGenerator<SseEvent, void, undefined> {
    return this.client.streamSSE("POST", `/ai/repurpose/stream`, { ...(options || {}), body });
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

  credits(options?: RequestOptions<Ops.AICreditsQuery>): Promise<Ops.AICreditsResponse> {
    return this.client.request<Ops.AICreditsResponse>("GET", `/ai/credits`, options);
  }

  estimate(body: Ops.AIEstimateBody, options?: RequestOptions<Ops.AIEstimateQuery>): Promise<Ops.AIEstimateResponse> {
    return this.client.request<Ops.AIEstimateResponse>("POST", `/ai/estimate`, { ...(options || {}), body });
  }

  run(body: Ops.AIRunBody, options?: RequestOptions<Ops.AIRunQuery>): Promise<Ops.AIRunResponse> {
    return this.client.request<Ops.AIRunResponse>("POST", `/ai/run`, { ...(options || {}), body });
  }

  creditsRuns(options?: RequestOptions<Ops.AICreditsRunsQuery>): Promise<Ops.AICreditsRunsResponse> {
    return this.client.request<Ops.AICreditsRunsResponse>("GET", `/ai/credits/runs`, options);
  }

  eventsLive(options?: RequestOptions<Ops.AIEventsStreamQuery>): AsyncGenerator<SseEvent, void, undefined> {
    return this.client.streamSSE("GET", `/ai/events/stream`, options);
  }

  eventsStream(options?: RequestOptions<Ops.AIEventsStreamQuery>): Promise<Ops.AIEventsStreamResponse> {
    return this.client.request<Ops.AIEventsStreamResponse>("GET", `/ai/events/stream`, options);
  }

  proposalsPOST(body: Ops.AIProposalsPOSTBody, options?: RequestOptions<Ops.AIProposalsPOSTQuery>): Promise<Ops.AIProposalsPOSTResponse> {
    return this.client.request<Ops.AIProposalsPOSTResponse>("POST", `/ai/proposals`, { ...(options || {}), body });
  }

  proposalsGET(options?: RequestOptions<Ops.AIProposalsGETQuery>): Promise<Ops.AIProposalsGETResponse> {
    return this.client.request<Ops.AIProposalsGETResponse>("GET", `/ai/proposals`, options);
  }

  proposalsCount(options?: RequestOptions<Ops.AIProposalsCountQuery>): Promise<Ops.AIProposalsCountResponse> {
    return this.client.request<Ops.AIProposalsCountResponse>("GET", `/ai/proposals/count`, options);
  }

  proposalsId(id: Ops.AIProposalsIdPath["id"], options?: RequestOptions<Ops.AIProposalsIdQuery>): Promise<Ops.AIProposalsIdResponse> {
    return this.client.request<Ops.AIProposalsIdResponse>("GET", `/ai/proposals/${encodeURIComponent(id)}`, options);
  }

  proposalsIdAccept(id: Ops.AIProposalsIdAcceptPath["id"], options?: RequestOptions<Ops.AIProposalsIdAcceptQuery>): Promise<Ops.AIProposalsIdAcceptResponse> {
    return this.client.request<Ops.AIProposalsIdAcceptResponse>("POST", `/ai/proposals/${encodeURIComponent(id)}/accept`, options);
  }

  proposalsIdReject(id: Ops.AIProposalsIdRejectPath["id"], options?: RequestOptions<Ops.AIProposalsIdRejectQuery>): Promise<Ops.AIProposalsIdRejectResponse> {
    return this.client.request<Ops.AIProposalsIdRejectResponse>("POST", `/ai/proposals/${encodeURIComponent(id)}/reject`, options);
  }

  proposalsIdUndo(id: Ops.AIProposalsIdUndoPath["id"], options?: RequestOptions<Ops.AIProposalsIdUndoQuery>): Promise<Ops.AIProposalsIdUndoResponse> {
    return this.client.request<Ops.AIProposalsIdUndoResponse>("POST", `/ai/proposals/${encodeURIComponent(id)}/undo`, options);
  }

  proposalsBulkAccept(body: Ops.AIProposalsBulkAcceptBody, options?: RequestOptions<Ops.AIProposalsBulkAcceptQuery>): Promise<Ops.AIProposalsBulkAcceptResponse> {
    return this.client.request<Ops.AIProposalsBulkAcceptResponse>("POST", `/ai/proposals/bulk-accept`, { ...(options || {}), body });
  }

  settingsGET(options?: RequestOptions<Ops.AISettingsGETQuery>): Promise<Ops.AISettingsGETResponse> {
    return this.client.request<Ops.AISettingsGETResponse>("GET", `/ai/settings`, options);
  }

  settingsPUT(body: Ops.AISettingsPUTBody, options?: RequestOptions<Ops.AISettingsPUTQuery>): Promise<Ops.AISettingsPUTResponse> {
    return this.client.request<Ops.AISettingsPUTResponse>("PUT", `/ai/settings`, { ...(options || {}), body });
  }

  revisionsArticleId(articleId: Ops.AIRevisionsArticleIdPath["articleId"], options?: RequestOptions<Ops.AIRevisionsArticleIdQuery>): Promise<Ops.AIRevisionsArticleIdResponse> {
    return this.client.request<Ops.AIRevisionsArticleIdResponse>("GET", `/articles/revisions/${encodeURIComponent(articleId)}`, options);
  }

  revisionsArticleIdRevisionIdRestore(articleId: Ops.AIRevisionsArticleIdRevisionIdRestorePath["articleId"], revisionId: Ops.AIRevisionsArticleIdRevisionIdRestorePath["revisionId"], options?: RequestOptions<Ops.AIRevisionsArticleIdRevisionIdRestoreQuery>): Promise<Ops.AIRevisionsArticleIdRevisionIdRestoreResponse> {
    return this.client.request<Ops.AIRevisionsArticleIdRevisionIdRestoreResponse>("POST", `/articles/revisions/${encodeURIComponent(articleId)}/${encodeURIComponent(revisionId)}/restore`, options);
  }

  readinessArticleId(articleId: Ops.AIReadinessArticleIdPath["articleId"], options?: RequestOptions<Ops.AIReadinessArticleIdQuery>): Promise<Ops.AIReadinessArticleIdResponse> {
    return this.client.request<Ops.AIReadinessArticleIdResponse>("GET", `/articles/readiness/${encodeURIComponent(articleId)}`, options);
  }

  translationStateArticleId(articleId: Ops.AITranslationStateArticleIdPath["articleId"], options?: RequestOptions<Ops.AITranslationStateArticleIdQuery>): Promise<Ops.AITranslationStateArticleIdResponse> {
    return this.client.request<Ops.AITranslationStateArticleIdResponse>("GET", `/articles/translation-state/${encodeURIComponent(articleId)}`, options);
  }

  translationStateArticleIdLocaleComplete(articleId: Ops.AITranslationStateArticleIdLocaleCompletePath["articleId"], locale: Ops.AITranslationStateArticleIdLocaleCompletePath["locale"], body: Ops.AITranslationStateArticleIdLocaleCompleteBody, options?: RequestOptions<Ops.AITranslationStateArticleIdLocaleCompleteQuery>): Promise<Ops.AITranslationStateArticleIdLocaleCompleteResponse> {
    return this.client.request<Ops.AITranslationStateArticleIdLocaleCompleteResponse>("POST", `/articles/translation-state/${encodeURIComponent(articleId)}/${encodeURIComponent(locale)}/complete`, { ...(options || {}), body });
  }

}
