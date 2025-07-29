<?php
// --- 1. BLOQUE DE LÓGICA PHP (ANTES DE CUALQUIER HTML) ---
require_once __DIR__ . '/config/sesion.php';
require_once __DIR__ . '/config/db.php';

// Si se accede por GET (enlace directo), se desloguea cualquier sesión previa.
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    session_unset();
}

$error_login = "";

// Solo procesamos el formulario si se envía por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        DatabaseConnection::openConnection();
        $conexion = DatabaseConnection::getConnection();

        $correo = $_POST["correo"];
        $clave_ingresada = $_POST["clave"];

        // Hacemos UNA SOLA CONSULTA para obtener los datos del usuario por su correo
        $sql = "SELECT usuario_id, clave, tipo_usuario FROM usuarios WHERE correo = ?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $correo);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) == 1) {
            $usuario = mysqli_fetch_assoc($result);
            $hash_guardado = $usuario['clave'];

            // Verificamos la contraseña ingresada contra el hash guardado en la BD
            if (password_verify($clave_ingresada, $hash_guardado)) {
                // La contraseña es correcta, iniciamos sesión
                $_SESSION["idSesion"] = random_int(0, 10000);
                $_SESSION["logueado"] = true;
                $_SESSION["tipoUsuario"] = $usuario['tipo_usuario'];
                $_SESSION["usuario_id"] = $usuario['usuario_id'];
                
                DatabaseConnection::closeConnection();
                header("Location: ./home.php");
                exit(); // MUY IMPORTANTE: detener el script después de redirigir

            } else {
                $error_login = "La contraseña es incorrecta.";
            }
        } else {
            $error_login = "El correo no se encuentra registrado.";
        }
        mysqli_stmt_close($stmt);
        DatabaseConnection::closeConnection(); // Cerramos conexión también en caso de error

    } catch (Exception $e) {
        $error_login = "Error del sistema. Por favor, inténtelo más tarde.";
        // Opcional: registrar el error real para el desarrollador
        // error_log($e->getMessage());
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inmobiliaria Jose</title>
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

    <div class="container my-5">
        <?php if (!empty($error_login)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error_login); ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="email" class="form-label">Dirección de correo electrónico</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="correo" required>
                <div id="emailHelp" class="form-text">No compartiremos tu email con nadie más.</div>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="clave" id="clave" required>
            </div>
            <div class="mb-3">
                <a href="./registro.php">Si no dispones de usuario, registrate en este enlace</a>
            </div>
            
            <button type="submit" class="btn btn-primary">Accede con tu cuenta</button>
            <a href="./home.php" class="btn btn-primary">Accede sin registro</a>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
</body>
</html>
