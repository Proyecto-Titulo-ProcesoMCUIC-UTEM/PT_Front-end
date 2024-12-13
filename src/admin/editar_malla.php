<?php
session_start();
require_once '../../config/database.php';
require_once '../../src/models/MallaCurricular.php';
require_once '../../includes/functions.php';

// Verificar si el usuario está autenticado
verificarSesion();

$error = '';
$success = '';

// Verificar que se haya proporcionado un ID de malla
if (!isset($_GET['id']) || empty($_GET['id'])) {
    redirigir('malla_curricular.php');
}

$id = intval($_GET['id']);

$db = new Database();
$malla = new MallaCurricular($db->conectar());

// Obtener datos de la malla actual
$mallaCurricular = $malla->obtenerPorId($id);

if (!$mallaCurricular) {
    $error = "Malla curricular no encontrada.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carrera = limpiarDatos($_POST['carrera']);
    $anio = limpiarDatos($_POST['anio']);
    $descripcion = limpiarDatos($_POST['descripcion']);

    $datos = [
        'carrera' => $carrera,
        'anio' => $anio,
        'descripcion' => $descripcion
    ];

    $resultado = $malla->actualizar($id, $datos);

    if ($resultado) {
        $success = "Malla curricular actualizada exitosamente.";
        // Recargar los datos actualizados
        $mallaCurricular = $malla->obtenerPorId($id);
    } else {
        $error = "Error al actualizar la malla curricular.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Malla Curricular - UTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../../includes/header.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Editar Malla Curricular</h2>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (!empty($error)) echo mostrarMensaje($error, 'error');
                        if (!empty($success)) echo mostrarMensaje($success, 'success');
                        
                        // Solo mostrar formulario si existe la malla
                        if ($mallaCurricular): 
                        ?>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="carrera" class="form-label">Carrera</label>
                                <input type="text" class="form-control" id="carrera" name="carrera" 
                                       value="<?php echo htmlspecialchars($mallaCurricular['carrera']); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="anio" class="form-label">Año</label>
                                <input type="number" class="form-control" id="anio" name="anio" 
                                       value="<?php echo htmlspecialchars($mallaCurricular['anio']); ?>" 
                                       min="2000" max="<?php echo date('Y') + 10; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" 
                                          rows="4"><?php echo htmlspecialchars($mallaCurricular['descripcion']); ?></textarea>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Actualizar Malla Curricular</button>
                                <a href="malla_curricular.php" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>

                        <?php else: ?>
                            <div class="alert alert-danger">
                                No se encontró la malla curricular solicitada.
                            </div>
                            <a href="malla_curricular.php" class="btn btn-primary">Volver</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>