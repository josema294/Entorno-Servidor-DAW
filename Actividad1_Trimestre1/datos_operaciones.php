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
    
    if (is_numeric($_POST['num1']) ) {
       
        $primerNum = $_POST['num1'];
    }
   if (is_numeric($_POST['num2']) ) {
        
        $segundNum =$_POST['num2'];
   }
   
    if(isset($primerNum) && isset($segundNum) && isset($_POST['operacion']) ) {
        $operacion = $_POST['operacion'];
        $resultado = opera($primerNum,$segundNum,$operacion);

        printf("<p class=\"resultado-enunciado\"> El resultado de realizar $operacion de los números $primerNum y $segundNum es:</p>");
        printf("<p class=\"resultado-numero\">   $resultado  </p>");
        print("<form action=\"{$rutaVuelta}\" method=\"get\">
        <input type=\"submit\" value=\"Ir Atras\">
        </form>");}

    else {
        print('<h2 class="alerta"> Datos imcompletos o incorrectos, redirigase a la pagina anterior</h2>
        <div class="alerta"> <a href="../Actividad1_Trimestre1/operaciones.php"> volver</a></div>');
    }
    
}

elseif($_SERVER["REQUEST_METHOD"]=="GET") {
    print('<h2 class="alerta"> Datos imcompletos o incorrectos, redirigase a la pagina anterior</h2>
    <div class="alerta"> <a href="../Actividad1_Trimestre1/operaciones.php"> volver</a></div>');
}

function opera($num1,$num2,$oper){

    switch ($oper) {
        case 'la suma':
            $retorno = $num1+$num2;
            if (is_int( $retorno)) {
                return  $retorno;
            }else { return number_format($retorno,3); }

            case 'la resta':
                $retorno = $num1-$num2;
                if (is_int( $retorno)) {
                    return  $retorno;
                }else { return number_format($retorno,3); }
        case 'la multiplicacion':
            $retorno = $num1*$num2;
            if (is_int( $retorno)) {
                return  $retorno;
            }else { return number_format($retorno,3); }
        case 'el cociente':
            $retorno = $num1/$num2;
            if (is_int( $retorno)) {
                return  $retorno;
            }else { return number_format($retorno,3); }
        default:
            return"fallo en el servidor";
    }
}

?>
</body>
</html>