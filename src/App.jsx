import Button from "./components/button"

function App() {
 
  return (
    <>

      <div className="login-container">
        <div className="login-card">
          <h2 className="text-center mb-4">Inicio de sesión</h2>
          <form>
            <div className="mb-3">
              <label htmlFor="username" className="form-label">Nombre de usuario</label>
              <input type="text" className="form-control" id="username" placeholder="Ingrese su usuario" />
            </div>
            <div className="mb-3">
              <label htmlFor="password" className="form-label">Contraseña</label>
              <input type="password" className="form-control" id="password" placeholder="Ingrese su contraseña" />
            </div>
            <div className="mb-3 text-end">
              <a href="#" className="text-primary">¿Olvidó su contraseña?</a>
            </div>
            <div className="d-grid">
              <button type="submit" className="btn btn-primary-custom btn-lg">Iniciar</button>
            </div>
            <div className="mt-3 text-center">
              <a href="#" className="text-primary">Quiero hacer el registro</a>
            </div>
          </form>
        </div>
      </div>

    </>
  )
}

export default App