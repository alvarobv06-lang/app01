# App04 - Aplicación Web Modular en PHP con Control de Acceso y Logs

Aplicación web desarrollada en PHP con arquitectura modular, Programación Orientada a Objetos (POO), control de excepciones, gestión de sesiones y estilos personalizados sobre Bootstrap 5.

## Características principales

## Despliegue en Nginx
- **localhost:8093**

## Usuarios y contraseñas
- admin = 1234
- juan = password

### Módulos funcionales
- **Calculadora Básica (`ej1_calc.php`):** Operaciones aritméticas fundamentales encapsuladas mediante POO (`Calculadora`) con control de división por cero.
- **Calculadora Científica (`ej2_cientifica.php`):** Herencia de clases (`CalculadoraCientifica`) para operaciones de potencia y raíz cuadrada con validación de números negativos mediante bloques `try - catch`.
- **Verificación de Mayoría de Edad (`ej3_edad.php`):** Validación de datos de entrada y gestión de flujo para usuarios invitados verificados.
- **Ordenación de Números (`ej4_numeros.php`):** Procesamiento y ordenación ascendente/descendente de conjuntos numéricos.
- **Cambio de Contraseña (`ej5_password.php`):** Actualización segura de credenciales de usuario.

### Seguridad, control de acceso y auditoría
- **Gestión de sesiones y cookies:** Control de estado de autenticación para usuarios registrados e invitados verificados.
- **Gestión de credenciales:** Autenticación contra almacén de usuarios (`usuarios.txt`) y cierre de sesión controlado (`logout.php` / `cerrar_sesion.php`).
- **Control de acceso basado en roles:** Restricción de vistas y funcionalidades según el perfil del usuario activo.
- **Sistema de Logger y auditoría (`logger.php` / `logs.txt`):** Registro automático de actividad, accesos y eventos de la aplicación en archivo de texto.
- **Visor de logs bastionado (`ver_log.php`):** Sección de consulta de registros accesible exclusivamente para el perfil `admin`, protegida frente a accesos no autorizados.

### Interfaz y estilos
- **Bootstrap 5 + CSS personalizado (`assets/css/custom.css`):** Tema oscuro con degradados dinámicos por sección, efectos *glow*, animaciones de tarjetas y botones, y barra de navegación adaptable al estado de sesión.

## Estructura del proyecto

```text
app04/
├── assets/
│   ├── bootstrap/
│   ├── css/
│   │   └── custom.css
│   └── js/
├── pags/
│   ├── calculadora_basica.php
│   ├── calculadora_cientifica.php
│   ├── cambio_password.php
│   ├── login.php
│   ├── mayoria_edad.php
│   └── numeros.php
├── PHP/
│   ├── includes/
│   │   ├── calculadora.php
│   │   ├── hearder.php
│   │   └── logger.php
│   ├── cerrar_sesion.php
│   ├── ej1_calc.php
│   ├── ej2_cientifica.php
│   ├── ej3_edad.php
│   ├── ej4_numeros.php
│   ├── ej5_password.php
│   ├── logout.php
│   ├── logs.txt
│   └── ver_log.php
├── index.php
├── LICENSE
├── README.md
└── usuarios.txt