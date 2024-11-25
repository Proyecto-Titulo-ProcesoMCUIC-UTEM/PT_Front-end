import React from 'react';

function Web() {

  return (
    <>

    <body className="bg-light">

{/*************************** Barra de navegador **********************************/}

      <nav class="navbar navbar-expand-sm bg-body border-bottom fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand ms-4 border-end pe-5" href="#">
            <img src="img/logo_utem.png" alt="Logo" width="40" height="45" class="d-inline-block align-text-top"/>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
              <li class="nav-item ms-3">
                <a class="nav-link active" aria-current="page" href="#">
                  <img src="img/Admin-logo.png" alt="Logo" width="40" height="43" class="d-inline-block align-text-top mt-1"/>
                  </a>
              </li>

              <div className="container ms-1">

                <div className="row">

                  <span class="navbar-text">
                    Nombre Admin
                  </span>

                </div>

                <div className="row">

                  <span class="badge text-bg-warning">
                    
                    Admin

                  </span>

                </div>

              </div>

              <div className="container ms-3">
              
                <div className="row mt-2">
                  <div className="col d-flex align-items-center">
                    <img 
                      src="img/correo.png" 
                      alt="Logo" 
                      width="35" 
                      height="35" 
                      className="d-inline-block align-text-top"
                    />
                    <li className="nav-item ms-1">
                      <a className="nav-link" href="#" style={{ whiteSpace: 'nowrap' }}>Mi Correo</a>
                    </li>
                  </div>
                </div>
              </div>
              
              <li class="nav-item ms-1 mt-2">
                <a class="nav-link">Disabled</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>

{/******************************** Barra de titulo *********************************************/}      

<div className="container-cu  py-4 text-center mt-5 pt-5">
  
  <div className="row">

    <div className="col">
    <h2 className="text-center text-primary">CARRERAS</h2>
    </div>

  </div>

</div>     

{/******************************** Lista de carreras *******************************************/}

<div className="container-cut py-5 text-center bg-body rounded-bottom">
  <div className="row justify-content-center">
    {[...Array(2)].map((_, colIndex) => (
      <div className="col-sm-3" key={colIndex}>
        <ul className="list-group">
          {[...Array(10)].map((_, index) => (
            <li
              className="btn border mb-1"
              key={index}
              data-bs-toggle="modal"
              data-bs-target={`#modalCarrera${colIndex}-${index}`}
            >
              Carrera {colIndex * 10 + index + 1}
            </li>
          ))}
        </ul>
      </div>
    ))}
  </div>

  {/* Modales */}
  {[...Array(2)].map((_, colIndex) =>
    [...Array(10)].map((_, index) => {
      // Generar nombres de asignaturas aleatorios
      const asignaturas = [
        "Matemáticas Avanzadas",
        "Física Aplicada",
        "Programación en C++",
        "Historia del Arte",
        "Gestión de Proyectos",
        "Química Orgánica",
        "Microbiología",
        "Economía Internacional",
        "Diseño Gráfico",
        "Redes de Computadoras",
        "Algoritmos y Estructuras de Datos",
        "Desarrollo Web",
        "Psicología General",
        "Inteligencia Artificial",
        "Biotecnología",
      ];

      // Seleccionar 5 asignaturas únicas al azar para cada carrera
      const asignaturasCarrera = asignaturas
        .sort(() => 0.5 - Math.random())
        .slice(0, 5);

      return (
        <div
          className="modal fade"
          id={`modalCarrera${colIndex}-${index}`}
          key={`modalCarrera${colIndex}-${index}`}
          tabindex="-1"
          aria-labelledby={`modalCarreraLabel${colIndex}-${index}`}
          aria-hidden="true"
        >
          <div className="modal-dialog modal-fullscreen">
            <div className="modal-content">
              <div className="modal-header">
                <h1
                  className="modal-title fs-5"
                  id={`modalCarreraLabel${colIndex}-${index}`}
                >
                  Carrera {colIndex * 10 + index + 1}
                </h1>
                <button
                  type="button"
                  className="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div className="modal-body">
                <p>Asignaturas de Carrera {colIndex * 10 + index + 1}:</p>
                <div className="d-flex flex-wrap gap-2">
                  {asignaturasCarrera.map((asignatura, subjIndex) => (
                    <button
                      key={subjIndex}
                      type="button"
                      className="btn btn-outline-primary"
                    >
                      {asignatura}
                    </button>
                  ))}
                </div>
              </div>
              <div className="modal-footer">
                <button
                  type="button"
                  className="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Cerrar
                </button>
               
              </div>
            </div>
          </div>
        </div>
      );
    })
  )}
</div>


   {/* <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>  
*/}


{/******************************** Footer *******************************************/}


<div className="container-fluid py-5 mt-5 text-center bg-info-subtle">

 <div className="row">

   <div className="col-sm-6 col-md-4 col-lg-2">
   <img src="img/Logo-utem-sus.png" class="d-block w-100" alt="..."/>
   </div>
   <div className="col-sm-6 col-md-4 col-lg-2">
     <img src="img/Logo-utem-sus.png" class="d-block w-100" alt="..."/>
   </div>
   <div className="d-none d-md-block col-md-4 col-lg-2">
     <img src="img/Logo-utem-sus.png" class="d-block w-100" alt="..."/>
   </div>
   <div className="d-none d-lg-block col-lg-2">
     <img src="img/Logo-utem-sus.png" class="d-block w-100" alt="..."/>
   </div>
   <div className="d-none d-lg-block col-lg-2">
     <img src="img/Logo-utem-sus.png" class="d-block w-100" alt="..."/>
   </div>
   <div className="d-none d-lg-block col-lg-2">
     <img src="img/Logo-utem-sus.png" class="d-block w-100" alt="..."/>
   </div>

 </div>

</div>

</body>

    </>
  )
}

export default Web
