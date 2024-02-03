<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir/Modificar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php

    //Delimitamos si estamos modificando o creando un usuario nuevo
    $modificando = true;
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !$_GET == '') {

        $modificando = true;
        $id = $_GET["id"];
        $id = trim($id, '{}');
    } else {
        $modificando = false;
    }

    //Si estamos modificando un usuario, recuperamos sus datos de la BD

    $servidor = "127.0.0.1";
    $usuario = "usuario";
    $password = "usuario";

    $conexion = mysqli_connect($servidor, $usuario, $password) or die("Fallo conexion");
    $boolConexion = mysqli_select_db($conexion, "inmobiliaria") or die("Imposible seleccionar BD");

    if (!$boolConexion) {
        echo "<h1>Error en el servidor</h1>";
    }

    if ($modificando) {

        $usuariosResulr = mysqli_query($conexion, "select * from usuario where usuario_id='{$id}' ");
        $tempResult = mysqli_fetch_assoc($usuariosResulr);
        $nombre = $tempResult["nombres"];
        $correo = $tempResult["correo"];
        $clave = $tempResult["clave"];

        updateCreate($modificando, $nombre, $correo, $clave, $id);
    }


    //Funcion para imprimir la pagina de agregar o modificar usuario

    function updateCreate($modificando, $nombre, $correo, $clave, $id)
    {

        if ($modificando == true) {

            echo '<div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body">
                            <!-- El título del formulario cambia según sea añadir o modificar -->
                            <h5 class="card-title" id="formTitle">Modificando usuario</h5>
                            
                            <form action="./resultado.php" method="POST">
                                <div class="mb-3">
                                    <label for="nombreUsuario" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreUsuario" name="nombre" required value="' . $nombre . '">
                                </div>
                                <div class="mb-3">
                                    <label for="emailUsuario" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailUsuario" name="email" required value="' . $correo . '">
                                </div>
                                <div class="mb-3">
                                    <label for="clave" class="form-label">Clave</label>
                                    <input type="text"  class="form-control" id="claveUsuario" name="clave" required value="' . $clave . '">
                                </div>

                                <div class="mb-3">
                            
                                <input type="hidden" class="form-control" id="id" name="id"  value="' . $id . '">
                                </div>

                                <!-- Botones de acción -->
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                <a href="./usuarios.php" class="btn btn-secondary">Volver Atrás</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        } else {
        }
    }

    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>