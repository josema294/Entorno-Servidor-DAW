<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio3.css">
    <title>Ejercicio3 Tema3</title>
</head>
<body>

<h1>Conversor de Kb a Mb</h1>
    <form action="" method="post">
        <label for="kilobytes">Kilobytes:</label>
        <input type="number" name="kilobytes" required>
        <input type="submit" value="Convertir">
    </form></br>



<?php
    function convertirKbAMb($kilobytes) {
        return round($kilobytes / 1024,3);
    }

    $resultado = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kilobytes = $_POST["kilobytes"];
        $megabytes = convertirKbAMb($kilobytes);
        $resultado = $kilobytes . " Kb son " . $megabytes . " Mb";
        print("<h3>$resultado</h3>");
    }

    
?>

    
</body>
</html>