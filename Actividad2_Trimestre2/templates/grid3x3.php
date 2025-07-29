<?php
// Ruta corregida y usando require_once para evitar incluir el archivo múltiples veces.
require_once __DIR__ . '/../config/db.php';

// Lógica de conexión simplificada
try {
    DatabaseConnection::openConnection(); // Nombre de la clase corregido
    $conexion = DatabaseConnection::getConnection(); // Nombre de la clase corregido
} catch (Exception $e) {
    die("No se pudo conectar a la base de datos.");
}

$puedeComprar = false;
$sql = "SELECT * FROM pisos WHERE PRECIO > 100000 LIMIT 9"; // LIMIT 9 es más eficiente
$result = mysqli_query($conexion, $sql);

// El array de pisos se llenará si la consulta tuvo éxito
$arrayPisos = [];
if ($result) {
    while ($fila = mysqli_fetch_assoc($result)) {
        $arrayPisos[] = $fila;
    }
}

function devuelveDescripcion(): string {
    $descripciones = [
        "Acogedora casa de 3 habitaciones con jardín espacioso y vistas al parque.",
        "Moderno apartamento en el centro, completamente amueblado y con las mejores comodidades.",
        "Chalet de lujo con piscina privada, 5 dormitorios y garaje para dos coches.",
        "Piso luminoso y recién reformado, con 2 baños y cocina equipada.",
        "Estudio compacto y eficiente, perfecto para solteros o parejas.",
        "Amplia vivienda unifamiliar con patio trasero, sótano y ático.",
        "Residencia histórica conservada con encanto del siglo XIX.",
        "Casa adosada con terraza en la azotea, ideal para entretenimiento.",
        "Apartamento en primera línea de playa, con acceso directo al mar.",
        "Duplex con encanto en el casco antiguo, recientemente renovado."
    ];
    return $descripciones[array_rand($descripciones)];
}
?>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4 my-5">

        <?php 
            require_once __DIR__ . '/card.php'; // Incluimos la función cardCasa

            // Bucle 'foreach' único y mucho más limpio
            foreach ($arrayPisos as $pisoData) {
                $descripcion = devuelveDescripcion();
                
                // Imprime la tarjeta y la envuelve en una columna de la grilla
                echo '<div class="col">';
                echo cardCasa(
                    $pisoData["Codigo_piso"], $pisoData["calle"], $pisoData["numero"],
                    $pisoData["piso"], $pisoData["puerta"], $pisoData["cp"],
                    $pisoData["metros"], $pisoData["zona"], $pisoData["precio"],
                    $pisoData["imagen"], $pisoData["usuario_id"], $descripcion, $puedeComprar
                );
                echo '</div>';
            }
        ?>
        
    </div>
</div>