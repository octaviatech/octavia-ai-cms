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

public enum ArticleDerivedContentChannelEnum
{
    [EnumMember(Value = "newsletter")]
    Newsletter,
    [EnumMember(Value = "xThread")]
    XThread,
    [EnumMember(Value = "videoScript")]
    VideoScript,
    [EnumMember(Value = "faq")]
    Faq,
    [EnumMember(Value = "pressRelease")]
    PressRelease,
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

public enum NeedsAttentionItemSeverityEnum
{
    [EnumMember(Value = "high")]
    High,
    [EnumMember(Value = "medium")]
    Medium,
    [EnumMember(Value = "low")]
    Low,
}

public enum NeedsAttentionItemEntityTypeEnum
{
    [EnumMember(Value = "article")]
    Article,
    [EnumMember(Value = "comment")]
    Comment,
    [EnumMember(Value = "form")]
    Form,
    [EnumMember(Value = "submission")]
    Submission,
    [EnumMember(Value = "translation")]
    Translation,
}

public enum SubmissionAnalysisCategoryEnum
{
    [EnumMember(Value = "lead")]
    Lead,
    [EnumMember(Value = "support")]
    Support,
    [EnumMember(Value = "feedback")]
    Feedback,
    [EnumMember(Value = "spam")]
    Spam,
    [EnumMember(Value = "other")]
    Other,
}

public enum SubmissionAnalysisPriorityEnum
{
    [EnumMember(Value = "low")]
    Low,
    [EnumMember(Value = "normal")]
    Normal,
    [EnumMember(Value = "high")]
    High,
    [EnumMember(Value = "urgent")]
    Urgent,
}

public enum SubmissionAnalysisSentimentEnum
{
    [EnumMember(Value = "positive")]
    Positive,
    [EnumMember(Value = "neutral")]
    Neutral,
    [EnumMember(Value = "negative")]
    Negative,
    [EnumMember(Value = "mixed")]
    Mixed,
}

public enum SubmissionActivityTypeEnum
{
    [EnumMember(Value = "status")]
    Status,
    [EnumMember(Value = "assign")]
    Assign,
    [EnumMember(Value = "note")]
    Note,
    [EnumMember(Value = "reply")]
    Reply,
    [EnumMember(Value = "ai")]
    Ai,
    [EnumMember(Value = "tag")]
    Tag,
}

public enum SubmissionActivityActorTypeEnum
{
    [EnumMember(Value = "user")]
    User,
    [EnumMember(Value = "ai")]
    Ai,
    [EnumMember(Value = "system")]
    System,
}

public enum SubmissionReplyStatusEnum
{
    [EnumMember(Value = "draft")]
    Draft,
    [EnumMember(Value = "sent")]
    Sent,
    [EnumMember(Value = "failed")]
    Failed,
}

public enum SubmissionReplyDraftSourceEnum
{
    [EnumMember(Value = "ai")]
    Ai,
    [EnumMember(Value = "human")]
    Human,
}

public enum FormDraftFormTypeEnum
{
    [EnumMember(Value = "public")]
    @Public,
    [EnumMember(Value = "internal")]
    @Internal,
}

public enum CommentModerationSentimentEnum
{
    [EnumMember(Value = "positive")]
    Positive,
    [EnumMember(Value = "neutral")]
    Neutral,
    [EnumMember(Value = "negative")]
    Negative,
    [EnumMember(Value = "mixed")]
    Mixed,
}

public enum CommentModerationDecisionEnum
{
    [EnumMember(Value = "approve")]
    Approve,
    [EnumMember(Value = "hold")]
    Hold,
    [EnumMember(Value = "reject")]
    Reject,
}

public enum CommentModerationSummaryDecisionEnum
{
    [EnumMember(Value = "approve")]
    Approve,
    [EnumMember(Value = "hold")]
    Hold,
    [EnumMember(Value = "reject")]
    Reject,
}

public enum MinedQuestionIdeaFunnelStageEnum
{
    [EnumMember(Value = "awareness")]
    Awareness,
    [EnumMember(Value = "consideration")]
    Consideration,
    [EnumMember(Value = "conversion")]
    Conversion,
}

public enum EffectiveModerationPolicyModeEnum
{
    [EnumMember(Value = "always")]
    Always,
    [EnumMember(Value = "if_safe")]
    IfSafe,
    [EnumMember(Value = "never")]
    Never,
}

public enum AiAutoApplyPolicyCopilotEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiAutoApplyPolicyAutofillEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiAutoApplyPolicyInlineEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiAutoApplyPolicyBulkEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiAutoApplyPolicyFormsEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiAutoApplyPolicySubmissionsEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiAutoApplyPolicyCommentsEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiAutoApplyPolicyCalendarEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiAutoApplyPolicySeoEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiAutoApplyPolicyBrandVoiceEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiAutoApplyPolicyJobsEnum
{
    [EnumMember(Value = "never")]
    Never,
    [EnumMember(Value = "safe")]
    Safe,
    [EnumMember(Value = "always")]
    Always,
}

public enum AiRunInsufficientCreditsReasonEnum
{
    [EnumMember(Value = "AI_INSUFFICIENT_CREDITS")]
    AIINSUFFICIENTCREDITS,
}

public enum AiRunConflictStatusEnum
{
    [EnumMember(Value = "already_running")]
    AlreadyRunning,
}

public enum AiRunListItemStatusEnum
{
    [EnumMember(Value = "reserved")]
    Reserved,
    [EnumMember(Value = "settled")]
    Settled,
    [EnumMember(Value = "refunded")]
    Refunded,
    [EnumMember(Value = "void")]
    @Void,
}

public enum AiProposalStatusEnum
{
    [EnumMember(Value = "pending")]
    Pending,
    [EnumMember(Value = "accepted")]
    Accepted,
    [EnumMember(Value = "rejected")]
    Rejected,
    [EnumMember(Value = "reverted")]
    Reverted,
    [EnumMember(Value = "expired")]
    Expired,
}

public enum AiProposalStaleReasonEnum
{
    [EnumMember(Value = "AI_PROPOSAL_STALE")]
    AIPROPOSALSTALE,
    [EnumMember(Value = "AI_PROPOSAL_INVALID_STATE")]
    AIPROPOSALINVALIDSTATE,
}

public enum AiProposalBulkResultItemStatusEnum
{
    [EnumMember(Value = "accepted")]
    Accepted,
    [EnumMember(Value = "failed")]
    Failed,
}

public enum ArticleRevisionSourceEnum
{
    [EnumMember(Value = "manual")]
    Manual,
    [EnumMember(Value = "ai")]
    Ai,
    [EnumMember(Value = "restore")]
    Restore,
    [EnumMember(Value = "system")]
    System,
    [EnumMember(Value = "seed")]
    Seed,
}

public enum ReadinessItemStateEnum
{
    [EnumMember(Value = "ok")]
    Ok,
    [EnumMember(Value = "warning")]
    Warning,
    [EnumMember(Value = "missing")]
    Missing,
}

public enum ArticleReadinessItemTypeEnum
{
    [EnumMember(Value = "article")]
    Article,
}

public enum TranslationStateItemStateEnum
{
    [EnumMember(Value = "missing")]
    Missing,
    [EnumMember(Value = "done")]
    Done,
    [EnumMember(Value = "outdated")]
    Outdated,
}

public enum TranslationStateItemStoredStateEnum
{
    [EnumMember(Value = "missing")]
    Missing,
    [EnumMember(Value = "done")]
    Done,
    [EnumMember(Value = "outdated")]
    Outdated,
}

public enum KnowledgeSourceTypeEnum
{
    [EnumMember(Value = "url")]
    Url,
    [EnumMember(Value = "text")]
    Text,
    [EnumMember(Value = "file")]
    File,
}

public enum KnowledgeSourceStatusEnum
{
    [EnumMember(Value = "pending")]
    Pending,
    [EnumMember(Value = "indexed")]
    Indexed,
    [EnumMember(Value = "failed")]
    Failed,
}

public enum TaxonomyFindingCodeEnum
{
    [EnumMember(Value = "duplicate_category")]
    DuplicateCategory,
    [EnumMember(Value = "duplicate_subcategory")]
    DuplicateSubcategory,
    [EnumMember(Value = "near_duplicate_category")]
    NearDuplicateCategory,
    [EnumMember(Value = "empty_category")]
    EmptyCategory,
    [EnumMember(Value = "no_description")]
    NoDescription,
    [EnumMember(Value = "no_seo")]
    NoSeo,
    [EnumMember(Value = "unbalanced_category")]
    UnbalancedCategory,
    [EnumMember(Value = "orphan_subcategory")]
    OrphanSubcategory,
}

public enum TaxonomyFindingSeverityEnum
{
    [EnumMember(Value = "high")]
    High,
    [EnumMember(Value = "medium")]
    Medium,
    [EnumMember(Value = "low")]
    Low,
}

public enum TaxonomyFindingEntityTypeEnum
{
    [EnumMember(Value = "category")]
    Category,
    [EnumMember(Value = "subcategory")]
    Subcategory,
}

public enum CategorySeoSuggestionEntityTypeEnum
{
    [EnumMember(Value = "category")]
    Category,
    [EnumMember(Value = "subcategory")]
    Subcategory,
}

public enum MediaAssetKindEnum
{
    [EnumMember(Value = "image")]
    Image,
    [EnumMember(Value = "video")]
    Video,
    [EnumMember(Value = "audio")]
    Audio,
    [EnumMember(Value = "document")]
    Document,
    [EnumMember(Value = "other")]
    Other,
}

public enum MediaMetadataSuggestionKindEnum
{
    [EnumMember(Value = "image")]
    Image,
    [EnumMember(Value = "video")]
    Video,
    [EnumMember(Value = "audio")]
    Audio,
    [EnumMember(Value = "document")]
    Document,
    [EnumMember(Value = "other")]
    Other,
}

public enum ContentPlanLocaleStatusEnum
{
    [EnumMember(Value = "pending")]
    Pending,
    [EnumMember(Value = "in_progress")]
    InProgress,
    [EnumMember(Value = "done")]
    Done,
    [EnumMember(Value = "outdated")]
    Outdated,
}

public enum ContentPlanItemSourceEnum
{
    [EnumMember(Value = "manual")]
    Manual,
    [EnumMember(Value = "ai")]
    Ai,
    [EnumMember(Value = "content_gap")]
    ContentGap,
    [EnumMember(Value = "reader_comment")]
    ReaderComment,
    [EnumMember(Value = "form_submission")]
    FormSubmission,
}

public enum PlanWarningCodeEnum
{
    [EnumMember(Value = "cadence_exceeded")]
    CadenceExceeded,
    [EnumMember(Value = "cadence_under")]
    CadenceUnder,
    [EnumMember(Value = "keyword_collision")]
    KeywordCollision,
    [EnumMember(Value = "author_overload")]
    AuthorOverload,
    [EnumMember(Value = "publish_before_translation")]
    PublishBeforeTranslation,
    [EnumMember(Value = "past_due")]
    PastDue,
    [EnumMember(Value = "overdue_publish")]
    OverduePublish,
}

public enum PlanWarningSeverityEnum
{
    [EnumMember(Value = "high")]
    High,
    [EnumMember(Value = "medium")]
    Medium,
    [EnumMember(Value = "low")]
    Low,
}

public enum ContentCadenceScopeEnum
{
    [EnumMember(Value = "tenant")]
    Tenant,
    [EnumMember(Value = "category")]
    Category,
}

public enum ContentGapCodeEnum
{
    [EnumMember(Value = "thin_category")]
    ThinCategory,
    [EnumMember(Value = "missing_locale")]
    MissingLocale,
    [EnumMember(Value = "stale_content")]
    StaleContent,
    [EnumMember(Value = "idle_keyword")]
    IdleKeyword,
}

public enum ContentGapSeverityEnum
{
    [EnumMember(Value = "high")]
    High,
    [EnumMember(Value = "medium")]
    Medium,
    [EnumMember(Value = "low")]
    Low,
}

public enum CalendarIdeaIntentEnum
{
    [EnumMember(Value = "informational")]
    Informational,
    [EnumMember(Value = "navigational")]
    Navigational,
    [EnumMember(Value = "commercial")]
    Commercial,
    [EnumMember(Value = "transactional")]
    Transactional,
}

public enum CalendarIdeaFunnelStageEnum
{
    [EnumMember(Value = "awareness")]
    Awareness,
    [EnumMember(Value = "consideration")]
    Consideration,
    [EnumMember(Value = "conversion")]
    Conversion,
    [EnumMember(Value = "retention")]
    Retention,
}

public enum CalendarBestTimeBasisEnum
{
    [EnumMember(Value = "weekday_engagement")]
    WeekdayEngagement,
}

public enum CampaignStatusEnum
{
    [EnumMember(Value = "planned")]
    Planned,
    [EnumMember(Value = "active")]
    Active,
    [EnumMember(Value = "done")]
    Done,
}

public enum DigestActionCodeEnum
{
    [EnumMember(Value = "calendar.overdue")]
    CalendarOverdue,
    [EnumMember(Value = "ai.lowAcceptance")]
    AiLowAcceptance,
    [EnumMember(Value = "calendar.delivery")]
    CalendarDelivery,
    [EnumMember(Value = "seo.audit")]
    SeoAudit,
}

public enum DigestActionSeverityEnum
{
    [EnumMember(Value = "high")]
    High,
    [EnumMember(Value = "medium")]
    Medium,
    [EnumMember(Value = "low")]
    Low,
}

public enum SeoAuditIssueCodeEnum
{
    [EnumMember(Value = "missing_meta_title")]
    MissingMetaTitle,
    [EnumMember(Value = "missing_meta_description")]
    MissingMetaDescription,
    [EnumMember(Value = "duplicate_title")]
    DuplicateTitle,
    [EnumMember(Value = "thin_content")]
    ThinContent,
    [EnumMember(Value = "missing_alt_text")]
    MissingAltText,
    [EnumMember(Value = "broken_heading_order")]
    BrokenHeadingOrder,
    [EnumMember(Value = "orphan_page")]
    OrphanPage,
    [EnumMember(Value = "missing_keyword")]
    MissingKeyword,
    [EnumMember(Value = "no_traffic")]
    NoTraffic,
}

public enum SeoAuditIssueSeverityEnum
{
    [EnumMember(Value = "high")]
    High,
    [EnumMember(Value = "medium")]
    Medium,
    [EnumMember(Value = "low")]
    Low,
}

public enum RefreshCandidateSeverityEnum
{
    [EnumMember(Value = "high")]
    High,
    [EnumMember(Value = "medium")]
    Medium,
    [EnumMember(Value = "low")]
    Low,
}

public enum TranslationCoverageRowEntityTypeEnum
{
    [EnumMember(Value = "article")]
    Article,
    [EnumMember(Value = "category")]
    Category,
    [EnumMember(Value = "subcategory")]
    Subcategory,
    [EnumMember(Value = "form")]
    Form,
}

public enum ContentTypeProfileTypeEnum
{
    [EnumMember(Value = "blog")]
    Blog,
    [EnumMember(Value = "case_study")]
    CaseStudy,
    [EnumMember(Value = "landing")]
    Landing,
    [EnumMember(Value = "news")]
    News,
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

public record ArticleEngagementOverride
{
    [JsonPropertyName("commentsEnabled")]
    public bool CommentsEnabled { get; set; }

