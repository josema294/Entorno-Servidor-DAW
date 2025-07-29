<?php
require_once __DIR__ . '/../config/db.php'; // Ruta corregida y más robusta

$pisoData = null; // Variable para almacenar los datos del piso

if (isset($_GET["modificarPiso"])) {
    $idPiso = filter_var($_GET["modificarPiso"], FILTER_VALIDATE_INT);

    if ($idPiso === false) {
        echo '<div class="alert alert-danger" role="alert">ID de piso no válido.</div>';
    } else {
        try {
            DatabaseConnection::openConnection();
            $conexion = DatabaseConnection::getConnection();

            // Seleccionamos el piso que queremos modificar usando sentencia preparada
            $sql = "SELECT * FROM pisos WHERE Codigo_piso = ?";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "i", $idPiso);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) == 1) {
                $pisoData = mysqli_fetch_assoc($result);
            } else {
                echo '<div class="alert alert-warning" role="alert">Piso no encontrado.</div>';
            }

            mysqli_stmt_close($stmt);
            DatabaseConnection::closeConnection();

        } catch (Exception $e) {
            echo '<div class="alert alert-danger" role="alert">Error del sistema al cargar el piso.</div>';
            // error_log($e->getMessage());
        }
    }
}

if ($pisoData) {
    // Teniendo los datos los usamos para rellenar el formulario
    $idPiso = htmlspecialchars($pisoData['Codigo_piso']);
    $calle = htmlspecialchars($pisoData['calle']);
    $numero = htmlspecialchars($pisoData['numero']);
    $piso = htmlspecialchars($pisoData['piso']);
    $puerta = htmlspecialchars($pisoData['puerta']);
    $cp = htmlspecialchars($pisoData['cp']);
    $metros = htmlspecialchars($pisoData['metros']);
    $zona = htmlspecialchars($pisoData['zona']);
    $precio = htmlspecialchars($pisoData['precio']);
    $imagen = htmlspecialchars($pisoData['imagen']);
    $usuario_id = htmlspecialchars($pisoData['usuario_id']);

    // El formulario se imprime solo si se encontraron datos del piso
?>

<div class="container mt-5">
  <div class="row justify-content-center">
     
    <div class="col-md-6">
    <div class="h2">Modificar Piso</div>
    <form action="./resolucionPiso.php" method="POST" >
  <div class="mb-3">
    <label for="calle" class="form-label">Calle</label>
    <input type="text" class="form-control" id="calle" name="calle" value="<?php echo $calle; ?>" required>
  </div>
  <div class="mb-3">
    <label for="numero" class="form-label">Número</label>
    <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $numero; ?>" required>
  </div>
  <div class="mb-3">
    <label for="piso" class="form-label">Piso</label>
    <input type="number" class="form-control" id="piso" name="piso" value="<?php echo $piso; ?>">
  </div>
  <div class="mb-3">
    <label for="puerta" class="form-label">Puerta</label>
    <input type="text" class="form-control" id="puerta" name="puerta" value="<?php echo $puerta; ?>">
  </div>
  <div class="mb-3">
    <label for="cp" class="form-label">Código Postal</label>
    <input type="number" class="form-control" id="cp" name="cp" value="<?php echo $cp; ?>" required>
  </div>
  <div class="mb-3">
    <label for="metros" class="form-label">Metros Cuadrados</label>
    <input type="number" class="form-control" id="metros" name="metros" value="<?php echo $metros; ?>" required>
  </div>
  <div class="mb-3">
    <label for="zona" class="form-label">Zona</label>
    <input type="text" class="form-control" id="zona" name="zona" value="<?php echo $zona; ?>">
  </div>
  <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?php echo $precio; ?>" required>
  </div>
  <div class="mb-3">
    <label for="userId" class="form-label">Propietario</label>
    <input type="number" class="form-control" id="userId" name="usuario_id" value="<?php echo $usuario_id; ?>" required>
  </div>
  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    <input type="url" class="form-control" id="imagen" name="imagen" value="<?php echo $imagen; ?>" >
    <input type="hidden" name="haciendoModificacion" value="haciendoModificacion" >
    <input type="hidden" name="idPiso" value="<?php echo $idPiso; ?>" >
  </div>
  <div class="mb-3">
    

  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
    </div>
  </div>
</div>

<?php
} // Cierre del if ($pisoData)
?>








