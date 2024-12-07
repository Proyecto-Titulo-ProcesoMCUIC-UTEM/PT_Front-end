import React from "react";
import { Link, Outlet } from "react-router-dom";

function Sidebar() {
  return (
    <div className="d-flex">
      {/* Menú lateral */}
      <nav className="bg-dark text-white vh-100 p-3" style={{ width: "250px" }}>
       
        <ul className="nav flex-column">
          <li className="nav-item mb-2">
            <Link className="nav-link text-white" to="detalles">
              Crear Plan
            </Link>
          </li>
          <li className="nav-item mb-2">
            <Link className="nav-link text-white" to="listado">
              Listado
            </Link>
            <Link className="nav-link text-white" to="/finalizados" >
          Finalizados
        </Link>
          </li>
        </ul>
      </nav>

      {/* Contenido principal */}
      <div className="p-4 w-100">
        <Outlet /> {/* Muestra los componentes hijos */}
      </div>
    </div>
  );
}

export default Sidebar;
