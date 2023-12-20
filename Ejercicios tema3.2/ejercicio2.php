<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio2.css">
    <title>Ejercicio 2 tema 3.2</title>
</head>
<body>
        <!-- 2.- Hacer un programa con sesiones.

Queremos un menú con enlaces:

Elija una opción:

Escribir su nombre
Escribir sus apellidos
Ver su nombre y apellido
Borrar la información
Tiene que haber un enlace en cada web para volver al programa principal. -->
<nav>
    <list>
        <ul> <a href="./ejercicio2nombre.php">Escribir su nombre</a></ul>
        <ul><a href="./ejercicio2apellido.php">Escribir su apellido</a></ul>
        <ul><a href="./ejercicio2ver.php">Ver su nombre y apellido</a></ul>
        <ul><a href="./ejercicio2borra.php">Borra los datos</a></ul>
        
    </list>

</nav>

<?php
session_start();
?>
    
</body>
</html>