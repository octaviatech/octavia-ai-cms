using Octavia.CmsSDK.Resources;

namespace Octavia.CmsSDK;

public static class CMSConstants
{
    public const string Site = "https://octaviatech.app";
    public const string SignupUrl = Site;
    public const string BaseUrl = "https://api.octaviatech.app/cms";
}

public sealed class CMSOptions
{
    public TimeSpan? Timeout { get; init; }
    public bool ThrowOnError { get; init; }
}

public sealed class CMS
{
    public Client Raw { get; }
    // @generated facade:begin
    public AIResource AI { get; }
    public AIConversationResource AIConversation { get; }
    public ArticlesResource Article { get; }
    public AuthorsResource Author { get; }
    public CategoriesResource Category { get; }
    public FormsResource Form { get; }
    public FormSubmissionsResource FormSubmission { get; }
    public LanguagesResource Language { get; }
    public ReportsResource Report { get; }
    public SubcategoriesResource Subcategory { get; }
    public TagsResource Tag { get; }
    // @generated facade:end

    private CMS(Client client)
    {
        Raw = client;
        // @generated assign:begin
        AI = client.AI;
        AIConversation = client.AIConversation;
        Article = client.Articles;
        Author = client.Authors;
        Category = client.Categories;
        Form = client.Forms;
        FormSubmission = client.FormSubmissions;
        Language = client.Languages;
        Report = client.Reports;
        Subcategory = client.Subcategories;
        Tag = client.Tags;
        // @generated assign:end
    }

    public static CMS Init(string apiKey, CMSOptions? options = null)
    {
        options ??= new CMSOptions();

        var config = new ClientConfig(
            CMSConstants.BaseUrl,
            apiKey,
            options.Timeout,
            options.ThrowOnError
        );

        var client = new Client(config);
        return new CMS(client);
    }
}
