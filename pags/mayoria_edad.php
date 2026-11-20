<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si ya inició sesion, ya es mayor de edad y pasa directo a index.php
if (isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit();
}

$mensajeError = "";

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

        $_SESSION["invitado_mayor_edad"] = true;
        header("Location: ../index.php");
        exit();
    } catch (Exception $e) {
        unset($_SESSION["invitado_mayor_edad"]);
        $mensajeError = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>3. Mayoria de Edad (Invitados)</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-black border-bottom border-secondary mb-4">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="../index.php">Ejercicios IAW</a>
            <?php include("../PHP/includes/hearder.php"); ?>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Comprobación de Mayoría de Edad</h1>
        <p class="text-secondary">Acceso como invitado. Introduce tu edad para poder pasar.</p>

        <?php if ($mensajeError !== ""): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo htmlspecialchars($mensajeError); ?>
            </div>
        <?php endif; ?>

        <div class="card bg-black border-secondary mt-4" style="max-width: 500px;">
            <div class="card-body">
                <form method="POST" action="mayoria_edad.php">
                    <div class="mb-3">
                        <label class="form-label">Introduce tu edad</label>
                        <input type="number" name="edad" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-outline-light w-100">Comprobar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>