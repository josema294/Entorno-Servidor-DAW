<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inmobiliaria Jose</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/mainstyle.css">
</head>
<body>

<div class="container py-4 my-4">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <img src="./img/logo.webp" class="img-fluid mb-3" alt="Logo de la empresa" style="max-width: 200px;">
            <h3>InmobJose</h3>
            <p class="text-muted">La casa de tus sueños al alcance de un click!!</p>
        </div>
    </div>
</div>


</div>

<div class="container my-5">
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">No compartiremos tu email con nadie más.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <a href="./registro.php">Si no dispones de usuario, registrate en este enlace</a>
        </div>

        
        <button type="submit" class="btn btn-primary">Accede con tu cuenta</button>
        <a type="submit" href="./home.php" class="btn btn-primary">Accede sin registro</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
