import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class FormSubmissionsResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  idSubmit(id: Ops.FormSubmissionsIdSubmitPath["id"], body: Ops.FormSubmissionsIdSubmitBody, options?: RequestOptions<Ops.FormSubmissionsIdSubmitQuery>): Promise<Ops.FormSubmissionsIdSubmitResponse> {
    return this.client.request<Ops.FormSubmissionsIdSubmitResponse>("POST", `/forms/${encodeURIComponent(id)}/submit`, { ...(options || {}), body });
  }

  idInternalSubmit(id: Ops.FormSubmissionsIdInternalSubmitPath["id"], body: Ops.FormSubmissionsIdInternalSubmitBody, options?: RequestOptions<Ops.FormSubmissionsIdInternalSubmitQuery>): Promise<Ops.FormSubmissionsIdInternalSubmitResponse> {
    return this.client.request<Ops.FormSubmissionsIdInternalSubmitResponse>("POST", `/forms/${encodeURIComponent(id)}/internal-submit`, { ...(options || {}), body });
  }

  submissionsGetAll(options?: RequestOptions<Ops.FormSubmissionsSubmissionsGetAllQuery>): Promise<Ops.FormSubmissionsSubmissionsGetAllResponse> {
    return this.client.request<Ops.FormSubmissionsSubmissionsGetAllResponse>("GET", `/forms/submissions/getAll`, options);
  }

  idGetAllSubmissions(id: Ops.FormSubmissionsIdGetAllSubmissionsPath["id"], options?: RequestOptions<Ops.FormSubmissionsIdGetAllSubmissionsQuery>): Promise<Ops.FormSubmissionsIdGetAllSubmissionsResponse> {
    return this.client.request<Ops.FormSubmissionsIdGetAllSubmissionsResponse>("GET", `/forms/${encodeURIComponent(id)}/getAllSubmissions`, options);
  }

  getSubmissionById(id: Ops.FormSubmissionsGetSubmissionByIdPath["id"], options?: RequestOptions<Ops.FormSubmissionsGetSubmissionByIdQuery>): Promise<Ops.FormSubmissionsGetSubmissionByIdResponse> {
    return this.client.request<Ops.FormSubmissionsGetSubmissionByIdResponse>("GET", `/forms/getSubmissionById/${encodeURIComponent(id)}`, options);
  }

  submissionIdRelations(id: Ops.FormSubmissionsSubmissionIdRelationsPath["id"], options?: RequestOptions<Ops.FormSubmissionsSubmissionIdRelationsQuery>): Promise<Ops.FormSubmissionsSubmissionIdRelationsResponse> {
    return this.client.request<Ops.FormSubmissionsSubmissionIdRelationsResponse>("GET", `/forms/submission/${encodeURIComponent(id)}/relations`, options);
  }

  submissionIdRelationsFieldNameConnect(id: Ops.FormSubmissionsSubmissionIdRelationsFieldNameConnectPath["id"], fieldName: Ops.FormSubmissionsSubmissionIdRelationsFieldNameConnectPath["fieldName"], body: Ops.FormSubmissionsSubmissionIdRelationsFieldNameConnectBody, options?: RequestOptions<Ops.FormSubmissionsSubmissionIdRelationsFieldNameConnectQuery>): Promise<Ops.FormSubmissionsSubmissionIdRelationsFieldNameConnectResponse> {
    return this.client.request<Ops.FormSubmissionsSubmissionIdRelationsFieldNameConnectResponse>("POST", `/forms/submission/${encodeURIComponent(id)}/relations/${encodeURIComponent(fieldName)}/connect`, { ...(options || {}), body });
  }

  submissionIdRelationsFieldNameDisconnect(id: Ops.FormSubmissionsSubmissionIdRelationsFieldNameDisconnectPath["id"], fieldName: Ops.FormSubmissionsSubmissionIdRelationsFieldNameDisconnectPath["fieldName"], body: Ops.FormSubmissionsSubmissionIdRelationsFieldNameDisconnectBody, options?: RequestOptions<Ops.FormSubmissionsSubmissionIdRelationsFieldNameDisconnectQuery>): Promise<Ops.FormSubmissionsSubmissionIdRelationsFieldNameDisconnectResponse> {
    return this.client.request<Ops.FormSubmissionsSubmissionIdRelationsFieldNameDisconnectResponse>("POST", `/forms/submission/${encodeURIComponent(id)}/relations/${encodeURIComponent(fieldName)}/disconnect`, { ...(options || {}), body });
  }

  submissionIdRelationsFieldNameReorder(id: Ops.FormSubmissionsSubmissionIdRelationsFieldNameReorderPath["id"], fieldName: Ops.FormSubmissionsSubmissionIdRelationsFieldNameReorderPath["fieldName"], body: Ops.FormSubmissionsSubmissionIdRelationsFieldNameReorderBody, options?: RequestOptions<Ops.FormSubmissionsSubmissionIdRelationsFieldNameReorderQuery>): Promise<Ops.FormSubmissionsSubmissionIdRelationsFieldNameReorderResponse> {
    return this.client.request<Ops.FormSubmissionsSubmissionIdRelationsFieldNameReorderResponse>("POST", `/forms/submission/${encodeURIComponent(id)}/relations/${encodeURIComponent(fieldName)}/reorder`, { ...(options || {}), body });
  }

  submissionsRelationsBackfill(body: Ops.FormSubmissionsSubmissionsRelationsBackfillBody, options?: RequestOptions<Ops.FormSubmissionsSubmissionsRelationsBackfillQuery>): Promise<Ops.FormSubmissionsSubmissionsRelationsBackfillResponse> {
    return this.client.request<Ops.FormSubmissionsSubmissionsRelationsBackfillResponse>("POST", `/forms/submissions/relations/backfill`, { ...(options || {}), body });
  }

  submissionUpdateId(id: Ops.FormSubmissionsSubmissionUpdateIdPath["id"], body: Ops.FormSubmissionsSubmissionUpdateIdBody, options?: RequestOptions<Ops.FormSubmissionsSubmissionUpdateIdQuery>): Promise<Ops.FormSubmissionsSubmissionUpdateIdResponse> {
    return this.client.request<Ops.FormSubmissionsSubmissionUpdateIdResponse>("PUT", `/forms/submission/update/${encodeURIComponent(id)}`, { ...(options || {}), body });
  }

  submissionDeleteId(id: Ops.FormSubmissionsSubmissionDeleteIdPath["id"], options?: RequestOptions<Ops.FormSubmissionsSubmissionDeleteIdQuery>): Promise<Ops.FormSubmissionsSubmissionDeleteIdResponse> {
    return this.client.request<Ops.FormSubmissionsSubmissionDeleteIdResponse>("DELETE", `/forms/submission/delete/${encodeURIComponent(id)}`, options);
  }

}
