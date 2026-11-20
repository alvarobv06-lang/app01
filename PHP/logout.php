<?php
session_start();
require_once __DIR__ . "/includes/logger.php";
registrar_log_txt("Cierre de sesión");

$_SESSION = [];
session_destroy();
header("Location: ../pags/login.php");
exit();
?>