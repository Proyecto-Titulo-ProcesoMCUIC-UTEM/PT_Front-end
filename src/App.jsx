import React from "react";
import { BrowserRouter as Router, Routes, Route, Navigate } from "react-router-dom";
import Login from "./components/Login";
import Sidebar from "./components/Sidebar";
import DetallesPlan from "./components/DetallesPlan";
import Listado from "./components/Listado";
import ProtectedRoute from "./components/ProtectedRoute";
import "bootstrap/dist/css/bootstrap.min.css";

function App() {
  return (
    <Router>
      <Routes>
        {/* Página de inicio: Login */}
        <Route path="/" element={<Login />} />

        {/* Rutas protegidas */}
        <Route
          path="/web"
          element={
            <ProtectedRoute>
              <Sidebar /> {/* Sidebar como contenedor principal */}
            </ProtectedRoute>
          }
        >
          {/* Rutas Hijas dentro del Sidebar */}
          <Route path="listado" element={<Listado />} />
          <Route path="detalles" element={<DetallesPlan />} />
        </Route>

        {/* Ruta por defecto si no coincide */}
        <Route path="*" element={<Navigate to="/" />} />
      </Routes>
    </Router>
  );
}

export default App;
