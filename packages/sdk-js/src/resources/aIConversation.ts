import { OctaviaClient } from "../client";
import { RequestOptions } from "../types";
import type * as Ops from "../generated/operations";

export class AIConversationResource {
  private client: OctaviaClient;

  constructor(client: OctaviaClient) {
    this.client = client;
  }

  conversationStart(body: Ops.AIConversationConversationStartBody, options?: RequestOptions<Ops.AIConversationConversationStartQuery>): Promise<Ops.AIConversationConversationStartResponse> {
    return this.client.request<Ops.AIConversationConversationStartResponse>("POST", `/ai/conversation/start`, { ...(options || {}), body });
  }

  conversationContinue(body: Ops.AIConversationConversationContinueBody, options?: RequestOptions<Ops.AIConversationConversationContinueQuery>): Promise<Ops.AIConversationConversationContinueResponse> {
    return this.client.request<Ops.AIConversationConversationContinueResponse>("POST", `/ai/conversation/continue`, { ...(options || {}), body });
  }

  conversationConversationId(conversationId: Ops.AIConversationConversationConversationIdPath["conversationId"], options?: RequestOptions<Ops.AIConversationConversationConversationIdQuery>): Promise<Ops.AIConversationConversationConversationIdResponse> {
    return this.client.request<Ops.AIConversationConversationConversationIdResponse>("GET", `/ai/conversation/${encodeURIComponent(conversationId)}`, options);
  }

  conversationGenerateStream(body: Ops.AIConversationConversationGenerateStreamBody, options?: RequestOptions<Ops.AIConversationConversationGenerateStreamQuery>): Promise<Ops.AIConversationConversationGenerateStreamResponse> {
    return this.client.request<Ops.AIConversationConversationGenerateStreamResponse>("POST", `/ai/conversation/generate/stream`, { ...(options || {}), body });
  }

  conversationGenerate(body: Ops.AIConversationConversationGenerateBody, options?: RequestOptions<Ops.AIConversationConversationGenerateQuery>): Promise<Ops.AIConversationConversationGenerateResponse> {
    return this.client.request<Ops.AIConversationConversationGenerateResponse>("POST", `/ai/conversation/generate`, { ...(options || {}), body });
  }

  conversationRegenerate(body: Ops.AIConversationConversationRegenerateBody, options?: RequestOptions<Ops.AIConversationConversationRegenerateQuery>): Promise<Ops.AIConversationConversationRegenerateResponse> {
    return this.client.request<Ops.AIConversationConversationRegenerateResponse>("POST", `/ai/conversation/regenerate`, { ...(options || {}), body });
  }

}
