<?php include('./config/sesion.php');  ?>
<?php include('./templates/head.php'); ?>
<?php include('./templates/header.php'); ?>

<main>

    <?php

    if ( ($tipo == "admin")  ){
        print_r($_GET);
       if (isset($_GET["modificarUsuario"])) {
        echo"1";

        include('./templates/formModUsuario.php');
        
    }elseif (($_SERVER["REQUEST_METHOD"]=="GET")&&(!isset($_GET["modificarUsuario"]))){
        echo"2";
        include('./templates/formUsuario.php');
    }
    elseif (($_SERVER["REQUEST_METHOD"]=="POST")&& !isset($_POST["id"]) ) {
        echo"3";
        include('./templates/formUsuario.php');
    }
    
    elseif ($_SERVER["REQUEST_METHOD"]=="POST") {
        include('./templates/formModUsuario.php');
    }
    } else{
        echo"otro";

        print "<div class=\"alert alert-danger\" role=\"alert\">
        No existen permisos de acceso a esta seccion, necesitas ser un usuario administrador.
    </div>";
    }

    ?>

</main>
<?php include('./templates/footer.php'); ?>