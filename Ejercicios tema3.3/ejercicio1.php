<?php
// TODA la lógica que envía headers debe ir aquí, al principio de todo.
if (isset($_POST["color"])) {
    $color = $_POST["color"];
    
    // Se establece la cookie.
    setcookie("colorFondo", $color, time() + (86400 * 30));

    // Se recarga la página para que el fondo coja el valor de la cookie.
    header("Location: " . $_SERVER['PHP_SELF']);
    exit; // Es una buena práctica añadir exit; después de una redirección.
}

// Se obtiene el color de la cookie si existe, si no, se pone un color por defecto.
$colorFondo = isset($_COOKIE["colorFondo"]) ? htmlspecialchars($_COOKIE["colorFondo"]) : '#ffffff'; // Blanco por defecto

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3.3 ejercicio 1</title>
    <link rel="stylesheet" href="./styles/ejercicio1.css">
    <style>
        body {
            /* Se usa la variable PHP para definir el color */
            background-color: <?php echo $colorFondo; ?>;
        }
    </style>
</head>
<body>

    <h2>Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color) de una página.
    Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.</h2>

    <form method="post" action="">
        <label for="selectColor"> Seleccione el color que definira el fondo: </label>
        <input id="selectColor" type="color" name="color">
        <button type="submit"> Enviar</button> 
    </form>

    <div id="valorCookie">
        <div>Aqui mostramos el valor de la cookie:</div>
        <div>
            <?php
            // Se muestra el valor de la variable que ya hemos leído y saneado.
            echo $colorFondo; 
            ?>
        </div>   
    </div>
    
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
</body>
</html>