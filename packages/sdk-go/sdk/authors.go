package sdk

import "net/url"

type AuthorsResource struct {
    client *Client
}

func (r *AuthorsResource) Create(body any, query map[string]any) CMSResponse[AuthorWrapper] {
    return RequestInto[AuthorWrapper](r.client, "POST", "/authors/create", query, body)
}

func (r *AuthorsResource) Update(body any, query map[string]any) CMSResponse[AuthorWrapper] {
    return RequestInto[AuthorWrapper](r.client, "PUT", "/authors/update", query, body)
}

func (r *AuthorsResource) DeleteId(id string, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "DELETE", "/authors/delete/" + url.PathEscape(id), query, nil)
}

func (r *AuthorsResource) GetAll(query map[string]any) CMSResponse[AuthorList] {
    return RequestInto[AuthorList](r.client, "GET", "/authors/getAll", query, nil)
}

func (r *AuthorsResource) GetById(id string, query map[string]any) CMSResponse[AuthorWrapper] {
    return RequestInto[AuthorWrapper](r.client, "GET", "/authors/getById/" + url.PathEscape(id), query, nil)
}

func (r *AuthorsResource) GetBySlug(slug string, query map[string]any) CMSResponse[AuthorWrapper] {
    return RequestInto[AuthorWrapper](r.client, "GET", "/authors/getBySlug/" + url.PathEscape(slug), query, nil)
}
