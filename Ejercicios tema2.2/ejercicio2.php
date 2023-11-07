<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 unidad 2.2</title>
</head>
<body>

<?php

//Escribe un programa que genere un una tirada de 5 dados, que almacene la tirada en un vector.
// A continuación que muestre los dados y me diga donde cual es el dado más alto y en que posición se encuentra.


$resultado = []; //Vector de resultado de dados
$maxnum = 0; //Maximo valor en la tirada
$posmax = 0; //Int con del dado mas alto


for ($i=0; $i <6 ; $i++) { 
    
    $resultado[$i] = rand(1,6);
}

$maxnum = max($resultado);
$posmax = array_search($maxnum,$resultado)+1; //Sumo 1 para traducir la posicion 0 del array al significado de dado 1.



print ('<h1> Tirada de 5 dados, Cual sera el numero mayor ?? </h1>');


for ($i=0; $i < 6 ; $i++) { 
    
    printf('<img src="resources/%d.jpg" alt=\"Dado de valor 1\">',$resultado[$i]);
}

printf ('<h3> Como podemos comprobar, el numero mas alto ha sido el %d que sale por primera vez en la tirada %d </h3>',$maxnum,$posmax);

?>
    
</body>
</html>