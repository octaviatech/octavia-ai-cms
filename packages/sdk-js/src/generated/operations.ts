// Auto-generated from openapi.json
import type * as Schemas from "./schemas";

export type AISummarizePath = {};

export type AISummarizeQuery = {};

export type AISummarizeBody = {
  text: string;
  maxWords?: number;
};

export type AISummarizeResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AISummarizeStreamPath = {};

export type AISummarizeStreamQuery = {};

export type AISummarizeStreamBody = {
  text: string;
  maxWords?: number;
};

export type AISummarizeStreamResponse = Schemas.Envelope & {
  data?: unknown;
};

export type AISummarizeArticleStreamPath = {};

export type AISummarizeArticleStreamQuery = {};

export type AISummarizeArticleStreamBody = {
  articleId: string;
  maxWords?: number;
  language?: string;
  fields?: Array<string>;
};

export type AISummarizeArticleStreamResponse = Schemas.Envelope & {
  data?: unknown;
};

export type AISeoOptimizePath = {};

export type AISeoOptimizeQuery = {};

export type AISeoOptimizeBody = {
  text: string;
  keyword?: string;
};

export type AISeoOptimizeResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AISeoOptimizeStreamPath = {};

export type AISeoOptimizeStreamQuery = {};

export type AISeoOptimizeStreamBody = {
  text: string;
  keyword?: string;
};

export type AISeoOptimizeStreamResponse = Schemas.Envelope & {
  data?: unknown;
};

export type AIGenerateTitlePath = {};

export type AIGenerateTitleQuery = {};

export type AIGenerateTitleBody = {
  text: string;
  maxChars?: number;
};

export type AIGenerateTitleResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AITranslatePath = {};

export type AITranslateQuery = {};

export type AITranslateBody = {
  text: string;
  targetLanguage: string;
};

export type AITranslateResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AITranslateStreamPath = {};

export type AITranslateStreamQuery = {};

export type AITranslateStreamBody = {
  text: string;
  targetLanguage: string;
};

export type AITranslateStreamResponse = Schemas.Envelope & {
  data?: unknown;
};

export type AIGenerateContentPath = {};

export type AIGenerateContentQuery = {};

export type AIGenerateContentBody = {
  text: string;
  wordCount?: number;
};

export type AIGenerateContentResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AIGenerateImagePath = {};

export type AIGenerateImageQuery = {};

export type AIGenerateImageBody = unknown | unknown;

export type AIGenerateImageResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AIOptimizeArticlePath = {};

export type AIOptimizeArticleQuery = {};

export type AIOptimizeArticleBody = {
  articleId: string;
  primaryKeyword?: string;
  languages?: Array<string>;
  fields?: {
  title?: boolean;
  summary?: boolean;
  content?: boolean;
  tags?: boolean;
};
};

export type AIOptimizeArticleResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AIAutofillArticlePath = {};

export type AIAutofillArticleQuery = {};

export type AIAutofillArticleBody = {
  articleId: string;
  includeExisting?: boolean;
};

export type AIAutofillArticleResponse = Schemas.Envelope & {
  data?: Schemas.AiAutofillResult;
};

export type AIOptimizeArticleStreamPath = {};

export type AIOptimizeArticleStreamQuery = {};

export type AIOptimizeArticleStreamBody = {
  articleId: string;
  primaryKeyword?: string;
  languages?: Array<string>;
  fields?: {
  title?: boolean;
  summary?: boolean;
  content?: boolean;
  tags?: boolean;
};
};

export type AIOptimizeArticleStreamResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AITranslateArticlePath = {};

export type AITranslateArticleQuery = {};

export type AITranslateArticleBody = {
  articleId: string;
  targetLanguages: Array<string>;
  sourceLanguage?: string;
  fields: {
  mainTitle?: boolean;
  title?: boolean;
  title2?: boolean;
  title3?: boolean;
  summary?: boolean;
  content?: boolean;
  tags?: boolean;
};
  incremental?: boolean;
  overwriteReviewed?: boolean;
};

export type AITranslateArticleResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AITranslateArticleStreamPath = {};

export type AITranslateArticleStreamQuery = {};

export type AITranslateArticleStreamBody = {
  articleId: string;
  sourceLanguage?: string;
  targetLanguages: Array<string>;
  fields?: {
  title?: boolean;
  content?: boolean;
  summary?: boolean;
  tags?: boolean;
};
};

export type AITranslateArticleStreamResponse = Schemas.Envelope & {
  data?: unknown;
};

export type AITranslateFormPath = {};

export type AITranslateFormQuery = {};

export type AITranslateFormBody = {
  formId: string;
  targetLanguages: Array<string>;
  sourceLanguage?: string;
  fields?: {
  title?: boolean;
  description?: boolean;
  submitButtonText?: boolean;
  sections?: boolean;
  sectionTitles?: boolean;
  sectionDescriptions?: boolean;
  fieldLabels?: boolean;
  fieldPlaceholders?: boolean;
  fieldOptions?: boolean;
};
};

export type AITranslateFormResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AIRepurposePath = {};

export type AIRepurposeQuery = {};

export type AIRepurposeBody = unknown | unknown;

export type AIRepurposeResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type AIRepurposeStreamPath = {};

export type AIRepurposeStreamQuery = {};

export type AIRepurposeStreamBody = unknown | unknown;

export type AIRepurposeStreamResponse = Schemas.Envelope & {
  data?: unknown;
};

export type AIRepurposeTemplateGETPath = {};

export type AIRepurposeTemplateGETQuery = {};

export type AIRepurposeTemplateGETBody = undefined;

export type AIRepurposeTemplateGETResponse = Schemas.Envelope & {
  data?: Schemas.SocialTemplate;
};

export type AIRepurposeTemplatePUTPath = {};

export type AIRepurposeTemplatePUTQuery = {};

export type AIRepurposeTemplatePUTBody = {
  defaults?: {
  language?: string;
  tone?: "professional" | "friendly" | "casual" | "technical";
  length?: "short" | "medium" | "long";
};
  platforms?: {
  linkedin?: {
  tone?: "professional" | "friendly" | "casual" | "technical";
  length?: "short" | "medium" | "long";
  opening?: string;
  closing?: string;
  ctaTemplate?: string;
  hashtagStyle?: string;
  maxHashtags?: number;
  extraInstructions?: string;
};
  twitter?: {
  tone?: "professional" | "friendly" | "casual" | "technical";
  length?: "short" | "medium" | "long";
  opening?: string;
  closing?: string;
  ctaTemplate?: string;
  hashtagStyle?: string;
  maxHashtags?: number;
  extraInstructions?: string;
};
  telegram?: {
  tone?: "professional" | "friendly" | "casual" | "technical";
  length?: "short" | "medium" | "long";
  opening?: string;
  closing?: string;
  ctaTemplate?: string;
  hashtagStyle?: string;
  maxHashtags?: number;
  extraInstructions?: string;
};
  instagram?: {
  tone?: "professional" | "friendly" | "casual" | "technical";
  length?: "short" | "medium" | "long";
  opening?: string;
  closing?: string;
  ctaTemplate?: string;
  hashtagStyle?: string;
  maxHashtags?: number;
  extraInstructions?: string;
};
};
};

export type AIRepurposeTemplatePUTResponse = Schemas.Envelope & {
  data?: Schemas.SocialTemplate;
};

export type AISocialConnectionsPath = {};

export type AISocialConnectionsQuery = {};

export type AISocialConnectionsBody = undefined;

export type AISocialConnectionsResponse = Schemas.Envelope & {
  data?: Schemas.SocialConnectionList;
};

export type AISocialLinkedinConnectPath = {};

export type AISocialLinkedinConnectQuery = {};

export type AISocialLinkedinConnectBody = {
  accessToken: string;
  authorUrn: string;
};

export type AISocialLinkedinConnectResponse = Schemas.Envelope & {
  data?: Schemas.SocialConnection;
};

export type AISocialTelegramConnectPath = {};

export type AISocialTelegramConnectQuery = {};

export type AISocialTelegramConnectBody = {
  botToken: string;
  chatId: string;
};

export type AISocialTelegramConnectResponse = Schemas.Envelope & {
  data?: Schemas.SocialConnection;
};

export type AISocialTwitterConnectPath = {};

export type AISocialTwitterConnectQuery = {};

export type AISocialTwitterConnectBody = {
  bearerToken: string;
};

export type AISocialTwitterConnectResponse = Schemas.Envelope & {
  data?: Schemas.SocialConnection;
};

export type AISocialLinkedinPublishPath = {};

export type AISocialLinkedinPublishQuery = {};

export type AISocialLinkedinPublishBody = {
  text: string;
  visibility?: "PUBLIC" | "CONNECTIONS";
};

export type AISocialLinkedinPublishResponse = Schemas.Envelope & {
  data?: Schemas.SocialPublishResult;
};

export type AISocialTelegramPublishPath = {};

export type AISocialTelegramPublishQuery = {};

export type AISocialTelegramPublishBody = {
  text: string;
  parseMode?: "Markdown" | "MarkdownV2" | "HTML";
  disableWebPagePreview?: boolean;
};

export type AISocialTelegramPublishResponse = Schemas.Envelope & {
  data?: Schemas.SocialPublishResult;
};

export type AISocialTwitterPublishPath = {};

export type AISocialTwitterPublishQuery = {};

export type AISocialTwitterPublishBody = {
  text: string;
};

export type AISocialTwitterPublishResponse = Schemas.Envelope & {
  data?: Schemas.SocialPublishResult;
};

export type AIConversationConversationStartPath = {};

export type AIConversationConversationStartQuery = {};

export type AIConversationConversationStartBody = {
  prompt: string;
};

export type AIConversationConversationStartResponse = Schemas.Envelope & {
  data?: Schemas.ConversationStart;
};

export type AIConversationConversationContinuePath = {};

export type AIConversationConversationContinueQuery = {};

export type AIConversationConversationContinueBody = {
  conversationId: string;
  userMessage: string;
};

export type AIConversationConversationContinueResponse = Schemas.Envelope & {
  data?: Schemas.AIConversationContinue;
};

export type AIConversationConversationConversationIdPath = {
  conversationId: string;
};

export type AIConversationConversationConversationIdQuery = {};

export type AIConversationConversationConversationIdBody = undefined;

