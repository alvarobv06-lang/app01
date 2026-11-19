<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $lineas = file("usuarios.txt");
    
    $correcto = false;

    foreach ($lineas as $linea) {
        if (trim($linea) == $usuario . ":" . $password) {
            $correcto = true;
        }
    }

    if ($correcto) {
        $_SESSION["usuario"] = $usuario;
        header("Location: pags/mayoria_edad.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="card p-4 shadow" style="width: 350px;">
        <h2 class="text-center mb-4">Iniciar sesión</h2>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Usuario:</label>
                <input type="text" name="usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>

</body>
</html>