<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$esUsuarioRegistrado = isset($_SESSION["usuario"]);
$mensajeError = "";
$mensajeOk = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        if (!isset($_POST["edad"]) || trim($_POST["edad"]) === "") {
            throw new Exception("Debes introducir una edad.");
        }

        $edadTexto = trim($_POST["edad"]);
        if (!is_numeric($edadTexto) || filter_var($edadTexto, FILTER_VALIDATE_INT) === false) {
            throw new Exception("Excepción: la edad debe ser un número entero válido.");
        }

        $edad = (int) $edadTexto;

        if ($edad < 0 || $edad > 120) {
            throw new Exception("Excepción: edad fuera de los valores permitidos (0 a 120).");
        }

        if ($edad < 18) {
            throw new Exception("Acceso denegado: eres menor de edad ($edad años). No puedes pasar.");
        }

        if ($esUsuarioRegistrado) {
            $mensajeOk = "Comprobación correcta: mayor de edad ($edad años). Tu sesión de usuario ya tiene acceso completo.";
        } else {
            $_SESSION["invitado_mayor_edad"] = true;
            header("Location: ../index.php");
            exit();
        }
    } catch (Exception $e) {
        if (!$esUsuarioRegistrado) {
            unset($_SESSION["invitado_mayor_edad"]);
        }
        $mensajeError = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>3. Mayoría de Edad</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body class="bg-gradient-info">
    <nav class="navbar navbar-expand-lg bg-black border-bottom border-secondary mb-4">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="../index.php">Ejercicios IAW</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link nav-link-glow nav-link-primary" href="calculadora_basica.php">1. Calculadora</a>
                <a class="nav-link nav-link-glow nav-link-warning" href="calculadora_cientifica.php">2. Científica</a>
                <a class="nav-link nav-link-glow nav-link-info" href="mayoria_edad.php">3. Edad</a>
                <a class="nav-link nav-link-glow nav-link-orange" href="numeros.php">4. Números</a>
                <?php if ($esUsuarioRegistrado): ?>
                    <a class="nav-link nav-link-glow nav-link-success" href="cambio_password.php">5. Contraseña</a>
                <?php endif; ?>
            </div>
            <?php include("../PHP/includes/hearder.php"); ?>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>3. Mayoría de Edad</h1>
        <p class="text-secondary">Comprobación de edad mediante formulario POST y control de excepciones.</p>

        <?php if ($mensajeError !== ""): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo htmlspecialchars($mensajeError); ?>
            </div>
        <?php endif; ?>

        <?php if ($mensajeOk !== ""): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo htmlspecialchars($mensajeOk); ?>
            </div>
        <?php endif; ?>

        <div class="card bg-black border-info card-glow card-enter mt-4" style="max-width: 500px;">
            <div class="card-body">
                <form method="POST" action="mayoria_edad.php">
                    <div class="mb-3">
                        <label class="form-label">Introduce tu edad</label>
                        <input type="number" name="edad" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-outline-light btn-anim btn-hover-info w-100">Comprobar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>