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

 <!-- En esta vaersion se hace usando PDO -->


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
$dsn = "mysql:host=localhost;dbname=examensim";
$user = "root";
$pass = "";

try {
    // Conectar a la base de datos usando PDO
    $conexionDB = new PDO($dsn, $user, $pass);
    $conexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardado"])) {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $edad = $_POST["edad"];

        // Preparar la consulta de inserción
        $stmt = $conexionDB->prepare("INSERT INTO `usuarios`(`nombre`, `email`, `edad`) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $email, $edad]);

        echo "Inserción realizada correctamente de {$nombre} con email {$email} y {$edad} años";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["mostrar"])) {
        $querySeleccion = "SELECT * FROM `usuarios`";
        $stmt = $conexionDB->query($querySeleccion);

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

        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . htmlspecialchars($user['id']) . "</td>
                    <td>" . htmlspecialchars($user['nombre']) . "</td>
                    <td>" . htmlspecialchars($user['email']) . "</td>
                    <td>" . htmlspecialchars($user['edad']) . "</td>
                  </tr>";
        }

        echo "</tbody></table>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

</body>
</html>
