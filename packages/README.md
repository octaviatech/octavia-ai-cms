# SDKs

Official client SDKs for the Octavia AI CMS API. Each one is generated from the
OpenAPI spec, so every public endpoint is covered, and all five share the same
conventions: one required `x-api-key` header, one response shape per language,
and no tenant or service-status header — the gateway derives those from your key.

| Language | Folder | Package |
| --- | --- | --- |
| JavaScript / TypeScript | `sdk-js/` | [`@octaviatech/cms`](https://www.npmjs.com/package/@octaviatech/cms) |
| Python | `sdk-python/` | [`octavia-cms-sdk`](https://pypi.org/project/octavia-cms-sdk/) |
| PHP | `sdk-php/` | [`octavia/cms`](https://packagist.org/packages/octavia/cms) |
| Go | `sdk-go/` | `github.com/octaviatech/octavia-ai-cms/packages/sdk-go` |
| .NET | `sdk-csharp/` | [`Octavia.CmsSDK`](https://www.nuget.org/packages/Octavia.CmsSDK) |

Each folder's README documents installation, authentication, the response shape
for that language, and the available resources. Response shapes differ by
language by design, so read the one for your language.

`packages/sdk-go` is the exception to the "no repository access needed" rule:
Go has no package registry and installs directly from this repository, so its
source must be public — which it is.
