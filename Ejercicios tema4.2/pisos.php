<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisos - Inmobiliaria Ficticia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php

    $servidor = "127.0.0.1";
    $usuario = "usuario";
    $password = "usuario";

    $conexion = mysqli_connect($servidor, $usuario, $password) or die("Fallo conexion");
    $boolConexion = mysqli_select_db($conexion, "inmobiliaria") or die("Imposible seleccionar BD");

    if (!$boolConexion) {
        echo "<h1>Error en el servidor</h1>";
    }

    $pisosResul = mysqli_query($conexion, "select * from pisos");
    $numeroFilas = mysqli_num_rows($pisosResul);

    //Creamos tarjetas de pisos:



    function tarjetaPiso($codigoPiso, $calle, $numero, $piso, $puerta, $cp, $metros, $zona, $precio, $imagen, $usuarioId)
    {
        echo "<div class=\"card mb-3\" style=\"max-width: 840px;\">
        <div class=\"row g-0\">
            <div class=\"col-md-4\">
                <img src=\"{$imagen}\" class=\"img-fluid rounded-start\" alt=\"Imagen del Piso\">
            </div>
            <div class=\"col-md-8\">
                <div class=\"card-body\">
                    <h5 class=\"card-title\">{$calle} {$numero}, Piso: {$piso}, Puerta: {$puerta}</h5>
                    <p class=\"card-text\">Código Postal: {$cp}</p>
                    <p class=\"card-text\">Metros cuadrados: {$metros}</p>
                    <p class=\"card-text\">Zona: {$zona}</p>
                    <p class=\"card-text\">Precio: {$precio} €</p>
                    <p class=\"card-text\"><small class=\"text-muted\">Última actualización hace 3 mins</small></p>
                    <form action=\"./editPiso.php\" method=\"get\">
                        <input type=\"hidden\" name=\"Codigo_piso\" value=\"$codigoPiso\">
                        <button type=\"submit\" class=\"btn btn-primary\">Modificar</button>
                    </form>
                    <form action=\"./borradoPiso.php\" method=\"post\">
                        <input type=\"hidden\" name=\"Codigo_piso\" value=\"{$codigoPiso}\">
                        <button class=\"btn btn-danger btn-sm\" type=\"submit\">Borrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>";
    }

    function randomImg()
    {
        $img1 = ".\img\casa1.webp";
        $img2 = ".\img\casa2.webp";
        $img3 = ".\img\casa3.webp";

        $img4 = ".\img\casa4.webp";
        $img5 = ".\img\casa5.webp";

        $arrayImg = [$img1, $img2, $img3, $img4, $img5];

        return $arrayImg[rand(0, 4)];
    }


    ?>

    <header class="bg-primary py-3">
        <div class="container">
            <h1 class="text-white">Inmobiliaria Ficticia</h1>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="./home.html">Inmobiliaria Ficticia</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./home.html">Inicio</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="usuarios.php">Usuarios <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pisos.php">Pisos (current)</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./about.html">Sobre Nosotros</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="row mb-3">
            <form method="POST" action="./pisos.php" class="d-flex align-items-center">
                <div class="col">
                    <input class="form-control me-2" name="buscado" type="search" placeholder="Buscar piso por numero de calle" aria-label="Buscar">

                </div>

                <div class="col-auto">
                    <button class="btn btn-secondary" type="submit">Buscar</button>
                </div>
                <div class="col-auto">
                    <a href="./editPiso.php" class="btn btn-success">Agregar Nuevo</a>
                </div>

            </form>
        </div>
    </div>


    <main class="py-5">

        <div class="container my-4">
            <div class="accordion" id="accordionListado">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingListado">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseListado" aria-expanded="false" aria-controls="collapseListado">
                            Listado de Pisos
                        </button>
                    </h2>
                    <div id="collapseListado" class="accordion-collapse collapse" aria-labelledby="headingListado" data-bs-parent="#accordionListado">
                        <div class="accordion-body">
                            <!-- resultado listado de usuarios -->

                            <?php

                            for ($i = 0; $i < $numeroFilas; $i++) {
                                $fila = mysqli_fetch_assoc($pisosResul); // Asumiendo que $pisosResul contiene los resultados de tu consulta de pisos
                                $codigoPiso = $fila["Codigo_piso"]; // Asegúrate de que el nombre de la columna coincida exactamente con cómo está en tu base de datos
                                $calle = $fila["calle"];
                                $numero = $fila["numero"];
                                $piso = $fila["piso"]; // Añadido basado en la estructura de tu tabla
                                $puerta = $fila["puerta"]; // Añadido basado en la estructura de tu tabla
                                $cp = $fila["cp"];
                                $metros = $fila["metros"];
                                $zona = $fila["zona"];
                                $precio = $fila["precio"]; // Asumiendo que quieres incluir el precio en la tarjeta
                                $imagen = $fila["imagen"]; // Asumiendo que la columna 'imagen' contiene la ruta de la imagen
                                $usuarioId = $fila["usuario_id"]; // Incluido por completitud, ajusta según sea necesario

                                // Llamada a la función ajustada con los nuevos argumentos
                                tarjetaPiso($codigoPiso, $calle, $numero, $piso, $puerta, $cp, $metros, $zona, $precio, $imagen, $usuarioId);
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container my-4">
            <div class="accordion" id="accordionListado2">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingListado">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseListado2" aria-expanded="false" aria-controls="collapseListado">
                            Resultados Busqueda
                        </button>
                    </h2>
                    <div id="collapseListado2" class="accordion-collapse collapse show" aria-labelledby="headingListado" data-bs-parent="#accordionListado">
                        <div class="accordion-body">

                            <?php

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $buscado = $_POST["buscado"];
                                $sql = "SELECT * FROM pisos WHERE calle LIKE '%$buscado%'";

                                $result = mysqli_query($conexion, $sql);

                                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                                    $fila = mysqli_fetch_assoc($result);
                                    $codigoPiso = $fila["Codigo_piso"];
                                    $calle = $fila["calle"];
                                    $numero = $fila["numero"];
                                    $piso = $fila["piso"];
                                    $puerta = $fila["puerta"];
                                    $cp = $fila["cp"];
                                    $metros = $fila["metros"];
                                    $zona = $fila["zona"];
                                    $precio = $fila["precio"];
                                    $imagen = $fila["imagen"];
                                    // Asumiendo que tienes una función tarjeta adaptada para pisos
                                    tarjetaPiso($codigoPiso, $calle, $numero, $piso, $puerta, $cp, $metros, $zona, $precio, $imagen,$usuarioId);
                                }
                            }



                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <footer class="bg-dark text-white py-4 text-center">
        <div class="container">
            &copy; 2024 Inmobiliaria Ficticia. Todos los derechos reservados.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>