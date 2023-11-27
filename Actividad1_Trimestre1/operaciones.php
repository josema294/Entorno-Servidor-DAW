<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Actividad1_Trimestre1/resources/css/operaciones.css">
    <title>Actividad Evaluable Ejercicio 3</title>
</head>
<body>
    <?php 

    print ( '
<form action="./datos_operaciones.php" method="post">
    <div>
        <label for="num1">Introduzca el primer número:</label>
        <input type="numero" id="num1" name="num1" required>
    </div>
    <div>
        <label for="num2">Introduzca el segundo número:</label>
        <input type="numero" id="num2" name="num2" required>
    </div>
    <div>
        <p>Seleccione la operación:</p>
        
        <p><label for="sum">Suma</label>
        <input type="radio" id="sum" name="operacion" value="la suma" required></p>

        <label for="resta">Resta</label></p>
        <p><input type="radio" id="resta" name="operacion" value="la resta">
        
        <label for="multi">multiplica</label></p>
        <p><input type="radio" id="multi" name="operacion" value="la multiplicacion">
       
        <label for="divid">Cociente</label></p>
        <p><input type="radio" id="divid" name="operacion" value="el cociente">
       

    </div>
    <div>
        <input type="submit" value="Enviar datos">
    </div>');

    ?>

</form>
</body>
</html>