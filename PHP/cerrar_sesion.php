<?php
session_start();

// eliminamos las variables
$_SESSION = array();

// si hay cookie de sesión, la borramos del navegador
if (ini_get("session.use_cookies")) 
    {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    }
session_destroy();

// redirigimos al index
header("Location: ../index.html");
exit;
?>