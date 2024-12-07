import React from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Sidebar from "./components/Sidebar";
import Listado from "./components/Listado";
import DetallesPlan from "./components/DetallesPlan";

const App = () => {
  return (
    <Router>
      <div className="app d-flex">
        <Sidebar />
        <div className="content flex-grow-1 p-4">
          <Routes>
            <Route path="/listado" element={<Listado />} />
            <Route path="/detalle-plan/:id" element={<DetallesPlan />} />
          </Routes>
        </div>
      </div>
    </Router>
  );
};

export default App;
