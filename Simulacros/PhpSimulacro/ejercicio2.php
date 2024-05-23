<!-- Manejo de Ordenadores con una Base de datos (3.5 puntos).
Para realizar el examen debes crear una BBDD. Estas son las consultas para la creación
de tablas para este examen:
create database examensim;
CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50),
email VARCHAR(100),
edad INT
);
El examen se puede realizar con mysqli o PDO.
Escribe un programa en PHP que se conecte a una base de datos MySQL y realice las
siguientes acciones:
Tenemos la Base de datos dada y la tabla llamada "usuarios".
Crear una aplicación que:
• Permita al usuario agregar un nuevo usuario ingresando su nombre, correo
electrónico y edad a través de un formulario.
• Muestre todos los usuarios registrados en la tabla "usuarios".
 -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style2.css">
    <title>Document</title>
</head>
<body>

<form action="#" method="post">

<label>Nombre:</label>
<input name = nombre type="text" require></input>

<label>Correo:</label>
<input name = email type="email"></input>

<label>Edad:</label>
<input name = edad type="number"></input>

<input type="hidden" name="guardado" value="guardado">
<button type="submit">Enviar datos</button>
</form>

<br>

<form action="#" method="post">
    <input name="mostrar" value="mostrar" type="hidden">
    <button type="submit">Mostrar </button>
</form>
<br>
<?php

$servidor = "localhost";
$user = "root";
$pass = "";
$dbname="examensim";

$nombre ="";
$email="";
$edad = 0;

$conexionDB= mysqli_connect($servidor,$user,$pass,$dbname);
$queryInsercion = "";


if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["guardado"])) {
   
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $edad =  $_POST["edad"];    

    $queryInsercion = "INSERT INTO `usuarios`(`nombre`, `email`, `edad`) VALUES ('{$nombre}','{$email}','{$edad}')";

    
    

    if (mysqli_query($conexionDB,$queryInsercion)==true) {
        echo"Insercion realizada correctamente de {$nombre} con email {$email} y { $edad} años";
    }else{
        echo "insercion fallida";
    }
}


if ($_SERVER["REQUEST_METHOD"]=="POST" && (isset($_POST["mostrar"]))) {
    
    
    $querySeleccion = "SELECT * FROM `usuarios`";
    $result =  mysqli_query($conexionDB,$querySeleccion);
    

    

    echo "<table style=\"border: solid; background-color:bisque\">
    <thead>
        <th>id</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Edad</th>
    </thead>
    <tbody>
";
    
    foreach ($result as $user) {
        
         echo"
        <tr>
            <td>". $user['id'] ."</td>
            <td>". $user['nombre'] ."</td>
            <td>". $user['email'] ."</td>
            <td>". $user['edad'] ."</td>
        </tr>
        "; 
        
    }

    echo "</tbody></table>";
}

mysqli_close($conexionDB);

?>


    
</body>
</html>

