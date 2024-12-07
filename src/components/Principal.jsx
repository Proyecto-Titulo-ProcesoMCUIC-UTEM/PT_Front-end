import React from "react";
import DetallesPlan from "./DetallesPlan";

function Principal() {
  return (
    <div className="container mt-5">
      <h1 className="text-center mb-4">Información del Plan de Estudios</h1>
      <div>
        <button
          className="btn btn-primary mb-3"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#informacionPlan"
          aria-expanded="false"
          aria-controls="informacionPlan"
        >
          Información del Plan de Estudios
        </button>
        <div className="collapse" id="informacionPlan">
          <div className="card card-body">
            <p>Aquí aparecerán los datos iniciales del plan de estudios...</p>
          </div>
        </div>
      </div>

      {/* Renderiza el componente DetallesPlan */}
      <DetallesPlan />
    </div>
  );
}

export default Principal;
