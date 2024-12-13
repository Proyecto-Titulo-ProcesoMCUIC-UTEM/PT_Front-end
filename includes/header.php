<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/src/admin/dashboard.php">UTEM - Mallas Curriculares</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if(isset($_SESSION['usuario_id'])): ?>
                    <li class="nav-item">
                        <span class="navbar-text me-3">
                            Bienvenido, <?php echo $_SESSION['nombre'] ?? 'Usuario'; ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/src/admin/malla_curricular.php">Mallas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/src/auth/logout.php">Cerrar Sesión</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/src/auth/login.php">Iniciar Sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>