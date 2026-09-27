package sdk

type TagsResource struct {
    client *Client
}

func (r *TagsResource) Create(body any, query map[string]any) CMSResponse[TagWrapper] {
    return RequestInto[TagWrapper](r.client, "POST", "/tags/create", query, body)
}

func (r *TagsResource) GetAll(query map[string]any) CMSResponse[TagList] {
    return RequestInto[TagList](r.client, "GET", "/tags/getAll", query, nil)
}

func (r *TagsResource) Search(query map[string]any) CMSResponse[TagSearchResult] {
    return RequestInto[TagSearchResult](r.client, "GET", "/tags/search", query, nil)
}
