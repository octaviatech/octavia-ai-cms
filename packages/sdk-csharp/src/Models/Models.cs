using System.Runtime.Serialization;
using System.Text.Json;
using System.Text.Json.Serialization;

namespace Octavia.CmsSDK.Models;

using MultilingualString = global::System.Collections.Generic.Dictionary<string, string>;
using SeoPerLanguage = global::System.Collections.Generic.Dictionary<string, SeoLanguageMetrics>;
using SeoAnalysisPerLanguage = global::System.Collections.Generic.Dictionary<string, SeoAnalysis>;

// Generated from the OpenAPI spec — do not edit by hand.

public enum AIConversationMessageRoleEnum
{
    [EnumMember(Value = "user")]
    User,
    [EnumMember(Value = "ai")]
    Ai,
}

public enum AIConversationStageEnum
{
    [EnumMember(Value = "gathering")]
    Gathering,
    [EnumMember(Value = "planning")]
    Planning,
    [EnumMember(Value = "generating")]
    Generating,
    [EnumMember(Value = "review")]
    Review,
}

public enum ArticleContentSourceEnum
{
    [EnumMember(Value = "human")]
    Human,
    [EnumMember(Value = "ai")]
    Ai,
    [EnumMember(Value = "mixed")]
    Mixed,
}

public enum FormRelationRefFormTypeEnum
{
    [EnumMember(Value = "public")]
    @Public,
    [EnumMember(Value = "internal")]
    @Internal,
}

public enum FormFieldTypeEnum
{
    [EnumMember(Value = "text")]
    Text,
    [EnumMember(Value = "email")]
    Email,
    [EnumMember(Value = "number")]
    Number,
    [EnumMember(Value = "date")]
    Date,
    [EnumMember(Value = "datetime-local")]
    DatetimeLocal,
    [EnumMember(Value = "tags")]
    Tags,
    [EnumMember(Value = "tags-select")]
    TagsSelect,
    [EnumMember(Value = "tel")]
    Tel,
    [EnumMember(Value = "select")]
    Select,
    [EnumMember(Value = "multi-select")]
    MultiSelect,
    [EnumMember(Value = "checkbox")]
    Checkbox,
    [EnumMember(Value = "multi-checkbox")]
    MultiCheckbox,
    [EnumMember(Value = "radio")]
    Radio,
    [EnumMember(Value = "textarea")]
    Textarea,
    [EnumMember(Value = "file")]
    File,
    [EnumMember(Value = "switch")]
    @Switch,
    [EnumMember(Value = "markdown")]
    Markdown,
}

public enum FormFormTypeEnum
{
    [EnumMember(Value = "public")]
    @Public,
    [EnumMember(Value = "internal")]
    @Internal,
}

public enum CaptchaConfigProviderEnum
{
    [EnumMember(Value = "recaptcha")]
    Recaptcha,
    [EnumMember(Value = "hcaptcha")]
    Hcaptcha,
    [EnumMember(Value = "turnstile")]
    Turnstile,
}

public enum AIConversationRegenerateStatusEnum
{
    [EnumMember(Value = "approved")]
    Approved,
    [EnumMember(Value = "needs_improvement")]
    NeedsImprovement,
}

public enum TopArticlesReportMetricEnum
{
    [EnumMember(Value = "views")]
    Views,
    [EnumMember(Value = "publishDate")]
    PublishDate,
    [EnumMember(Value = "engagement")]
    Engagement,
}

public enum ReportLagBucketBucketEnum
{
    [EnumMember(Value = "under_24h")]
    Under24h,
    [EnumMember(Value = "1_to_3_days")]
    _1To3Days,
    [EnumMember(Value = "3_to_7_days")]
    _3To7Days,
    [EnumMember(Value = "over_7_days")]
    Over7Days,
}

public enum ReportQualityBucketLabelEnum
{
    [EnumMember(Value = "strong")]
    Strong,
    [EnumMember(Value = "needs_work")]
    NeedsWork,
    [EnumMember(Value = "weak")]
    Weak,
}

public enum ReportMetricDeltaLabelEnum
{
    [EnumMember(Value = "articles")]
    Articles,
    [EnumMember(Value = "publishedArticles")]
    PublishedArticles,
    [EnumMember(Value = "views")]
    Views,
    [EnumMember(Value = "engagement")]
    Engagement,
    [EnumMember(Value = "submissions")]
    Submissions,
    [EnumMember(Value = "aiRequests")]
    AiRequests,
}

public enum CommentActorTypeEnum
{
    [EnumMember(Value = "user")]
    User,
    [EnumMember(Value = "guest")]
    Guest,
}

public enum CommentStatusEnum
{
    [EnumMember(Value = "pending")]
    Pending,
    [EnumMember(Value = "approved")]
    Approved,
    [EnumMember(Value = "rejected")]
    Rejected,
}

public enum ArticleReactionTotalsReactionEnum
{
    [EnumMember(Value = "like")]
    Like,
    [EnumMember(Value = "dislike")]
    Dislike,
}

public enum ArticleReactionSummaryUserReactionEnum
{
    [EnumMember(Value = "like")]
    Like,
    [EnumMember(Value = "dislike")]
    Dislike,
}

public enum CommentReactionTotalsReactionEnum
{
    [EnumMember(Value = "like")]
    Like,
    [EnumMember(Value = "dislike")]
    Dislike,
}

public enum CommentReactionSummaryUserReactionEnum
{
    [EnumMember(Value = "like")]
    Like,
    [EnumMember(Value = "dislike")]
    Dislike,
}

public enum DashboardSlotTypeEnum
{
    [EnumMember(Value = "operationsOverview")]
    OperationsOverview,
    [EnumMember(Value = "tenantCapacity")]
    TenantCapacity,
    [EnumMember(Value = "contentTrend")]
    ContentTrend,
    [EnumMember(Value = "summaryOverview")]
    SummaryOverview,
    [EnumMember(Value = "topArticles")]
    TopArticles,
    [EnumMember(Value = "reportIntelligence")]
    ReportIntelligence,
    [EnumMember(Value = "contentSpotlight")]
    ContentSpotlight,
}

public enum DashboardSlotSpanEnum
{
    [EnumMember(Value = "half")]
    Half,
    [EnumMember(Value = "full")]
    Full,
}

public enum SocialConnectionProviderEnum
{
    [EnumMember(Value = "linkedin")]
    Linkedin,
    [EnumMember(Value = "twitter")]
    Twitter,
    [EnumMember(Value = "telegram")]
    Telegram,
}

public enum SocialPublishResultProviderEnum
{
    [EnumMember(Value = "linkedin")]
    Linkedin,
    [EnumMember(Value = "twitter")]
    Twitter,
    [EnumMember(Value = "telegram")]
    Telegram,
}

public enum ConversationStartStageEnum
{
    [EnumMember(Value = "gathering")]
    Gathering,
    [EnumMember(Value = "planning")]
    Planning,
    [EnumMember(Value = "generating")]
    Generating,
    [EnumMember(Value = "review")]
    Review,
}

public enum ConversationGenerateStatusEnum
{
    [EnumMember(Value = "approved")]
    Approved,
    [EnumMember(Value = "needs_improvement")]
    NeedsImprovement,
    [EnumMember(Value = "max_attempts_reached")]
    MaxAttemptsReached,
}

public record MultilingualStringOrNull
{
    [JsonExtensionData]
    public Dictionary<string, JsonElement>? Extra { get; set; }
}

public record Pagination
{
    [JsonPropertyName("total")]
    public double Total { get; set; }

    [JsonPropertyName("page")]
    public double Page { get; set; }

    [JsonPropertyName("limit")]
    public double Limit { get; set; }

    [JsonPropertyName("totalPages")]
    public double TotalPages { get; set; }
}

public record Tokens
{
    [JsonPropertyName("used")]
    public double Used { get; set; }

    [JsonPropertyName("remaining")]
    public double Remaining { get; set; }

    [JsonPropertyName("limit")]
    public double Limit { get; set; }
}

public record TokensUsedOnly
{
    [JsonPropertyName("used")]
    public double Used { get; set; }
}

public record SeoKeywordAnalysis
{
    [JsonPropertyName("term")]
    public string? Term { get; set; } = null;

    [JsonPropertyName("count")]
    public double Count { get; set; }

    [JsonPropertyName("density")]
    public double Density { get; set; }

