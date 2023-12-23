<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio2.css">
    <title>Document</title>
</head>
<body>

<?php

include_once 'Bicicleta.php';
include_once 'Coche.php';
include_once 'Vechiculo.php';


$miBici = new Bicicleta("32");
$miBici2 = new Bicicleta("1");
$miCoche = new Coche(2500);
$miCamion = new Coche(6500);
 
$miBici->recorre(234);
$miBici2->recorre(1);
$miCoche->recorre(123);
$miCamion->recorre(122343);
echo $miBici->hazCaballito()."<br>";
echo $miCoche->quemaRueda()."<br>";
$miBici->recorre(56);
$miCoche->recorre(78);

echo "Mi bici ha recorrido ".$miBici->getKmRecorridos()." Km<br>";
echo "Mi coche ha recorrido ".$miCoche->getKmRecorridos()." Km<br>";
echo "Mi bici2 ha recorrido ".$miBici2->getKmRecorridos()." Km<br>";
echo "Mi camion ha recorrido ".$miCamion->getKmRecorridos()." Km<br>";
echo "Se han creado un total de ".Vehiculo::getVehiculosCreados()." vehículos<br>";
echo "Todos los vehículos han hecho un total de ".Vehiculo::getKmTotales()." Km<br>";
?>


    
</body>
</html>




