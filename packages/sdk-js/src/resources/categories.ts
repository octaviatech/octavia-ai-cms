import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class CategoriesResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  create(body: Ops.CategoriesCreateBody, options?: RequestOptions<Ops.CategoriesCreateQuery>): Promise<Ops.CategoriesCreateResponse> {
    return this.client.request<Ops.CategoriesCreateResponse>("POST", `/categories/create`, { ...(options || {}), body });
  }

  update(body: Ops.CategoriesUpdateBody, options?: RequestOptions<Ops.CategoriesUpdateQuery>): Promise<Ops.CategoriesUpdateResponse> {
    return this.client.request<Ops.CategoriesUpdateResponse>("PUT", `/categories/update`, { ...(options || {}), body });
  }

  deleteId(id: Ops.CategoriesDeleteIdPath["id"], options?: RequestOptions<Ops.CategoriesDeleteIdQuery>): Promise<Ops.CategoriesDeleteIdResponse> {
    return this.client.request<Ops.CategoriesDeleteIdResponse>("DELETE", `/categories/delete/${encodeURIComponent(id)}`, options);
  }

  getAll(options?: RequestOptions<Ops.CategoriesGetAllQuery>): Promise<Ops.CategoriesGetAllResponse> {
    return this.client.request<Ops.CategoriesGetAllResponse>("GET", `/categories/getAll`, options);
  }

  getById(id: Ops.CategoriesGetByIdPath["id"], options?: RequestOptions<Ops.CategoriesGetByIdQuery>): Promise<Ops.CategoriesGetByIdResponse> {
    return this.client.request<Ops.CategoriesGetByIdResponse>("GET", `/categories/getById/${encodeURIComponent(id)}`, options);
  }

  getBySlug(slug: Ops.CategoriesGetBySlugPath["slug"], options?: RequestOptions<Ops.CategoriesGetBySlugQuery>): Promise<Ops.CategoriesGetBySlugResponse> {
    return this.client.request<Ops.CategoriesGetBySlugResponse>("GET", `/categories/getBySlug/${encodeURIComponent(slug)}`, options);
  }

}
