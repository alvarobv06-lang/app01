<?php
session_start();

// solo Admin puede ver esto
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'Admin') 
    {
    header("Location: ../pags/cambio_password.php?tipo=error&mensaje=Acceso denegado. Solo el Administrador puede ver esto.");
    exit;
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
            <a class="navbar-brand text-white fw-bold" href="../index.html">Ejercicios IAW</a>
            
            <div class="navbar-nav me-auto">
                <a class="nav-link text-light" href="../pags/calculadora_basica.php">1. Calculadora</a>
                <a class="nav-link text-light" href="../pags/calculadora_cientifica.php">2. Científica</a>
                <a class="nav-link text-light" href="../pags/mayoria_edad.php">3. Edad</a>
                <a class="nav-link text-light" href="../pags/numeros.php">4. Números</a>
                <a class="nav-link text-info fw-bold" href="../pags/cambio_password.php">5. Contraseña</a>
            </div>

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

                    <a class="nav-link text-danger fw-bold" href="cerrar_sesion.php">Salir</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Registro de Logs</h1>
        <p class="text-secondary">Bienvenido, Administrador.</p>
        
        <div class="card bg-black border-secondary mt-4">
            <div class="card-body">
                <pre class="text-success" style="max-height: 500px; overflow-y: auto;">
<?php
$rutaLog = __DIR__ . '/registro.log';
if (file_exists($rutaLog)) 
    {
    echo htmlspecialchars(file_get_contents($rutaLog));
    } 
else 
    {
    echo "No hay registros todavía. Haz alguna operación en la app.";
    }
?>
                </pre>
            </div>
        </div>
    </div>
</body>
</html>