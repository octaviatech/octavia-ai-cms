package sdk

import "net/url"

type LanguagesResource struct {
    client *Client
}

func (r *LanguagesResource) Create(body any, query map[string]any) CMSResponse[LanguageWrapper] {
    return RequestInto[LanguageWrapper](r.client, "POST", "/languages/create", query, body)
}

func (r *LanguagesResource) GetAll(query map[string]any) CMSResponse[LanguageList] {
    return RequestInto[LanguageList](r.client, "GET", "/languages/getAll", query, nil)
}

func (r *LanguagesResource) GetById(body any, query map[string]any) CMSResponse[Language] {
    return RequestInto[Language](r.client, "GET", "/languages/getById", query, body)
}

func (r *LanguagesResource) Update(body any, query map[string]any) CMSResponse[LanguageWrapper] {
    return RequestInto[LanguageWrapper](r.client, "PUT", "/languages/update", query, body)
}

func (r *LanguagesResource) DeleteId(id string, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "DELETE", "/languages/delete/" + url.PathEscape(id), query, nil)
}
