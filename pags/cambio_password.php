<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] !== "admin") {
    header("Location: mayoria_edad.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Cambio de Contraseña</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body class="bg-gradient-success">
    <nav class="navbar navbar-expand-lg bg-black border-bottom border-secondary mb-4">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="../index.php">BIENVENIDO</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link text-light" href="calculadora_basica.php">1. Calculadora</a>
                <a class="nav-link text-light" href="calculadora_cientifica.php">2. Científica</a>
                <a class="nav-link text-light" href="mayoria_edad.php">3. Edad</a>
                <a class="nav-link text-light" href="numeros.php">4. Números</a>
                <a class="nav-link text-info fw-bold" href="cambio_password.php">5. Contraseña</a>
            </div>
            <?php include("../PHP/includes/hearder.php"); ?>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Cambio de Contraseña</h1>
        <?php
        // mensajes de éxito o error que devuelva el backend
        if (isset($_GET['mensaje']))
        {
            $tipo = ($_GET['tipo'] == 'error') ? 'danger' : 'success';
            echo "<div class='alert alert-$tipo'>" . htmlspecialchars($_GET['mensaje']) . "</div>";
        }
        ?>
        <div class="card bg-black border-secondary mt-4" style="max-width: 500px;">
            <div class="card-body">
                <!-- datos al backend -->
                <form action="../PHP/ej5_password.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombre de Usuario:</label>
                        <input type="text" name="usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña:</label>
                        <input type="password" name="nueva" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-outline-light w-100">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>