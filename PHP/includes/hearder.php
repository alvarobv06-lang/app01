<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$esSubpagina = strpos($_SERVER['PHP_SELF'], '/pags/') !== false || strpos($_SERVER['PHP_SELF'], '/PHP/') !== false;
$prefijo = $esSubpagina ? '../' : '';
$invitadoVerificado = !isset($_SESSION["usuario"]) && !empty($_SESSION["invitado_mayor_edad"]);
?>
<div class="navbar-nav ms-auto text-light align-items-center">
    <?php
    if (isset($_SESSION["usuario"])) {
        echo "<a class='btn btn-outline-danger btn-sm btn-anim btn-logout-glow me-3' href='" . $prefijo . "PHP/logout.php'>Cerrar Sesión</a>";
        echo "<span>👤 Bienvenido, <strong>" . htmlspecialchars($_SESSION["usuario"]) . "</strong></span>";
    } else {
        echo "<span class='me-3'>👤 Invitado" . ($invitadoVerificado ? " (Mayor de edad)" : "") . "</span>";
        echo "<a class='btn btn-outline-primary btn-sm btn-anim' href='" . $prefijo . "pags/login.php'>Ir al Login</a>";
    }
    ?>
</div>