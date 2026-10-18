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
    public CampaignsResource Campaign { get; }
    public CategoriesResource Category { get; }
    public ContentPlanResource ContentPlan { get; }
    public FormsResource Form { get; }
    public FormSubmissionsResource FormSubmission { get; }
    public LanguagesResource Language { get; }
    public MediaResource Media { get; }
    public ReportsResource Report { get; }
    public SEOHubResource Seo { get; }
    public SubcategoriesResource Subcategory { get; }
    public TagsResource Tag { get; }
    public TaxonomyResource Taxonomy { get; }
    // @generated facade:end

    private CMS(Client client)
    {
        Raw = client;
        // @generated assign:begin
        AI = client.AI;
        AIConversation = client.AIConversation;
        Article = client.Articles;
        Author = client.Authors;
        Campaign = client.Campaigns;
        Category = client.Categories;
        ContentPlan = client.ContentPlan;
        Form = client.Forms;
        FormSubmission = client.FormSubmissions;
        Language = client.Languages;
        Media = client.Media;
        Report = client.Reports;
        Seo = client.SEOHub;
        Subcategory = client.Subcategories;
        Tag = client.Tags;
        Taxonomy = client.Taxonomy;
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
