package sdk

import "net/url"

type AIConversationResource struct {
    client *Client
}

func (r *AIConversationResource) ConversationStart(body any, query map[string]any) CMSResponse[ConversationStart] {
    return RequestInto[ConversationStart](r.client, "POST", "/ai/conversation/start", query, body)
}

func (r *AIConversationResource) ConversationContinue(body any, query map[string]any) CMSResponse[AIConversationContinue] {
    return RequestInto[AIConversationContinue](r.client, "POST", "/ai/conversation/continue", query, body)
}

func (r *AIConversationResource) ConversationConversationId(conversationId string, query map[string]any) CMSResponse[AIConversation] {
    return RequestInto[AIConversation](r.client, "GET", "/ai/conversation/" + url.PathEscape(conversationId), query, nil)
}

func (r *AIConversationResource) ConversationGenerateStream(body any, query map[string]any) CMSResponse[any] {
    return RequestInto[any](r.client, "POST", "/ai/conversation/generate/stream", query, body)
}

func (r *AIConversationResource) ConversationGenerate(body any, query map[string]any) CMSResponse[ConversationGenerate] {
    return RequestInto[ConversationGenerate](r.client, "POST", "/ai/conversation/generate", query, body)
}

func (r *AIConversationResource) ConversationRegenerate(body any, query map[string]any) CMSResponse[AIConversationRegenerate] {
    return RequestInto[AIConversationRegenerate](r.client, "POST", "/ai/conversation/regenerate", query, body)
}