    [JsonPropertyName("positions")]
    public double[]? Positions { get; set; } = null;

    [JsonPropertyName("inTitle")]
    public bool InTitle { get; set; }

    [JsonPropertyName("inHeadings")]
    public double InHeadings { get; set; }

    [JsonPropertyName("inFirstParagraph")]
    public bool InFirstParagraph { get; set; }
}

public record SeoLanguageMetrics
{
    [JsonPropertyName("languageCode")]
    public string? LanguageCode { get; set; } = null;

    [JsonPropertyName("primaryKeyword")]
    public string? PrimaryKeyword { get; set; } = null;

    [JsonPropertyName("baseScore")]
    public double BaseScore { get; set; }

    [JsonPropertyName("potentialScore")]
    public double PotentialScore { get; set; }

    [JsonPropertyName("signals")]
    public Dictionary<string, JsonElement>? Signals { get; set; } = null;

    [JsonPropertyName("wordCount")]
    public double WordCount { get; set; }

    [JsonPropertyName("keywordDensity")]
    public double? KeywordDensity { get; set; } = null;

    [JsonPropertyName("suggestions")]
    public string[]? Suggestions { get; set; } = null;

    [JsonPropertyName("termsAnalysis")]
    public Dictionary<string, JsonElement>? TermsAnalysis { get; set; } = null;

    [JsonPropertyName("structureAnalysis")]
    public Dictionary<string, JsonElement>? StructureAnalysis { get; set; } = null;

    [JsonPropertyName("linkAnalysis")]
    public Dictionary<string, JsonElement>? LinkAnalysis { get; set; } = null;

    [JsonPropertyName("imageAnalysis")]
    public Dictionary<string, JsonElement>? ImageAnalysis { get; set; } = null;

    [JsonPropertyName("readabilityMetrics")]
    public Dictionary<string, JsonElement>? ReadabilityMetrics { get; set; } = null;

    [JsonPropertyName("technicalSEO")]
    public Dictionary<string, JsonElement>? TechnicalSEO { get; set; } = null;
}

public record ArticleSeo
{
    [JsonPropertyName("perLanguage")]
    public SeoPerLanguage? PerLanguage { get; set; } = null;
}

