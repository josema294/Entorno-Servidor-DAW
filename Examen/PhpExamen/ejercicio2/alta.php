<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header style="background-color: grey;">
        <ul class="nav justify-content-center  ">
            <li class="nav-item ">
                <a class="nav-link active" href="./index.php" aria-current="page">Home</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link active" href="./alta.php" aria-current="page">Alta de ordenador</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./Buscar.php">Buscar ordenador</a>
            </li>

        </ul>

    </header>
    <main>




        <div class="container">
            <div class="row justify-content-center align-items-center g-2">

                <form action="#" method="post">

                <div class="row"><label>id:</label>
                    <input name=id type="text" require></input>
                </div>
                <div class="row"><label>fecha:</label>
                    <input name=fecha type="date"></input>
                </div>
                <div class="row"><label>nombre:</label>
                    <input name=nombre type="number"></input>
                </div>
                <div class="row"><label>vendido:</label>
                    <input name=vendido type="boolval"></input>
                </div>
                <div class="row"><label>Precio:</label>
                    <input name=precio type="number"></input>
                </div>
                <div class="row">
                    <input type="hidden" name = "guardado" value="guardado">
                    <button class="mt-5" type="submit"> Guardar ordenador</button>
                </div>

                </form>

            </div>

        </div>

        <?php

        //configuro conexiones:

        $servidor = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "examen";

        // Conectar a la base de datos
        $conexionDB = mysqli_connect($servidor, $user, $pass, $dbname);

        if (!$conexionDB) {
        die("Conexión fallida: " . mysqli_connect_error());
}

        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardado"])) {

            echo "Modo guardado datos";

            $id = $_POST["id"];
            $fecha = $_POST["fecha"];
            $nombre =  $_POST["nombre"];
            $edad =  $_POST["nombre"];
            $vendido =  $_POST["vendido"];
            $precio =  $_POST["precio"];


            $queryInsercion = "INSERT INTO `ordenador`(`id`, `fecha`, `nombre`,`edad`,`vendido`,`precio`, ) VALUES ('{$id}','{$fecha}','{$nombre}','{$edad}','{$vendido}','{$precio}')";

            if (mysqli_query($conexionDB, $queryInsercion) == true) {
                echo "Insercion realizada correctamente del ordenador {$id}";
            } else {
                echo "insercion fallida";
            }
        }





        ?>




    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>