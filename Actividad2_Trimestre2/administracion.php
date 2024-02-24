<?php include('./config/sesion.php');  ?>
<?php include('./templates/head.php'); ?>
<?php include('./templates/header.php'); ?>

<main>

<div class="container-fluid">
    <div class="row">
        <!-- Barra lateral -->
        <div class="col-md-2 d-flex flex-column flex-shrink-0 p-3 bg-light" style="height: 100vh;">
            <h4>Panel de Administración</h4>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">Inicio</a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">Gestión de Usuarios</a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">Gestión de Pisos</a>
                </li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="col-md-10 p-4">
            <h1>Bienvenido al Panel de Administración</h1>
            <hr>
            
            <h2>Gestión de Usuarios</h2>
            <div class="mb-3">
                <!-- Formulario de búsqueda para usuarios -->
                <form class="d-flex mb-4" action="ruta_para_procesar_busqueda_usuarios.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar usuario" aria-label="Buscar" name="busquedaUsuario">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <a href="./publicarUser.php" class="btn btn-success mb-2">Creacion de usuario</a>
                <button class="btn btn-info mb-2">Listar</button>
            </div>
            
            <h2>Gestión de Pisos</h2>
            <div>
                <!-- Formulario de búsqueda para pisos -->
                <form class="d-flex mb-4" action="ruta_para_procesar_busqueda_pisos.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar piso" aria-label="Buscar" name="busquedaPiso">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <a href="./publicaPiso.php" class="btn btn-success mb-2">Creacion de piso</a>
                <button class="btn btn-info mb-2">Listar</button>
            </div>
        </div>
    </div>
</div>


</main>
<?php include('./templates/footer.php'); ?>