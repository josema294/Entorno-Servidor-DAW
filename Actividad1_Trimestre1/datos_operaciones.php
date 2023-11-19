<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Actividad1_Trimestre1/resources/css/operaciones.css">
    <title>Actividad Evaluable Ejercicio 3</title>
</head>
<body>

<?php


//Si POST
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $rutaVuelta= $_SERVER['HTTP_REFERER'];
    $primerNum = $_POST['num1'];
    $segundNum =$_POST['num2'];
    $operacion = $_POST['operacion'];

    $resultado = opera($primerNum,$segundNum,$operacion);

    printf('<p class="resultado-numero">' . number_format($resultado,3) . '</p>');
    print("<form action=\"{$rutaVuelta}\" method=\"get\">
    <input type=\"submit\" value=\"Ir Atras\">
    </form>");



    
}


function opera($num1,$num2,$oper){

    switch ($oper) {
        case 'sum':
            return $num1+$num2;
            case 'resta':
            return $num1-$num2;
        case 'multi':
            return $num1*$num2;
        case 'divid':
            return $num1/$num2;
        default:
            return"fallo en el servidor";
    }
}


?>

    
</body>
</html>