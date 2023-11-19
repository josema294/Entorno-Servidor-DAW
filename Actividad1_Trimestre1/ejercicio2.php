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
  $contadorganadas1 = 0;
  $contadorganadas2 =0;

  //print_r($resultadoPlayer1);
  //print_r($resultadoPlayer2);



  //Titulo del juego
  print('<h1> Juedo de dados </h1>');

  //Imprimimos las imagenes con los dados y su resultado
  print('<div><h3> El jugador 1 ha obtenido con su tirada: </h3>');
  for ($i = 0; $i < 5; $i++) {
    print("<img src=\"../Actividad1_Trimestre1/resources/imgs/{$resultadoPlayer1[$i]}.jpg\">");
  } print('</div>');
 


  print('<div><h3> El jugador 2 ha obtenido con su tirada: </h3>');
  for ($i = 0; $i < 5; $i++) {
    print("<img src=\"../Actividad1_Trimestre1/resources/imgs/{$resultadoPlayer2[$i]}.jpg\">");
  } print('</div>');

  print('</br>');
  print('<table>
  <thead>
      <th>Jugada </th>
      <th>Resultado J1 </th>
      <th>Resultado J2 </th>
      <th>Ganador </th>
  </thead>
  <tbody>');

  for ($i = 0; $i < 5; $i++) {
    print(" <tr>
    <td>
        " . $i + 1 . "
    </td>
    <td>
       " . $resultadoPlayer1[$i] . "
    </td>

    <td>
    " . $resultadoPlayer2[$i] . "
    </td>
    <td>

    " . rondaGanada($resultadoPlayer1,  $resultadoPlayer2, $i) . "
        
    </td>
</tr>");
  }
  print("</tbody)</table>");

  //Ganador por rondas

  if ($contadorganadas1>$contadorganadas2) {
    printf('<div class="ganador"><h1> El ganador global del juego ha sido el jugador 1 con %d rondas ganadas</h1>',$contadorganadas1);
  }else{printf('<div class="ganador"><h1> El ganador global del juego ha sido el jugador 2 con %d rondas ganadas</h1>',$contadorganadas2); }

  //Recargar el juego
  print('<form action="" method="post">
  <button class="button-74" type="submit">Recargar Página</button>
  </form>');


  //Funciones pra el programa

  function tiradaDados(): array
  {

    $playerResult = [];

    for ($i = 0; $i < 5; $i++) {

      $playerResult[$i] = rand(1, 6);
    }

    return $playerResult;
  }

  function rondaGanada($resultadoPlayer1, $resultadoPlayer2, $ronda)
  {

    if ($resultadoPlayer1[$ronda] > $resultadoPlayer2[$ronda]) {
      global $contadorganadas1;
      $contadorganadas1++;
      return "Jugador 1";
    } else if ($resultadoPlayer1[$ronda] == $resultadoPlayer2[$ronda]) {

      return "empate";
    } else {
      global $contadorganadas2;
      $contadorganadas2++;
      return "Jugador 2";
    }
  }

  function contadorGanadas ( $resultadoPlayer1,$resultadoPlayer2){
    $resultadoPlayer1 = 4;
    return $resultadoPlayer1;
  }

  ?>

</body>

</html>