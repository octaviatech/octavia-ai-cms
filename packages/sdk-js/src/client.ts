import { HttpClient, SseEvent } from "./http";
import { ClientConfig, RequestOptions } from "./types";
import {
  // @generated imports:begin
  AIResource,
  AIConversationResource,
  ArticlesResource,
  AuthorsResource,
  CampaignsResource,
  CategoriesResource,
  ContentPlanResource,
  FormsResource,
  FormSubmissionsResource,
  LanguagesResource,
  MediaResource,
  ReportsResource,
  SEOHubResource,
  SubcategoriesResource,
  TagsResource,
  TaxonomyResource,
  // @generated imports:end
} from "./resources";

export class OctaviaClient {
  private http: HttpClient;
  // @generated fields:begin
  readonly ai: AIResource;
  readonly aIConversation: AIConversationResource;
  readonly articles: ArticlesResource;
  readonly authors: AuthorsResource;
  readonly campaigns: CampaignsResource;
  readonly categories: CategoriesResource;
  readonly contentPlan: ContentPlanResource;
  readonly forms: FormsResource;
  readonly formSubmissions: FormSubmissionsResource;
  readonly languages: LanguagesResource;
  readonly media: MediaResource;
  readonly reports: ReportsResource;
  readonly sEOHub: SEOHubResource;
  readonly subcategories: SubcategoriesResource;
  readonly tags: TagsResource;
  readonly taxonomy: TaxonomyResource;
  // @generated fields:end

  constructor(config: ClientConfig) {
    this.http = new HttpClient(config);
    // @generated ctor:begin
    this.ai = new AIResource(this);
    this.aIConversation = new AIConversationResource(this);
    this.articles = new ArticlesResource(this);
    this.authors = new AuthorsResource(this);
    this.campaigns = new CampaignsResource(this);
    this.categories = new CategoriesResource(this);
    this.contentPlan = new ContentPlanResource(this);
    this.forms = new FormsResource(this);
    this.formSubmissions = new FormSubmissionsResource(this);
    this.languages = new LanguagesResource(this);
    this.media = new MediaResource(this);
    this.reports = new ReportsResource(this);
    this.sEOHub = new SEOHubResource(this);
    this.subcategories = new SubcategoriesResource(this);
    this.tags = new TagsResource(this);
    this.taxonomy = new TaxonomyResource(this);
    // @generated ctor:end
  }

  /**
   * Low-level request helper. Use this to implement resource-specific methods.
   */
  request<T>(method: "GET" | "POST" | "PUT" | "PATCH" | "DELETE", path: string, options?: RequestOptions) {
    return this.http.request<T>(method, path, options);
  }

  /**
   * Consume a `text/event-stream` endpoint as an async iterable of frames.
   * Generated `…Stream()` methods delegate here. Note that no request timeout
   * is applied — a generation can legitimately run for minutes.
   */
  streamSSE(
    method: "GET" | "POST" | "PUT" | "PATCH" | "DELETE",
    path: string,
    options?: RequestOptions,
  ): AsyncGenerator<SseEvent, void, undefined> {
    return this.http.streamSSE(method, path, options);
  }

  /**
   * Example: health check
   */
  health() {
    return this.request("GET", "/healthz");
  }
}

export const createClient = (config: ClientConfig) => new OctaviaClient(config);
