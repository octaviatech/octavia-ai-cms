// Auto-generated from openapi.json
export type ObjectId = string;

export type DateTime = string;

export type MultilingualString = {
  [key: string]: string;
};

export type MultilingualStringOrNull = string | {
  [key: string]: string;
} | unknown;

export type Pagination = {
  total: number;
  page: number;
  limit: number;
  totalPages: number;
};

export type Tokens = {
  used: number;
  remaining: number;
  limit: number;
};

export type TokensUsedOnly = {
  used: number;
};

export type SeoKeywordAnalysis = {
  term?: string;
  count?: number;
  density?: number;
  positions?: Array<number>;
  inTitle?: boolean;
  inHeadings?: number;
  inFirstParagraph?: boolean;
};

export type SeoLanguageMetrics = {
  languageCode?: string;
  primaryKeyword?: unknown;
  baseScore?: number;
  potentialScore?: number;
  signals?: {
  titleMeta?: number;
  structure?: number;
  keywordUsage?: number;
  contentLength?: number;
  readability?: number;
  links?: number;
  images?: number;
  technical?: number;
};
  wordCount?: number;
  keywordDensity?: unknown;
  suggestions?: Array<string>;
  termsAnalysis?: {
  primaryKeyword?: SeoKeywordAnalysis;
  relatedTerms?: Array<SeoKeywordAnalysis>;
  longTailKeywords?: Array<SeoKeywordAnalysis>;
  totalUniqueTerms?: number;
  keywordDiversity?: number;
};
  structureAnalysis?: {
  headingCount?: {
  h1?: number;
  h2?: number;
  h3?: number;
  h4?: number;
  h5?: number;
  h6?: number;
};
  hasValidHierarchy?: boolean;
  hasSingleH1?: boolean;
  headingDensity?: number;
  hasTableOfContents?: boolean;
};
  linkAnalysis?: {
  internalLinks?: number;
  externalLinks?: number;
  totalLinks?: number;
  anchorTexts?: Array<string>;
  hasDescriptiveAnchors?: boolean;
  linkDensity?: number;
};
  imageAnalysis?: {
  totalImages?: number;
  imagesWithAlt?: number;
  altTextQuality?: number;
  imageDensity?: number;
  hasFeaturedImage?: boolean;
};
  readabilityMetrics?: {
  fleschScore?: number;
  averageSentenceLength?: number;
  maxSentenceLength?: number;
  transitionWordCount?: number;
  transitionWordDensity?: number;
  passiveVoiceCount?: number;
  passiveVoiceDensity?: number;
};
  technicalSEO?: {
  urlLength?: number;
  hasStopWordsInUrl?: boolean;
  hasSchemaMarkup?: boolean;
  hasOpenGraph?: boolean;
  hasTwitterCards?: boolean;
};
};

export type SeoPerLanguage = {
  [key: string]: SeoLanguageMetrics;
};

export type ArticleSeo = {
  perLanguage?: SeoPerLanguage;
};