export type AIConversationConversationConversationIdResponse = Schemas.Envelope & {
  data?: Schemas.AIConversation;
};

export type AIConversationConversationGenerateStreamPath = {};

export type AIConversationConversationGenerateStreamQuery = {};

export type AIConversationConversationGenerateStreamBody = {
  conversationId: string;
  userMessage: string;
};

export type AIConversationConversationGenerateStreamResponse = Schemas.Envelope & {
  data?: unknown;
};

export type AIConversationConversationGeneratePath = {};

export type AIConversationConversationGenerateQuery = {};

export type AIConversationConversationGenerateBody = {
  conversationId: string;
  userMessage: string;
};

export type AIConversationConversationGenerateResponse = Schemas.Envelope & {
  data?: Schemas.ConversationGenerate;
};

export type AIConversationConversationRegeneratePath = {};

export type AIConversationConversationRegenerateQuery = {};

export type AIConversationConversationRegenerateBody = {
  conversationId: string;
};

export type AIConversationConversationRegenerateResponse = Schemas.Envelope & {
  data?: Schemas.AIConversationRegenerate;
};

export type AICreditsPath = {};

export type AICreditsQuery = {};

export type AICreditsBody = undefined;

export type AICreditsResponse = Schemas.Envelope & {
  data?: Schemas.CreditSnapshot;
};

export type AIEstimatePath = {};

export type AIEstimateQuery = {};

export type AIEstimateBody = {
  actionId: string;
  args?: {
  [key: string]: unknown;
};
};

export type AIEstimateResponse = Schemas.Envelope & {
  data?: Schemas.TokenEstimate;
};

export type AIRunPath = {};

export type AIRunQuery = {};

export type AIRunBody = {
  actionId: string;
  args?: {
  [key: string]: unknown;
};
  runId?: string;
};

export type AIRunResponse = Schemas.Envelope & {
  data?: {
  [key: string]: unknown;
};
};

export type AICreditsRunsPath = {};

export type AICreditsRunsQuery = {
  limit?: number;
  page?: number;
};

export type AICreditsRunsBody = undefined;

export type AICreditsRunsResponse = Schemas.Envelope & {
  data?: Schemas.AiRunList;
};

export type AICreditsRunsRunIdPath = {
  runId: string;
};

export type AICreditsRunsRunIdQuery = {};

export type AICreditsRunsRunIdBody = undefined;

export type AICreditsRunsRunIdResponse = Schemas.Envelope & {
  data?: {
  run?: Schemas.AiRunListItem;
};
};

export type AICreditsRunsRunIdCancelPath = {
  runId: string;
};

export type AICreditsRunsRunIdCancelQuery = {};

export type AICreditsRunsRunIdCancelBody = undefined;

export type AICreditsRunsRunIdCancelResponse = Schemas.Envelope & {
  data?: {
  run?: Schemas.AiRunListItem;
};
};

export type AICreditsRunsRunIdRetryPath = {
  runId: string;
};

export type AICreditsRunsRunIdRetryQuery = {};

export type AICreditsRunsRunIdRetryBody = undefined;

export type AICreditsRunsRunIdRetryResponse = Schemas.Envelope & {
  data?: Schemas.AiRunSubmission;
};

export type AIEventsStreamPath = {};

export type AIEventsStreamQuery = {
  lastId?: string;
};

export type AIEventsStreamBody = undefined;

export type AIEventsStreamResponse = unknown;

export type AIProposalsPOSTPath = {};

export type AIProposalsPOSTQuery = {};

export type AIProposalsPOSTBody = {
  articleId: string;
  actionId: string;
  paths?: Array<string>;
  after?: {
  [key: string]: unknown;
};
  locale?: string;
  mapPatches?: Array<{
  path: "galleryAlt";
  key: string;
  after: string;
  lang?: string;
}>;
};

export type AIProposalsPOSTResponse = Schemas.Envelope & {
  data?: Schemas.AiProposal;
};

export type AIProposalsGETPath = {};

export type AIProposalsGETQuery = {
  articleId?: string;
  status?: "pending" | "accepted" | "rejected" | "reverted" | "expired";
  limit?: number;
  skip?: number;
};

export type AIProposalsGETBody = undefined;

export type AIProposalsGETResponse = Schemas.Envelope & {
  data?: Array<Schemas.AiProposal>;
};

export type AIProposalsCountPath = {};

export type AIProposalsCountQuery = {};

export type AIProposalsCountBody = undefined;

export type AIProposalsCountResponse = Schemas.Envelope & {
  data?: Schemas.AiProposalCount;
};

export type AIProposalsIdPath = {
  id: string;
};

export type AIProposalsIdQuery = {};

export type AIProposalsIdBody = undefined;

export type AIProposalsIdResponse = Schemas.Envelope & {
  data?: Schemas.AiProposal;
};

export type AIProposalsIdAcceptPath = {
  id: string;
};

export type AIProposalsIdAcceptQuery = {};

export type AIProposalsIdAcceptBody = undefined;

export type AIProposalsIdAcceptResponse = Schemas.Envelope & {
  data?: Schemas.AiProposalDecision;
};

export type AIProposalsIdRejectPath = {
  id: string;
};

export type AIProposalsIdRejectQuery = {};

export type AIProposalsIdRejectBody = undefined;

export type AIProposalsIdRejectResponse = Schemas.Envelope & {
  data?: Schemas.AiProposal;
};

export type AIProposalsIdUndoPath = {
  id: string;
};

export type AIProposalsIdUndoQuery = {};

export type AIProposalsIdUndoBody = undefined;

export type AIProposalsIdUndoResponse = Schemas.Envelope & {
  data?: Schemas.AiProposal;
};

export type AIProposalsBulkAcceptPath = {};

export type AIProposalsBulkAcceptQuery = {};

export type AIProposalsBulkAcceptBody = {
  ids: Array<string>;
};

export type AIProposalsBulkAcceptResponse = Schemas.Envelope & {
  data?: Array<Schemas.AiProposalBulkResultItem>;
};

export type AISettingsGETPath = {};

export type AISettingsGETQuery = {};

export type AISettingsGETBody = undefined;

export type AISettingsGETResponse = Schemas.Envelope & {
  data?: Schemas.AiSettings;
};

export type AISettingsPUTPath = {};

export type AISettingsPUTQuery = {};

