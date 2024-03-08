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


    $servidor = "sql108.infinityfree.com";
  $usuario = "if0_36061776";
    $password = "YTl2gJAD7Lt";   
    $conexion = mysqli_connect($servidor, $usuario, $password) or die("Fallo conexion");
    $boolConexion = mysqli_select_db($conexion, "if0_36061776_inmobiliaria") or die("Imposible seleccionar BD");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

       
        if (isset($_POST['id_usuario'])) {
            $id = $_POST['id_usuario'];
        }

        
        $sql= "DELETE FROM usuario WHERE usuario_id =  '$id' ";
        $borrado = mysqli_execute_query($conexion,$sql);


    }
    ?>
    <div class="container mt-5">
    <div class="alert alert-danger" role="alert">
        Borrado de la base de datos realizado con éxito.
    </div>

        <a href="./home.html" class="btn btn-primary">Volver a Home</a>
    </div>

    <!-- Opcional: Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>