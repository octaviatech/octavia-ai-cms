using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class CampaignsResource
{
    private readonly Client _client;

    public CampaignsResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<CampaignList>> GetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CampaignList>("GET", "/campaigns/getAll", query, null);
    }

    public Task<CMSResponse<CampaignWrapper>> CreateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CampaignWrapper>("POST", "/campaigns/create", query, body);
    }

    public Task<CMSResponse<CampaignWrapper>> UpdateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CampaignWrapper>("PUT", "/campaigns/update", query, body);
    }

    public Task<CMSResponse<CampaignWrapper>> DeleteIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CampaignWrapper>("DELETE", "/campaigns/delete/" + Uri.EscapeDataString(id) + "", query, null);
    }

}
