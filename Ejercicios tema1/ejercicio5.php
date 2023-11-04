<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>

<?php

// Escribe un programa que muestre en dos columnas:  Numero -  cuadrado del numero de 10 números aleatorios entre 5 y 20.

//Imprimimos el encabezado de la tabla con los theads que queremos
print ( "<table border='1'>
<thead>
    <th>Numero</th>
    <th>Cuadrado del numero</th>
    
</thead>
<tbody>");
//Bucle para crear las filas de la tabla con los numero aleatorios
for ($i=0; $i < 10 ; $i++) { 
    
    $rand = rand(5,20);

    printf ("<tr>
    <td>%d</td>
    <td>%d</td>
  </tr>",$rand,pow($rand,2));
}




//Cerramos la tabla
print "</tbody></table>";

?>
    
</body>
</html>