// vite.config.ts
import { defineConfig, loadEnv } from "vite";
import react from "@vitejs/plugin-react";
import viteTsconfigPaths from "vite-tsconfig-paths";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), "");

  const isHttps = false;
  const host = true;
  const port = 6004;

  return {
    base: "/",
    build: { outDir: "dist", emptyOutDir: true },
    plugins: [react(), viteTsconfigPaths(), tailwindcss()],
    server: {
      strictPort: true,
      host,
      port,
      allowedHosts: [host],
      hmr: {
        protocol: isHttps ? "wss" : "ws",
        host,
        port,
        clientPort: port,
        timeout: 30000,
      },
    },
  };
});
