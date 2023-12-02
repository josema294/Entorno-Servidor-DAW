<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio4.css">
    <title>ejercicio4 tema3</title>
    
</head>
<body>

<form action="ejercicio4result.php" method="post">
    Nombre: <input type="text" name="nombre" value=""><br>
    Apellidos: <input type="text" name="apellidos" value=""><br>
    Edad: <select name="edad">
        <option value="20_39">Entre 20 y 39 años</option>
        <!-- Agrega más opciones de edad según sea necesario -->
    </select><br>
    Peso: <input type="text" name="peso" value=""> kg<br>
    Sexo: <input type="radio" name="sexo" value="hombre"> Hombre
    <input type="radio" name="sexo" value="mujer"> Mujer<br>
    Estado Civil: <input type="radio" name="estado_civil" value="soltero"> Soltero
    <input type="radio" name="estado_civil" value="casado"> Casado
    <!-- Agrega más opciones de estado civil si es necesario --><br>
    Aficiones: <input type="checkbox" name="aficiones[]" value="cine"> Cine
    <input type="checkbox" name="aficiones[]" value="literatura"> Literatura
    <input type="checkbox" name="aficiones[]" value="tebeos"> Tebeos
    <input type="checkbox" name="aficiones[]" value="deporte"> Deporte
    <input type="checkbox" name="aficiones[]" value="musica"> Música
    <input type="checkbox" name="aficiones[]" value="television"> Televisión<br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
</form>




    
</body>
</html>