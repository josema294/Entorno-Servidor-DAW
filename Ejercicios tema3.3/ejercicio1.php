<!DOCTYPE html>
<html lang="en">
<head>
<?php

if (isset($_POST["color"])) {
    $color = $_POST["color"];
    

    setcookie("colorFondo", $color, time() + (86400 * 30));

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3.3 ejercicio 1</title>
    <link rel="stylesheet" href="./styles/ejercicio1.css">
    <style>
          body {
            background-color: <?php echo $_COOKIE["colorFondo"]; ?>;
        }
    </style>
</head>
<body >



<h2>Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color) de una página.
Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.</h2>

<form method="post" action="" >
    <label for="selectColor"> Seleccione el color que definira el fondo: </label>
    <input id="selectColor" type="color" name="color">
    <button type="submit"> Enviar</button> 
    
</form>

<div id="valorCookie">
    <div>Aqui mostramos el valor de la cookie:</div>
    <div><?php

        if (isset($_COOKIE["colorFondo"])) {
        
            echo($_COOKIE["colorFondo"]);
        } ?>

    </div>   
   

    
</div>
    
</body>
</html>