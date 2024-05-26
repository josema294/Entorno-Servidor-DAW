<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" src="./style.css">
    <link rel="stylesheet" href="./style1.css">
    <title>Document</title>
</head>
<body>


<form action="#" method="post">

<label for="nombre">Nombre:</label>
<input id="nombre" name="nombre" type="text">
<br>
<label for="enfermedad">Enfermedad:</label>
<input id="enfermedad" name="enfermedad" type="text">
<br>
<label for="nacimiento">Nacimiento:</label>
<input id="nacimiento" name="nacimiento" type="date">
<br>
<button type="submit">Grabar cita</button>


</form>
<?php



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $nombre = $_POST['nombre'];
    $enfermedad = $_POST['enfermedad'];
    $nacimiento = $_POST['nacimiento'];
    $random = rand(8,20);
    $gardaDato = "{$nombre}:{$enfermedad}:{$nacimiento}:{$random}\n";
    
    echo "<h3>Su cita se ha asignado a las {$random}:00 horas, se ruega puntualidad</h3>";
   
    //Ruta archivo
    $archivo = './citas.txt';

    // Abrir el archivo para añadir contenido ('a' es para append, que mantiene el contenido existente)
    $manejador = fopen($archivo, 'a');

    fwrite($manejador, $gardaDato);
    fclose($manejador);
    
}





?>
    
</body>
</html>