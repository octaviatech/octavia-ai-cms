<script setup lang="ts">
type Content = { id:string; title:string; body:string; locale:string; status:'draft'|'published'; createdAt:string };
const title=ref(''); const body=ref(''); const locale=ref('en-US'); const items=ref<Content[]>([]); const error=ref('');
const refresh = async()=>{ try{ items.value = await $fetch('/api/content'); } catch(e){ error.value = String(e);} };
const create = async()=>{ if(!title.value || !body.value || !locale.value){ error.value='All fields are required.'; return; } await $fetch('/api/content',{method:'POST',body:{title:title.value,body:body.value,locale:locale.value}}); title.value=''; body.value=''; await refresh(); };
const publish = async(id:string)=>{ await $fetch(`/api/content/${id}/publish`,{method:'POST'}); await refresh(); };
onMounted(()=>{ void refresh(); });
</script>
<template><main style="font-family:sans-serif;max-width:820px;margin:2rem auto"><h1>Octavia AI CMS — Nuxt</h1><p style="color:crimson">{{ error }}</p><input v-model="title" placeholder="Title" /><br /><textarea v-model="body" placeholder="Body"></textarea><br /><input v-model="locale" /><br /><button @click="create">Create</button> <button @click="refresh">Refresh</button><ul><li v-for="item in items" :key="item.id">{{ item.title }} ({{ item.status }}) <button :disabled="item.status==='published'" @click="publish(item.id)">Publish</button></li></ul></main></template>
