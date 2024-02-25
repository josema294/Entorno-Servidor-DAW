<?php include('./config/sesion.php');  ?>
<?php include('./templates/head.php'); ?>
<?php include('./templates/header.php'); ?>

<main>

    <div class="container-fluid">
        <div class="row">
          

            <!-- Contenido principal -->
            <div class="col-md-10 p-4">
                <h1>Bienvenido al Panel de Administración</h1>
                <hr>

                <h2>Gestión de Usuarios</h2>
                <div class="mb-3">
                    <!-- Formulario de búsqueda para usuarios -->
                    <form class="d-flex mb-4" action="./administracion.php" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Buscar usuario por su id" aria-label="Buscar" name="busquedaUsuario">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                    <a href="./publicarUser.php" class="btn btn-success mb-2">Creacion de usuario</a>
                    <form class="d-flex mb-4" action="./administracion.php" method="GET">
                        <input class="form-control me-2" type="hidden" name="listarUsuarios" value="all">
                        <button class="btn btn-info mb-2" type="submit">Listar</button>
                    </form>
                </div>

                <h2>Gestión de Pisos</h2>
                <div>
                    <!-- Formulario de búsqueda para pisos -->
                    <form class="d-flex mb-4" action="#" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Buscar piso por id" aria-label="Buscar" name="busquedaPiso">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                    <a href="./publicaPiso.php" class="btn btn-success mb-2">Creacion de piso</a>
                    <form class="d-flex mb-4" action="./administracion.php" method="GET">
                        <input class="form-control me-2" type="hidden" name="listarPisos" value="all">
                        <button class="btn btn-info mb-2" type="submit">Listar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>

    <?php
    include("./config/db.php");

    $modoImpresion = ""; //Define si se van a imprimir pisos o usuarios ya que tienen plantillas diferentes

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        DataBaseConection::openConection();
        $conexion =  DataBaseConection::getConexion();

        //Distinguimos si la busqueda es de casa o usuario

        if (isset($_GET["busquedaUsuario"])) {

            $sql = "SELECT * from USUARIOS WHERE usuario_id = {$_GET["busquedaUsuario"]}";
            $result = mysqli_query($conexion, $sql);
            $modoImpresion = "usuarios";
        }

        if (isset($_GET["listarUsuarios"])) {

            $sql = "SELECT * from USUARIOS ";
            $result = mysqli_query($conexion, $sql);
            $modoImpresion = "usuarios";
        }

        if (isset($_GET["busquedaPiso"])) {
            $sql = "SELECT * from pisos WHERE Codigo_piso = {$_GET["busquedaPiso"]} ";
            $result = mysqli_query($conexion, $sql);
            $modoImpresion = "pisos";
        }

        if (isset($_GET["listarPisos"])) {
            $sql = "SELECT * from pisos";
            $result = mysqli_query($conexion, $sql);
            $modoImpresion = "pisos";
        }
        
        //Pintamos los resultados para Usuarios
        if ($modoImpresion == "usuarios") {

            print('
            <div
                class="table-responsive"
            >
                <table
                    class="table table-primary"
                >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
        
                    ');

            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $arrayResul = mysqli_fetch_assoc($result);
                $id =  $arrayResul["usuario_id"];
                $nombre = $arrayResul["nombres"];
                $correo = $arrayResul["correo"];
                $clave = $arrayResul["clave"];
                $tipo = $arrayResul["tipo_usuario"];

                printf('<tr class="">
                        <td scope="row">%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                    </tr>', $id, $nombre, $correo, $clave, $tipo);
            }
            print(
                '
                        
        
                        </tbody>
                    </table>
                </div>');
        }

        //Pintamos los resultados para Pisos
        if ($modoImpresion == "pisos") {
            print('
            <div
                class="table-responsive"
            >
                <table
                    class="table table-primary"
                >
                    <thead>
                        <tr>
                            <th scope="col">Codigo_piso</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Metros</th>
                            <th scope="col">Zona</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Id propietario</th>
        
                        </tr>
                    </thead>
                    <tbody>
        
                    ');

            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $arrayResul = mysqli_fetch_assoc($result);
                $id =  $arrayResul["Codigo_piso"];
                $calle = $arrayResul["calle"];
                $numero = $arrayResul["numero"];
                $piso = $arrayResul["piso"];
                $puerta = $arrayResul["puerta"];
                $cp = $arrayResul["cp"];
                $direccion = $calle . " " . $numero . " " . $piso . " " . $puerta . " " . $cp;
                $metros = $arrayResul["metros"];
                $zona = $arrayResul["zona"];
                $precio = $arrayResul["precio"];
                $imagen = $arrayResul["imagen"];
                $propietario = $arrayResul["usuario_id"];

                printf('<tr class="">
                        <td scope="row">%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td><a href="%s"> Enlace a la imagen</a></td>
                        <td>%s</td>
                    </tr>', $id, $direccion, $metros, $zona, $precio, $imagen, $propietario);
            }
            print(
                '
                        
        
                        </tbody>
                    </table>
                </div>');
        }
    }

    ?>


</main>
<?php include('./templates/footer.php'); ?>