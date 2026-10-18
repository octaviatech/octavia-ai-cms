import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class CampaignsResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  getAll(options?: RequestOptions<Ops.CampaignsGetAllQuery>): Promise<Ops.CampaignsGetAllResponse> {
    return this.client.request<Ops.CampaignsGetAllResponse>("GET", `/campaigns/getAll`, options);
  }

  create(body: Ops.CampaignsCreateBody, options?: RequestOptions<Ops.CampaignsCreateQuery>): Promise<Ops.CampaignsCreateResponse> {
    return this.client.request<Ops.CampaignsCreateResponse>("POST", `/campaigns/create`, { ...(options || {}), body });
  }

  update(body: Ops.CampaignsUpdateBody, options?: RequestOptions<Ops.CampaignsUpdateQuery>): Promise<Ops.CampaignsUpdateResponse> {
    return this.client.request<Ops.CampaignsUpdateResponse>("PUT", `/campaigns/update`, { ...(options || {}), body });
  }

  deleteId(id: Ops.CampaignsDeleteIdPath["id"], options?: RequestOptions<Ops.CampaignsDeleteIdQuery>): Promise<Ops.CampaignsDeleteIdResponse> {
    return this.client.request<Ops.CampaignsDeleteIdResponse>("DELETE", `/campaigns/delete/${encodeURIComponent(id)}`, options);
  }

}
