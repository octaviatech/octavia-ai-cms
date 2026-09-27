using System.Text.Json;
using Octavia.CmsSDK;
using Octavia.CmsSDK.Models;

namespace Octavia.CmsSDK.Resources;

public class FormsResource
{
    private readonly Client _client;

    public FormsResource(Client client)
    {
        _client = client;
    }

    public Task<CMSResponse<FormWrapper>> CreateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<FormWrapper>("POST", "/forms/create", query, body);
    }

    public Task<CMSResponse<FormNullableWrapper>> UpdateAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<FormNullableWrapper>("PUT", "/forms/update", query, body);
    }

    public Task<CMSResponse<JsonElement>> DeleteAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<JsonElement>("DELETE", "/forms/delete", query, body);
    }

    public Task<CMSResponse<FormList>> GetAllAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<FormList>("GET", "/forms/getAll", query, null);
    }

    public Task<CMSResponse<FormWrapper>> GetBySlugAsync(string slug, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<FormWrapper>("GET", "/forms/getBySlug/" + Uri.EscapeDataString(slug) + "", query, null);
    }

    public Task<CMSResponse<FormWrapper>> GetByIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<FormWrapper>("GET", "/forms/getById/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<NextFormWrapper>> GetNextByIdAsync(string id, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<NextFormWrapper>("GET", "/forms/getNextById/" + Uri.EscapeDataString(id) + "", query, null);
    }

    public Task<CMSResponse<CaptchaConfigWrapper>> CaptchaConfigPUTAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CaptchaConfigWrapper>("PUT", "/forms/captcha/config", query, body);
    }

    public Task<CMSResponse<CaptchaConfigWrapper>> CaptchaConfigGETAsync(Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CaptchaConfigWrapper>("GET", "/forms/captcha/config", query, null);
    }

    public Task<CMSResponse<CaptchaConfigWrapper>> CaptchaConfigSecretAsync(object body, Dictionary<string, string?>? query = null)
    {
        return _client.RequestAsync<CaptchaConfigWrapper>("PATCH", "/forms/captcha/config/secret", query, body);
    }

}
