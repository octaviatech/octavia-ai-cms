import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type { SseEvent } from "../http";
import type * as Ops from "../generated/operations";

export class SEOHubResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  audit(options?: RequestOptions<Ops.SEOHubAuditQuery>): Promise<Ops.SEOHubAuditResponse> {
    return this.client.request<Ops.SEOHubAuditResponse>("GET", `/seo/audit`, options);
  }

  cannibalization(options?: RequestOptions<Ops.SEOHubCannibalizationQuery>): Promise<Ops.SEOHubCannibalizationResponse> {
    return this.client.request<Ops.SEOHubCannibalizationResponse>("GET", `/seo/cannibalization`, options);
  }

  refresh(options?: RequestOptions<Ops.SEOHubRefreshQuery>): Promise<Ops.SEOHubRefreshResponse> {
    return this.client.request<Ops.SEOHubRefreshResponse>("GET", `/seo/refresh`, options);
  }

  refreshArticleIdPlanItem(articleId: Ops.SEOHubRefreshArticleIdPlanItemPath["articleId"], options?: RequestOptions<Ops.SEOHubRefreshArticleIdPlanItemQuery>): Promise<Ops.SEOHubRefreshArticleIdPlanItemResponse> {
    return this.client.request<Ops.SEOHubRefreshArticleIdPlanItemResponse>("POST", `/seo/refresh/${encodeURIComponent(articleId)}/plan-item`, options);
  }

  hreflangArticleId(articleId: Ops.SEOHubHreflangArticleIdPath["articleId"], options?: RequestOptions<Ops.SEOHubHreflangArticleIdQuery>): Promise<Ops.SEOHubHreflangArticleIdResponse> {
    return this.client.request<Ops.SEOHubHreflangArticleIdResponse>("GET", `/seo/hreflang/${encodeURIComponent(articleId)}`, options);
  }

  redirects(options?: RequestOptions<Ops.SEOHubRedirectsQuery>): Promise<Ops.SEOHubRedirectsResponse> {
    return this.client.request<Ops.SEOHubRedirectsResponse>("GET", `/seo/redirects`, options);
  }

  translationCoverage(options?: RequestOptions<Ops.SEOHubTranslationCoverageQuery>): Promise<Ops.SEOHubTranslationCoverageResponse> {
    return this.client.request<Ops.SEOHubTranslationCoverageResponse>("GET", `/seo/translation-coverage`, options);
  }

  contentTypes(options?: RequestOptions<Ops.SEOHubContentTypesQuery>): Promise<Ops.SEOHubContentTypesResponse> {
    return this.client.request<Ops.SEOHubContentTypesResponse>("GET", `/seo/content-types`, options);
  }

}
