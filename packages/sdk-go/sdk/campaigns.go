package sdk

import "net/url"

type CampaignsResource struct {
	client *Client
}

func (r *CampaignsResource) GetAll(query map[string]any) CMSResponse[CampaignList] {
	return RequestInto[CampaignList](r.client, "GET", "/campaigns/getAll", query, nil)
}

func (r *CampaignsResource) Create(body any, query map[string]any) CMSResponse[CampaignWrapper] {
	return RequestInto[CampaignWrapper](r.client, "POST", "/campaigns/create", query, body)
}

func (r *CampaignsResource) Update(body any, query map[string]any) CMSResponse[CampaignWrapper] {
	return RequestInto[CampaignWrapper](r.client, "PUT", "/campaigns/update", query, body)
}

func (r *CampaignsResource) DeleteId(id string, query map[string]any) CMSResponse[CampaignWrapper] {
	return RequestInto[CampaignWrapper](r.client, "DELETE", "/campaigns/delete/"+url.PathEscape(id), query, nil)
}
