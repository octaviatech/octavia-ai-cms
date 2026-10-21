using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class ContentPlanResource
{
    private readonly Client _client;

    public ContentPlanResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<ContentPlanList>> GetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ContentPlanList>("GET", "/content-plan/getAll", query, null);
    }

    public Task<CMSResponse<ContentPlanItemWrapper>> CreateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ContentPlanItemWrapper>("POST", "/content-plan/create", query, body);
    }

    public Task<CMSResponse<ContentPlanItemWrapper>> UpdateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ContentPlanItemWrapper>("PUT", "/content-plan/update", query, body);
    }

    public Task<CMSResponse<ContentPlanItemWrapper>> DeleteIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ContentPlanItemWrapper>("DELETE", "/content-plan/delete/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<StartDraftWrapper>> IdStartDraftAsync(string id, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<StartDraftWrapper>("POST", "/content-plan/" + Uri.EscapeDataString(id) + "/start-draft", query, body);
    }

    public Task<CMSResponse<ScheduleWrapper>> IdScheduleAsync(string id, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ScheduleWrapper>("POST", "/content-plan/" + Uri.EscapeDataString(id) + "/schedule", query, body);
    }

    public Task<CMSResponse<ContentGapReport>> GapsAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ContentGapReport>("GET", "/content-plan/gaps", query, null);
    }

    public Task<CMSResponse<ContentPlanItemWrapper>> IdeasFromAiAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<ContentPlanItemWrapper>("POST", "/content-plan/ideas/from-ai", query, body);
    }

    public Task<CMSResponse<AiRunAccepted>> AiGenerateIdeasAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiRunAccepted>("POST", "/content-plan/ai/generate-ideas", query, body);
    }

    public Task<CMSResponse<AiRunAccepted>> AiPlanPeriodAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiRunAccepted>("POST", "/content-plan/ai/plan-period", query, body);
    }

    public Task<CMSResponse<AiRunAccepted>> AiBestTimeAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiRunAccepted>("POST", "/content-plan/ai/best-time", query, null);
    }

    public Task<CMSResponse<AiRunAccepted>> AiRescheduleAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<AiRunAccepted>("POST", "/content-plan/ai/reschedule", query, body);
    }

    public Task<CMSResponse<CadenceWrapper>> CadenceGETAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CadenceWrapper>("GET", "/content-plan/cadence", query, null);
    }

    public Task<CMSResponse<CadenceWrapper>> CadencePUTAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CadenceWrapper>("PUT", "/content-plan/cadence", query, body);
    }

}