export type AISettingsPUTBody = {
  brandVoice?: string;
  glossary?: Array<{
  term: string;
  translation: string;
}>;
  autoApply?: boolean;
  defaultTier?: "fast" | "balanced" | "strong";
  featureFlags?: {
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
  autoApplyPolicy?: {
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
  dailyQuotaPerUser?: number;
  defaultLocales?: Array<string>;
  piiMasking?: {
  submissions?: boolean;
  comments?: boolean;
};
  retentionDays?: number;
  modelTierOverrides?: {
  [key: string]: "fast" | "balanced" | "strong";
};
  brandVoiceProfile?: {
  tone?: string;
  audience?: string;
  readingLevel?: string;
  do?: Array<string>;
  dont?: Array<string>;
  bannedTerms?: Array<string>;
  examples?: Array<string>;
  persianRegister?: "formal" | "neutral" | "casual";
};
};

export type AISettingsPUTResponse = Schemas.Envelope & {
  data?: Schemas.AiSettings;
};

export type ArticlesCreatePath = {};

export type ArticlesCreateQuery = {};

export type ArticlesCreateBody = {
  mainTitle: Schemas.MultilingualString;
  title2?: Schemas.MultilingualString;
  title3?: Schemas.MultilingualString;
  slug?: string;
  summary?: Schemas.MultilingualString;
  content: Schemas.MultilingualString;
  thumbnail?: string;
  tags?: Array<string>;
  category: Array<string>;
  subCategory?: Array<string>;
  author?: string;
  gallery?: Array<string>;
  galleryAlt?: {
  [key: string]: string;
};
  videos?: Array<string>;
  audios?: Array<string>;
  documents?: Array<string>;
  files?: Array<string>;
  publishDate?: string;
  isPublished?: boolean;
  isPrivate?: boolean;
  language?: string;
  engagement?: Schemas.ArticleEngagementOverride;
  autoSummarize?: boolean;
};

export type ArticlesCreateResponse = Schemas.Envelope & {
  data?: Schemas.ArticleWrapper;
};

export type ArticlesUpdatePath = {};

export type ArticlesUpdateQuery = {};

export type ArticlesUpdateBody = {
  id: string;
  mainTitle?: Schemas.MultilingualString;
  title2?: Schemas.MultilingualString;
  title3?: Schemas.MultilingualString;
  slug?: string;
  summary?: Schemas.MultilingualString;
  content?: Schemas.MultilingualString;
  thumbnail?: string;
  tags?: Array<string>;
  category?: Array<string>;
  subCategory?: Array<string>;
  author?: string;
  gallery?: Array<string>;
  galleryAlt?: {
  [key: string]: string;
};
  videos?: Array<string>;
  audios?: Array<string>;
  documents?: Array<string>;
  files?: Array<string>;
  publishDate?: string;
  isPublished?: boolean;
  isPrivate?: boolean;
  engagement?: Schemas.ArticleEngagementOverride;
};

export type ArticlesUpdateResponse = Schemas.Envelope & {
  data?: Schemas.ArticleWrapper;
};

export type ArticlesArchivePath = {};

export type ArticlesArchiveQuery = {};

export type ArticlesArchiveBody = {
  id: string;
};

export type ArticlesArchiveResponse = Schemas.Envelope & {
  data?: unknown;
};

export type ArticlesDeleteIdPath = {
  id: string;
};

export type ArticlesDeleteIdQuery = {};

export type ArticlesDeleteIdBody = undefined;

export type ArticlesDeleteIdResponse = Schemas.Envelope & {
  data?: unknown;
};

export type ArticlesGetAllPath = {};

export type ArticlesGetAllQuery = {
  page?: number;
  limit?: number;
  keyword?: string;
  includeDeleted?: boolean;
  includeUnpublished?: boolean;
  includePrivate?: boolean;
  category?: string;
  subCategory?: string;
  author?: string;
  tags?: string;
  contentSource?: "human" | "ai" | "mixed";
  hasLanguage?: string;
  missingLanguage?: string;
  sortBy?: "createdAt" | "publishDate";
  sortOrder?: "asc" | "desc";
};

export type ArticlesGetAllBody = undefined;

export type ArticlesGetAllResponse = Schemas.Envelope & {
  data?: Schemas.ArticleList;
};

export type ArticlesGetByIdPath = {
  id: string;
};

export type ArticlesGetByIdQuery = {};

export type ArticlesGetByIdBody = undefined;

export type ArticlesGetByIdResponse = Schemas.Envelope & {
  data?: Schemas.ArticleWrapper;
};

export type ArticlesGetBySlugPath = {
  slug: string;
};

export type ArticlesGetBySlugQuery = {};

export type ArticlesGetBySlugBody = undefined;

export type ArticlesGetBySlugResponse = Schemas.Envelope & {
  data?: Schemas.ArticleWrapper;
};

export type ArticlesGetByCategoryIdPath = {
  categoryId: string;
};

export type ArticlesGetByCategoryIdQuery = {
  page?: number;
  limit?: number;
};

export type ArticlesGetByCategoryIdBody = undefined;

export type ArticlesGetByCategoryIdResponse = Schemas.Envelope & {
  data?: Schemas.ArticleList;
};

export type ArticlesGetBySubCategoryIdPath = {
  subCategoryId: string;
};

export type ArticlesGetBySubCategoryIdQuery = {
  page?: number;
  limit?: number;
};

export type ArticlesGetBySubCategoryIdBody = undefined;

export type ArticlesGetBySubCategoryIdResponse = Schemas.Envelope & {
  data?: Schemas.ArticleList;
};

export type ArticlesGetByAuthorIdPath = {
  authorId: string;
};

export type ArticlesGetByAuthorIdQuery = {
  page?: number;
  limit?: number;
};

export type ArticlesGetByAuthorIdBody = undefined;

export type ArticlesGetByAuthorIdResponse = Schemas.Envelope & {
  data?: Schemas.ArticleList;
};

export type ArticlesGetByTagPath = {
  tag: string;
};

export type ArticlesGetByTagQuery = {
  page?: number;
  limit?: number;
};

export type ArticlesGetByTagBody = undefined;

export type ArticlesGetByTagResponse = Schemas.Envelope & {
  data?: Schemas.ArticleList;
};

export type ArticlesGetByCategorySlugPath = {
  slug: string;
};

export type ArticlesGetByCategorySlugQuery = {
  page?: number;
  limit?: number;
  keyword?: string;
  includeDeleted?: boolean;
  includeUnpublished?: boolean;
  includePrivate?: boolean;
  subCategory?: string;
  author?: string;
  tags?: string;
  sortBy?: "createdAt" | "publishDate";
  sortOrder?: "asc" | "desc";
};

export type ArticlesGetByCategorySlugBody = undefined;

export type ArticlesGetByCategorySlugResponse = Schemas.Envelope & {
  data?: Schemas.ArticleList;
};

export type ArticlesGetBySubCategorySlugPath = {
  slug: string;
};

export type ArticlesGetBySubCategorySlugQuery = {
  page?: number;
  limit?: number;
};

export type ArticlesGetBySubCategorySlugBody = undefined;

export type ArticlesGetBySubCategorySlugResponse = Schemas.Envelope & {
  data?: Schemas.ArticleList;
};

export type ArticlesSearchPath = {};

export type ArticlesSearchQuery = {
  keyword?: string;
  page?: number;
  limit?: number;
};

export type ArticlesSearchBody = undefined;

export type ArticlesSearchResponse = Schemas.Envelope & {
  data?: Schemas.ArticleList;
};

export type ArticlesAdvanceSearchPath = {};

export type ArticlesAdvanceSearchQuery = {
  keyword?: string;
  category?: string;
  subCategory?: string;
  author?: string;
  tags?: string;
  page?: number;
  limit?: number;
  sortBy?: "createdAt" | "publishDate";
  sortOrder?: "asc" | "desc";
};

export type ArticlesAdvanceSearchBody = undefined;

export type ArticlesAdvanceSearchResponse = Schemas.Envelope & {
  data?: Schemas.ArticleList;
};

export type ArticlesSeoAnalysisIdPath = {
  id: string;
};

export type ArticlesSeoAnalysisIdQuery = {
  lang?: string;
};

export type ArticlesSeoAnalysisIdBody = undefined;

export type ArticlesSeoAnalysisIdResponse = Schemas.Envelope & {
  data?: Schemas.SeoAnalysisResult;
};

export type ArticlesIdReactionPOSTPath = {
  id: string;
};

export type ArticlesIdReactionPOSTQuery = {};

export type ArticlesIdReactionPOSTBody = {
  type: "like" | "dislike";
  captchaToken?: string;
  guestId?: string;
};

export type ArticlesIdReactionPOSTResponse = Schemas.Envelope & {
  data?: Schemas.ArticleReactionTotals;
};

export type ArticlesIdReactionDELETEPath = {
  id: string;
};

export type ArticlesIdReactionDELETEQuery = {};

export type ArticlesIdReactionDELETEBody = undefined;

export type ArticlesIdReactionDELETEResponse = Schemas.Envelope & {
  data?: Schemas.ArticleReactionTotals;
};

export type ArticlesIdReactionSummaryPath = {
  id: string;
};

export type ArticlesIdReactionSummaryQuery = {};

export type ArticlesIdReactionSummaryBody = undefined;

export type ArticlesIdReactionSummaryResponse = Schemas.Envelope & {
  data?: Schemas.ArticleReactionSummary;
};

export type ArticlesIdCommentsPOSTPath = {
  id: string;
};

export type ArticlesIdCommentsPOSTQuery = {};

export type ArticlesIdCommentsPOSTBody = {
  content: string;
  parentId?: string;
  captchaToken?: string;
  guestId?: string;
};

export type ArticlesIdCommentsPOSTResponse = Schemas.Envelope & {
  data?: Schemas.CommentWrapper;
};

export type ArticlesIdCommentsGETPath = {
  id: string;
};

export type ArticlesIdCommentsGETQuery = {
  page?: number;
  limit?: number;
  sortOrder?: "asc" | "desc";
  parentId?: string;
  rootOnly?: string;
};

export type ArticlesIdCommentsGETBody = undefined;

export type ArticlesIdCommentsGETResponse = Schemas.Envelope & {
  data?: Schemas.CommentListWrapper;
};

export type ArticlesCommentsGetAllPath = {};

export type ArticlesCommentsGetAllQuery = {
  page?: number;
  limit?: number;
  status?: "pending" | "approved" | "rejected";
  from?: string;
  to?: string;
  articleId?: string;
  categoryId?: string;
  articleName?: string;
};

export type ArticlesCommentsGetAllBody = undefined;

export type ArticlesCommentsGetAllResponse = Schemas.Envelope & {
  data?: Schemas.ArticleList;
};

export type ArticlesCommentsMinedQuestionsPath = {};

export type ArticlesCommentsMinedQuestionsQuery = {
  articleId?: string;
  days?: number;
  limit?: number;
};

export type ArticlesCommentsMinedQuestionsBody = undefined;

export type ArticlesCommentsMinedQuestionsResponse = Schemas.Envelope & {
  data?: Schemas.MinedQuestionsWrapper;
};

export type ArticlesCommentsEffectivePolicyPath = {};

export type ArticlesCommentsEffectivePolicyQuery = {
  articleId?: string;
};

export type ArticlesCommentsEffectivePolicyBody = undefined;

export type ArticlesCommentsEffectivePolicyResponse = Schemas.Envelope & {
  data?: Schemas.EffectivePolicyWrapper;
};

export type ArticlesCommentsCommentIdModeratePath = {
  commentId: string;
};

export type ArticlesCommentsCommentIdModerateQuery = {};

export type ArticlesCommentsCommentIdModerateBody = {
  apply?: boolean;
};

export type ArticlesCommentsCommentIdModerateResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type ArticlesCommentsCommentIdReplyDraftPath = {
  commentId: string;
};

export type ArticlesCommentsCommentIdReplyDraftQuery = {};

export type ArticlesCommentsCommentIdReplyDraftBody = {
  instruction?: string;
};

export type ArticlesCommentsCommentIdReplyDraftResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type ArticlesCommentsCommentIdPATCHPath = {
  commentId: string;
};

export type ArticlesCommentsCommentIdPATCHQuery = {};

export type ArticlesCommentsCommentIdPATCHBody = {
  content?: string;
  status?: "pending" | "approved" | "rejected";
  captchaToken?: string;
};

export type ArticlesCommentsCommentIdPATCHResponse = Schemas.Envelope & {
  data?: Schemas.CommentWrapper;
};

export type ArticlesCommentsCommentIdDELETEPath = {
  commentId: string;
};

export type ArticlesCommentsCommentIdDELETEQuery = {};

export type ArticlesCommentsCommentIdDELETEBody = undefined;

export type ArticlesCommentsCommentIdDELETEResponse = Schemas.Envelope & {
  data?: unknown;
};

export type ArticlesCommentsCommentIdReactionPOSTPath = {
  commentId: string;
};

export type ArticlesCommentsCommentIdReactionPOSTQuery = {};

export type ArticlesCommentsCommentIdReactionPOSTBody = {
  type: "like" | "dislike";
  captchaToken?: string;
  guestId?: string;
};

export type ArticlesCommentsCommentIdReactionPOSTResponse = Schemas.Envelope & {
  data?: Schemas.CommentReactionTotals;
};

export type ArticlesCommentsCommentIdReactionDELETEPath = {
  commentId: string;
};

export type ArticlesCommentsCommentIdReactionDELETEQuery = {};

export type ArticlesCommentsCommentIdReactionDELETEBody = undefined;

export type ArticlesCommentsCommentIdReactionDELETEResponse = Schemas.Envelope & {
  data?: Schemas.CommentReactionTotals;
};

export type ArticlesCommentsCommentIdReactionSummaryPath = {
  commentId: string;
};

export type ArticlesCommentsCommentIdReactionSummaryQuery = {};

export type ArticlesCommentsCommentIdReactionSummaryBody = undefined;

export type ArticlesCommentsCommentIdReactionSummaryResponse = Schemas.Envelope & {
  data?: Schemas.CommentReactionSummary;
};

export type ArticlesEngagementSettingsGETPath = {};

export type ArticlesEngagementSettingsGETQuery = {};

export type ArticlesEngagementSettingsGETBody = undefined;

export type ArticlesEngagementSettingsGETResponse = Schemas.Envelope & {
  data?: Schemas.EngagementSettings;
};

export type ArticlesEngagementSettingsPUTPath = {};

export type ArticlesEngagementSettingsPUTQuery = {};

export type ArticlesEngagementSettingsPUTBody = {
  commentsEnabled?: boolean;
  reactionsEnabled?: boolean;
  allowGuestComments?: boolean;
  allowGuestReactions?: boolean;
  autoApproveComments?: boolean;
  requireCaptchaForGuestEngagement?: boolean;
  guestEngagementCaptchaMinScore?: number;
  guestEngagementRateLimitPerMin?: number;
};

export type ArticlesEngagementSettingsPUTResponse = Schemas.Envelope & {
  data?: Schemas.EngagementSettings;
};

export type AIRevisionsArticleIdPath = {
  articleId: string;
};

export type AIRevisionsArticleIdQuery = {
  locale?: string;
  limit?: number;
};

export type AIRevisionsArticleIdBody = undefined;

export type AIRevisionsArticleIdResponse = Schemas.Envelope & {
  data?: Schemas.ArticleRevisionList;
};

export type AIRevisionsArticleIdRevisionIdRestorePath = {
  articleId: string;
  revisionId: string;
};

export type AIRevisionsArticleIdRevisionIdRestoreQuery = {};

export type AIRevisionsArticleIdRevisionIdRestoreBody = undefined;

export type AIRevisionsArticleIdRevisionIdRestoreResponse = Schemas.Envelope & {
  data?: Schemas.ArticleRevisionRestore;
};

export type AIReadinessArticleIdPath = {
  articleId: string;
};

export type AIReadinessArticleIdQuery = {};

export type AIReadinessArticleIdBody = undefined;

export type AIReadinessArticleIdResponse = Schemas.Envelope & {
  data?: Schemas.ArticleReadiness;
};

export type ArticlesArticleIdSeoGETPath = {
  articleId: string;
};

export type ArticlesArticleIdSeoGETQuery = {
  locale?: string;
};

export type ArticlesArticleIdSeoGETBody = undefined;

export type ArticlesArticleIdSeoGETResponse = Schemas.Envelope & {
  data?: Schemas.ArticleSeoMeta;
};

export type ArticlesArticleIdSeoPUTPath = {
  articleId: string;
};

export type ArticlesArticleIdSeoPUTQuery = {
  locale?: string;
};

export type ArticlesArticleIdSeoPUTBody = {
  metaTitle?: Schemas.MultilingualString;
  metaDescription?: Schemas.MultilingualString;
  focusKeyword?: Schemas.MultilingualString;
  secondaryKeywords?: Schemas.MultilingualString;
  canonicalUrl?: Schemas.MultilingualString;
  ogTitle?: Schemas.MultilingualString;
  ogDescription?: Schemas.MultilingualString;
  ogImage?: string;
  robots?: string;
  schemaJson?: Schemas.MultilingualString;
  locale?: string;
};

export type ArticlesArticleIdSeoPUTResponse = Schemas.Envelope & {
  data?: Schemas.ArticleSeoMeta;
};

export type AITranslationStateArticleIdPath = {
  articleId: string;
};

export type AITranslationStateArticleIdQuery = {};

export type AITranslationStateArticleIdBody = undefined;

export type AITranslationStateArticleIdResponse = Schemas.Envelope & {
  data?: Schemas.TranslationStateReport;
};

export type AITranslationStateArticleIdLocaleCompletePath = {
  articleId: string;
  locale: string;
};

export type AITranslationStateArticleIdLocaleCompleteQuery = {};

export type AITranslationStateArticleIdLocaleCompleteBody = {
  sourceLocale?: string;
  blockHashes?: {
  [key: string]: string;
};
};

export type AITranslationStateArticleIdLocaleCompleteResponse = Schemas.Envelope & {
  data?: Schemas.TranslationStateDoc;
};

export type AuthorsCreatePath = {};

export type AuthorsCreateQuery = {};

export type AuthorsCreateBody = {
  name: Schemas.MultilingualString;
  slug: string;
  bio?: Schemas.MultilingualString;
  avatar?: string;
  email: string;
  isPrivate?: boolean;
  isActive?: boolean;
};

export type AuthorsCreateResponse = Schemas.Envelope & {
  data?: Schemas.AuthorWrapper;
};

export type AuthorsUpdatePath = {};

export type AuthorsUpdateQuery = {};

export type AuthorsUpdateBody = {
  id: string;
  name?: Schemas.MultilingualString;
  slug?: string;
  bio?: Schemas.MultilingualString;
  avatar?: string;
  email?: string;
  isPrivate?: boolean;
  isActive?: boolean;
};

export type AuthorsUpdateResponse = Schemas.Envelope & {
  data?: Schemas.AuthorWrapper;
};

export type AuthorsDeleteIdPath = {
  id: string;
};

export type AuthorsDeleteIdQuery = {};

export type AuthorsDeleteIdBody = undefined;

export type AuthorsDeleteIdResponse = Schemas.Envelope & {
  data?: unknown;
};

export type AuthorsGetAllPath = {};

export type AuthorsGetAllQuery = {
  page?: number;
  limit?: number;
};

export type AuthorsGetAllBody = undefined;

export type AuthorsGetAllResponse = Schemas.Envelope & {
  data?: Schemas.AuthorList;
};

export type AuthorsGetByIdPath = {
  id: string;
};

export type AuthorsGetByIdQuery = {};

export type AuthorsGetByIdBody = undefined;

export type AuthorsGetByIdResponse = Schemas.Envelope & {
  data?: Schemas.AuthorWrapper;
};

export type AuthorsGetBySlugPath = {
  slug: string;
};

export type AuthorsGetBySlugQuery = {};

export type AuthorsGetBySlugBody = undefined;

export type AuthorsGetBySlugResponse = Schemas.Envelope & {
  data?: Schemas.AuthorWrapper;
};

export type CampaignsGetAllPath = {};

export type CampaignsGetAllQuery = {
  status?: "planned" | "active" | "done" | "all";
  from?: string;
  to?: string;
};

export type CampaignsGetAllBody = undefined;

export type CampaignsGetAllResponse = Schemas.Envelope & {
  data?: Schemas.CampaignList;
};

export type CampaignsCreatePath = {};

export type CampaignsCreateQuery = {};

export type CampaignsCreateBody = {
  name: string;
  goal?: string;
  description?: string;
  startsAt?: string;
  endsAt?: string;
  status?: "planned" | "active" | "done";
  color?: string;
};

export type CampaignsCreateResponse = Schemas.Envelope & {
  data?: Schemas.CampaignWrapper;
};

export type CampaignsUpdatePath = {};

export type CampaignsUpdateQuery = {};

export type CampaignsUpdateBody = {
  id: Schemas.ObjectId;
  name?: string;
  goal?: string;
  description?: string;
  startsAt?: string;
  endsAt?: string;
  status?: "planned" | "active" | "done";
  color?: string;
};

export type CampaignsUpdateResponse = Schemas.Envelope & {
  data?: Schemas.CampaignWrapper;
};

export type CampaignsDeleteIdPath = {
  id: Schemas.ObjectId;
};

export type CampaignsDeleteIdQuery = {};

export type CampaignsDeleteIdBody = undefined;

export type CampaignsDeleteIdResponse = Schemas.Envelope & {
  data?: Schemas.CampaignWrapper;
};

export type CategoriesCreatePath = {};

export type CategoriesCreateQuery = {};

export type CategoriesCreateBody = {
  name: Schemas.MultilingualString;
  slug: string;
  thumbnail?: string;
  description?: Schemas.MultilingualString;
  isPrivate?: boolean;
  isActive?: boolean;
};

export type CategoriesCreateResponse = Schemas.Envelope & {
  data?: Schemas.CategoryWrapper;
};

export type CategoriesUpdatePath = {};

export type CategoriesUpdateQuery = {};

export type CategoriesUpdateBody = {
  id: string;
  name?: Schemas.MultilingualString;
  slug?: string;
  description?: Schemas.MultilingualString;
  thumbnail?: string;
  isPrivate?: boolean;
  isActive?: boolean;
};

export type CategoriesUpdateResponse = Schemas.Envelope & {
  data?: Schemas.CategoryWrapper;
};

export type CategoriesDeleteIdPath = {
  id: string;
};

export type CategoriesDeleteIdQuery = {};

export type CategoriesDeleteIdBody = undefined;

export type CategoriesDeleteIdResponse = Schemas.Envelope & {
  data?: Schemas.CategoryDeleteResult;
};

export type CategoriesGetAllPath = {};

export type CategoriesGetAllQuery = {
  page?: number;
  limit?: number;
  privacy?: "public" | "private";
};

export type CategoriesGetAllBody = undefined;

export type CategoriesGetAllResponse = Schemas.Envelope & {
  data?: Schemas.CategoryList;
};

export type CategoriesGetByIdPath = {
  id: string;
};

export type CategoriesGetByIdQuery = {};

export type CategoriesGetByIdBody = undefined;

export type CategoriesGetByIdResponse = Schemas.Envelope & {
  data?: Schemas.CategoryWrapper;
};

export type CategoriesGetBySlugPath = {
  slug: string;
};

export type CategoriesGetBySlugQuery = {};

export type CategoriesGetBySlugBody = undefined;

export type CategoriesGetBySlugResponse = Schemas.Envelope & {
  data?: Schemas.CategoryWrapper;
};

export type ContentPlanGetAllPath = {};

export type ContentPlanGetAllQuery = {
  from?: string;
  to?: string;
  status?: "all" | "idea" | "planned" | "in_progress" | "in_review" | "scheduled" | "published" | "postponed" | "cancelled";
  categoryId?: Schemas.ObjectId;
  authorId?: Schemas.ObjectId;
  assigneeId?: Schemas.ObjectId;
  campaignId?: Schemas.ObjectId;
  locale?: string;
  q?: string;
  limit?: number;
};

export type ContentPlanGetAllBody = undefined;

export type ContentPlanGetAllResponse = Schemas.Envelope & {
  data?: Schemas.ContentPlanList;
};

export type ContentPlanCreatePath = {};

export type ContentPlanCreateQuery = {};

export type ContentPlanCreateBody = {
  title: string;
  brief?: string;
  primaryKeyword?: string;
  intent?: "informational" | "navigational" | "commercial" | "transactional" | null;
  funnelStage?: "awareness" | "consideration" | "conversion" | "retention" | null;
  category?: Schemas.ObjectId;
  subCategory?: Schemas.ObjectId;
  author?: Schemas.ObjectId;
  assignee?: Schemas.ObjectId;
  campaign?: Schemas.ObjectId;
  status?: Schemas.ContentPlanStatus;
  dueAt?: string;
  plannedPublishAt?: string;
  timezone?: string;
  locales?: Array<Schemas.ContentPlanLocale>;
  notes?: string;
  tags?: Array<string>;
};

export type ContentPlanCreateResponse = Schemas.Envelope & {
  data?: Schemas.ContentPlanItemWrapper;
};

export type ContentPlanUpdatePath = {};

export type ContentPlanUpdateQuery = {};

export type ContentPlanUpdateBody = {
  id: Schemas.ObjectId;
  title?: string;
  brief?: string;
  primaryKeyword?: string;
  intent?: "informational" | "navigational" | "commercial" | "transactional" | null;
  funnelStage?: "awareness" | "consideration" | "conversion" | "retention" | null;
  category?: Schemas.ObjectId;
  subCategory?: Schemas.ObjectId;
  author?: Schemas.ObjectId;
  assignee?: Schemas.ObjectId;
  campaign?: Schemas.ObjectId;
  status?: Schemas.ContentPlanStatus;
  dueAt?: string;
  plannedPublishAt?: string;
  timezone?: string;
  locales?: Array<Schemas.ContentPlanLocale>;
  notes?: string;
  tags?: Array<string>;
};

export type ContentPlanUpdateResponse = Schemas.Envelope & {
  data?: Schemas.ContentPlanItemWrapper;
};

export type ContentPlanDeleteIdPath = {
  id: Schemas.ObjectId;
};

export type ContentPlanDeleteIdQuery = {};

export type ContentPlanDeleteIdBody = undefined;

export type ContentPlanDeleteIdResponse = Schemas.Envelope & {
  data?: Schemas.ContentPlanItemWrapper;
};

export type ContentPlanIdStartDraftPath = {
  id: Schemas.ObjectId;
};

export type ContentPlanIdStartDraftQuery = {};

export type ContentPlanIdStartDraftBody = {
  sourceLocale?: string;
};

export type ContentPlanIdStartDraftResponse = Schemas.Envelope & {
  data?: Schemas.StartDraftWrapper;
};

export type ContentPlanIdSchedulePath = {
  id: Schemas.ObjectId;
};

export type ContentPlanIdScheduleQuery = {};

export type ContentPlanIdScheduleBody = {
  plannedPublishAt: string;
  publishArticle?: boolean;
};

export type ContentPlanIdScheduleResponse = Schemas.Envelope & {
  data?: Schemas.ScheduleWrapper;
};

export type ContentPlanGapsPath = {};

export type ContentPlanGapsQuery = {
  staleDays?: number;
  locales?: string;
};

export type ContentPlanGapsBody = undefined;

export type ContentPlanGapsResponse = Schemas.Envelope & {
  data?: Schemas.ContentGapReport;
};

export type ContentPlanIdeasFromAiPath = {};

export type ContentPlanIdeasFromAiQuery = {};

export type ContentPlanIdeasFromAiBody = {
  title: string;
  brief?: string;
  primaryKeyword?: string;
  intent?: "informational" | "navigational" | "commercial" | "transactional";
  funnelStage?: "awareness" | "consideration" | "conversion" | "retention";
  category?: Schemas.ObjectId;
  author?: Schemas.ObjectId;
  campaign?: Schemas.ObjectId;
  plannedPublishAt?: string;
  locales?: Array<Schemas.ContentPlanLocale>;
  source?: "ai" | "content_gap";
};

export type ContentPlanIdeasFromAiResponse = Schemas.Envelope & {
  data?: Schemas.ContentPlanItemWrapper;
};

export type ContentPlanAiGenerateIdeasPath = {};

export type ContentPlanAiGenerateIdeasQuery = {};

export type ContentPlanAiGenerateIdeasBody = {
  goal: string;
  audience?: string;
  timeframeWeeks?: number;
  count?: number;
  categories?: Array<Schemas.ObjectId>;
  locales?: Array<string>;
  constraints?: string;
};

export type ContentPlanAiGenerateIdeasResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type ContentPlanAiPlanPeriodPath = {};

export type ContentPlanAiPlanPeriodQuery = {};

export type ContentPlanAiPlanPeriodBody = {
  weeks?: number;
  from?: string;
  locales?: Array<string>;
};

export type ContentPlanAiPlanPeriodResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type ContentPlanAiBestTimePath = {};

export type ContentPlanAiBestTimeQuery = {};

export type ContentPlanAiBestTimeBody = undefined;

export type ContentPlanAiBestTimeResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type ContentPlanAiReschedulePath = {};

export type ContentPlanAiRescheduleQuery = {};

export type ContentPlanAiRescheduleBody = {
  itemId: Schemas.ObjectId;
};

export type ContentPlanAiRescheduleResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type ContentPlanCadenceGETPath = {};

export type ContentPlanCadenceGETQuery = {
  category?: Schemas.ObjectId;
};

export type ContentPlanCadenceGETBody = undefined;

export type ContentPlanCadenceGETResponse = Schemas.Envelope & {
  data?: Schemas.CadenceWrapper;
};

export type ContentPlanCadencePUTPath = {};

export type ContentPlanCadencePUTQuery = {};

export type ContentPlanCadencePUTBody = {
  scope?: "tenant" | "category";
  category?: Schemas.ObjectId;
  postsPerWeek?: number;
  preferredWeekdays?: Array<number>;
  preferredTime?: string;
  timezone?: string;
  weekendDays?: Array<number>;
};

export type ContentPlanCadencePUTResponse = Schemas.Envelope & {
  data?: Schemas.CadenceWrapper;
};

export type FormsCreatePath = {};

export type FormsCreateQuery = {};

export type FormsCreateBody = {
  title: {
  [key: string]: string;
};
  slug: string;
  description?: {
  [key: string]: string;
};
  submitButtonText?: {
  [key: string]: string;
};
  sections: Array<{
  title: {
  [key: string]: string;
};
  icon?: string;
  description?: {
  [key: string]: string;
};
  fields: Array<{
  name: string;
  type: string;
  label: {
  [key: string]: string;
};
  required: boolean;
  options?: Array<{
  value: string;
  label: {
  [key: string]: string;
};
}>;
  colSpan?: number;
  icon?: string;
  disabled?: boolean;
  verified?: boolean;
  defaultValue?: unknown;
  placeholder?: {
  [key: string]: string;
};
  relation?: {
  relatedFormId: string;
  relationType: "one-to-one" | "many-to-one" | "one-to-many" | "many-to-many";
};
}>;
}>;
  isActive?: boolean;
  formType?: "public" | "internal";
  captcha?: {
  enabled?: boolean;
  provider?: "recaptcha" | "hcaptcha" | "turnstile";
  minScore?: number;
};
  notification?: {
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
  relation?: {
  parentFormId?: string;
  nextFormId?: string;
};
};

export type FormsCreateResponse = Schemas.Envelope & {
  data?: Schemas.FormWrapper;
};

export type FormsUpdatePath = {};

export type FormsUpdateQuery = {};

export type FormsUpdateBody = {
  id: string;
  title?: {
  [key: string]: string;
};
  slug?: string;
  description?: {
  [key: string]: string;
};
  submitButtonText?: {
  [key: string]: string;
};
  sections?: Array<Record<string, unknown>>;
  isActive?: boolean;
  formType?: "public" | "internal";
  captcha?: {
  enabled?: boolean;
  provider?: "recaptcha" | "hcaptcha" | "turnstile";
  minScore?: number;
};
  notification?: {
  enabled?: boolean;
  email?: {
  admin?: Record<string, unknown>;
  submitter?: Record<string, unknown>;
};
  push?: {
  admin?: Record<string, unknown>;
  submitter?: Record<string, unknown>;
};
};
  relation?: {
  parentFormId?: string;
  nextFormId?: string;
};
};

export type FormsUpdateResponse = Schemas.Envelope & {
  data?: Schemas.FormNullableWrapper;
};

export type FormsDeletePath = {};

export type FormsDeleteQuery = {};

export type FormsDeleteBody = {
  id: string;
};

export type FormsDeleteResponse = Schemas.Envelope & {
  data?: unknown;
};

export type FormsGetAllPath = {};

export type FormsGetAllQuery = {
  page?: number;
  limit?: number;
  formType?: "public" | "internal";
  status?: "active" | "inactive";
};

export type FormsGetAllBody = undefined;

export type FormsGetAllResponse = Schemas.Envelope & {
  data?: Schemas.FormList;
};

export type FormsGetBySlugPath = {
  slug: string;
};

export type FormsGetBySlugQuery = {};

export type FormsGetBySlugBody = undefined;

export type FormsGetBySlugResponse = Schemas.Envelope & {
  data?: Schemas.FormWrapper;
};

export type FormsGetByIdPath = {
  id: string;
};

export type FormsGetByIdQuery = {};

export type FormsGetByIdBody = undefined;

export type FormsGetByIdResponse = Schemas.Envelope & {
  data?: Schemas.FormWrapper;
};

export type FormsGetNextByIdPath = {
  id: string;
};

export type FormsGetNextByIdQuery = {};

export type FormsGetNextByIdBody = undefined;

export type FormsGetNextByIdResponse = Schemas.Envelope & {
  data?: Schemas.NextFormWrapper;
};

export type FormSubmissionsIdSubmitPath = {
  id: string;
};

export type FormSubmissionsIdSubmitQuery = {};

export type FormSubmissionsIdSubmitBody = {
  language: string;
  captchaToken?: string;
  values: {
  [key: string]: unknown;
};
};

export type FormSubmissionsIdSubmitResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionWrapper;
};

export type FormSubmissionsIdInternalSubmitPath = {
  id: string;
};

export type FormSubmissionsIdInternalSubmitQuery = {};

export type FormSubmissionsIdInternalSubmitBody = {
  language: string;
  values: {
  [key: string]: unknown;
};
  status?: number;
  captchaToken?: string;
};

export type FormSubmissionsIdInternalSubmitResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionWrapper;
};

export type FormSubmissionsSubmissionsGetAllPath = {};

export type FormSubmissionsSubmissionsGetAllQuery = {
  page?: number;
  limit?: number;
  status?: string;
  lang?: string;
  from?: string;
  to?: string;
  formType?: "public" | "internal";
  formName?: string;
};

export type FormSubmissionsSubmissionsGetAllBody = undefined;

export type FormSubmissionsSubmissionsGetAllResponse = Schemas.Envelope & {
  data?: Schemas.FormSubmissionList;
};

export type FormSubmissionsIdGetAllSubmissionsPath = {
  id: string;
};

export type FormSubmissionsIdGetAllSubmissionsQuery = {
  page?: number;
  limit?: number;
  status?: string;
  lang?: string;
};

export type FormSubmissionsIdGetAllSubmissionsBody = undefined;

export type FormSubmissionsIdGetAllSubmissionsResponse = Schemas.Envelope & {
  data?: Schemas.FormSubmissionList;
};

export type FormSubmissionsGetSubmissionByIdPath = {
  id: string;
};

export type FormSubmissionsGetSubmissionByIdQuery = {};

export type FormSubmissionsGetSubmissionByIdBody = undefined;

export type FormSubmissionsGetSubmissionByIdResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionWrapper;
};

