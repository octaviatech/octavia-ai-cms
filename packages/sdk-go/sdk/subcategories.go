package sdk

import "net/url"

type SubcategoriesResource struct {
    client *Client
}

func (r *SubcategoriesResource) Create(body any, query map[string]any) CMSResponse[SubCategoryWrapper] {
    return RequestInto[SubCategoryWrapper](r.client, "POST", "/subcategories/create", query, body)
}

func (r *SubcategoriesResource) Update(body any, query map[string]any) CMSResponse[SubCategoryWrapper] {
    return RequestInto[SubCategoryWrapper](r.client, "PUT", "/subcategories/update", query, body)
}

func (r *SubcategoriesResource) DeleteId(id string, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "DELETE", "/subcategories/delete/" + url.PathEscape(id), query, nil)
}

func (r *SubcategoriesResource) GetAll(query map[string]any) CMSResponse[SubCategoryList] {
    return RequestInto[SubCategoryList](r.client, "GET", "/subcategories/getAll", query, nil)
}

func (r *SubcategoriesResource) GetById(id string, query map[string]any) CMSResponse[SubCategoryWrapper] {
    return RequestInto[SubCategoryWrapper](r.client, "GET", "/subcategories/getById/" + url.PathEscape(id), query, nil)
}

func (r *SubcategoriesResource) GetBySlug(slug string, query map[string]any) CMSResponse[SubCategoryWrapper] {
    return RequestInto[SubCategoryWrapper](r.client, "GET", "/subcategories/getBySlug/" + url.PathEscape(slug), query, nil)
}

func (r *SubcategoriesResource) GetByCategoryId(categoryId string, query map[string]any) CMSResponse[SubCategoryList] {
    return RequestInto[SubCategoryList](r.client, "GET", "/subcategories/getByCategoryId/" + url.PathEscape(categoryId), query, nil)
}
