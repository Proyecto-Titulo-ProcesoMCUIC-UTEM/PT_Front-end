import React from "react";
import { Link } from "react-router-dom";

const Listado = () => {
  const planes = [
    { id: 1, estado: "En revisión", nombre: "Ing civil en computación", asesor: "Marco Araya", coordinador: "Sebastián Vega" },
    { id: 2, estado: "En revisión", nombre: "Ingeniería Civil en Computación", asesor: "Marco Araya", coordinador: "Sebastián Vega" },
    { id: 3, estado: "En proceso", nombre: "sdfsdf", asesor: "Marco Araya", coordinador: "Sebastián Vega" },
    { id: 4, estado: "En proceso", nombre: "Ingeniería Civil en Computación", asesor: "Marco Araya", coordinador: "Sebastián Vega" },
  ];

  return (
    <div className="container mt-4">
      <h1 className="mb-4">Planes de Estudio</h1>
      <table className="table table-bordered table-striped text-center align-middle">
        <thead className="table-light">
          <tr>
            <th>#</th>
            <th>Plan</th>
            <th>Asesor Uic</th>
            <th>Coordinador</th>
            <th>Ver</th>
            <th>Editar Info. Básica</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          {planes.map((plan) => (
            <tr key={plan.id}>
              <td>{plan.id}</td>
              <td>{plan.nombre}</td>
              <td>{plan.asesor}</td>
              <td>{plan.coordinador}</td>
              <td>
                <Link to={`/detalle-plan/${plan.id}`}>
                  <button className={`btn ${plan.estado === "En revisión" ? "btn-success" : "btn-primary"} btn-sm`}>
                    {plan.estado}
                  </button>
                </Link>
              </td>
              <td>
                <button className="btn btn-info btn-sm">Editar</button>
              </td>
              <td>
                <button className="btn btn-danger btn-sm">Eliminar</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
      <div className="d-flex justify-content-end">
        <button className="btn btn-secondary btn-sm me-2" disabled>
          Anterior
        </button>
        <span className="btn btn-primary btn-sm">1</span>
        <button className="btn btn-secondary btn-sm ms-2" disabled>
          Siguiente
        </button>
      </div>
    </div>
  );
};

export default Listado;
