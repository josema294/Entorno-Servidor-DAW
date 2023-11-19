<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Actividad1_Trimestre1/resources/css/styleEjercicio1.css">
    <title>Actividad Evaluable Ejercicio 1</title>

</head>

<body>

    <?php

    // Realizar un programa PHP que generé 2 números aleatorios (entre 5 y 15) y me dibujé un
    // rectángulo de asteriscos como se puesta en la figura:

    //Variables
    define('MAX_ALTO', 15);
    define('MAX_ANCHO', 15);
    define('MIN_ALTO', 5);
    define('MIN_ANCHO', 5);

    $dimensiones = dimensioniza(MAX_ALTO, MAX_ANCHO, MIN_ALTO, MIN_ANCHO);



    //Titulo
    print("<h1>Ejercicio rectangulo aleatorio<h1>");
    print("<h3> El rectangulo es de: {$dimensiones['ancho']} x {$dimensiones['alto']}</h3>");
    print('</br>');
    print('<div class="rectangulo">');
    //Dibujamos rectangulo
    for ($i = 0; $i < $dimensiones['alto']; $i++) {

        for ($j = 0; $j < $dimensiones['ancho']; $j++) {
            print("*");
        }
        print('</br>');
        
    }
    print('</div');

    //Recibe alto y ancho maximo para generar un rectangulo con dimensiones aleatorias entre los valores proporcionados
    function dimensioniza($maxAlto, $maxAncho, $minAlto, $minAncho)
    {

        $anchoAleatorio = rand($minAncho, $maxAncho);
        $altoAleatorio = rand($minAlto, $maxAlto);
        $dimensiones = ['ancho' => $anchoAleatorio, 'alto' => $altoAleatorio];

        return $dimensiones;
    }

    ?>

</body>

</html>