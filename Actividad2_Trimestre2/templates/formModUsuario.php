<?php
require_once __DIR__ . '/../config/db.php'; // Ruta corregida y más robusta

$userData = null; // Variable para almacenar los datos del usuario
$success_message = "";
$error_message = "";

// Lógica para cargar datos del usuario (GET request)
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['modificarUsuario'])) {
        $id = filter_var($_GET['modificarUsuario'], FILTER_VALIDATE_INT);

        if ($id === false) {
            $error_message = "ID de usuario no válido.";
        } else {
            try {
                DatabaseConnection::openConnection();
                $conexion = DatabaseConnection::getConnection();

                $query = "SELECT usuario_id, nombres, correo, tipo_usuario FROM usuarios WHERE usuario_id = ?";
                $stmt = mysqli_prepare($conexion, $query);
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($result && mysqli_num_rows($result) == 1) {
                    $userData = mysqli_fetch_assoc($result);
                } else {
                    $error_message = "Usuario no encontrado.";
                }

                mysqli_stmt_close($stmt);
                DatabaseConnection::closeConnection();

            } catch (Exception $e) {
                $error_message = "Error del sistema al cargar el usuario. Por favor, inténtelo más tarde.";
                // error_log($e->getMessage());
            }
        }
    } else {
        // Si no se proporciona un ID de usuario para modificar, redirigir
        header("Location: ./administracion.php");
        exit();
    }
}

// Lógica para procesar la modificación del usuario (POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
    $nombres = $_POST['nombres'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $clave_nueva = $_POST['clave'] ?? ''; // Nueva clave, puede estar vacía
    $tipo_usuario = $_POST['tipo_usuario'] ?? null;

    if ($id === false || empty($nombres) || empty($correo) || empty($tipo_usuario)) {
        $error_message = "Datos de usuario incompletos o no válidos.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error_message = "El formato del correo electrónico no es válido.";
    } else {
        try {
            DatabaseConnection::openConnection();
            $conexion = DatabaseConnection::getConnection();

            // Construir la consulta UPDATE dinámicamente para la clave
            $sql_update = "UPDATE usuarios SET nombres = ?, correo = ?, tipo_usuario = ?";
            $types = "sss";
            $params = [&$nombres, &$correo, &$tipo_usuario];

            if (!empty($clave_nueva)) {
                $clave_hashed = password_hash($clave_nueva, PASSWORD_DEFAULT);
                $sql_update .= ", clave = ?";
                $types .= "s";
                $params[] = &$clave_hashed;
            }

            $sql_update .= " WHERE usuario_id = ?";
            $types .= "i";
            $params[] = &$id;

            $stmt = mysqli_prepare($conexion, $sql_update);
            
            // Bind parameters dynamically
            mysqli_stmt_bind_param($stmt, $types, ...$params);

            if (mysqli_stmt_execute($stmt)) {
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    $success_message = "Usuario modificado exitosamente!";
                } else {
                    $error_message = "Fallo al modificar usuario: ningún dato ha cambiado o el usuario no existe.";
                }
            } else {
                $error_message = "Error al ejecutar la modificación: " . mysqli_error($conexion);
            }

            mysqli_stmt_close($stmt);
            DatabaseConnection::closeConnection();

        } catch (Exception $e) {
            $error_message = "Error del sistema al modificar el usuario. Por favor, inténtelo más tarde.";
            // error_log($e->getMessage());
        }
    }
    // Recargar los datos del usuario después de la modificación para que el formulario muestre los cambios
    if ($id !== false) {
        try {
            DatabaseConnection::openConnection();
            $conexion = DatabaseConnection::getConnection();
            $query = "SELECT usuario_id, nombres, correo, tipo_usuario FROM usuarios WHERE usuario_id = ?";
            $stmt = mysqli_prepare($conexion, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result && mysqli_num_rows($result) == 1) {
                $userData = mysqli_fetch_assoc($result);
            }
            mysqli_stmt_close($stmt);
            DatabaseConnection::closeConnection();
        } catch (Exception $e) {
            // Log error but don't show to user as main operation already handled
        }
    }
}

// Si no se han cargado datos de usuario (por ejemplo, si hubo un error en GET o POST y no se pudo recargar)
if (!$userData && isset($id) && $id !== false) {
    // Intentar cargar los datos del usuario si el ID es válido y no se cargaron antes
    try {
        DatabaseConnection::openConnection();
        $conexion = DatabaseConnection::getConnection();
        $query = "SELECT usuario_id, nombres, correo, tipo_usuario FROM usuarios WHERE usuario_id = ?";
        $stmt = mysqli_prepare($conexion, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result && mysqli_num_rows($result) == 1) {
            $userData = mysqli_fetch_assoc($result);
        }
        mysqli_stmt_close($stmt);
        DatabaseConnection::closeConnection();
    } catch (Exception $e) {
        // Log error
    }
}

?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="h2">Modificar Usuario</div>

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

      <?php if ($userData): // Mostrar formulario solo si hay datos de usuario ?>
      <form action="./publicarUser.php" method="POST">
        <div class="mb-3">
          <label for="nombres" class="form-label">Nombres</label>
          <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo htmlspecialchars($userData['nombres']); ?>" required>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo Electrónico</label>
          <input type="email" class="form-control" id="correo" name="correo" value="<?php echo htmlspecialchars($userData['correo']); ?>" required>
        </div>
        <div class="mb-3">
          <label for="clave" class="form-label">Nueva Contraseña (dejar vacío para no cambiar)</label>
          <input type="password" class="form-control" id="clave" name="clave">
        </div>
        <div class="mb-3">
          <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
          <select class="form-select" id="tipo_usuario" name="tipo_usuario">
            <option value="admin" <?php echo ($userData['tipo_usuario'] == 'admin') ? 'selected' : ''; ?>>Administrador</option>
            <option value="comprador" <?php echo ($userData['tipo_usuario'] == 'comprador') ? 'selected' : ''; ?>>Comprador</option>
            <option value="vendedor" <?php echo ($userData['tipo_usuario'] == 'vendedor') ? 'selected' : ''; ?>>Vendedor</option>
          </select>
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($userData['usuario_id']); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </form>
      <?php endif; ?>

      <a href="./administracion.php" class="btn btn-primary mt-3">Volver al panel de administración</a>
    </div>
  </div>  
</div>




