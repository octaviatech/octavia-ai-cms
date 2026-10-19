package sdk

import "net/url"

type MediaResource struct {
	client *Client
}

func (r *MediaResource) GetAll(query map[string]any) CMSResponse[MediaAssetList] {
	return RequestInto[MediaAssetList](r.client, "GET", "/media/getAll", query, nil)
}

func (r *MediaResource) Create(body any, query map[string]any) CMSResponse[MediaAssetWrapper] {
	return RequestInto[MediaAssetWrapper](r.client, "POST", "/media/create", query, body)
}

func (r *MediaResource) Update(body any, query map[string]any) CMSResponse[MediaAssetWrapper] {
	return RequestInto[MediaAssetWrapper](r.client, "PUT", "/media/update", query, body)
}

func (r *MediaResource) DeleteId(id string, query map[string]any) CMSResponse[MediaAssetWrapper] {
	return RequestInto[MediaAssetWrapper](r.client, "DELETE", "/media/delete/"+url.PathEscape(id), query, nil)
}

func (r *MediaResource) Usage(query map[string]any) CMSResponse[MediaUsage] {
	return RequestInto[MediaUsage](r.client, "GET", "/media/usage", query, nil)
}

func (r *MediaResource) AiMetadata(body any, query map[string]any) CMSResponse[MediaMetadataSuggestion] {
	return RequestInto[MediaMetadataSuggestion](r.client, "POST", "/media/ai/metadata", query, body)
}

func (r *MediaResource) AiMissingAlt(query map[string]any) CMSResponse[MediaMissingAlt] {
	return RequestInto[MediaMissingAlt](r.client, "GET", "/media/ai/missingAlt", query, nil)
}
