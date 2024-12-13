<?php
session_start();
require_once '../../config/database.php';
require_once '../../src/models/MallaCurricular.php';
require_once '../../includes/functions.php';

// Verificar si el usuario está autenticado
verificarSesion();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carrera = limpiarDatos($_POST['carrera']);
    $anio = limpiarDatos($_POST['anio']);
    $descripcion = limpiarDatos($_POST['descripcion']);

    $db = new Database();
    $malla = new MallaCurricular($db->conectar());

    $datos = [
        'carrera' => $carrera,
        'anio' => $anio,
        'descripcion' => $descripcion
    ];

    $resultado = $malla->crear($datos);

    if ($resultado) {
        $success = "Malla curricular creada exitosamente.";
        // Limpiar datos del formulario
        $carrera = $anio = $descripcion = '';
    } else {
        $error = "Error al crear la malla curricular.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Agregar Malla Curricular - UTEM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../../includes/header.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Agregar Nueva Malla Curricular</h2>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (!empty($error)) echo mostrarMensaje($error, 'error');
                        if (!empty($success)) echo mostrarMensaje($success, 'success');
                        ?>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="carrera" class="form-label">Carrera</label>
                                <input type="text" class="form-control" id="carrera" name="carrera" 
                                       value="<?php echo $carrera ?? ''; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="anio" class="form-label">Año</label>
                                <input type="number" class="form-control" id="anio" name="anio" 
                                       value="<?php echo $anio ?? date('Y'); ?>" 
                                       min="2000" max="<?php echo date('Y') + 10; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" 
                                          rows="4"><?php echo $descripcion ?? ''; ?></textarea>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Crear Malla Curricular</button>
                                <a href="malla_curricular.php" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>