<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Modificación</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php


    //Cambiar el valor de {$entornoPruebas} a false para entornos de produccion, y true para entornos de desarrollo y pruebas
        include ('./config/config.php');
    $entornoPruebas = Pruebas::entornoPruebas();

    if ($entornoPruebas) {
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $database = "inmobiliaria";
    }else {
        $servidor = "sql108.infinityfree.com";
        $usuario = "if0_36061776";
        $password = "YTl2gJAD7Lt";
        $database = "if0_36061776_inmobiliaria";
    }
    $conexion = mysqli_connect($servidor, $usuario, $password) or die("Fallo conexion");
    $boolConexion = mysqli_select_db($conexion,$database) or die("Imposible seleccionar BD");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (isset($id)) {
            $sql = "UPDATE usuario SET nombres = '$nombre', correo = '$email', clave = '$clave' WHERE usuario_id = $id";

            mysqli_query($conexion, $sql);
        } else {

            $sql = "INSERT INTO  usuario (nombres, correo, clave) VALUES ('$nombre','$email','$clave')";

            mysqli_query($conexion, $sql);
        }
    }
    ?>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            Modificación en base de datos realizada con éxito.
        </div>
        <a href="./home.html" class="btn btn-primary">Volver a Home</a>
    </div>

    <!-- Opcional: Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>