// Code generated from the OpenAPI spec. DO NOT EDIT.

package sdk

// Keyed by language code, or by whatever key the endpoint supplies.
type MultilingualString map[string]string

type MultilingualStringOrNull struct {
	// List wrapper: the payload is reached through the key the server
	// sent it under.
	Extra map[string]any `json:"-"`
}

type Pagination struct {
	Total float64 `json:"total"`
	Page float64 `json:"page"`
	Limit float64 `json:"limit"`
	TotalPages float64 `json:"totalPages"`
}

type Tokens struct {
	Used float64 `json:"used"`
	Remaining float64 `json:"remaining"`
	Limit float64 `json:"limit"`
}

type TokensUsedOnly struct {
	Used float64 `json:"used"`
}

type SeoKeywordAnalysis struct {
	Term string `json:"term"`
	Count float64 `json:"count"`
	Density float64 `json:"density"`
	Positions []float64 `json:"positions"`
	InTitle bool `json:"inTitle"`
	InHeadings float64 `json:"inHeadings"`
	InFirstParagraph bool `json:"inFirstParagraph"`
}

type SeoLanguageMetrics struct {
	LanguageCode string `json:"languageCode"`
	PrimaryKeyword *string `json:"primaryKeyword"`
	BaseScore float64 `json:"baseScore"`
	PotentialScore float64 `json:"potentialScore"`
	Signals map[string]any `json:"signals"`
	WordCount float64 `json:"wordCount"`
	KeywordDensity *float64 `json:"keywordDensity"`
	Suggestions []string `json:"suggestions"`
	TermsAnalysis map[string]any `json:"termsAnalysis"`
	StructureAnalysis map[string]any `json:"structureAnalysis"`
	LinkAnalysis map[string]any `json:"linkAnalysis"`
	ImageAnalysis map[string]any `json:"imageAnalysis"`
	ReadabilityMetrics map[string]any `json:"readabilityMetrics"`
	TechnicalSEO map[string]any `json:"technicalSEO"`
}

// Keyed by language code, or by whatever key the endpoint supplies.
type SeoPerLanguage map[string]SeoLanguageMetrics

type ArticleSeo struct {
	PerLanguage SeoPerLanguage `json:"perLanguage"`
}

type ArticleEngagementOverride struct {
	CommentsEnabled bool `json:"commentsEnabled"`
	ReactionsEnabled bool `json:"reactionsEnabled"`
	AutoApproveComments bool `json:"autoApproveComments"`
}

type Author struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	Slug string `json:"slug"`
	Name MultilingualString `json:"name"`
	Email string `json:"email"`
	Avatar string `json:"avatar"`
	Bio MultilingualString `json:"bio"`
	IsPrivate bool `json:"isPrivate"`
	IsActive bool `json:"isActive"`
	IsDeleted bool `json:"isDeleted"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type Category struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	Name MultilingualString `json:"name"`
	Slug string `json:"slug"`
	Thumbnail string `json:"thumbnail"`
	Description MultilingualString `json:"description"`
	IsPrivate bool `json:"isPrivate"`
	IsActive bool `json:"isActive"`
	IsDeleted bool `json:"isDeleted"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type SubCategory struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	Name MultilingualString `json:"name"`
	Slug string `json:"slug"`
	Thumbnail string `json:"thumbnail"`
	Description MultilingualString `json:"description"`
	Category string `json:"category"`
	IsPrivate bool `json:"isPrivate"`
	IsActive bool `json:"isActive"`
	IsDeleted bool `json:"isDeleted"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type Tag struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	Name string `json:"name"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type Language struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	Code string `json:"code"`
	Name string `json:"name"`
	IsActive bool `json:"isActive"`
	IsDeleted bool `json:"isDeleted"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type AIConversationMessage struct {
	Role string `json:"role"`
	Content string `json:"content"`
	Timestamp string `json:"timestamp"`
}

type AIConversationClarification struct {
	Question string `json:"question"`
	Answer string `json:"answer"`
}

type AIConversationRequirements struct {
	TargetAudience *string `json:"targetAudience"`
	Tone *string `json:"tone"`
	Length *string `json:"length"`
	Keywords []string `json:"keywords"`
	Language *string `json:"language"`
	PrimaryKeyword *string `json:"primaryKeyword"`
	MinWordCount *float64 `json:"minWordCount"`
}

type AIConversation struct {
	ID string `json:"_id"`
	ConversationID string `json:"conversationId"`
	TenantID string `json:"tenantId"`
	UserID *string `json:"userId"`
	Stage string `json:"stage"`
	TokensInput float64 `json:"tokensInput"`
	TokensOutput float64 `json:"tokensOutput"`
	TokensTotal float64 `json:"tokensTotal"`
	Messages []AIConversationMessage `json:"messages"`
	Context map[string]any `json:"context"`
	Attempts float64 `json:"attempts"`
	MaxAttempts float64 `json:"maxAttempts"`
	LastArticle map[string]any `json:"lastArticle"`
	ExpiresAt string `json:"expiresAt"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type AIConversationArticle struct {
	Title string `json:"title"`
	Summary string `json:"summary"`
	Content string `json:"content"`
	Slug string `json:"slug"`
	Tags []string `json:"tags"`
	SEOScore float64 `json:"seoScore"`
}

type Article struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	Slug string `json:"slug"`
	MainTitle MultilingualString `json:"mainTitle"`
	Title2 MultilingualString `json:"title2"`
	Title3 MultilingualString `json:"title3"`
	Summary MultilingualStringOrNull `json:"summary"`
	Content MultilingualString `json:"content"`
	Category []string `json:"category"`
	SubCategory []string `json:"subCategory"`
	Author string `json:"author"`
	CreatedBy string `json:"createdBy"`
	Tags []string `json:"tags"`
	Thumbnail string `json:"thumbnail"`
	Gallery []string `json:"gallery"`
	Videos []string `json:"videos"`
	Audios []string `json:"audios"`
	Documents []string `json:"documents"`
	Files []string `json:"files"`
	Likes float64 `json:"likes"`
	Dislikes float64 `json:"dislikes"`
	Shares float64 `json:"shares"`
	Rating float64 `json:"rating"`
	RatingCount float64 `json:"ratingCount"`
	Views float64 `json:"views"`
	PublishDate string `json:"publishDate"`
	IsPublished bool `json:"isPublished"`
	IsPrivate bool `json:"isPrivate"`
	IsDeleted bool `json:"isDeleted"`
	IsActive bool `json:"isActive"`
	AutoSummarize bool `json:"autoSummarize"`
	ContentSource string `json:"contentSource"`
	ContentBlocks ArticleContentBlocks `json:"contentBlocks"`
	DerivedContent []ArticleDerivedContent `json:"derivedContent"`
	Engagement ArticleEngagementOverride `json:"engagement"`
	SEO ArticleSeo `json:"seo"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type ArticleListItem struct {
	ID string `json:"_id"`
	MainTitle MultilingualString `json:"mainTitle"`
	Slug string `json:"slug"`
	Thumbnail string `json:"thumbnail"`
	Category []Category `json:"category"`
	SubCategory []SubCategory `json:"subCategory"`
	Author *Author `json:"author"`
	Summary MultilingualStringOrNull `json:"summary"`
	IsPublished bool `json:"isPublished"`
	IsPrivate bool `json:"isPrivate"`
	PublishDate string `json:"publishDate"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
	SEO ArticleSeo `json:"seo"`
}

