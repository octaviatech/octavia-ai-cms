export type Content = { id:string; title:string; body:string; locale:string; status:'draft'|'published'; createdAt:string };
const base = (import.meta.env.OCTAVIA_API_BASE_URL || '').replace(/\/$/, '');
const headers = { 'Content-Type': 'application/json', Authorization: `Bearer ${import.meta.env.OCTAVIA_API_KEY}`, 'x-octavia-project-id': import.meta.env.OCTAVIA_PROJECT_ID };
async function req<T>(path:string, init?:RequestInit): Promise<T> { const res = await fetch(`${base}${path}`, { ...init, headers: { ...headers, ...(init?.headers||{}) } }); if(!res.ok) throw new Error(`Octavia request failed: ${res.status} ${await res.text()}`); return res.json(); }
export const octaviaClient = { list:()=>req<Content[]>('/v1/cms/content'), create:(payload:Pick<Content,'title'|'body'|'locale'>)=>req<Content>('/v1/cms/content',{method:'POST',body:JSON.stringify(payload)}), publish:(id:string)=>req<Content>(`/v1/cms/content/${id}/publish`,{method:'POST'}) };
