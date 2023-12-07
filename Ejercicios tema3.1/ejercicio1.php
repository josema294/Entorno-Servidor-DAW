<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio3.css">
    <title>Ejercicio1 Tema3</title>
</head>
<body>

<h2>Escribe un programa que sume, reste, multiplique y divida dos números introducidos por teclado.</h2>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora Básica</title>
</head>
<body>
    <form action="" method="post">
        Número 1: <input type="number" name="num1" required><br>
        Número 2: <input type="number" name="num2" required><br>
        Operación: 
        <select name="operacion">
            <option value="suma">Sumar</option>
            <option value="resta">Restar</option>
            <option value="multiplicacion">Multiplicar</option>
            <option value="division">Dividir</option>
        </select>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operacion = $_POST['operacion'];

    $resultado = 0;

    switch ($operacion) {
        case "suma":
            $resultado = $num1 + $num2;
            break;
        case "resta":
            $resultado = $num1 - $num2;
            break;
        case "multiplicacion":
            $resultado = $num1 * $num2;
            break;
        case "division":
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
            } else {
                $resultado = "Error: División por cero";
            }
            break;
    }

    echo "<h3>Resultado: $resultado </h3>" ;
}
?>

</body>
</html>


<?php




?>

    
</body>
</html>