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
    <title>1. Calculadora Básica</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>
<body class="bg-gradient-primary">
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
        <h1>1. Calculadora Básica</h1>
        <div id="resultado" class="alert alert-info mt-3" style="display: none;"></div>

        <div class="card bg-black border-primary card-glow card-enter mt-4">
            <div class="card-body">
                <form id="formulario">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Número 1:</label>
                            <input type="number" step="any" id="num1" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Número 2:</label>
                            <input type="number" step="any" id="num2" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-anim">Calcular</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("formulario").onsubmit = function(evento)
        {
            evento.preventDefault();
            var num1 = document.getElementById("num1").value;
            var num2 = document.getElementById("num2").value;

            var peticion = new XMLHttpRequest();
            peticion.open("POST", "../PHP/ej1_calc.php", true);
            peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            peticion.onload = function()
            {
                var caja = document.getElementById("resultado");
                caja.style.display = "block";
                caja.innerHTML = peticion.responseText;
                if(peticion.responseText.indexOf("Error") !== -1)
                {
                    caja.className = "alert alert-danger mt-3";
                }
                else
                {
                    caja.className = "alert alert-info mt-3";
                }
            };
            peticion.send("num1=" + num1 + "&num2=" + num2);
        };
    </script>
</body>
</html>