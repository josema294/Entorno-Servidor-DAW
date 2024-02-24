<?php include ('./config/sesion.php');  ?>
<?php include ('./templates/head.php'); ?>
<?php include ('./templates/header.php');?>

<main>

<?php

echo $logueado;
echo $tipo;

if (($logueado == 1 )&& (( $tipo == "comprador") || ($tipo == "admin") ) ){
    
    include("./templates/grid3x3.php");
  
} else{

    print "<div class=\"alert alert-danger\" role=\"alert\">
    No existen permisos de acceso a esta seccion, necesitas ser un usuario comprador de viviendas!
  </div>";
}









?>

   

    
</main>
<?php include ('./templates/footer.php');?>   