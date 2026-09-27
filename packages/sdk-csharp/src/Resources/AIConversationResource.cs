using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class AIConversationResource
{
    private readonly Client _client;

    public AIConversationResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<ConversationStart>> ConversationStartAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ConversationStart>("POST", "/ai/conversation/start", query, body);
    }

    public Task<CMSResponse<AIConversationContinue>> ConversationContinueAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AIConversationContinue>("POST", "/ai/conversation/continue", query, body);
    }

    public Task<CMSResponse<AIConversation>> ConversationConversationIdAsync(string conversationId, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AIConversation>("GET", "/ai/conversation/" + Uri.EscapeDataString(conversationId) + "", query, null);
    }

    public Task<CMSResponse<JsonElement>> ConversationGenerateStreamAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("POST", "/ai/conversation/generate/stream", query, body);
    }

    public Task<CMSResponse<ConversationGenerate>> ConversationGenerateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ConversationGenerate>("POST", "/ai/conversation/generate", query, body);
    }

    public Task<CMSResponse<AIConversationRegenerate>> ConversationRegenerateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AIConversationRegenerate>("POST", "/ai/conversation/regenerate", query, body);
    }

}
