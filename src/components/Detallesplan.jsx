import React, { useState } from "react";
import { useParams } from "react-router-dom";

const DetallesPlan = () => {
  const { id } = useParams();

  // Estado para manejar qué pestaña está activa
  const [tab, setTab] = useState("informacion");

  // Simula la obtención de datos
  const detalles = {
    1: {
      nombre: "Ingeniería Civil en Computación",
      carrera: "Ingeniería Civil en Computación Mención Informática",
      tipoPlan: "Regular",
      tipoIngreso: "PSU",
      encargado: "Marco Araya Cornejo",
      coordinador: "Sebastián Vega Sánchez",
    },
    2: {
      nombre: "Ingeniería en Informática",
      carrera: "Ingeniería en Informática",
      tipoPlan: "Especial",
      tipoIngreso: "Prueba Especial",
      encargado: "Sebastián Vega Sánchez",
      coordinador: "Marco Araya Cornejo",
    },
  };

  const plan = detalles[id];

  if (!plan) {
    return <div className="p-4">No se encontró el plan solicitado.</div>;
  }

  return (
    <div className="container mt-4">
      <h2 className="mb-4">Plan {id}</h2>
      <nav className="nav nav-tabs mb-3">
        <button
          className={`nav-link ${tab === "informacion" ? "active" : ""}`}
          onClick={() => setTab("informacion")}
        >
          Información del Plan de Estudios
        </button>
        <button
          className={`nav-link ${tab === "redaccion" ? "active" : ""}`}
          onClick={() => setTab("redaccion")}
        >
          Redacción del Plan
        </button>
        <button
          className={`nav-link ${tab === "dominios" ? "active" : ""}`}
          onClick={() => setTab("dominios")}
        >
          Dominios del Plan
        </button>
        <button
          className={`nav-link ${tab === "competencias" ? "active" : ""}`}
          onClick={() => setTab("competencias")}
        >
          Competencias del Plan
        </button>
        <button
          className={`nav-link ${tab === "niveles" ? "active" : ""}`}
          onClick={() => setTab("niveles")}
        >
          Niveles de Competencias del Plan
        </button>
        <button
          className={`nav-link ${tab === "diseno" ? "active" : ""}`}
          onClick={() => setTab("diseno")}
        >
          Diseño del Plan
        </button>
      </nav>

      {/* Renderizar solo la sección seleccionada */}
      {tab === "informacion" && (
        <div className="detalle-plan bg-white p-4 shadow-sm rounded">
        <h5 className="mb-3">Datos Iniciales del Plan</h5>
        <div className="row">
          <div className="col-md-6">
            <p><strong>Nombre:</strong> {plan.nombre}</p>
            <p><strong>Carrera:</strong> {plan.carrera}</p>
            <p><strong>Encargado UIC:</strong> {plan.encargado}</p>
          </div>
          <div className="col-md-6">
            <p><strong>Tipo de Plan:</strong> {plan.tipoPlan}</p>
            <p><strong>Tipo de Ingreso:</strong> {plan.tipoIngreso}</p>
            <p><strong>Coordinador del Comité:</strong> {plan.coordinador}</p>
          </div>
        </div>
        <hr />

        <h5 className="mt-3">Información Adicional</h5>
        <div className="mb-2">
          <p><strong>Propósito:</strong> {plan.proposito}</p>
          <p><strong>Objetivo:</strong> {plan.objetivo}</p>
          <p><strong>Requisito de Admisión:</strong> {plan.requisitoAdmision}</p>
          <p><strong>Mecanismo de Retención:</strong> {plan.mecanismoRetencion}</p>
          <p><strong>Requisito de Obtención de Título:</strong> {plan.requisitoTitulo}</p>
          <p><strong>Campo de Desarrollo Profesional:</strong> {plan.desarrolloProfesional}</p>
          <p><strong>Perfil del Egresado:</strong> {plan.perfilEgresado}</p>
        </div>
      </div>
      )}

      {tab == "redaccion" && (
        <div className="text-muted p-4">
          <p>Seleccione una opción para mostrar más información.</p>
        </div>
      )}
    </div>
  );
};

export default DetallesPlan;