public record Author
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("name")]
    public MultilingualString Name { get; set; } = null!;

    [JsonPropertyName("email")]
    public string Email { get; set; } = null!;

    [JsonPropertyName("avatar")]
    public string? Avatar { get; set; } = null;

    [JsonPropertyName("bio")]
    public MultilingualString? Bio { get; set; } = null;

    [JsonPropertyName("isPrivate")]
    public bool IsPrivate { get; set; }

    [JsonPropertyName("isActive")]
    public bool IsActive { get; set; }

    [JsonPropertyName("isDeleted")]
    public bool IsDeleted { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record Category
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("name")]
    public MultilingualString Name { get; set; } = null!;

    [JsonPropertyName("slug")]
    public string Slug { get; set; } = null!;

    [JsonPropertyName("thumbnail")]
    public string? Thumbnail { get; set; } = null;

    [JsonPropertyName("description")]
    public MultilingualString? Description { get; set; } = null;

    [JsonPropertyName("isPrivate")]
    public bool IsPrivate { get; set; }

    [JsonPropertyName("isActive")]
    public bool IsActive { get; set; }

    [JsonPropertyName("isDeleted")]
    public bool IsDeleted { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record SubCategory
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("name")]
    public MultilingualString Name { get; set; } = null!;

    [JsonPropertyName("slug")]
    public string Slug { get; set; } = null!;

    [JsonPropertyName("thumbnail")]
    public string? Thumbnail { get; set; } = null;

    [JsonPropertyName("description")]
    public MultilingualString? Description { get; set; } = null;

    [JsonPropertyName("category")]
    public string Category { get; set; } = null!;

    [JsonPropertyName("isPrivate")]
    public bool IsPrivate { get; set; }

    [JsonPropertyName("isActive")]
    public bool IsActive { get; set; }

    [JsonPropertyName("isDeleted")]
    public bool IsDeleted { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record Tag
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("name")]
    public string Name { get; set; } = null!;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record Language
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("code")]
    public string Code { get; set; } = null!;

    [JsonPropertyName("name")]
    public string Name { get; set; } = null!;

    [JsonPropertyName("isActive")]
    public bool IsActive { get; set; }

    [JsonPropertyName("isDeleted")]
    public bool IsDeleted { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record AIConversationMessage
{
    [JsonPropertyName("role")]
    public AIConversationMessageRoleEnum Role { get; set; }

    [JsonPropertyName("content")]
    public string Content { get; set; } = null!;

    [JsonPropertyName("timestamp")]
    public System.DateTime Timestamp { get; set; }
}

public record AIConversationClarification
{
    [JsonPropertyName("question")]
    public string? Question { get; set; } = null;

    [JsonPropertyName("answer")]
    public string? Answer { get; set; } = null;
}

public record AIConversationRequirements
{
    [JsonPropertyName("targetAudience")]
    public string? TargetAudience { get; set; } = null;

    [JsonPropertyName("tone")]
    public string? Tone { get; set; } = null;

    [JsonPropertyName("length")]
    public string? Length { get; set; } = null;

    [JsonPropertyName("keywords")]
    public string[]? Keywords { get; set; } = null;

    [JsonPropertyName("language")]
    public string? Language { get; set; } = null;

    [JsonPropertyName("primaryKeyword")]
    public string? PrimaryKeyword { get; set; } = null;

    [JsonPropertyName("minWordCount")]
    public double? MinWordCount { get; set; } = null;
}

public record AIConversation
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("conversationId")]
    public string ConversationId { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("userId")]
    public string? UserId { get; set; } = null;

    [JsonPropertyName("stage")]
    public AIConversationStageEnum Stage { get; set; }

    [JsonPropertyName("tokensInput")]
    public double TokensInput { get; set; }

    [JsonPropertyName("tokensOutput")]
    public double TokensOutput { get; set; }

    [JsonPropertyName("tokensTotal")]
    public double TokensTotal { get; set; }

    [JsonPropertyName("messages")]
    public AIConversationMessage[] Messages { get; set; } = null!;

    [JsonPropertyName("context")]
    public Dictionary<string, JsonElement>? Context { get; set; } = null;

    [JsonPropertyName("attempts")]
    public double Attempts { get; set; }

    [JsonPropertyName("maxAttempts")]
    public double MaxAttempts { get; set; }

    [JsonPropertyName("lastArticle")]
    public Dictionary<string, JsonElement>? LastArticle { get; set; } = null;

    [JsonPropertyName("expiresAt")]
    public System.DateTime ExpiresAt { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record AIConversationArticle
{
    [JsonPropertyName("title")]
    public string? Title { get; set; } = null;

    [JsonPropertyName("summary")]
    public string? Summary { get; set; } = null;

    [JsonPropertyName("content")]
    public string? Content { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("tags")]
    public string[]? Tags { get; set; } = null;

    [JsonPropertyName("seoScore")]
    public double SeoScore { get; set; }
}

public record Article
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("mainTitle")]
    public MultilingualString MainTitle { get; set; } = null!;

    [JsonPropertyName("title2")]
    public MultilingualString? Title2 { get; set; } = null;

    [JsonPropertyName("title3")]
    public MultilingualString? Title3 { get; set; } = null;

    [JsonPropertyName("summary")]
    public MultilingualStringOrNull? Summary { get; set; } = null;

    [JsonPropertyName("content")]
    public MultilingualString Content { get; set; } = null!;

    [JsonPropertyName("category")]
    public string[]? Category { get; set; } = null;

    [JsonPropertyName("subCategory")]
    public string[]? SubCategory { get; set; } = null;

    [JsonPropertyName("author")]
    public string Author { get; set; } = null!;

    [JsonPropertyName("createdBy")]
    public string CreatedBy { get; set; } = null!;

    [JsonPropertyName("tags")]
    public string[]? Tags { get; set; } = null;

    [JsonPropertyName("thumbnail")]
    public string? Thumbnail { get; set; } = null;

    [JsonPropertyName("gallery")]
    public string[]? Gallery { get; set; } = null;

    [JsonPropertyName("videos")]
    public string[]? Videos { get; set; } = null;

    [JsonPropertyName("audios")]
    public string[]? Audios { get; set; } = null;

    [JsonPropertyName("documents")]
    public string[]? Documents { get; set; } = null;

    [JsonPropertyName("files")]
    public string[]? Files { get; set; } = null;

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("dislikes")]
    public double Dislikes { get; set; }

    [JsonPropertyName("shares")]
    public double Shares { get; set; }

    [JsonPropertyName("rating")]
    public double Rating { get; set; }

    [JsonPropertyName("ratingCount")]
    public double RatingCount { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }

    [JsonPropertyName("publishDate")]
    public System.DateTime PublishDate { get; set; }

    [JsonPropertyName("isPublished")]
    public bool IsPublished { get; set; }

    [JsonPropertyName("isPrivate")]
    public bool IsPrivate { get; set; }

    [JsonPropertyName("isDeleted")]
    public bool IsDeleted { get; set; }

    [JsonPropertyName("isActive")]
    public bool IsActive { get; set; }

    [JsonPropertyName("autoSummarize")]
    public bool AutoSummarize { get; set; }

    [JsonPropertyName("contentSource")]
    public ArticleContentSourceEnum? ContentSource { get; set; } = null;

    [JsonPropertyName("engagement")]
    public Dictionary<string, JsonElement>? Engagement { get; set; } = null;

    [JsonPropertyName("seo")]
    public ArticleSeo? Seo { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record ArticleListItem
{
    [JsonPropertyName("_id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("mainTitle")]
    public MultilingualString? MainTitle { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("thumbnail")]
    public string? Thumbnail { get; set; } = null;

    [JsonPropertyName("category")]
    public Category[]? Category { get; set; } = null;

    [JsonPropertyName("subCategory")]
    public SubCategory[]? SubCategory { get; set; } = null;

    [JsonPropertyName("author")]
    public Author? Author { get; set; } = null;

    [JsonPropertyName("summary")]
    public MultilingualStringOrNull? Summary { get; set; } = null;

    [JsonPropertyName("isPublished")]
    public bool IsPublished { get; set; }

    [JsonPropertyName("isPrivate")]
    public bool IsPrivate { get; set; }

    [JsonPropertyName("publishDate")]
    public System.DateTime PublishDate { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }

    [JsonPropertyName("seo")]
    public ArticleSeo? Seo { get; set; } = null;
}

public record ArticleLocalized
{
    [JsonPropertyName("_id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("mainTitle")]
    public MultilingualStringOrNull? MainTitle { get; set; } = null;

    [JsonPropertyName("title2")]
    public MultilingualStringOrNull? Title2 { get; set; } = null;

    [JsonPropertyName("title3")]
    public MultilingualStringOrNull? Title3 { get; set; } = null;

    [JsonPropertyName("summary")]
    public MultilingualStringOrNull? Summary { get; set; } = null;

    [JsonPropertyName("content")]
    public MultilingualStringOrNull? Content { get; set; } = null;

    [JsonPropertyName("category")]
    public Dictionary<string, JsonElement>[]? Category { get; set; } = null;

    [JsonPropertyName("subCategory")]
    public Dictionary<string, JsonElement>[]? SubCategory { get; set; } = null;

    [JsonPropertyName("author")]
    public Dictionary<string, JsonElement>? Author { get; set; } = null;

    [JsonPropertyName("isPublished")]
    public bool IsPublished { get; set; }

    [JsonPropertyName("isPrivate")]
    public bool IsPrivate { get; set; }

    [JsonPropertyName("publishDate")]
    public System.DateTime PublishDate { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record FormFieldOption
{
    [JsonPropertyName("value")]
    public string Value { get; set; } = null!;

    [JsonPropertyName("label")]
    public MultilingualString Label { get; set; } = null!;
}

public record FormRelationRef
{
    [JsonPropertyName("_id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("title")]
    public MultilingualString? Title { get; set; } = null;

    [JsonPropertyName("formType")]
    public FormRelationRefFormTypeEnum? FormType { get; set; } = null;
}

public record FormField
{
    [JsonPropertyName("name")]
    public string Name { get; set; } = null!;

    [JsonPropertyName("type")]
    public FormFieldTypeEnum Type { get; set; }

    [JsonPropertyName("label")]
    public MultilingualString Label { get; set; } = null!;

    [JsonPropertyName("required")]
    public bool Required { get; set; }

    [JsonPropertyName("options")]
    public FormFieldOption[]? Options { get; set; } = null;

    [JsonPropertyName("validation")]
    public Dictionary<string, JsonElement>? Validation { get; set; } = null;

    [JsonPropertyName("multiple")]
    public bool Multiple { get; set; }

    [JsonPropertyName("accept")]
    public string? Accept { get; set; } = null;

    [JsonPropertyName("colSpan")]
    public double ColSpan { get; set; }

    [JsonPropertyName("icon")]
    public string? Icon { get; set; } = null;

    [JsonPropertyName("disabled")]
    public bool Disabled { get; set; }

    [JsonPropertyName("verified")]
    public bool Verified { get; set; }

    [JsonPropertyName("defaultValue")]
    public JsonElement DefaultValue { get; set; }

    [JsonPropertyName("placeholder")]
    public MultilingualString? Placeholder { get; set; } = null;

    [JsonPropertyName("relation")]
    public Dictionary<string, JsonElement>? Relation { get; set; } = null;

    [JsonPropertyName("relationDetails")]
    public Dictionary<string, JsonElement>? RelationDetails { get; set; } = null;
}

public record FormSection
{
    [JsonPropertyName("title")]
    public MultilingualString Title { get; set; } = null!;

    [JsonPropertyName("icon")]
    public string? Icon { get; set; } = null;

    [JsonPropertyName("description")]
    public MultilingualString? Description { get; set; } = null;

    [JsonPropertyName("fields")]
    public FormField[] Fields { get; set; } = null!;
}

public record FormNotification
{
    [JsonPropertyName("enabled")]
    public bool Enabled { get; set; }

    [JsonPropertyName("email")]
    public Dictionary<string, JsonElement>? Email { get; set; } = null;

    [JsonPropertyName("push")]
    public Dictionary<string, JsonElement>? Push { get; set; } = null;
}

public record Form
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("title")]
    public MultilingualString Title { get; set; } = null!;

    [JsonPropertyName("slug")]
    public string Slug { get; set; } = null!;

    [JsonPropertyName("description")]
    public MultilingualString? Description { get; set; } = null;

    [JsonPropertyName("sections")]
    public FormSection[] Sections { get; set; } = null!;

    [JsonPropertyName("submitButtonText")]
    public MultilingualString? SubmitButtonText { get; set; } = null;

    [JsonPropertyName("formType")]
    public FormFormTypeEnum? FormType { get; set; } = null;

    [JsonPropertyName("notification")]
    public FormNotification? Notification { get; set; } = null;

    [JsonPropertyName("captcha")]
    public Dictionary<string, JsonElement>? Captcha { get; set; } = null;

    [JsonPropertyName("relation")]
    public Dictionary<string, JsonElement>? Relation { get; set; } = null;

    [JsonPropertyName("relationDetails")]
    public Dictionary<string, JsonElement>? RelationDetails { get; set; } = null;

    [JsonPropertyName("createdBy")]
    public string? CreatedBy { get; set; } = null;

    [JsonPropertyName("isActive")]
    public bool IsActive { get; set; }

    [JsonPropertyName("isDeleted")]
    public bool IsDeleted { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record FormListItem
{
    [JsonPropertyName("submissionsCount")]
    public double SubmissionsCount { get; set; }
}

public record FormSubmission
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("formId")]
    public string FormId { get; set; } = null!;

    [JsonPropertyName("language")]
    public string Language { get; set; } = null!;

    [JsonPropertyName("values")]
    public Dictionary<string, JsonElement> Values { get; set; } = null!;

    [JsonPropertyName("relations")]
    public Dictionary<string, JsonElement>[]? Relations { get; set; } = null;

    [JsonPropertyName("status")]
    public double Status { get; set; }

    [JsonPropertyName("submittedAt")]
    public System.DateTime SubmittedAt { get; set; }

    [JsonPropertyName("isDeleted")]
    public bool IsDeleted { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record FormSubmissionSummary
{
    [JsonPropertyName("_id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("formId")]
    public string? FormId { get; set; } = null;

    [JsonPropertyName("language")]
    public string? Language { get; set; } = null;

    [JsonPropertyName("values")]
    public Dictionary<string, JsonElement>? Values { get; set; } = null;

    [JsonPropertyName("status")]
    public double Status { get; set; }

    [JsonPropertyName("submittedAt")]
    public System.DateTime SubmittedAt { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record FormSubmissionEnriched
{
    [JsonPropertyName("relatedEntries")]
    public Dictionary<string, JsonElement>[]? RelatedEntries { get; set; } = null;

    [JsonPropertyName("reverseRelations")]
    public Dictionary<string, JsonElement>[]? ReverseRelations { get; set; } = null;
}

public record CaptchaConfig
{
    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("provider")]
    public CaptchaConfigProviderEnum? Provider { get; set; } = null;

    [JsonPropertyName("siteKey")]
    public string? SiteKey { get; set; } = null;

    [JsonPropertyName("isActive")]
    public bool IsActive { get; set; }

    [JsonPropertyName("hasSecretKey")]
    public bool HasSecretKey { get; set; }

    [JsonPropertyName("secretKeyMasked")]
    public string? SecretKeyMasked { get; set; } = null;

    [JsonPropertyName("updatedBy")]
    public string? UpdatedBy { get; set; } = null;

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record RepurposedOutput
{
    [JsonPropertyName("title")]
    public string? Title { get; set; } = null;

    [JsonPropertyName("summary")]
    public string? Summary { get; set; } = null;

    [JsonPropertyName("content")]
    public string? Content { get; set; } = null;

    [JsonPropertyName("hashtags")]
    public string[]? Hashtags { get; set; } = null;

    [JsonPropertyName("cta")]
    public string? Cta { get; set; } = null;
}

public record RepurposeResult
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("platforms")]
    public Dictionary<string, RepurposedOutput>? Platforms { get; set; } = null;

    [JsonPropertyName("aiGenerationId")]
    public string? AiGenerationId { get; set; } = null;

    [JsonPropertyName("tokens")]
    public Tokens? Tokens { get; set; } = null;
}

public record AIStreamEvent
{
    [JsonPropertyName("event")]
    public string? @Event { get; set; } = null;

    [JsonPropertyName("data")]
    public Dictionary<string, JsonElement>? Data { get; set; } = null;
}

public record AIConversationContinue
{
    [JsonPropertyName("conversationId")]
    public string? ConversationId { get; set; } = null;

    [JsonPropertyName("stage")]
    public string? Stage { get; set; } = null;

    [JsonPropertyName("requirements")]
    public AIConversationRequirements? Requirements { get; set; } = null;

    [JsonPropertyName("message")]
    public string? Message { get; set; } = null;
}

public record AIConversationRegenerate
{
    [JsonPropertyName("conversationId")]
    public string? ConversationId { get; set; } = null;

    [JsonPropertyName("article")]
    public AIConversationArticle? Article { get; set; } = null;

    [JsonPropertyName("seoScore")]
    public double SeoScore { get; set; }

    [JsonPropertyName("status")]
    public AIConversationRegenerateStatusEnum? Status { get; set; } = null;

    [JsonPropertyName("issues")]
    public string[]? Issues { get; set; } = null;

    [JsonPropertyName("attempts")]
    public double Attempts { get; set; }

    [JsonPropertyName("maxAttempts")]
    public double MaxAttempts { get; set; }
}

public record ArticleList
{
    [JsonPropertyName("articleListItem")]
    public ArticleListItem[]? ArticleListItem { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record AuthorList
{
    [JsonPropertyName("author")]
    public Author[]? Author { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record CategoryList
{
    [JsonPropertyName("category")]
    public Category[]? Category { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record SubCategoryList
{
    [JsonPropertyName("subCategory")]
    public SubCategory[]? SubCategory { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record TagList
{
    [JsonPropertyName("tag")]
    public Tag[]? Tag { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record LanguageList
{
    [JsonPropertyName("language")]
    public Language[]? Language { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record FormList
{
    [JsonPropertyName("formListItem")]
    public FormListItem[]? FormListItem { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record FormSubmissionList
{
    [JsonPropertyName("formSubmission")]
    public FormSubmission[]? FormSubmission { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record ArticleWrapper
{
    [JsonPropertyName("article")]
    public Article Article { get; set; } = null!;
}

public record AuthorWrapper
{
    [JsonPropertyName("author")]
    public Author Author { get; set; } = null!;
}

public record CategoryWrapper
{
    [JsonPropertyName("category")]
    public Category Category { get; set; } = null!;
}

public record SubCategoryWrapper
{
    [JsonPropertyName("subCategory")]
    public SubCategory SubCategory { get; set; } = null!;
}

public record TagWrapper
{
    [JsonPropertyName("tag")]
    public Tag Tag { get; set; } = null!;
}

public record LanguageWrapper
{
    [JsonPropertyName("language")]
    public Language Language { get; set; } = null!;
}

public record FormWrapper
{
    [JsonPropertyName("form")]
    public Form Form { get; set; } = null!;
}

public record FormNullableWrapper
{
    [JsonPropertyName("form")]
    public Form? Form { get; set; }
}

public record NextFormWrapper
{
    [JsonPropertyName("nextForm")]
    public Form? NextForm { get; set; }
}

public record SubmissionWrapper
{
    [JsonPropertyName("submission")]
    public FormSubmissionEnriched Submission { get; set; } = null!;
}

public record SubmissionRawWrapper
{
    [JsonPropertyName("submission")]
    public FormSubmission Submission { get; set; } = null!;
}

public record CaptchaConfigWrapper
{
    [JsonPropertyName("config")]
    public CaptchaConfig? Config { get; set; }
}

public record FormSubmissionRelations
{
    [JsonPropertyName("submissionId")]
    public string? SubmissionId { get; set; } = null;

    [JsonPropertyName("relatedEntries")]
    public Dictionary<string, JsonElement>[]? RelatedEntries { get; set; } = null;

    [JsonPropertyName("reverseRelations")]
    public Dictionary<string, JsonElement>[]? ReverseRelations { get; set; } = null;
}

public record FormRelationsBackfill
{
    [JsonPropertyName("updatedCount")]
    public double UpdatedCount { get; set; }

    [JsonPropertyName("scopedFormId")]
    public string? ScopedFormId { get; set; } = null;
}

public record ReportRange
{
    [JsonPropertyName("from")]
    public System.DateTime? From { get; set; } = null;

    [JsonPropertyName("to")]
    public System.DateTime? To { get; set; } = null;
}

public record ReportCategoryRow
{
    [JsonPropertyName("categoryId")]
    public string? CategoryId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("name")]
    public string? Name { get; set; } = null;

    [JsonPropertyName("articleCount")]
    public double ArticleCount { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }
}

public record ReportAuthorRow
{
    [JsonPropertyName("authorId")]
    public string? AuthorId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("name")]
    public string? Name { get; set; } = null;

    [JsonPropertyName("articleCount")]
    public double ArticleCount { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }
}

public record ContentOverviewReport
{
    [JsonPropertyName("range")]
    public ReportRange? Range { get; set; } = null;

    [JsonPropertyName("totals")]
    public Dictionary<string, JsonElement>? Totals { get; set; } = null;

    [JsonPropertyName("bySource")]
    public ReportSourceRow[]? BySource { get; set; } = null;

    [JsonPropertyName("dailyTrend")]
    public ReportArticleDailyRow[]? DailyTrend { get; set; } = null;

    [JsonPropertyName("topCategories")]
    public ReportCategoryRow[]? TopCategories { get; set; } = null;

    [JsonPropertyName("topAuthors")]
    public ReportAuthorRow[]? TopAuthors { get; set; } = null;
}

public record ReportSourceRow
{
    [JsonPropertyName("source")]
    public string? Source { get; set; } = null;

    [JsonPropertyName("count")]
    public double Count { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }
}

public record ReportArticleDailyRow
{
    [JsonPropertyName("date")]
    public string? Date { get; set; } = null;

    [JsonPropertyName("createdArticles")]
    public double CreatedArticles { get; set; }

    [JsonPropertyName("publishedArticles")]
    public double PublishedArticles { get; set; }
}

public record ReportArticleRow
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("mainTitle")]
    public MultilingualStringOrNull? MainTitle { get; set; } = null;

    [JsonPropertyName("isPublished")]
    public bool IsPublished { get; set; }

    [JsonPropertyName("publishDate")]
    public System.DateTime? PublishDate { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("dislikes")]
    public double Dislikes { get; set; }

    [JsonPropertyName("shares")]
    public double Shares { get; set; }

    [JsonPropertyName("commentsCount")]
    public double CommentsCount { get; set; }

    [JsonPropertyName("engagementScore")]
    public double EngagementScore { get; set; }

    [JsonPropertyName("engagementRate")]
    public double EngagementRate { get; set; }

    [JsonPropertyName("contentSource")]
    public string? ContentSource { get; set; } = null;

    [JsonPropertyName("categoryIds")]
    public string[]? CategoryIds { get; set; } = null;

    [JsonPropertyName("author")]
    public ReportAuthorBrief? Author { get; set; } = null;
}

public record ReportAuthorBrief
{
    [JsonPropertyName("authorId")]
    public string? AuthorId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("name")]
    public MultilingualStringOrNull? Name { get; set; } = null;
}

public record TopArticlesReport
{
    [JsonPropertyName("metric")]
    public TopArticlesReportMetricEnum? Metric { get; set; } = null;

    [JsonPropertyName("limit")]
    public double Limit { get; set; }

    [JsonPropertyName("items")]
    public ReportArticleRow[]? Items { get; set; } = null;
}

public record AiUsageBreakdownReport
{
    [JsonPropertyName("totals")]
    public Dictionary<string, JsonElement>? Totals { get; set; } = null;

    [JsonPropertyName("byOperation")]
    public ReportAiOperationRow[]? ByOperation { get; set; } = null;

    [JsonPropertyName("dailyTrend")]
    public ReportAiDailyRow[]? DailyTrend { get; set; } = null;

    [JsonPropertyName("recentErrors")]
    public ReportAiErrorRow[]? RecentErrors { get; set; } = null;
}

public record ReportAiOperationRow
{
    [JsonPropertyName("operationType")]
    public string? OperationType { get; set; } = null;

    [JsonPropertyName("requests")]
    public double Requests { get; set; }

    [JsonPropertyName("success")]
    public double Success { get; set; }

    [JsonPropertyName("error")]
    public double Error { get; set; }

    [JsonPropertyName("tokensTotal")]
    public double TokensTotal { get; set; }
}

public record ReportAiDailyRow
{
    [JsonPropertyName("date")]
    public string? Date { get; set; } = null;

    [JsonPropertyName("requests")]
    public double Requests { get; set; }

    [JsonPropertyName("success")]
    public double Success { get; set; }

    [JsonPropertyName("error")]
    public double Error { get; set; }

    [JsonPropertyName("tokensTotal")]
    public double TokensTotal { get; set; }
}

public record ReportAiErrorRow
{
    [JsonPropertyName("operationType")]
    public string? OperationType { get; set; } = null;

    [JsonPropertyName("errorMessage")]
    public string? ErrorMessage { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }
}

public record FormsOverviewReport
{
    [JsonPropertyName("totals")]
    public Dictionary<string, JsonElement>? Totals { get; set; } = null;

    [JsonPropertyName("byStatus")]
    public ReportStatusRow[]? ByStatus { get; set; } = null;

    [JsonPropertyName("byLanguage")]
    public ReportLanguageRow[]? ByLanguage { get; set; } = null;

    [JsonPropertyName("dailyTrend")]
    public ReportSubmissionDailyRow[]? DailyTrend { get; set; } = null;
}

public record ReportStatusRow
{
    [JsonPropertyName("status")]
    public double Status { get; set; }

    [JsonPropertyName("statusLabel")]
    public string? StatusLabel { get; set; } = null;

    [JsonPropertyName("count")]
    public double Count { get; set; }
}

public record ReportLanguageRow
{
    [JsonPropertyName("language")]
    public string? Language { get; set; } = null;

    [JsonPropertyName("count")]
    public double Count { get; set; }
}

public record ReportSubmissionDailyRow
{
    [JsonPropertyName("date")]
    public string? Date { get; set; } = null;

    [JsonPropertyName("submissions")]
    public double Submissions { get; set; }
}

public record SubmissionsOverviewReport
{
    [JsonPropertyName("totals")]
    public Dictionary<string, JsonElement>? Totals { get; set; } = null;

    [JsonPropertyName("byStatus")]
    public ReportStatusRow[]? ByStatus { get; set; } = null;

    [JsonPropertyName("byLanguage")]
    public ReportLanguageRow[]? ByLanguage { get; set; } = null;

    [JsonPropertyName("dailyTrend")]
    public ReportSubmissionDailyRow[]? DailyTrend { get; set; } = null;

    [JsonPropertyName("topForms")]
    public ReportTopFormRow[]? TopForms { get; set; } = null;
}

public record ReportTopFormRow
{
    [JsonPropertyName("formId")]
    public string? FormId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("title")]
    public MultilingualString? Title { get; set; } = null;

    [JsonPropertyName("submissions")]
    public double Submissions { get; set; }

    [JsonPropertyName("lastSubmissionAt")]
    public System.DateTime? LastSubmissionAt { get; set; } = null;
}

public record ReportSeries
{
    [JsonPropertyName("name")]
    public string? Name { get; set; } = null;

    [JsonPropertyName("data")]
    public double[]? Data { get; set; } = null;
}

public record ReportGroupBy
{
    [JsonExtensionData]
    public Dictionary<string, JsonElement>? Extra { get; set; }
}

public record ContentTrendReport
{
    [JsonPropertyName("groupBy")]
    public ReportGroupBy? GroupBy { get; set; } = null;

    [JsonPropertyName("labels")]
    public string[]? Labels { get; set; } = null;

    [JsonPropertyName("series")]
    public ReportSeries[]? Series { get; set; } = null;

    [JsonPropertyName("points")]
    public ReportContentTrendPoint[]? Points { get; set; } = null;
}

public record ReportContentTrendPoint
{
    [JsonPropertyName("label")]
    public string? Label { get; set; } = null;

    [JsonPropertyName("createdArticles")]
    public double CreatedArticles { get; set; }

    [JsonPropertyName("publishedArticles")]
    public double PublishedArticles { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("shares")]
    public double Shares { get; set; }

    [JsonPropertyName("comments")]
    public double Comments { get; set; }
}

public record SubmissionFunnelReport
{
    [JsonPropertyName("labels")]
    public string[]? Labels { get; set; } = null;

    [JsonPropertyName("series")]
    public ReportSeries[]? Series { get; set; } = null;

    [JsonPropertyName("stages")]
    public ReportFunnelStage[]? Stages { get; set; } = null;

    [JsonPropertyName("total")]
    public double Total { get; set; }
}

public record ReportFunnelStage
{
    [JsonPropertyName("status")]
    public double Status { get; set; }

    [JsonPropertyName("label")]
    public string? Label { get; set; } = null;

    [JsonPropertyName("count")]
    public double Count { get; set; }

    [JsonPropertyName("rate")]
    public double Rate { get; set; }
}

public record EngagementTrendReport
{
    [JsonPropertyName("groupBy")]
    public ReportGroupBy? GroupBy { get; set; } = null;

    [JsonPropertyName("labels")]
    public string[]? Labels { get; set; } = null;

    [JsonPropertyName("series")]
    public ReportSeries[]? Series { get; set; } = null;

    [JsonPropertyName("points")]
    public ReportEngagementPoint[]? Points { get; set; } = null;
}

public record ReportEngagementPoint
{
    [JsonPropertyName("label")]
    public string? Label { get; set; } = null;

    [JsonPropertyName("views")]
    public double Views { get; set; }

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("shares")]
    public double Shares { get; set; }

    [JsonPropertyName("comments")]
    public double Comments { get; set; }

    [JsonPropertyName("engagementScore")]
    public double EngagementScore { get; set; }

    [JsonPropertyName("engagementRate")]
    public double EngagementRate { get; set; }
}

public record PublishingPerformanceReport
{
    [JsonPropertyName("range")]
    public ReportRange? Range { get; set; } = null;

    [JsonPropertyName("totals")]
    public Dictionary<string, JsonElement>? Totals { get; set; } = null;

    [JsonPropertyName("publishLagBuckets")]
    public ReportLagBucket[]? PublishLagBuckets { get; set; } = null;

    [JsonPropertyName("publishWeekday")]
    public ReportWeekdayRow[]? PublishWeekday { get; set; } = null;

    [JsonPropertyName("recentDrafts")]
    public ReportDraftRow[]? RecentDrafts { get; set; } = null;
}

public record ReportLagBucket
{
    [JsonPropertyName("bucket")]
    public ReportLagBucketBucketEnum? Bucket { get; set; } = null;

    [JsonPropertyName("count")]
    public double Count { get; set; }
}

public record ReportWeekdayRow
{
    [JsonPropertyName("dayOfWeek")]
    public double DayOfWeek { get; set; }

    [JsonPropertyName("label")]
    public string? Label { get; set; } = null;

    [JsonPropertyName("count")]
    public double Count { get; set; }
}

public record ReportDraftRow
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("mainTitle")]
    public MultilingualStringOrNull? MainTitle { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }

    [JsonPropertyName("ageDays")]
    public double AgeDays { get; set; }

    [JsonPropertyName("authorId")]
    public string? AuthorId { get; set; } = null;
}

public record ContentHealthReport
{
    [JsonPropertyName("range")]
    public ReportRange? Range { get; set; } = null;

    [JsonPropertyName("totals")]
    public Dictionary<string, JsonElement>? Totals { get; set; } = null;

    [JsonPropertyName("qualityBuckets")]
    public ReportQualityBucket[]? QualityBuckets { get; set; } = null;

    [JsonPropertyName("weakestArticles")]
    public ReportWeakArticleRow[]? WeakestArticles { get; set; } = null;
}

public record ReportQualityBucket
{
    [JsonPropertyName("score")]
    public string? Score { get; set; } = null;

    [JsonPropertyName("label")]
    public ReportQualityBucketLabelEnum? Label { get; set; } = null;

    [JsonPropertyName("count")]
    public double Count { get; set; }
}

public record ReportWeakArticleRow
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("mainTitle")]
    public MultilingualStringOrNull? MainTitle { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("isPublished")]
    public bool IsPublished { get; set; }

    [JsonPropertyName("qualityScore")]
    public double QualityScore { get; set; }

    [JsonPropertyName("engagementScore")]
    public double EngagementScore { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }

    [JsonPropertyName("comments")]
    public double Comments { get; set; }
}

public record CategoryPerformanceReport
{
    [JsonPropertyName("range")]
    public ReportRange? Range { get; set; } = null;

    [JsonPropertyName("totals")]
    public Dictionary<string, JsonElement>? Totals { get; set; } = null;

    [JsonPropertyName("items")]
    public ReportCategoryPerformanceRow[]? Items { get; set; } = null;
}

public record ReportCategoryPerformanceRow
{
    [JsonPropertyName("categoryId")]
    public string? CategoryId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("name")]
    public MultilingualStringOrNull? Name { get; set; } = null;

    [JsonPropertyName("articleCount")]
    public double ArticleCount { get; set; }

    [JsonPropertyName("publishedArticles")]
    public double PublishedArticles { get; set; }

    [JsonPropertyName("totalViews")]
    public double TotalViews { get; set; }

    [JsonPropertyName("totalLikes")]
    public double TotalLikes { get; set; }

    [JsonPropertyName("totalShares")]
    public double TotalShares { get; set; }

    [JsonPropertyName("totalComments")]
    public double TotalComments { get; set; }

    [JsonPropertyName("engagementScore")]
    public double EngagementScore { get; set; }

    [JsonPropertyName("avgViewsPerArticle")]
    public double AvgViewsPerArticle { get; set; }

    [JsonPropertyName("latestArticleAt")]
    public System.DateTime? LatestArticleAt { get; set; } = null;

    [JsonPropertyName("shareOfContent")]
    public double ShareOfContent { get; set; }
}

public record PeriodComparisonReport
{
    [JsonPropertyName("currentRange")]
    public ReportRange? CurrentRange { get; set; } = null;

    [JsonPropertyName("previousRange")]
    public ReportRange? PreviousRange { get; set; } = null;

    [JsonPropertyName("metrics")]
    public ReportMetricDelta[]? Metrics { get; set; } = null;
}

public record ReportMetricDelta
{
    [JsonPropertyName("label")]
    public ReportMetricDeltaLabelEnum? Label { get; set; } = null;

    [JsonPropertyName("current")]
    public double Current { get; set; }

    [JsonPropertyName("previous")]
    public double Previous { get; set; }

    [JsonPropertyName("delta")]
    public double Delta { get; set; }

    [JsonPropertyName("deltaPercent")]
    public double? DeltaPercent { get; set; } = null;
}

public record AiContentImpactReport
{
    [JsonPropertyName("range")]
    public ReportRange? Range { get; set; } = null;

    [JsonPropertyName("bySource")]
    public ReportAiSourceImpactRow[]? BySource { get; set; } = null;

    [JsonPropertyName("topAiContent")]
    public ReportAiContentRow[]? TopAiContent { get; set; } = null;
}

public record ReportAiSourceImpactRow
{
    [JsonPropertyName("source")]
    public string? Source { get; set; } = null;

    [JsonPropertyName("articles")]
    public double Articles { get; set; }

    [JsonPropertyName("publishedArticles")]
    public double PublishedArticles { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("shares")]
    public double Shares { get; set; }

    [JsonPropertyName("comments")]
    public double Comments { get; set; }

    [JsonPropertyName("engagementScore")]
    public double EngagementScore { get; set; }

    [JsonPropertyName("publishRate")]
    public double PublishRate { get; set; }

    [JsonPropertyName("avgViewsPerArticle")]
    public double AvgViewsPerArticle { get; set; }
}

public record ReportAiContentRow
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("mainTitle")]
    public MultilingualStringOrNull? MainTitle { get; set; } = null;

    [JsonPropertyName("contentSource")]
    public string? ContentSource { get; set; } = null;

    [JsonPropertyName("isPublished")]
    public bool IsPublished { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("shares")]
    public double Shares { get; set; }

    [JsonPropertyName("commentsCount")]
    public double CommentsCount { get; set; }

    [JsonPropertyName("engagementScore")]
    public double EngagementScore { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }
}

public record CommentOverviewReport
{
    [JsonPropertyName("range")]
    public ReportRange? Range { get; set; } = null;

    [JsonPropertyName("totals")]
    public Dictionary<string, JsonElement>? Totals { get; set; } = null;

    [JsonPropertyName("byStatus")]
    public ReportCommentStatusRow[]? ByStatus { get; set; } = null;

    [JsonPropertyName("byActorType")]
    public ReportActorTypeRow[]? ByActorType { get; set; } = null;

    [JsonPropertyName("dailyTrend")]
    public ReportCommentDailyRow[]? DailyTrend { get; set; } = null;

    [JsonPropertyName("topDiscussedArticles")]
    public ReportDiscussedArticleRow[]? TopDiscussedArticles { get; set; } = null;
}

public record ReportCommentStatusRow
{
    [JsonPropertyName("status")]
    public double Status { get; set; }

    [JsonPropertyName("count")]
    public double Count { get; set; }
}

public record ReportActorTypeRow
{
    [JsonPropertyName("actorType")]
    public string? ActorType { get; set; } = null;

    [JsonPropertyName("count")]
    public double Count { get; set; }
}

public record ReportCommentDailyRow
{
    [JsonPropertyName("date")]
    public string? Date { get; set; } = null;

    [JsonPropertyName("comments")]
    public double Comments { get; set; }
}

public record ReportDiscussedArticleRow
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("mainTitle")]
    public MultilingualStringOrNull? MainTitle { get; set; } = null;

    [JsonPropertyName("comments")]
    public double Comments { get; set; }

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("dislikes")]
    public double Dislikes { get; set; }

    [JsonPropertyName("lastCommentAt")]
    public System.DateTime? LastCommentAt { get; set; } = null;
}

public record Comment
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("actorType")]
    public CommentActorTypeEnum? ActorType { get; set; } = null;

    [JsonPropertyName("userId")]
    public string? UserId { get; set; } = null;

    [JsonPropertyName("parentId")]
    public string? ParentId { get; set; } = null;

    [JsonPropertyName("content")]
    public string Content { get; set; } = null!;

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("dislikes")]
    public double Dislikes { get; set; }

    [JsonPropertyName("status")]
    public CommentStatusEnum Status { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record CommentWrapper
{
    [JsonPropertyName("comment")]
    public Comment Comment { get; set; } = null!;
}

public record CommentListWrapper
{
    [JsonPropertyName("comments")]
    public Comment[]? Comments { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record ArticleReactionTotals
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("reaction")]
    public ArticleReactionTotalsReactionEnum? Reaction { get; set; } = null;

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("dislikes")]
    public double Dislikes { get; set; }
}

public record ArticleReactionSummary
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("dislikes")]
    public double Dislikes { get; set; }

    [JsonPropertyName("userReaction")]
    public ArticleReactionSummaryUserReactionEnum? UserReaction { get; set; } = null;
}

public record CommentReactionTotals
{
    [JsonPropertyName("commentId")]
    public string? CommentId { get; set; } = null;

    [JsonPropertyName("reaction")]
    public CommentReactionTotalsReactionEnum? Reaction { get; set; } = null;

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("dislikes")]
    public double Dislikes { get; set; }
}

public record CommentReactionSummary
{
    [JsonPropertyName("commentId")]
    public string? CommentId { get; set; } = null;

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("dislikes")]
    public double Dislikes { get; set; }

    [JsonPropertyName("userReaction")]
    public CommentReactionSummaryUserReactionEnum? UserReaction { get; set; } = null;
}

public record EngagementSettings
{
    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("commentsEnabled")]
    public bool CommentsEnabled { get; set; }

    [JsonPropertyName("reactionsEnabled")]
    public bool ReactionsEnabled { get; set; }

    [JsonPropertyName("allowGuestComments")]
    public bool AllowGuestComments { get; set; }

    [JsonPropertyName("allowGuestReactions")]
    public bool AllowGuestReactions { get; set; }

    [JsonPropertyName("autoApproveComments")]
    public bool AutoApproveComments { get; set; }

    [JsonPropertyName("requireCaptchaForGuestEngagement")]
    public bool RequireCaptchaForGuestEngagement { get; set; }

    [JsonPropertyName("guestEngagementCaptchaMinScore")]
    public double GuestEngagementCaptchaMinScore { get; set; }

    [JsonPropertyName("guestEngagementRateLimitPerMin")]
    public double GuestEngagementRateLimitPerMin { get; set; }

    [JsonPropertyName("updatedBy")]
    public string? UpdatedBy { get; set; } = null;

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record CategoryDeleteResult
{
    [JsonPropertyName("category")]
    public Category Category { get; set; } = null!;

    [JsonPropertyName("subCategoriesAffected")]
    public double SubCategoriesAffected { get; set; }
}

public record TagSearchResult
{
    [JsonPropertyName("tags")]
    public Tag[]? Tags { get; set; } = null;
}

public record SeoAnalysis
{
    [JsonPropertyName("score")]
    public double Score { get; set; }

    [JsonPropertyName("potentialScore")]
    public double PotentialScore { get; set; }

    [JsonPropertyName("scores")]
    public Dictionary<string, JsonElement>? Scores { get; set; } = null;

    [JsonPropertyName("stats")]
    public Dictionary<string, JsonElement>? Stats { get; set; } = null;

    [JsonPropertyName("topKeywords")]
    public Dictionary<string, JsonElement>[]? TopKeywords { get; set; } = null;

    [JsonPropertyName("allKeywords")]
    public Dictionary<string, JsonElement>[]? AllKeywords { get; set; } = null;

    [JsonPropertyName("issues")]
    public Dictionary<string, JsonElement>? Issues { get; set; } = null;

    [JsonPropertyName("checks")]
    public Dictionary<string, JsonElement>? Checks { get; set; } = null;
}

public record SeoAnalysisResult
{
    [JsonPropertyName("articleId")]
    public string ArticleId { get; set; } = null!;

    [JsonPropertyName("slug")]
    public string Slug { get; set; } = null!;

    [JsonPropertyName("language")]
    public string? Language { get; set; } = null;

    [JsonPropertyName("seo")]
    public object Seo { get; set; } = null!;
}

public record TenantUsageStats
{
    [JsonPropertyName("admins")]
    public double Admins { get; set; }

    [JsonPropertyName("apiKeys")]
    public double ApiKeys { get; set; }

    [JsonPropertyName("categories")]
    public double Categories { get; set; }

    [JsonPropertyName("subCategories")]
    public double SubCategories { get; set; }

    [JsonPropertyName("articles")]
    public double Articles { get; set; }

    [JsonPropertyName("forms")]
    public double Forms { get; set; }

    [JsonPropertyName("submissions")]
    public double Submissions { get; set; }

    [JsonPropertyName("languages")]
    public double Languages { get; set; }

    [JsonPropertyName("ai_tokens")]
    public double AiTokens { get; set; }

    [JsonPropertyName("s3")]
    public double S3 { get; set; }

    [JsonPropertyName("limits")]
    public Dictionary<string, double>? Limits { get; set; } = null;
}

public record UserStats
{
    [JsonPropertyName("userId")]
    public string? UserId { get; set; } = null;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("articles")]
    public double Articles { get; set; }

    [JsonPropertyName("categories")]
    public double Categories { get; set; }

    [JsonPropertyName("subCategories")]
    public double SubCategories { get; set; }

    [JsonPropertyName("forms")]
    public double Forms { get; set; }

    [JsonPropertyName("languages")]
    public double Languages { get; set; }

    [JsonPropertyName("publishedArticles")]
    public double PublishedArticles { get; set; }

    [JsonPropertyName("lastArticleAt")]
    public System.DateTime? LastArticleAt { get; set; } = null;

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("dislikes")]
    public double Dislikes { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }

    [JsonPropertyName("shares")]
    public double Shares { get; set; }

    [JsonPropertyName("comments")]
    public double Comments { get; set; }

    [JsonPropertyName("engagementScore")]
    public double EngagementScore { get; set; }

    [JsonPropertyName("engagementRate")]
    public double EngagementRate { get; set; }
}

public record AuthorStats
{
    [JsonPropertyName("authorId")]
    public string? AuthorId { get; set; } = null;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("articles")]
    public double Articles { get; set; }

    [JsonPropertyName("publishedArticles")]
    public double PublishedArticles { get; set; }

    [JsonPropertyName("lastArticleAt")]
    public System.DateTime? LastArticleAt { get; set; } = null;

    [JsonPropertyName("likes")]
    public double Likes { get; set; }

    [JsonPropertyName("dislikes")]
    public double Dislikes { get; set; }

    [JsonPropertyName("views")]
    public double Views { get; set; }

    [JsonPropertyName("shares")]
    public double Shares { get; set; }

    [JsonPropertyName("comments")]
    public double Comments { get; set; }

    [JsonPropertyName("engagementScore")]
    public double EngagementScore { get; set; }

    [JsonPropertyName("engagementRate")]
    public double EngagementRate { get; set; }
}

public record UsersStatsPage
{
    [JsonPropertyName("items")]
    public UserStats[]? Items { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record AuthorsStatsPage
{
    [JsonPropertyName("items")]
    public AuthorStats[]? Items { get; set; } = null;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record DashboardSlot
{
    [JsonPropertyName("id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("type")]
    public DashboardSlotTypeEnum? Type { get; set; } = null;

    [JsonPropertyName("enabled")]
    public bool Enabled { get; set; }

    [JsonPropertyName("span")]
    public DashboardSlotSpanEnum? Span { get; set; } = null;

    [JsonPropertyName("settings")]
    public Dictionary<string, JsonElement>? Settings { get; set; } = null;
}

public record DashboardConfig
{
    [JsonPropertyName("version")]
    public double Version { get; set; }

    [JsonPropertyName("templateId")]
    public string? TemplateId { get; set; } = null;

    [JsonPropertyName("slots")]
    public DashboardSlot[]? Slots { get; set; } = null;
}

public record DashboardConfigWrapper
{
    [JsonPropertyName("dashboardConfig")]
    public DashboardConfig DashboardConfig { get; set; } = null!;
}

public record AiSummaryResult
{
    [JsonPropertyName("summary")]
    public string? Summary { get; set; } = null;

    [JsonPropertyName("tokens")]
    public Tokens? Tokens { get; set; } = null;
}

public record AiTitleResult
{
    [JsonPropertyName("title")]
    public string? Title { get; set; } = null;

    [JsonPropertyName("tokens")]
    public Tokens? Tokens { get; set; } = null;
}

public record AiTranslateResult
{
    [JsonPropertyName("content")]
    public string? Content { get; set; } = null;

    [JsonPropertyName("tokens")]
    public Tokens? Tokens { get; set; } = null;
}

public record AiSeoResult
{
    [JsonPropertyName("contentHtml")]
    public string? ContentHtml { get; set; } = null;

    [JsonPropertyName("metaDescription")]
    public string? MetaDescription { get; set; } = null;

    [JsonPropertyName("aiSeoScore")]
    public double AiSeoScore { get; set; }

    [JsonPropertyName("suggestedKeywords")]
    public string[]? SuggestedKeywords { get; set; } = null;

    [JsonPropertyName("tokens")]
    public Tokens? Tokens { get; set; } = null;
}

public record AiContentResult
{
    [JsonPropertyName("title")]
    public string? Title { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;

    [JsonPropertyName("summary")]
    public string? Summary { get; set; } = null;

    [JsonPropertyName("body")]
    public string? Body { get; set; } = null;

    [JsonPropertyName("aiGenerationId")]
    public string? AiGenerationId { get; set; } = null;

    [JsonPropertyName("tokens")]
    public Tokens? Tokens { get; set; } = null;
}

public record AiImageResult
{
    [JsonPropertyName("imageUrl")]
    public string? ImageUrl { get; set; } = null;

    [JsonPropertyName("imageBase64")]
    public string? ImageBase64 { get; set; } = null;

    [JsonPropertyName("imageMimeType")]
    public string? ImageMimeType { get; set; } = null;

    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("tokens")]
    public TokensUsedOnly? Tokens { get; set; } = null;
}

public record AiArticlePatch
{
    [JsonPropertyName("title")]
    public string? Title { get; set; } = null;

    [JsonPropertyName("summary")]
    public string? Summary { get; set; } = null;

    [JsonPropertyName("contentHtml")]
    public string? ContentHtml { get; set; } = null;

    [JsonPropertyName("tags")]
    public string[]? Tags { get; set; } = null;
}

public record AiArticleSeoResult
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("patched")]
    public Dictionary<string, AiArticlePatch>? Patched { get; set; } = null;

    [JsonPropertyName("seo")]
    public Dictionary<string, SeoAnalysis>? Seo { get; set; } = null;

    [JsonPropertyName("saved")]
    public bool Saved { get; set; }
}

public record AiArticleTranslation
{
    [JsonPropertyName("mainTitle")]
    public string? MainTitle { get; set; } = null;

    [JsonPropertyName("title2")]
    public string? Title2 { get; set; } = null;

    [JsonPropertyName("title3")]
    public string? Title3 { get; set; } = null;

    [JsonPropertyName("summary")]
    public string? Summary { get; set; } = null;

    [JsonPropertyName("content")]
    public string? Content { get; set; } = null;

    [JsonPropertyName("tags")]
    public string[]? Tags { get; set; } = null;
}

public record AiArticleTranslateResult
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("sourceLanguage")]
    public string? SourceLanguage { get; set; } = null;

    [JsonPropertyName("targetLanguages")]
    public string[]? TargetLanguages { get; set; } = null;

    [JsonPropertyName("translations")]
    public Dictionary<string, AiArticleTranslation>? Translations { get; set; } = null;
}

public record AiFormFieldTranslation
{
    [JsonPropertyName("label")]
    public string? Label { get; set; } = null;

    [JsonPropertyName("placeholder")]
    public string? Placeholder { get; set; } = null;

    [JsonPropertyName("options")]
    public Dictionary<string, JsonElement>[]? Options { get; set; } = null;
}

public record AiFormSectionTranslation
{
    [JsonPropertyName("title")]
    public string? Title { get; set; } = null;

    [JsonPropertyName("description")]
    public string? Description { get; set; } = null;

    [JsonPropertyName("submitButtonText")]
    public string? SubmitButtonText { get; set; } = null;

    [JsonPropertyName("sectionTitles")]
    public string[]? SectionTitles { get; set; } = null;

    [JsonPropertyName("sectionDescriptions")]
    public string[]? SectionDescriptions { get; set; } = null;

    [JsonPropertyName("fieldLabels")]
    public string[]? FieldLabels { get; set; } = null;

    [JsonPropertyName("fieldPlaceholders")]
    public string[]? FieldPlaceholders { get; set; } = null;

    [JsonPropertyName("fields")]
    public AiFormFieldTranslation[]? Fields { get; set; } = null;
}

public record AiFormTranslateResult
{
    [JsonPropertyName("formId")]
    public string? FormId { get; set; } = null;

    [JsonPropertyName("sourceLanguage")]
    public string? SourceLanguage { get; set; } = null;

    [JsonPropertyName("targetLanguages")]
    public string[]? TargetLanguages { get; set; } = null;

    [JsonPropertyName("translations")]
    public Dictionary<string, AiFormSectionTranslation>? Translations { get; set; } = null;
}

public record SocialTemplateDefaults
{
    [JsonPropertyName("language")]
    public string? Language { get; set; } = null;

    [JsonPropertyName("tone")]
    public string? Tone { get; set; } = null;

    [JsonPropertyName("length")]
    public string? Length { get; set; } = null;
}

public record SocialPlatformTemplate
{
    [JsonPropertyName("tone")]
    public string? Tone { get; set; } = null;

    [JsonPropertyName("length")]
    public string? Length { get; set; } = null;

    [JsonPropertyName("ctaTemplate")]
    public string? CtaTemplate { get; set; } = null;

    [JsonPropertyName("hashtagStyle")]
    public string? HashtagStyle { get; set; } = null;

    [JsonPropertyName("maxHashtags")]
    public double MaxHashtags { get; set; }
}

public record SocialTemplate
{
    [JsonPropertyName("defaults")]
    public SocialTemplateDefaults? Defaults { get; set; } = null;

    [JsonPropertyName("platforms")]
    public Dictionary<string, JsonElement>? Platforms { get; set; } = null;
}

public record SocialConnection
{
    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("provider")]
    public SocialConnectionProviderEnum? Provider { get; set; } = null;

    [JsonPropertyName("isActive")]
    public bool IsActive { get; set; }

    [JsonPropertyName("config")]
    public Dictionary<string, string>? Config { get; set; } = null;

    [JsonPropertyName("updatedBy")]
    public string? UpdatedBy { get; set; } = null;

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record SocialConnectionList
{
    [JsonPropertyName("connections")]
    public SocialConnection[]? Connections { get; set; } = null;
}

public record SocialPublishResult
{
    [JsonPropertyName("provider")]
    public SocialPublishResultProviderEnum? Provider { get; set; } = null;

    [JsonPropertyName("postId")]
    public string? PostId { get; set; } = null;

    [JsonPropertyName("messageId")]
    public double? MessageId { get; set; } = null;

    [JsonPropertyName("tweetId")]
    public string? TweetId { get; set; } = null;

    [JsonPropertyName("chatId")]
    public string? ChatId { get; set; } = null;

    [JsonPropertyName("status")]
    public double Status { get; set; }
}

public record ConversationStart
{
    [JsonPropertyName("conversationId")]
    public string? ConversationId { get; set; } = null;

    [JsonPropertyName("stage")]
    public ConversationStartStageEnum? Stage { get; set; } = null;

    [JsonPropertyName("questions")]
    public string[]? Questions { get; set; } = null;

    [JsonPropertyName("expiresAt")]
    public System.DateTime ExpiresAt { get; set; }
}

public record ConversationGenerate
{
    [JsonPropertyName("conversationId")]
    public string ConversationId { get; set; } = null!;

    [JsonPropertyName("article")]
    public AIConversationArticle? Article { get; set; } = null;

    [JsonPropertyName("seoScore")]
    public double SeoScore { get; set; }

    [JsonPropertyName("issues")]
    public string[]? Issues { get; set; } = null;

    [JsonPropertyName("attempts")]
    public double Attempts { get; set; }

    [JsonPropertyName("maxAttempts")]
    public double MaxAttempts { get; set; }

    [JsonPropertyName("status")]
    public ConversationGenerateStatusEnum Status { get; set; }

    [JsonPropertyName("message")]
    public string? Message { get; set; } = null;
}

public record Envelope
{
    [JsonPropertyName("success")]
    public bool Success { get; set; }

    [JsonPropertyName("statusCode")]
    public double StatusCode { get; set; }

    [JsonPropertyName("message")]
    public string Message { get; set; } = null!;

    [JsonPropertyName("data")]
    public Dictionary<string, JsonElement>? Data { get; set; }
}

public record ErrorResponse
{
    [JsonExtensionData]
    public Dictionary<string, JsonElement>? Extra { get; set; }
}
