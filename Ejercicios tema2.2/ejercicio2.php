<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 unidad 2.2</title>
</head>
<body>

<?php

//Escribe un programa que genere un una tirada de 5 dados, que almacene la tirada en un vector.
// A continuación que muestre los dados y me diga donde cual es el dado más alto y en que posición se encuentra.


$resultado = []; //Vector de resultado de dados
$maxnum = 0; //Maximo valor en la tirada
$posmax = 0; //Int con del dado mas alto


for ($i=0; $i <6 ; $i++) { 
    
    $resultado[$i] = rand(1,6);

    if($resultado[$i]>$maxnum) {
        $maxnum = $resultado[$i];
        $posmax = $i+1;
        $posicionmaxima = $posmax;

    }

    if ($resultado[$i]==$maxnum){

        $posicionmaxima = 

        
    }

    

}

echo("Valor maximo: " . $maxnum . " En la tirada: " .  $posmax);





?>
    
</body>
</html>