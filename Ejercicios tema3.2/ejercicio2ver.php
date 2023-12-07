<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio2.css">
    <title>ejercicio2 ver</title>
</head>
<body>

<?php
session_start();

$apellido="";
$nombre="";

if (isset($_SESSION["apellido"])) {
    
    $apellido = $_SESSION["apellido"];
}
if (isset($_SESSION["nombre"])) {
    
    $nombre = $_SESSION["nombre"];
}

?>

<h1>Su Nombre y apellidos son: </h1>

<?php

print(" <h3> Nombre: {$nombre} <br> Apellido: {$apellido} </h3>")

?>

<nav>
    <a href="./ejercicio2.php"> Voolver a la pagina principal</a>
</nav>


    
</body>
</html>