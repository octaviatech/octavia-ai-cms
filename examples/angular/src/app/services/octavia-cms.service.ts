import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";

export type Content = {
  id: string;
  title: string;
  body: string;
  locale: string;
  status: "draft" | "published";
  createdAt: string;
};

export type FormItem = {
  id: string;
  title: string;
  slug: string;
};

@Injectable({ providedIn: "root" })
export class OctaviaCmsService {
  private base = "http://localhost:4000/demo";

  constructor(private http: HttpClient) {}

  list(): Observable<Content[]> {
    return this.http.get<Content[]>(`${this.base}/content`);
  }

  create(payload: Pick<Content, "title" | "body" | "locale">): Observable<Content> {
    return this.http.post<Content>(`${this.base}/content`, payload);
  }

  publish(id: string): Observable<Content> {
    return this.http.post<Content>(`${this.base}/content/${id}/publish`, {});
  }

  listForms(): Observable<FormItem[]> {
    return this.http.get<FormItem[]>(`${this.base}/forms`);
  }

  submitForm(id: string, answers: Record<string, unknown>): Observable<unknown> {
    return this.http.post<unknown>(`${this.base}/forms/${id}/submit`, answers);
  }
}

