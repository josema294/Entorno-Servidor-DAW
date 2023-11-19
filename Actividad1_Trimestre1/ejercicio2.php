<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actividad Evaluable Ejercicio 2</title>
  <link rel="stylesheet" href="../Actividad1_Trimestre1/resources/css/style.css">

</head>

<body>

  <!-- El objetivo de este ejercicio es crear un programa en PHP que simule un juego de dados para
dos jugadores. En lugar de un dado, cada jugador lanzará 5 dados y se almacenarán los
resultados en dos matrices. Después de cada tirada, el programa determinará quién gana según
las reglas del juego y mostrará el resultado. -->

  <?php


  $resultadoPlayer1 = tiradaDados();
  $resultadoPlayer2 = tiradaDados();

  //print_r($resultadoPlayer1);
  //print_r($resultadoPlayer2);

  function tiradaDados(): array
  {

    $playerResult = [];

    for ($i = 0; $i < 5; $i++) {

      $playerResult[$i] = rand(1, 6);
    }

    return $playerResult;
  }

  //Titulo del juego
  print('<h1> Juedo de dados </h1>');

  //Imprimimos las imagenes con los dados y su resultado
  print('<div><h3> El jugador 1 ha obtenido con su tirada: </h3>');
  for ($i = 0; $i < 5; $i++) {
    print("<img src=\"../Actividad1_Trimestre1/resources/imgs/{$resultadoPlayer1[$i]}.jpg\">");
  }

  //var_dump($resultadoPlayer1);
  $sumaJugador1 = array_sum($resultadoPlayer1);
  print("</div><h3> Esto hace un total de: {$sumaJugador1} </h3>");

  print('<div><h3> El jugador 2 ha obtenido con su tirada: </h3>');
  for ($i = 0; $i < 5; $i++) {
    print("<img src=\"../Actividad1_Trimestre1/resources/imgs/{$resultadoPlayer2[$i]}.jpg\">");
  }
  $sumaJugador2 = array_sum($resultadoPlayer2);
  print("</div><h3> Esto hace un total de: {$sumaJugador2} </h3>");

  if ($sumaJugador1 > $sumaJugador2) {
    print("<h2> Enhorabuena al jugador 1, ha salido victorioso con una puntuacion mayor </h3>");
  } elseif ($sumaJugador1 == $sumaJugador2) {
    print("<h2> Sorprendentemente se trata de un empate, no hay ganador. </h3>");
  } else {
    print("<h2> Enhorabuena al jugador 2, ha salido victorioso con una puntuacion mayor </h3>");
  }

  //Recargar el juego
  print('<form action="" method="post">
  <button class="button-74" type="submit">Recargar Página</button>
  </form>');

  ?>

</body>

</html>