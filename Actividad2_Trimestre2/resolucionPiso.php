<?php
//Para modificaciones de pisos como admin

include("./config/db.php");
include ('./config/sesion.php'); 
include ('./templates/head.php');
include ('./templates/header.php');

if(isset($_POST["haciendoModificacion"]) ) {
    //Si hemos recibido una modificacion del formulario la guardamos
    $idPiso = $_POST["idPiso"];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $piso = isset($_POST['piso']) ? $_POST['piso'] : null; // Opcional
    $puerta = isset($_POST['puerta']) ? $_POST['puerta'] : null; // Opcional
    $cp = $_POST['cp'];
    $metros = $_POST['metros'];
    $zona = isset($_POST['zona']) ? $_POST['zona'] : null; // Opcional
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $usuario_id =  $_POST['usuario_id'];

    DataBaseConection::openConection();
    $conexion = DataBaseConection::getConexion();
    $query = "UPDATE `pisos` SET 
    `Codigo_piso` = " . $idPiso . ",
    `calle` = '" . $calle . "',
    `numero` = " . $numero . ",
    `piso` = " . ($piso !== null ? "'" . $piso . "'" : "NULL") . ",
    `puerta` = " . ($puerta !== null ? "'" . $puerta . "'" : "NULL") . ",
    `cp` = " . $cp . ",
    `metros` = " . $metros . ",
    `zona` = '" . $zona . "',
    `precio` = " . $precio . ",
    `imagen` = '" . $imagen . "',
    `usuario_id` = " . $usuario_id . " 
    WHERE `Codigo_piso` = " . $idPiso . ";";


    if(mysqli_query($conexion,$query)>0){

        print('   <div class="alert alert-success" role="alert">
        Modificacion de piso realizada.
      </div>');
    }else{
        print('<div class="alert alert-danger" role="alert">
        Fallo al modificar piso, ningun dato se ha cambiado.
      </div>');
    }

    


  
}
?>
<!-- Ejemplo de botón con enlace en Bootstrap 5 -->
<a href="./administracion.php" class="btn btn-primary" role="button">vovler al panel de administracion</a>

<?php include('./templates/footer.php'); ?>

