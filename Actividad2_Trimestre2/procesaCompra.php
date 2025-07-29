<?php
include('./config/sesion.php');
include('./config/db.php');
include('./templates/head.php');
include('./templates/header.php');

$success_message = "";
$error_message = "";

?>

<main>

<div class="container mt-5">
    <h1 class="mb-4">Compra de Propiedad</h1>
    
    <?php
    // Verificamos si se ha enviado el formulario de compra
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Asegurarse de que el usuario esté logueado y tenga un ID de sesión
        if (!isset($_SESSION["usuario_id"])) {
            $error_message = "Debes iniciar sesión para realizar una compra.";
        } else {
            $idComprador = $_SESSION["usuario_id"];
            $idPiso = $_POST["Codigo_piso"] ?? null;
            $precioFinal = $_POST["precio_final"] ?? null;

            // Si se ha enviado un precio final, significa que se está confirmando la compra
            if ($precioFinal !== null) {
                try {
                    DatabaseConnection::openConnection();
                    $conexion = DatabaseConnection::getConnection();

                    // Usar sentencia preparada para la inserción
                    $sql = "INSERT INTO comprados (usuario_comprador, Codigo_piso, Precio_final) VALUES (?, ?, ?)";
                    $stmt = mysqli_prepare($conexion, $sql);
                    // 'idi' -> i: integer, d: double (para precio_final que puede ser decimal)
                    mysqli_stmt_bind_param($stmt, "iid", $idComprador, $idPiso, $precioFinal);
                    
                    if (mysqli_stmt_execute($stmt)) {
                        $success_message = "Piso comprado exitosamente.";
                    } else {
                        $error_message = "Error al registrar la compra: " . mysqli_error($conexion);
                    }
                    mysqli_stmt_close($stmt);
                    DatabaseConnection::closeConnection();

                } catch (Exception $e) {
                    $error_message = "Error del sistema al procesar la compra. Por favor, inténtelo más tarde.";
                    // error_log($e->getMessage());
                }
            } else {
                // Si no hay precio final, se muestra el formulario para introducirlo
                // Asegurarse de que idPiso esté presente para mostrar el formulario
                if ($idPiso !== null) {
                    echo '
                    <form method="post" action="./procesaCompra.php">
                        <div class="mb-3">
                            <label for="usuario_comprador" class="form-label">Usuario comprador</label>
                            <input type="text" class="form-control" id="usuario_comprador" name="usuario_comprador" value="' . htmlspecialchars($idComprador) . '" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="codigo_piso" class="form-label">Código del piso a comprar</label>
                            <input type="text" class="form-control" id="codigo_piso" value="' . htmlspecialchars($idPiso) . '" name="Codigo_piso" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="precio_final" class="form-label">Precio Final:</label>
                            <input type="number" step="0.01" class="form-control" id="precio_final" name="precio_final" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Comprar Propiedad</button>
                    </form>
                    ';
                } else {
                    $error_message = "No se ha especificado un piso para comprar.";
                }
            }
        }
    }

    // Mostrar mensajes de éxito o error
    if (!empty($success_message)) {
        echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($success_message) . '</div>';
    }
    if (!empty($error_message)) {
        echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($error_message) . '</div>';
    }
    ?>

</div>

</main>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>