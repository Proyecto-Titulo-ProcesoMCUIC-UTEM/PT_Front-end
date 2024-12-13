<?php
session_start();
require_once '../../config/database.php';
require_once '../../src/models/MallaCurricular.php';
require_once '../../includes/functions.php';

// Verificar sesión
verificarSesion();

// Verificar si se proporcionó un ID de malla
if (!isset($_GET['id']) || empty($_GET['id'])) {
    redirigir('malla_curricular.php');
}

$id = $_GET['id'];
$error = '';
$success = '';

$db = new Database();
$malla = new MallaCurricular($db->conectar());

// Verificar primero si la malla existe
$malla_actual = $malla->obtenerPorId($id);

if (!$malla_actual) {
    redirigir('malla_curricular.php');
}

// Intentar eliminar la malla
$resultado = $malla->eliminar($id);

if ($resultado) {
    // Redirigir con mensaje de éxito
    $_SESSION['mensaje'] = "Malla curricular eliminada exitosamente.";
    $_SESSION['tipo_mensaje'] = "success";
    redirigir('malla_curricular.php');
} else {
    // Mostrar error
    $_SESSION['mensaje'] = "Error al eliminar la malla curricular.";
    $_SESSION['tipo_mensaje'] = "error";
    redirigir('malla_curricular.php');
}
?>