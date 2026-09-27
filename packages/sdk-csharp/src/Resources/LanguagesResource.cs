using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class LanguagesResource
{
    private readonly Client _client;

    public LanguagesResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<LanguageWrapper>> CreateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<LanguageWrapper>("POST", "/languages/create", query, body);
    }

    public Task<CMSResponse<LanguageList>> GetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<LanguageList>("GET", "/languages/getAll", query, null);
    }

    public Task<CMSResponse<Language>> GetByIdAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<Language>("GET", "/languages/getById", query, body);
    }

    public Task<CMSResponse<LanguageWrapper>> UpdateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<LanguageWrapper>("PUT", "/languages/update", query, body);
    }

    public Task<CMSResponse<JsonElement>> DeleteIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("DELETE", "/languages/delete/" + Uri.EscapeDataString(id) + "", query, null);
    }

}
