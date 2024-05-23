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

 <!-- En esta vaersion se hace usando preparestaments -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style2.css" 
    <title>Document</title>
</head>
<body>

<form action="#" method="post">
    <label>Nombre:</label>
    <input name="nombre" type="text" required></input>
    <label>Correo:</label>
    <input name="email" type="email" required></input>
    <label>Edad:</label>
    <input name="edad" type="number" required></input>
    <input type="hidden" name="guardado" value="guardado">
    <button type="submit">Enviar datos</button>
</form>

<br>

<form action="#" method="post">
    <input name="mostrar" value="mostrar" type="hidden">
    <button type="submit">Mostrar</button>
</form>
<br>

<?php
$servidor = "localhost";
$user = "root";
$pass = "";
$dbname = "examensim";

// Conectar a la base de datos
$conexionDB = mysqli_connect($servidor, $user, $pass, $dbname);

if (!$conexionDB) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardado"])) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $edad = $_POST["edad"];

    // Preparar la consulta de inserción
    $stmt = mysqli_prepare($conexionDB, "INSERT INTO `usuarios`(`nombre`, `email`, `edad`) VALUES (?, ?, ?)");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $nombre, $email, $edad);
        if (mysqli_stmt_execute($stmt)) {
            echo "Inserción realizada correctamente de {$nombre} con email {$email} y {$edad} años";
        } else {
            echo "Inserción fallida: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta: " . mysqli_error($conexionDB);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mostrar"])) {
    $querySeleccion = "SELECT * FROM `usuarios`";
    $result = mysqli_query($conexionDB, $querySeleccion);

    if ($result) {
        echo "<table style=\"border: solid; background-color:bisque\">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>";

        while ($user = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . htmlspecialchars($user['id']) . "</td>
                    <td>" . htmlspecialchars($user['nombre']) . "</td>
                    <td>" . htmlspecialchars($user['email']) . "</td>
                    <td>" . htmlspecialchars($user['edad']) . "</td>
                  </tr>";
        }

        echo "</tbody></table>";
        mysqli_free_result($result);
    } else {
        echo "Error en la consulta: " . mysqli_error($conexionDB);
    }
}

// Cerrar la conexión
mysqli_close($conexionDB);
?>

</body>
</html>
