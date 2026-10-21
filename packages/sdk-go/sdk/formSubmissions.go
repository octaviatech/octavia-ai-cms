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

func (r *FormSubmissionsResource) SubmissionsFacets(query map[string]any) CMSResponse[SubmissionInboxFacets] {
    return RequestInto[SubmissionInboxFacets](r.client, "GET", "/forms/submissions/facets", query, nil)
}

func (r *FormSubmissionsResource) SubmissionIdAnalyze(id string, body any, query map[string]any) CMSResponse[AiRunAccepted] {
    return RequestInto[AiRunAccepted](r.client, "POST", "/forms/submission/" + url.PathEscape(id) + "/analyze", query, body)
}

func (r *FormSubmissionsResource) SubmissionsAnalyze(body any, query map[string]any) CMSResponse[AiRunAccepted] {
    return RequestInto[AiRunAccepted](r.client, "POST", "/forms/submissions/analyze", query, body)
}

func (r *FormSubmissionsResource) SubmissionIdNotes(id string, body any, query map[string]any) CMSResponse[SubmissionActivityWrapper] {
    return RequestInto[SubmissionActivityWrapper](r.client, "POST", "/forms/submission/" + url.PathEscape(id) + "/notes", query, body)
}

func (r *FormSubmissionsResource) SubmissionIdActivity(id string, query map[string]any) CMSResponse[SubmissionActivityList] {
    return RequestInto[SubmissionActivityList](r.client, "GET", "/forms/submission/" + url.PathEscape(id) + "/activity", query, nil)
}

func (r *FormSubmissionsResource) SubmissionIdReplyDraft(id string, body any, query map[string]any) CMSResponse[AiRunAccepted] {
    return RequestInto[AiRunAccepted](r.client, "POST", "/forms/submission/" + url.PathEscape(id) + "/reply-draft", query, body)
}

func (r *FormSubmissionsResource) SubmissionIdReply(id string, body any, query map[string]any) CMSResponse[SubmissionReplyWrapper] {
    return RequestInto[SubmissionReplyWrapper](r.client, "POST", "/forms/submission/" + url.PathEscape(id) + "/reply", query, body)
}

func (r *FormSubmissionsResource) SubmissionsDigest(query map[string]any) CMSResponse[SubmissionDigestWrapper] {
    return RequestInto[SubmissionDigestWrapper](r.client, "GET", "/forms/submissions/digest", query, nil)
}
