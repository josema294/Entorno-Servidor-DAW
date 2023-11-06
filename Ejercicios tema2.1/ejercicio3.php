<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>

<?php

// Muestra la tabla de multiplicar de un número generado de manera aleatoria entre 1 y 10. El resultado en formato <table>

$rand = rand(1,10);

print ("<h2>El numero elegido es el ". $rand . "</h3>");

//Imprimimos el encabezado de la tabla con los theads que queremos
print ( "<table border='1'>
<thead>
    <th>Numero natural multiplicador</th>
    <th>Nuestro numero aleatorio</th>
    <th>Resultado</th>
</thead>
<tbody>");

//Con un bucle podemos ir imprimiendo las filas que queramos segun lo grande que queramos la tabla de multiplicar
for ($i=0; $i <= 10 ; $i++) { 
    
    printf ("<tr>
    <td>%d</td>
    <td>%d</td>
    <td>%d</td>
  </tr>",$i,$rand,$rand*$i);

}

//Cerramos la tabla
print "</tbody></table>";

?>

</body>
</html>

