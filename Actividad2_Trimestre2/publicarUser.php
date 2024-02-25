<?php include('./config/sesion.php');  ?>
<?php include('./templates/head.php'); ?>
<?php include('./templates/header.php'); ?>

<main>

    <?php

    if ( ($tipo == "admin")  ){

       if (isset($_GET["modificarUsuario"])) {

        include('./templates/formModUsuario.php');
        
    } elseif ($_SERVER["REQUEST_METHOD"]=="POST") {
        include('./templates/formModUsuario.php');
    }else{
        include('./templates/formUsuario.php');
       }
    } else{

        print "<div class=\"alert alert-danger\" role=\"alert\">
        No existen permisos de acceso a esta seccion, necesitas ser un usuario administrador.
    </div>";
    }

    ?>

</main>
<?php include('./templates/footer.php'); ?>