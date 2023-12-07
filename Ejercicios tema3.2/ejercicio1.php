<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 tema 3.2</title>
</head>
<body>



<!-- Hacer un programa php que tenga una función que reciba con 3 números y devuelva el mayor de ellos. -->


<h1>Hacer un programa php que tenga una función que reciba con 3 números y devuelva el mayor de ellos.</h1>

<h3>Introduzca los numeros a evaluar</h3>
<form action="" method="post">

    <input type="number" name = "input1">
    <input type="number" name = "input2">
    <input type="number" name = "input3">
    <button type="submit">Enviar</button>
</form>

<h4>El resultado es:</h4>


<?php

function maximo ($num1,$num2,$num3) {

    $mayor = $num1;

    if($num2>$mayor){
        $mayor = $num2;
    }

    if($num3>$mayor){
        $mayor = $num3;
    }

    return $mayor;
}

$parametro1 = 5;
$parametro2 = 9;
$parametro3 = 2;

printf("<h2>El numero maximo de los introducidos en </h2>");
maximo ($parametro1,$parametro2,$parametro3);

?>
    
</body>
</html>