<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador visitas ejercicio 3</title>
    <link rel=stylesheet href="./styles/ejercicio3.css">
</head>
<body>

<?php


$contadorStart = 1;


if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = $contadorStart;
} else {
    $_SESSION['contador']++;
}

?>

<h1>Hola bienvenido a mi pagina web</h1>

<h6>Visitas totales:</h6>
<?php
print($_SESSION['contador']);
?>
    
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
</body>
</html>