<!-- Hacer una aplicación en PHP que para un colegio: (3.5 puntos). 
El ejercicio se debe realizar con ficheros de texto. 
 
Cree un archivo de texto llamado "notas.txt" si no existe. 
Implementa un menú de opciones para que el usuario elija qué acción realizar. 
Permita al usuario realizar las siguientes acciones: 
1. Agregar un nuevo estudiante junto con su nota. 
Para ello usaremos un formulario con el formato que se desee. 
2. Mostrar todas las notas guardadas en el archivo. 
Cada entrada de estudiante y nota debe estar en el formato "nombre:nota". 
Después de cada acción, hacer un enlace para volver el menú principal.  
 -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="ejercicio1.php" method="post">

        <label for="">Nombre del Estudiante:</label>
        <input type="text" required name="nombre"></input>
        <label for="">Nota:</label>
        <input type="number" required name="nota"></input>
        <br>
        <br>
        <button type="submit">guardar</button>
    </form>
    <br>
    <br>

    <form action="ejercicio1.php" method="get">
        <Button id="Mostrar" action> Mostrar Estudiantes y notas</Button>
        <input type="hidden" name="mostrar" value="si">
    </form>

    <br>
    <br>

    <?php

    use PhpParser\Builder\Class_;
    use PHPUnit\Framework\Constraint\FileExists;

    use function PHPUnit\Framework\fileExists;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nombre = $_POST['nombre'];
        $nota = $_POST['nota'];
        $salto = "\n";
        $escribible = "{$nombre}:{$nota}{$salto}";

        //Ruta archivo
        $archivo = './notas.txt';

        // Abrir el archivo para añadir contenido ('a' es para append, que mantiene el contenido existente)
        $manejador = fopen($archivo, 'a');

        $nuevoEstudiante = $escribible;

        fwrite($manejador, $nuevoEstudiante);
        fclose($manejador);
    } else {
        $archivo = 'notas.txt';

        $manejador = fopen($archivo, 'r');

        $contenido = fread($manejador, filesize($archivo));

        $result = str_getcsv($contenido, "\n",);


        echo "
    <table style=\"border: solid;\">
    <thead>
        <th>Nombre</th>
        <th>Nota</th>
    </thead>

    <tbody>";


        for ($i = 0; $i < count($result); $i++) {

            $string = $result[$i];


            $par = explode(":", $string);
            $nombnre = $par[0];
            $nota = $par[1];


            echo "
        <tr>
        <td style=\"border: 1px solid black; \">{$nombnre}</td>
        <td style=\"border: 1px solid black; \">{$nota}</td>
        </tr>";
        }

        echo "</tbody></table>";
    }

    ?>


</body>

</html>