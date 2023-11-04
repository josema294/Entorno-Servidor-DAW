<?php

// Muestra los números múltiplos de 5 de un bucle de 0 a 100 utilizando while.

//Variable contador
$a = 0;

while ($a <= 100) {
    
    //Comprobamos los numeros divisibles por 5, excluimos el 0 por no se una operacion 
    if ($a%5==0) {
        
        printf("El numero %d es multiplo de 5. Matematicamente \"(%d / 5 = %d)\"  Es decir un numero entero sin decimales  \n",$a,$a,$a/5);
    }

    $a++;
}


?>