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
	Engagement map[string]any `json:"engagement"`
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

type RepurposeResult struct {
	ArticleID *string `json:"articleId"`
	Platforms map[string]RepurposedOutput `json:"platforms"`
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
