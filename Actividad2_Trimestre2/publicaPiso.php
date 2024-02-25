<?php include('./config/sesion.php');  ?>
<?php include('./templates/head.php'); ?>
<?php include('./templates/header.php'); ?>
<?php include('./config/db.php'); ?>

<main>

    <?php



    if (($logueado == 1 ) && (( $tipo == "vendedor") || ($tipo == "admin") ) ){
        
        if (isset($_GET["modificarPiso"])) {
            include('./templates/formModPiso.php');
        }
        
        else{

            include('./templates/formPiso.php');
        }

        
    
    }else{

        print "<div class=\"alert alert-danger\" role=\"alert\">
        No existen permisos de acceso a esta seccion, necesitas ser un usuario vendedor de viviendas!
    </div>";
    }

    ?>

</main>
<?php include('./templates/footer.php'); ?>