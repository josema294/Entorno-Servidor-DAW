<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio1.css">
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

if (isset($_POST["input1"])) {
    $parametro1 = $_POST["input1"];
}
if (isset($_POST["input2"])) {
    $parametro2 = $_POST["input2"];
}
if (isset($_POST["input3"])) {
    $parametro3 = $_POST["input3"];
}




if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $max = maximo ($parametro1,$parametro2,$parametro3);
    printf("<h2>El numero maximo de los introducidos es %s </h2>",$max);
}



?>
    
</body>
</html>