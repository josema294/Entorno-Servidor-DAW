<?php
require_once __DIR__ . '/../config/db.php'; // Ruta corregida y más robusta

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nombres = $_POST['nombres'] ?? '';
  $correo = $_POST['correo'] ?? '';
  $clave_plain = $_POST['clave'] ?? '';
  $tipo_usuario = $_POST['tipo_usuario'] ?? null;

  // Validaciones básicas
  if (empty($nombres) || empty($correo) || empty($clave_plain) || empty($tipo_usuario)) {
      $error_message = "Por favor, complete todos los campos.";
  } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
      $error_message = "El formato del correo electrónico no es válido.";
  } else {
      try {
          DatabaseConnection::openConnection();
          $conexion = DatabaseConnection::getConnection();

          // Comprobar si el correo ya existe
          $sql_check = "SELECT usuario_id FROM usuarios WHERE correo = ?";
          $stmt_check = mysqli_prepare($conexion, $sql_check);
          mysqli_stmt_bind_param($stmt_check, "s", $correo);
          mysqli_stmt_execute($stmt_check);
          $result_check = mysqli_stmt_get_result($stmt_check);

          if (mysqli_num_rows($result_check) > 0) {
              $error_message = "El correo electrónico ya está registrado.";
          } else {
              // Hashear la contraseña
              $clave_hashed = password_hash($clave_plain, PASSWORD_DEFAULT);

              // Insertar usuario con sentencia preparada
              $query = "INSERT INTO usuarios (nombres, correo, clave, tipo_usuario) VALUES (?, ?, ?, ?)";
              $stmt = mysqli_prepare($conexion, $query);
              mysqli_stmt_bind_param($stmt, "ssss", $nombres, $correo, $clave_hashed, $tipo_usuario);

              if (mysqli_stmt_execute($stmt)) {
                  $success_message = "Usuario creado exitosamente!";
              } else {
                  $error_message = "Hubo un error al crear el usuario: " . mysqli_error($conexion);
              }
              mysqli_stmt_close($stmt);
          }
          mysqli_stmt_close($stmt_check);
          DatabaseConnection::closeConnection();

      } catch (Exception $e) {
          $error_message = "Error del sistema al crear el usuario. Por favor, inténtelo más tarde.";
          // error_log($e->getMessage());
      }
  }
}
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="h2">Registrar Nuevo Usuario</div>

      <?php if (!empty($success_message)): ?>
          <div class="alert alert-success" role="alert">
              <?php echo htmlspecialchars($success_message); ?>
          </div>
      <?php endif; ?>
      <?php if (!empty($error_message)): ?>
          <div class="alert alert-danger" role="alert">
              <?php echo htmlspecialchars($error_message); ?>
          </div>
      <?php endif; ?>

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