export type Author = {
  _id: ObjectId;
  tenantId?: string;
  slug?: string;
  name: MultilingualString;
  email: string;
  avatar?: string;
  bio?: MultilingualString;
  isPrivate?: boolean;
  isActive?: boolean;
  isDeleted?: boolean;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type Category = {
  _id: ObjectId;
  tenantId?: string;
  name: MultilingualString;
  slug: string;
  thumbnail?: string;
  description?: MultilingualString;
  isPrivate?: boolean;
  isActive?: boolean;
  isDeleted?: boolean;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type SubCategory = {
  _id: ObjectId;
  tenantId?: string;
  name: MultilingualString;
  slug: string;
  thumbnail?: string;
  description?: MultilingualString;
  category: ObjectId;
  isPrivate?: boolean;
  isActive?: boolean;
  isDeleted?: boolean;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type Tag = {
  _id: ObjectId;
  tenantId?: string;
  name: string;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type Language = {
  _id: ObjectId;
  tenantId?: string;
  code: string;
  name: string;
  isActive?: boolean;
  isDeleted?: boolean;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type AIConversationMessage = {
  role: "user" | "ai";
  content: string;
  timestamp: DateTime;
};

export type AIConversationClarification = {
  question?: string;
  answer?: string;
};

export type AIConversationRequirements = {
  targetAudience?: unknown;
  tone?: unknown;
  length?: unknown;
  keywords?: Array<string>;
  language?: unknown;
  primaryKeyword?: unknown;
  minWordCount?: unknown;
};

export type AIConversation = {
  _id: ObjectId;
  conversationId: string;
  tenantId?: string;
  userId?: unknown;
  stage: "gathering" | "planning" | "generating" | "review";
  tokensInput?: number;
  tokensOutput?: number;
  tokensTotal?: number;
  messages: Array<AIConversationMessage>;
  context?: {
  prompt?: unknown;
  clarifications?: Array<AIConversationClarification>;
  outline?: unknown;
  requirements?: AIConversationRequirements;
};
  attempts?: number;
  maxAttempts?: number;
  lastArticle?: {
  title?: string;
  slug?: string;
  summary?: string;
  content?: string;
  seoScore?: number;
  seoFeedback?: Array<string>;
};
  expiresAt?: DateTime;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type AIConversationArticle = {
  title?: string;
  summary?: string;
  content?: string;
  slug?: string;
  tags?: Array<string>;
  seoScore?: number;
};

export type Article = {
  _id: ObjectId;
  tenantId?: string;
  slug?: string;
  mainTitle: MultilingualString;
  title2?: MultilingualString;
  title3?: MultilingualString;
  summary?: MultilingualStringOrNull;
  content: MultilingualString;
  category?: Array<ObjectId>;
  subCategory?: Array<ObjectId>;
  author: ObjectId;
  createdBy: ObjectId;
  tags?: Array<string>;
  thumbnail?: string;
  gallery?: Array<string>;
  videos?: Array<string>;
  audios?: Array<string>;
  documents?: Array<string>;
  files?: Array<string>;
  likes?: number;
  dislikes?: number;
  shares?: number;
  rating?: number;
  ratingCount?: number;
  views?: number;
  publishDate?: DateTime;
  isPublished?: boolean;
  isPrivate?: boolean;
  isDeleted?: boolean;
  isActive?: boolean;
  autoSummarize?: boolean;
  contentSource?: "human" | "ai" | "mixed";
  engagement?: {
  commentsEnabled?: boolean;
  reactionsEnabled?: boolean;
  autoApproveComments?: boolean;
};
  seo?: ArticleSeo;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type ArticleListItem = {
  _id?: ObjectId;
  mainTitle?: MultilingualString;
  slug?: string;
  thumbnail?: string;
  category?: Array<Category>;
  subCategory?: Array<SubCategory>;
  author?: Author | unknown;
  summary?: MultilingualStringOrNull;
  isPublished?: boolean;
  isPrivate?: boolean;
  publishDate?: DateTime;
  createdAt?: DateTime;
  updatedAt?: DateTime;
  seo?: ArticleSeo;
};

export type ArticleLocalized = {
  _id?: ObjectId;
  mainTitle?: MultilingualStringOrNull;
  title2?: MultilingualStringOrNull;
  title3?: MultilingualStringOrNull;
  summary?: MultilingualStringOrNull;
  content?: MultilingualStringOrNull;
  category?: Array<{
  _id?: ObjectId;
  slug?: string;
  name?: MultilingualStringOrNull;
  description?: MultilingualStringOrNull;
}>;
  subCategory?: Array<{
  _id?: ObjectId;
  slug?: string;
  name?: MultilingualStringOrNull;
  description?: MultilingualStringOrNull;
}>;
  author?: unknown;
  isPublished?: boolean;
  isPrivate?: boolean;
  publishDate?: DateTime;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type FormFieldOption = {
  value: string;
  label: MultilingualString;
};

export type FormRelationRef = {
  _id?: ObjectId;
  slug?: string;
  title?: MultilingualString;
  formType?: "public" | "internal";
};

export type FormField = {
  name: string;
  type: "text" | "email" | "number" | "date" | "datetime-local" | "tags" | "tags-select" | "tel" | "select" | "multi-select" | "checkbox" | "multi-checkbox" | "radio" | "textarea" | "file" | "switch" | "markdown";
  label: MultilingualString;
  required: boolean;
  options?: Array<FormFieldOption>;
  validation?: {
  [key: string]: unknown;
};
  multiple?: boolean;
  accept?: string;
  colSpan?: number;
  icon?: string;
  disabled?: boolean;
  verified?: boolean;
  defaultValue?: unknown;
  placeholder?: MultilingualString;
  relation?: {
  relatedFormId?: ObjectId;
  relationType?: "one-to-one" | "many-to-one" | "one-to-many" | "many-to-many";
};
  relationDetails?: {
  relatedForm?: FormRelationRef | unknown;
};
};

export type FormSection = {
  title: MultilingualString;
  icon?: string;
  description?: MultilingualString;
  fields: Array<FormField>;
};

export type FormNotification = {
  enabled?: boolean;
  email?: {
  admin?: {
  enabled?: boolean;
  recipients?: Array<string>;
  templateKey?: string;
  locale?: string;
  includeFields?: Array<string>;
};
  submitter?: {
  enabled?: boolean;
  recipientFieldName?: string;
  templateKey?: string;
  locale?: string;
  includeFields?: Array<string>;
};
};
  push?: {
  admin?: {
  enabled?: boolean;
  userIds?: Array<string>;
  templateKey?: string;
  locale?: string;
  includeFields?: Array<string>;
};
  submitter?: {
  enabled?: boolean;
  userIdFieldName?: string;
  templateKey?: string;
  locale?: string;
  includeFields?: Array<string>;
};
};
};

export type Form = {
  _id: ObjectId;
  tenantId?: string;
  title: MultilingualString;
  slug: string;
  description?: MultilingualString;
  sections: Array<FormSection>;
  submitButtonText?: MultilingualString;
  formType?: "public" | "internal";
  notification?: FormNotification;
  captcha?: {
  enabled?: boolean;
  provider?: "recaptcha" | "hcaptcha" | "turnstile";
  minScore?: number;
};
  relation?: {
  parentFormId?: ObjectId;
  nextFormId?: ObjectId;
};
  relationDetails?: {
  parentForm?: FormRelationRef | unknown;
  nextForm?: FormRelationRef | unknown;
};
  createdBy?: ObjectId;
  isActive?: boolean;
  isDeleted?: boolean;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type FormListItem = Form & {
  submissionsCount?: number;
};

export type FormSubmission = {
  _id: ObjectId;
  tenantId?: ObjectId;
  formId: ObjectId;
  language: string;
  values: {
  [key: string]: unknown;
};
  relations?: Array<{
  fieldName?: string;
  relationType?: string;
  relatedFormId?: ObjectId;
  relatedSubmissionIds?: Array<ObjectId>;
}>;
  status: number;
  submittedAt?: DateTime;
  isDeleted?: boolean;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type FormSubmissionSummary = {
  _id?: ObjectId;
  formId?: ObjectId;
  language?: string;
  values?: {
  [key: string]: unknown;
};
  status?: number;
  submittedAt?: DateTime;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type FormSubmissionEnriched = FormSubmission & {
  relatedEntries?: Array<{
  fieldName?: string;
  relationType?: string;
  relatedForm?: FormRelationRef | unknown;
  submissions?: Array<FormSubmissionSummary>;
}>;
  reverseRelations?: Array<{
  fieldName?: string;
  relationType?: string;
  sourceSubmission?: FormSubmissionSummary;
}>;
};

export type CaptchaConfig = {
  tenantId?: ObjectId;
  provider?: "recaptcha" | "hcaptcha" | "turnstile";
  siteKey?: unknown;
  isActive?: boolean;
  hasSecretKey?: boolean;
  secretKeyMasked?: unknown;
  updatedBy?: unknown;
  updatedAt?: DateTime;
};

export type RepurposedOutput = {
  title?: string;
  summary?: string;
  content?: string;
  hashtags?: Array<string>;
  cta?: string;
};

export type RepurposeResult = {
  articleId?: unknown;
  platforms?: {
  [key: string]: RepurposedOutput;
};
  aiGenerationId?: string;
  tokens?: Tokens;
};

export type AIStreamEvent = {
  event?: string;
  data?: {
  [key: string]: unknown;
};
};

export type AIConversationContinue = {
  conversationId?: string;
  stage?: string;
  requirements?: AIConversationRequirements;
  message?: string;
};

export type AIConversationRegenerate = {
  conversationId?: string;
  article?: AIConversationArticle;
  seoScore?: number;
  status?: "approved" | "needs_improvement";
  issues?: Array<string>;
  attempts?: number;
  maxAttempts?: number;
};

export type ArticleList = {
  articleListItem?: Array<ArticleListItem>;
  pagination: Pagination;
};

export type AuthorList = {
  author?: Array<Author>;
  pagination: Pagination;
};

export type CategoryList = {
  category?: Array<Category>;
  pagination: Pagination;
};

export type SubCategoryList = {
  subCategory?: Array<SubCategory>;
  pagination: Pagination;
};

export type TagList = {
  tag?: Array<Tag>;
  pagination: Pagination;
};

export type LanguageList = {
  language?: Array<Language>;
  pagination: Pagination;
};

export type FormList = {
  formListItem?: Array<FormListItem>;
  pagination: Pagination;
};

export type FormSubmissionList = {
  formSubmission?: Array<FormSubmission>;
  pagination: Pagination;
};

export type ArticleWrapper = {
  article: Article;
};

export type AuthorWrapper = {
  author: Author;
};

export type CategoryWrapper = {
  category: Category;
};

export type SubCategoryWrapper = {
  subCategory: SubCategory;
};

export type TagWrapper = {
  tag: Tag;
};

export type LanguageWrapper = {
  language: Language;
};

export type FormWrapper = {
  form: Form;
};

export type FormNullableWrapper = {
  form: Form | unknown;
};

export type NextFormWrapper = {
  nextForm: Form | unknown;
};

export type SubmissionWrapper = {
  submission: FormSubmissionEnriched;
};

export type SubmissionRawWrapper = {
  submission: FormSubmission;
};

export type CaptchaConfigWrapper = {
  config: CaptchaConfig | unknown;
};

export type FormSubmissionRelations = {
  submissionId?: ObjectId;
  relatedEntries?: Array<{
  fieldName?: string;
  relationType?: string;
  relatedForm?: FormRelationRef | unknown;
  submissions?: Array<FormSubmissionSummary>;
}>;
  reverseRelations?: Array<{
  fieldName?: string;
  relationType?: string;
  sourceSubmission?: FormSubmissionSummary;
}>;
};

export type FormRelationsBackfill = {
  updatedCount?: number;
  scopedFormId?: ObjectId | unknown;
};

export type ReportRange = {
  from?: DateTime | unknown;
  to?: DateTime | unknown;
};

export type ReportCategoryRow = {
  categoryId?: ObjectId | unknown;
  slug?: string;
  name?: string;
  articleCount?: number;
  views?: number;
};

export type ReportAuthorRow = {
  authorId?: ObjectId | unknown;
  slug?: string;
  name?: string;
  articleCount?: number;
  views?: number;
};

export type ContentOverviewReport = {
  range?: ReportRange;
  totals?: {
  totalArticles?: number;
  publishedArticles?: number;
  draftArticles?: number;
  publishedRate?: number;
  totalViews?: number;
  totalLikes?: number;
  totalDislikes?: number;
  totalComments?: number;
  avgViewsPerArticle?: number;
};
  bySource?: Array<ReportSourceRow>;
  dailyTrend?: Array<ReportArticleDailyRow>;
  topCategories?: Array<ReportCategoryRow>;
  topAuthors?: Array<ReportAuthorRow>;
};

export type ReportSourceRow = {
  source?: string;
  count?: number;
  views?: number;
};

export type ReportArticleDailyRow = {
  date?: string;
  createdArticles?: number;
  publishedArticles?: number;
};

export type ReportArticleRow = {
  articleId?: ObjectId;
  slug?: string;
  mainTitle?: MultilingualStringOrNull;
  isPublished?: boolean;
  publishDate?: DateTime | unknown;
  createdAt?: DateTime;
  views?: number;
  likes?: number;
  dislikes?: number;
  shares?: number;
  commentsCount?: number;
  engagementScore?: number;
  engagementRate?: number;
  contentSource?: string;
  categoryIds?: Array<string>;
  author?: ReportAuthorBrief | unknown;
};

export type ReportAuthorBrief = {
  authorId?: ObjectId;
  slug?: string;
  name?: MultilingualStringOrNull;
};

export type TopArticlesReport = {
  metric?: "views" | "publishDate" | "engagement";
  limit?: number;
  items?: Array<ReportArticleRow>;
};

export type AiUsageBreakdownReport = {
  totals?: {
  requests?: number;
  success?: number;
  error?: number;
  successRate?: number;
  tokensInput?: number;
  tokensOutput?: number;
  tokensTotal?: number;
};
  byOperation?: Array<ReportAiOperationRow>;
  dailyTrend?: Array<ReportAiDailyRow>;
  recentErrors?: Array<ReportAiErrorRow>;
};

export type ReportAiOperationRow = {
  operationType?: string;
  requests?: number;
  success?: number;
  error?: number;
  tokensTotal?: number;
};

export type ReportAiDailyRow = {
  date?: string;
  requests?: number;
  success?: number;
  error?: number;
  tokensTotal?: number;
};

export type ReportAiErrorRow = {
  operationType?: string;
  errorMessage?: string;
  createdAt?: DateTime;
};

export type FormsOverviewReport = {
  totals?: {
  totalForms?: number;
  activeForms?: number;
  inactiveForms?: number;
  totalSubmissions?: number;
};
  byStatus?: Array<ReportStatusRow>;
  byLanguage?: Array<ReportLanguageRow>;
  dailyTrend?: Array<ReportSubmissionDailyRow>;
};

export type ReportStatusRow = {
  status?: number;
  statusLabel?: string;
  count?: number;
};

export type ReportLanguageRow = {
  language?: string;
  count?: number;
};

export type ReportSubmissionDailyRow = {
  date?: string;
  submissions?: number;
};

export type SubmissionsOverviewReport = {
  totals?: {
  totalSubmissions?: number;
  approved?: number;
  rejected?: number;
  resolutionRate?: number;
  avgFirstResponseHours?: number;
};
  byStatus?: Array<ReportStatusRow>;
  byLanguage?: Array<ReportLanguageRow>;
  dailyTrend?: Array<ReportSubmissionDailyRow>;
  topForms?: Array<ReportTopFormRow>;
};

export type ReportTopFormRow = {
  formId?: ObjectId;
  slug?: string;
  title?: MultilingualString;
  submissions?: number;
  lastSubmissionAt?: DateTime | unknown;
};

export type ReportSeries = {
  name?: string;
  data?: Array<number>;
};

export type ReportGroupBy = "day" | "week" | "month";

export type ContentTrendReport = {
  groupBy?: ReportGroupBy;
  labels?: Array<string>;
  series?: Array<ReportSeries>;
  points?: Array<ReportContentTrendPoint>;
};

export type ReportContentTrendPoint = {
  label?: string;
  createdArticles?: number;
  publishedArticles?: number;
  views?: number;
  likes?: number;
  shares?: number;
  comments?: number;
};

export type SubmissionFunnelReport = {
  labels?: Array<string>;
  series?: Array<ReportSeries>;
  stages?: Array<ReportFunnelStage>;
  total?: number;
};

export type ReportFunnelStage = {
  status?: number;
  label?: string;
  count?: number;
  rate?: number;
};

export type EngagementTrendReport = {
  groupBy?: ReportGroupBy;
  labels?: Array<string>;
  series?: Array<ReportSeries>;
  points?: Array<ReportEngagementPoint>;
};

export type ReportEngagementPoint = {
  label?: string;
  views?: number;
  likes?: number;
  shares?: number;
  comments?: number;
  engagementScore?: number;
  engagementRate?: number;
};

export type PublishingPerformanceReport = {
  range?: ReportRange;
  totals?: {
  totalArticles?: number;
  publishedArticles?: number;
  draftArticles?: number;
  publishRate?: number;
  sameDayPublished?: number;
  sameDayPublishRate?: number;
  avgHoursToPublish?: number;
  totalViews?: number;
};
  publishLagBuckets?: Array<ReportLagBucket>;
  publishWeekday?: Array<ReportWeekdayRow>;
  recentDrafts?: Array<ReportDraftRow>;
};

export type ReportLagBucket = {
  bucket?: "under_24h" | "1_to_3_days" | "3_to_7_days" | "over_7_days";
  count?: number;
};

export type ReportWeekdayRow = {
  dayOfWeek?: number;
  label?: string;
  count?: number;
};

export type ReportDraftRow = {
  articleId?: ObjectId;
  slug?: string;
  mainTitle?: MultilingualStringOrNull;
  createdAt?: DateTime;
  views?: number;
  ageDays?: number;
  authorId?: ObjectId | unknown;
};

export type ContentHealthReport = {
  range?: ReportRange;
  totals?: {
  totalArticles?: number;
  withThumbnail?: number;
  withoutThumbnail?: number;
  withSummary?: number;
  withoutSummary?: number;
  withTags?: number;
  withoutTags?: number;
  withCategory?: number;
  withoutCategory?: number;
  withAuthor?: number;
  withoutAuthor?: number;
  avgTagsPerArticle?: number;
  avgContentLength?: number;
};
  qualityBuckets?: Array<ReportQualityBucket>;
  weakestArticles?: Array<ReportWeakArticleRow>;
};

export type ReportQualityBucket = {
  score?: string;
  label?: "strong" | "needs_work" | "weak";
  count?: number;
};

export type ReportWeakArticleRow = {
  articleId?: ObjectId;
  slug?: string;
  mainTitle?: MultilingualStringOrNull;
  createdAt?: DateTime;
  isPublished?: boolean;
  qualityScore?: number;
  engagementScore?: number;
  views?: number;
  comments?: number;
};

export type CategoryPerformanceReport = {
  range?: ReportRange;
  totals?: {
  totalArticles?: number;
  uncategorizedArticles?: number;
};
  items?: Array<ReportCategoryPerformanceRow>;
};

export type ReportCategoryPerformanceRow = {
  categoryId?: ObjectId | unknown;
  slug?: string;
  name?: MultilingualStringOrNull;
  articleCount?: number;
  publishedArticles?: number;
  totalViews?: number;
  totalLikes?: number;
  totalShares?: number;
  totalComments?: number;
  engagementScore?: number;
  avgViewsPerArticle?: number;
  latestArticleAt?: DateTime | unknown;
  shareOfContent?: number;
};

export type PeriodComparisonReport = {
  currentRange?: ReportRange;
  previousRange?: ReportRange;
  metrics?: Array<ReportMetricDelta>;
};

export type ReportMetricDelta = {
  label?: "articles" | "publishedArticles" | "views" | "engagement" | "submissions" | "aiRequests";
  current?: number;
  previous?: number;
  delta?: number;
  deltaPercent?: number | unknown;
};

export type AiContentImpactReport = {
  range?: ReportRange;
  bySource?: Array<ReportAiSourceImpactRow>;
  topAiContent?: Array<ReportAiContentRow>;
};

export type ReportAiSourceImpactRow = {
  source?: string;
  articles?: number;
  publishedArticles?: number;
  views?: number;
  likes?: number;
  shares?: number;
  comments?: number;
  engagementScore?: number;
  publishRate?: number;
  avgViewsPerArticle?: number;
};

export type ReportAiContentRow = {
  articleId?: ObjectId;
  slug?: string;
  mainTitle?: MultilingualStringOrNull;
  contentSource?: string;
  isPublished?: boolean;
  views?: number;
  likes?: number;
  shares?: number;
  commentsCount?: number;
  engagementScore?: number;
  createdAt?: DateTime;
};

export type CommentOverviewReport = {
  range?: ReportRange;
  totals?: {
  totalComments?: number;
  approved?: number;
  pending?: number;
  rejected?: number;
  moderationRate?: number;
};
  byStatus?: Array<ReportCommentStatusRow>;
  byActorType?: Array<ReportActorTypeRow>;
  dailyTrend?: Array<ReportCommentDailyRow>;
  topDiscussedArticles?: Array<ReportDiscussedArticleRow>;
};

export type ReportCommentStatusRow = {
  status?: number;
  count?: number;
};

export type ReportActorTypeRow = {
  actorType?: string;
  count?: number;
};

export type ReportCommentDailyRow = {
  date?: string;
  comments?: number;
};

export type ReportDiscussedArticleRow = {
  articleId?: ObjectId;
  slug?: string;
  mainTitle?: MultilingualStringOrNull;
  comments?: number;
  likes?: number;
  dislikes?: number;
  lastCommentAt?: DateTime | unknown;
};

export type Comment = {
  _id: ObjectId;
  tenantId?: string;
  articleId?: ObjectId;
  actorType?: "user" | "guest";
  userId?: ObjectId | unknown;
  parentId?: ObjectId | unknown;
  content: string;
  likes?: number;
  dislikes?: number;
  status: "pending" | "approved" | "rejected";
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type CommentWrapper = {
  comment: Comment;
};

export type CommentListWrapper = {
  comments?: Array<Comment>;
  pagination: Pagination;
};

export type ArticleReactionTotals = {
  articleId?: ObjectId;
  reaction?: "like" | "dislike";
  likes?: number;
  dislikes?: number;
};

export type ArticleReactionSummary = {
  articleId?: ObjectId;
  likes?: number;
  dislikes?: number;
  userReaction?: "like" | "dislike" | unknown;
};

export type CommentReactionTotals = {
  commentId?: ObjectId;
  reaction?: "like" | "dislike";
  likes?: number;
  dislikes?: number;
};

export type CommentReactionSummary = {
  commentId?: ObjectId;
  likes?: number;
  dislikes?: number;
  userReaction?: "like" | "dislike" | unknown;
};

export type EngagementSettings = {
  tenantId?: string;
  commentsEnabled?: boolean;
  reactionsEnabled?: boolean;
  allowGuestComments?: boolean;
  allowGuestReactions?: boolean;
  autoApproveComments?: boolean;
  requireCaptchaForGuestEngagement?: boolean;
  guestEngagementCaptchaMinScore?: number;
  guestEngagementRateLimitPerMin?: number;
  updatedBy?: ObjectId | unknown;
  updatedAt?: DateTime;
};

export type CategoryDeleteResult = {
  category: Category;
  subCategoriesAffected?: number;
};

export type TagSearchResult = {
  tags?: Array<Tag>;
};

export type SeoAnalysis = {
  score?: number;
  potentialScore?: number;
  scores?: {
  titleMeta?: number;
  structure?: number;
  keywords?: number;
  content?: number;
  readability?: number;
  links?: number;
  images?: number;
  technical?: number;
};
  stats?: {
  wordCount?: number;
  keywordDensity?: number;
  readabilityScore?: number;
  readabilityLevel?: string;
  totalImages?: number;
  totalLinks?: number;
  headingsCount?: number;
};
  topKeywords?: Array<{
  term?: string;
  count?: number;
  inTitle?: boolean;
}>;
  allKeywords?: Array<{
  term?: string;
  count?: number;
  density?: number;
  inTitle?: boolean;
  inHeadings?: number;
}>;
  issues?: {
  critical?: Array<string>;
  warnings?: Array<string>;
  criticalCount?: number;
  warningCount?: number;
};
  checks?: {
  hasH1?: boolean;
  hasImages?: boolean;
  hasLinks?: boolean;
  hasGoodReadability?: boolean;
  urlOptimized?: boolean;
};
};

export type SeoAnalysisPerLanguage = {
  [key: string]: SeoAnalysis;
};

export type SeoAnalysisResult = {
  articleId: ObjectId;
  slug: string;
  language?: string;
  seo: SeoAnalysis | SeoAnalysisPerLanguage;
};

export type TenantUsageStats = {
  admins?: number;
  apiKeys?: number;
  categories?: number;
  subCategories?: number;
  articles?: number;
  forms?: number;
  submissions?: number;
  languages?: number;
  ai_tokens?: number;
  s3?: number;
  limits?: {
  [key: string]: number;
};
};

export type UserStats = {
  userId?: string;
  tenantId?: string;
  articles?: number;
  categories?: number;
  subCategories?: number;
  forms?: number;
  languages?: number;
  publishedArticles?: number;
  lastArticleAt?: DateTime | unknown;
  likes?: number;
  dislikes?: number;
  views?: number;
  shares?: number;
  comments?: number;
  engagementScore?: number;
  engagementRate?: number;
};

export type AuthorStats = {
  authorId?: string;
  tenantId?: string;
  articles?: number;
  publishedArticles?: number;
  lastArticleAt?: DateTime | unknown;
  likes?: number;
  dislikes?: number;
  views?: number;
  shares?: number;
  comments?: number;
  engagementScore?: number;
  engagementRate?: number;
};

export type UsersStatsPage = {
  items?: Array<UserStats>;
  pagination: Pagination;
};

export type AuthorsStatsPage = {
  items?: Array<AuthorStats>;
  pagination: Pagination;
};

export type DashboardSlot = {
  id?: string;
  type?: "operationsOverview" | "tenantCapacity" | "contentTrend" | "summaryOverview" | "topArticles" | "reportIntelligence" | "contentSpotlight";
  enabled?: boolean;
  span?: "half" | "full";
  settings?: {
  range?: "1week" | "2weeks" | "1month" | "currentMonth";
};
};

export type DashboardConfig = {
  version?: number;
  templateId?: string;
  slots?: Array<DashboardSlot>;
};

export type DashboardConfigWrapper = {
  dashboardConfig: DashboardConfig;
};

export type AiSummaryResult = {
  summary?: string;
  tokens?: Tokens;
};

export type AiTitleResult = {
  title?: string;
  tokens?: Tokens;
};

export type AiTranslateResult = {
  content?: string;
  tokens?: Tokens;
};

export type AiSeoResult = {
  contentHtml?: string;
  metaDescription?: string;
  aiSeoScore?: number;
  suggestedKeywords?: Array<string>;
  tokens?: Tokens;
};

export type AiContentResult = {
  title?: string;
  slug?: string;
  summary?: string;
  body?: string;
  aiGenerationId?: string;
  tokens?: Tokens;
};

export type AiImageResult = {
  imageUrl?: string;
  imageBase64?: string;
  imageMimeType?: string;
  articleId?: ObjectId | unknown;
  tokens?: TokensUsedOnly;
};

export type AiArticlePatch = {
  title?: string;
  summary?: string;
  contentHtml?: string;
  tags?: Array<string>;
};

export type AiArticleSeoResult = {
  articleId?: ObjectId;
  patched?: {
  [key: string]: AiArticlePatch;
};
  seo?: {
  [key: string]: SeoAnalysis;
};
  saved?: boolean;
};

export type AiArticleTranslation = {
  mainTitle?: string;
  title2?: string;
  title3?: string;
  summary?: string;
  content?: string;
  tags?: Array<string>;
};

export type AiArticleTranslateResult = {
  articleId?: ObjectId;
  sourceLanguage?: string;
  targetLanguages?: Array<string>;
  translations?: {
  [key: string]: AiArticleTranslation;
};
};

export type AiFormFieldTranslation = {
  label?: string;
  placeholder?: string;
  options?: Array<{
  value?: string;
  label?: string;
}>;
};

export type AiFormSectionTranslation = {
  title?: string;
  description?: string;
  submitButtonText?: string;
  sectionTitles?: Array<string>;
  sectionDescriptions?: Array<string>;
  fieldLabels?: Array<string>;
  fieldPlaceholders?: Array<string>;
  fields?: Array<AiFormFieldTranslation>;
};

export type AiFormTranslateResult = {
  formId?: ObjectId;
  sourceLanguage?: string;
  targetLanguages?: Array<string>;
  translations?: {
  [key: string]: AiFormSectionTranslation;
};
};

export type SocialTemplateDefaults = {
  language?: string;
  tone?: string;
  length?: string;
};

export type SocialPlatformTemplate = {
  tone?: string;
  length?: string;
  ctaTemplate?: string;
  hashtagStyle?: string;
  maxHashtags?: number;
};

export type SocialTemplate = {
  defaults?: SocialTemplateDefaults;
  platforms?: {
  linkedin?: SocialPlatformTemplate;
  twitter?: SocialPlatformTemplate;
  telegram?: SocialPlatformTemplate;
  instagram?: SocialPlatformTemplate;
};
};

export type SocialConnection = {
  tenantId?: string;
  provider?: "linkedin" | "twitter" | "telegram";
  isActive?: boolean;
  config?: {
  [key: string]: string;
};
  updatedBy?: ObjectId | unknown;
  updatedAt?: DateTime;
};

export type SocialConnectionList = {
  connections?: Array<SocialConnection>;
};

export type SocialPublishResult = {
  provider?: "linkedin" | "twitter" | "telegram";
  postId?: string | unknown;
  messageId?: number | unknown;
  tweetId?: string | unknown;
  chatId?: string | unknown;
  status?: number;
};

export type ConversationStart = {
  conversationId?: string;
  stage?: "gathering" | "planning" | "generating" | "review";
  questions?: Array<string>;
  expiresAt?: DateTime;
};

export type ConversationGenerate = {
  conversationId: string;
  article?: AIConversationArticle;
  seoScore?: number;
  issues?: Array<string>;
  attempts?: number;
  maxAttempts?: number;
  status: "approved" | "needs_improvement" | "max_attempts_reached";
  message?: string;
};

export type Envelope = {
  success: boolean;
  statusCode: number;
  message: string;
  data: unknown;
};

export type ErrorResponse = Envelope;
