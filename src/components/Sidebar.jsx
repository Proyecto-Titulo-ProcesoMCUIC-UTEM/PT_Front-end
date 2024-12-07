import React from "react";
import { Link } from "react-router-dom";

const Sidebar = () => {
  return (
    <div className="sidebar bg-dark text-white vh-100 p-3" style={{ width: "250px" }}>
      <nav className="nav flex-column">
        <Link to="/crear" className="nav-link text-white">
          Crear Plan
        </Link>
        
        <Link to="/listado" className="nav-link text-white">
          Listado
        </Link>
        
        <Link to="/finalizados" className="nav-link text-white">
          Finalizados
        </Link>
      </nav>
    </div>
  );
};

export default Sidebar;
