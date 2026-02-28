<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { octaviaClient, type Content, type FormItem } from './lib/octaviaClient';
const title=ref(''); const body=ref(''); const locale=ref('en-US'); const items=ref<Content[]>([]); const forms=ref<FormItem[]>([]); const error=ref('');
const formId=ref(''); const email=ref('');
const refresh = async()=>{ try{ items.value=await octaviaClient.list(); forms.value=await octaviaClient.listForms(); }catch(e){ error.value=(e as Error).message; } };
const create = async()=>{ if(!title.value || !body.value || !locale.value){ error.value='All fields are required.'; return; } await octaviaClient.create({ title:title.value, body:body.value, locale:locale.value }); title.value=''; body.value=''; await refresh(); };
const publish = async(id:string)=>{ await octaviaClient.publish(id); await refresh(); };
const submitForm = async()=>{ if(!formId.value || !email.value){ error.value='Form ID and email are required.'; return; } await octaviaClient.submitForm(formId.value, { email: email.value }); email.value=''; };
onMounted(()=>{ void refresh(); });
</script>
<template><main style="font-family:sans-serif;max-width:820px;margin:2rem auto"><h1>Octavia AI CMS — Vue Vite</h1><p style="color:crimson">{{ error }}</p><input v-model="title" placeholder="Title" /><br /><textarea v-model="body" placeholder="Body"></textarea><br /><input v-model="locale" /><br /><button @click="create">Create</button> <button @click="refresh">Refresh</button><ul><li v-for="item in items" :key="item.id">{{ item.title }} ({{ item.status }}) <button :disabled="item.status==='published'" @click="publish(item.id)">Publish</button></li></ul><hr /><h2>Form Demo</h2><p>Available forms: {{ forms.length }}</p><input v-model="formId" placeholder="Form ID" /><br /><input v-model="email" placeholder="Email" /><br /><button @click="submitForm">Submit Form</button></main></template>
