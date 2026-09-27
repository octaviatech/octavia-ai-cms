import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class AuthorsResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  create(body: Ops.AuthorsCreateBody, options?: RequestOptions<Ops.AuthorsCreateQuery>): Promise<Ops.AuthorsCreateResponse> {
    return this.client.request<Ops.AuthorsCreateResponse>("POST", `/authors/create`, { ...(options || {}), body });
  }

  update(body: Ops.AuthorsUpdateBody, options?: RequestOptions<Ops.AuthorsUpdateQuery>): Promise<Ops.AuthorsUpdateResponse> {
    return this.client.request<Ops.AuthorsUpdateResponse>("PUT", `/authors/update`, { ...(options || {}), body });
  }

  deleteId(id: Ops.AuthorsDeleteIdPath["id"], options?: RequestOptions<Ops.AuthorsDeleteIdQuery>): Promise<Ops.AuthorsDeleteIdResponse> {
    return this.client.request<Ops.AuthorsDeleteIdResponse>("DELETE", `/authors/delete/${encodeURIComponent(id)}`, options);
  }

  getAll(options?: RequestOptions<Ops.AuthorsGetAllQuery>): Promise<Ops.AuthorsGetAllResponse> {
    return this.client.request<Ops.AuthorsGetAllResponse>("GET", `/authors/getAll`, options);
  }

  getById(id: Ops.AuthorsGetByIdPath["id"], options?: RequestOptions<Ops.AuthorsGetByIdQuery>): Promise<Ops.AuthorsGetByIdResponse> {
    return this.client.request<Ops.AuthorsGetByIdResponse>("GET", `/authors/getById/${encodeURIComponent(id)}`, options);
  }

  getBySlug(slug: Ops.AuthorsGetBySlugPath["slug"], options?: RequestOptions<Ops.AuthorsGetBySlugQuery>): Promise<Ops.AuthorsGetBySlugResponse> {
    return this.client.request<Ops.AuthorsGetBySlugResponse>("GET", `/authors/getBySlug/${encodeURIComponent(slug)}`, options);
  }

}
