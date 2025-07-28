<?php
// Lee las credenciales desde las variables de entorno.
// El operador '??' asigna un valor por defecto si la variable no existe.
$servidor = getenv('DB_HOST') ?? 'localhost';
$usuario  = getenv('DB_USER') ?? 'root';
$password = getenv('DB_PASS') ?? '';
$database = getenv('DB_NAME') ?? 'inmobiliaria';

// Establece la conexión
$conexion = mysqli_connect($servidor, $usuario, $password, $database);

// Comprueba la conexión
if (!$conexion) {
    // die() detiene la ejecución y muestra un mensaje. Es mejor que un simple echo.
    die("Fallo de conexión a la base de datos: " . mysqli_connect_error());
}

// Opcional: Asegurar que la conexión use UTF-8
mysqli_set_charset($conexion, 'utf8mb4');
?>