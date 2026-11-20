<?php

function registrar_log_txt(string $evento, ?string $usuario = null): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $actor = $usuario ?? ($_SESSION["usuario"] ?? "Invitado");
    $fecha = date("Y-m-d H:i:s");
    $ip = $_SERVER["REMOTE_ADDR"] ?? "CLI";

    $linea = sprintf("[%s] [IP: %s] [Usuario: %s] %s", $fecha, $ip, $actor, $evento) . PHP_EOL;

    // Archivo .txt de logs en líneas dentro de la carpeta PHP
    $rutaTxt = __DIR__ . "/../logs.txt";
    file_put_contents($rutaTxt, $linea, FILE_APPEND | LOCK_EX);
}