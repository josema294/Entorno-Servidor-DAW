<?php include('./config/sesion.php');  ?>
<?php include('./templates/head.php'); ?>
<?php include('./templates/header.php'); ?>

<main>

    <?php

    if ( ($tipo == "admin")  ){

       
        include('./templates/formUsuario.php');
    
    } else{

        print "<div class=\"alert alert-danger\" role=\"alert\">
        No existen permisos de acceso a esta seccion, necesitas ser un usuario administrador.
    </div>";
    }

    ?>

</main>
<?php include('./templates/footer.php'); ?>