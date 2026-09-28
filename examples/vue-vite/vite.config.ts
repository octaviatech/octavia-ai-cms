import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
// Server-side only. Holds OCTAVIA_API_KEY so the key never reaches the browser.
import { octaviaProxy } from './server/octaviaProxy';

export default defineConfig({ plugins: [vue(), octaviaProxy()] });
