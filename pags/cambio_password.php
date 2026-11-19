<?php session_start(); ?>
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
            <a class="navbar-brand text-white fw-bold" href="../index.html">BIENVENIDO</a>

            <div class="navbar-nav me-auto">
                <a class="nav-link text-light" href="calculadora_basica.php">1. Calculadora</a>
                <a class="nav-link text-light" href="calculadora_cientifica.php">2. Científica</a>
                <a class="nav-link text-light" href="mayoria_edad.php">3. Edad</a>
                <a class="nav-link text-light" href="numeros.php">4. Números</a>
                <a class="nav-link text-info fw-bold" href="cambio_password.php">5. Contraseña</a>
            </div>

            <!-- perfil -->
            <div class="d-flex align-items-center">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <span class="text-white me-3 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <?php echo $_SESSION['usuario']; ?>
                    </span>
                    
                    <?php if ($_SESSION['usuario'] === 'Admin'): ?>
                        <a class="nav-link text-warning fw-bold me-3" href="ver_log.php">Logs</a>
                    <?php endif; ?>

                    <a class="nav-link text-danger fw-bold" href="../PHP/cerrar_sesion.php">Salir</a>
                <?php endif; ?>
            </div>
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