export type FormSubmissionsSubmissionIdRelationsPath = {
  id: string;
};

export type FormSubmissionsSubmissionIdRelationsQuery = {
  fieldName?: string;
};

export type FormSubmissionsSubmissionIdRelationsBody = undefined;

export type FormSubmissionsSubmissionIdRelationsResponse = Schemas.Envelope & {
  data?: Schemas.FormSubmissionRelations;
};

export type FormSubmissionsSubmissionIdRelationsFieldNameConnectPath = {
  id: string;
  fieldName: string;
};

export type FormSubmissionsSubmissionIdRelationsFieldNameConnectQuery = {};

export type FormSubmissionsSubmissionIdRelationsFieldNameConnectBody = {
  relatedSubmissionId: string;
};

export type FormSubmissionsSubmissionIdRelationsFieldNameConnectResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionWrapper;
};

export type FormSubmissionsSubmissionIdRelationsFieldNameDisconnectPath = {
  id: string;
  fieldName: string;
};

export type FormSubmissionsSubmissionIdRelationsFieldNameDisconnectQuery = {};

export type FormSubmissionsSubmissionIdRelationsFieldNameDisconnectBody = {
  relatedSubmissionId?: string;
};

export type FormSubmissionsSubmissionIdRelationsFieldNameDisconnectResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionWrapper;
};

