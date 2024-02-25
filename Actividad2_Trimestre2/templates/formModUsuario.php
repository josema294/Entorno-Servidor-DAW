<?php
include( "./config/db.php");




DataBaseConection::openConection();
$conexion = DataBaseConection::getConexion();

//Para acceder a el id cuando no estoy en el ambito local creo idGlobal


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    if(isset($_GET['modificarUsuario'])){
        $id = $_GET['modificarUsuario'];
       
    } else {
        header("./../administracion.php");
        exit();
    }

    //Recuperamos los datos con el id de modificacion

    $query = "SELECT * FROM usuarios WHERE usuario_id = $id";
    $result = mysqli_query($conexion,$query);
    $usuario = mysqli_fetch_assoc($result);
    $nombre=$usuario["nombres"];
    $correo=$usuario["correo"];
    $clave=$usuario["clave"];
    $tipo=$usuario["tipo_usuario"];

    printf('
    <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="h2">Modificar Usuario</div>
      <form action="./publicarUser.php" method="POST">
        <div class="mb-3">
          <label for="nombres" class="form-label">Nombres</label>
          <input type="text" class="form-control" id="nombres" name="nombres" value="%s" required>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo Electrónico</label>
          <input type="email" class="form-control" id="correo" name="correo" value="%s" required>
        </div>
        <div class="mb-3">
          <label for="clave" class="form-label">Clave</label>
          <input type="password" class="form-control" id="clave" name="clave" value="%s" required>
        </div>
        <div class="mb-3">
        
          <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
          <select class="form-select" id="tipo_usuario" name="tipo_usuario" value="%s">
            <option value="admin">Administrador</option>
            <option value="comprador">Comprador</option>
            <option value="vendedor">Vendedor</option>
          </select>

          <input type="hidden" class="form-control" id="id" name="id" value="%s" required>
        </div>
        <button type="submit" class="btn btn-primary">Modificiar</button>
        
      </form>
      <a href="./administracion.php" class="btn btn-primary mt-3">Volver al panel de administracion</a>
    </div>
  </div>  
</div>',$nombre,$correo,$clave,$tipo,$id);
   


}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    print_r($_POST);

    $id= $_POST["id"];
    $nombres = $_POST['nombres'];
    $correo = $_POST['correo'];
    $clave = isset($_POST['clave']) ? $_POST['clave'] : 0000;
    $tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : null;

    $query = "UPDATE usuarios SET nombres = '$nombres', correo = '$correo', clave = '$clave', tipo_usuario = '$tipo_usuario' WHERE usuario_id = $id";

    if (mysqli_query($conexion, $query)>0) {


        echo ' <div class="alert alert-success" role="alert">
  Usuario modificado exitosamente!
</div>';
    } else {
        echo ' <div class="alert alert-danger" role="alert">
  Hubo un error al crear el usuario.
</div>';
    }

    print('
    <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="h2">Registrar Nuevo Usuario</div>
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="nombres" class="form-label">Nombres</label>
          <input type="text" class="form-control" id="nombres" name="nombres" required>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo Electrónico</label>
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="mb-3">
          <label for="clave" class="form-label">Clave</label>
          <input type="password" class="form-control" id="clave" name="clave" required>
        </div>
        <div class="mb-3">
          <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
          <select class="form-select" id="tipo_usuario" name="tipo_usuario">
            <option value="admin">Administrador</option>
            <option value="comprador">Comprador</option>
            <option value="vendedor">Vendedor</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        
      </form>
      <a href="./administracion.php" class="btn btn-primary mt-3">Volver al panel de administracion</a>
    </div>
  </div>  
</div>');


}
?>

<?php

   

?>




