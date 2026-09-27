import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class FormsResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  create(body: Ops.FormsCreateBody, options?: RequestOptions<Ops.FormsCreateQuery>): Promise<Ops.FormsCreateResponse> {
    return this.client.request<Ops.FormsCreateResponse>("POST", `/forms/create`, { ...(options || {}), body });
  }

  update(body: Ops.FormsUpdateBody, options?: RequestOptions<Ops.FormsUpdateQuery>): Promise<Ops.FormsUpdateResponse> {
    return this.client.request<Ops.FormsUpdateResponse>("PUT", `/forms/update`, { ...(options || {}), body });
  }

  delete(body: Ops.FormsDeleteBody, options?: RequestOptions<Ops.FormsDeleteQuery>): Promise<Ops.FormsDeleteResponse> {
    return this.client.request<Ops.FormsDeleteResponse>("DELETE", `/forms/delete`, { ...(options || {}), body });
  }

  getAll(options?: RequestOptions<Ops.FormsGetAllQuery>): Promise<Ops.FormsGetAllResponse> {
    return this.client.request<Ops.FormsGetAllResponse>("GET", `/forms/getAll`, options);
  }

  getBySlug(slug: Ops.FormsGetBySlugPath["slug"], options?: RequestOptions<Ops.FormsGetBySlugQuery>): Promise<Ops.FormsGetBySlugResponse> {
    return this.client.request<Ops.FormsGetBySlugResponse>("GET", `/forms/getBySlug/${encodeURIComponent(slug)}`, options);
  }

  getById(id: Ops.FormsGetByIdPath["id"], options?: RequestOptions<Ops.FormsGetByIdQuery>): Promise<Ops.FormsGetByIdResponse> {
    return this.client.request<Ops.FormsGetByIdResponse>("GET", `/forms/getById/${encodeURIComponent(id)}`, options);
  }

  getNextById(id: Ops.FormsGetNextByIdPath["id"], options?: RequestOptions<Ops.FormsGetNextByIdQuery>): Promise<Ops.FormsGetNextByIdResponse> {
    return this.client.request<Ops.FormsGetNextByIdResponse>("GET", `/forms/getNextById/${encodeURIComponent(id)}`, options);
  }

  captchaConfigPUT(body: Ops.FormsCaptchaConfigPUTBody, options?: RequestOptions<Ops.FormsCaptchaConfigPUTQuery>): Promise<Ops.FormsCaptchaConfigPUTResponse> {
    return this.client.request<Ops.FormsCaptchaConfigPUTResponse>("PUT", `/forms/captcha/config`, { ...(options || {}), body });
  }

  captchaConfigGET(options?: RequestOptions<Ops.FormsCaptchaConfigGETQuery>): Promise<Ops.FormsCaptchaConfigGETResponse> {
    return this.client.request<Ops.FormsCaptchaConfigGETResponse>("GET", `/forms/captcha/config`, options);
  }

  captchaConfigSecret(body: Ops.FormsCaptchaConfigSecretBody, options?: RequestOptions<Ops.FormsCaptchaConfigSecretQuery>): Promise<Ops.FormsCaptchaConfigSecretResponse> {
    return this.client.request<Ops.FormsCaptchaConfigSecretResponse>("PATCH", `/forms/captcha/config/secret`, { ...(options || {}), body });
  }

}
