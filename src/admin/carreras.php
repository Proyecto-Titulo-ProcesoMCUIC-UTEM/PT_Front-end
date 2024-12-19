<?php
// carreras.php
session_start();
require_once '../../config/database.php';
require_once '../../src/models/Carrera.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

$db = new Database();
$carrera = new Carrera($db->conectar());
$carreras = $carrera->obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Carreras - UTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Carreras</h1>
            <a href="agregar_carrera.php" class="btn btn-primary">Agregar Nueva Carrera</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Jornada</th>
                    <th>Duración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carreras as $c): ?>
                <tr>
                    <td><?php echo $c['id']; ?></td>
                    <td><?php echo htmlspecialchars($c['nombre']); ?></td>
                    <td><?php echo $c['jornada']; ?></td>
                    <td><?php echo $c['duracion_semestres']; ?> semestres</td>
                    <td>
                        <a href="editar_carrera.php?id=<?php echo $c['id']; ?>" 
                           class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar_carrera.php?id=<?php echo $c['id']; ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('¿Estás seguro? Se eliminarán también todas las asignaturas asociadas.')">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>