package sdk

import "net/url"

type ContentPlanResource struct {
    client *Client
}

func (r *ContentPlanResource) GetAll(query map[string]any) CMSResponse[ContentPlanList] {
    return RequestInto[ContentPlanList](r.client, "GET", "/content-plan/getAll", query, nil)
}

func (r *ContentPlanResource) Create(body any, query map[string]any) CMSResponse[ContentPlanItemWrapper] {
    return RequestInto[ContentPlanItemWrapper](r.client, "POST", "/content-plan/create", query, body)
}

func (r *ContentPlanResource) Update(body any, query map[string]any) CMSResponse[ContentPlanItemWrapper] {
    return RequestInto[ContentPlanItemWrapper](r.client, "PUT", "/content-plan/update", query, body)
}

func (r *ContentPlanResource) DeleteId(id string, query map[string]any) CMSResponse[ContentPlanItemWrapper] {
    return RequestInto[ContentPlanItemWrapper](r.client, "DELETE", "/content-plan/delete/" + url.PathEscape(id), query, nil)
}

func (r *ContentPlanResource) IdStartDraft(id string, body any, query map[string]any) CMSResponse[StartDraftWrapper] {
    return RequestInto[StartDraftWrapper](r.client, "POST", "/content-plan/" + url.PathEscape(id) + "/start-draft", query, body)
}

func (r *ContentPlanResource) IdSchedule(id string, body any, query map[string]any) CMSResponse[ScheduleWrapper] {
    return RequestInto[ScheduleWrapper](r.client, "POST", "/content-plan/" + url.PathEscape(id) + "/schedule", query, body)
}

func (r *ContentPlanResource) Gaps(query map[string]any) CMSResponse[ContentGapReport] {
    return RequestInto[ContentGapReport](r.client, "GET", "/content-plan/gaps", query, nil)
}

func (r *ContentPlanResource) IdeasFromAi(body any, query map[string]any) CMSResponse[ContentPlanItemWrapper] {
    return RequestInto[ContentPlanItemWrapper](r.client, "POST", "/content-plan/ideas/from-ai", query, body)
}

func (r *ContentPlanResource) AiGenerateIdeas(body any, query map[string]any) CMSResponse[CalendarIdeas] {
    return RequestInto[CalendarIdeas](r.client, "POST", "/content-plan/ai/generate-ideas", query, body)
}

func (r *ContentPlanResource) AiPlanPeriod(body any, query map[string]any) CMSResponse[CalendarPeriodPlan] {
    return RequestInto[CalendarPeriodPlan](r.client, "POST", "/content-plan/ai/plan-period", query, body)
}

func (r *ContentPlanResource) AiBestTime(query map[string]any) CMSResponse[CalendarBestTime] {
    return RequestInto[CalendarBestTime](r.client, "POST", "/content-plan/ai/best-time", query, nil)
}

func (r *ContentPlanResource) AiReschedule(body any, query map[string]any) CMSResponse[CalendarReschedule] {
    return RequestInto[CalendarReschedule](r.client, "POST", "/content-plan/ai/reschedule", query, body)
}

func (r *ContentPlanResource) CadenceGET(query map[string]any) CMSResponse[CadenceWrapper] {
    return RequestInto[CadenceWrapper](r.client, "GET", "/content-plan/cadence", query, nil)
}

func (r *ContentPlanResource) CadencePUT(body any, query map[string]any) CMSResponse[CadenceWrapper] {
    return RequestInto[CadenceWrapper](r.client, "PUT", "/content-plan/cadence", query, body)
}
