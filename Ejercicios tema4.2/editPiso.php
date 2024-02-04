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
    
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['Codigo_piso'])) {
        $modificando = true;
        $id = $_GET["Codigo_piso"];
    }

    // Conexión a la base de datos
    $servidor = "127.0.0.1";
    $usuarioDB = "usuario";
    $passwordDB = "usuario";
    $conexion = mysqli_connect($servidor, $usuarioDB, $passwordDB) or die("Fallo en la conexión");
    mysqli_select_db($conexion, "inmobiliaria") or die("Imposible seleccionar BD");
    
    // Si estamos modificando un piso, recuperamos sus datos
    if ($modificando) {
        $consulta = mysqli_query($conexion, "SELECT * FROM pisos WHERE Codigo_piso='$id'");
        $piso = mysqli_fetch_assoc($consulta);
    } else {
        $piso = null;
    }

    // Función para imprimir el formulario de agregar o modificar piso
    function formularioPiso($modificando = false, $piso = null)
    {
        $titulo = $modificando ? "Modificando piso" : "Añadiendo piso nuevo";
        $Id = $piso["Codigo_piso"] ?? null;
        //Uso el operador de fusion de null
        $calle = $piso["calle"] ?? "";
        $numero = $piso["numero"] ?? "";
        $pisoNumero = $piso["piso"] ?? "";
        $puerta = $piso["puerta"] ?? "";
        $cp = $piso["cp"] ?? "";
        $metros = $piso["metros"] ?? "";
        $zona = $piso["zona"] ?? "";
        $precio = $piso["precio"] ?? "";
        $imagen = $piso["imagen"] ?? randomImg();
        $usuarioId = $piso["usuario_id"] ?? "";

        echo '
        <div class="container mt-5">
        <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo '.$titulo.'; ?></h5>
                    <form action="./resultadoPiso.php" method="POST">
                        <div class="row">
                            <!-- Columna 1 -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="calle" class="form-label">Calle</label>
                                    <input type="text" class="form-control" id="calle" name="calle" required value="'.$calle.'">
                                </div>
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="number" class="form-control" id="numero" name="numero" required value="'.$numero.'">
                                </div>
                                <div class="mb-3">
                                    <label for="piso" class="form-label">Piso</label>
                                    <input type="number" class="form-control" id="piso" name="piso" value="'.$pisoNumero.'">
                                </div>
                                <div class="mb-3">
                                    <label for="puerta" class="form-label">Puerta</label>
                                    <input type="text" class="form-control" id="puerta" name="puerta" value="'.$puerta.'">
                                </div>
                            </div>
                            <!-- Columna 2 -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cp" class="form-label">Código Postal</label>
                                    <input type="number" class="form-control" id="cp" name="cp" required value="'.$cp.'">
                                </div>
                                <div class="mb-3">
                                    <label for="metros" class="form-label">Metros Cuadrados</label>
                                    <input type="number" class="form-control" id="metros" name="metros" required value="'.$metros.'">
                                </div>
                                <div class="mb-3">
                                    <label for="zona" class="form-label">Zona</label>
                                    <input type="text" class="form-control" id="zona" name="zona" value="'.$zona.'">
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="text" class="form-control" id="precio" name="precio" required value="'.$precio.'">
                                </div>

                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="usuarioId" name="usuario_id" required value="1">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="foto" name="imagen" required value="'. $imagen .'">
                                </div>

                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="foto" name="Codigo_piso" required value="'.$Id.'">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                        <a href="./pisos.php" class="btn btn-secondary">Volver Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>';
    }

    formularioPiso($modificando, $piso);

    function randomImg()
    {
        $img1 = "./img/DALL·E 2024-02-03 13.17.14 - Visualize a modern, luxurious home from the outside, showcasing sleek architectural lines, a flat roof, and large windows. The facade is a combination.webp";
        $img2 = "./img/DALL·E 2024-02-03 13.17.35 - Envision a traditional and cozy house exterior with a pitched roof, brick facade, and charming front porch. Surrounded by a lush garden and mature tre.webp";
        $img3 = "./img/DALL·E 2024-02-03 13.17.51 - Picture a luxurious beachfront villa with a modern design, featuring expansive terraces, glass balustrades, and a seamless indoor-outdoor living space.webp";

        $img4 = "./img/DALL·E 2024-02-04 11.34.36 - Visualize a modest, single-story home with a simple architectural design. The exterior features vinyl siding, a small front porch, and a basic landsca.webp";
        $img5 = "./img/DALL·E 2024-02-04 11.34.37 - Imagine a small, two-story townhouse with a brick facade. It features a compact design with a narrow front yard and a small, paved driveway. The townh.webp";

        $arrayImg = [$img1, $img2, $img3, $img4, $img5];

        return $arrayImg[rand(0, 4)];
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>