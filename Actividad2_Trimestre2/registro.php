<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria Jose</title>
</head>
<body>

<?php
    include ("./config/db.php");
   
   

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        
       $nombre = $_POST["nombre"];
       $correo = $_POST["correo"];
       $clave =  $_POST["clave"];
       $tipo_usuario = $_POST["tipoUsuario"];
       $sql = "INSERT INTO usuarios (nombres, correo, clave, tipo_usuario) 
       VALUES ('$nombre', '$correo', '$clave', '$tipo_usuario')";

       DataBaseConection::openConection();
       $conexion = DataBaseConection::getConexion();
       
       if (mysqli_query($conexion, $sql)) {
            print('<div class="alert alert-success" role="alert">
            Se ha creado exitosamente el usuario.
          </div>
            ');
       } else{
        print('<div class="alert alert-warning" role="alert">
        A simple warning alert—check it out!
      </div>
        ');
       }

       DataBaseConection::closeConection();
    }

?>

    <!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro - Inmobiliaria Jose</title>
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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Registro de Usuario</h2>
            <form method="post" action="#">
                <!-- Nombres -->
                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombre" required>
                </div>

                <!-- Correo electrónico -->
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="clave" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="clave" name="clave" required>
                </div>

                <!-- Tipo de Usuario -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipoUsuario" id="radioComprador" value="comprador" checked>
                    <label class="form-check-label" for="radioComprador">
                        Usuario comprador
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipoUsuario" id="radioVendedor" value="vendedor" >
                    <label class="form-check-label" for="radioVendedor">
                        Usuario vendedor
                    </label>
                </div>


                <!-- Botón de registro -->
                <button type="submit" class="btn btn-primary m-3">Registrar</button>
                <a class="l" href="./inmobjoselogin.php">Volver</a>
               
            </form>
           
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

    
</body>
</html>