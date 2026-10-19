import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type { SseEvent } from "../http";
import type * as Ops from "../generated/operations";

export class TaxonomyResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  audit(options?: RequestOptions<Ops.TaxonomyAuditQuery>): Promise<Ops.TaxonomyAuditResponse> {
    return this.client.request<Ops.TaxonomyAuditResponse>("GET", `/taxonomy/audit`, options);
  }

  categorySeo(body: Ops.TaxonomyCategorySeoBody, options?: RequestOptions<Ops.TaxonomyCategorySeoQuery>): Promise<Ops.TaxonomyCategorySeoResponse> {
    return this.client.request<Ops.TaxonomyCategorySeoResponse>("POST", `/taxonomy/category-seo`, { ...(options || {}), body });
  }

  suggestTags(body: Ops.TaxonomySuggestTagsBody, options?: RequestOptions<Ops.TaxonomySuggestTagsQuery>): Promise<Ops.TaxonomySuggestTagsResponse> {
    return this.client.request<Ops.TaxonomySuggestTagsResponse>("POST", `/taxonomy/suggest-tags`, { ...(options || {}), body });
  }

  tagsMerge(body: Ops.TaxonomyTagsMergeBody, options?: RequestOptions<Ops.TaxonomyTagsMergeQuery>): Promise<Ops.TaxonomyTagsMergeResponse> {
    return this.client.request<Ops.TaxonomyTagsMergeResponse>("POST", `/taxonomy/tags/merge`, { ...(options || {}), body });
  }

  tagsRefreshUsage(options?: RequestOptions<Ops.TaxonomyTagsRefreshUsageQuery>): Promise<Ops.TaxonomyTagsRefreshUsageResponse> {
    return this.client.request<Ops.TaxonomyTagsRefreshUsageResponse>("POST", `/taxonomy/tags/refreshUsage`, options);
  }

  authorBio(body: Ops.TaxonomyAuthorBioBody, options?: RequestOptions<Ops.TaxonomyAuthorBioQuery>): Promise<Ops.TaxonomyAuthorBioResponse> {
    return this.client.request<Ops.TaxonomyAuthorBioResponse>("POST", `/taxonomy/author-bio`, { ...(options || {}), body });
  }

  authorsSuggest(body: Ops.TaxonomyAuthorsSuggestBody, options?: RequestOptions<Ops.TaxonomyAuthorsSuggestQuery>): Promise<Ops.TaxonomyAuthorsSuggestResponse> {
    return this.client.request<Ops.TaxonomyAuthorsSuggestResponse>("POST", `/taxonomy/authors/suggest`, { ...(options || {}), body });
  }

}
