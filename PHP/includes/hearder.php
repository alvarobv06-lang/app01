<?php
// Iniciamos la sesión siempre en la cabecera
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="navbar-nav ms-auto text-light align-items-center">
    <?php
    if (isset($_SESSION["usuario"])) {
        // Si está logeado, muestra primero Cerrar sesión y luego el usuario a la derecha del todo
        echo "<a class='btn btn-outline-danger btn-sm me-3' href='../PHP/logout.php'>Cerrar Sesión</a>";
        echo "<span>👤 Bienvenido, <strong>" . htmlspecialchars($_SESSION["usuario"]) . "</strong></span>";
    } else {
        // Si es invitado, no se muestra Cerrar sesión
        echo "<span class='me-3'>👤 Invitado</span>";
        echo "<a class='btn btn-outline-primary btn-sm' href='../pags/login.php'>Ir al Login</a>";
    }
    ?>
</div>