    [JsonPropertyName("reactionsEnabled")]
    public bool ReactionsEnabled { get; set; }

    [JsonPropertyName("autoApproveComments")]
    public bool AutoApproveComments { get; set; }
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

    [JsonPropertyName("contentBlocks")]
    public ArticleContentBlocks? ContentBlocks { get; set; } = null;

    [JsonPropertyName("derivedContent")]
    public ArticleDerivedContent[]? DerivedContent { get; set; } = null;

    [JsonPropertyName("engagement")]
    public ArticleEngagementOverride? Engagement { get; set; } = null;

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

    [JsonPropertyName("assignee")]
    public string? Assignee { get; set; } = null;

    [JsonPropertyName("tags")]
    public string[]? Tags { get; set; } = null;

    [JsonPropertyName("analysis")]
    public SubmissionAnalysis? Analysis { get; set; } = null;
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

public record NewsletterOutput
{
    [JsonPropertyName("subject")]
    public string Subject { get; set; } = null!;

    [JsonPropertyName("preheader")]
    public string? Preheader { get; set; } = null;

    [JsonPropertyName("body")]
    public string Body { get; set; } = null!;

    [JsonPropertyName("cta")]
    public string? Cta { get; set; } = null;
}

public record XThreadOutput
{
    [JsonPropertyName("posts")]
    public string[] Posts { get; set; } = null!;
}

public record VideoScene
{
    [JsonPropertyName("title")]
    public string Title { get; set; } = null!;

    [JsonPropertyName("durationSec")]
    public double DurationSec { get; set; }

    [JsonPropertyName("narration")]
    public string Narration { get; set; } = null!;

    [JsonPropertyName("bRoll")]
    public string? BRoll { get; set; } = null;
}

public record VideoScriptOutput
{
    [JsonPropertyName("hook")]
    public string? Hook { get; set; } = null;

    [JsonPropertyName("scenes")]
    public VideoScene[] Scenes { get; set; } = null!;

    [JsonPropertyName("outro")]
    public string? Outro { get; set; } = null;

    [JsonPropertyName("totalSec")]
    public double TotalSec { get; set; }
}

public record FaqChannelOutput
{
    [JsonPropertyName("items")]
    public Dictionary<string, JsonElement>[] Items { get; set; } = null!;
}

public record PressReleaseOutput
{
    [JsonPropertyName("headline")]
    public string? Headline { get; set; } = null;

    [JsonPropertyName("dateline")]
    public string? Dateline { get; set; } = null;

    [JsonPropertyName("lede")]
    public string? Lede { get; set; } = null;

    [JsonPropertyName("body")]
    public string[]? Body { get; set; } = null;

    [JsonPropertyName("boilerplate")]
    public string? Boilerplate { get; set; } = null;
}

public record ContentBlockFaqItem
{
    [JsonPropertyName("question")]
    public string Question { get; set; } = null!;

    [JsonPropertyName("answer")]
    public string Answer { get; set; } = null!;
}

public record ContentBlockTakeaway
{
    [JsonPropertyName("label")]
    public string? Label { get; set; } = null;

    [JsonPropertyName("text")]
    public string Text { get; set; } = null!;
}

public record ArticleContentBlocks
{
    [JsonPropertyName("faq")]
    public Dictionary<string, ContentBlockFaqItem[]>? Faq { get; set; } = null;

    [JsonPropertyName("tldr")]
    public Dictionary<string, string>? Tldr { get; set; } = null;

    [JsonPropertyName("keyTakeaways")]
    public Dictionary<string, ContentBlockTakeaway[]>? KeyTakeaways { get; set; } = null;
}

public record ArticleDerivedContent
{
    [JsonPropertyName("channel")]
    public ArticleDerivedContentChannelEnum Channel { get; set; }

    [JsonPropertyName("language")]
    public string? Language { get; set; } = null;

    [JsonPropertyName("title")]
    public string? Title { get; set; } = null;

    [JsonPropertyName("payload")]
    public string Payload { get; set; } = null!;

    [JsonPropertyName("aiGenerationId")]
    public string? AiGenerationId { get; set; } = null;

    [JsonPropertyName("scheduledItemId")]
    public string? ScheduledItemId { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record RepurposeChannels
{
    [JsonPropertyName("newsletter")]
    public NewsletterOutput? Newsletter { get; set; } = null;

    [JsonPropertyName("xThread")]
    public XThreadOutput? XThread { get; set; } = null;

    [JsonPropertyName("videoScript")]
    public VideoScriptOutput? VideoScript { get; set; } = null;

    [JsonPropertyName("faq")]
    public FaqChannelOutput? Faq { get; set; } = null;

    [JsonPropertyName("pressRelease")]
    public PressReleaseOutput? PressRelease { get; set; } = null;
}

public record ChannelNote
{
    [JsonPropertyName("channel")]
    public string Channel { get; set; } = null!;

    [JsonPropertyName("notes")]
    public string[] Notes { get; set; } = null!;
}

public record RepurposeResult
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("platforms")]
    public Dictionary<string, RepurposedOutput>? Platforms { get; set; } = null;

