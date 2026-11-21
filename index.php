<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$esAdmin = isset($_SESSION["usuario"]) && $_SESSION["usuario"] === "admin";
$estaLogueado = isset($_SESSION["usuario"]);
$invitadoVerificado = !$estaLogueado && !empty($_SESSION["invitado_mayor_edad"]);
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios IAW - App04</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-black border-bottom border-secondary mb-5">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="index.php">Ejercicios IAW (App04)</a>
            <div class="navbar-nav ms-auto text-light align-items-center">
                <?php
                if (isset($_SESSION["usuario"])) {
                    echo "<a class='btn btn-outline-danger btn-sm btn-anim me-3' href='PHP/logout.php'>Cerrar Sesión</a>";
                    echo "<span>👤 Bienvenido, <strong>" . htmlspecialchars($_SESSION["usuario"]) . "</strong></span>";
                } else {
                    echo "<span class='me-3'>👤 Invitado" . ($invitadoVerificado ? " (Mayor de edad)" : "") . "</span>";
                    echo "<a class='btn btn-outline-primary btn-sm btn-anim' href='pags/login.php'>Ir al Login</a>";
                }
                ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mb-4">Ejercicios de Programación Orientada a Objetos y Excepciones</h1>

        <?php if (!$estaLogueado && !$invitadoVerificado): ?>
        <div class="alert alert-secondary border-secondary d-flex flex-wrap justify-content-between align-items-center mb-5" role="alert">
            <div>
                Puedes <strong>iniciar sesión</strong> con tu cuenta de usuario o continuar <strong>como invitado</strong> (requiere comprobar que eres mayor de edad).
            </div>
            <div class="d-flex gap-2 mt-2 mt-md-0">
                <a href="pags/login.php" class="btn btn-primary btn-sm btn-anim">Iniciar sesión</a>
                <a href="pags/mayoria_edad.php" class="btn btn-outline-light btn-sm btn-anim btn-hover-info">Entrar como invitado</a>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-primary card-glow card-enter">
                    <div class="card-body">
                        <h5 class="card-title">1. Calculadora Básica</h5>
                        <p class="card-text text-secondary">Operaciones básicas usando Clases.</p>
                        <a href="<?php echo ($estaLogueado || $invitadoVerificado) ? 'pags/calculadora_basica.php' : 'pags/mayoria_edad.php'; ?>" class="btn btn-outline-light btn-anim btn-hover-primary">Entrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 border-warning card-glow card-enter">
                    <div class="card-body">
                        <h5 class="card-title">2. Calculadora Científica</h5>
                        <p class="card-text text-secondary">Herencia de clases y raíces.</p>
                        <a href="<?php echo ($estaLogueado || $invitadoVerificado) ? 'pags/calculadora_cientifica.php' : 'pags/mayoria_edad.php'; ?>" class="btn btn-outline-light btn-anim btn-hover-warning">Entrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 border-info card-glow card-enter">
                    <div class="card-body">
                        <h5 class="card-title">3. Mayoría de Edad</h5>
                        <p class="card-text text-secondary">Comprobación con formularios POST.</p>
                        <a href="pags/mayoria_edad.php" class="btn btn-outline-light btn-anim btn-hover-info">Entrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100 border-orange card-glow card-enter">
                    <div class="card-body">
                        <h5 class="card-title">4. Números Asc/Desc</h5>
                        <p class="card-text text-secondary">Bucles aplicados a datos del usuario.</p>
                        <a href="<?php echo ($estaLogueado || $invitadoVerificado) ? 'pags/numeros.php' : 'pags/mayoria_edad.php'; ?>" class="btn btn-outline-light btn-anim btn-hover-orange">Entrar</a>
                    </div>
                </div>
            </div>

            <?php if ($estaLogueado): ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-success card-glow card-enter">
                    <div class="card-body">
                        <h5 class="card-title">5. Cambio de Contraseña</h5>
                        <p class="card-text text-secondary">Validación de contraseñas y sesiones.</p>
                        <a href="pags/cambio_password.php" class="btn btn-outline-light btn-anim btn-hover-success">Entrar</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($esAdmin): ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-danger card-glow card-enter">
                    <div class="card-body">
                        <h5 class="card-title">Logs del Sistema</h5>
                        <p class="card-text text-secondary">Consulta de registros en texto (solo administrador).</p>
                        <a href="PHP/ver_log.php" class="btn btn-outline-danger btn-anim">Ver Logs</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <footer class="text-center text-secondary py-3">
        <small>App04 - Programación Orientada a Objetos</small>
    </footer>
</body>
</html>