<?php
session_start();

// Solo admin puede ver los logs
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'juan') {
        header("Location: ../pags/mayoria_edad.php");
    } else {
        header("Location: ../pags/login.php");
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Registro de Operaciones (Log)</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <!-- NAVEGACIÓN ADAPTADA PARA LA CARPETA PHP -->
    <nav class="navbar navbar-expand-lg bg-black border-bottom border-secondary mb-4">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="../index.php">Ejercicios IAW</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link text-light" href="../pags/calculadora_basica.php">1. Calculadora</a>
                <a class="nav-link text-light" href="../pags/calculadora_cientifica.php">2. Científica</a>
                <a class="nav-link text-light" href="../pags/mayoria_edad.php">3. Edad</a>
                <a class="nav-link text-light" href="../pags/numeros.php">4. Números</a>
                <a class="nav-link text-info fw-bold" href="../pags/cambio_password.php">5. Contraseña</a>
            </div>
            <?php include(__DIR__ . "/includes/hearder.php"); ?>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Registro de Logs</h1>
        <p class="text-secondary">Bienvenido, Administrador.</p>

        <div class="card bg-black border-secondary mt-4">
            <div class="card-body">
                <pre class="text-success" style="max-height: 500px; overflow-y: auto;">
<?php
$rutaLog = __DIR__ . '/logs.txt';
if (file_exists($rutaLog)) {
    echo htmlspecialchars(file_get_contents($rutaLog));
} else {
    echo "No hay registros todavía en logs.txt. Haz alguna operación en la app.";
}
?>
                </pre>
            </div>
        </div>
    </div>
</body>
</html>