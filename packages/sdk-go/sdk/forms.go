package sdk

import "net/url"

type FormsResource struct {
    client *Client
}

func (r *FormsResource) Create(body any, query map[string]any) CMSResponse[FormWrapper] {
    return RequestInto[FormWrapper](r.client, "POST", "/forms/create", query, body)
}

func (r *FormsResource) Update(body any, query map[string]any) CMSResponse[FormNullableWrapper] {
    return RequestInto[FormNullableWrapper](r.client, "PUT", "/forms/update", query, body)
}

func (r *FormsResource) Delete(body any, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "DELETE", "/forms/delete", query, body)
}

func (r *FormsResource) GetAll(query map[string]any) CMSResponse[FormList] {
    return RequestInto[FormList](r.client, "GET", "/forms/getAll", query, nil)
}

func (r *FormsResource) GetBySlug(slug string, query map[string]any) CMSResponse[FormWrapper] {
    return RequestInto[FormWrapper](r.client, "GET", "/forms/getBySlug/" + url.PathEscape(slug), query, nil)
}

func (r *FormsResource) GetById(id string, query map[string]any) CMSResponse[FormWrapper] {
    return RequestInto[FormWrapper](r.client, "GET", "/forms/getById/" + url.PathEscape(id), query, nil)
}

func (r *FormsResource) GetNextById(id string, query map[string]any) CMSResponse[NextFormWrapper] {
    return RequestInto[NextFormWrapper](r.client, "GET", "/forms/getNextById/" + url.PathEscape(id), query, nil)
}

func (r *FormsResource) CaptchaConfigPUT(body any, query map[string]any) CMSResponse[CaptchaConfigWrapper] {
    return RequestInto[CaptchaConfigWrapper](r.client, "PUT", "/forms/captcha/config", query, body)
}

func (r *FormsResource) CaptchaConfigGET(query map[string]any) CMSResponse[CaptchaConfigWrapper] {
    return RequestInto[CaptchaConfigWrapper](r.client, "GET", "/forms/captcha/config", query, nil)
}

func (r *FormsResource) CaptchaConfigSecret(body any, query map[string]any) CMSResponse[CaptchaConfigWrapper] {
    return RequestInto[CaptchaConfigWrapper](r.client, "PATCH", "/forms/captcha/config/secret", query, body)
}
