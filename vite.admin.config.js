import { v4wp } from "@kucrut/vite-for-wp";
import react from "@vitejs/plugin-react";
import path from "path"
import fs from 'fs'

export default {
  plugins: [
    v4wp({
      input: "src/admin/main.jsx",
      outDir: "assets/admin/dist",
    }),
    // wp_scripts(),
    react(),
  ],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./src/admin"),
    },
  },
  server: {
    cors: {
      origin: ['https://fleek.test'],
      methods: ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
      credentials: true
    },
    strictPort: true,
    port: 5174,
    https: {
      key: fs.readFileSync('C:/laragon/etc/ssl/laragon.key'),
      cert: fs.readFileSync('C:/laragon/etc/ssl/laragon.crt'),
    },
    hmr: {
      host: 'localhost',
      protocol: 'wss'
    }
  }
};
