<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio2.css">
    <title>ejercicio2 borrar</title>
</head>
<body>

<?php

session_start();

if (isset($_POST["borrar"])) {

    session_destroy();
    
}


?>

<h2>Borre los datos pulsando en el boton borrar</h2>

<form action="" method="post">
    <button type="submit" name=borrar >Borrar los datos</button>
</form>

<nav>
    <a href="./ejercicio2.php"> Voolver a la pagina principal</a>
</nav>


    
</body>
</html>