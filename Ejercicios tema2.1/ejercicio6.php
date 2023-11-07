<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>

<?php

// Un programa que genere 2 tiradas de 3 dados(simulando 2 jugadores). Muestre las dos tiradas y me diga cual tiene mayor puntuación(sumando las tiradas)

print ("<h1>Juego de tiradas de dados </h1>");

//tirada jugador 1
print("<h3> Jugador 1 </h3>");

$randplayer1tirada1 = rand(1,6);
$randplayer1tirada2 = rand(1,6);
$randplayer1tirada3 = rand(1,6);
$resultadoplayer1 = $randplayer1tirada1 + $randplayer1tirada2 + $randplayer1tirada3;

tiradaDados($randplayer1tirada1);
tiradaDados($randplayer1tirada2);
tiradaDados($randplayer1tirada3);
printf("<h4> El resultado de la tirada de los 3 dados ha sido %d </h4" ,$resultadoplayer1);

//tirada jugador 2
print("<br> <h3> Jugador 2  </h3>");

$randplayer2tirada1 = rand(1,6);
$randplayer2tirada2 = rand(1,6);
$randplayer2tirada3 = rand(1,6);
$resultadoplayer2 = $randplayer2tirada1 + $randplayer2tirada2 + $randplayer2tirada3;

tiradaDados($randplayer2tirada1);
tiradaDados($randplayer2tirada2);
tiradaDados($randplayer2tirada3);
printf("<h4> El resultado de la tirada de los 3 dados ha sido %d </h4" ,$resultadoplayer2);


$ganador = "Valor por defecto";

if($resultadoplayer1>$resultadoplayer2) {
    $ganador = " JUGADOR 1";
}
elseif ($resultadoplayer1==$resultadoplayer2) {
    $ganador = "... UN MOENTO, ESTO ES UN EMPATE !!";
}
else { $ganador = " JUGADOR 2"; }

printf("<div><h1> EL GANADOR DEL JUEGO HA SIDO EL %s </h1></div>",$ganador);

print(" <button> <a href=\"http://localhost/Entorno-servidor-daw/Ejercicios%20tema2.1/ejercicio6.php\"> Recarga el juego</button>");

//Funcion para determinar la tirada de dados
function tiradaDados($random) : void {

    switch ($random) {
        case 1:
            print(" <img src=\"/Entorno-Servidor-DAW/Ejercicios tema2.1/resources/1.jpg\" alt=\"Dado de valor 1\">   ");
            break;
        case 2:
            print(" <img src=\"/Entorno-Servidor-DAW/Ejercicios tema2.1/resources/2.jpg\" alt=\"Dado de valor 2\">   ");
            break;
        case 3:
            print(" <img src=\"/Entorno-Servidor-DAW/Ejercicios tema2.1/resources/3.jpg\" alt=\"Dado de valor 3\">   ");
            break;
        case 4:
            print(" <img src=\"/Entorno-Servidor-DAW/Ejercicios tema2.1/resources/4.jpg\" alt=\"Dado de valor 4\">   ");
            break;
        case 5:
            print(" <img src=\"/Entorno-Servidor-DAW/Ejercicios tema2.1/resources/5.jpg\" alt=\"Dado de valor 5\">   ");
            break;
        case 6:
            print(" <img src=\"/Entorno-Servidor-DAW/Ejercicios tema2.1/resources/6.jpg\" alt=\"Dado de valor 6\">   ");
            break;
        
        default:
            print("<h4> Algo ha salido mal, recarga la pagina</h4>");
            break;
    }
    
}

?>
    
</body>
</html>