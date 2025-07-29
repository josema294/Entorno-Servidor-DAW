<?php
include('./config/sesion.php');

// Access control check: Only admin users can access this page
if (!isset($_SESSION["tipoUsuario"]) || $_SESSION["tipoUsuario"] !== "admin") {
    header("Location: ./home.php"); // Redirect non-admin users
    exit();
}

include('./templates/head.php');
include('./templates/header.php');

require_once __DIR__ . '/config/db.php'; // Use require_once and absolute path

$modoImpresion = "";
$result = null; // Initialize $result to null

// Initialize messages
$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {
        DatabaseConnection::openConnection();
        $conexion = DatabaseConnection::getConnection();

        // Search User
        if (isset($_GET["busquedaUsuario"]) && !empty($_GET["busquedaUsuario"])) {
            $userId = $_GET["busquedaUsuario"];
            $sql = "SELECT * FROM usuarios WHERE usuario_id = ?";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "i", $userId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            $modoImpresion = "usuarios";
        }
        // List Users
        elseif (isset($_GET["listarUsuarios"])) {
            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($conexion, $sql);
            $modoImpresion = "usuarios";
        }
        // Search Piso
        elseif (isset($_GET["busquedaPiso"]) && !empty($_GET["busquedaPiso"])) {
            $pisoId = $_GET["busquedaPiso"];
            $sql = "SELECT * FROM pisos WHERE Codigo_piso = ?";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "i", $pisoId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            $modoImpresion = "pisos";
        }
        // List Pisos
        elseif (isset($_GET["listarPisos"])) {
            $sql = "SELECT * FROM pisos";
            $result = mysqli_query($conexion, $sql);
            $modoImpresion = "pisos";
        }
        // Delete User
        elseif (isset($_GET["eliminaUsuario"]) && !empty($_GET["eliminaUsuario"])) {
            $idToDelete = $_GET["eliminaUsuario"];
            $sql = "DELETE FROM usuarios WHERE usuario_id = ?";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "i", $idToDelete);
            if (mysqli_stmt_execute($stmt)) {
                $success_message = "Se ha eliminado exitosamente el usuario con id: " . htmlspecialchars($idToDelete);
            } else {
                $error_message = "Error al eliminar el usuario con id: " . htmlspecialchars($idToDelete);
            }
            mysqli_stmt_close($stmt);
        }
        // Delete Piso
        elseif (isset($_GET["eliminarPiso"]) && !empty($_GET["eliminarPiso"])) {
            $idToDelete = $_GET["eliminarPiso"];
            $sql = "DELETE FROM pisos WHERE Codigo_piso = ?";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "i", $idToDelete);
            if (mysqli_stmt_execute($stmt)) {
                $success_message = "Se ha eliminado exitosamente el piso con id: " . htmlspecialchars($idToDelete);
            } else {
                $error_message = "Error al eliminar el piso con id: " . htmlspecialchars($idToDelete);
            }
            mysqli_stmt_close($stmt);
        }

        DatabaseConnection::closeConnection();

    } catch (Exception $e) {
        $error_message = "Error del sistema: " . $e->getMessage();
        // error_log($e->getMessage());
    }
}
?>

<main>

    <div class="container-fluid">
        <div class="row">
            <!-- Contenido principal -->
            <div class="col-md-10 p-4">
                <h1>Bienvenido al Panel de Administración</h1>
                <hr>

                <?php if (!empty($success_message)): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success_message; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

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
                    <form class="d-flex mb-4" action="./administracion.php" method="GET">
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
    // Display results if any
    if ($result && mysqli_num_rows($result) > 0) {
        if ($modoImpresion == "usuarios") {
            echo '
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Clave (Hash)</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($arrayResul = mysqli_fetch_assoc($result)) {
                $id = htmlspecialchars($arrayResul["usuario_id"]);
                $nombre = htmlspecialchars($arrayResul["nombres"]);
                $correo = htmlspecialchars($arrayResul["correo"]);
                $clave = htmlspecialchars($arrayResul["clave"]); // Display hash, not plain text
                $tipo = htmlspecialchars($arrayResul["tipo_usuario"]);

                echo '<tr class="">
                        <td scope="row">' . $id . '</td>
                        <td>' . $nombre . '</td>
                        <td>' . $correo . '</td>
                        <td>' . $clave . '</td>
                        <td>' . $tipo . '</td>
                        
                        <td><form method="GET" action="./publicarUser.php">
                        <input type="hidden" value="' . $id . '" name="modificarUsuario">
                        <button type="submit" class="btn btn-warning">Modificar</button>
                        </form></td>

                        <td><form method="GET" action="./administracion.php">
                        <input type="hidden" value="' . $id . '" name="eliminaUsuario">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form></td>
                    </tr>';
            }
            echo '
                    </tbody>
                </table>
            </div>';
        } elseif ($modoImpresion == "pisos") {
            echo '
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Codigo_piso</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Metros</th>
                            <th scope="col">Zona</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Id propietario</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($arrayResul = mysqli_fetch_assoc($result)) {
                $id = htmlspecialchars($arrayResul["Codigo_piso"]);
                $calle = htmlspecialchars($arrayResul["calle"]);
                $numero = htmlspecialchars($arrayResul["numero"]);
                $piso = htmlspecialchars($arrayResul["piso"]);
                $puerta = htmlspecialchars($arrayResul["puerta"]);
                $cp = htmlspecialchars($arrayResul["cp"]);
                $direccion = $calle . " " . $numero . " " . $piso . " " . $puerta . " " . $cp;
                $metros = htmlspecialchars($arrayResul["metros"]);
                $zona = htmlspecialchars($arrayResul["zona"]);
                $precio = htmlspecialchars($arrayResul["precio"]);
                $imagen = htmlspecialchars($arrayResul["imagen"]);
                $propietario = htmlspecialchars($arrayResul["usuario_id"]);

                echo '<tr class="">
                        <td scope="row">' . $id . '</td>
                        <td>' . $direccion . '</td>
                        <td>' . $metros . '</td>
                        <td>' . $zona . '</td>
                        <td>' . $precio . '</td>
                        <td><a href="' . $imagen . '" target="_blank"> Enlace a la imagen</a></td>
                        <td>' . $propietario . '</td>

                        <td><form method="GET" action="./publicaPiso.php">
                        <input type="hidden" value="' . $id . '" name="modificarPiso">
                        <button type="submit" class="btn btn-warning">Modificar</button>
                        </form></td>

                        <td><form method="GET" action="./administracion.php">
                        <input type="hidden" value="' . $id . '" name="eliminarPiso">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form></td>
                    </tr>';
            }
            echo '
                    </tbody>
                </table>
            </div>';
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && (isset($_GET["busquedaUsuario"]) || isset($_GET["busquedaPiso"]))) {
        echo '<div class="alert alert-info" role="alert">No se encontraron resultados para su búsqueda.</div>';
    }
    ?>


</main>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>