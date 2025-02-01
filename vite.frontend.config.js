// @ts-check
import { defineConfig } from 'vite'
import { v4wp } from '@kucrut/vite-for-wp'
import react from "@vitejs/plugin-react"
import path from "path"
import { fileURLToPath } from 'url'
import fs from 'fs'

const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)

export default defineConfig({
  plugins: [
    v4wp({
      input: 'src/frontend/main.tsx',
      outDir: 'assets/frontend'
    }),
    react(),
  ],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./src/frontend"),
    },
  },
  server: {
    cors: {
      origin: ['https://fleek.test'],
      methods: ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
      credentials: true
    },
    strictPort: true,
    port: 5173,
    https: {
      key: fs.readFileSync('C:/laragon/etc/ssl/laragon.key'),
      cert: fs.readFileSync('C:/laragon/etc/ssl/laragon.crt'),
    },
    hmr: {
      host: 'localhost',
      protocol: 'wss'
    }
  }
})
