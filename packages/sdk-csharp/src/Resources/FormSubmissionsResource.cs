using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class FormSubmissionsResource
{
    private readonly Client _client;

    public FormSubmissionsResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<SubmissionWrapper>> IdSubmitAsync(string id, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubmissionWrapper>("POST", "/forms/" + Uri.EscapeDataString(id) + "/submit", query, body);
    }

    public Task<CMSResponse<SubmissionWrapper>> IdInternalSubmitAsync(string id, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubmissionWrapper>("POST", "/forms/" + Uri.EscapeDataString(id) + "/internal-submit", query, body);
    }

    public Task<CMSResponse<FormSubmissionList>> SubmissionsGetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<FormSubmissionList>("GET", "/forms/submissions/getAll", query, null);
    }

    public Task<CMSResponse<FormSubmissionList>> IdGetAllSubmissionsAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<FormSubmissionList>("GET", "/forms/" + Uri.EscapeDataString(id) + "/getAllSubmissions", query, null);
    }

    public Task<CMSResponse<SubmissionWrapper>> GetSubmissionByIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubmissionWrapper>("GET", "/forms/getSubmissionById/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<FormSubmissionRelations>> SubmissionIdRelationsAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<FormSubmissionRelations>("GET", "/forms/submission/" + Uri.EscapeDataString(id) + "/relations", query, null);
    }

    public Task<CMSResponse<SubmissionWrapper>> SubmissionIdRelationsFieldNameConnectAsync(string id, string fieldName, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubmissionWrapper>("POST", "/forms/submission/" + Uri.EscapeDataString(id) + "/relations/" + Uri.EscapeDataString(fieldName) + "/connect", query, body);
    }

    public Task<CMSResponse<SubmissionWrapper>> SubmissionIdRelationsFieldNameDisconnectAsync(string id, string fieldName, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubmissionWrapper>("POST", "/forms/submission/" + Uri.EscapeDataString(id) + "/relations/" + Uri.EscapeDataString(fieldName) + "/disconnect", query, body);
    }

    public Task<CMSResponse<SubmissionWrapper>> SubmissionIdRelationsFieldNameReorderAsync(string id, string fieldName, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubmissionWrapper>("POST", "/forms/submission/" + Uri.EscapeDataString(id) + "/relations/" + Uri.EscapeDataString(fieldName) + "/reorder", query, body);
    }

    public Task<CMSResponse<FormRelationsBackfill>> SubmissionsRelationsBackfillAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<FormRelationsBackfill>("POST", "/forms/submissions/relations/backfill", query, body);
    }

    public Task<CMSResponse<SubmissionRawWrapper>> SubmissionUpdateIdAsync(string id, object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubmissionRawWrapper>("PUT", "/forms/submission/update/" + Uri.EscapeDataString(id) + "", query, body);
    }

    public Task<CMSResponse<SubmissionRawWrapper>> SubmissionDeleteIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<SubmissionRawWrapper>("DELETE", "/forms/submission/delete/" + Uri.EscapeDataString(id) + "", query, null);
    }

}