    [JsonPropertyName("channels")]
    public RepurposeChannels? Channels { get; set; } = null;

    [JsonPropertyName("channelNotes")]
    public ChannelNote[]? ChannelNotes { get; set; } = null;

    [JsonPropertyName("derivedContentIds")]
    public string[]? DerivedContentIds { get; set; } = null;

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

    [JsonPropertyName("blocksTotal")]
    public double BlocksTotal { get; set; }

    [JsonPropertyName("blocksTranslated")]
    public double BlocksTranslated { get; set; }

    [JsonPropertyName("blockHashes")]
    public Dictionary<string, string>? BlockHashes { get; set; } = null;
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

public record NeedsAttentionItem
{
    [JsonPropertyName("code")]
    public string Code { get; set; } = null!;

    [JsonPropertyName("severity")]
    public NeedsAttentionItemSeverityEnum Severity { get; set; }

    [JsonPropertyName("entityType")]
    public NeedsAttentionItemEntityTypeEnum EntityType { get; set; }

    [JsonPropertyName("entityId")]
    public string? EntityId { get; set; } = null;

    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("message")]
    public string Message { get; set; } = null!;

    [JsonPropertyName("count")]
    public double? Count { get; set; } = null;

    [JsonPropertyName("locale")]
    public string? Locale { get; set; } = null;

    [JsonPropertyName("fixAction")]
    public string? FixAction { get; set; } = null;
}

public record NeedsAttentionReport
{
    [JsonPropertyName("generatedAt")]
    public System.DateTime GeneratedAt { get; set; }

