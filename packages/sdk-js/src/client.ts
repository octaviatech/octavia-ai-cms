import { HttpClient } from "./http";
import { ClientConfig, RequestOptions } from "./types";
import {
  // @generated imports:begin
  AIResource,
  AIConversationResource,
  ArticlesResource,
  AuthorsResource,
  CategoriesResource,
  FormsResource,
  FormSubmissionsResource,
  LanguagesResource,
  ReportsResource,
  SubcategoriesResource,
  TagsResource,
  // @generated imports:end
} from "./resources";

export class OctaviaClient {
  private http: HttpClient;
  // @generated fields:begin
  readonly ai: AIResource;
  readonly aIConversation: AIConversationResource;
  readonly articles: ArticlesResource;
  readonly authors: AuthorsResource;
  readonly categories: CategoriesResource;
  readonly forms: FormsResource;
  readonly formSubmissions: FormSubmissionsResource;
  readonly languages: LanguagesResource;
  readonly reports: ReportsResource;
  readonly subcategories: SubcategoriesResource;
  readonly tags: TagsResource;
  // @generated fields:end

  constructor(config: ClientConfig) {
    this.http = new HttpClient(config);
    // @generated ctor:begin
    this.ai = new AIResource(this);
    this.aIConversation = new AIConversationResource(this);
    this.articles = new ArticlesResource(this);
    this.authors = new AuthorsResource(this);
    this.categories = new CategoriesResource(this);
    this.forms = new FormsResource(this);
    this.formSubmissions = new FormSubmissionsResource(this);
    this.languages = new LanguagesResource(this);
    this.reports = new ReportsResource(this);
    this.subcategories = new SubcategoriesResource(this);
    this.tags = new TagsResource(this);
    // @generated ctor:end
  }

  /**
   * Low-level request helper. Use this to implement resource-specific methods.
   */
  request<T>(method: "GET" | "POST" | "PUT" | "PATCH" | "DELETE", path: string, options?: RequestOptions) {
    return this.http.request<T>(method, path, options);
  }

  /**
   * Example: health check
   */
  health() {
    return this.request("GET", "/healthz");
  }
}

export const createClient = (config: ClientConfig) => new OctaviaClient(config);
