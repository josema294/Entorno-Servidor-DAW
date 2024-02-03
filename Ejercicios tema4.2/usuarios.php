<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Inmobiliaria Ficticia</title>
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

    $UsuariosResulr = mysqli_query($conexion, "select * from usuario");
    $numeroFilas = mysqli_num_rows($UsuariosResulr);

    //Creamos tarjetas de usuario:

    function tarjeta($nombres, $correo, $clave, $id)
{

    $rutaimg = randomImg ();
    echo "<div class=\"card mb-3\" style=\"max-width: 840px;\">
    <div class=\"row g-0\">
        <div class=\"col-md-4\">
            <img src=\"{$rutaimg} \" class=\"img-fluid rounded-start\" alt=\"Imagen del Usuario\">
        </div>
        <div class=\"col-md-8\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">{$nombres}</h5>
                <p class=\"card-text\">{$correo}</p>
                <p class=\"card-text\">{$clave}</p>
                <p class=\"card-text\"><small class=\"text-muted\">Última actualización hace 3 mins</small></p>
                <a href=\"./edit.php?id={{$id}}\"class=\"btn btn-primary\">Modificar</a>
                <button class=\"btn btn-danger btn-sm\" type=\"button\" onclick=\"confirmarBorrado()\">Borrar</button>
            </div>
        </div>
    </div>
</div>";
}

function randomImg (){
    $img1 = ".\img\DALL·E 2024-02-03 13.00.18 - Imagine a professional, friendly real estate agent standing in front of a modern home with a sold sign. The agent is dressed in business casual attire.webp";
    $img2 = ".\img\DALL·E 2024-02-03 13.04.27 - Imagine a professional, approachable female real estate agent standing in front of a modern, welcoming home. She is dressed in smart casual attire, co.webp";
    $img3 = ".\img\DALL·E 2024-02-03 13.11.24 - Imagine a mature male real estate agent in his fifties with a more relatable, everyday look. He has a fuller figure with a noticeable belly, embodying.webp";
    $img4 = ".\img\DALL·E 2024-02-03 18.24.20 - Imagine a skilled and experienced male real estate agent in his early fifties, showcasing confidence and professionalism. This agent is bald, reflecti.webp";
    $img5 = ".\img\DALL·E 2024-02-03 18.24.25 - Visualize a seasoned male real estate agent in his early fifties, standing confidently in front of a property. He's wearing a professional suit that s.webp";
   
    $arrayImg = [$img1,$img2,$img3,$img4,$img5];

    return $arrayImg[rand(0,4)];
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
                        <a class="nav-link" href="usuarios.php">Usuarios <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pisos.php">Pisos</a>
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
            <div class="col">
                <input class="form-control me-2" type="search" placeholder="Buscar usuario o piso" aria-label="Buscar">
            </div>

            <div class="col-auto">
                <button class="btn btn-secondary" type="submit">Buscar</button>
            </div>

            <div class="col-auto">
                <a href="./edit.php" class="btn btn-success">Agregar Nuevo</a>
            </div>



        </div>
    </div>


    <main class="py-5">

        <div class="container my-4">
            <div class="accordion" id="accordionListado">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingListado">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseListado" aria-expanded="true" aria-controls="collapseListado">
                            Listado de Usuarios
                        </button>
                    </h2>
                    <div id="collapseListado" class="accordion-collapse collapse show" aria-labelledby="headingListado" data-bs-parent="#accordionListado">
                        <div class="accordion-body">
                            <!-- resultado listado de usuarios -->

                            <?php

                            for ($i = 0; $i < $numeroFilas; $i++) {

                                $fila = mysqli_fetch_assoc($UsuariosResulr);
                                $nombres = $fila["nombres"];
                                $correo = $fila["correo"];
                                $clave = $fila["clave"];
                                $id = $fila["usuario_id"];

                                tarjeta($nombres, $correo, $clave, $id);
                            }
                            ?>

                            <!-- Repetir para cada usuario/piso -->
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