import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type { SseEvent } from "../http";
import type * as Ops from "../generated/operations";

export class ContentPlanResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  getAll(options?: RequestOptions<Ops.ContentPlanGetAllQuery>): Promise<Ops.ContentPlanGetAllResponse> {
    return this.client.request<Ops.ContentPlanGetAllResponse>("GET", `/content-plan/getAll`, options);
  }

  create(body: Ops.ContentPlanCreateBody, options?: RequestOptions<Ops.ContentPlanCreateQuery>): Promise<Ops.ContentPlanCreateResponse> {
    return this.client.request<Ops.ContentPlanCreateResponse>("POST", `/content-plan/create`, { ...(options || {}), body });
  }

  update(body: Ops.ContentPlanUpdateBody, options?: RequestOptions<Ops.ContentPlanUpdateQuery>): Promise<Ops.ContentPlanUpdateResponse> {
    return this.client.request<Ops.ContentPlanUpdateResponse>("PUT", `/content-plan/update`, { ...(options || {}), body });
  }

  deleteId(id: Ops.ContentPlanDeleteIdPath["id"], options?: RequestOptions<Ops.ContentPlanDeleteIdQuery>): Promise<Ops.ContentPlanDeleteIdResponse> {
    return this.client.request<Ops.ContentPlanDeleteIdResponse>("DELETE", `/content-plan/delete/${encodeURIComponent(id)}`, options);
  }

  idStartDraft(id: Ops.ContentPlanIdStartDraftPath["id"], body: Ops.ContentPlanIdStartDraftBody, options?: RequestOptions<Ops.ContentPlanIdStartDraftQuery>): Promise<Ops.ContentPlanIdStartDraftResponse> {
    return this.client.request<Ops.ContentPlanIdStartDraftResponse>("POST", `/content-plan/${encodeURIComponent(id)}/start-draft`, { ...(options || {}), body });
  }

  idSchedule(id: Ops.ContentPlanIdSchedulePath["id"], body: Ops.ContentPlanIdScheduleBody, options?: RequestOptions<Ops.ContentPlanIdScheduleQuery>): Promise<Ops.ContentPlanIdScheduleResponse> {
    return this.client.request<Ops.ContentPlanIdScheduleResponse>("POST", `/content-plan/${encodeURIComponent(id)}/schedule`, { ...(options || {}), body });
  }

  gaps(options?: RequestOptions<Ops.ContentPlanGapsQuery>): Promise<Ops.ContentPlanGapsResponse> {
    return this.client.request<Ops.ContentPlanGapsResponse>("GET", `/content-plan/gaps`, options);
  }

  ideasFromAi(body: Ops.ContentPlanIdeasFromAiBody, options?: RequestOptions<Ops.ContentPlanIdeasFromAiQuery>): Promise<Ops.ContentPlanIdeasFromAiResponse> {
    return this.client.request<Ops.ContentPlanIdeasFromAiResponse>("POST", `/content-plan/ideas/from-ai`, { ...(options || {}), body });
  }

  aiGenerateIdeas(body: Ops.ContentPlanAiGenerateIdeasBody, options?: RequestOptions<Ops.ContentPlanAiGenerateIdeasQuery>): Promise<Ops.ContentPlanAiGenerateIdeasResponse> {
    return this.client.request<Ops.ContentPlanAiGenerateIdeasResponse>("POST", `/content-plan/ai/generate-ideas`, { ...(options || {}), body });
  }

  aiPlanPeriod(body: Ops.ContentPlanAiPlanPeriodBody, options?: RequestOptions<Ops.ContentPlanAiPlanPeriodQuery>): Promise<Ops.ContentPlanAiPlanPeriodResponse> {
    return this.client.request<Ops.ContentPlanAiPlanPeriodResponse>("POST", `/content-plan/ai/plan-period`, { ...(options || {}), body });
  }

  aiBestTime(options?: RequestOptions<Ops.ContentPlanAiBestTimeQuery>): Promise<Ops.ContentPlanAiBestTimeResponse> {
    return this.client.request<Ops.ContentPlanAiBestTimeResponse>("POST", `/content-plan/ai/best-time`, options);
  }

  aiReschedule(body: Ops.ContentPlanAiRescheduleBody, options?: RequestOptions<Ops.ContentPlanAiRescheduleQuery>): Promise<Ops.ContentPlanAiRescheduleResponse> {
    return this.client.request<Ops.ContentPlanAiRescheduleResponse>("POST", `/content-plan/ai/reschedule`, { ...(options || {}), body });
  }

  cadenceGET(options?: RequestOptions<Ops.ContentPlanCadenceGETQuery>): Promise<Ops.ContentPlanCadenceGETResponse> {
    return this.client.request<Ops.ContentPlanCadenceGETResponse>("GET", `/content-plan/cadence`, options);
  }

  cadencePUT(body: Ops.ContentPlanCadencePUTBody, options?: RequestOptions<Ops.ContentPlanCadencePUTQuery>): Promise<Ops.ContentPlanCadencePUTResponse> {
    return this.client.request<Ops.ContentPlanCadencePUTResponse>("PUT", `/content-plan/cadence`, { ...(options || {}), body });
  }

}
