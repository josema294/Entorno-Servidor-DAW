<?php
require_once __DIR__ . '/config/db.php';

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave_plain = $_POST["clave"]; // Contraseña en texto plano
    $tipo_usuario = $_POST["tipoUsuario"];

    // --- 1. Validaciones y Seguridad ---
    if (empty($nombre) || empty($correo) || empty($clave_plain) || empty($tipo_usuario)) {
        $error_message = "Por favor, complete todos los campos.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error_message = "El formato del correo electrónico no es válido.";
    } else {
        try {
            DatabaseConnection::openConnection();
            $conexion = DatabaseConnection::getConnection();

            // --- 2. Comprobar si el correo ya existe ---
            $sql_check = "SELECT usuario_id FROM usuarios WHERE correo = ?";
            $stmt_check = mysqli_prepare($conexion, $sql_check);
            mysqli_stmt_bind_param($stmt_check, "s", $correo);
            mysqli_stmt_execute($stmt_check);
            $result_check = mysqli_stmt_get_result($stmt_check);

            if (mysqli_num_rows($result_check) > 0) {
                $error_message = "El correo electrónico ya está registrado.";
            } else {
                // --- 3. Hashear la contraseña ---
                $clave_hashed = password_hash($clave_plain, PASSWORD_DEFAULT);

                // --- 4. Insertar usuario con sentencia preparada ---
                $sql_insert = "INSERT INTO usuarios (nombres, correo, clave, tipo_usuario) VALUES (?, ?, ?, ?)";
                $stmt_insert = mysqli_prepare($conexion, $sql_insert);
                mysqli_stmt_bind_param($stmt_insert, "ssss", $nombre, $correo, $clave_hashed, $tipo_usuario);
                
                if (mysqli_stmt_execute($stmt_insert)) {
                    $success_message = "¡Usuario creado exitosamente! Ya puedes iniciar sesión.";
                } else {
                    $error_message = "Error al crear el usuario. Inténtelo de nuevo.";
                }
                mysqli_stmt_close($stmt_insert);
            }
            mysqli_stmt_close($stmt_check);
            DatabaseConnection::closeConnection();

        } catch (Exception $e) {
            $error_message = "Error del sistema. Por favor, inténtelo más tarde.";
            // error_log($e->getMessage());
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - Inmobiliaria Jose</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/mainstyle.css">
</head>
<body>

<div class="container py-4 my-4">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <img src="./img/logo.webp" class="img-fluid mb-3" alt="Logo de la empresa" style="max-width: 200px;">
            <h3>InmobJose</h3>
            <p class="text-muted">La casa de tus sueños al alcance de un click!!</p>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Registro de Usuario</h2>

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

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>

                <div class="mb-3">
                    <label for="clave" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="clave" name="clave" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo de Usuario</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoUsuario" id="radioComprador" value="comprador" checked>
                        <label class="form-check-label" for="radioComprador">Soy comprador</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoUsuario" id="radioVendedor" value="vendedor">
                        <label class="form-check-label" for="radioVendedor">Soy vendedor</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                <a class="btn btn-secondary mt-3" href="./inmobjoselogin.php">Volver al Login</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php 
// No es estándar tener un footer después del cierre de </body>, pero mantengo la lógica por si es un requisito.
// Lo ideal sería que el include estuviera antes de </body>
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/footer.php')) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); 
}
?>
</body>
</html>
