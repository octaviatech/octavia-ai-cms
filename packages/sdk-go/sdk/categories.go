package sdk

import "net/url"

type CategoriesResource struct {
    client *Client
}

func (r *CategoriesResource) Create(body any, query map[string]any) CMSResponse[CategoryWrapper] {
    return RequestInto[CategoryWrapper](r.client, "POST", "/categories/create", query, body)
}

func (r *CategoriesResource) Update(body any, query map[string]any) CMSResponse[CategoryWrapper] {
    return RequestInto[CategoryWrapper](r.client, "PUT", "/categories/update", query, body)
}

func (r *CategoriesResource) DeleteId(id string, query map[string]any) CMSResponse[CategoryDeleteResult] {
    return RequestInto[CategoryDeleteResult](r.client, "DELETE", "/categories/delete/" + url.PathEscape(id), query, nil)
}

func (r *CategoriesResource) GetAll(query map[string]any) CMSResponse[CategoryList] {
    return RequestInto[CategoryList](r.client, "GET", "/categories/getAll", query, nil)
}

func (r *CategoriesResource) GetById(id string, query map[string]any) CMSResponse[CategoryWrapper] {
    return RequestInto[CategoryWrapper](r.client, "GET", "/categories/getById/" + url.PathEscape(id), query, nil)
}

func (r *CategoriesResource) GetBySlug(slug string, query map[string]any) CMSResponse[CategoryWrapper] {
    return RequestInto[CategoryWrapper](r.client, "GET", "/categories/getBySlug/" + url.PathEscape(slug), query, nil)
}
