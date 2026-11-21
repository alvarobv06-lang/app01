<?php
session_start();
require_once __DIR__ . "/../PHP/includes/logger.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $password = trim($_POST["password"]);

    $lineas = file(__DIR__ . "/../usuarios.txt");

    $correcto = false;

    foreach ($lineas as $linea) {
        if (trim($linea) == $usuario . ":" . $password) {
            $correcto = true;
        }
    }

    if ($correcto) {
        $_SESSION["usuario"] = $usuario;
        unset($_SESSION["invitado_mayor_edad"]);
        registrar_log_txt("Inicio de sesión correcto", $usuario);
        header("Location: ../index.php");
        exit();
    } else {
        registrar_log_txt("Intento de inicio de sesión fallido", $usuario !== "" ? $usuario : "desconocido");
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card bg-black border-secondary card-glow card-enter p-4 shadow" style="width: 350px;">
        <h2 class="text-center mb-4">Iniciar sesión</h2>
        <?php if ($error !== ""): ?>
            <div class="alert alert-danger py-2"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Usuario:</label>
                <input type="text" name="usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-anim w-100">Entrar</button>
        </form>

        <hr class="my-3 border-secondary">

        <a href="mayoria_edad.php" class="btn btn-outline-light btn-anim btn-hover-info w-100">Continuar como invitado</a>
    </div>
</body>
</html>