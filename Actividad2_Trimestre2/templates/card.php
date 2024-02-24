<?php
 function cardCasa ($idpsio,$calle,$numero,$piso,$puerta,$cp,$metros,$zona,$precio,$imagen,$dueno,$descripcion) {


    print ('

    


    <div class="card" style="width: 18rem;">
    <img src="'. $imagen .'" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Piso:' . $idpsio . '</h5>
      <p class="card-text">'. $descripcion .'</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">' . $calle ." ". $numero. " " . $piso . $puerta . '</li>
      <li class="list-group-item">' . $cp . " " .  $zona . '</li>
      <li class="list-group-item"> Superficie : ' . $metros . " " .'metros cuadrados</li>
      <li class="list-group-item"> Precio: ' . $precio . " " . '€ </li>
      <li class="list-group-item">id propietario: ' . $dueno . '</li>
    </ul>
  </div>
  ');

} 
?>


