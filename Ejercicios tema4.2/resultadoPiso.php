<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Modificación de Pisos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php

    $servidor = "127.0.0.1";
    $usuario = "usuario";
    $password = "usuario";
    $conexion = mysqli_connect($servidor, $usuario, $password) or die("Fallo conexion");
    $boolConexion = mysqli_select_db($conexion, "inmobiliaria") or die("Imposible seleccionar BD");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $piso = $_POST['piso'];
        $puerta = $_POST['puerta'];
        $cp = $_POST['cp'];
        $metros = $_POST['metros'];
        $zona = $_POST['zona'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen']; // Asegúrate de manejar la carga de imágenes adecuadamente
        $usuarioId = $_POST['usuario_id']; // Asume que este es el id del usuario que agrega o modifica el piso

        if (isset($_POST['codigo_piso'])) {
            $codigoPiso = $_POST['codigo_piso'];
            // Actualizar piso existente
            $sql = "UPDATE piso SET calle = '$calle', numero = '$numero', piso = '$piso', puerta = '$puerta', cp = '$cp', metros = '$metros', zona = '$zona', precio = '$precio', imagen = '$imagen' WHERE codigo_piso = $codigoPiso";
        } else {
            // Insertar nuevo piso
            $sql = "INSERT INTO piso (calle, numero, piso, puerta, cp, metros, zona, precio, imagen, usuario_id) VALUES ('$calle', '$numero', '$piso', '$puerta', '$cp', '$metros', '$zona', '$precio', '$imagen', '$usuarioId')";
        }

        mysqli_query($conexion, $sql);
    }
    ?>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            Modificación en base de datos de pisos realizada con éxito.
        </div>
        <a href="./home.html" class="btn btn-primary">Volver a Home</a>
    </div>

    <!-- Opcional: Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
