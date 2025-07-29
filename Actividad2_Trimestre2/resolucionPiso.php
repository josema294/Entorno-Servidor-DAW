<?php
//Para modificaciones de pisos como admin

include('./config/sesion.php');
include('./templates/head.php');
include('./templates/header.php');
require_once __DIR__ . '/config/db.php'; // Asegurarse de que la ruta sea correcta y usar require_once

$success_message = "";
$error_message = "";

// Control de acceso: Solo administradores pueden modificar pisos
if (!isset($_SESSION["tipoUsuario"]) || $_SESSION["tipoUsuario"] !== "admin") {
    header("Location: ./home.php");
    exit();
}

if (isset($_POST["haciendoModificacion"])) {
    // Si hemos recibido una modificacion del formulario la guardamos
    $idPiso = $_POST["idPiso"] ?? null;
    $calle = $_POST['calle'] ?? '';
    $numero = $_POST['numero'] ?? 0;
    $piso = !empty($_POST['piso']) ? $_POST['piso'] : null;
    $puerta = !empty($_POST['puerta']) ? $_POST['puerta'] : null;
    $cp = $_POST['cp'] ?? 0;
    $metros = $_POST['metros'] ?? 0;
    $zona = !empty($_POST['zona']) ? $_POST['zona'] : null;
    $precio = $_POST['precio'] ?? 0.0;
    $imagen = $_POST['imagen'] ?? null;
    $usuario_id = $_POST['usuario_id'] ?? null;

    if ($idPiso === null || $usuario_id === null) {
        $error_message = "Error: ID de piso o ID de usuario no proporcionado.";
    } else {
        try {
            DatabaseConnection::openConnection();
            $conexion = DatabaseConnection::getConnection();

            $query = "UPDATE pisos SET calle = ?, numero = ?, piso = ?, puerta = ?, cp = ?, metros = ?, zona = ?, precio = ?, imagen = ?, usuario_id = ? WHERE Codigo_piso = ?";
            $stmt = mysqli_prepare($conexion, $query);

            // 'siisiiisdii' -> s:string, i:integer, i:integer, s:string, i:integer, i:integer, s:string, d:double, s:string, i:integer, i:integer
            mysqli_stmt_bind_param($stmt, "siisiiisdii", $calle, $numero, $piso, $puerta, $cp, $metros, $zona, $precio, $imagen, $usuario_id, $idPiso);

            if (mysqli_stmt_execute($stmt)) {
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    $success_message = "Modificación de piso realizada exitosamente.";
                } else {
                    $error_message = "Fallo al modificar piso: ningún dato ha cambiado o el piso no existe.";
                }
            } else {
                $error_message = "Error al ejecutar la modificación: " . mysqli_error($conexion);
            }

            mysqli_stmt_close($stmt);
            DatabaseConnection::closeConnection();

        } catch (Exception $e) {
            $error_message = "Error del sistema al modificar el piso. Por favor, inténtelo más tarde.";
            // error_log($e->getMessage());
        }
    }
}
?>

<main>
    <div class="container mt-5">
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

        <a href="./administracion.php" class="btn btn-primary" role="button">Volver al panel de administración</a>
    </div>
</main>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>

