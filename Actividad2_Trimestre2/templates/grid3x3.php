<?php
include("./config/db.php");

if (DataBaseConection::getConexion() != null) {
    $conexion = DataBaseConection::getConexion();
}
else {
    DataBaseConection::openConection();
    $conexion = DataBaseConection::getConexion();
}

//seleccion de pisos de alto valor paramostrar en el destacados

$sql = "SELECT * FROM pisos WHERE PRECIO > 100000 ";

$result = mysqli_query($conexion,$sql);

$arrayPisos = [];
for ($i=0; $i < 9 ; $i++) { 
   
    $fila = mysqli_fetch_assoc($result);
    if ($fila) {
        $arrayPisos[] = $fila;
    }
}

//funcion para dar una descripcion aleatoria a los pisos:

function devuelveDescripcion() : String {

    
    //Descripcion random de una casa, creamos array con descripciones randoms
    
    $descripcion1 = "Acogedora casa de 3 habitaciones con jardín espacioso y vistas al parque. Ideal para familias.";
    $descripcion2 = "Moderno apartamento en el centro, completamente amueblado y con las mejores comodidades urbanas.";
    $descripcion3 = "Chalet de lujo con piscina privada, 5 dormitorios y garaje para dos coches, en zona exclusiva.";
    $descripcion4 = "Piso luminoso y recién reformado, con 2 baños y cocina equipada, en barrio tranquilo.";
    $descripcion5 = "Estudio compacto y eficiente, perfecto para solteros o parejas, cerca de transporte público.";
    $descripcion6 = "Amplia vivienda unifamiliar con patio trasero, sótano y ático, en vecindario seguro y amigable.";
    $descripcion7 = "Residencia histórica conservada con encanto del siglo XIX, amplios salones y jardín maduro.";
    $descripcion8 = "Casa adosada con terraza en la azotea, ideal para entretenimiento, en comunidad cerrada.";
    $descripcion9 = "Apartamento en primera línea de playa, con acceso directo al mar y espectaculares vistas al atardecer.";
    $descripcion0 = "Duplex con encanto en el casco antiguo, recientemente renovado, con balcón y cerca de todas las comodidades.";
    
    
    
    $arrayDescripciones = [$descripcion1,$descripcion2,$descripcion3,$descripcion4,$descripcion5,$descripcion6,
    $descripcion7,$descripcion8,$descripcion9,$descripcion0];
    
        
        return $arrayDescripciones[rand(0,9)] ;
    }




?>


<div
    class="container"
>
    <div
        class="row justify-content-center my-5 align-items-center g-2"
    >   

        <?php 
            include('./templates/card.php');

            

            for ($i=0; $i < 3 ; $i++) { 

                if (!isset($arrayPisos[$i])) {
                    continue;
                }
               
                $idpsio =  $arrayPisos[$i]["Codigo_piso"];
                $calle =  $arrayPisos[$i]["calle"];
                $numero =  $arrayPisos[$i]["numero"];
                $piso =  $arrayPisos[$i]["piso"];
                $cp =  $arrayPisos[$i]["cp"];
                $zona =  $arrayPisos[$i]["zona"];
                $puerta =  $arrayPisos[$i]["puerta"];
                $metros =  $arrayPisos[$i]["metros"];
                $precio =  $arrayPisos[$i]["precio"];
                $dueno =  $arrayPisos[$i]["usuario_id"];
                $imagen = $arrayPisos[$i]["imagen"];
                $descripcion =  devuelveDescripcion();


                echo '<div class="col">'.cardCasa ($idpsio,$calle,$numero,$piso,$puerta,$cp,$metros,$zona,$precio,$imagen,$dueno,$descripcion).'</div>';
            }

            for ($i=3; $i < 6 ; $i++) { 
                if (!isset($arrayPisos[$i])) {
                    continue;
                }
               
                $idpsio =  $arrayPisos[$i]["Codigo_piso"];
                $calle =  $arrayPisos[$i]["calle"];
                $numero =  $arrayPisos[$i]["numero"];
                $piso =  $arrayPisos[$i]["piso"];
                $cp =  $arrayPisos[$i]["cp"];
                $zona =  $arrayPisos[$i]["zona"];
                $puerta =  $arrayPisos[$i]["puerta"];
                $metros =  $arrayPisos[$i]["metros"];
                $precio =  $arrayPisos[$i]["precio"];
                $dueno =  $arrayPisos[$i]["usuario_id"];
                $imagen = $arrayPisos[$i]["imagen"];
                $descripcion =  devuelveDescripcion();


                echo '<div class="col">'.cardCasa ($idpsio,$calle,$numero,$piso,$puerta,$cp,$metros,$zona,$precio,$imagen,$dueno,$descripcion).'</div>';
            }

            for ($i=6; $i < 9 ; $i++) { 
                if (!isset($arrayPisos[$i])) {
                    continue;
                }
               
                $idpsio =  $arrayPisos[$i]["Codigo_piso"];
                $calle =  $arrayPisos[$i]["calle"];
                $numero =  $arrayPisos[$i]["numero"];
                $piso =  $arrayPisos[$i]["piso"];
                $cp =  $arrayPisos[$i]["cp"];
                $zona =  $arrayPisos[$i]["zona"];
                $puerta =  $arrayPisos[$i]["puerta"];
                $metros =  $arrayPisos[$i]["metros"];
                $precio =  $arrayPisos[$i]["precio"];
                $dueno =  $arrayPisos[$i]["usuario_id"];
                $imagen = $arrayPisos[$i]["imagen"];
                $descripcion =  devuelveDescripcion();


                echo '<div class="col">'.cardCasa ($idpsio,$calle,$numero,$piso,$puerta,$cp,$metros,$zona,$precio,$imagen,$dueno,$descripcion).'</div>';
            }
        
        
        ?>
        
    </div>
    
</div>

