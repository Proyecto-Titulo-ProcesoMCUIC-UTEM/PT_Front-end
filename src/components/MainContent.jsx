import React from "react";

function MainContent() {
  return (
    <div className="flex-grow-1 p-4">
      <h2>Plan 4</h2>
      <nav className="nav nav-tabs mb-3">
        <a className="nav-link active" href="#">
          Información del Plan de Estudios
        </a>
        <a className="nav-link" href="#">
          Redacción del Plan
        </a>
        <a className="nav-link" href="#">
          Dominios del Plan
        </a>
        <a className="nav-link" href="#">
          Competencias del Plan
        </a>
        <a className="nav-link" href="#">
          Diseño del Plan
        </a>
      </nav>
      <div>
        <h5>Datos Iniciales del Plan</h5>
        <div className="row">
          <div className="col-md-6">
            <p><strong>Nombre:</strong> Ingeniería Civil en Computación</p>
            <p><strong>Tipo de Plan:</strong> Regular</p>
            <p><strong>Encargado UIC:</strong> Marco Araya Cornejo</p>
          </div>
          <div className="col-md-6">
            <p><strong>Tipo de Ingreso:</strong> PSU</p>
            <p><strong>Coordinador del Comité:</strong> Sebastián Vega Sánchez</p>
          </div>
        </div>
      </div>
    </div>
  );
}

export default MainContent;
