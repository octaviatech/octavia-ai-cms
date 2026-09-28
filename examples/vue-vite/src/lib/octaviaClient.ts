// Browser-side client. It talks to this app's own dev-server proxy at
// `/api/octavia/*` and nothing else.
//
// The Octavia SDK is deliberately NOT imported here: it is a Node-side module,
// and the API key it needs lives on the server. See `server/octaviaProxy.ts`.

export type Content = { id:string; title:string; body:string; locale:string; status:'draft'|'published'; createdAt:string };
export type FormItem = { id:string; title:string; slug:string; isActive:boolean; sections:number };
export type Statistics = Record<string, unknown>;

const BASE = '/api/octavia';

async function request<T>(path:string, init?:RequestInit):Promise<T> {
  const res = await fetch(`${BASE}${path}`, {
    ...init,
    headers: { 'Content-Type': 'application/json', ...(init?.headers ?? {}) },
  });

  const payload = await res.json().catch(() => null);
  if (!res.ok) {
    throw new Error((payload && payload.error) || `Request failed with status ${res.status}`);
  }
  return payload as T;
}

export const octaviaClient = {
  list: (): Promise<Content[]> => request<Content[]>('/articles'),

  create: (payload:{ title:string; body:string; locale?:string }): Promise<Content> =>
    request<Content>('/articles', { method:'POST', body:JSON.stringify(payload) }),

  publish: (id:string): Promise<Content> =>
    request<Content>(`/articles/${encodeURIComponent(id)}/publish`, { method:'POST' }),

  getForm: (formId: string): Promise<FormItem> => request<FormItem>(`/forms/${encodeURIComponent(formId)}`),

  submitForm: (formId:string, values:Record<string, unknown>, language='en'): Promise<{ok:true}> =>
    request<{ok:true}>(`/forms/${encodeURIComponent(formId)}/submit`, {
      method:'POST',
      body:JSON.stringify({ values, language }),
    }),

  getStatistics: (): Promise<Statistics> => request<Statistics>('/statistics'),

  summarize: (text:string, maxWords=80): Promise<{summary:string}> =>
    request<{summary:string}>('/ai/summarize', { method:'POST', body:JSON.stringify({ text, maxWords }) }),
};
