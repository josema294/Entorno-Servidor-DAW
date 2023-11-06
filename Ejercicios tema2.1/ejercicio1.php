<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>

    <?php

    // Muestra los números múltiplos de 5 de un bucle de 0 a 100 utilizando while.

    //Variable contador
    $a = 0;

    while ($a <= 100) {

        //Comprobamos los numeros divisibles por 5
        if ($a % 5 == 0) {

            printf("<h3>El numero %d es multiplo de 5. Matematicamente \"(%d / 5 = %d)\"  Es decir un numero entero sin decimales <h3>", $a, $a, $a / 5);
        }

        $a++;
    }

    ?>

</body>

</html>