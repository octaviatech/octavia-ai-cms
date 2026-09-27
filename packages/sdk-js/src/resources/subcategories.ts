import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class SubcategoriesResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  create(body: Ops.SubcategoriesCreateBody, options?: RequestOptions<Ops.SubcategoriesCreateQuery>): Promise<Ops.SubcategoriesCreateResponse> {
    return this.client.request<Ops.SubcategoriesCreateResponse>("POST", `/subcategories/create`, { ...(options || {}), body });
  }

  update(body: Ops.SubcategoriesUpdateBody, options?: RequestOptions<Ops.SubcategoriesUpdateQuery>): Promise<Ops.SubcategoriesUpdateResponse> {
    return this.client.request<Ops.SubcategoriesUpdateResponse>("PUT", `/subcategories/update`, { ...(options || {}), body });
  }

  deleteId(id: Ops.SubcategoriesDeleteIdPath["id"], options?: RequestOptions<Ops.SubcategoriesDeleteIdQuery>): Promise<Ops.SubcategoriesDeleteIdResponse> {
    return this.client.request<Ops.SubcategoriesDeleteIdResponse>("DELETE", `/subcategories/delete/${encodeURIComponent(id)}`, options);
  }

  getAll(options?: RequestOptions<Ops.SubcategoriesGetAllQuery>): Promise<Ops.SubcategoriesGetAllResponse> {
    return this.client.request<Ops.SubcategoriesGetAllResponse>("GET", `/subcategories/getAll`, options);
  }

  getById(id: Ops.SubcategoriesGetByIdPath["id"], options?: RequestOptions<Ops.SubcategoriesGetByIdQuery>): Promise<Ops.SubcategoriesGetByIdResponse> {
    return this.client.request<Ops.SubcategoriesGetByIdResponse>("GET", `/subcategories/getById/${encodeURIComponent(id)}`, options);
  }

  getBySlug(slug: Ops.SubcategoriesGetBySlugPath["slug"], options?: RequestOptions<Ops.SubcategoriesGetBySlugQuery>): Promise<Ops.SubcategoriesGetBySlugResponse> {
    return this.client.request<Ops.SubcategoriesGetBySlugResponse>("GET", `/subcategories/getBySlug/${encodeURIComponent(slug)}`, options);
  }

  getByCategoryId(categoryId: Ops.SubcategoriesGetByCategoryIdPath["categoryId"], options?: RequestOptions<Ops.SubcategoriesGetByCategoryIdQuery>): Promise<Ops.SubcategoriesGetByCategoryIdResponse> {
    return this.client.request<Ops.SubcategoriesGetByCategoryIdResponse>("GET", `/subcategories/getByCategoryId/${encodeURIComponent(categoryId)}`, options);
  }

}