export type FormSubmissionsSubmissionIdRelationsFieldNameReorderPath = {
  id: string;
  fieldName: string;
};

export type FormSubmissionsSubmissionIdRelationsFieldNameReorderQuery = {};

export type FormSubmissionsSubmissionIdRelationsFieldNameReorderBody = {
  relatedSubmissionIds: Array<string>;
};

export type FormSubmissionsSubmissionIdRelationsFieldNameReorderResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionWrapper;
};

export type FormSubmissionsSubmissionsRelationsBackfillPath = {};

export type FormSubmissionsSubmissionsRelationsBackfillQuery = {};

export type FormSubmissionsSubmissionsRelationsBackfillBody = {
  formId?: string;
};

export type FormSubmissionsSubmissionsRelationsBackfillResponse = Schemas.Envelope & {
  data?: Schemas.FormRelationsBackfill;
};

export type FormSubmissionsSubmissionUpdateIdPath = {
  id: string;
};

export type FormSubmissionsSubmissionUpdateIdQuery = {};

export type FormSubmissionsSubmissionUpdateIdBody = {
  status?: number;
  values?: {
  [key: string]: unknown;
};
};

export type FormSubmissionsSubmissionUpdateIdResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionRawWrapper;
};

export type FormSubmissionsSubmissionDeleteIdPath = {
  id: string;
};

