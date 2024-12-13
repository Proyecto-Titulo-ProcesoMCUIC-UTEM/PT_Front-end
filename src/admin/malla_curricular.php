<?php
session_start();
require_once '../../config/database.php';
require_once '../../src/models/MallaCurricular.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

$db = new Database();
$malla = new MallaCurricular($db->conectar());

// Obtener todas las mallas curriculares
$mallas = $malla->obtenerTodasMallas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mallas Curriculares - UTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include '../../includes/header.php'; ?>

    <div class="container mt-5">
        <h1>Mallas Curriculares</h1>
        <a href="agregar_malla.php" class="btn btn-primary mb-3">Agregar Nueva Malla</a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Carrera</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mallas as $m): ?>
                <tr>
                    <td><?php echo $m['id']; ?></td>
                    <td><?php echo $m['carrera']; ?></td>
                    <td><?php echo $m['anio']; ?></td>
                    <td>
                        <a href="editar_malla.php?id=<?php echo $m['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar_malla.php?id=<?php echo $m['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>