    [JsonPropertyName("items")]
    public NeedsAttentionItem[] Items { get; set; } = null!;
}

public record SubmissionAnalysis
{
    [JsonPropertyName("_id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("submissionId")]
    public string? SubmissionId { get; set; } = null;

    [JsonPropertyName("formId")]
    public string? FormId { get; set; } = null;

    [JsonPropertyName("summary")]
    public string? Summary { get; set; } = null;

    [JsonPropertyName("category")]
    public SubmissionAnalysisCategoryEnum? Category { get; set; } = null;

    [JsonPropertyName("priority")]
    public SubmissionAnalysisPriorityEnum? Priority { get; set; } = null;

    [JsonPropertyName("sentiment")]
    public SubmissionAnalysisSentimentEnum? Sentiment { get; set; } = null;

    [JsonPropertyName("language")]
    public string? Language { get; set; } = null;

    [JsonPropertyName("spamScore")]
    public double SpamScore { get; set; }

    [JsonPropertyName("entities")]
    public Dictionary<string, JsonElement>? Entities { get; set; } = null;

    [JsonPropertyName("topics")]
    public string[]? Topics { get; set; } = null;

    [JsonPropertyName("provider")]
    public string? Provider { get; set; } = null;

    [JsonPropertyName("providerModel")]
    public string? ProviderModel { get; set; } = null;

    [JsonPropertyName("promptVersion")]
    public string? PromptVersion { get; set; } = null;

    [JsonPropertyName("source")]
    public string? Source { get; set; } = null;

    [JsonPropertyName("analyzedAt")]
    public System.DateTime AnalyzedAt { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record SubmissionActivity
{
    [JsonPropertyName("_id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("type")]
    public SubmissionActivityTypeEnum? Type { get; set; } = null;

    [JsonPropertyName("actorId")]
    public string? ActorId { get; set; } = null;

    [JsonPropertyName("actorType")]
    public SubmissionActivityActorTypeEnum? ActorType { get; set; } = null;

    [JsonPropertyName("payload")]
    public Dictionary<string, JsonElement>? Payload { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }
}

public record SubmissionReply
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("submissionId")]
    public string SubmissionId { get; set; } = null!;

    [JsonPropertyName("channel")]
    public string? Channel { get; set; } = null;

    [JsonPropertyName("locale")]
    public string? Locale { get; set; } = null;

    [JsonPropertyName("subject")]
    public string Subject { get; set; } = null!;

    [JsonPropertyName("body")]
    public string Body { get; set; } = null!;

    [JsonPropertyName("status")]
    public SubmissionReplyStatusEnum Status { get; set; }

    [JsonPropertyName("to")]
    public string? To { get; set; } = null;

    [JsonPropertyName("templateKey")]
    public string? TemplateKey { get; set; } = null;

    [JsonPropertyName("draftSource")]
    public SubmissionReplyDraftSourceEnum? DraftSource { get; set; } = null;

    [JsonPropertyName("sentAt")]
    public System.DateTime? SentAt { get; set; } = null;

    [JsonPropertyName("error")]
    public string? Error { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }
}

public record SubmissionAnalysisWrapper
{
    [JsonPropertyName("analysis")]
    public SubmissionAnalysis Analysis { get; set; } = null!;
}

public record SubmissionAnalysisResult
{
    [JsonPropertyName("analysis")]
    public SubmissionAnalysis Analysis { get; set; } = null!;

    [JsonPropertyName("spamApplied")]
    public bool SpamApplied { get; set; }
}

public record SubmissionBulkAnalysis
{
    [JsonPropertyName("results")]
    public Dictionary<string, JsonElement>[] Results { get; set; } = null!;

    [JsonPropertyName("summary")]
    public Dictionary<string, JsonElement> Summary { get; set; } = null!;
}

public record SubmissionActivityList
{
    [JsonPropertyName("activity")]
    public SubmissionActivity[] Activity { get; set; } = null!;

    [JsonPropertyName("replies")]
    public SubmissionReply[] Replies { get; set; } = null!;
}

public record SubmissionReplyWrapper
{
    [JsonPropertyName("reply")]
    public SubmissionReply Reply { get; set; } = null!;
}

public record SubmissionActivityWrapper
{
    [JsonPropertyName("activity")]
    public SubmissionActivity Activity { get; set; } = null!;
}

public record SubmissionInboxFacets
{
    [JsonPropertyName("status")]
    public Dictionary<string, double>? Status { get; set; } = null;

    [JsonPropertyName("category")]
    public Dictionary<string, double>? Category { get; set; } = null;

    [JsonPropertyName("priority")]
    public Dictionary<string, double>? Priority { get; set; } = null;

    [JsonPropertyName("assignee")]
    public Dictionary<string, JsonElement>[]? Assignee { get; set; } = null;
}

public record SubmissionDetailWrapper
{
    [JsonPropertyName("submission")]
    public FormSubmissionEnriched Submission { get; set; } = null!;

    [JsonPropertyName("activity")]
    public SubmissionActivity[]? Activity { get; set; } = null;

    [JsonPropertyName("replies")]
    public SubmissionReply[]? Replies { get; set; } = null;
}

public record SubmissionDigestAggregates
{
    [JsonPropertyName("from")]
    public System.DateTime From { get; set; }

    [JsonPropertyName("to")]
    public System.DateTime To { get; set; }

    [JsonPropertyName("total")]
    public double Total { get; set; }

    [JsonPropertyName("previousTotal")]
    public double PreviousTotal { get; set; }

    [JsonPropertyName("byCategory")]
    public Dictionary<string, double>? ByCategory { get; set; } = null;

    [JsonPropertyName("byPriority")]
    public Dictionary<string, double>? ByPriority { get; set; } = null;

    [JsonPropertyName("byStatus")]
    public Dictionary<string, double>? ByStatus { get; set; } = null;

    [JsonPropertyName("byLanguage")]
    public Dictionary<string, double>? ByLanguage { get; set; } = null;

    [JsonPropertyName("byForm")]
    public Dictionary<string, JsonElement>[]? ByForm { get; set; } = null;

    [JsonPropertyName("urgentCount")]
    public double UrgentCount { get; set; }

    [JsonPropertyName("spamCount")]
    public double SpamCount { get; set; }

    [JsonPropertyName("topics")]
    public Dictionary<string, JsonElement>[]? Topics { get; set; } = null;
}

public record SubmissionDigest
{
    [JsonPropertyName("aggregates")]
    public SubmissionDigestAggregates Aggregates { get; set; } = null!;

    [JsonPropertyName("headline")]
    public string? Headline { get; set; } = null;

    [JsonPropertyName("summary")]
    public string? Summary { get; set; } = null;

    [JsonPropertyName("topics")]
    public Dictionary<string, JsonElement>[]? Topics { get; set; } = null;

    [JsonPropertyName("actions")]
    public Dictionary<string, JsonElement>[]? Actions { get; set; } = null;
}

public record SubmissionDigestWrapper
{
    [JsonPropertyName("digest")]
    public SubmissionDigest Digest { get; set; } = null!;
}

public record FormDraftField
{
    [JsonPropertyName("name")]
    public string Name { get; set; } = null!;

    [JsonPropertyName("type")]
    public string Type { get; set; } = null!;

    [JsonPropertyName("label")]
    public MultilingualString Label { get; set; } = null!;

    [JsonPropertyName("placeholder")]
    public MultilingualString? Placeholder { get; set; } = null;

    [JsonPropertyName("required")]
    public bool Required { get; set; }

    [JsonPropertyName("colSpan")]
    public double ColSpan { get; set; }

    [JsonPropertyName("options")]
    public Dictionary<string, JsonElement>[]? Options { get; set; } = null;

    [JsonPropertyName("validation")]
    public Dictionary<string, JsonElement>? Validation { get; set; } = null;
}

public record FormDraft
{
    [JsonPropertyName("title")]
    public MultilingualString Title { get; set; } = null!;

    [JsonPropertyName("slug")]
    public string Slug { get; set; } = null!;

    [JsonPropertyName("description")]
    public MultilingualString? Description { get; set; } = null;

    [JsonPropertyName("submitButtonText")]
    public MultilingualString? SubmitButtonText { get; set; } = null;

    [JsonPropertyName("formType")]
    public FormDraftFormTypeEnum? FormType { get; set; } = null;

    [JsonPropertyName("sections")]
    public Dictionary<string, JsonElement>[] Sections { get; set; } = null!;

    [JsonPropertyName("captcha")]
    public Dictionary<string, JsonElement>? Captcha { get; set; } = null;

    [JsonPropertyName("fieldCount")]
    public double FieldCount { get; set; }

    [JsonPropertyName("truncated")]
    public bool Truncated { get; set; }
}

public record FormDraftWrapper
{
    [JsonPropertyName("draft")]
    public FormDraft Draft { get; set; } = null!;
}

public record FormImproveSuggestion
{
    [JsonPropertyName("fieldName")]
    public string? FieldName { get; set; } = null;

    [JsonPropertyName("kind")]
    public string? Kind { get; set; } = null;

    [JsonPropertyName("current")]
    public string? Current { get; set; } = null;

    [JsonPropertyName("proposed")]
    public string? Proposed { get; set; } = null;

    [JsonPropertyName("reason")]
    public string? Reason { get; set; } = null;
}

public record FormImproveWrapper
{
    [JsonPropertyName("formId")]
    public string? FormId { get; set; } = null;

    [JsonPropertyName("summary")]
    public string? Summary { get; set; } = null;

    [JsonPropertyName("suggestions")]
    public FormImproveSuggestion[] Suggestions { get; set; } = null!;

    [JsonPropertyName("reorder")]
    public string[]? Reorder { get; set; } = null;
}

public record CommentModeration
{
    [JsonPropertyName("_id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("commentId")]
    public string? CommentId { get; set; } = null;

    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("toxicity")]
    public double Toxicity { get; set; }

    [JsonPropertyName("spamScore")]
    public double SpamScore { get; set; }

    [JsonPropertyName("sentiment")]
    public CommentModerationSentimentEnum? Sentiment { get; set; } = null;

    [JsonPropertyName("language")]
    public string? Language { get; set; } = null;

    [JsonPropertyName("decision")]
    public CommentModerationDecisionEnum? Decision { get; set; } = null;

    [JsonPropertyName("reasons")]
    public string[]? Reasons { get; set; } = null;

    [JsonPropertyName("suggestedReply")]
    public Dictionary<string, JsonElement>? SuggestedReply { get; set; } = null;

    [JsonPropertyName("autoApplied")]
    public bool AutoApplied { get; set; }

    [JsonPropertyName("provider")]
    public string? Provider { get; set; } = null;

    [JsonPropertyName("providerModel")]
    public string? ProviderModel { get; set; } = null;

    [JsonPropertyName("promptVersion")]
    public string? PromptVersion { get; set; } = null;

    [JsonPropertyName("analyzedAt")]
    public System.DateTime AnalyzedAt { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record CommentModerationSummary
{
    [JsonPropertyName("_id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("toxicity")]
    public double Toxicity { get; set; }

    [JsonPropertyName("spamScore")]
    public double SpamScore { get; set; }

    [JsonPropertyName("sentiment")]
    public string? Sentiment { get; set; } = null;

    [JsonPropertyName("language")]
    public string? Language { get; set; } = null;

    [JsonPropertyName("decision")]
    public CommentModerationSummaryDecisionEnum? Decision { get; set; } = null;

    [JsonPropertyName("reasons")]
    public string[]? Reasons { get; set; } = null;

    [JsonPropertyName("autoApplied")]
    public bool AutoApplied { get; set; }

    [JsonPropertyName("analyzedAt")]
    public System.DateTime AnalyzedAt { get; set; }
}

public record ModerationResultWrapper
{
    [JsonPropertyName("moderation")]
    public CommentModeration Moderation { get; set; } = null!;

    [JsonPropertyName("nextStatus")]
    public JsonElement NextStatus { get; set; }
}

public record CommentReplyDraft
{
    [JsonPropertyName("body")]
    public string Body { get; set; } = null!;

    [JsonPropertyName("locale")]
    public string? Locale { get; set; } = null;
}

public record CommentReplyDraftWrapper
{
    [JsonPropertyName("reply")]
    public CommentReplyDraft Reply { get; set; } = null!;
}

public record MinedQuestionIdea
{
    [JsonPropertyName("topic")]
    public string Topic { get; set; } = null!;

    [JsonPropertyName("angle")]
    public string? Angle { get; set; } = null;

    [JsonPropertyName("questionCount")]
    public double QuestionCount { get; set; }

    [JsonPropertyName("exampleQuestionIds")]
    public string[]? ExampleQuestionIds { get; set; } = null;

    [JsonPropertyName("primaryKeyword")]
    public string? PrimaryKeyword { get; set; } = null;

    [JsonPropertyName("funnelStage")]
    public MinedQuestionIdeaFunnelStageEnum? FunnelStage { get; set; } = null;
}

public record MinedQuestionsWrapper
{
    [JsonPropertyName("ideas")]
    public MinedQuestionIdea[] Ideas { get; set; } = null!;
}

public record EffectiveModerationPolicy
{
    [JsonPropertyName("mode")]
    public EffectiveModerationPolicyModeEnum? Mode { get; set; } = null;

    [JsonPropertyName("maxToxicity")]
    public double MaxToxicity { get; set; }

    [JsonPropertyName("maxSpamScore")]
    public double MaxSpamScore { get; set; }

    [JsonPropertyName("autoRejectSpamScore")]
    public double AutoRejectSpamScore { get; set; }

    [JsonPropertyName("maxLinks")]
    public double MaxLinks { get; set; }

    [JsonPropertyName("blockedTerms")]
    public string[]? BlockedTerms { get; set; } = null;

    [JsonPropertyName("reasons")]
    public string[]? Reasons { get; set; } = null;
}

public record EffectivePolicyWrapper
{
    [JsonPropertyName("policy")]
    public EffectiveModerationPolicy Policy { get; set; } = null!;

    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;
}

public record AiFeatureFlags
{
    [JsonPropertyName("copilot")]
    public bool Copilot { get; set; }

    [JsonPropertyName("autofill")]
    public bool Autofill { get; set; }

    [JsonPropertyName("inline")]
    public bool Inline { get; set; }

    [JsonPropertyName("bulk")]
    public bool Bulk { get; set; }

    [JsonPropertyName("forms")]
    public bool Forms { get; set; }

    [JsonPropertyName("submissions")]
    public bool Submissions { get; set; }

    [JsonPropertyName("comments")]
    public bool Comments { get; set; }

    [JsonPropertyName("calendar")]
    public bool Calendar { get; set; }

    [JsonPropertyName("seo")]
    public bool Seo { get; set; }

    [JsonPropertyName("brandVoice")]
    public bool BrandVoice { get; set; }

    [JsonPropertyName("jobs")]
    public bool Jobs { get; set; }
}

public record AiAutoApplyPolicy
{
    [JsonPropertyName("copilot")]
    public AiAutoApplyPolicyCopilotEnum? Copilot { get; set; } = null;

    [JsonPropertyName("autofill")]
    public AiAutoApplyPolicyAutofillEnum? Autofill { get; set; } = null;

    [JsonPropertyName("inline")]
    public AiAutoApplyPolicyInlineEnum? Inline { get; set; } = null;

    [JsonPropertyName("bulk")]
    public AiAutoApplyPolicyBulkEnum? Bulk { get; set; } = null;

    [JsonPropertyName("forms")]
    public AiAutoApplyPolicyFormsEnum? Forms { get; set; } = null;

    [JsonPropertyName("submissions")]
    public AiAutoApplyPolicySubmissionsEnum? Submissions { get; set; } = null;

    [JsonPropertyName("comments")]
    public AiAutoApplyPolicyCommentsEnum? Comments { get; set; } = null;

    [JsonPropertyName("calendar")]
    public AiAutoApplyPolicyCalendarEnum? Calendar { get; set; } = null;

    [JsonPropertyName("seo")]
    public AiAutoApplyPolicySeoEnum? Seo { get; set; } = null;

    [JsonPropertyName("brandVoice")]
    public AiAutoApplyPolicyBrandVoiceEnum? BrandVoice { get; set; } = null;

    [JsonPropertyName("jobs")]
    public AiAutoApplyPolicyJobsEnum? Jobs { get; set; } = null;
}

public record BrandVoiceProfile
{
    [JsonPropertyName("tone")]
    public string? Tone { get; set; } = null;

    [JsonPropertyName("audience")]
    public string? Audience { get; set; } = null;

    [JsonPropertyName("readingLevel")]
    public string? ReadingLevel { get; set; } = null;

    [JsonPropertyName("do")]
    public string[]? @Do { get; set; } = null;

    [JsonPropertyName("dont")]
    public string[]? Dont { get; set; } = null;

    [JsonPropertyName("bannedTerms")]
    public string[]? BannedTerms { get; set; } = null;

    [JsonPropertyName("examples")]
    public string[]? Examples { get; set; } = null;

    [JsonPropertyName("persianRegister")]
    public JsonElement PersianRegister { get; set; }

    [JsonPropertyName("version")]
    public double Version { get; set; }
}

public record LegacyGlossaryEntry
{
    [JsonPropertyName("term")]
    public string? Term { get; set; } = null;

    [JsonPropertyName("translation")]
    public string? Translation { get; set; } = null;
}

public record AiSettings
{
    [JsonPropertyName("brandVoice")]
    public string? BrandVoice { get; set; } = null;

    [JsonPropertyName("glossary")]
    public LegacyGlossaryEntry[]? Glossary { get; set; } = null;

    [JsonPropertyName("brandVoiceVersion")]
    public string? BrandVoiceVersion { get; set; } = null;

    [JsonPropertyName("autoApply")]
    public bool AutoApply { get; set; }

    [JsonPropertyName("defaultTier")]
    public JsonElement DefaultTier { get; set; }

    [JsonPropertyName("featureFlags")]
    public AiFeatureFlags FeatureFlags { get; set; } = null!;

    [JsonPropertyName("autoApplyPolicy")]
    public AiAutoApplyPolicy AutoApplyPolicy { get; set; } = null!;

    [JsonPropertyName("dailyQuotaPerUser")]
    public double? DailyQuotaPerUser { get; set; } = null;

    [JsonPropertyName("defaultLocales")]
    public string[]? DefaultLocales { get; set; } = null;

    [JsonPropertyName("piiMasking")]
    public Dictionary<string, JsonElement> PiiMasking { get; set; } = null!;

    [JsonPropertyName("retentionDays")]
    public double RetentionDays { get; set; }

    [JsonPropertyName("modelTierOverrides")]
    public JsonElement ModelTierOverrides { get; set; }

    [JsonPropertyName("brandVoiceProfile")]
    public BrandVoiceProfile? BrandVoiceProfile { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record BrandVoiceSettings
{
    [JsonPropertyName("brandVoice")]
    public string? BrandVoice { get; set; } = null;

    [JsonPropertyName("glossary")]
    public LegacyGlossaryEntry[]? Glossary { get; set; } = null;

    [JsonPropertyName("brandVoiceProfile")]
    public BrandVoiceProfile? BrandVoiceProfile { get; set; } = null;

    [JsonPropertyName("brandVoiceVersion")]
    public string? BrandVoiceVersion { get; set; } = null;
}

public record CreditSnapshot
{
    [JsonPropertyName("period")]
    public string Period { get; set; } = null!;

    [JsonPropertyName("used")]
    public double Used { get; set; }

    [JsonPropertyName("reserved")]
    public double Reserved { get; set; }

    [JsonPropertyName("limit")]
    public double Limit { get; set; }

    [JsonPropertyName("remaining")]
    public double Remaining { get; set; }

    [JsonPropertyName("available")]
    public double Available { get; set; }
}

public record TokenEstimate
{
    [JsonPropertyName("actionId")]
    public string ActionId { get; set; } = null!;

    [JsonPropertyName("estimatedTokens")]
    public double EstimatedTokens { get; set; }
}

public record AiRunSubmission
{
    [JsonPropertyName("runId")]
    public string RunId { get; set; } = null!;

    [JsonPropertyName("mode")]
    public string Mode { get; set; } = null!;

    [JsonPropertyName("estimatedTokens")]
    public double EstimatedTokens { get; set; }
}

public record AiRunInsufficientCredits
{
    [JsonPropertyName("reason")]
    public AiRunInsufficientCreditsReasonEnum Reason { get; set; }

    [JsonPropertyName("used")]
    public double Used { get; set; }

    [JsonPropertyName("reserved")]
    public double Reserved { get; set; }

    [JsonPropertyName("limit")]
    public double Limit { get; set; }

    [JsonPropertyName("estimate")]
    public double Estimate { get; set; }
}

public record AiRunConflict
{
    [JsonPropertyName("runId")]
    public string RunId { get; set; } = null!;

    [JsonPropertyName("status")]
    public AiRunConflictStatusEnum Status { get; set; }
}

public record AiRunListItem
{
    [JsonPropertyName("runId")]
    public string RunId { get; set; } = null!;

    [JsonPropertyName("actionId")]
    public string ActionId { get; set; } = null!;

    [JsonPropertyName("status")]
    public AiRunListItemStatusEnum Status { get; set; }

    [JsonPropertyName("estimated")]
    public double Estimated { get; set; }

    [JsonPropertyName("actual")]
    public double? Actual { get; set; } = null;

    [JsonPropertyName("reason")]
    public string? Reason { get; set; } = null;

    [JsonPropertyName("outcome")]
    public string? Outcome { get; set; } = null;

    [JsonPropertyName("meta")]
    public Dictionary<string, JsonElement>? Meta { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public string? CreatedAt { get; set; } = null;
}

public record AiRunList
{
    [JsonPropertyName("runs")]
    public AiRunListItem[] Runs { get; set; } = null!;
}

public record AiProposalPatch
{
    [JsonPropertyName("path")]
    public string Path { get; set; } = null!;

    [JsonPropertyName("lang")]
    public string? Lang { get; set; } = null;

    [JsonPropertyName("key")]
    public string? Key { get; set; } = null;

    [JsonPropertyName("before")]
    public JsonElement Before { get; set; }

    [JsonPropertyName("after")]
    public JsonElement After { get; set; }
}

public record AiProposal
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("articleId")]
    public string ArticleId { get; set; } = null!;

    [JsonPropertyName("actionId")]
    public string ActionId { get; set; } = null!;

    [JsonPropertyName("status")]
    public AiProposalStatusEnum Status { get; set; }

    [JsonPropertyName("createdByUserId")]
    public string? CreatedByUserId { get; set; } = null;

    [JsonPropertyName("decidedByUserId")]
    public string? DecidedByUserId { get; set; } = null;

    [JsonPropertyName("locale")]
    public string? Locale { get; set; } = null;

    [JsonPropertyName("patches")]
    public AiProposalPatch[] Patches { get; set; } = null!;

    [JsonPropertyName("baseHash")]
    public string? BaseHash { get; set; } = null;

    [JsonPropertyName("decidedAt")]
    public string? DecidedAt { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record AiProposalCount
{
    [JsonPropertyName("count")]
    public double Count { get; set; }
}

public record AiProposalDecision
{
    [JsonPropertyName("proposal")]
    public AiProposal Proposal { get; set; } = null!;

    [JsonPropertyName("appliedPatches")]
    public AiProposalPatch[] AppliedPatches { get; set; } = null!;
}

public record AiProposalStale
{
    [JsonPropertyName("reason")]
    public AiProposalStaleReasonEnum Reason { get; set; }
}

public record AiProposalBulkResultItem
{
    [JsonPropertyName("id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("status")]
    public AiProposalBulkResultItemStatusEnum Status { get; set; }

    [JsonPropertyName("reason")]
    public string? Reason { get; set; } = null;
}

public record AiAutofillResult
{
    [JsonPropertyName("proposalId")]
    public string ProposalId { get; set; } = null!;

    [JsonPropertyName("filled")]
    public string[] Filled { get; set; } = null!;

    [JsonPropertyName("skipped")]
    public string[] Skipped { get; set; } = null!;
}

public record ArticleRevisionSnapshot
{
    [JsonPropertyName("mainTitle")]
    public string? MainTitle { get; set; } = null;

    [JsonPropertyName("summary")]
    public string? Summary { get; set; } = null;

    [JsonPropertyName("content")]
    public string? Content { get; set; } = null;

    [JsonPropertyName("tags")]
    public string[]? Tags { get; set; } = null;
}

public record ArticleRevision
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("articleId")]
    public string ArticleId { get; set; } = null!;

    [JsonPropertyName("locale")]
    public string Locale { get; set; } = null!;

    [JsonPropertyName("source")]
    public ArticleRevisionSourceEnum Source { get; set; }

    [JsonPropertyName("userId")]
    public string? UserId { get; set; } = null;

    [JsonPropertyName("aiProposalId")]
    public string? AiProposalId { get; set; } = null;

    [JsonPropertyName("restoredFrom")]
    public string? RestoredFrom { get; set; } = null;

    [JsonPropertyName("snapshot")]
    public ArticleRevisionSnapshot Snapshot { get; set; } = null!;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record ArticleRevisionList
{
    [JsonPropertyName("revisions")]
    public ArticleRevision[] Revisions { get; set; } = null!;

    [JsonPropertyName("maxRevisionsPerLocale")]
    public double MaxRevisionsPerLocale { get; set; }
}

public record ArticleRevisionRestore
{
    [JsonPropertyName("article")]
    public Article Article { get; set; } = null!;

    [JsonPropertyName("revision")]
    public ArticleRevision Revision { get; set; } = null!;
}

public record ReadinessItem
{
    [JsonPropertyName("id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("label")]
    public string Label { get; set; } = null!;

    [JsonPropertyName("state")]
    public ReadinessItemStateEnum State { get; set; }

    [JsonPropertyName("locales")]
    public string[] Locales { get; set; } = null!;

    [JsonPropertyName("detail")]
    public string? Detail { get; set; } = null;
}

public record ArticleReadiness
{
    [JsonPropertyName("articleId")]
    public string ArticleId { get; set; } = null!;

    [JsonPropertyName("itemType")]
    public ArticleReadinessItemTypeEnum ItemType { get; set; }

    [JsonPropertyName("contentSource")]
    public string ContentSource { get; set; } = null!;

    [JsonPropertyName("items")]
    public ReadinessItem[] Items { get; set; } = null!;

    [JsonPropertyName("blockers")]
    public string[] Blockers { get; set; } = null!;

    [JsonPropertyName("warnings")]
    public string[] Warnings { get; set; } = null!;
}

public record ArticleSeoMeta
{
    [JsonPropertyName("articleId")]
    public string ArticleId { get; set; } = null!;

    [JsonPropertyName("locale")]
    public string? Locale { get; set; } = null;

    [JsonPropertyName("metaTitle")]
    public MultilingualStringOrNull MetaTitle { get; set; } = null!;

    [JsonPropertyName("metaDescription")]
    public MultilingualStringOrNull MetaDescription { get; set; } = null!;

    [JsonPropertyName("focusKeyword")]
    public MultilingualStringOrNull FocusKeyword { get; set; } = null!;

    [JsonPropertyName("secondaryKeywords")]
    public MultilingualStringOrNull SecondaryKeywords { get; set; } = null!;

    [JsonPropertyName("canonicalUrl")]
    public MultilingualStringOrNull CanonicalUrl { get; set; } = null!;

    [JsonPropertyName("ogTitle")]
    public MultilingualStringOrNull OgTitle { get; set; } = null!;

    [JsonPropertyName("ogDescription")]
    public MultilingualStringOrNull OgDescription { get; set; } = null!;

    [JsonPropertyName("schemaJson")]
    public MultilingualStringOrNull SchemaJson { get; set; } = null!;

    [JsonPropertyName("ogImage")]
    public string? OgImage { get; set; }

    [JsonPropertyName("robots")]
    public string? Robots { get; set; }

    [JsonPropertyName("slug")]
    public string? Slug { get; set; }
}

public record TranslationStateItem
{
    [JsonPropertyName("locale")]
    public string Locale { get; set; } = null!;

    [JsonPropertyName("state")]
    public TranslationStateItemStateEnum State { get; set; }

    [JsonPropertyName("storedState")]
    public TranslationStateItemStoredStateEnum? StoredState { get; set; } = null;

    [JsonPropertyName("sourceOutdated")]
    public bool SourceOutdated { get; set; }

    [JsonPropertyName("updatedAt")]
    public string? UpdatedAt { get; set; } = null;
}

public record TranslationStateReport
{
    [JsonPropertyName("articleId")]
    public string ArticleId { get; set; } = null!;

    [JsonPropertyName("sourceLocale")]
    public string SourceLocale { get; set; } = null!;

    [JsonPropertyName("items")]
    public TranslationStateItem[] Items { get; set; } = null!;
}

public record TranslationStateDoc
{
    [JsonPropertyName("_id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("articleId")]
    public string ArticleId { get; set; } = null!;

    [JsonPropertyName("locale")]
    public string Locale { get; set; } = null!;

    [JsonPropertyName("sourceLocale")]
    public string? SourceLocale { get; set; } = null;

    [JsonPropertyName("sourceHash")]
    public string SourceHash { get; set; } = null!;

    [JsonPropertyName("targetHash")]
    public string TargetHash { get; set; } = null!;

    [JsonPropertyName("blockHashes")]
    public Dictionary<string, string>? BlockHashes { get; set; } = null;

    [JsonPropertyName("updatedByUserId")]
    public string? UpdatedByUserId { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record AiEvent
{
    [JsonPropertyName("event")]
    public string @Event { get; set; } = null!;

    [JsonPropertyName("occurredAt")]
    public System.DateTime OccurredAt { get; set; }

    [JsonPropertyName("payload")]
    public Dictionary<string, JsonElement>? Payload { get; set; } = null;
}

public record GlossaryTerm
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("source")]
    public string Source { get; set; } = null!;

    [JsonPropertyName("sourceLocale")]
    public string SourceLocale { get; set; } = null!;

    [JsonPropertyName("target")]
    public string Target { get; set; } = null!;

    [JsonPropertyName("targetLocale")]
    public string TargetLocale { get; set; } = null!;

    [JsonPropertyName("doNotTranslate")]
    public bool DoNotTranslate { get; set; }

    [JsonPropertyName("note")]
    public string? Note { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record GlossaryTermWrapper
{
    [JsonPropertyName("term")]
    public GlossaryTerm Term { get; set; } = null!;
}

public record KnowledgeSource
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("type")]
    public KnowledgeSourceTypeEnum Type { get; set; }

    [JsonPropertyName("title")]
    public string Title { get; set; } = null!;

    [JsonPropertyName("uri")]
    public string? Uri { get; set; } = null;

    [JsonPropertyName("content")]
    public string? Content { get; set; } = null;

    [JsonPropertyName("locale")]
    public string? Locale { get; set; } = null;

    [JsonPropertyName("status")]
    public KnowledgeSourceStatusEnum Status { get; set; }

    [JsonPropertyName("error")]
    public string? Error { get; set; } = null;

    [JsonPropertyName("chunkCount")]
    public double ChunkCount { get; set; }

    [JsonPropertyName("tokenCount")]
    public double TokenCount { get; set; }

    [JsonPropertyName("indexedAt")]
    public string? IndexedAt { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record KnowledgeSourceWrapper
{
    [JsonPropertyName("source")]
    public KnowledgeSource Source { get; set; } = null!;
}

public record TaxonomyFinding
{
    [JsonPropertyName("code")]
    public TaxonomyFindingCodeEnum Code { get; set; }

    [JsonPropertyName("severity")]
    public TaxonomyFindingSeverityEnum Severity { get; set; }

    [JsonPropertyName("entityType")]
    public TaxonomyFindingEntityTypeEnum EntityType { get; set; }

    [JsonPropertyName("entityId")]
    public string? EntityId { get; set; } = null;

    [JsonPropertyName("names")]
    public string[]? Names { get; set; } = null;

    [JsonPropertyName("message")]
    public string Message { get; set; } = null!;

    [JsonPropertyName("fixAction")]
    public string FixAction { get; set; } = null!;
}

public record TaxonomyAudit
{
    [JsonPropertyName("findings")]
    public TaxonomyFinding[] Findings { get; set; } = null!;

    [JsonPropertyName("summary")]
    public Dictionary<string, JsonElement> Summary { get; set; } = null!;
}

public record TaxonomySeoEntry
{
    [JsonPropertyName("metaTitle")]
    public string? MetaTitle { get; set; } = null;

    [JsonPropertyName("metaDescription")]
    public string? MetaDescription { get; set; } = null;

    [JsonPropertyName("focusKeyword")]
    public string? FocusKeyword { get; set; } = null;
}

public record CategorySeoSuggestion
{
    [JsonPropertyName("entityType")]
    public CategorySeoSuggestionEntityTypeEnum EntityType { get; set; }

    [JsonPropertyName("entityId")]
    public string EntityId { get; set; } = null!;

    [JsonPropertyName("seo")]
    public Dictionary<string, TaxonomySeoEntry> Seo { get; set; } = null!;
}

public record TagSuggestion
{
    [JsonPropertyName("tag")]
    public string Tag { get; set; } = null!;

    [JsonPropertyName("isNew")]
    public bool IsNew { get; set; }

    [JsonPropertyName("confidence")]
    public double Confidence { get; set; }
}

public record TagSuggestions
{
    [JsonPropertyName("tags")]
    public TagSuggestion[] Tags { get; set; } = null!;
}

public record TagMergeResult
{
    [JsonPropertyName("from")]
    public string From { get; set; } = null!;

    [JsonPropertyName("into")]
    public string Into { get; set; } = null!;

    [JsonPropertyName("articlesUpdated")]
    public double ArticlesUpdated { get; set; }
}

public record TagUsageRefresh
{
    [JsonPropertyName("updated")]
    public double Updated { get; set; }
}

public record AuthorBioSuggestion
{
    [JsonPropertyName("authorId")]
    public string AuthorId { get; set; } = null!;

    [JsonPropertyName("bio")]
    public Dictionary<string, string>? Bio { get; set; } = null;

    [JsonPropertyName("expertise")]
    public string[]? Expertise { get; set; } = null;
}

public record AuthorSuggestion
{
    [JsonPropertyName("authorId")]
    public string AuthorId { get; set; } = null!;

    [JsonPropertyName("score")]
    public double Score { get; set; }

    [JsonPropertyName("matched")]
    public string[]? Matched { get; set; } = null;
}

public record AuthorSuggestions
{
    [JsonPropertyName("suggestions")]
    public AuthorSuggestion[] Suggestions { get; set; } = null!;
}

public record MediaAsset
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("kind")]
    public MediaAssetKindEnum Kind { get; set; }

    [JsonPropertyName("url")]
    public string Url { get; set; } = null!;

    [JsonPropertyName("storageKey")]
    public string? StorageKey { get; set; } = null;

    [JsonPropertyName("fileName")]
    public string? FileName { get; set; } = null;

    [JsonPropertyName("mimeType")]
    public string? MimeType { get; set; } = null;

    [JsonPropertyName("sizeBytes")]
    public double? SizeBytes { get; set; } = null;

    [JsonPropertyName("width")]
    public double? Width { get; set; } = null;

    [JsonPropertyName("height")]
    public double? Height { get; set; } = null;

    [JsonPropertyName("altText")]
    public Dictionary<string, string>? AltText { get; set; } = null;

    [JsonPropertyName("caption")]
    public Dictionary<string, string>? Caption { get; set; } = null;

    [JsonPropertyName("tags")]
    public string[]? Tags { get; set; } = null;

    [JsonPropertyName("aiMetadata")]
    public Dictionary<string, JsonElement>? AiMetadata { get; set; } = null;

    [JsonPropertyName("usage")]
    public Dictionary<string, JsonElement>[]? Usage { get; set; } = null;

    [JsonPropertyName("isDeleted")]
    public bool IsDeleted { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record MediaAssetList
{
    [JsonPropertyName("assets")]
    public MediaAsset[] Assets { get; set; } = null!;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record MediaAssetWrapper
{
    [JsonPropertyName("asset")]
    public MediaAsset Asset { get; set; } = null!;
}

public record MediaUsageRef
{
    [JsonPropertyName("entityType")]
    public string EntityType { get; set; } = null!;

    [JsonPropertyName("entityId")]
    public string EntityId { get; set; } = null!;

    [JsonPropertyName("field")]
    public string Field { get; set; } = null!;

    [JsonPropertyName("title")]
    public string? Title { get; set; } = null;

    [JsonPropertyName("slug")]
    public string? Slug { get; set; } = null;
}

public record MediaUsage
{
    [JsonPropertyName("usages")]
    public MediaUsageRef[] Usages { get; set; } = null!;
}

public record MediaMetadataSuggestion
{
    [JsonPropertyName("assetId")]
    public string? AssetId { get; set; } = null;

    [JsonPropertyName("url")]
    public string? Url { get; set; } = null;

    [JsonPropertyName("mimeType")]
    public string? MimeType { get; set; } = null;

    [JsonPropertyName("locale")]
    public string? Locale { get; set; } = null;

    [JsonPropertyName("altText")]
    public string AltText { get; set; } = null!;

    [JsonPropertyName("tags")]
    public string[] Tags { get; set; } = null!;

    [JsonPropertyName("kind")]
    public MediaMetadataSuggestionKindEnum Kind { get; set; }
}

public record MediaMissingAlt
{
    [JsonPropertyName("assets")]
    public MediaAsset[] Assets { get; set; } = null!;

    [JsonPropertyName("totalMissing")]
    public double TotalMissing { get; set; }

    [JsonPropertyName("locale")]
    public string? Locale { get; set; } = null;
}

public record ContentPlanStatus
{
    [JsonExtensionData]
    public Dictionary<string, JsonElement>? Extra { get; set; }
}

public record ContentPlanLocale
{
    [JsonPropertyName("code")]
    public string Code { get; set; } = null!;

    [JsonPropertyName("translationDueOffsetDays")]
    public double? TranslationDueOffsetDays { get; set; } = null;

    [JsonPropertyName("status")]
    public ContentPlanLocaleStatusEnum? Status { get; set; } = null;
}

public record ContentPlanItem
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("title")]
    public string Title { get; set; } = null!;

    [JsonPropertyName("brief")]
    public string? Brief { get; set; } = null;

    [JsonPropertyName("primaryKeyword")]
    public string? PrimaryKeyword { get; set; } = null;

    [JsonPropertyName("intent")]
    public JsonElement Intent { get; set; }

    [JsonPropertyName("funnelStage")]
    public JsonElement FunnelStage { get; set; }

    [JsonPropertyName("category")]
    public string? Category { get; set; } = null;

    [JsonPropertyName("subCategory")]
    public string? SubCategory { get; set; } = null;

    [JsonPropertyName("author")]
    public string? Author { get; set; } = null;

    [JsonPropertyName("assignee")]
    public string? Assignee { get; set; } = null;

    [JsonPropertyName("campaign")]
    public string? Campaign { get; set; } = null;

    [JsonPropertyName("status")]
    public ContentPlanStatus Status { get; set; } = null!;

    [JsonPropertyName("source")]
    public ContentPlanItemSourceEnum? Source { get; set; } = null;

    [JsonPropertyName("originRef")]
    public string? OriginRef { get; set; } = null;

    [JsonPropertyName("dueAt")]
    public string? DueAt { get; set; } = null;

    [JsonPropertyName("plannedPublishAt")]
    public string? PlannedPublishAt { get; set; } = null;

    [JsonPropertyName("timezone")]
    public string? Timezone { get; set; } = null;

    [JsonPropertyName("locales")]
    public ContentPlanLocale[]? Locales { get; set; } = null;

    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("notes")]
    public string? Notes { get; set; } = null;

    [JsonPropertyName("tags")]
    public string[]? Tags { get; set; } = null;

    [JsonPropertyName("createdBy")]
    public string? CreatedBy { get; set; } = null;

    [JsonPropertyName("isDeleted")]
    public bool IsDeleted { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record ContentPlanItemWrapper
{
    [JsonPropertyName("item")]
    public ContentPlanItem Item { get; set; } = null!;
}

public record PlanWarning
{
    [JsonPropertyName("code")]
    public PlanWarningCodeEnum Code { get; set; }

    [JsonPropertyName("severity")]
    public PlanWarningSeverityEnum Severity { get; set; }

    [JsonPropertyName("itemIds")]
    public string[] ItemIds { get; set; } = null!;

    [JsonPropertyName("message")]
    public string Message { get; set; } = null!;
}

public record ContentCadence
{
    [JsonPropertyName("_id")]
    public string? Id { get; set; } = null;

    [JsonPropertyName("scope")]
    public ContentCadenceScopeEnum? Scope { get; set; } = null;

    [JsonPropertyName("category")]
    public string? Category { get; set; } = null;

    [JsonPropertyName("postsPerWeek")]
    public double PostsPerWeek { get; set; }

    [JsonPropertyName("preferredWeekdays")]
    public double[]? PreferredWeekdays { get; set; } = null;

    [JsonPropertyName("preferredTime")]
    public string? PreferredTime { get; set; } = null;

    [JsonPropertyName("timezone")]
    public string? Timezone { get; set; } = null;

    [JsonPropertyName("weekendDays")]
    public double[]? WeekendDays { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record CadenceWrapper
{
    [JsonPropertyName("cadence")]
    public ContentCadence? Cadence { get; set; }
}

public record ContentPlanList
{
    [JsonPropertyName("items")]
    public ContentPlanItem[] Items { get; set; } = null!;

    [JsonPropertyName("warnings")]
    public PlanWarning[] Warnings { get; set; } = null!;

    [JsonPropertyName("cadence")]
    public ContentCadence? Cadence { get; set; } = null;
}

public record StartDraft
{
    [JsonPropertyName("item")]
    public ContentPlanItem Item { get; set; } = null!;

    [JsonPropertyName("articleId")]
    public string ArticleId { get; set; } = null!;
}

public record StartDraftWrapper
{
    [JsonPropertyName("null")]
    public StartDraft? @Null { get; set; } = null;
}

public record ScheduleResult
{
    [JsonPropertyName("item")]
    public ContentPlanItem Item { get; set; } = null!;

    [JsonPropertyName("articleScheduled")]
    public bool ArticleScheduled { get; set; }
}

public record ScheduleWrapper
{
    [JsonPropertyName("null")]
    public ScheduleResult? @Null { get; set; } = null;
}

public record ContentGap
{
    [JsonPropertyName("code")]
    public ContentGapCodeEnum Code { get; set; }

    [JsonPropertyName("severity")]
    public ContentGapSeverityEnum Severity { get; set; }

    [JsonPropertyName("categoryId")]
    public string? CategoryId { get; set; } = null;

    [JsonPropertyName("categoryName")]
    public string? CategoryName { get; set; } = null;

    [JsonPropertyName("locale")]
    public string? Locale { get; set; } = null;

    [JsonPropertyName("articleIds")]
    public string[] ArticleIds { get; set; } = null!;

    [JsonPropertyName("articleTitles")]
    public string[]? ArticleTitles { get; set; } = null;

    [JsonPropertyName("message")]
    public string Message { get; set; } = null!;

    [JsonPropertyName("suggestedStatus")]
    public ContentPlanStatus SuggestedStatus { get; set; } = null!;
}

public record ContentGapReport
{
    [JsonPropertyName("gaps")]
    public ContentGap[] Gaps { get; set; } = null!;

    [JsonPropertyName("summary")]
    public Dictionary<string, JsonElement> Summary { get; set; } = null!;
}

public record CalendarIdea
{
    [JsonPropertyName("title")]
    public string Title { get; set; } = null!;

    [JsonPropertyName("angle")]
    public string? Angle { get; set; } = null;

    [JsonPropertyName("brief")]
    public string? Brief { get; set; } = null;

    [JsonPropertyName("primaryKeyword")]
    public string PrimaryKeyword { get; set; } = null!;

    [JsonPropertyName("intent")]
    public CalendarIdeaIntentEnum? Intent { get; set; } = null;

    [JsonPropertyName("funnelStage")]
    public CalendarIdeaFunnelStageEnum? FunnelStage { get; set; } = null;

    [JsonPropertyName("categoryName")]
    public string? CategoryName { get; set; } = null;

    [JsonPropertyName("localeVariants")]
    public Dictionary<string, JsonElement>[]? LocaleVariants { get; set; } = null;

    [JsonPropertyName("suggestedDate")]
    public string? SuggestedDate { get; set; } = null;
}

public record CalendarIdeas
{
    [JsonPropertyName("ideas")]
    public CalendarIdea[] Ideas { get; set; } = null!;

    [JsonPropertyName("requested")]
    public double Requested { get; set; }
}

public record CalendarPlanEntry
{
    [JsonPropertyName("plannedPublishAt")]
    public string PlannedPublishAt { get; set; } = null!;

    [JsonPropertyName("weekday")]
    public double Weekday { get; set; }

    [JsonPropertyName("series")]
    public string? Series { get; set; } = null;

    [JsonPropertyName("workingTitle")]
    public string? WorkingTitle { get; set; } = null;
}

public record CalendarPeriodPlan
{
    [JsonPropertyName("entries")]
    public CalendarPlanEntry[] Entries { get; set; } = null!;

    [JsonPropertyName("cadence")]
    public Dictionary<string, JsonElement> Cadence { get; set; } = null!;
}

public record CalendarBestTime
{
    [JsonPropertyName("suggestion")]
    public Dictionary<string, JsonElement> Suggestion { get; set; } = null!;

    [JsonPropertyName("samples")]
    public double Samples { get; set; }

    [JsonPropertyName("basis")]
    public CalendarBestTimeBasisEnum Basis { get; set; }
}

public record CalendarReschedule
{
    [JsonPropertyName("proposal")]
    public Dictionary<string, JsonElement>? Proposal { get; set; } = null;
}

public record Campaign
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("name")]
    public string Name { get; set; } = null!;

    [JsonPropertyName("goal")]
    public string? Goal { get; set; } = null;

    [JsonPropertyName("description")]
    public string? Description { get; set; } = null;

    [JsonPropertyName("startsAt")]
    public string? StartsAt { get; set; } = null;

    [JsonPropertyName("endsAt")]
    public string? EndsAt { get; set; } = null;

    [JsonPropertyName("status")]
    public CampaignStatusEnum Status { get; set; }

    [JsonPropertyName("color")]
    public string? Color { get; set; } = null;

    [JsonPropertyName("createdBy")]
    public string? CreatedBy { get; set; } = null;

    [JsonPropertyName("isDeleted")]
    public bool IsDeleted { get; set; }

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record CampaignWrapper
{
    [JsonPropertyName("campaign")]
    public Campaign Campaign { get; set; } = null!;
}

public record CampaignList
{
    [JsonPropertyName("campaigns")]
    public Campaign[] Campaigns { get; set; } = null!;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record DigestAction
{
    [JsonPropertyName("code")]
    public DigestActionCodeEnum Code { get; set; }

    [JsonPropertyName("severity")]
    public DigestActionSeverityEnum Severity { get; set; }

    [JsonPropertyName("reason")]
    public string Reason { get; set; } = null!;

    [JsonPropertyName("href")]
    public string? Href { get; set; } = null;
}

public record WeeklyDigest
{
    [JsonPropertyName("weekOf")]
    public string WeekOf { get; set; } = null!;

    [JsonPropertyName("range")]
    public Dictionary<string, JsonElement> Range { get; set; } = null!;

    [JsonPropertyName("published")]
    public Dictionary<string, JsonElement> Published { get; set; } = null!;

    [JsonPropertyName("ai")]
    public Dictionary<string, JsonElement> Ai { get; set; } = null!;

    [JsonPropertyName("suggestedActions")]
    public DigestAction[] SuggestedActions { get; set; } = null!;

    [JsonPropertyName("wins")]
    public string[]? Wins { get; set; } = null;

    [JsonPropertyName("issues")]
    public string[]? Issues { get; set; } = null;
}

public record WeeklyDigestWrapper
{
    [JsonPropertyName("digest")]
    public WeeklyDigest Digest { get; set; } = null!;
}

public record SeoHealthCategoryRow
{
    [JsonPropertyName("categoryId")]
    public string? CategoryId { get; set; } = null;

    [JsonPropertyName("categoryName")]
    public string? CategoryName { get; set; } = null;

    [JsonPropertyName("articles")]
    public double Articles { get; set; }

    [JsonPropertyName("issues")]
    public double Issues { get; set; }

    [JsonPropertyName("healthPercent")]
    public double HealthPercent { get; set; }
}

public record SeoHealthReport
{
    [JsonPropertyName("range")]
    public Dictionary<string, JsonElement>? Range { get; set; } = null;

    [JsonPropertyName("scanned")]
    public double Scanned { get; set; }

    [JsonPropertyName("issueCounts")]
    public Dictionary<string, double>? IssueCounts { get; set; } = null;

    [JsonPropertyName("totalIssues")]
    public double TotalIssues { get; set; }

    [JsonPropertyName("healthyPercent")]
    public double HealthyPercent { get; set; }

    [JsonPropertyName("byCategory")]
    public SeoHealthCategoryRow[] ByCategory { get; set; } = null!;

    [JsonPropertyName("notes")]
    public string[]? Notes { get; set; } = null;
}

public record CalendarAdherenceReport
{
    [JsonPropertyName("range")]
    public Dictionary<string, JsonElement>? Range { get; set; } = null;

    [JsonPropertyName("planned")]
    public double Planned { get; set; }

    [JsonPropertyName("published")]
    public double Published { get; set; }

    [JsonPropertyName("publishedOnTime")]
    public double PublishedOnTime { get; set; }

    [JsonPropertyName("deliveryRate")]
    public double DeliveryRate { get; set; }

    [JsonPropertyName("onTimeRate")]
    public double OnTimeRate { get; set; }

    [JsonPropertyName("medianLeadTimeDays")]
    public double? MedianLeadTimeDays { get; set; } = null;

    [JsonPropertyName("overdue")]
    public double Overdue { get; set; }

    [JsonPropertyName("campaigns")]
    public Dictionary<string, JsonElement>[]? Campaigns { get; set; } = null;

    [JsonPropertyName("notes")]
    public string[]? Notes { get; set; } = null;
}

public record AiAcceptanceActionRow
{
    [JsonPropertyName("actionId")]
    public string ActionId { get; set; } = null!;

    [JsonPropertyName("runs")]
    public double Runs { get; set; }

    [JsonPropertyName("accepted")]
    public double Accepted { get; set; }

    [JsonPropertyName("acceptanceRate")]
    public double AcceptanceRate { get; set; }

    [JsonPropertyName("minutesSaved")]
    public double MinutesSaved { get; set; }
}

public record AiAcceptanceReport
{
    [JsonPropertyName("range")]
    public Dictionary<string, JsonElement>? Range { get; set; } = null;

    [JsonPropertyName("total")]
    public double Total { get; set; }

    [JsonPropertyName("accepted")]
    public double Accepted { get; set; }

    [JsonPropertyName("rejected")]
    public double Rejected { get; set; }

    [JsonPropertyName("acceptanceRate")]
    public double AcceptanceRate { get; set; }

    [JsonPropertyName("credits")]
    public Dictionary<string, JsonElement>? Credits { get; set; } = null;

    [JsonPropertyName("timeSaved")]
    public Dictionary<string, JsonElement> TimeSaved { get; set; } = null!;

    [JsonPropertyName("byAction")]
    public AiAcceptanceActionRow[]? ByAction { get; set; } = null;

    [JsonPropertyName("notes")]
    public string[]? Notes { get; set; } = null;
}

public record TranslationCoverageReportV2
{
    [JsonPropertyName("missingArticles")]
    public Dictionary<string, JsonElement>[]? MissingArticles { get; set; } = null;
}

public record ReportWrapper
{
    [JsonPropertyName("null")]
    public ReportPayload? @Null { get; set; } = null;
}

public record ReportPayload
{
    [JsonPropertyName("report")]
    public object? Report { get; set; } = null;
}

public record SeoAuditIssue
{
    [JsonPropertyName("code")]
    public SeoAuditIssueCodeEnum Code { get; set; }

    [JsonPropertyName("severity")]
    public SeoAuditIssueSeverityEnum Severity { get; set; }

    [JsonPropertyName("articleId")]
    public string ArticleId { get; set; } = null!;

    [JsonPropertyName("title")]
    public string? Title { get; set; } = null;

    [JsonPropertyName("message")]
    public string Message { get; set; } = null!;

    [JsonPropertyName("fixAction")]
    public string? FixAction { get; set; } = null;
}

public record SeoAuditReport
{
    [JsonPropertyName("issues")]
    public SeoAuditIssue[] Issues { get; set; } = null!;

    [JsonPropertyName("summary")]
    public Dictionary<string, double> Summary { get; set; } = null!;

    [JsonPropertyName("scanned")]
    public double Scanned { get; set; }
}

public record CannibalizationGroup
{
    [JsonPropertyName("keyword")]
    public string Keyword { get; set; } = null!;

    [JsonPropertyName("articleIds")]
    public string[] ArticleIds { get; set; } = null!;

    [JsonPropertyName("titles")]
    public string[]? Titles { get; set; } = null;

    [JsonPropertyName("recommendedKeep")]
    public string RecommendedKeep { get; set; } = null!;
}

public record CannibalizationReport
{
    [JsonPropertyName("groups")]
    public CannibalizationGroup[] Groups { get; set; } = null!;

    [JsonPropertyName("summary")]
    public Dictionary<string, JsonElement> Summary { get; set; } = null!;
}

public record RefreshCandidate
{
    [JsonPropertyName("articleId")]
    public string ArticleId { get; set; } = null!;

    [JsonPropertyName("title")]
    public string? Title { get; set; } = null;

    [JsonPropertyName("ageDays")]
    public double AgeDays { get; set; }

    [JsonPropertyName("viewsTotal")]
    public double ViewsTotal { get; set; }

    [JsonPropertyName("trendRatio")]
    public double? TrendRatio { get; set; } = null;

    [JsonPropertyName("severity")]
    public RefreshCandidateSeverityEnum Severity { get; set; }

    [JsonPropertyName("reasons")]
    public JsonElement Reasons { get; set; }
}

public record RefreshCandidateReport
{
    [JsonPropertyName("candidates")]
    public RefreshCandidate[] Candidates { get; set; } = null!;

    [JsonPropertyName("scanned")]
    public double Scanned { get; set; }
}

public record RefreshPlanItem
{
    [JsonPropertyName("item")]
    public ContentPlanItem Item { get; set; } = null!;

    [JsonPropertyName("linked")]
    public bool Linked { get; set; }
}

public record RefreshPlanItemWrapper
{
    [JsonPropertyName("null")]
    public RefreshPlanItem? @Null { get; set; } = null;
}

public record HreflangEntry
{
    [JsonPropertyName("locale")]
    public string Locale { get; set; } = null!;

    [JsonPropertyName("hreflang")]
    public string Hreflang { get; set; } = null!;

    [JsonPropertyName("url")]
    public string Url { get; set; } = null!;
}

public record HreflangGroup
{
    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("canonical")]
    public string Canonical { get; set; } = null!;

    [JsonPropertyName("alternates")]
    public HreflangEntry[] Alternates { get; set; } = null!;

    [JsonPropertyName("xDefault")]
    public string? XDefault { get; set; } = null;
}

public record HreflangWrapper
{
    [JsonPropertyName("hreflang")]
    public HreflangGroup Hreflang { get; set; } = null!;
}

public record Redirect
{
    [JsonPropertyName("_id")]
    public string Id { get; set; } = null!;

    [JsonPropertyName("tenantId")]
    public string? TenantId { get; set; } = null;

    [JsonPropertyName("fromSlug")]
    public string FromSlug { get; set; } = null!;

    [JsonPropertyName("toSlug")]
    public string ToSlug { get; set; } = null!;

    [JsonPropertyName("articleId")]
    public string? ArticleId { get; set; } = null;

    [JsonPropertyName("createdAt")]
    public System.DateTime CreatedAt { get; set; }

    [JsonPropertyName("updatedAt")]
    public System.DateTime UpdatedAt { get; set; }
}

public record RedirectList
{
    [JsonPropertyName("redirects")]
    public Redirect[] Redirects { get; set; } = null!;

    [JsonPropertyName("pagination")]
    public Pagination Pagination { get; set; } = null!;
}

public record TranslationCoverageRow
{
    [JsonPropertyName("entityType")]
    public TranslationCoverageRowEntityTypeEnum EntityType { get; set; }

    [JsonPropertyName("covered")]
    public double Covered { get; set; }

    [JsonPropertyName("total")]
    public double Total { get; set; }

    [JsonPropertyName("missingByLocale")]
    public Dictionary<string, double> MissingByLocale { get; set; } = null!;
}

public record TranslationCoverageReport
{
    [JsonPropertyName("locales")]
    public string[] Locales { get; set; } = null!;

    [JsonPropertyName("rows")]
    public TranslationCoverageRow[] Rows { get; set; } = null!;

    [JsonPropertyName("completeness")]
    public double Completeness { get; set; }
}

public record ContentTypeProfile
{
    [JsonPropertyName("type")]
    public ContentTypeProfileTypeEnum Type { get; set; }

    [JsonPropertyName("length")]
    public Dictionary<string, JsonElement> Length { get; set; } = null!;

    [JsonPropertyName("weights")]
    public Dictionary<string, double> Weights { get; set; } = null!;

    [JsonPropertyName("optionalSignals")]
    public string[]? OptionalSignals { get; set; } = null;

    [JsonPropertyName("requiresSummary")]
    public bool RequiresSummary { get; set; }
}

public record ContentTypeProfileWrapper
{
    [JsonPropertyName("profile")]
    public ContentTypeProfile? Profile { get; set; } = null;

    [JsonPropertyName("profiles")]
    public ContentTypeProfile[]? Profiles { get; set; } = null;
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