export type FormSubmissionsSubmissionDeleteIdQuery = {};

export type FormSubmissionsSubmissionDeleteIdBody = undefined;

export type FormSubmissionsSubmissionDeleteIdResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionRawWrapper;
};

export type FormsCaptchaConfigPUTPath = {};

export type FormsCaptchaConfigPUTQuery = {};

export type FormsCaptchaConfigPUTBody = {
  provider: "recaptcha" | "hcaptcha" | "turnstile";
  siteKey?: string;
  secretKey: string;
  isActive?: boolean;
};

export type FormsCaptchaConfigPUTResponse = Schemas.Envelope & {
  data?: Schemas.CaptchaConfigWrapper;
};

export type FormsCaptchaConfigGETPath = {};

export type FormsCaptchaConfigGETQuery = {};

export type FormsCaptchaConfigGETBody = undefined;

export type FormsCaptchaConfigGETResponse = Schemas.Envelope & {
  data?: Schemas.CaptchaConfigWrapper;
};

export type FormsCaptchaConfigSecretPath = {};

export type FormsCaptchaConfigSecretQuery = {};

export type FormsCaptchaConfigSecretBody = {
  secretKey: string;
};

export type FormsCaptchaConfigSecretResponse = Schemas.Envelope & {
  data?: Schemas.CaptchaConfigWrapper;
};

export type FormsAiGeneratePath = {};

export type FormsAiGenerateQuery = {};

export type FormsAiGenerateBody = {
  prompt: string;
  locales?: Array<string>;
  formType?: "public" | "internal";
  maxFields?: number;
  tone?: string;
};

export type FormsAiGenerateResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type FormsIdAiImprovePath = {
  id: string;
};

export type FormsIdAiImproveQuery = {};

export type FormsIdAiImproveBody = {
  locales?: Array<string>;
  focus?: "all" | "labels" | "order" | "validation" | "help";
};

export type FormsIdAiImproveResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type FormSubmissionsSubmissionsFacetsPath = {};

export type FormSubmissionsSubmissionsFacetsQuery = {};

export type FormSubmissionsSubmissionsFacetsBody = undefined;

export type FormSubmissionsSubmissionsFacetsResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionInboxFacets;
};

export type FormSubmissionsSubmissionIdAnalyzePath = {
  id: string;
};

export type FormSubmissionsSubmissionIdAnalyzeQuery = {};

export type FormSubmissionsSubmissionIdAnalyzeBody = {
  applySpamPolicy?: boolean;
};

export type FormSubmissionsSubmissionIdAnalyzeResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type FormSubmissionsSubmissionsAnalyzePath = {};

export type FormSubmissionsSubmissionsAnalyzeQuery = {};

export type FormSubmissionsSubmissionsAnalyzeBody = {
  submissionIds: Array<string>;
};

export type FormSubmissionsSubmissionsAnalyzeResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type FormSubmissionsSubmissionIdNotesPath = {
  id: string;
};

export type FormSubmissionsSubmissionIdNotesQuery = {};

export type FormSubmissionsSubmissionIdNotesBody = {
  note: string;
};

export type FormSubmissionsSubmissionIdNotesResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionActivityWrapper;
};

export type FormSubmissionsSubmissionIdActivityPath = {
  id: string;
};

export type FormSubmissionsSubmissionIdActivityQuery = {};

export type FormSubmissionsSubmissionIdActivityBody = undefined;

export type FormSubmissionsSubmissionIdActivityResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionActivityList;
};

export type FormSubmissionsSubmissionIdReplyDraftPath = {
  id: string;
};

export type FormSubmissionsSubmissionIdReplyDraftQuery = {};

export type FormSubmissionsSubmissionIdReplyDraftBody = {
  instruction?: string;
};

export type FormSubmissionsSubmissionIdReplyDraftResponse = Schemas.Envelope & {
  data?: Schemas.AiRunAccepted;
};

export type FormSubmissionsSubmissionIdReplyPath = {
  id: string;
};

export type FormSubmissionsSubmissionIdReplyQuery = {};

export type FormSubmissionsSubmissionIdReplyBody = {
  replyId?: string;
  subject?: string;
  body?: string;
  templateKey?: string;
};

export type FormSubmissionsSubmissionIdReplyResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionReplyWrapper;
};

export type FormSubmissionsSubmissionsDigestPath = {};

export type FormSubmissionsSubmissionsDigestQuery = {
  days?: number;
  formId?: string;
};

export type FormSubmissionsSubmissionsDigestBody = undefined;

export type FormSubmissionsSubmissionsDigestResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionDigestWrapper;
};

export type LanguagesCreatePath = {};

export type LanguagesCreateQuery = {};

export type LanguagesCreateBody = {
  code: string;
  name: string;
};

export type LanguagesCreateResponse = Schemas.Envelope & {
  data?: Schemas.LanguageWrapper;
};

export type LanguagesGetAllPath = {};

export type LanguagesGetAllQuery = {
  page?: number;
  limit?: number;
};

export type LanguagesGetAllBody = undefined;

export type LanguagesGetAllResponse = Schemas.Envelope & {
  data?: Schemas.LanguageList;
};

export type LanguagesGetByIdPath = {};

export type LanguagesGetByIdQuery = {};

export type LanguagesGetByIdBody = {
  id: string;
};

export type LanguagesGetByIdResponse = Schemas.Envelope & {
  data?: Schemas.Language;
};

export type LanguagesUpdatePath = {};

export type LanguagesUpdateQuery = {};

export type LanguagesUpdateBody = {
  bodyData: {
  id: string;
  code: string;
  name: string;
};
};

export type LanguagesUpdateResponse = Schemas.Envelope & {
  data?: Schemas.LanguageWrapper;
};

export type LanguagesDeleteIdPath = {
  id: string;
};

export type LanguagesDeleteIdQuery = {};

export type LanguagesDeleteIdBody = undefined;

export type LanguagesDeleteIdResponse = Schemas.Envelope & {
  data?: unknown;
};

export type MediaGetAllPath = {};

export type MediaGetAllQuery = {
  page?: number;
  limit?: number;
  kind?: "image" | "video" | "audio" | "document" | "other" | "all";
  q?: string;
  tag?: string;
  missingAltIn?: string;
  sort?: "newest" | "oldest" | "largest" | "name";
};

