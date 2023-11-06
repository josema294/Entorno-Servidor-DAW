<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 U2.2</title>

    

</head>

<body>

    <?php

    /* 
* Define tres arrays de 10 números enteros cada una, con nombres "numero",cuadrado"
* y "cubo". Carga el array "numero" con valores aleatorios entre 0 y 100.
* En el array "cuadrado" se deben almacenar los cuadrados de los valores que hay en el array "numero".
* En el array "cubo" se deben almacenar los cubos de los valores que hay en "numero".
* A continuación, muestra el contenido de los tres arrays dispuestos en tres columnas.
*
*/

    $numero = [];
    $cuadrado = [];
    $cubo = [];

    for ($i = 0; $i < 10; $i++) {

        $numero[$i] = rand(0, 100);
    }

    for ($i = 0; $i < 10; $i++) {

        $cuadrado[$i] = pow($numero[$i], 2);
    }

    for ($i = 0; $i < 10; $i++) {

        $cubo[$i] = pow($numero[$i], 3);
    }

    tabla($numero, $cuadrado, $cubo);



    function tabla($numero, $cuadrado, $cubo)
    {

        print('<table class="tablacss" border="1">
        <thead>
            <th>Numero</th>
            <th>Cuadrado</th>
            <th>Cubo</th>
        </thead>');

        for ($i = 0; $i < 10; $i++) {

            printf('<tr>
            <td>%d</td>
            <td>%d</td>
            <td>%d</td>
        </tr>', $numero[$i], $cuadrado[$i], $cubo[$i]);
        }

        print('</table>');
    }

    ?>

</body>

</html>