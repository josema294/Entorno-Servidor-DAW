<?php
include("./config/db.php");

//Primero de todo averiguar el id de usuario para que se guarde el piso con esa informacion

DataBaseConection::openConection();
$conexion = DataBaseConection::getConexion();

print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $piso = isset($_POST['piso']) ? $_POST['piso'] : null; // Opcional
    $puerta = isset($_POST['puerta']) ? $_POST['puerta'] : null; // Opcional
    $cp = $_POST['cp'];
    $metros = $_POST['metros'];
    $zona = isset($_POST['zona']) ? $_POST['zona'] : null; // Opcional
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $usuario_id = ($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : 000; // Opcional

    $query = "INSERT INTO pisos (calle, numero, piso, puerta, cp, metros, zona, precio, imagen, usuario_id) VALUES ('$calle', $numero, $piso, '$puerta', $cp, $metros, '$zona', $precio, '$imagen', $usuario_id)";

    if (mysqli_query($conexion, $query)){

       echo ' <div class="alert alert-success" role="alert">
  Insercion realizada, tu piso ha sido incluido!
</div>';

    };




}


?>



<div class="container mt-5">
  <div class="row justify-content-center">
     
    <div class="col-md-6">
    <div class="h2">Publica tu piso</div>
    <form action="#" method="POST" >
  <div class="mb-3">
    <label for="calle" class="form-label">Calle</label>
    <input type="text" class="form-control" id="calle" name="calle" required>
  </div>
  <div class="mb-3">
    <label for="numero" class="form-label">Número</label>
    <input type="number" class="form-control" id="numero" name="numero" required>
  </div>
  <div class="mb-3">
    <label for="piso" class="form-label">Piso</label>
    <input type="number" class="form-control" id="piso" name="piso">
  </div>
  <div class="mb-3">
    <label for="puerta" class="form-label">Puerta</label>
    <input type="text" class="form-control" id="puerta" name="puerta">
  </div>
  <div class="mb-3">
    <label for="cp" class="form-label">Código Postal</label>
    <input type="number" class="form-control" id="cp" name="cp" required>
  </div>
  <div class="mb-3">
    <label for="metros" class="form-label">Metros Cuadrados</label>
    <input type="number" class="form-control" id="metros" name="metros" required>
  </div>
  <div class="mb-3">
    <label for="zona" class="form-label">Zona</label>
    <input type="text" class="form-control" id="zona" name="zona">
  </div>
  <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
  </div>
  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    <input type="url" class="form-control" id="imagen" name="imagen">
  </div>
  <div class="mb-3">
    

  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
    </div>
  </div>
</div>




