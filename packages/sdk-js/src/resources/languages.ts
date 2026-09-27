import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class LanguagesResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  create(body: Ops.LanguagesCreateBody, options?: RequestOptions<Ops.LanguagesCreateQuery>): Promise<Ops.LanguagesCreateResponse> {
    return this.client.request<Ops.LanguagesCreateResponse>("POST", `/languages/create`, { ...(options || {}), body });
  }

  getAll(options?: RequestOptions<Ops.LanguagesGetAllQuery>): Promise<Ops.LanguagesGetAllResponse> {
    return this.client.request<Ops.LanguagesGetAllResponse>("GET", `/languages/getAll`, options);
  }

  getById(body: Ops.LanguagesGetByIdBody, options?: RequestOptions<Ops.LanguagesGetByIdQuery>): Promise<Ops.LanguagesGetByIdResponse> {
    return this.client.request<Ops.LanguagesGetByIdResponse>("GET", `/languages/getById`, { ...(options || {}), body });
  }

  update(body: Ops.LanguagesUpdateBody, options?: RequestOptions<Ops.LanguagesUpdateQuery>): Promise<Ops.LanguagesUpdateResponse> {
    return this.client.request<Ops.LanguagesUpdateResponse>("PUT", `/languages/update`, { ...(options || {}), body });
  }

  deleteId(id: Ops.LanguagesDeleteIdPath["id"], options?: RequestOptions<Ops.LanguagesDeleteIdQuery>): Promise<Ops.LanguagesDeleteIdResponse> {
    return this.client.request<Ops.LanguagesDeleteIdResponse>("DELETE", `/languages/delete/${encodeURIComponent(id)}`, options);
  }

}
