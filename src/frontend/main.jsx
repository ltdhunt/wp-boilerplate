import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import { RouterProvider } from "react-router-dom";
import { router } from "./routes";
import { ThemeProvider } from "@/components/theme-provider"

// Test hot reload - change this comment to test
const el = document.getElementById("fleekdash-v2");

if (el) {
  ReactDOM.createRoot(el).render(
    <ThemeProvider defaultTheme="light" storageKey="vite-ui-theme">
    <React.StrictMode>
      <RouterProvider router={router} />
    </React.StrictMode></ThemeProvider>,
  );
}
