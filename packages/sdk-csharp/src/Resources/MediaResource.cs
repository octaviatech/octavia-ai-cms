using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class MediaResource
{
    private readonly Client _client;

    public MediaResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<MediaAssetList>> GetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<MediaAssetList>("GET", "/media/getAll", query, null);
    }

    public Task<CMSResponse<MediaAssetWrapper>> CreateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<MediaAssetWrapper>("POST", "/media/create", query, body);
    }

    public Task<CMSResponse<MediaAssetWrapper>> UpdateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<MediaAssetWrapper>("PUT", "/media/update", query, body);
    }

    public Task<CMSResponse<MediaAssetWrapper>> DeleteIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<MediaAssetWrapper>("DELETE", "/media/delete/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<MediaUsage>> UsageAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<MediaUsage>("GET", "/media/usage", query, null);
    }

    public Task<CMSResponse<MediaMetadataSuggestion>> AiMetadataAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<MediaMetadataSuggestion>("POST", "/media/ai/metadata", query, body);
    }

    public Task<CMSResponse<MediaMissingAlt>> AiMissingAltAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<MediaMissingAlt>("GET", "/media/ai/missingAlt", query, null);
    }

}
