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

export type ArticleEngagementOverride = {
  commentsEnabled?: boolean;
  reactionsEnabled?: boolean;
  autoApproveComments?: boolean;
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
  contentBlocks?: ArticleContentBlocks;
  derivedContent?: Array<ArticleDerivedContent>;
  engagement?: ArticleEngagementOverride;
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
  assignee?: ObjectId | unknown;
  tags?: Array<string>;
  analysis?: SubmissionAnalysis | unknown;
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

export type NewsletterOutput = {
  subject: string;
  preheader?: string;
  body: string;
  cta?: string;
};

export type XThreadOutput = {
  posts: Array<string>;
};

export type VideoScene = {
  title: string;
  durationSec: number;
  narration: string;
  bRoll?: string;
};

export type VideoScriptOutput = {
  hook?: string;
  scenes: Array<VideoScene>;
  outro?: string;
  totalSec: number;
};

export type FaqChannelOutput = {
  items: Array<{
  question: string;
  answer: string;
}>;
};

export type PressReleaseOutput = {
  headline?: string;
  dateline?: string;
  lede?: string;
  body?: Array<string>;
  boilerplate?: string;
};

export type ContentBlockFaqItem = {
  question: string;
  answer: string;
};

export type ContentBlockTakeaway = {
  label?: string;
  text: string;
};

export type ArticleContentBlocks = {
  faq?: {
  [key: string]: Array<ContentBlockFaqItem>;
};
  tldr?: {
  [key: string]: string;
};
  keyTakeaways?: {
  [key: string]: Array<ContentBlockTakeaway>;
};
};

export type ArticleDerivedContent = {
  channel: "newsletter" | "xThread" | "videoScript" | "faq" | "pressRelease";
  language?: unknown;
  title?: string;
  payload: string;
  aiGenerationId?: unknown;
  scheduledItemId?: unknown;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type RepurposeChannels = {
  newsletter?: NewsletterOutput;
  xThread?: XThreadOutput;
  videoScript?: VideoScriptOutput;
  faq?: FaqChannelOutput;
  pressRelease?: PressReleaseOutput;
};

export type ChannelNote = {
  channel: string;
  notes: Array<string>;
};

export type RepurposeResult = {
  articleId?: unknown;
  platforms?: {
  [key: string]: RepurposedOutput;
};
  channels?: RepurposeChannels;
  channelNotes?: Array<ChannelNote>;
  derivedContentIds?: Array<string>;
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
  blocksTotal?: number;
  blocksTranslated?: number;
  blockHashes?: {
  [key: string]: string;
};
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

export type NeedsAttentionItem = {
  code: string;
  severity: "high" | "medium" | "low";
  entityType: "article" | "comment" | "form" | "submission" | "translation";
  entityId?: string | unknown;
  articleId?: ObjectId | unknown;
  message: string;
  count?: number | unknown;
  locale?: string | unknown;
  fixAction?: string | unknown;
};

export type NeedsAttentionReport = {
  generatedAt: DateTime;
  items: Array<NeedsAttentionItem>;
};

export type SubmissionAnalysis = {
  _id?: ObjectId;
  tenantId?: ObjectId;
  submissionId?: ObjectId;
  formId?: ObjectId;
  summary?: string;
  category?: "lead" | "support" | "feedback" | "spam" | "other";
  priority?: "low" | "normal" | "high" | "urgent";
  sentiment?: "positive" | "neutral" | "negative" | "mixed";
  language?: string;
  spamScore?: number;
  entities?: {
  name?: unknown;
  company?: unknown;
  email?: unknown;
  phone?: unknown;
  url?: unknown;
};
  topics?: Array<string>;
  provider?: unknown;
  providerModel?: unknown;
  promptVersion?: unknown;
  source?: string;
  analyzedAt?: DateTime;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type SubmissionActivity = {
  _id?: ObjectId;
  type?: "status" | "assign" | "note" | "reply" | "ai" | "tag";
  actorId?: ObjectId | unknown;
  actorType?: "user" | "ai" | "system";
  payload?: {
  [key: string]: unknown;
};
  createdAt?: DateTime;
};

export type SubmissionReply = {
  _id: ObjectId;
  submissionId: ObjectId;
  channel?: string;
  locale?: string;
  subject: string;
  body: string;
  status: "draft" | "sent" | "failed";
  to?: unknown;
  templateKey?: unknown;
  draftSource?: "ai" | "human";
  sentAt?: DateTime | unknown;
  error?: unknown;
  createdAt?: DateTime;
};

export type SubmissionAnalysisWrapper = {
  analysis: SubmissionAnalysis;
};

export type SubmissionAnalysisResult = {
  analysis: SubmissionAnalysis;
  spamApplied: boolean;
};

export type SubmissionBulkAnalysis = {
  results: Array<{
  submissionId?: string;
  ok?: boolean;
  spamScore?: number | unknown;
  error?: string | unknown;
}>;
  summary: {
  requested?: number;
  succeeded?: number;
  failed?: number;
};
};

export type SubmissionActivityList = {
  activity: Array<SubmissionActivity>;
  replies: Array<SubmissionReply>;
};

export type SubmissionReplyWrapper = {
  reply: SubmissionReply;
};

export type SubmissionActivityWrapper = {
  activity: SubmissionActivity;
};

export type SubmissionInboxFacets = {
  status?: {
  [key: string]: number;
};
  category?: {
  [key: string]: number;
};
  priority?: {
  [key: string]: number;
};
  assignee?: Array<{
  userId?: string;
  count?: number;
}>;
};

export type SubmissionDetailWrapper = {
  submission: FormSubmissionEnriched;
  activity?: Array<SubmissionActivity>;
  replies?: Array<SubmissionReply>;
};

export type SubmissionDigestAggregates = {
  from?: DateTime;
  to?: DateTime;
  total?: number;
  previousTotal?: number;
  byCategory?: {
  [key: string]: number;
};
  byPriority?: {
  [key: string]: number;
};
  byStatus?: {
  [key: string]: number;
};
  byLanguage?: {
  [key: string]: number;
};
  byForm?: Array<{
  formId?: string;
  title?: string;
  count?: number;
}>;
  urgentCount?: number;
  spamCount?: number;
  topics?: Array<{
  topic?: string;
  count?: number;
  samples?: Array<string>;
}>;
};

export type SubmissionDigest = {
  aggregates: SubmissionDigestAggregates;
  headline?: string;
  summary?: string;
  topics?: Array<{
  topic?: string;
  sentiment?: string;
  note?: string;
}>;
  actions?: Array<{
  title?: string;
  detail?: string;
  severity?: string;
}>;
};

export type SubmissionDigestWrapper = {
  digest: SubmissionDigest;
};

export type FormDraftField = {
  name: string;
  type: string;
  label: MultilingualString;
  placeholder?: MultilingualString;
  required: boolean;
  colSpan?: number;
  options?: Array<{
  value?: string;
  label?: MultilingualString;
}>;
  validation?: {
  [key: string]: unknown;
};
};

export type FormDraft = {
  title: MultilingualString;
  slug: string;
  description?: MultilingualString;
  submitButtonText?: MultilingualString;
  formType?: "public" | "internal";
  sections: Array<{
  title?: MultilingualString;
  description?: MultilingualString;
  fields?: Array<FormDraftField>;
}>;
  captcha?: {
  enabled?: boolean;
};
  fieldCount?: number;
  truncated?: boolean;
};

export type FormDraftWrapper = {
  draft: FormDraft;
};

export type FormImproveSuggestion = {
  fieldName?: string;
  kind?: string;
  current?: string;
  proposed?: string;
  reason?: string;
};

export type FormImproveWrapper = {
  formId?: string;
  summary?: string;
  suggestions: Array<FormImproveSuggestion>;
  reorder?: Array<string>;
};

export type CommentModeration = {
  _id?: ObjectId;
  tenantId?: ObjectId;
  commentId?: ObjectId;
  articleId?: ObjectId;
  toxicity?: number;
  spamScore?: number;
  sentiment?: "positive" | "neutral" | "negative" | "mixed";
  language?: string;
  decision?: "approve" | "hold" | "reject";
  reasons?: Array<string>;
  suggestedReply?: {
  body?: string;
  locale?: string;
  createdAt?: DateTime;
} | unknown;
  autoApplied?: boolean;
  provider?: unknown;
  providerModel?: unknown;
  promptVersion?: unknown;
  analyzedAt?: DateTime;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type CommentModerationSummary = {
  _id?: ObjectId;
  toxicity?: number;
  spamScore?: number;
  sentiment?: string;
  language?: string;
  decision?: "approve" | "hold" | "reject";
  reasons?: Array<string>;
  autoApplied?: boolean;
  analyzedAt?: DateTime;
};

export type ModerationResultWrapper = {
  moderation: CommentModeration;
  nextStatus?: unknown;
};

export type CommentReplyDraft = {
  body: string;
  locale?: string;
};

export type CommentReplyDraftWrapper = {
  reply: CommentReplyDraft;
};

export type MinedQuestionIdea = {
  topic: string;
  angle?: string;
  questionCount?: number;
  exampleQuestionIds?: Array<string>;
  primaryKeyword?: string;
  funnelStage?: "awareness" | "consideration" | "conversion";
};

export type MinedQuestionsWrapper = {
  ideas: Array<MinedQuestionIdea>;
};

export type EffectiveModerationPolicy = {
  mode?: "always" | "if_safe" | "never";
  maxToxicity?: number;
  maxSpamScore?: number;
  autoRejectSpamScore?: number;
  maxLinks?: number;
  blockedTerms?: Array<string>;
  reasons?: Array<string>;
};

export type EffectivePolicyWrapper = {
  policy: EffectiveModerationPolicy;
  articleId?: unknown;
};

export type AiFeatureFlags = {
  copilot?: boolean;
  autofill?: boolean;
  inline?: boolean;
  bulk?: boolean;
  forms?: boolean;
  submissions?: boolean;
  comments?: boolean;
  calendar?: boolean;
  seo?: boolean;
  brandVoice?: boolean;
  jobs?: boolean;
};

export type AiAutoApplyPolicy = {
  copilot?: "never" | "safe" | "always";
  autofill?: "never" | "safe" | "always";
  inline?: "never" | "safe" | "always";
  bulk?: "never" | "safe" | "always";
  forms?: "never" | "safe" | "always";
  submissions?: "never" | "safe" | "always";
  comments?: "never" | "safe" | "always";
  calendar?: "never" | "safe" | "always";
  seo?: "never" | "safe" | "always";
  brandVoice?: "never" | "safe" | "always";
  jobs?: "never" | "safe" | "always";
};

export type BrandVoiceProfile = {
  tone?: string;
  audience?: string;
  readingLevel?: string;
  do?: Array<string>;
  dont?: Array<string>;
  bannedTerms?: Array<string>;
  examples?: Array<string>;
  persianRegister?: unknown;
  version?: number;
};

export type LegacyGlossaryEntry = {
  term?: string;
  translation?: string;
};

export type AiSettings = {
  brandVoice?: unknown;
  glossary?: Array<LegacyGlossaryEntry>;
  brandVoiceVersion?: string;
  autoApply?: boolean;
  defaultTier?: unknown;
  featureFlags: AiFeatureFlags;
  autoApplyPolicy: AiAutoApplyPolicy;
  dailyQuotaPerUser?: unknown;
  defaultLocales?: Array<string>;
  piiMasking: {
  submissions: boolean;
  comments: boolean;
};
  retentionDays: number;
  modelTierOverrides?: {
  [key: string]: "fast" | "balanced" | "strong";
};
  brandVoiceProfile?: BrandVoiceProfile;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type BrandVoiceSettings = {
  brandVoice?: unknown;
  glossary?: Array<LegacyGlossaryEntry>;
  brandVoiceProfile?: BrandVoiceProfile;
  brandVoiceVersion?: string;
};

export type CreditSnapshot = {
  period: string;
  used: number;
  reserved: number;
  limit: number;
  remaining: number;
  available: number;
};

export type TokenEstimate = {
  actionId: string;
  estimatedTokens: number;
};

export type AiRunSubmission = {
  runId: string;
  mode: string;
  estimatedTokens: number;
};

export type AiRunInsufficientCredits = {
  reason: "AI_INSUFFICIENT_CREDITS";
  used: number;
  reserved: number;
  limit: number;
  estimate: number;
};

export type AiRunConflict = {
  runId: string;
  status: "already_running";
};

export type AiRunListItem = {
  runId: string;
  actionId: string;
  status: "reserved" | "settled" | "refunded" | "void" | "cancelled";
  estimated: number;
  actual?: unknown;
  reason?: unknown;
  outcome?: unknown;
  meta?: unknown;
  result?: unknown;
  createdAt?: unknown;
};

export type AiRunList = {
  runs: Array<AiRunListItem>;
  pagination?: Pagination;
};

export type AiRunAccepted = {
  runId: string;
  mode?: "inline" | "queued";
  estimatedTokens?: number;
};

export type AiProposalPatch = {
  path: string;
  lang?: string;
  key?: string;
  before?: unknown;
  after: unknown;
};

export type AiProposal = {
  _id: ObjectId;
  tenantId?: string;
  articleId: string;
  actionId: string;
  status: "pending" | "accepted" | "rejected" | "reverted" | "expired";
  createdByUserId?: unknown;
  decidedByUserId?: unknown;
  locale?: unknown;
  patches: Array<AiProposalPatch>;
  baseHash?: string;
  decidedAt?: unknown;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type AiProposalCount = {
  count: number;
};

export type AiProposalDecision = {
  proposal: AiProposal;
  appliedPatches: Array<AiProposalPatch>;
};

export type AiProposalStale = {
  reason: "AI_PROPOSAL_STALE" | "AI_PROPOSAL_INVALID_STATE";
};

export type AiProposalBulkResultItem = {
  id: string;
  status: "accepted" | "failed";
  reason?: string;
};

export type AiAutofillResult = {
  proposalId: string;
  filled: Array<string>;
  skipped: Array<string>;
};

export type ArticleRevisionSnapshot = {
  mainTitle?: unknown;
  summary?: unknown;
  content?: unknown;
  tags?: Array<string>;
};

export type ArticleRevision = {
  _id: ObjectId;
  articleId: string;
  locale: string;
  source: "manual" | "ai" | "restore" | "system" | "seed";
  userId?: unknown;
  aiProposalId?: unknown;
  restoredFrom?: unknown;
  snapshot: ArticleRevisionSnapshot;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type ArticleRevisionList = {
  revisions: Array<ArticleRevision>;
  maxRevisionsPerLocale?: number;
};

export type ArticleRevisionRestore = {
  article: Article;
  revision: ArticleRevision;
};

export type ReadinessItem = {
  id: string;
  label: string;
  state: "ok" | "warning" | "missing";
  locales: Array<string>;
  detail?: unknown;
};

export type ArticleReadiness = {
  articleId: string;
  itemType: "article";
  contentSource: string;
  items: Array<ReadinessItem>;
  blockers: Array<string>;
  warnings: Array<string>;
};

export type ArticleSeoMeta = {
  articleId: string;
  locale?: unknown;
  metaTitle: MultilingualStringOrNull;
  metaDescription: MultilingualStringOrNull;
  focusKeyword: MultilingualStringOrNull;
  secondaryKeywords: MultilingualStringOrNull;
  canonicalUrl: MultilingualStringOrNull;
  ogTitle: MultilingualStringOrNull;
  ogDescription: MultilingualStringOrNull;
  schemaJson: MultilingualStringOrNull;
  ogImage: unknown;
  robots: unknown;
  slug: unknown;
};

export type TranslationStateItem = {
  locale: string;
  state: "missing" | "done" | "outdated";
  storedState?: "missing" | "done" | "outdated";
  sourceOutdated: boolean;
  updatedAt?: unknown;
};

export type TranslationStateReport = {
  articleId: string;
  sourceLocale: string;
  items: Array<TranslationStateItem>;
};

export type TranslationStateDoc = {
  _id?: ObjectId;
  articleId: string;
  locale: string;
  sourceLocale?: string;
  sourceHash: string;
  targetHash: string;
  blockHashes?: {
  [key: string]: string;
};
  updatedByUserId?: unknown;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type AiEvent = {
  event: string;
  occurredAt: DateTime;
  payload?: {
  [key: string]: unknown;
};
};

export type GlossaryTerm = {
  _id: ObjectId;
  source: string;
  sourceLocale: string;
  target: string;
  targetLocale: string;
  doNotTranslate: boolean;
  note?: unknown;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type GlossaryTermWrapper = {
  term: GlossaryTerm;
};

export type KnowledgeSource = {
  _id: ObjectId;
  type: "url" | "text" | "file";
  title: string;
  uri?: unknown;
  content?: unknown;
  locale?: unknown;
  status: "pending" | "indexed" | "failed";
  error?: unknown;
  chunkCount: number;
  tokenCount?: number;
  indexedAt?: unknown;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type KnowledgeSourceWrapper = {
  source: KnowledgeSource;
};

export type TaxonomyFinding = {
  code: "duplicate_category" | "duplicate_subcategory" | "near_duplicate_category" | "empty_category" | "no_description" | "no_seo" | "unbalanced_category" | "orphan_subcategory";
  severity: "high" | "medium" | "low";
  entityType: "category" | "subcategory";
  entityId?: string | unknown;
  entityIds?: Array<string>;
  names?: Array<string>;
  message: string;
  fixAction: string;
};

export type TaxonomyAudit = {
  findings: Array<TaxonomyFinding>;
  summary: {
  total?: number;
  high?: number;
  medium?: number;
  low?: number;
};
};

export type TaxonomySeoEntry = {
  metaTitle?: string;
  metaDescription?: string;
  focusKeyword?: string;
};

export type CategorySeoSuggestion = {
  entityType: "category" | "subcategory";
  entityId: ObjectId;
  seo: {
  [key: string]: TaxonomySeoEntry;
};
};

export type TagSuggestion = {
  tag: string;
  isNew?: boolean;
  confidence?: number;
};

export type TagSuggestions = {
  tags: Array<TagSuggestion>;
};

export type TagMergeResult = {
  from: string;
  into: string;
  articlesUpdated: number;
};

export type TagUsageRefresh = {
  updated: number;
};

export type AuthorBioSuggestion = {
  authorId: ObjectId;
  bio?: {
  [key: string]: string;
};
  expertise?: Array<string>;
};

export type AuthorSuggestion = {
  authorId: ObjectId;
  score: number;
  matched?: Array<string>;
};

export type AuthorSuggestions = {
  suggestions: Array<AuthorSuggestion>;
};

export type MediaAsset = {
  _id: ObjectId;
  tenantId?: ObjectId;
  kind: "image" | "video" | "audio" | "document" | "other";
  url: string;
  storageKey?: unknown;
  fileName?: unknown;
  mimeType?: unknown;
  sizeBytes?: unknown;
  width?: unknown;
  height?: unknown;
  altText?: {
  [key: string]: string;
};
  caption?: {
  [key: string]: string;
};
  tags?: Array<string>;
  aiMetadata?: unknown;
  usage?: Array<{
  entityType?: string;
  entityId?: ObjectId;
  field?: string;
}>;
  isDeleted?: boolean;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type MediaAssetList = {
  assets: Array<MediaAsset>;
  pagination: Pagination;
};

export type MediaAssetWrapper = {
  asset: MediaAsset;
};

export type MediaUsageRef = {
  entityType: string;
  entityId: ObjectId;
  field: string;
  title?: string;
  slug?: string;
};

export type MediaUsage = {
  usages: Array<MediaUsageRef>;
};

export type MediaMetadataSuggestion = {
  assetId?: string | unknown;
  url?: string | unknown;
  mimeType?: string | unknown;
  locale?: string;
  altText: string;
  tags: Array<string>;
  kind: "image" | "video" | "audio" | "document" | "other";
};

export type MediaMissingAlt = {
  assets: Array<MediaAsset>;
  totalMissing: number;
  locale?: string;
};

export type ContentPlanStatus = "idea" | "planned" | "in_progress" | "in_review" | "scheduled" | "published" | "postponed" | "cancelled";

export type ContentPlanLocale = {
  code: string;
  translationDueOffsetDays?: unknown;
  status?: "pending" | "in_progress" | "done" | "outdated";
};

export type ContentPlanItem = {
  _id: ObjectId;
  tenantId?: string;
  title: string;
  brief?: unknown;
  primaryKeyword?: unknown;
  intent?: unknown;
  funnelStage?: unknown;
  category?: ObjectId | unknown;
  subCategory?: ObjectId | unknown;
  author?: ObjectId | unknown;
  assignee?: ObjectId | unknown;
  campaign?: ObjectId | unknown;
  status: ContentPlanStatus;
  source?: "manual" | "ai" | "content_gap" | "reader_comment" | "form_submission";
  originRef?: unknown;
  dueAt?: unknown;
  plannedPublishAt?: unknown;
  timezone?: unknown;
  locales?: Array<ContentPlanLocale>;
  articleId?: ObjectId | unknown;
  notes?: unknown;
  tags?: Array<string>;
  createdBy?: ObjectId | unknown;
  isDeleted?: boolean;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type ContentPlanItemWrapper = {
  item: ContentPlanItem;
};

export type PlanWarning = {
  code: "cadence_exceeded" | "cadence_under" | "keyword_collision" | "author_overload" | "publish_before_translation" | "past_due" | "overdue_publish";
  severity: "high" | "medium" | "low";
  itemIds: Array<string>;
  message: string;
};

export type ContentCadence = {
  _id?: ObjectId;
  scope?: "tenant" | "category";
  category?: ObjectId | unknown;
  postsPerWeek?: number;
  preferredWeekdays?: Array<number>;
  preferredTime?: unknown;
  timezone?: string;
  weekendDays?: Array<number>;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type CadenceWrapper = {
  cadence: ContentCadence | unknown;
};

export type ContentPlanList = {
  items: Array<ContentPlanItem>;
  warnings: Array<PlanWarning>;
  cadence?: ContentCadence;
};

export type StartDraft = {
  item: ContentPlanItem;
  articleId: ObjectId;
};

export type StartDraftWrapper = {
  null?: StartDraft;
};

export type ScheduleResult = {
  item: ContentPlanItem;
  articleScheduled: boolean;
};

export type ScheduleWrapper = {
  null?: ScheduleResult;
};

export type ContentGap = {
  code: "thin_category" | "missing_locale" | "stale_content" | "idle_keyword";
  severity: "high" | "medium" | "low";
  categoryId?: unknown;
  categoryName?: string;
  locale?: string;
  articleIds: Array<string>;
  articleTitles?: Array<string>;
  message: string;
  suggestedStatus: ContentPlanStatus;
};

export type ContentGapReport = {
  gaps: Array<ContentGap>;
  summary: {
  total?: number;
  thinCategory?: number;
  missingLocale?: number;
  staleContent?: number;
};
};

export type CalendarIdea = {
  title: string;
  angle?: string;
  brief?: string;
  primaryKeyword: string;
  intent?: "informational" | "navigational" | "commercial" | "transactional";
  funnelStage?: "awareness" | "consideration" | "conversion" | "retention";
  categoryName?: string;
  localeVariants?: Array<{
  code?: string;
  title?: string;
}>;
  suggestedDate?: unknown;
};

export type CalendarIdeas = {
  ideas: Array<CalendarIdea>;
  requested?: number;
};

export type CalendarPlanEntry = {
  plannedPublishAt: string;
  weekday: number;
  series?: string;
  workingTitle?: string;
};

export type CalendarPeriodPlan = {
  entries: Array<CalendarPlanEntry>;
  cadence: {
  postsPerWeek?: number;
  preferredWeekdays?: Array<number>;
  preferredTime?: string;
  timezone?: string;
};
};

export type CalendarBestTime = {
  suggestion: {
  weekday: number;
  time: string;
  reason: "weekday_traffic" | "cadence_default";
};
  samples?: number;
  basis: "weekday_engagement";
};

export type CalendarReschedule = {
  proposal?: unknown;
};

export type Campaign = {
  _id: ObjectId;
  tenantId?: string;
  name: string;
  goal?: unknown;
  description?: unknown;
  startsAt?: unknown;
  endsAt?: unknown;
  status: "planned" | "active" | "done";
  color?: unknown;
  createdBy?: ObjectId | unknown;
  isDeleted?: boolean;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type CampaignWrapper = {
  campaign: Campaign;
};

export type CampaignList = {
  campaigns: Array<Campaign>;
  pagination: Pagination;
};

export type DigestNote = {
  code: string;
  params: {
  [key: string]: unknown;
};
  text: string;
};

export type DigestAction = {
  code: "calendar.overdue" | "ai.lowAcceptance" | "calendar.delivery" | "seo.audit";
  severity: "high" | "medium" | "low";
  params: {
  [key: string]: unknown;
};
  text: string;
  href?: string;
};

export type WeeklyDigest = {
  weekOf: string;
  range: {
  from?: string;
  to?: string;
};
  published: {
  count?: number;
  previous?: number;
  delta?: number;
};
  ai: {
  runs?: number;
  acceptanceRate?: number;
  minutesSaved?: number;
};
  suggestedActions: Array<DigestAction>;
  wins?: Array<DigestNote>;
  issues?: Array<DigestNote>;
};

export type WeeklyDigestWrapper = {
  digest: WeeklyDigest;
};

export type SeoHealthCategoryRow = {
  categoryId?: unknown;
  categoryName?: string;
  articles: number;
  issues: number;
  healthPercent: number;
};

export type SeoHealthReport = {
  range?: {
  from?: string;
  to?: string;
};
  scanned: number;
  issueCounts?: {
  [key: string]: number;
};
  totalIssues: number;
  healthyPercent: number;
  byCategory: Array<SeoHealthCategoryRow>;
  notes?: Array<string>;
};

export type CalendarAdherenceReport = {
  range?: {
  from?: string;
  to?: string;
};
  planned: number;
  published: number;
  publishedOnTime?: number;
  deliveryRate: number;
  onTimeRate: number;
  medianLeadTimeDays?: unknown;
  overdue: number;
  campaigns?: Array<{
  campaignId?: ObjectId;
  name?: string;
  planned?: number;
  published?: number;
  deliveryRate?: number;
}>;
  notes?: Array<string>;
};

export type AiAcceptanceActionRow = {
  actionId: string;
  runs: number;
  accepted: number;
  acceptanceRate?: number;
  minutesSaved?: number;
};

export type AiAcceptanceReport = {
  range?: {
  from?: string;
  to?: string;
};
  total: number;
  accepted: number;
  rejected: number;
  acceptanceRate: number;
  credits?: {
  total?: number;
  accepted?: number;
};
  timeSaved: {
  estimatedMinutes: number;
  basis?: {
  [key: string]: number;
};
  note: string;
};
  byAction?: Array<AiAcceptanceActionRow>;
  notes?: Array<string>;
};

export type TranslationCoverageReportV2 = TranslationCoverageReport & {
  missingArticles?: Array<{
  articleId?: string;
  locale?: string;
  title?: string;
}>;
};

export type ReportWrapper = {
  null?: ReportPayload;
};

export type ReportPayload = {
  report?: SeoHealthReport | TranslationCoverageReportV2 | CalendarAdherenceReport | AiAcceptanceReport;
};

export type SeoAuditIssue = {
  code: "missing_meta_title" | "missing_meta_description" | "duplicate_title" | "thin_content" | "missing_alt_text" | "broken_heading_order" | "orphan_page" | "missing_keyword" | "no_traffic";
  severity: "high" | "medium" | "low";
  articleId: ObjectId;
  title?: string;
  message: string;
  fixAction?: string | unknown;
};

export type SeoAuditReport = {
  issues: Array<SeoAuditIssue>;
  summary: {
  [key: string]: number;
};
  scanned: number;
};

export type CannibalizationGroup = {
  keyword: string;
  articleIds: Array<string>;
  titles?: Array<string>;
  recommendedKeep: ObjectId;
};

export type CannibalizationReport = {
  groups: Array<CannibalizationGroup>;
  summary: {
  total?: number;
  articlesInvolved?: number;
};
};

export type RefreshCandidate = {
  articleId: ObjectId;
  title?: string;
  ageDays?: number;
  viewsTotal?: number;
  trendRatio?: unknown;
  severity: "high" | "medium" | "low";
  reasons: Array<"age" | "declining" | "no_traffic">;
};

export type RefreshCandidateReport = {
  candidates: Array<RefreshCandidate>;
  scanned: number;
};

export type RefreshPlanItem = {
  item: ContentPlanItem;
  linked: boolean;
};

export type RefreshPlanItemWrapper = {
  null?: RefreshPlanItem;
};

export type HreflangEntry = {
  locale: string;
  hreflang: string;
  url: string;
};

export type HreflangGroup = {
  articleId?: ObjectId;
  canonical: string;
  alternates: Array<HreflangEntry>;
  xDefault?: string | unknown;
};

export type HreflangWrapper = {
  hreflang: HreflangGroup;
};

export type Redirect = {
  _id: ObjectId;
  tenantId?: string;
  fromSlug: string;
  toSlug: string;
  articleId?: ObjectId;
  createdAt?: DateTime;
  updatedAt?: DateTime;
};

export type RedirectList = {
  redirects: Array<Redirect>;
  pagination: Pagination;
};

export type TranslationCoverageRow = {
  entityType: "article" | "category" | "subcategory" | "form";
  covered: number;
  total: number;
  missingByLocale: {
  [key: string]: number;
};
};

export type TranslationCoverageReport = {
  locales: Array<string>;
  rows: Array<TranslationCoverageRow>;
  completeness: number;
};

export type ContentTypeProfile = {
  type: "blog" | "case_study" | "landing" | "news";
  length: {
  min?: number;
  comfortable?: number;
  max?: number;
};
  weights: {
  [key: string]: number;
};
  optionalSignals?: Array<string>;
  requiresSummary?: boolean;
};

export type ContentTypeProfileWrapper = {
  profile?: ContentTypeProfile;
  profiles?: Array<ContentTypeProfile>;
};

export type Envelope = {
  success: boolean;
  statusCode: number;
  message: string;
  data: unknown;
};

export type ErrorResponse = Envelope;
