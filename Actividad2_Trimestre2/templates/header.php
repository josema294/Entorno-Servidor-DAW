<?php include ("./config/sesion.php");

$logueado = ($_SESSION["logueado"] == true )? true : false;

switch ($_SESSION["tipoUsuario"]) {
    case 'admin':
        $tipo = "admin";
        break;
    case 'comprador':
        $tipo = "comrpador";
        break;
    case 'vendedor':
        $tipo = "vendedor";
        break;
    default:
        $tipo = "";
        break;
}


?>

<header>

    


    <ul class="nav justify-content-center align-items-center ">
        <img class="logo" src="./img/logo.webp" style="width: 90px; height: auto;">
        <li class="nav-item">
            <a class="nav-link active" href="./home.php" aria-current="page">Pisos destacados</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./todos.php">Oferta completa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="./publicaPiso.php">Publicar piso</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="./about.php">Sobre nosotros</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="./inmobjoselogin.php">salir</a>
        </li>

    </ul>
</header>

<body class="d-flex flex-column min-vh-100">