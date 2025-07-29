<?php
// 1. Incluye tu clase de conexión
require_once __DIR__ . '/config/db.php'; // Asegúrate de que la ruta sea correcta

echo "Intentando conectar a la base de datos...<br>";

try {
    // 2. Intenta abrir la conexión
    DatabaseConnection::openConnection();
    
    // Si la línea anterior no falla, la conexión fue exitosa
    echo "<strong>¡Conexión exitosa!</strong> La configuración es correcta.";

} catch (Exception $e) {
    // 3. Si la conexión falla, se captura el error aquí
    echo "<strong>Error al conectar:</strong> " . $e->getMessage();
}

?>