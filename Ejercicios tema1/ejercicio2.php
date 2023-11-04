<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>

<?php

// Muestra los números del 320 al 160, contando de 20 en 20 utilizando un bucle for.

//Variable contador
$counter = 1;

for ($i=320 ; $i >= 160 ; $i-=20) { 
    
    
    $numeracion = $counter . "º";

    printf("<h3>El %s numero en esta cuenta regresiva es: %d </h3>", $numeracion,$i);
    
    $counter ++;
}

?>
    
</body>
</html>