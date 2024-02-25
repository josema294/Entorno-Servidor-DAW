<?php
include("./config/db.php");

DataBaseConection::openConection();
$conexion = DataBaseConection::getConexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nombres = $_POST['nombres'];
  $correo = $_POST['correo'];
  // Aquí deberías hashear la clave antes de guardarla en tu base de datos por seguridad
  $clave = isset($_POST['clave']) ? $_POST['clave'] : 0000;
  $tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : null;

  $query = "INSERT INTO usuarios (nombres, correo, clave, tipo_usuario) VALUES ('$nombres', '$correo', '$clave', '$tipo_usuario')";

  if (mysqli_query($conexion, $query)) {
    echo ' <div class="alert alert-success" role="alert">
  Usuario creado exitosamente!
</div>';
  } else {
    echo ' <div class="alert alert-danger" role="alert">
  Hubo un error al crear el usuario.
</div>';
  }
}
?>


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="h2">Registrar Nuevo Usuario</div>
      <form action="./publicarUser.php" method="POST">
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
</div>