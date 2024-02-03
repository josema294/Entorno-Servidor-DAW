<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir/Modificar Piso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php
    // Determinamos si estamos modificando o creando un piso nuevo
    $modificando = false;
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $modificando = true;
        $id = $_GET["id"];
    }

    // Conexión a la base de datos
    $servidor = "127.0.0.1";
    $usuarioDB = "usuario";
    $passwordDB = "usuario";
    $conexion = mysqli_connect($servidor, $usuarioDB, $passwordDB) or die("Fallo en la conexión");
    mysqli_select_db($conexion, "inmobiliaria") or die("Imposible seleccionar BD");

    // Si estamos modificando un piso, recuperamos sus datos
    if ($modificando) {
        $consulta = mysqli_query($conexion, "SELECT * FROM piso WHERE codigo_piso='{$id}'");
        $piso = mysqli_fetch_assoc($consulta);
    }

    // Función para imprimir el formulario de agregar o modificar piso
    function formularioPiso($modificando = false, $piso = null) {
        $titulo = $modificando ? "Modificando piso" : "Añadiendo piso nuevo";
        $hiddenId = $modificando ? "<input type='hidden' name='codigo_piso' value='{$piso['codigo_piso']}'>" : "";
        
        // Asegúrate de utilizar aquí todos los campos necesarios para un piso
        echo <<<HTML
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">$titulo</h5>
                            <form action="./resultado_piso.php" method="POST">
                                <div class="mb-3">
                                    <label for="calle" class="form-label">Calle</label>
                                    <input type="text" class="form-control" id="calle" name="calle" required value="{$piso['calle']}">
                                </div>
                                <!-- Repite para cada campo necesario, ajustando según los campos de tu base de datos -->
                                $hiddenId
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                <a href="./pisos.php" class="btn btn-secondary">Volver Atrás</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        HTML;
    }

    formularioPiso($modificando, isset($piso) ? $piso : null);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
