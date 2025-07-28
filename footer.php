<?php
// --- INICIO DE LA LÓGICA ---

// Define el contenido HTML y los estilos base.
$estilos = <<<CSS
<style>
  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
    z-index: 1000;
    font-family: sans-serif;
    font-size: 0.9em;
  }
  .footer a {
    color: white;
    text-decoration: none;
    font-weight: bold;
  }
  .footer .info-ejercicio {
    color: #bbb;
    margin-left: 25px;
  }
</style>
CSS;

// Variable para guardar la información del ejercicio (si existe).
$infoEjercicioHTML = '';

// Comprueba si la variable $nombreEjercicio fue definida en la página que incluye este footer.
if (isset($nombreEjercicio)) {
    // Escapa los caracteres HTML por seguridad y prepara el texto.
    $nombreSeguro = htmlspecialchars($nombreEjercicio);
    $infoEjercicioHTML = "<span class='info-ejercicio'>| Estás viendo: <strong>{$nombreSeguro}</strong></span>";
}

// --- IMPRESIÓN DEL FOOTER ---

// Imprime los estilos CSS.
echo $estilos;

// Imprime el contenedor del footer con el enlace principal y la información del ejercicio.
echo "<div class='footer'>";
echo '  <a href="/index.html">🏠 Volver al Menú Principal</a>';
echo $infoEjercicioHTML; // Imprime la información del ejercicio (si existe).
echo "</div>";

?>