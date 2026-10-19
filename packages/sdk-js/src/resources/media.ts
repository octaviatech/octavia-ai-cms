import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type { SseEvent } from "../http";
import type * as Ops from "../generated/operations";

export class MediaResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  getAll(options?: RequestOptions<Ops.MediaGetAllQuery>): Promise<Ops.MediaGetAllResponse> {
    return this.client.request<Ops.MediaGetAllResponse>("GET", `/media/getAll`, options);
  }

  create(body: Ops.MediaCreateBody, options?: RequestOptions<Ops.MediaCreateQuery>): Promise<Ops.MediaCreateResponse> {
    return this.client.request<Ops.MediaCreateResponse>("POST", `/media/create`, { ...(options || {}), body });
  }

  update(body: Ops.MediaUpdateBody, options?: RequestOptions<Ops.MediaUpdateQuery>): Promise<Ops.MediaUpdateResponse> {
    return this.client.request<Ops.MediaUpdateResponse>("PUT", `/media/update`, { ...(options || {}), body });
  }

  deleteId(id: Ops.MediaDeleteIdPath["id"], options?: RequestOptions<Ops.MediaDeleteIdQuery>): Promise<Ops.MediaDeleteIdResponse> {
    return this.client.request<Ops.MediaDeleteIdResponse>("DELETE", `/media/delete/${encodeURIComponent(id)}`, options);
  }

  usage(options?: RequestOptions<Ops.MediaUsageQuery>): Promise<Ops.MediaUsageResponse> {
    return this.client.request<Ops.MediaUsageResponse>("GET", `/media/usage`, options);
  }

  aiMetadata(body: Ops.MediaAiMetadataBody, options?: RequestOptions<Ops.MediaAiMetadataQuery>): Promise<Ops.MediaAiMetadataResponse> {
    return this.client.request<Ops.MediaAiMetadataResponse>("POST", `/media/ai/metadata`, { ...(options || {}), body });
  }

  aiMissingAlt(options?: RequestOptions<Ops.MediaAiMissingAltQuery>): Promise<Ops.MediaAiMissingAltResponse> {
    return this.client.request<Ops.MediaAiMissingAltResponse>("GET", `/media/ai/missingAlt`, options);
  }

}
