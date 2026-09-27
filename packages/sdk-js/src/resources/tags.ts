import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class TagsResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  create(body: Ops.TagsCreateBody, options?: RequestOptions<Ops.TagsCreateQuery>): Promise<Ops.TagsCreateResponse> {
    return this.client.request<Ops.TagsCreateResponse>("POST", `/tags/create`, { ...(options || {}), body });
  }

  getAll(options?: RequestOptions<Ops.TagsGetAllQuery>): Promise<Ops.TagsGetAllResponse> {
    return this.client.request<Ops.TagsGetAllResponse>("GET", `/tags/getAll`, options);
  }

  search(options?: RequestOptions<Ops.TagsSearchQuery>): Promise<Ops.TagsSearchResponse> {
    return this.client.request<Ops.TagsSearchResponse>("GET", `/tags/search`, options);
  }

}
