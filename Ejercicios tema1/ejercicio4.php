<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

//Realiza un programa que nos diga cuántos dígitos tiene un número aleatorio entre (0 y 9999). Mostrar el número y la cantidad de dígitos.

//Lo primero generar le numero aleatorio:

$rand = rand(0,9999);
print ("<h2>El numero elegido es el ". $rand . "</h3>");

//Ahora calcularemos cuantos digitos tiene la variable rand

switch ($rand) {
    case $rand<10:
        print ("<h4>El numero elegido tiene exactamente 1 digito </h3>");
        break;
    case $rand<100:
        print ("<h4>El numero elegido tiene exactamente 2 digitos </h3>");
        break;
    case $rand<1000:
        print ("<h4>El numero elegido tiene exactamente 3 digitos </h3>");
        break;
    case $rand<10000:
        print ("<h4>El numero elegido tiene exactamente 4 digitos </h3>");
        break;
    
    default:
       print ("<h4>Algo no fue como se esperaba, recargue la pagina por favor</h4>");
        break;
}


?>


</body>
</html>