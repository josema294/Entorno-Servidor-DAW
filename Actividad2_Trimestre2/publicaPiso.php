<?php
include('./config/sesion.php');

// Access control check: Only 'vendedor' or 'admin' users can access this page
if (!isset($_SESSION["logueado"]) || $_SESSION["logueado"] !== true || (!isset($_SESSION["tipoUsuario"]) || ($_SESSION["tipoUsuario"] !== "vendedor" && $_SESSION["tipoUsuario"] !== "admin"))) {
    header("Location: ./home.php"); // Redirect unauthorized users
    exit();
}

include('./templates/head.php');
include('./templates/header.php');

?>

<main>

    <?php
    if (isset($_GET["modificarPiso"])) {
        include('./templates/formModPiso.php');
    } else {
        include('./templates/formPiso.php');
    }
    ?>

</main>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>