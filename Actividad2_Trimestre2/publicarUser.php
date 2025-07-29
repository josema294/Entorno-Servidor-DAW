<?php
include('./config/sesion.php');

// Access control check: Only admin users can access this page
if (!isset($_SESSION["tipoUsuario"]) || $_SESSION["tipoUsuario"] !== "admin") {
    header("Location: ./home.php"); // Redirect non-admin users
    exit();
}

include('./templates/head.php');
include('./templates/header.php');

?>

<main>

    <?php
    // Determine which form to include based on GET/POST parameters
    if (isset($_GET["modificarUsuario"])) {
        // If 'modificarUsuario' is set in GET, it means we are loading the modification form
        include('./templates/formModUsuario.php');
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
        // If it's a POST request and 'id' is set, it means the modification form was submitted
        include('./templates/formModUsuario.php');
    } else {
        // Otherwise, it's for creating a new user (GET request without 'modificarUsuario' or POST without 'id')
        include('./templates/formUsuario.php');
    }
    ?>

</main>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>