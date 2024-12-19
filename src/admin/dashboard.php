<?php
session_start();
require_once '../../config/database.php';

// Si no hay sesión iniciada, redirigir al login
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../src/auth/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>UTEM - Sistema de Gestión de Mallas Curriculares</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/custom.css" rel="stylesheet">
</head>
<body>
    <?php include '../../includes/header.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Bienvenido al Sistema de Gestión de Mallas Curriculares</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Menú Principal</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="../../src/admin/carreras.php" class="btn btn-primary w-100 mb-2">
                                    Gestionar Carreras
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="../../src/admin/asignaturas.php" class="btn btn-secondary w-100 mb-2">
                                    Gestionar Asignaturas
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-secondary w-100 mb-2">
                                    Gestionar Matrices de Coherencia Curricular
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="../../src/auth/logout.php" class="btn btn-danger w-100 mb-2">
                                    Cerrar Sesión
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelector('.btn-secondary[href="#"]').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Información',
                text: 'Este apartado está en desarrollo.',
                icon: 'info',
                confirmButtonText: 'Aceptar'
            });
        });
    </script>
</body>
</html>