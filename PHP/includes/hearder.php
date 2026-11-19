<?php
// Iniciamos la sesión siempre en la cabecera
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="navbar-nav ms-auto text-light align-items-center">
    <?php
    if (isset($_SESSION["usuario"])) {
        // Si está logeado, muestra su nombre y el botón de cerrar sesión
        echo "<span class='me-3'>👤 Bienvenido, <strong>" . htmlspecialchars($_SESSION["usuario"]) . "</strong></span>";
        echo "<a class='btn btn-outline-danger btn-sm' href='../logout.php'>Cerrar sesión</a>";
    } else {
        // Si es invitado
        echo "<span class='me-3'>Invitado</span>";
        echo "<a class='btn btn-outline-primary btn-sm' href='../login.php'>Ir al Login</a>";
    }
    ?>
</div>