export type MediaGetAllBody = undefined;

export type MediaGetAllResponse = Schemas.Envelope & {
  data?: Schemas.MediaAssetList;
};

export type MediaCreatePath = {};

export type MediaCreateQuery = {};

export type MediaCreateBody = {
  url: string;
  mimeType?: string;
  fileName?: string;
  sizeBytes?: number;
  width?: number;
  height?: number;
};

export type MediaCreateResponse = Schemas.Envelope & {
  data?: Schemas.MediaAssetWrapper;
};

export type MediaUpdatePath = {};

export type MediaUpdateQuery = {};

export type MediaUpdateBody = {
  id: Schemas.ObjectId;
  altText?: {
  [key: string]: string;
};
  caption?: {
  [key: string]: string;
};
  tags?: Array<string>;
};

export type MediaUpdateResponse = Schemas.Envelope & {
  data?: Schemas.MediaAssetWrapper;
};

export type MediaDeleteIdPath = {
  id: Schemas.ObjectId;
};

export type MediaDeleteIdQuery = {};

export type MediaDeleteIdBody = undefined;

export type MediaDeleteIdResponse = Schemas.Envelope & {
  data?: Schemas.MediaAssetWrapper;
};

export type MediaUsagePath = {};

export type MediaUsageQuery = {
  url: string;
};

export type MediaUsageBody = undefined;

export type MediaUsageResponse = Schemas.Envelope & {
  data?: Schemas.MediaUsage;
};

export type MediaAiMetadataPath = {};

export type MediaAiMetadataQuery = {};

export type MediaAiMetadataBody = {
  assetId?: string;
  imageUrl?: string;
  filename?: string;
  context?: string;
  locale?: string;
};

export type MediaAiMetadataResponse = Schemas.Envelope & {
  data?: Schemas.MediaMetadataSuggestion;
};

export type MediaAiMissingAltPath = {};

export type MediaAiMissingAltQuery = {
  locale: string;
  limit?: number;
};

export type MediaAiMissingAltBody = undefined;

export type MediaAiMissingAltResponse = Schemas.Envelope & {
  data?: Schemas.MediaMissingAlt;
};

export type ReportsGetStatisticsPath = {};

export type ReportsGetStatisticsQuery = {};

export type ReportsGetStatisticsBody = undefined;

export type ReportsGetStatisticsResponse = Schemas.Envelope & {
  data?: Schemas.TenantUsageStats;
};

export type ReportsGetUserStatisticsUserIdPath = {
  userId: string;
};

export type ReportsGetUserStatisticsUserIdQuery = {
  from?: string;
  to?: string;
};

export type ReportsGetUserStatisticsUserIdBody = undefined;

export type ReportsGetUserStatisticsUserIdResponse = Schemas.Envelope & {
  data?: Schemas.UserStats;
};

export type ReportsGetAuthorStatisticsAuthorIdPath = {
  authorId: string;
};

export type ReportsGetAuthorStatisticsAuthorIdQuery = {
  from?: string;
  to?: string;
};

export type ReportsGetAuthorStatisticsAuthorIdBody = undefined;

export type ReportsGetAuthorStatisticsAuthorIdResponse = Schemas.Envelope & {
  data?: Schemas.AuthorStats;
};

export type ReportsGetAllUsersStatisticsPath = {};

export type ReportsGetAllUsersStatisticsQuery = {
  page?: number;
  limit?: number;
  sortBy?: "count" | "date";
  order?: "asc" | "desc";
  from?: string;
  to?: string;
};

export type ReportsGetAllUsersStatisticsBody = undefined;

export type ReportsGetAllUsersStatisticsResponse = Schemas.Envelope & {
  data?: Schemas.UsersStatsPage;
};

export type ReportsGetAllAuthorsStatisticsPath = {};

export type ReportsGetAllAuthorsStatisticsQuery = {
  page?: number;
  limit?: number;
  sortBy?: "count" | "date";
  order?: "asc" | "desc";
  from?: string;
  to?: string;
};

export type ReportsGetAllAuthorsStatisticsBody = undefined;

export type ReportsGetAllAuthorsStatisticsResponse = Schemas.Envelope & {
  data?: Schemas.AuthorsStatsPage;
};

export type ReportsContentOverviewPath = {};

export type ReportsContentOverviewQuery = {
  from?: string;
  to?: string;
};

export type ReportsContentOverviewBody = undefined;

export type ReportsContentOverviewResponse = Schemas.Envelope & {
  data?: Schemas.ContentOverviewReport;
};

export type ReportsTopArticlesPath = {};

export type ReportsTopArticlesQuery = {
  metric?: "views" | "engagement" | "publishDate";
  limit?: number;
  from?: string;
  to?: string;
};

export type ReportsTopArticlesBody = undefined;

export type ReportsTopArticlesResponse = Schemas.Envelope & {
  data?: Schemas.TopArticlesReport;
};

export type ReportsAiUsageBreakdownPath = {};

export type ReportsAiUsageBreakdownQuery = {
  from?: string;
  to?: string;
};

export type ReportsAiUsageBreakdownBody = undefined;

export type ReportsAiUsageBreakdownResponse = Schemas.Envelope & {
  data?: Schemas.AiUsageBreakdownReport;
};

export type ReportsFormsOverviewPath = {};

export type ReportsFormsOverviewQuery = {
  from?: string;
  to?: string;
};

export type ReportsFormsOverviewBody = undefined;

export type ReportsFormsOverviewResponse = Schemas.Envelope & {
  data?: Schemas.FormsOverviewReport;
};

export type ReportsSubmissionsOverviewPath = {};

export type ReportsSubmissionsOverviewQuery = {
  from?: string;
  to?: string;
};

export type ReportsSubmissionsOverviewBody = undefined;

export type ReportsSubmissionsOverviewResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionsOverviewReport;
};

export type ReportsChartContentTrendPath = {};

export type ReportsChartContentTrendQuery = {
  groupBy?: "day" | "week" | "month";
  from?: string;
  to?: string;
};

export type ReportsChartContentTrendBody = undefined;

export type ReportsChartContentTrendResponse = Schemas.Envelope & {
  data?: Schemas.ContentTrendReport;
};

export type ReportsChartSubmissionFunnelPath = {};

export type ReportsChartSubmissionFunnelQuery = {
  from?: string;
  to?: string;
};

export type ReportsChartSubmissionFunnelBody = undefined;

export type ReportsChartSubmissionFunnelResponse = Schemas.Envelope & {
  data?: Schemas.SubmissionFunnelReport;
};

export type ReportsChartEngagementTrendPath = {};

export type ReportsChartEngagementTrendQuery = {
  groupBy?: "day" | "week" | "month";
  from?: string;
  to?: string;
};

export type ReportsChartEngagementTrendBody = undefined;

export type ReportsChartEngagementTrendResponse = Schemas.Envelope & {
  data?: Schemas.EngagementTrendReport;
};

export type ReportsPublishingPerformancePath = {};

export type ReportsPublishingPerformanceQuery = {
  limit?: number;
  from?: string;
  to?: string;
};

export type ReportsPublishingPerformanceBody = undefined;

export type ReportsPublishingPerformanceResponse = Schemas.Envelope & {
  data?: Schemas.PublishingPerformanceReport;
};

export type ReportsContentHealthPath = {};

export type ReportsContentHealthQuery = {
  limit?: number;
  from?: string;
  to?: string;
};

export type ReportsContentHealthBody = undefined;

export type ReportsContentHealthResponse = Schemas.Envelope & {
  data?: Schemas.ContentHealthReport;
};

export type ReportsCategoryPerformancePath = {};

export type ReportsCategoryPerformanceQuery = {
  limit?: number;
  from?: string;
  to?: string;
};

export type ReportsCategoryPerformanceBody = undefined;

export type ReportsCategoryPerformanceResponse = Schemas.Envelope & {
  data?: Schemas.CategoryPerformanceReport;
};

export type ReportsPeriodComparisonPath = {};

export type ReportsPeriodComparisonQuery = {
  from?: string;
  to?: string;
};

export type ReportsPeriodComparisonBody = undefined;

export type ReportsPeriodComparisonResponse = Schemas.Envelope & {
  data?: Schemas.PeriodComparisonReport;
};

export type ReportsAiContentImpactPath = {};

export type ReportsAiContentImpactQuery = {
  limit?: number;
  from?: string;
  to?: string;
};

export type ReportsAiContentImpactBody = undefined;

export type ReportsAiContentImpactResponse = Schemas.Envelope & {
  data?: Schemas.AiContentImpactReport;
};

export type ReportsCommentOverviewPath = {};

export type ReportsCommentOverviewQuery = {
  limit?: number;
  from?: string;
  to?: string;
};

export type ReportsCommentOverviewBody = undefined;

export type ReportsCommentOverviewResponse = Schemas.Envelope & {
  data?: Schemas.CommentOverviewReport;
};

export type ReportsDashboardConfigGETPath = {};

export type ReportsDashboardConfigGETQuery = {};

export type ReportsDashboardConfigGETBody = undefined;

export type ReportsDashboardConfigGETResponse = Schemas.Envelope & {
  data?: Schemas.DashboardConfigWrapper;
};

export type ReportsDashboardConfigPUTPath = {};

export type ReportsDashboardConfigPUTQuery = {};

export type ReportsDashboardConfigPUTBody = {
  version?: number;
  templateId?: string;
  slots?: Array<{
  id?: string;
  type?: "operationsOverview" | "tenantCapacity" | "contentTrend" | "summaryOverview" | "topArticles" | "reportIntelligence" | "contentSpotlight" | "needsAttention";
  enabled?: boolean;
  span?: "half" | "full";
  settings?: {
  range?: "1week" | "2weeks" | "1month" | "currentMonth";
};
}>;
};

export type ReportsDashboardConfigPUTResponse = Schemas.Envelope & {
  data?: Schemas.DashboardConfigWrapper;
};

export type ReportsNeedsAttentionPath = {};

export type ReportsNeedsAttentionQuery = {};

export type ReportsNeedsAttentionBody = undefined;

export type ReportsNeedsAttentionResponse = Schemas.Envelope & {
  data?: Schemas.NeedsAttentionReport;
};

export type ReportsWeeklyDigestPath = {};

export type ReportsWeeklyDigestQuery = {
  on?: string;
};

