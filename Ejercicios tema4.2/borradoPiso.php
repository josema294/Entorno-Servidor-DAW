<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Borrado de Piso</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php
    $servidor = "127.0.0.1";
    $usuario = "usuario";
    $password = "usuario";
    $conexion = mysqli_connect($servidor, $usuario, $password) or die("Fallo en la conexión");
    mysqli_select_db($conexion, "inmobiliaria") or die("Imposible seleccionar la base de datos");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['Codigo_piso'])) {
            $codigoPiso = $_POST['Codigo_piso'];

            $sql = "DELETE FROM pisos WHERE Codigo_piso = '$codigoPiso'";
            $resultado = mysqli_query($conexion, $sql);

            if ($resultado) {
                $mensaje = "Borrado del piso realizado con éxito.";
            } else {
                $mensaje = "Error al borrar el piso: " . mysqli_error($conexion);
            }
        } else {
            $mensaje = "No se proporcionó el código del piso para borrar.";
        }
    }
    ?>
    <div class="container mt-5">
        <div class="alert <?php echo isset($resultado) && $resultado ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php echo $mensaje; ?>
        </div>
        <a href="./home.html" class="btn btn-primary">Volver a Home</a>
    </div>

    <!-- Opcional: Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
