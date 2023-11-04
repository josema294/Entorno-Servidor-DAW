<?php

// Muestra los números del 320 al 160, contando de 20 en 20 utilizando un bucle for.

//Variable contador
$counter = 1;

for ($i=320 ; $i >= 160 ; $i-=20) { 
    
    
    $numeracion = $counter . "º";

    printf("El %s numero en esta cuenta regresiva es: %d \n", $numeracion,$i);
    
    $counter ++;
}

?>