export type ReportsWeeklyDigestBody = undefined;

export type ReportsWeeklyDigestResponse = Schemas.Envelope & {
  data?: Schemas.WeeklyDigestWrapper;
};

export type ReportsSeoHealthPath = {};

export type ReportsSeoHealthQuery = {
  from?: string;
  to?: string;
  limit?: number;
};

export type ReportsSeoHealthBody = undefined;

export type ReportsSeoHealthResponse = Schemas.Envelope & {
  data?: Schemas.ReportWrapper;
};

export type ReportsTranslationCoveragePath = {};

export type ReportsTranslationCoverageQuery = {
  locales?: string;
  limit?: number;
};

export type ReportsTranslationCoverageBody = undefined;

export type ReportsTranslationCoverageResponse = Schemas.Envelope & {
  data?: Schemas.ReportWrapper;
};

export type ReportsCalendarAdherencePath = {};

export type ReportsCalendarAdherenceQuery = {
  from?: string;
  to?: string;
  limit?: number;
};

export type ReportsCalendarAdherenceBody = undefined;

export type ReportsCalendarAdherenceResponse = Schemas.Envelope & {
  data?: Schemas.ReportWrapper;
};

export type ReportsAiAcceptancePath = {};

export type ReportsAiAcceptanceQuery = {
  from?: string;
  to?: string;
  limit?: number;
};

export type ReportsAiAcceptanceBody = undefined;

export type ReportsAiAcceptanceResponse = Schemas.Envelope & {
  data?: Schemas.ReportWrapper;
};

export type SEOHubAuditPath = {};

export type SEOHubAuditQuery = {
  shallow?: boolean;
  limit?: number;
  code?: "missing_meta_title" | "missing_meta_description" | "duplicate_title" | "thin_content" | "missing_alt_text" | "broken_heading_order" | "orphan_page" | "missing_keyword" | "no_traffic";
};

export type SEOHubAuditBody = undefined;

export type SEOHubAuditResponse = Schemas.Envelope & {
  data?: Schemas.SeoAuditReport;
};

export type SEOHubCannibalizationPath = {};

export type SEOHubCannibalizationQuery = {
  limit?: number;
};

export type SEOHubCannibalizationBody = undefined;

export type SEOHubCannibalizationResponse = Schemas.Envelope & {
  data?: Schemas.CannibalizationReport;
};

export type SEOHubRefreshPath = {};

export type SEOHubRefreshQuery = {
  staleDays?: number;
  limit?: number;
  dailyViews?: string;
};

export type SEOHubRefreshBody = undefined;

export type SEOHubRefreshResponse = Schemas.Envelope & {
  data?: Schemas.RefreshCandidateReport;
};

export type SEOHubRefreshArticleIdPlanItemPath = {
  articleId: Schemas.ObjectId;
};

export type SEOHubRefreshArticleIdPlanItemQuery = {};

export type SEOHubRefreshArticleIdPlanItemBody = undefined;

export type SEOHubRefreshArticleIdPlanItemResponse = Schemas.Envelope & {
  data?: Schemas.RefreshPlanItemWrapper;
};

export type SEOHubHreflangArticleIdPath = {
  articleId: Schemas.ObjectId;
};

export type SEOHubHreflangArticleIdQuery = {
  baseUrl?: string;
  localeStrategy?: "prefix" | "query" | "none";
};

export type SEOHubHreflangArticleIdBody = undefined;

export type SEOHubHreflangArticleIdResponse = Schemas.Envelope & {
  data?: Schemas.HreflangWrapper;
};

export type SEOHubRedirectsPath = {};

export type SEOHubRedirectsQuery = {
  from?: string;
  limit?: number;
};

export type SEOHubRedirectsBody = undefined;

export type SEOHubRedirectsResponse = Schemas.Envelope & {
  data?: Schemas.RedirectList;
};

export type SEOHubTranslationCoveragePath = {};

export type SEOHubTranslationCoverageQuery = {
  locales?: string;
  limit?: number;
};

export type SEOHubTranslationCoverageBody = undefined;

export type SEOHubTranslationCoverageResponse = Schemas.Envelope & {
  data?: Schemas.TranslationCoverageReport;
};

export type SEOHubContentTypesPath = {};

export type SEOHubContentTypesQuery = {
  type?: "blog" | "case_study" | "landing" | "news";
};

export type SEOHubContentTypesBody = undefined;

export type SEOHubContentTypesResponse = Schemas.Envelope & {
  data?: Schemas.ContentTypeProfileWrapper;
};

export type SubcategoriesCreatePath = {};

export type SubcategoriesCreateQuery = {};

export type SubcategoriesCreateBody = {
  name: Schemas.MultilingualString;
  slug?: string;
  categoryId: string;
  description?: Schemas.MultilingualString;
  icon?: string;
  banner?: string;
  order?: number;
  isActive?: boolean;
};

export type SubcategoriesCreateResponse = Schemas.Envelope & {
  data?: Schemas.SubCategoryWrapper;
};

export type SubcategoriesUpdatePath = {};

export type SubcategoriesUpdateQuery = {};

export type SubcategoriesUpdateBody = {
  id: string;
  name?: Schemas.MultilingualString;
  slug?: string;
  categoryId?: string;
  description?: Schemas.MultilingualString;
  icon?: string;
  banner?: string;
  order?: number;
  isActive?: boolean;
};

export type SubcategoriesUpdateResponse = Schemas.Envelope & {
  data?: Schemas.SubCategoryWrapper;
};

export type SubcategoriesDeleteIdPath = {
  id: string;
};

export type SubcategoriesDeleteIdQuery = {};

export type SubcategoriesDeleteIdBody = undefined;

export type SubcategoriesDeleteIdResponse = Schemas.Envelope & {
  data?: unknown;
};

export type SubcategoriesGetAllPath = {};

export type SubcategoriesGetAllQuery = {
  page?: number;
  limit?: number;
  keyword?: string;
  categoryId?: string;
  includeInactive?: boolean;
  sortBy?: "order" | "createdAt";
  sortOrder?: "asc" | "desc";
};

export type SubcategoriesGetAllBody = undefined;

export type SubcategoriesGetAllResponse = Schemas.Envelope & {
  data?: Schemas.SubCategoryList;
};

export type SubcategoriesGetByIdPath = {
  id: string;
};

export type SubcategoriesGetByIdQuery = {};

export type SubcategoriesGetByIdBody = undefined;

export type SubcategoriesGetByIdResponse = Schemas.Envelope & {
  data?: Schemas.SubCategoryWrapper;
};

export type SubcategoriesGetBySlugPath = {
  slug: string;
};

export type SubcategoriesGetBySlugQuery = {};

export type SubcategoriesGetBySlugBody = undefined;

export type SubcategoriesGetBySlugResponse = Schemas.Envelope & {
  data?: Schemas.SubCategoryWrapper;
};

export type SubcategoriesGetByCategoryIdPath = {
  categoryId: string;
};

export type SubcategoriesGetByCategoryIdQuery = {
  page?: number;
  limit?: number;
};

export type SubcategoriesGetByCategoryIdBody = undefined;

export type SubcategoriesGetByCategoryIdResponse = Schemas.Envelope & {
  data?: Schemas.SubCategoryList;
};

export type TagsCreatePath = {};

export type TagsCreateQuery = {};

export type TagsCreateBody = {
  name: string;
};

export type TagsCreateResponse = Schemas.Envelope & {
  data?: Schemas.TagWrapper;
};

export type TagsGetAllPath = {};

export type TagsGetAllQuery = {
  page?: number;
  limit?: number;
};

export type TagsGetAllBody = undefined;

export type TagsGetAllResponse = Schemas.Envelope & {
  data?: Schemas.TagList;
};

export type TagsSearchPath = {};

export type TagsSearchQuery = {
  q: string;
  limit?: number;
};

export type TagsSearchBody = undefined;

export type TagsSearchResponse = Schemas.Envelope & {
  data?: Schemas.TagSearchResult;
};

export type TaxonomyAuditPath = {};

export type TaxonomyAuditQuery = {
  severity?: "high" | "medium" | "low";
};

export type TaxonomyAuditBody = undefined;

export type TaxonomyAuditResponse = Schemas.Envelope & {
  data?: Schemas.TaxonomyAudit;
};

export type TaxonomyCategorySeoPath = {};

export type TaxonomyCategorySeoQuery = {};

export type TaxonomyCategorySeoBody = {
  entityType: "category" | "subcategory";
  entityId: Schemas.ObjectId;
  locales?: Array<string>;
};

export type TaxonomyCategorySeoResponse = Schemas.Envelope & {
  data?: Schemas.CategorySeoSuggestion;
};

export type TaxonomySuggestTagsPath = {};

export type TaxonomySuggestTagsQuery = {};

export type TaxonomySuggestTagsBody = {
  text: string;
  existingTags?: Array<string>;
};

export type TaxonomySuggestTagsResponse = Schemas.Envelope & {
  data?: Schemas.TagSuggestions;
};

export type TaxonomyTagsMergePath = {};

export type TaxonomyTagsMergeQuery = {};

export type TaxonomyTagsMergeBody = {
  fromTag: string;
  intoTag: string;
};

export type TaxonomyTagsMergeResponse = Schemas.Envelope & {
  data?: Schemas.TagMergeResult;
};

export type TaxonomyTagsRefreshUsagePath = {};

export type TaxonomyTagsRefreshUsageQuery = {};

export type TaxonomyTagsRefreshUsageBody = undefined;

export type TaxonomyTagsRefreshUsageResponse = Schemas.Envelope & {
  data?: Schemas.TagUsageRefresh;
};

export type TaxonomyAuthorBioPath = {};

export type TaxonomyAuthorBioQuery = {};

export type TaxonomyAuthorBioBody = {
  authorId: Schemas.ObjectId;
  locales?: Array<string>;
};

export type TaxonomyAuthorBioResponse = Schemas.Envelope & {
  data?: Schemas.AuthorBioSuggestion;
};

export type TaxonomyAuthorsSuggestPath = {};

export type TaxonomyAuthorsSuggestQuery = {};

export type TaxonomyAuthorsSuggestBody = {
  brief: string;
};

export type TaxonomyAuthorsSuggestResponse = Schemas.Envelope & {
  data?: Schemas.AuthorSuggestions;
};
