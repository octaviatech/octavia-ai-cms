package sdk

import "net/url"

type FormSubmissionsResource struct {
    client *Client
}

func (r *FormSubmissionsResource) IdSubmit(id string, body any, query map[string]any) CMSResponse[SubmissionWrapper] {
    return RequestInto[SubmissionWrapper](r.client, "POST", "/forms/" + url.PathEscape(id) + "/submit", query, body)
}

func (r *FormSubmissionsResource) IdInternalSubmit(id string, body any, query map[string]any) CMSResponse[SubmissionWrapper] {
    return RequestInto[SubmissionWrapper](r.client, "POST", "/forms/" + url.PathEscape(id) + "/internal-submit", query, body)
}

func (r *FormSubmissionsResource) SubmissionsGetAll(query map[string]any) CMSResponse[FormSubmissionList] {
    return RequestInto[FormSubmissionList](r.client, "GET", "/forms/submissions/getAll", query, nil)
}

func (r *FormSubmissionsResource) IdGetAllSubmissions(id string, query map[string]any) CMSResponse[FormSubmissionList] {
    return RequestInto[FormSubmissionList](r.client, "GET", "/forms/" + url.PathEscape(id) + "/getAllSubmissions", query, nil)
}

func (r *FormSubmissionsResource) GetSubmissionById(id string, query map[string]any) CMSResponse[SubmissionWrapper] {
    return RequestInto[SubmissionWrapper](r.client, "GET", "/forms/getSubmissionById/" + url.PathEscape(id), query, nil)
}

func (r *FormSubmissionsResource) SubmissionIdRelations(id string, query map[string]any) CMSResponse[FormSubmissionRelations] {
    return RequestInto[FormSubmissionRelations](r.client, "GET", "/forms/submission/" + url.PathEscape(id) + "/relations", query, nil)
}

func (r *FormSubmissionsResource) SubmissionIdRelationsFieldNameConnect(id string, fieldName string, body any, query map[string]any) CMSResponse[SubmissionWrapper] {
    return RequestInto[SubmissionWrapper](r.client, "POST", "/forms/submission/" + url.PathEscape(id) + "/relations/" + url.PathEscape(fieldName) + "/connect", query, body)
}

func (r *FormSubmissionsResource) SubmissionIdRelationsFieldNameDisconnect(id string, fieldName string, body any, query map[string]any) CMSResponse[SubmissionWrapper] {
    return RequestInto[SubmissionWrapper](r.client, "POST", "/forms/submission/" + url.PathEscape(id) + "/relations/" + url.PathEscape(fieldName) + "/disconnect", query, body)
}

func (r *FormSubmissionsResource) SubmissionIdRelationsFieldNameReorder(id string, fieldName string, body any, query map[string]any) CMSResponse[SubmissionWrapper] {
    return RequestInto[SubmissionWrapper](r.client, "POST", "/forms/submission/" + url.PathEscape(id) + "/relations/" + url.PathEscape(fieldName) + "/reorder", query, body)
}

func (r *FormSubmissionsResource) SubmissionsRelationsBackfill(body any, query map[string]any) CMSResponse[FormRelationsBackfill] {
    return RequestInto[FormRelationsBackfill](r.client, "POST", "/forms/submissions/relations/backfill", query, body)
}

func (r *FormSubmissionsResource) SubmissionUpdateId(id string, body any, query map[string]any) CMSResponse[SubmissionRawWrapper] {
    return RequestInto[SubmissionRawWrapper](r.client, "PUT", "/forms/submission/update/" + url.PathEscape(id), query, body)
}

func (r *FormSubmissionsResource) SubmissionDeleteId(id string, query map[string]any) CMSResponse[SubmissionRawWrapper] {
    return RequestInto[SubmissionRawWrapper](r.client, "DELETE", "/forms/submission/delete/" + url.PathEscape(id), query, nil)
}
