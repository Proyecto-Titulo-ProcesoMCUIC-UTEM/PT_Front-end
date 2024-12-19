<?php
// asignaturas.php
session_start();
require_once '../../config/database.php';
require_once '../../src/models/Asignatura.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

$db = new Database();
$asignatura = new Asignatura($db->conectar());
$asignaturas = $asignatura->obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Asignaturas - UTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Asignaturas</h1>
            <a href="agregar_asignatura.php" class="btn btn-primary">Agregar Nueva Asignatura</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Carrera</th>
                    <th>Duración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($asignaturas as $a): ?>
                <tr>
                    <td><?php echo $a['id']; ?></td>
                    <td><?php echo htmlspecialchars($a['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($a['nombre_carrera']); ?></td>
                    <td><?php echo $a['duracion_semanas']; ?> semanas</td>
                    <td>
                        <a href="editar_asignatura.php?id=<?php echo $a['id']; ?>" 
                           class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar_asignatura.php?id=<?php echo $a['id']; ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('¿Estás seguro de eliminar esta asignatura?')">
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