type ArticleLocalized struct {
	ID string `json:"_id"`
	MainTitle MultilingualStringOrNull `json:"mainTitle"`
	Title2 MultilingualStringOrNull `json:"title2"`
	Title3 MultilingualStringOrNull `json:"title3"`
	Summary MultilingualStringOrNull `json:"summary"`
	Content MultilingualStringOrNull `json:"content"`
	Category []map[string]any `json:"category"`
	SubCategory []map[string]any `json:"subCategory"`
	Author *map[string]any `json:"author"`
	IsPublished bool `json:"isPublished"`
	IsPrivate bool `json:"isPrivate"`
	PublishDate string `json:"publishDate"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type FormFieldOption struct {
	Value string `json:"value"`
	Label MultilingualString `json:"label"`
}

type FormRelationRef struct {
	ID string `json:"_id"`
	Slug string `json:"slug"`
	Title MultilingualString `json:"title"`
	FormType string `json:"formType"`
}

type FormField struct {
	Name string `json:"name"`
	Type string `json:"type"`
	Label MultilingualString `json:"label"`
	Required bool `json:"required"`
	Options []FormFieldOption `json:"options"`
	Validation map[string]any `json:"validation"`
	Multiple bool `json:"multiple"`
	Accept string `json:"accept"`
	ColSpan float64 `json:"colSpan"`
	Icon string `json:"icon"`
	Disabled bool `json:"disabled"`
	Verified bool `json:"verified"`
	DefaultValue any `json:"defaultValue"`
	Placeholder MultilingualString `json:"placeholder"`
	Relation map[string]any `json:"relation"`
	RelationDetails map[string]any `json:"relationDetails"`
}

type FormSection struct {
	Title MultilingualString `json:"title"`
	Icon string `json:"icon"`
	Description MultilingualString `json:"description"`
	Fields []FormField `json:"fields"`
}

type FormNotification struct {
	Enabled bool `json:"enabled"`
	Email map[string]any `json:"email"`
	Push map[string]any `json:"push"`
}

type Form struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	Title MultilingualString `json:"title"`
	Slug string `json:"slug"`
	Description MultilingualString `json:"description"`
	Sections []FormSection `json:"sections"`
	SubmitButtonText MultilingualString `json:"submitButtonText"`
	FormType string `json:"formType"`
	Notification FormNotification `json:"notification"`
	Captcha map[string]any `json:"captcha"`
	Relation map[string]any `json:"relation"`
	RelationDetails map[string]any `json:"relationDetails"`
	CreatedBy string `json:"createdBy"`
	IsActive bool `json:"isActive"`
	IsDeleted bool `json:"isDeleted"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type FormListItem struct {
	// List wrapper: the payload is reached through the key the server
	// sent it under.
	Extra map[string]any `json:"-"`
}

type FormSubmission struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	FormID string `json:"formId"`
	Language string `json:"language"`
	Values map[string]any `json:"values"`
	Relations []map[string]any `json:"relations"`
	Status float64 `json:"status"`
	SubmittedAt string `json:"submittedAt"`
	IsDeleted bool `json:"isDeleted"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type FormSubmissionSummary struct {
	ID string `json:"_id"`
	FormID string `json:"formId"`
	Language string `json:"language"`
	Values map[string]any `json:"values"`
	Status float64 `json:"status"`
	SubmittedAt string `json:"submittedAt"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type FormSubmissionEnriched struct {
	// List wrapper: the payload is reached through the key the server
	// sent it under.
	Extra map[string]any `json:"-"`
}

type CaptchaConfig struct {
	TenantID string `json:"tenantId"`
	Provider string `json:"provider"`
	SiteKey *string `json:"siteKey"`
	IsActive bool `json:"isActive"`
	HasSecretKey bool `json:"hasSecretKey"`
	SecretKeyMasked *string `json:"secretKeyMasked"`
	UpdatedBy *string `json:"updatedBy"`
	UpdatedAt string `json:"updatedAt"`
}

type RepurposedOutput struct {
	Title string `json:"title"`
	Summary string `json:"summary"`
	Content string `json:"content"`
	Hashtags []string `json:"hashtags"`
	Cta string `json:"cta"`
}

type NewsletterOutput struct {
	Subject string `json:"subject"`
	Preheader string `json:"preheader"`
	Body string `json:"body"`
	Cta string `json:"cta"`
}

type XThreadOutput struct {
	Posts []string `json:"posts"`
}

type VideoScene struct {
	Title string `json:"title"`
	DurationSec float64 `json:"durationSec"`
	Narration string `json:"narration"`
	BRoll string `json:"bRoll"`
}

type VideoScriptOutput struct {
	Hook string `json:"hook"`
	Scenes []VideoScene `json:"scenes"`
	Outro string `json:"outro"`
	TotalSec float64 `json:"totalSec"`
}

type FaqChannelOutput struct {
	Items []map[string]any `json:"items"`
}

type PressReleaseOutput struct {
	Headline string `json:"headline"`
	Dateline string `json:"dateline"`
	Lede string `json:"lede"`
	Body []string `json:"body"`
	Boilerplate string `json:"boilerplate"`
}

type ContentBlockFaqItem struct {
	Question string `json:"question"`
	Answer string `json:"answer"`
}

type ContentBlockTakeaway struct {
	Label string `json:"label"`
	Text string `json:"text"`
}

type ArticleContentBlocks struct {
	Faq map[string][]ContentBlockFaqItem `json:"faq"`
	Tldr map[string]string `json:"tldr"`
	KeyTakeaways map[string][]ContentBlockTakeaway `json:"keyTakeaways"`
}

type ArticleDerivedContent struct {
	Channel string `json:"channel"`
	Language *string `json:"language"`
	Title string `json:"title"`
	Payload string `json:"payload"`
	AIGenerationID *string `json:"aiGenerationId"`
	ScheduledItemID *string `json:"scheduledItemId"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type RepurposeChannels struct {
	Newsletter NewsletterOutput `json:"newsletter"`
	XThread XThreadOutput `json:"xThread"`
	VideoScript VideoScriptOutput `json:"videoScript"`
	Faq FaqChannelOutput `json:"faq"`
	PressRelease PressReleaseOutput `json:"pressRelease"`
}

type ChannelNote struct {
	Channel string `json:"channel"`
	Notes []string `json:"notes"`
}

type RepurposeResult struct {
	ArticleID *string `json:"articleId"`
	Platforms map[string]RepurposedOutput `json:"platforms"`
	Channels RepurposeChannels `json:"channels"`
	ChannelNotes []ChannelNote `json:"channelNotes"`
	DerivedContentIds []string `json:"derivedContentIds"`
	AIGenerationID string `json:"aiGenerationId"`
	Tokens Tokens `json:"tokens"`
}

type AIStreamEvent struct {
	Event string `json:"event"`
	Data map[string]any `json:"data"`
}

type AIConversationContinue struct {
	ConversationID string `json:"conversationId"`
	Stage string `json:"stage"`
	Requirements AIConversationRequirements `json:"requirements"`
	Message string `json:"message"`
}

type AIConversationRegenerate struct {
	ConversationID string `json:"conversationId"`
	Article AIConversationArticle `json:"article"`
	SEOScore float64 `json:"seoScore"`
	Status string `json:"status"`
	Issues []string `json:"issues"`
	Attempts float64 `json:"attempts"`
	MaxAttempts float64 `json:"maxAttempts"`
}

type ArticleList struct {
	ArticleListItem []ArticleListItem `json:"articleListItem"`
	Pagination Pagination `json:"pagination"`
}

type AuthorList struct {
	Author []Author `json:"author"`
	Pagination Pagination `json:"pagination"`
}

type CategoryList struct {
	Category []Category `json:"category"`
	Pagination Pagination `json:"pagination"`
}

type SubCategoryList struct {
	SubCategory []SubCategory `json:"subCategory"`
	Pagination Pagination `json:"pagination"`
}

type TagList struct {
	Tag []Tag `json:"tag"`
	Pagination Pagination `json:"pagination"`
}

type LanguageList struct {
	Language []Language `json:"language"`
	Pagination Pagination `json:"pagination"`
}

type FormList struct {
	FormListItem []FormListItem `json:"formListItem"`
	Pagination Pagination `json:"pagination"`
}

type FormSubmissionList struct {
	FormSubmission []FormSubmission `json:"formSubmission"`
	Pagination Pagination `json:"pagination"`
}

type ArticleWrapper struct {
	Article Article `json:"article"`
}

type AuthorWrapper struct {
	Author Author `json:"author"`
}

type CategoryWrapper struct {
	Category Category `json:"category"`
}

type SubCategoryWrapper struct {
	SubCategory SubCategory `json:"subCategory"`
}

type TagWrapper struct {
	Tag Tag `json:"tag"`
}

type LanguageWrapper struct {
	Language Language `json:"language"`
}

type FormWrapper struct {
	Form Form `json:"form"`
}

type FormNullableWrapper struct {
	Form *Form `json:"form"`
}

type NextFormWrapper struct {
	NextForm *Form `json:"nextForm"`
}

type SubmissionWrapper struct {
	Submission FormSubmissionEnriched `json:"submission"`
}

type SubmissionRawWrapper struct {
	Submission FormSubmission `json:"submission"`
}

type CaptchaConfigWrapper struct {
	Config *CaptchaConfig `json:"config"`
}

type FormSubmissionRelations struct {
	SubmissionID string `json:"submissionId"`
	RelatedEntries []map[string]any `json:"relatedEntries"`
	ReverseRelations []map[string]any `json:"reverseRelations"`
}

type FormRelationsBackfill struct {
	UpdatedCount float64 `json:"updatedCount"`
	ScopedFormID *string `json:"scopedFormId"`
}

type ReportRange struct {
	From *string `json:"from"`
	To *string `json:"to"`
}

type ReportCategoryRow struct {
	CategoryID *string `json:"categoryId"`
	Slug string `json:"slug"`
	Name string `json:"name"`
	ArticleCount float64 `json:"articleCount"`
	Views float64 `json:"views"`
}

type ReportAuthorRow struct {
	AuthorID *string `json:"authorId"`
	Slug string `json:"slug"`
	Name string `json:"name"`
	ArticleCount float64 `json:"articleCount"`
	Views float64 `json:"views"`
}

type ContentOverviewReport struct {
	Range ReportRange `json:"range"`
	Totals map[string]any `json:"totals"`
	BySource []ReportSourceRow `json:"bySource"`
	DailyTrend []ReportArticleDailyRow `json:"dailyTrend"`
	TopCategories []ReportCategoryRow `json:"topCategories"`
	TopAuthors []ReportAuthorRow `json:"topAuthors"`
}

type ReportSourceRow struct {
	Source string `json:"source"`
	Count float64 `json:"count"`
	Views float64 `json:"views"`
}

type ReportArticleDailyRow struct {
	Date string `json:"date"`
	CreatedArticles float64 `json:"createdArticles"`
	PublishedArticles float64 `json:"publishedArticles"`
}

type ReportArticleRow struct {
	ArticleID string `json:"articleId"`
	Slug string `json:"slug"`
	MainTitle MultilingualStringOrNull `json:"mainTitle"`
	IsPublished bool `json:"isPublished"`
	PublishDate *string `json:"publishDate"`
	CreatedAt string `json:"createdAt"`
	Views float64 `json:"views"`
	Likes float64 `json:"likes"`
	Dislikes float64 `json:"dislikes"`
	Shares float64 `json:"shares"`
	CommentsCount float64 `json:"commentsCount"`
	EngagementScore float64 `json:"engagementScore"`
	EngagementRate float64 `json:"engagementRate"`
	ContentSource string `json:"contentSource"`
	CategoryIds []string `json:"categoryIds"`
	Author *ReportAuthorBrief `json:"author"`
}

type ReportAuthorBrief struct {
	AuthorID string `json:"authorId"`
	Slug string `json:"slug"`
	Name MultilingualStringOrNull `json:"name"`
}

type TopArticlesReport struct {
	Metric string `json:"metric"`
	Limit float64 `json:"limit"`
	Items []ReportArticleRow `json:"items"`
}

type AiUsageBreakdownReport struct {
	Totals map[string]any `json:"totals"`
	ByOperation []ReportAiOperationRow `json:"byOperation"`
	DailyTrend []ReportAiDailyRow `json:"dailyTrend"`
	RecentErrors []ReportAiErrorRow `json:"recentErrors"`
}

type ReportAiOperationRow struct {
	OperationType string `json:"operationType"`
	Requests float64 `json:"requests"`
	Success float64 `json:"success"`
	Error float64 `json:"error"`
	TokensTotal float64 `json:"tokensTotal"`
}

type ReportAiDailyRow struct {
	Date string `json:"date"`
	Requests float64 `json:"requests"`
	Success float64 `json:"success"`
	Error float64 `json:"error"`
	TokensTotal float64 `json:"tokensTotal"`
}

type ReportAiErrorRow struct {
	OperationType string `json:"operationType"`
	ErrorMessage string `json:"errorMessage"`
	CreatedAt string `json:"createdAt"`
}

type FormsOverviewReport struct {
	Totals map[string]any `json:"totals"`
	ByStatus []ReportStatusRow `json:"byStatus"`
	ByLanguage []ReportLanguageRow `json:"byLanguage"`
	DailyTrend []ReportSubmissionDailyRow `json:"dailyTrend"`
}

type ReportStatusRow struct {
	Status float64 `json:"status"`
	StatusLabel string `json:"statusLabel"`
	Count float64 `json:"count"`
}

type ReportLanguageRow struct {
	Language string `json:"language"`
	Count float64 `json:"count"`
}

type ReportSubmissionDailyRow struct {
	Date string `json:"date"`
	Submissions float64 `json:"submissions"`
}

type SubmissionsOverviewReport struct {
	Totals map[string]any `json:"totals"`
	ByStatus []ReportStatusRow `json:"byStatus"`
	ByLanguage []ReportLanguageRow `json:"byLanguage"`
	DailyTrend []ReportSubmissionDailyRow `json:"dailyTrend"`
	TopForms []ReportTopFormRow `json:"topForms"`
}

type ReportTopFormRow struct {
	FormID string `json:"formId"`
	Slug string `json:"slug"`
	Title MultilingualString `json:"title"`
	Submissions float64 `json:"submissions"`
	LastSubmissionAt *string `json:"lastSubmissionAt"`
}

type ReportSeries struct {
	Name string `json:"name"`
	Data []float64 `json:"data"`
}

type ReportGroupBy struct {
	// List wrapper: the payload is reached through the key the server
	// sent it under.
	Extra map[string]any `json:"-"`
}

type ContentTrendReport struct {
	GroupBy ReportGroupBy `json:"groupBy"`
	Labels []string `json:"labels"`
	Series []ReportSeries `json:"series"`
	Points []ReportContentTrendPoint `json:"points"`
}

type ReportContentTrendPoint struct {
	Label string `json:"label"`
	CreatedArticles float64 `json:"createdArticles"`
	PublishedArticles float64 `json:"publishedArticles"`
	Views float64 `json:"views"`
	Likes float64 `json:"likes"`
	Shares float64 `json:"shares"`
	Comments float64 `json:"comments"`
}

type SubmissionFunnelReport struct {
	Labels []string `json:"labels"`
	Series []ReportSeries `json:"series"`
	Stages []ReportFunnelStage `json:"stages"`
	Total float64 `json:"total"`
}

type ReportFunnelStage struct {
	Status float64 `json:"status"`
	Label string `json:"label"`
	Count float64 `json:"count"`
	Rate float64 `json:"rate"`
}

type EngagementTrendReport struct {
	GroupBy ReportGroupBy `json:"groupBy"`
	Labels []string `json:"labels"`
	Series []ReportSeries `json:"series"`
	Points []ReportEngagementPoint `json:"points"`
}

type ReportEngagementPoint struct {
	Label string `json:"label"`
	Views float64 `json:"views"`
	Likes float64 `json:"likes"`
	Shares float64 `json:"shares"`
	Comments float64 `json:"comments"`
	EngagementScore float64 `json:"engagementScore"`
	EngagementRate float64 `json:"engagementRate"`
}

type PublishingPerformanceReport struct {
	Range ReportRange `json:"range"`
	Totals map[string]any `json:"totals"`
	PublishLagBuckets []ReportLagBucket `json:"publishLagBuckets"`
	PublishWeekday []ReportWeekdayRow `json:"publishWeekday"`
	RecentDrafts []ReportDraftRow `json:"recentDrafts"`
}

type ReportLagBucket struct {
	Bucket string `json:"bucket"`
	Count float64 `json:"count"`
}

type ReportWeekdayRow struct {
	DayOfWeek float64 `json:"dayOfWeek"`
	Label string `json:"label"`
	Count float64 `json:"count"`
}

type ReportDraftRow struct {
	ArticleID string `json:"articleId"`
	Slug string `json:"slug"`
	MainTitle MultilingualStringOrNull `json:"mainTitle"`
	CreatedAt string `json:"createdAt"`
	Views float64 `json:"views"`
	AgeDays float64 `json:"ageDays"`
	AuthorID *string `json:"authorId"`
}

type ContentHealthReport struct {
	Range ReportRange `json:"range"`
	Totals map[string]any `json:"totals"`
	QualityBuckets []ReportQualityBucket `json:"qualityBuckets"`
	WeakestArticles []ReportWeakArticleRow `json:"weakestArticles"`
}

type ReportQualityBucket struct {
	Score string `json:"score"`
	Label string `json:"label"`
	Count float64 `json:"count"`
}

type ReportWeakArticleRow struct {
	ArticleID string `json:"articleId"`
	Slug string `json:"slug"`
	MainTitle MultilingualStringOrNull `json:"mainTitle"`
	CreatedAt string `json:"createdAt"`
	IsPublished bool `json:"isPublished"`
	QualityScore float64 `json:"qualityScore"`
	EngagementScore float64 `json:"engagementScore"`
	Views float64 `json:"views"`
	Comments float64 `json:"comments"`
}

type CategoryPerformanceReport struct {
	Range ReportRange `json:"range"`
	Totals map[string]any `json:"totals"`
	Items []ReportCategoryPerformanceRow `json:"items"`
}

type ReportCategoryPerformanceRow struct {
	CategoryID *string `json:"categoryId"`
	Slug string `json:"slug"`
	Name MultilingualStringOrNull `json:"name"`
	ArticleCount float64 `json:"articleCount"`
	PublishedArticles float64 `json:"publishedArticles"`
	TotalViews float64 `json:"totalViews"`
	TotalLikes float64 `json:"totalLikes"`
	TotalShares float64 `json:"totalShares"`
	TotalComments float64 `json:"totalComments"`
	EngagementScore float64 `json:"engagementScore"`
	AvgViewsPerArticle float64 `json:"avgViewsPerArticle"`
	LatestArticleAt *string `json:"latestArticleAt"`
	ShareOfContent float64 `json:"shareOfContent"`
}

type PeriodComparisonReport struct {
	CurrentRange ReportRange `json:"currentRange"`
	PreviousRange ReportRange `json:"previousRange"`
	Metrics []ReportMetricDelta `json:"metrics"`
}

type ReportMetricDelta struct {
	Label string `json:"label"`
	Current float64 `json:"current"`
	Previous float64 `json:"previous"`
	Delta float64 `json:"delta"`
	DeltaPercent *float64 `json:"deltaPercent"`
}

type AiContentImpactReport struct {
	Range ReportRange `json:"range"`
	BySource []ReportAiSourceImpactRow `json:"bySource"`
	TopAiContent []ReportAiContentRow `json:"topAiContent"`
}

type ReportAiSourceImpactRow struct {
	Source string `json:"source"`
	Articles float64 `json:"articles"`
	PublishedArticles float64 `json:"publishedArticles"`
	Views float64 `json:"views"`
	Likes float64 `json:"likes"`
	Shares float64 `json:"shares"`
	Comments float64 `json:"comments"`
	EngagementScore float64 `json:"engagementScore"`
	PublishRate float64 `json:"publishRate"`
	AvgViewsPerArticle float64 `json:"avgViewsPerArticle"`
}

type ReportAiContentRow struct {
	ArticleID string `json:"articleId"`
	Slug string `json:"slug"`
	MainTitle MultilingualStringOrNull `json:"mainTitle"`
	ContentSource string `json:"contentSource"`
	IsPublished bool `json:"isPublished"`
	Views float64 `json:"views"`
	Likes float64 `json:"likes"`
	Shares float64 `json:"shares"`
	CommentsCount float64 `json:"commentsCount"`
	EngagementScore float64 `json:"engagementScore"`
	CreatedAt string `json:"createdAt"`
}

type CommentOverviewReport struct {
	Range ReportRange `json:"range"`
	Totals map[string]any `json:"totals"`
	ByStatus []ReportCommentStatusRow `json:"byStatus"`
	ByActorType []ReportActorTypeRow `json:"byActorType"`
	DailyTrend []ReportCommentDailyRow `json:"dailyTrend"`
	TopDiscussedArticles []ReportDiscussedArticleRow `json:"topDiscussedArticles"`
}

type ReportCommentStatusRow struct {
	Status float64 `json:"status"`
	Count float64 `json:"count"`
}

type ReportActorTypeRow struct {
	ActorType string `json:"actorType"`
	Count float64 `json:"count"`
}

type ReportCommentDailyRow struct {
	Date string `json:"date"`
	Comments float64 `json:"comments"`
}

type ReportDiscussedArticleRow struct {
	ArticleID string `json:"articleId"`
	Slug string `json:"slug"`
	MainTitle MultilingualStringOrNull `json:"mainTitle"`
	Comments float64 `json:"comments"`
	Likes float64 `json:"likes"`
	Dislikes float64 `json:"dislikes"`
	LastCommentAt *string `json:"lastCommentAt"`
}

type Comment struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	ArticleID string `json:"articleId"`
	ActorType string `json:"actorType"`
	UserID *string `json:"userId"`
	ParentID *string `json:"parentId"`
	Content string `json:"content"`
	Likes float64 `json:"likes"`
	Dislikes float64 `json:"dislikes"`
	Status string `json:"status"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type CommentWrapper struct {
	Comment Comment `json:"comment"`
}

type CommentListWrapper struct {
	Comments []Comment `json:"comments"`
	Pagination Pagination `json:"pagination"`
}

type ArticleReactionTotals struct {
	ArticleID string `json:"articleId"`
	Reaction string `json:"reaction"`
	Likes float64 `json:"likes"`
	Dislikes float64 `json:"dislikes"`
}

type ArticleReactionSummary struct {
	ArticleID string `json:"articleId"`
	Likes float64 `json:"likes"`
	Dislikes float64 `json:"dislikes"`
	UserReaction *string `json:"userReaction"`
}

type CommentReactionTotals struct {
	CommentID string `json:"commentId"`
	Reaction string `json:"reaction"`
	Likes float64 `json:"likes"`
	Dislikes float64 `json:"dislikes"`
}

type CommentReactionSummary struct {
	CommentID string `json:"commentId"`
	Likes float64 `json:"likes"`
	Dislikes float64 `json:"dislikes"`
	UserReaction *string `json:"userReaction"`
}

type EngagementSettings struct {
	TenantID string `json:"tenantId"`
	CommentsEnabled bool `json:"commentsEnabled"`
	ReactionsEnabled bool `json:"reactionsEnabled"`
	AllowGuestComments bool `json:"allowGuestComments"`
	AllowGuestReactions bool `json:"allowGuestReactions"`
	AutoApproveComments bool `json:"autoApproveComments"`
	RequireCaptchaForGuestEngagement bool `json:"requireCaptchaForGuestEngagement"`
	GuestEngagementCaptchaMinScore float64 `json:"guestEngagementCaptchaMinScore"`
	GuestEngagementRateLimitPerMin float64 `json:"guestEngagementRateLimitPerMin"`
	UpdatedBy *string `json:"updatedBy"`
	UpdatedAt string `json:"updatedAt"`
}

type CategoryDeleteResult struct {
	Category Category `json:"category"`
	SubCategoriesAffected float64 `json:"subCategoriesAffected"`
}

type TagSearchResult struct {
	Tags []Tag `json:"tags"`
}

type SeoAnalysis struct {
	Score float64 `json:"score"`
	PotentialScore float64 `json:"potentialScore"`
	Scores map[string]any `json:"scores"`
	Stats map[string]any `json:"stats"`
	TopKeywords []map[string]any `json:"topKeywords"`
	AllKeywords []map[string]any `json:"allKeywords"`
	Issues map[string]any `json:"issues"`
	Checks map[string]any `json:"checks"`
}

// Keyed by language code, or by whatever key the endpoint supplies.
type SeoAnalysisPerLanguage map[string]SeoAnalysis

type SeoAnalysisResult struct {
	ArticleID string `json:"articleId"`
	Slug string `json:"slug"`
	Language string `json:"language"`
	SEO any `json:"seo"`
}

type TenantUsageStats struct {
	Admins float64 `json:"admins"`
	ApiKeys float64 `json:"apiKeys"`
	Categories float64 `json:"categories"`
	SubCategories float64 `json:"subCategories"`
	Articles float64 `json:"articles"`
	Forms float64 `json:"forms"`
	Submissions float64 `json:"submissions"`
	Languages float64 `json:"languages"`
	AITokens float64 `json:"ai_tokens"`
	S3 float64 `json:"s3"`
	Limits map[string]float64 `json:"limits"`
}

type UserStats struct {
	UserID string `json:"userId"`
	TenantID string `json:"tenantId"`
	Articles float64 `json:"articles"`
	Categories float64 `json:"categories"`
	SubCategories float64 `json:"subCategories"`
	Forms float64 `json:"forms"`
	Languages float64 `json:"languages"`
	PublishedArticles float64 `json:"publishedArticles"`
	LastArticleAt *string `json:"lastArticleAt"`
	Likes float64 `json:"likes"`
	Dislikes float64 `json:"dislikes"`
	Views float64 `json:"views"`
	Shares float64 `json:"shares"`
	Comments float64 `json:"comments"`
	EngagementScore float64 `json:"engagementScore"`
	EngagementRate float64 `json:"engagementRate"`
}

type AuthorStats struct {
	AuthorID string `json:"authorId"`
	TenantID string `json:"tenantId"`
	Articles float64 `json:"articles"`
	PublishedArticles float64 `json:"publishedArticles"`
	LastArticleAt *string `json:"lastArticleAt"`
	Likes float64 `json:"likes"`
	Dislikes float64 `json:"dislikes"`
	Views float64 `json:"views"`
	Shares float64 `json:"shares"`
	Comments float64 `json:"comments"`
	EngagementScore float64 `json:"engagementScore"`
	EngagementRate float64 `json:"engagementRate"`
}

type UsersStatsPage struct {
	Items []UserStats `json:"items"`
	Pagination Pagination `json:"pagination"`
}

type AuthorsStatsPage struct {
	Items []AuthorStats `json:"items"`
	Pagination Pagination `json:"pagination"`
}

type DashboardSlot struct {
	ID string `json:"id"`
	Type string `json:"type"`
	Enabled bool `json:"enabled"`
	Span string `json:"span"`
	Settings map[string]any `json:"settings"`
}

type DashboardConfig struct {
	Version float64 `json:"version"`
	TemplateID string `json:"templateId"`
	Slots []DashboardSlot `json:"slots"`
}

type DashboardConfigWrapper struct {
	DashboardConfig DashboardConfig `json:"dashboardConfig"`
}

type AiSummaryResult struct {
	Summary string `json:"summary"`
	Tokens Tokens `json:"tokens"`
}

type AiTitleResult struct {
	Title string `json:"title"`
	Tokens Tokens `json:"tokens"`
}

type AiTranslateResult struct {
	Content string `json:"content"`
	Tokens Tokens `json:"tokens"`
}

type AiSeoResult struct {
	ContentHtml string `json:"contentHtml"`
	MetaDescription string `json:"metaDescription"`
	AISeoScore float64 `json:"aiSeoScore"`
	SuggestedKeywords []string `json:"suggestedKeywords"`
	Tokens Tokens `json:"tokens"`
}

type AiContentResult struct {
	Title string `json:"title"`
	Slug string `json:"slug"`
	Summary string `json:"summary"`
	Body string `json:"body"`
	AIGenerationID string `json:"aiGenerationId"`
	Tokens Tokens `json:"tokens"`
}

type AiImageResult struct {
	ImageURL string `json:"imageUrl"`
	ImageBase64 string `json:"imageBase64"`
	ImageMimeType string `json:"imageMimeType"`
	ArticleID *string `json:"articleId"`
	Tokens TokensUsedOnly `json:"tokens"`
}

type AiArticlePatch struct {
	Title string `json:"title"`
	Summary string `json:"summary"`
	ContentHtml string `json:"contentHtml"`
	Tags []string `json:"tags"`
}

type AiArticleSeoResult struct {
	ArticleID string `json:"articleId"`
	Patched map[string]AiArticlePatch `json:"patched"`
	SEO map[string]SeoAnalysis `json:"seo"`
	Saved bool `json:"saved"`
}

type AiArticleTranslation struct {
	MainTitle string `json:"mainTitle"`
	Title2 string `json:"title2"`
	Title3 string `json:"title3"`
	Summary string `json:"summary"`
	Content string `json:"content"`
	Tags []string `json:"tags"`
	BlocksTotal float64 `json:"blocksTotal"`
	BlocksTranslated float64 `json:"blocksTranslated"`
	BlockHashes map[string]string `json:"blockHashes"`
}

type AiArticleTranslateResult struct {
	ArticleID string `json:"articleId"`
	SourceLanguage string `json:"sourceLanguage"`
	TargetLanguages []string `json:"targetLanguages"`
	Translations map[string]AiArticleTranslation `json:"translations"`
}

type AiFormFieldTranslation struct {
	Label string `json:"label"`
	Placeholder string `json:"placeholder"`
	Options []map[string]any `json:"options"`
}

type AiFormSectionTranslation struct {
	Title string `json:"title"`
	Description string `json:"description"`
	SubmitButtonText string `json:"submitButtonText"`
	SectionTitles []string `json:"sectionTitles"`
	SectionDescriptions []string `json:"sectionDescriptions"`
	FieldLabels []string `json:"fieldLabels"`
	FieldPlaceholders []string `json:"fieldPlaceholders"`
	Fields []AiFormFieldTranslation `json:"fields"`
}

type AiFormTranslateResult struct {
	FormID string `json:"formId"`
	SourceLanguage string `json:"sourceLanguage"`
	TargetLanguages []string `json:"targetLanguages"`
	Translations map[string]AiFormSectionTranslation `json:"translations"`
}

type SocialTemplateDefaults struct {
	Language string `json:"language"`
	Tone string `json:"tone"`
	Length string `json:"length"`
}

type SocialPlatformTemplate struct {
	Tone string `json:"tone"`
	Length string `json:"length"`
	CtaTemplate string `json:"ctaTemplate"`
	HashtagStyle string `json:"hashtagStyle"`
	MaxHashtags float64 `json:"maxHashtags"`
}

type SocialTemplate struct {
	Defaults SocialTemplateDefaults `json:"defaults"`
	Platforms map[string]any `json:"platforms"`
}

type SocialConnection struct {
	TenantID string `json:"tenantId"`
	Provider string `json:"provider"`
	IsActive bool `json:"isActive"`
	Config map[string]string `json:"config"`
	UpdatedBy *string `json:"updatedBy"`
	UpdatedAt string `json:"updatedAt"`
}

type SocialConnectionList struct {
	Connections []SocialConnection `json:"connections"`
}

type SocialPublishResult struct {
	Provider string `json:"provider"`
	PostID *string `json:"postId"`
	MessageID *float64 `json:"messageId"`
	TweetID *string `json:"tweetId"`
	ChatID *string `json:"chatId"`
	Status float64 `json:"status"`
}

type ConversationStart struct {
	ConversationID string `json:"conversationId"`
	Stage string `json:"stage"`
	Questions []string `json:"questions"`
	ExpiresAt string `json:"expiresAt"`
}

type ConversationGenerate struct {
	ConversationID string `json:"conversationId"`
	Article AIConversationArticle `json:"article"`
	SEOScore float64 `json:"seoScore"`
	Issues []string `json:"issues"`
	Attempts float64 `json:"attempts"`
	MaxAttempts float64 `json:"maxAttempts"`
	Status string `json:"status"`
	Message string `json:"message"`
}

type NeedsAttentionItem struct {
	Code string `json:"code"`
	Severity string `json:"severity"`
	EntityType string `json:"entityType"`
	EntityID *string `json:"entityId"`
	ArticleID *string `json:"articleId"`
	Message string `json:"message"`
	Count *float64 `json:"count"`
	Locale *string `json:"locale"`
	FixAction *string `json:"fixAction"`
}

type NeedsAttentionReport struct {
	GeneratedAt string `json:"generatedAt"`
	Items []NeedsAttentionItem `json:"items"`
}

type SubmissionAnalysis struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	SubmissionID string `json:"submissionId"`
	FormID string `json:"formId"`
	Summary string `json:"summary"`
	Category string `json:"category"`
	Priority string `json:"priority"`
	Sentiment string `json:"sentiment"`
	Language string `json:"language"`
	SpamScore float64 `json:"spamScore"`
	Entities map[string]any `json:"entities"`
	Topics []string `json:"topics"`
	Provider *string `json:"provider"`
	ProviderModel *string `json:"providerModel"`
	PromptVersion *string `json:"promptVersion"`
	Source string `json:"source"`
	AnalyzedAt string `json:"analyzedAt"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type SubmissionActivity struct {
	ID string `json:"_id"`
	Type string `json:"type"`
	ActorID *string `json:"actorId"`
	ActorType string `json:"actorType"`
	Payload map[string]any `json:"payload"`
	CreatedAt string `json:"createdAt"`
}

type SubmissionReply struct {
	ID string `json:"_id"`
	SubmissionID string `json:"submissionId"`
	Channel string `json:"channel"`
	Locale string `json:"locale"`
	Subject string `json:"subject"`
	Body string `json:"body"`
	Status string `json:"status"`
	To *string `json:"to"`
	TemplateKey *string `json:"templateKey"`
	DraftSource string `json:"draftSource"`
	SentAt *string `json:"sentAt"`
	Error *string `json:"error"`
	CreatedAt string `json:"createdAt"`
}

type SubmissionAnalysisWrapper struct {
	Analysis SubmissionAnalysis `json:"analysis"`
}

type SubmissionAnalysisResult struct {
	Analysis SubmissionAnalysis `json:"analysis"`
	SpamApplied bool `json:"spamApplied"`
}

type SubmissionBulkAnalysis struct {
	Results []map[string]any `json:"results"`
	Summary map[string]any `json:"summary"`
}

type SubmissionActivityList struct {
	Activity []SubmissionActivity `json:"activity"`
	Replies []SubmissionReply `json:"replies"`
}

type SubmissionReplyWrapper struct {
	Reply SubmissionReply `json:"reply"`
}

type SubmissionActivityWrapper struct {
	Activity SubmissionActivity `json:"activity"`
}

type SubmissionInboxFacets struct {
	Status map[string]float64 `json:"status"`
	Category map[string]float64 `json:"category"`
	Priority map[string]float64 `json:"priority"`
	Assignee []map[string]any `json:"assignee"`
}

type SubmissionDetailWrapper struct {
	Submission FormSubmissionEnriched `json:"submission"`
	Activity []SubmissionActivity `json:"activity"`
	Replies []SubmissionReply `json:"replies"`
}

type SubmissionDigestAggregates struct {
	From string `json:"from"`
	To string `json:"to"`
	Total float64 `json:"total"`
	PreviousTotal float64 `json:"previousTotal"`
	ByCategory map[string]float64 `json:"byCategory"`
	ByPriority map[string]float64 `json:"byPriority"`
	ByStatus map[string]float64 `json:"byStatus"`
	ByLanguage map[string]float64 `json:"byLanguage"`
	ByForm []map[string]any `json:"byForm"`
	UrgentCount float64 `json:"urgentCount"`
	SpamCount float64 `json:"spamCount"`
	Topics []map[string]any `json:"topics"`
}

type SubmissionDigest struct {
	Aggregates SubmissionDigestAggregates `json:"aggregates"`
	Headline string `json:"headline"`
	Summary string `json:"summary"`
	Topics []map[string]any `json:"topics"`
	Actions []map[string]any `json:"actions"`
}

type SubmissionDigestWrapper struct {
	Digest SubmissionDigest `json:"digest"`
}

type FormDraftField struct {
	Name string `json:"name"`
	Type string `json:"type"`
	Label MultilingualString `json:"label"`
	Placeholder MultilingualString `json:"placeholder"`
	Required bool `json:"required"`
	ColSpan float64 `json:"colSpan"`
	Options []map[string]any `json:"options"`
	Validation map[string]any `json:"validation"`
}

type FormDraft struct {
	Title MultilingualString `json:"title"`
	Slug string `json:"slug"`
	Description MultilingualString `json:"description"`
	SubmitButtonText MultilingualString `json:"submitButtonText"`
	FormType string `json:"formType"`
	Sections []map[string]any `json:"sections"`
	Captcha map[string]any `json:"captcha"`
	FieldCount float64 `json:"fieldCount"`
	Truncated bool `json:"truncated"`
}

type FormDraftWrapper struct {
	Draft FormDraft `json:"draft"`
}

type FormImproveSuggestion struct {
	FieldName string `json:"fieldName"`
	Kind string `json:"kind"`
	Current string `json:"current"`
	Proposed string `json:"proposed"`
	Reason string `json:"reason"`
}

type FormImproveWrapper struct {
	FormID string `json:"formId"`
	Summary string `json:"summary"`
	Suggestions []FormImproveSuggestion `json:"suggestions"`
	Reorder []string `json:"reorder"`
}

type CommentModeration struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	CommentID string `json:"commentId"`
	ArticleID string `json:"articleId"`
	Toxicity float64 `json:"toxicity"`
	SpamScore float64 `json:"spamScore"`
	Sentiment string `json:"sentiment"`
	Language string `json:"language"`
	Decision string `json:"decision"`
	Reasons []string `json:"reasons"`
	SuggestedReply *map[string]any `json:"suggestedReply"`
	AutoApplied bool `json:"autoApplied"`
	Provider *string `json:"provider"`
	ProviderModel *string `json:"providerModel"`
	PromptVersion *string `json:"promptVersion"`
	AnalyzedAt string `json:"analyzedAt"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type CommentModerationSummary struct {
	ID string `json:"_id"`
	Toxicity float64 `json:"toxicity"`
	SpamScore float64 `json:"spamScore"`
	Sentiment string `json:"sentiment"`
	Language string `json:"language"`
	Decision string `json:"decision"`
	Reasons []string `json:"reasons"`
	AutoApplied bool `json:"autoApplied"`
	AnalyzedAt string `json:"analyzedAt"`
}

type ModerationResultWrapper struct {
	Moderation CommentModeration `json:"moderation"`
	NextStatus *string `json:"nextStatus"`
}

type CommentReplyDraft struct {
	Body string `json:"body"`
	Locale string `json:"locale"`
}

type CommentReplyDraftWrapper struct {
	Reply CommentReplyDraft `json:"reply"`
}

type MinedQuestionIdea struct {
	Topic string `json:"topic"`
	Angle string `json:"angle"`
	QuestionCount float64 `json:"questionCount"`
	ExampleQuestionIds []string `json:"exampleQuestionIds"`
	PrimaryKeyword string `json:"primaryKeyword"`
	FunnelStage string `json:"funnelStage"`
}

type MinedQuestionsWrapper struct {
	IDeas []MinedQuestionIdea `json:"ideas"`
}

type EffectiveModerationPolicy struct {
	Mode string `json:"mode"`
	MaxToxicity float64 `json:"maxToxicity"`
	MaxSpamScore float64 `json:"maxSpamScore"`
	AutoRejectSpamScore float64 `json:"autoRejectSpamScore"`
	MaxLinks float64 `json:"maxLinks"`
	BlockedTerms []string `json:"blockedTerms"`
	Reasons []string `json:"reasons"`
}

type EffectivePolicyWrapper struct {
	Policy EffectiveModerationPolicy `json:"policy"`
	ArticleID *string `json:"articleId"`
}

type AiFeatureFlags struct {
	Copilot bool `json:"copilot"`
	Autofill bool `json:"autofill"`
	Inline bool `json:"inline"`
	Bulk bool `json:"bulk"`
	Forms bool `json:"forms"`
	Submissions bool `json:"submissions"`
	Comments bool `json:"comments"`
	Calendar bool `json:"calendar"`
	SEO bool `json:"seo"`
	BrandVoice bool `json:"brandVoice"`
	Jobs bool `json:"jobs"`
}

type AiAutoApplyPolicy struct {
	Copilot string `json:"copilot"`
	Autofill string `json:"autofill"`
	Inline string `json:"inline"`
	Bulk string `json:"bulk"`
	Forms string `json:"forms"`
	Submissions string `json:"submissions"`
	Comments string `json:"comments"`
	Calendar string `json:"calendar"`
	SEO string `json:"seo"`
	BrandVoice string `json:"brandVoice"`
	Jobs string `json:"jobs"`
}

type BrandVoiceProfile struct {
	Tone string `json:"tone"`
	Audience string `json:"audience"`
	ReadingLevel string `json:"readingLevel"`
	Do []string `json:"do"`
	Dont []string `json:"dont"`
	BannedTerms []string `json:"bannedTerms"`
	Examples []string `json:"examples"`
	PersianRegister *string `json:"persianRegister"`
	Version float64 `json:"version"`
}

type LegacyGlossaryEntry struct {
	Term string `json:"term"`
	Translation string `json:"translation"`
}

type AiSettings struct {
	BrandVoice *string `json:"brandVoice"`
	Glossary []LegacyGlossaryEntry `json:"glossary"`
	BrandVoiceVersion string `json:"brandVoiceVersion"`
	AutoApply bool `json:"autoApply"`
	DefaultTier *string `json:"defaultTier"`
	FeatureFlags AiFeatureFlags `json:"featureFlags"`
	AutoApplyPolicy AiAutoApplyPolicy `json:"autoApplyPolicy"`
	DailyQuotaPerUser *float64 `json:"dailyQuotaPerUser"`
	DefaultLocales []string `json:"defaultLocales"`
	PiiMasking map[string]any `json:"piiMasking"`
	RetentionDays float64 `json:"retentionDays"`
	ModelTierOverrides map[string]string `json:"modelTierOverrides"`
	BrandVoiceProfile BrandVoiceProfile `json:"brandVoiceProfile"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type BrandVoiceSettings struct {
	BrandVoice *string `json:"brandVoice"`
	Glossary []LegacyGlossaryEntry `json:"glossary"`
	BrandVoiceProfile BrandVoiceProfile `json:"brandVoiceProfile"`
	BrandVoiceVersion string `json:"brandVoiceVersion"`
}

type CreditSnapshot struct {
	Period string `json:"period"`
	Used float64 `json:"used"`
	Reserved float64 `json:"reserved"`
	Limit float64 `json:"limit"`
	Remaining float64 `json:"remaining"`
	Available float64 `json:"available"`
}

type TokenEstimate struct {
	ActionID string `json:"actionId"`
	EstimatedTokens float64 `json:"estimatedTokens"`
}

type AiRunSubmission struct {
	RunID string `json:"runId"`
	Mode string `json:"mode"`
	EstimatedTokens float64 `json:"estimatedTokens"`
}

type AiRunInsufficientCredits struct {
	Reason string `json:"reason"`
	Used float64 `json:"used"`
	Reserved float64 `json:"reserved"`
	Limit float64 `json:"limit"`
	Estimate float64 `json:"estimate"`
}

type AiRunConflict struct {
	RunID string `json:"runId"`
	Status string `json:"status"`
}

type AiRunListItem struct {
	RunID string `json:"runId"`
	ActionID string `json:"actionId"`
	Status string `json:"status"`
	Estimated float64 `json:"estimated"`
	Actual *float64 `json:"actual"`
	Reason *string `json:"reason"`
	Outcome *string `json:"outcome"`
	Meta *map[string]any `json:"meta"`
	Result *map[string]any `json:"result"`
	CreatedAt *string `json:"createdAt"`
}

type AiRunList struct {
	Runs []AiRunListItem `json:"runs"`
	Pagination Pagination `json:"pagination"`
}

type AiRunAccepted struct {
	RunID string `json:"runId"`
	Mode string `json:"mode"`
	EstimatedTokens float64 `json:"estimatedTokens"`
}

type AiProposalPatch struct {
	Path string `json:"path"`
	Lang string `json:"lang"`
	Key string `json:"key"`
	Before any `json:"before"`
	After any `json:"after"`
}

type AiProposal struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	ArticleID string `json:"articleId"`
	ActionID string `json:"actionId"`
	Status string `json:"status"`
	CreatedByUserID *string `json:"createdByUserId"`
	DecidedByUserID *string `json:"decidedByUserId"`
	Locale *string `json:"locale"`
	Patches []AiProposalPatch `json:"patches"`
	BaseHash string `json:"baseHash"`
	DecidedAt *string `json:"decidedAt"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type AiProposalCount struct {
	Count float64 `json:"count"`
}

type AiProposalDecision struct {
	Proposal AiProposal `json:"proposal"`
	AppliedPatches []AiProposalPatch `json:"appliedPatches"`
}

type AiProposalStale struct {
	Reason string `json:"reason"`
}

type AiProposalBulkResultItem struct {
	ID string `json:"id"`
	Status string `json:"status"`
	Reason string `json:"reason"`
}

type AiAutofillResult struct {
	ProposalID string `json:"proposalId"`
	Filled []string `json:"filled"`
	Skipped []string `json:"skipped"`
}

type ArticleRevisionSnapshot struct {
	MainTitle *string `json:"mainTitle"`
	Summary *string `json:"summary"`
	Content *string `json:"content"`
	Tags []string `json:"tags"`
}

type ArticleRevision struct {
	ID string `json:"_id"`
	ArticleID string `json:"articleId"`
	Locale string `json:"locale"`
	Source string `json:"source"`
	UserID *string `json:"userId"`
	AIProposalID *string `json:"aiProposalId"`
	RestoredFrom *string `json:"restoredFrom"`
	Snapshot ArticleRevisionSnapshot `json:"snapshot"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type ArticleRevisionList struct {
	Revisions []ArticleRevision `json:"revisions"`
	MaxRevisionsPerLocale float64 `json:"maxRevisionsPerLocale"`
}

type ArticleRevisionRestore struct {
	Article Article `json:"article"`
	Revision ArticleRevision `json:"revision"`
}

type ReadinessItem struct {
	ID string `json:"id"`
	Label string `json:"label"`
	State string `json:"state"`
	Locales []string `json:"locales"`
	Detail *string `json:"detail"`
}

type ArticleReadiness struct {
	ArticleID string `json:"articleId"`
	ItemType string `json:"itemType"`
	ContentSource string `json:"contentSource"`
	Items []ReadinessItem `json:"items"`
	Blockers []string `json:"blockers"`
	Warnings []string `json:"warnings"`
}

type ArticleSeoMeta struct {
	ArticleID string `json:"articleId"`
	Locale *string `json:"locale"`
	MetaTitle MultilingualStringOrNull `json:"metaTitle"`
	MetaDescription MultilingualStringOrNull `json:"metaDescription"`
	FocusKeyword MultilingualStringOrNull `json:"focusKeyword"`
	SecondaryKeywords MultilingualStringOrNull `json:"secondaryKeywords"`
	CanonicalURL MultilingualStringOrNull `json:"canonicalUrl"`
	OgTitle MultilingualStringOrNull `json:"ogTitle"`
	OgDescription MultilingualStringOrNull `json:"ogDescription"`
	SchemaJson MultilingualStringOrNull `json:"schemaJson"`
	OgImage *string `json:"ogImage"`
	Robots *string `json:"robots"`
	Slug *string `json:"slug"`
}

type TranslationStateItem struct {
	Locale string `json:"locale"`
	State string `json:"state"`
	StoredState string `json:"storedState"`
	SourceOutdated bool `json:"sourceOutdated"`
	UpdatedAt *string `json:"updatedAt"`
}

type TranslationStateReport struct {
	ArticleID string `json:"articleId"`
	SourceLocale string `json:"sourceLocale"`
	Items []TranslationStateItem `json:"items"`
}

type TranslationStateDoc struct {
	ID string `json:"_id"`
	ArticleID string `json:"articleId"`
	Locale string `json:"locale"`
	SourceLocale string `json:"sourceLocale"`
	SourceHash string `json:"sourceHash"`
	TargetHash string `json:"targetHash"`
	BlockHashes map[string]string `json:"blockHashes"`
	UpdatedByUserID *string `json:"updatedByUserId"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type AiEvent struct {
	Event string `json:"event"`
	OccurredAt string `json:"occurredAt"`
	Payload map[string]any `json:"payload"`
}

type GlossaryTerm struct {
	ID string `json:"_id"`
	Source string `json:"source"`
	SourceLocale string `json:"sourceLocale"`
	Target string `json:"target"`
	TargetLocale string `json:"targetLocale"`
	DoNotTranslate bool `json:"doNotTranslate"`
	Note *string `json:"note"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type GlossaryTermWrapper struct {
	Term GlossaryTerm `json:"term"`
}

type KnowledgeSource struct {
	ID string `json:"_id"`
	Type string `json:"type"`
	Title string `json:"title"`
	Uri *string `json:"uri"`
	Content *string `json:"content"`
	Locale *string `json:"locale"`
	Status string `json:"status"`
	Error *string `json:"error"`
	ChunkCount float64 `json:"chunkCount"`
	TokenCount float64 `json:"tokenCount"`
	IndexedAt *string `json:"indexedAt"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type KnowledgeSourceWrapper struct {
	Source KnowledgeSource `json:"source"`
}

type TaxonomyFinding struct {
	Code string `json:"code"`
	Severity string `json:"severity"`
	EntityType string `json:"entityType"`
	EntityID *string `json:"entityId"`
	EntityIds []string `json:"entityIds"`
	Names []string `json:"names"`
	Message string `json:"message"`
	FixAction string `json:"fixAction"`
}

type TaxonomyAudit struct {
	Findings []TaxonomyFinding `json:"findings"`
	Summary map[string]any `json:"summary"`
}

type TaxonomySeoEntry struct {
	MetaTitle string `json:"metaTitle"`
	MetaDescription string `json:"metaDescription"`
	FocusKeyword string `json:"focusKeyword"`
}

type CategorySeoSuggestion struct {
	EntityType string `json:"entityType"`
	EntityID string `json:"entityId"`
	SEO map[string]TaxonomySeoEntry `json:"seo"`
}

type TagSuggestion struct {
	Tag string `json:"tag"`
	IsNew bool `json:"isNew"`
	Confidence float64 `json:"confidence"`
}

type TagSuggestions struct {
	Tags []TagSuggestion `json:"tags"`
}

type TagMergeResult struct {
	From string `json:"from"`
	Into string `json:"into"`
	ArticlesUpdated float64 `json:"articlesUpdated"`
}

type TagUsageRefresh struct {
	Updated float64 `json:"updated"`
}

type AuthorBioSuggestion struct {
	AuthorID string `json:"authorId"`
	Bio map[string]string `json:"bio"`
	Expertise []string `json:"expertise"`
}

type AuthorSuggestion struct {
	AuthorID string `json:"authorId"`
	Score float64 `json:"score"`
	Matched []string `json:"matched"`
}

type AuthorSuggestions struct {
	Suggestions []AuthorSuggestion `json:"suggestions"`
}

type MediaAsset struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	Kind string `json:"kind"`
	URL string `json:"url"`
	StorageKey *string `json:"storageKey"`
	FileName *string `json:"fileName"`
	MimeType *string `json:"mimeType"`
	SizeBytes *float64 `json:"sizeBytes"`
	Width *float64 `json:"width"`
	Height *float64 `json:"height"`
	AltText map[string]string `json:"altText"`
	Caption map[string]string `json:"caption"`
	Tags []string `json:"tags"`
	AIMetadata *map[string]any `json:"aiMetadata"`
	Usage []map[string]any `json:"usage"`
	IsDeleted bool `json:"isDeleted"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type MediaAssetList struct {
	Assets []MediaAsset `json:"assets"`
	Pagination Pagination `json:"pagination"`
}

type MediaAssetWrapper struct {
	Asset MediaAsset `json:"asset"`
}

type MediaUsageRef struct {
	EntityType string `json:"entityType"`
	EntityID string `json:"entityId"`
	Field string `json:"field"`
	Title string `json:"title"`
	Slug string `json:"slug"`
}

type MediaUsage struct {
	Usages []MediaUsageRef `json:"usages"`
}

type MediaMetadataSuggestion struct {
	AssetID *string `json:"assetId"`
	URL *string `json:"url"`
	MimeType *string `json:"mimeType"`
	Locale string `json:"locale"`
	AltText string `json:"altText"`
	Tags []string `json:"tags"`
	Kind string `json:"kind"`
}

type MediaMissingAlt struct {
	Assets []MediaAsset `json:"assets"`
	TotalMissing float64 `json:"totalMissing"`
	Locale string `json:"locale"`
}

type ContentPlanStatus struct {
	// List wrapper: the payload is reached through the key the server
	// sent it under.
	Extra map[string]any `json:"-"`
}

type ContentPlanLocale struct {
	Code string `json:"code"`
	TranslationDueOffsetDays *float64 `json:"translationDueOffsetDays"`
	Status string `json:"status"`
}

type ContentPlanItem struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	Title string `json:"title"`
	Brief *string `json:"brief"`
	PrimaryKeyword *string `json:"primaryKeyword"`
	Intent *string `json:"intent"`
	FunnelStage *string `json:"funnelStage"`
	Category *string `json:"category"`
	SubCategory *string `json:"subCategory"`
	Author *string `json:"author"`
	Assignee *string `json:"assignee"`
	Campaign *string `json:"campaign"`
	Status ContentPlanStatus `json:"status"`
	Source string `json:"source"`
	OriginRef *string `json:"originRef"`
	DueAt *string `json:"dueAt"`
	PlannedPublishAt *string `json:"plannedPublishAt"`
	Timezone *string `json:"timezone"`
	Locales []ContentPlanLocale `json:"locales"`
	ArticleID *string `json:"articleId"`
	Notes *string `json:"notes"`
	Tags []string `json:"tags"`
	CreatedBy *string `json:"createdBy"`
	IsDeleted bool `json:"isDeleted"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type ContentPlanItemWrapper struct {
	Item ContentPlanItem `json:"item"`
}

type PlanWarning struct {
	Code string `json:"code"`
	Severity string `json:"severity"`
	ItemIds []string `json:"itemIds"`
	Message string `json:"message"`
}

type ContentCadence struct {
	ID string `json:"_id"`
	Scope string `json:"scope"`
	Category *string `json:"category"`
	PostsPerWeek float64 `json:"postsPerWeek"`
	PreferredWeekdays []float64 `json:"preferredWeekdays"`
	PreferredTime *string `json:"preferredTime"`
	Timezone string `json:"timezone"`
	WeekendDays []float64 `json:"weekendDays"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type CadenceWrapper struct {
	Cadence *ContentCadence `json:"cadence"`
}

type ContentPlanList struct {
	Items []ContentPlanItem `json:"items"`
	Warnings []PlanWarning `json:"warnings"`
	Cadence ContentCadence `json:"cadence"`
}

type StartDraft struct {
	Item ContentPlanItem `json:"item"`
	ArticleID string `json:"articleId"`
}

type StartDraftWrapper struct {
	Null StartDraft `json:"null"`
}

type ScheduleResult struct {
	Item ContentPlanItem `json:"item"`
	ArticleScheduled bool `json:"articleScheduled"`
}

type ScheduleWrapper struct {
	Null ScheduleResult `json:"null"`
}

type ContentGap struct {
	Code string `json:"code"`
	Severity string `json:"severity"`
	CategoryID *string `json:"categoryId"`
	CategoryName string `json:"categoryName"`
	Locale string `json:"locale"`
	ArticleIds []string `json:"articleIds"`
	ArticleTitles []string `json:"articleTitles"`
	Message string `json:"message"`
	SuggestedStatus ContentPlanStatus `json:"suggestedStatus"`
}

type ContentGapReport struct {
	Gaps []ContentGap `json:"gaps"`
	Summary map[string]any `json:"summary"`
}

type CalendarIdea struct {
	Title string `json:"title"`
	Angle string `json:"angle"`
	Brief string `json:"brief"`
	PrimaryKeyword string `json:"primaryKeyword"`
	Intent string `json:"intent"`
	FunnelStage string `json:"funnelStage"`
	CategoryName string `json:"categoryName"`
	LocaleVariants []map[string]any `json:"localeVariants"`
	SuggestedDate *string `json:"suggestedDate"`
}

type CalendarIdeas struct {
	IDeas []CalendarIdea `json:"ideas"`
	Requested float64 `json:"requested"`
}

type CalendarPlanEntry struct {
	PlannedPublishAt string `json:"plannedPublishAt"`
	Weekday float64 `json:"weekday"`
	Series string `json:"series"`
	WorkingTitle string `json:"workingTitle"`
}

type CalendarPeriodPlan struct {
	Entries []CalendarPlanEntry `json:"entries"`
	Cadence map[string]any `json:"cadence"`
}

type CalendarBestTime struct {
	Suggestion map[string]any `json:"suggestion"`
	Samples float64 `json:"samples"`
	Basis string `json:"basis"`
}

type CalendarReschedule struct {
	Proposal *map[string]any `json:"proposal"`
}

type Campaign struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	Name string `json:"name"`
	Goal *string `json:"goal"`
	Description *string `json:"description"`
	StartsAt *string `json:"startsAt"`
	EndsAt *string `json:"endsAt"`
	Status string `json:"status"`
	Color *string `json:"color"`
	CreatedBy *string `json:"createdBy"`
	IsDeleted bool `json:"isDeleted"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type CampaignWrapper struct {
	Campaign Campaign `json:"campaign"`
}

type CampaignList struct {
	Campaigns []Campaign `json:"campaigns"`
	Pagination Pagination `json:"pagination"`
}

type DigestNote struct {
	Code string `json:"code"`
	Params map[string]any `json:"params"`
	Text string `json:"text"`
}

type DigestAction struct {
	Code string `json:"code"`
	Severity string `json:"severity"`
	Params map[string]any `json:"params"`
	Text string `json:"text"`
	Href string `json:"href"`
}

type WeeklyDigest struct {
	WeekOf string `json:"weekOf"`
	Range map[string]any `json:"range"`
	Published map[string]any `json:"published"`
	AI map[string]any `json:"ai"`
	SuggestedActions []DigestAction `json:"suggestedActions"`
	Wins []DigestNote `json:"wins"`
	Issues []DigestNote `json:"issues"`
}

type WeeklyDigestWrapper struct {
	Digest WeeklyDigest `json:"digest"`
}

type SeoHealthCategoryRow struct {
	CategoryID *string `json:"categoryId"`
	CategoryName string `json:"categoryName"`
	Articles float64 `json:"articles"`
	Issues float64 `json:"issues"`
	HealthPercent float64 `json:"healthPercent"`
}

type SeoHealthReport struct {
	Range map[string]any `json:"range"`
	Scanned float64 `json:"scanned"`
	IssueCounts map[string]float64 `json:"issueCounts"`
	TotalIssues float64 `json:"totalIssues"`
	HealthyPercent float64 `json:"healthyPercent"`
	ByCategory []SeoHealthCategoryRow `json:"byCategory"`
	Notes []string `json:"notes"`
}

type CalendarAdherenceReport struct {
	Range map[string]any `json:"range"`
	Planned float64 `json:"planned"`
	Published float64 `json:"published"`
	PublishedOnTime float64 `json:"publishedOnTime"`
	DeliveryRate float64 `json:"deliveryRate"`
	OnTimeRate float64 `json:"onTimeRate"`
	MedianLeadTimeDays *float64 `json:"medianLeadTimeDays"`
	Overdue float64 `json:"overdue"`
	Campaigns []map[string]any `json:"campaigns"`
	Notes []string `json:"notes"`
}

type AiAcceptanceActionRow struct {
	ActionID string `json:"actionId"`
	Runs float64 `json:"runs"`
	Accepted float64 `json:"accepted"`
	AcceptanceRate float64 `json:"acceptanceRate"`
	MinutesSaved float64 `json:"minutesSaved"`
}

type AiAcceptanceReport struct {
	Range map[string]any `json:"range"`
	Total float64 `json:"total"`
	Accepted float64 `json:"accepted"`
	Rejected float64 `json:"rejected"`
	AcceptanceRate float64 `json:"acceptanceRate"`
	Credits map[string]any `json:"credits"`
	TimeSaved map[string]any `json:"timeSaved"`
	ByAction []AiAcceptanceActionRow `json:"byAction"`
	Notes []string `json:"notes"`
}

type TranslationCoverageReportV2 struct {
	// List wrapper: the payload is reached through the key the server
	// sent it under.
	Extra map[string]any `json:"-"`
}

type ReportWrapper struct {
	Null ReportPayload `json:"null"`
}

type ReportPayload struct {
	Report any `json:"report"`
}

type SeoAuditIssue struct {
	Code string `json:"code"`
	Severity string `json:"severity"`
	ArticleID string `json:"articleId"`
	Title string `json:"title"`
	Message string `json:"message"`
	FixAction *string `json:"fixAction"`
}

type SeoAuditReport struct {
	Issues []SeoAuditIssue `json:"issues"`
	Summary map[string]float64 `json:"summary"`
	Scanned float64 `json:"scanned"`
}

type CannibalizationGroup struct {
	Keyword string `json:"keyword"`
	ArticleIds []string `json:"articleIds"`
	Titles []string `json:"titles"`
	RecommendedKeep string `json:"recommendedKeep"`
}

type CannibalizationReport struct {
	Groups []CannibalizationGroup `json:"groups"`
	Summary map[string]any `json:"summary"`
}

type RefreshCandidate struct {
	ArticleID string `json:"articleId"`
	Title string `json:"title"`
	AgeDays float64 `json:"ageDays"`
	ViewsTotal float64 `json:"viewsTotal"`
	TrendRatio *float64 `json:"trendRatio"`
	Severity string `json:"severity"`
	Reasons []string `json:"reasons"`
}

type RefreshCandidateReport struct {
	Candidates []RefreshCandidate `json:"candidates"`
	Scanned float64 `json:"scanned"`
}

type RefreshPlanItem struct {
	Item ContentPlanItem `json:"item"`
	Linked bool `json:"linked"`
}

type RefreshPlanItemWrapper struct {
	Null RefreshPlanItem `json:"null"`
}

type HreflangEntry struct {
	Locale string `json:"locale"`
	Hreflang string `json:"hreflang"`
	URL string `json:"url"`
}

type HreflangGroup struct {
	ArticleID string `json:"articleId"`
	Canonical string `json:"canonical"`
	Alternates []HreflangEntry `json:"alternates"`
	XDefault *string `json:"xDefault"`
}

type HreflangWrapper struct {
	Hreflang HreflangGroup `json:"hreflang"`
}

type Redirect struct {
	ID string `json:"_id"`
	TenantID string `json:"tenantId"`
	FromSlug string `json:"fromSlug"`
	ToSlug string `json:"toSlug"`
	ArticleID string `json:"articleId"`
	CreatedAt string `json:"createdAt"`
	UpdatedAt string `json:"updatedAt"`
}

type RedirectList struct {
	Redirects []Redirect `json:"redirects"`
	Pagination Pagination `json:"pagination"`
}

type TranslationCoverageRow struct {
	EntityType string `json:"entityType"`
	Covered float64 `json:"covered"`
	Total float64 `json:"total"`
	MissingByLocale map[string]float64 `json:"missingByLocale"`
}

type TranslationCoverageReport struct {
	Locales []string `json:"locales"`
	Rows []TranslationCoverageRow `json:"rows"`
	Completeness float64 `json:"completeness"`
}

type ContentTypeProfile struct {
	Type string `json:"type"`
	Length map[string]any `json:"length"`
	Weights map[string]float64 `json:"weights"`
	OptionalSignals []string `json:"optionalSignals"`
	RequiresSummary bool `json:"requiresSummary"`
}

type ContentTypeProfileWrapper struct {
	Profile ContentTypeProfile `json:"profile"`
	Profiles []ContentTypeProfile `json:"profiles"`
}

type Envelope struct {
	Success bool `json:"success"`
	StatusCode float64 `json:"statusCode"`
	Message string `json:"message"`
	Data *map[string]any `json:"data"`
}

type ErrorResponse struct {
	// List wrapper: the payload is reached through the key the server
	// sent it under.
	Extra map[string]any `json:"-"`
}
