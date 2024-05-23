<?php
// Guia básica para PHP

// 1. Sintaxis Básica

// Comentarios en PHP
// Esto es un comentario de una línea

/*
Esto es un comentario
de múltiples líneas
*/

// Declaración de variables
$variableString = "Hola, mundo!";
$variableEntero = 123;
$variableFlotante = 123.45;
$variableBooleana = true;

// 2. Arrays

// Array indexado
$arrayIndexado = ["Manzana", "Banana", "Cereza"];
echo $arrayIndexado[0]; // Imprime "Manzana"

// Array asociativo
$arrayAsociativo = [
    "nombre" => "Carlos",
    "edad" => 25,
    "profesion" => "Desarrollador"
];
echo $arrayAsociativo["nombre"]; // Imprime "Carlos"

// Recorrer un array indexado
foreach ($arrayIndexado as $fruta) {
    echo $fruta . "<br>";
}

// Recorrer un array asociativo
foreach ($arrayAsociativo as $clave => $valor) {
    echo "$clave: $valor<br>";
}

// 3. Funciones Importantes

// Función simple
function saludar($nombre) {
    return "Hola, $nombre!";
}
echo saludar("Ana");

// Funciones integradas importantes

// Longitud de una cadena
$longitud = strlen("Hola"); // Devuelve 4
echo "Longitud: " . $longitud . "<br>";

//Longitud de un Array
$longitudIndexado = count($arrayIndexado);

// Convertir a mayúsculas
$cadenaEnMayusculas = strtoupper("hola"); // Devuelve "HOLA"
echo "Mayúsculas: " . $cadenaEnMayusculas . "<br>";

// Subcadena
$cadenaRecortada = substr("Hola, mundo!", 0, 5); // Devuelve "Hola,"
echo "Subcadena: " . $cadenaRecortada . "<br>";

// Reemplazar texto
$cadenaReemplazada = str_replace("mundo", "Carlos", "Hola, mundo!"); // Devuelve "Hola, Carlos!"
echo "Reemplazo: " . $cadenaReemplazada . "<br>";

// Dividir una cadena en un array
$arrayDePalabras = explode(" ", "Hola mundo de PHP");
print_r($arrayDePalabras); // Devuelve ["Hola", "mundo", "de", "PHP"]

// Unir un array en una cadena
$cadenaUnida = implode(", ", $arrayDePalabras);
echo "Unida: " . $cadenaUnida . "<br>"; // Devuelve "Hola, mundo, de, PHP"

// 4. Manipulación de Arrays

// Añadir un elemento al final del array
array_push($arrayIndexado, "Dátil");
print_r($arrayIndexado); // Devuelve ["Manzana", "Banana", "Cereza", "Dátil"]

// Eliminar el último elemento del array
array_pop($arrayIndexado);
print_r($arrayIndexado); // Devuelve ["Manzana", "Banana", "Cereza"]

// Añadir un elemento al inicio del array
array_unshift($arrayIndexado, "Durazno");
print_r($arrayIndexado); // Devuelve ["Durazno", "Manzana", "Banana", "Cereza"]

// Eliminar el primer elemento del array
array_shift($arrayIndexado);
print_r($arrayIndexado); // Devuelve ["Manzana", "Banana", "Cereza"]

// Ordenar un array
sort($arrayIndexado);
print_r($arrayIndexado); // Devuelve ["Banana", "Cereza", "Manzana"]

// Ordenar un array asociativo por valores
asort($arrayAsociativo);
print_r($arrayAsociativo); // Ordena el array asociativo por valores

// 5. Variables de Entorno y Superglobales

// $_SERVER contiene información del servidor y del entorno de ejecución
echo $_SERVER['SERVER_NAME']; // Nombre del servidor

// $_POST y $_GET para manejar datos de formularios
// $_POST se usa para formularios enviados con el método POST
// $_GET se usa para formularios enviados con el método GET o para parámetros en la URL

// 6. Manejo de Formularios

// HTML para un formulario simple
echo '
<form action="procesar.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <button type="submit">Enviar</button>
</form>
';

// PHP para procesar datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    echo "Hola, $nombre!";
}

// 7. Cookies

// Establecer una cookie
setcookie("usuario", "Carlos", time() + 3600); // Expira en 1 hora

// Leer una cookie
if (isset($_COOKIE['usuario'])) {
    echo "Usuario: " . $_COOKIE['usuario'];
}

// 8. Sesiones

// Iniciar una sesión
session_start();

// Establecer una variable de sesión
$_SESSION['usuario'] = 'Carlos';

// Leer una variable de sesión
echo "Usuario de la sesión: " . $_SESSION['usuario'];

// 9. Operaciones con Archivos

// Crear y escribir en un archivo
$archivo = fopen("archivo.txt", "w");
fwrite($archivo, "Hola, archivo!");
fclose($archivo);

// Leer un archivo
$archivo = fopen("archivo.txt", "r");
$contenido = fread($archivo, filesize("archivo.txt"));
fclose($archivo);
echo nl2br($contenido);

// 10. Acceso a Bases de Datos (MySQL)

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miBaseDeDatos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta normal
$sql = "SELECT id, nombre, edad FROM Estudiantes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"]. " - Edad: " . $row["edad"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Consulta preparada
$stmt = $conn->prepare("SELECT id, nombre, edad FROM Estudiantes WHERE edad > ?");
$stmt->bind_param("i", $edad);
$edad = 20;
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"]. " - Edad: " . $row["edad"]. "<br>";
}

$stmt->close();
$conn->close();
?>
