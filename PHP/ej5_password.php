<?php
session_start();

// Establecemos la contraseña por defecto la primera vez que logueamos
if (!isset($_SESSION['password'])) 
    {
    $_SESSION['password'] = "1234"; // Contraseña inicial
    }
// Comprobamos que nos llegan el usuario y la contraseña
if (isset($_POST['usuario']) && isset($_POST['nueva'])) 
    {
    $usuario = $_POST['usuario'];
    $nueva = $_POST['nueva'];

    try 
        {
        // Validación contraseña
        if ($nueva !== $_SESSION['password']) 
            {
            throw new Exception("La contraseña es incorrecta.");
            }

        // Si todo está bien, guardamos el usuario en la sesión
        $_SESSION['usuario'] = $usuario;
        
        // Redirigimos con mensaje de éxito
        header("Location: ../pags/cambio_password.php?tipo=exito&mensaje=Bienvenido " . urlencode($usuario));
        exit;
        } 
    catch (Exception $error) 
        {
        header("Location: ../pags/cambio_password.php?tipo=error&mensaje=" . urlencode($error->getMessage()));
        exit;
        }
    } 
else 
    {
    header("Location: ../pags/cambio_password.php");
    exit;
    }
?>