<!doctype html>
<html><body style="font-family:sans-serif;max-width:820px;margin:2rem auto">
<h1>Octavia AI CMS — Laravel</h1>
<p id="error" style="color:crimson"></p>
<input id="title" placeholder="Title" /><br />
<textarea id="body" placeholder="Body"></textarea><br />
<input id="locale" value="en-US" /><br />
<button onclick="createContent()">Create</button> <button onclick="refreshContent()">Refresh</button>
<ul id="list"></ul>
<script>
async function call(url, init){ const r=await fetch(url, init); const j=await r.json(); if(!r.ok){throw new Error(JSON.stringify(j));} return j; }
async function refreshContent(){ try{ const items=await call('/demo/content'); document.getElementById('list').innerHTML=items.map(i=>`<li>${i.title} (${i.status}) <button ${i.status==='published'?'disabled':''} onclick="publishContent('${i.id}')">Publish</button></li>`).join(''); }catch(e){ document.getElementById('error').textContent=e.message; } }
async function createContent(){ const title=document.getElementById('title').value; const body=document.getElementById('body').value; const locale=document.getElementById('locale').value; if(!title||!body||!locale){document.getElementById('error').textContent='All fields are required.'; return;} await call('/demo/content',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({title,body,locale})}); await refreshContent(); }
async function publishContent(id){ await call(`/demo/content/${id}/publish`,{method:'POST'}); await refreshContent(); }
refreshContent();
</script>
</body></html>
