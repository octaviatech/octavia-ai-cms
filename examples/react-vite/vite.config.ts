// vite.config.ts
import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";
import tailwindcss from "@tailwindcss/vite";
// Server-side only. Holds OCTAVIA_API_KEY so the key never reaches the browser.
import { octaviaProxy } from "./server/octaviaProxy";

export default defineConfig(() => {
  const isHttps = false;
  const host = true;
  const hmrHost = "localhost";
  const port = 6004;

  return {
    base: "/",
    build: { outDir: "dist", emptyOutDir: true },
    plugins: [react(), tailwindcss(), octaviaProxy()],
    server: {
      strictPort: true,
      host,
      port,
      // `host: true` means "listen on every interface", so the Host header can be
      // anything a visitor uses. `allowedHosts` takes hostnames, not booleans.
      allowedHosts: true as const,
      hmr: {
        protocol: isHttps ? "wss" : "ws",
        host: hmrHost,
        port,
        clientPort: port,
        timeout: 30000,
      },
    },
  };
});
