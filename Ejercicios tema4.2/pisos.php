<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisos - Inmobiliaria Ficticia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-primary py-3">
    <div class="container">
        <h1 class="text-white">Inmobiliaria Ficticia</h1>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="./home.html">Inmobiliaria Ficticia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./home.html">Inicio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="usuarios.php">Usuarios <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="pisos.php">Pisos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./about.html">Sobre Nosotros</a>
                </li>
             
            </ul>
        </div>
    </div>
</nav>

<!-- Submenú específico para la sección de pisos -->
<div class="container my-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pisos.php">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="añadir_piso.php">Añadir</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listar_pisos.php">Listar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="buscar_piso.php">Buscar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="modificar_piso.php">Modificar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="borrar_piso.php">Borrar</a>
        </li>
    </ul>
</div>

<main class="py-5">
    <div class="container">
        <h2 class="mb-4">Bienvenido a la sección de Pisos</h2>
        <p>Esta es la sección principal de Pisos. Aquí puedes elegir entre añadir, listar, buscar, modificar o borrar pisos.</p>
    </div>
</main>

<footer class="bg-dark text-white py-4 text-center">
    <div class="container">
        &copy; 2024 Inmobiliaria Ficticia. Todos los derechos reservados.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
