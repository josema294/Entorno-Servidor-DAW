<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio1.css">
    <title>Ejercicio1 Tema3</title>
</head>
<body>

<h4>Escribe un programa que calcule el salario semanal de un trabajador en base a las horas trabajadas. Se pagarán 12 euros por hora.
     Las horas se piden en un formulario.</h4>

<form method="post">
    <label>Introduzca el numero de horas trabajadas:</label>
    <input name="horas" type="number" required>  
    <button type="submit">Enviar</button> 

</form>

</br>

<?php

if(isset($_POST["horas"])){
    $form= $_POST["horas"];
    $salarioHora = 12;
    $total = $form*$salarioHora;
    print("<h5> El sueldo semanal para $form horas, ha sido de: $total euros </h5>");
}


?>

    
</body>
</html>