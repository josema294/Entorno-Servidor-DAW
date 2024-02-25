<?php


//Primero de todo averiguar el id de usuario para que se guarde el piso con esa informacion



if (isset ($_GET["modificarPiso"])) {

    echo"modificando";

    $idPiso = $_GET["modificarPiso"];
    //Seleccionamos el piso que queremos modificar

    DataBaseConection::openConection();
    $conexion = DataBaseConection::getConexion();

    $sql = "SELECT * FROM pisos where Codigo_piso= $idPiso";
    $result = mysqli_query($conexion,$sql);
    $resultAsocc = mysqli_fetch_assoc($result);

    $idPiso = $resultAsocc['Codigo_piso'];
    $calle = $resultAsocc['calle'];
    $numero = $resultAsocc['numero'];
    $piso = isset($resultAsocc['piso']) ? $resultAsocc['piso'] : null; // Opcional
    $puerta = isset($resultAsocc['puerta']) ? $resultAsocc['puerta'] : null; // Opcional
    $cp = $resultAsocc['cp'];
    $metros = $resultAsocc['metros'];
    $zona = isset($resultAsocc['zona']) ? $resultAsocc['zona'] : null; // Opcional
    $precio = $resultAsocc['precio'];
    $imagen = $resultAsocc['imagen'];
    $usuario_id = $resultAsocc['usuario_id'];

    //Teniendo los datos los usamos para rellenar el fomulario
    

    printf('
    
    <div class="container mt-5">
  <div class="row justify-content-center">
     
    <div class="col-md-6">
    <div class="h2">Publica tu piso</div>
    <form action="./resolucionPiso.php" method="POST" >
  <div class="mb-3">
    <label for="calle" class="form-label">Calle</label>
    <input type="text" class="form-control" id="calle" name="calle" value="%s" required>
  </div>
  <div class="mb-3">
    <label for="numero" class="form-label">Número</label>
    <input type="number" class="form-control" id="numero" name="numero" value="%s" required>
  </div>
  <div class="mb-3">
    <label for="piso" class="form-label">Piso</label>
    <input type="number" class="form-control" id="piso" name="piso" value="%s">
  </div>
  <div class="mb-3">
    <label for="puerta" class="form-label">Puerta</label>
    <input type="text" class="form-control" id="puerta" name="puerta" value="%s">
  </div>
  <div class="mb-3">
    <label for="cp" class="form-label">Código Postal</label>
    <input type="number" class="form-control" id="cp" name="cp" value="%s" required>
  </div>
  <div class="mb-3">
    <label for="metros" class="form-label">Metros Cuadrados</label>
    <input type="number" class="form-control" id="metros" name="metros" value="%s" required>
  </div>
  <div class="mb-3">
    <label for="zona" class="form-label">Zona</label>
    <input type="text" class="form-control" id="zona" name="zona" value="%s">
  </div>
  <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="%s" required>
  </div>
  <div class="mb-3">
    <label for="precio" class="form-label">Propietario</label>
    <input type="number" step="0.01" class="form-control" id="userId" name="usuario_id" value="%s" required>
  </div>
  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    <input type="url" class="form-control" id="imagen" name="imagen" value="%s" >
    <input type="hidden" class="form-control" id="imagen" name="haciendoModificacion" value="haciendoModificacion" >
    <input type="hidden" class="form-control" id="idPiso" name="idPiso" value="%s" >
  </div>
  <div class="mb-3">
    

  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
    </div>
  </div>
</div>
    
    ',$calle, $numero,$piso,$puerta,$cp, $metros,$zona,$precio,$usuario_id,$imagen,$idPiso);

}


?>








