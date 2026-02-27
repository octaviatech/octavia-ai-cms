import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
export type Content = { id:string; title:string; body:string; locale:string; status:'draft'|'published'; createdAt:string };
@Injectable({ providedIn: 'root' })
export class OctaviaCmsService {
  constructor(private http: HttpClient) {}
  list(): Observable<Content[]> { return this.http.get<Content[]>('http://localhost:4000/demo/content'); }
  create(payload: Pick<Content,'title'|'body'|'locale'>): Observable<Content> { return this.http.post<Content>('http://localhost:4000/demo/content', payload); }
  publish(id: string): Observable<Content> { return this.http.post<Content>(`http://localhost:4000/demo/content/${id}/publish`, {}); }
}
