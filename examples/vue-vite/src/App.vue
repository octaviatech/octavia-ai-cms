<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { octaviaClient, type Content } from './lib/octaviaClient';
const title=ref(''); const body=ref(''); const locale=ref('en-US'); const items=ref<Content[]>([]); const error=ref('');
const refresh = async()=>{ try{ items.value=await octaviaClient.list(); }catch(e){ error.value=(e as Error).message; } };
const create = async()=>{ if(!title.value || !body.value || !locale.value){ error.value='All fields are required.'; return; } await octaviaClient.create({ title:title.value, body:body.value, locale:locale.value }); title.value=''; body.value=''; await refresh(); };
const publish = async(id:string)=>{ await octaviaClient.publish(id); await refresh(); };
onMounted(()=>{ void refresh(); });
</script>
<template><main style="font-family:sans-serif;max-width:820px;margin:2rem auto"><h1>Octavia AI CMS — Vue Vite</h1><p style="color:crimson">{{ error }}</p><input v-model="title" placeholder="Title" /><br /><textarea v-model="body" placeholder="Body"></textarea><br /><input v-model="locale" /><br /><button @click="create">Create</button> <button @click="refresh">Refresh</button><ul><li v-for="item in items" :key="item.id">{{ item.title }} ({{ item.status }}) <button :disabled="item.status==='published'" @click="publish(item.id)">Publish</button></li></ul></main></template>
