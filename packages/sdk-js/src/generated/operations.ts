// Auto-generated from openapi.json
import type * as Schemas from "./schemas";

export type AISummarizePath = {};

export type AISummarizeQuery = {};

export type AISummarizeBody = {
  text: string;
  maxWords?: number;
};

export type AISummarizeResponse = Schemas.Envelope & {
  data?: Schemas.AiSummaryResult;
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
  data?: Schemas.AiSeoResult;
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
  data?: Schemas.AiTitleResult;
};

export type AITranslatePath = {};

export type AITranslateQuery = {};

export type AITranslateBody = {
  text: string;
  targetLanguage: string;
};

export type AITranslateResponse = Schemas.Envelope & {
  data?: Schemas.AiTranslateResult;
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
  data?: Schemas.AiContentResult;
};

export type AIGenerateImagePath = {};

export type AIGenerateImageQuery = {};

export type AIGenerateImageBody = unknown | unknown;

export type AIGenerateImageResponse = Schemas.Envelope & {
  data?: Schemas.AiImageResult;
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
  data?: Schemas.AiArticleSeoResult;
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
  data?: unknown;
};

export type AITranslateArticlePath = {};

export type AITranslateArticleQuery = {};

export type AITranslateArticleBody = {
  articleId: string;
  targetLanguages: Array<string>;
  sourceLanguage?: string;
  fields: {
  mainTitle?: boolean;
  title2?: boolean;
  title3?: boolean;
  summary?: boolean;
  content?: boolean;
  tags?: boolean;
};
};

export type AITranslateArticleResponse = Schemas.Envelope & {
  data?: Schemas.AiArticleTranslateResult;
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
  data?: Schemas.AiFormTranslateResult;
};

export type AIRepurposePath = {};

export type AIRepurposeQuery = {};

export type AIRepurposeBody = unknown | unknown;

export type AIRepurposeResponse = Schemas.Envelope & {
  data?: Schemas.RepurposeResult;
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

export type ArticlesCreatePath = {};

export type ArticlesCreateQuery = {};

export type ArticlesCreateBody = {
  mainTitle: {
  en?: string;
  es?: string;
};
  title2?: {
  en?: string;
  es?: string;
};
  title3?: {
  en?: string;
  es?: string;
};
  slug?: string;
  summary?: {
  en?: string;
  es?: string;
};
  content: {
  en?: string;
  es?: string;
};
  thumbnail?: string;
  tags?: Array<string>;
  category: Array<string>;
  subCategory?: Array<string>;
  author?: string;
  gallery?: Array<string>;
  publishDate?: string;
  isPublished?: boolean;
  isPrivate?: boolean;
  language?: "en" | "es";
  autoSummarize?: boolean;
};

export type ArticlesCreateResponse = Schemas.Envelope & {
  data?: Schemas.ArticleWrapper;
};

export type ArticlesUpdatePath = {};

export type ArticlesUpdateQuery = {};

export type ArticlesUpdateBody = {
  id: string;
  mainTitle?: {
  en?: string;
  es?: string;
};
  title2?: {
  en?: string;
  es?: string;
};
  title3?: {
  en?: string;
  es?: string;
};
  slug?: string;
  summary?: {
  en?: string;
  es?: string;
};
  content?: {
  en?: string;
  es?: string;
};
  thumbnail?: string;
  tags?: Array<string>;
  category?: Array<string>;
  subCategory?: Array<string>;
  author?: string;
  gallery?: Array<string>;
  publishDate?: string;
  isPublished?: boolean;
  isPrivate?: boolean;
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

export type AuthorsCreatePath = {};

export type AuthorsCreateQuery = {};

export type AuthorsCreateBody = {
  name: {
  en?: string;
  es?: string;
};
  slug: string;
  bio?: {
  en?: string;
  es?: string;
};
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
  name?: {
  en?: string;
  es?: string;
};
  slug?: string;
  bio?: {
  en?: string;
  es?: string;
};
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

export type CategoriesCreatePath = {};

export type CategoriesCreateQuery = {};

export type CategoriesCreateBody = {
  name: {
  en?: string;
  es?: string;
};
  slug: string;
  thumbnail?: string;
  description?: {
  en?: string;
  es?: string;
};
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
  name?: {
  en?: string;
  es?: string;
};
  slug?: string;
  description?: {
  en?: string;
  es?: string;
};
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

export type ReportsGetStatisticsPath = {};

export type ReportsGetStatisticsQuery = {};

export type ReportsGetStatisticsBody = undefined;

export type ReportsGetStatisticsResponse = Schemas.Envelope & {
  data?: Schemas.TenantUsageStats;
};

export type ReportsGetTenantStatisticsTenantIdPath = {
  tenantId: string;
};

export type ReportsGetTenantStatisticsTenantIdQuery = {};

export type ReportsGetTenantStatisticsTenantIdBody = undefined;

export type ReportsGetTenantStatisticsTenantIdResponse = Schemas.Envelope & {
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
  type?: "operationsOverview" | "tenantCapacity" | "contentTrend" | "summaryOverview" | "topArticles" | "reportIntelligence" | "contentSpotlight";
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

export type SubcategoriesCreatePath = {};

export type SubcategoriesCreateQuery = {};

export type SubcategoriesCreateBody = {
  name: {
  en?: string;
  es?: string;
};
  slug?: string;
  categoryId: string;
  description?: {
  en?: string;
  es?: string;
};
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
  name?: {
  en?: string;
  es?: string;
};
  slug?: string;
  categoryId?: string;
  description?: {
  en?: string;
  es?: string;
};
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
