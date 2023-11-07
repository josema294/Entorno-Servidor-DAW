<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 2.2 Ejercicio 4</title>

    <link rel="stylesheet" href="style/tema2.2.css">

</head>
<body class="bodyejer4">

<?php

//Crea un mini-diccionario español-inglés que contenga, al menos, 10 palabras (con su traducción).
// Utiliza un array asociativa para almacenar las parejas de palabras.
// Probar una palabra en español y dará la correspondiente traducción en inglés.

$diccionario = ["hola" => "hello","avion" => "plane","coche" => "car","perro" => "dog","gato" => "cat","silla" => "chair","raton" => "mouse"
,"mesa" => "table","cama" => "bed","adios" => "bye",];

print("<h1 class=h1ejer4>Elige la palabra a traducir</h1>");

//Abrimos formulario 
print('<form class="formejer4"action="ejercicio4.php" method="post" ><select class="combobox" name="palabras">');

foreach ($diccionario as $key => $value) {
    
    print('<option class="selectejer4">'.$key.'</option>' );    

    
}

//cerramos
print(' </select> <input class="inejer4" type="submit" value="Traducir seleccion"> </form>');

printf('<h3 class="h3ejer4"> La traduccion es  </h3>' ,$diccionario[$key]);

//Procesar el formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $traducir = $_POST["palabras"];

    printf('<span class="espanol">La palabra %s traducida al ingles significa</span> <span class="ingles">%s</span>',$traducir,$diccionario[$traducir]);

    } else {
        print "Pendiente de seleccionar palabra para traducir";
    }

?>
    
</body>
</html>