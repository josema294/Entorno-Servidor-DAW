<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio4.css">
    <title>ejercicio4 tema3</title>
</head>

<body>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = $_POST['nombre'] ?? '';
        $apellidos = $_POST['apellidos'] ?? '';
        $edad = $_POST['edad'] ?? '';
        $peso = $_POST['peso'] ?? '';
        $sexo = $_POST['sexo'] ?? '';
        $estadoCivil = $_POST['estado_civil'] ?? '';
        $aficiones = $_POST['aficiones'] ?? ["Sin aficiones"];


        echo "Su nombre es $nombre<br>";
        echo "Sus apellidos son $apellidos.<br>";
        echo "Tiene entre $edad.<br>";
        echo "Su peso es de $peso kg.<br>";
        echo "Es un $sexo <br>";
        echo "Su estado civil es $estadoCivil.<br>";
        echo "Le gusta: " . implode(", ", $aficiones) . "<br>";
    }
    ?>

</body>

</html>