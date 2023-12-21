<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include_once 'Bicicleta.php';
include_once 'Coche.php';
include_once 'Vechiculo.php';
// crea una bicicleta con 24 marchas
$miBici = new Bicicleta("24");
 
// crea un coche con 1500cc de cilindrada
$miCoche = new Coche(1500);
 
$miBici->recorre(40);
$miCoche->recorre(200);
echo $miBici->hazCaballito()."<br>";
echo $miCoche->quemaRueda()."<br>";
$miBici->recorre(60);
echo "Mi bici ha recorrido ".$miBici->getKmRecorridos()." Km<br>";
echo "Mi coche ha recorrido ".$miCoche->getKmRecorridos()." Km<br>";
echo "Se han creado un total de ".Vehiculo::getVehiculosCreados()." vehículos<br>";
echo "Todos los vehículos han hecho un total de ".Vehiculo::getKmTotales()." Km<br>";
?>


    
</body>
</html>




