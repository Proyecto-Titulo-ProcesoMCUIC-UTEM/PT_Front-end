import Button from "./components/button"

function App() {
 
  return (
    <>

<div class="bg-primary" style={{ height: '100vh' }}>
     <div class="formulario">
          <h1>Inicio de sesion</h1>
          <form method="post">

            <div class="username">
              <label>Nombre de usuario</label>
              <input type="text" required></input>
            </div>

            <div class="username">
              <label>Contraseña</label>
              <input type="password" required></input>
            </div>

            <div class="recordar">¿Olvido su contraseña?</div>
            <input type="submit" value="Iniciar"></input>
            <div class="registrarse">
              Quiero hacer el <a href="#">registro</a>
            </div>

          </form>
        </div>
</div>

      <button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button>

<button type="button" class="btn btn-link">Link</button>

    </>
  )
}

export default App