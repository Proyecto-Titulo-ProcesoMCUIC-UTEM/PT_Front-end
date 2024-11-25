// main.jsx
import React from "react";
import { Routes, Route } from "react-router-dom";
import Login from "./login.jsx"; // Página de inicio de sesión
import Web from "./web.jsx"; // Página principal de la web

function Router() {
  return (
    <Routes>
      <Route path="/" element={<Login />} />
      <Route path="/web" element={<Web />} />
    </Routes>
  );
}

export default Router;