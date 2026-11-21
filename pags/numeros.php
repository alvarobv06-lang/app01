<?php
session_start();
if (!isset($_SESSION["usuario"]) && empty($_SESSION["invitado_mayor_edad"])) {
    header("Location: mayoria_edad.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>4. Números Ascendentes y Descendentes</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body class="bg-gradient-orange">
    <nav class="navbar navbar-expand-lg bg-black border-bottom border-secondary mb-4">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="../index.php">Ejercicios IAW</a>
            <div class="navbar-nav me-auto">
                <a class="nav-link nav-link-glow nav-link-primary" href="calculadora_basica.php">1. Calculadora</a>
                <a class="nav-link nav-link-glow nav-link-warning" href="calculadora_cientifica.php">2. Científica</a>
                <a class="nav-link nav-link-glow nav-link-info" href="mayoria_edad.php">3. Edad</a>
                <a class="nav-link nav-link-glow nav-link-orange" href="numeros.php">4. Números</a>
                <?php if (isset($_SESSION["usuario"])): ?>
                    <a class="nav-link nav-link-glow nav-link-success" href="cambio_password.php">5. Contraseña</a>
                <?php endif; ?>
            </div>
            <?php include("../PHP/includes/hearder.php"); ?>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>4. Números Ascendentes y Descendentes</h1>
        <div id="resultado" class="alert alert-info mt-3" style="display: none;"></div>

        <div class="card bg-black border-orange card-glow card-enter mt-4" style="max-width: 400px;">
            <div class="card-body">
                <form id="formulario">
                    <div class="mb-3">
                        <label>Introduce un número limite:</label>
                        <input type="number" id="limite" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-outline-light btn-anim btn-hover-orange w-100">Mostrar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("formulario").onsubmit = function(evento)
        {
            evento.preventDefault();
            var limite = document.getElementById("limite").value;

            var peticion = new XMLHttpRequest();
            peticion.open("POST", "../PHP/ej4_numeros.php", true);
            peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            peticion.onload = function()
            {
                var caja = document.getElementById("resultado");
                caja.style.display = "block";
                caja.innerHTML = peticion.responseText;
                caja.className = "alert alert-success mt-3";
            };
            peticion.send("limite=" + limite);
        };
    </script>
</body>
</html>