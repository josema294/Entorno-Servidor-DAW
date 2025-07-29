<?php
// --- 1. BLOQUE DE LÓGICA PHP ---
require_once __DIR__ . '/../config/db.php';

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar que el usuario ha iniciado sesión y tiene un ID
    if (!isset($_SESSION['usuario_id'])) {
        $error_message = "Error: Debes iniciar sesión para publicar un piso.";
    } else {
        // Recoger y sanear datos del formulario
        $calle = $_POST['calle'] ?? '';
        $numero = $_POST['numero'] ?? 0;
        $piso = !empty($_POST['piso']) ? $_POST['piso'] : null;
        $puerta = !empty($_POST['puerta']) ? $_POST['puerta'] : null;
        $cp = $_POST['cp'] ?? 0;
        $metros = $_POST['metros'] ?? 0;
        $zona = !empty($_POST['zona']) ? $_POST['zona'] : null;
        $precio = $_POST['precio'] ?? 0.0;
        $imagen = !empty($_POST['imagen']) ? $_POST['imagen'] : null;
        $usuario_id = $_SESSION['usuario_id'];

        // --- 2. Lógica de Base de Datos con Sentencias Preparadas ---
        try {
            DatabaseConnection::openConnection();
            $conexion = DatabaseConnection::getConnection();

            $query = "INSERT INTO pisos (calle, numero, piso, puerta, cp, metros, zona, precio, imagen, usuario_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = mysqli_prepare($conexion, $query);
            mysqli_stmt_bind_param($stmt, "siisiiisdi", $calle, $numero, $piso, $puerta, $cp, $metros, $zona, $precio, $imagen, $usuario_id);

            if (mysqli_stmt_execute($stmt)) {
                $success_message = "¡Inserción realizada, tu piso ha sido incluido!";
            } else {
                $error_message = "Error al insertar el piso. Por favor, inténtelo de nuevo.";
            }
            
            mysqli_stmt_close($stmt);
            DatabaseConnection::closeConnection();

        } catch (Exception $e) {
            $error_message = "Error del sistema. Por favor, inténtelo más tarde.";
            // error_log($e->getMessage());
        }
    }
}
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="h2">Publica tu piso</div>

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

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="mb-3">
          <label for="calle" class="form-label">Calle</label>
          <input type="text" class="form-control" id="calle" name="calle" required>
        </div>
        <div class="mb-3">
          <label for="numero" class="form-label">Número</label>
          <input type="number" class="form-control" id="numero" name="numero" required>
        </div>
        <div class="mb-3">
          <label for="piso" class="form-label">Piso (opcional)</label>
          <input type="number" class="form-control" id="piso" name="piso">
        </div>
        <div class="mb-3">
          <label for="puerta" class="form-label">Puerta (opcional)</label>
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
          <label for="zona" class="form-label">Zona (opcional)</label>
          <input type="text" class="form-control" id="zona" name="zona">
        </div>
        <div class="mb-3">
          <label for="precio" class="form-label">Precio</label>
          <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="mb-3">
          <label for="imagen" class="form-label">URL de la Imagen (opcional)</label>
          <input type="url" class="form-control" id="imagen" name="imagen">
        </div>
        <button type="submit" class="btn btn-primary">Publicar Piso</button>
      </form>
    </div>
  </div>
</div>




