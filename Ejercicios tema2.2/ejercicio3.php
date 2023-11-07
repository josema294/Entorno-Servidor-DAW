<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 Tema 2.2 </title>

    <link rel="stylesheet" href="style/tema2.2.css">

</head>
<body>
    
<?php

//3.-Realiza un programa que generé 8 números aletorios, los almacene en un vector y que luego muestre esos números de colores,
// los pares en color azul y los impares en color rojo.

$resultado = []; //Vector de resultado de numeros aleatorioas


for ($i=0; $i <8 ; $i++) { 
    
    $resultado[$i] = rand(1,8);
}

//printamos una tabla para mostrar los resultados

print('<table border="1">
<thead>
  <th>Numero</th>
  <th>Es par ??</th>
  
</thead>');

for ($i=0; $i <8 ; $i++) { 
    
    if ($resultado[$i]%2==0) {
        
        printf('<tr> 
        <td> <span class="par"> %d </span> </td>
        <td> <span class="par">SI </span>  </td>
        </tr> ', $resultado[$i]);

    }

    elseif ($resultado[$i]%2!=0) {

        printf('<tr class="impar"> 
        <td> %d  </td>
        <td> NO  </td>
        </tr> ', $resultado[$i]);

    }

}

//cerramos tabla
print('</table>')


?>
    
</body>
</html>