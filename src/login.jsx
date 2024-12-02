import React, { useState } from "react";
import { useNavigate } from "react-router-dom";

function Login() {
  const navigate = useNavigate();

  const [credentials, setCredentials] = useState({ username: "", password: "" });
  const [error, setError] = useState("");

  const handleInputChange = (event) => {
    const { name, value } = event.target;
    setCredentials((prev) => ({ ...prev, [name]: value }));
  };

  const handleLogin = (event) => {
    event.preventDefault();

    const { username, password } = credentials;

    if (username === "admin" && password === "12345") {
      alert("Inicio de sesión exitoso");
      localStorage.setItem("authToken", "fakeToken123");
      navigate("/web"); // Redirige al componente principal
    } else {
      setError("Usuario o contraseña incorrectos");
    }
  };

  return (
    <div className="login-container">
      <div className="login-card">
        <h2 className="text-center mb-4">Inicio de sesión</h2>
        <form onSubmit={handleLogin}>
          <div className="mb-3">
            <label htmlFor="username" className="form-label">
              Nombre de usuario
            </label>
            <input
              type="text"
              className="form-control"
              id="username"
              name="username"
              placeholder="Ingrese su usuario"
              value={credentials.username}
              onChange={handleInputChange}
            />
          </div>
          <div className="mb-3">
            <label htmlFor="password" className="form-label">
              Contraseña
            </label>
            <input
              type="password"
              className="form-control"
              id="password"
              name="password"
              placeholder="Ingrese su contraseña"
              value={credentials.password}
              onChange={handleInputChange}
            />
          </div>
          {error && <div className="alert alert-danger">{error}</div>}
          <div className="d-grid">
            <button type="submit" className="btn btn-primary-custom btn-lg">
              Iniciar
            </button>
          </div>
          <div className="mt-3 text-center">
            <a href="#" className="text-primary">
              Quiero hacer el registro
            </a>
          </div>
        </form>
      </div>
    </div>
  );
}

export default Login;