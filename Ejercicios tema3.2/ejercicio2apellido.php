<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio2.css">
    <title>ejercicio2 apellido</title>
</head>
<body>

<?php


if (isset($_POST["apellido"])) {
    
    $_SESSION["apellido"]=$_POST["apellido"];
}

?>

<form action="" method="post">
    <input type="text" name="apellido" required>
    <button type="submit">Enviar</button>

</form>

<nav>
    <a href="./ejercicio2.php"> Voolver a la pagina principal</a>
</nav>


    
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
</body>
</html>