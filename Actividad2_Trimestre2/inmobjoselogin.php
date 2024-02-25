<?php include("./config/sesion.php")  ?>

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


<?php
    include("./config/db.php"); 

    //Si se accede GET, por enlace y no por redirecion de POST, reiniciamos los valores pare desloguear la sesion
    if ($_SERVER["REQUEST_METHOD"]=="GET") {
        
        session_unset();
        
    }

    $correoCorrecto = false;
    $claveCorrecto = false;

    if ($_SERVER["REQUEST_METHOD"]=="POST") {

        $correo = $_POST["correo"];
        $clave =  $_POST["clave"];

        //Comprobamos que existan en la base de datos
        $sqlCorreo = "SELECT correo FROM usuarios where correo = '$correo'";
        $sqlClave = "SELECT clave FROM usuarios where correo = '$correo' and clave = '$clave'";

        DataBaseConection::openConection();
        $conexion = DataBaseConection::getConexion();

        $resultCorreo = mysqli_query($conexion,$sqlCorreo);
        
        if(mysqli_num_rows($resultCorreo)>0) {
            $correoCorrecto = true;
           
           } else {
            print ('<div class="alert alert-danger" role="alert">
            El correo es incorrecto.
          </div>');
        }

        //Comprobamos ahora la pass
        $resultclave = mysqli_query($conexion,$sqlClave);
        
        if (mysqli_num_rows($resultclave)>0) {
            $claveCorrecto = true;
        }else{
            print ('<div class="alert alert-danger" role="alert">
            La contrasena no es correcta.
          </div>');
        }
        
        //Si todo es correcto creamos la sesion para el usuario y le redirigimos al home
        if ($correoCorrecto && $claveCorrecto) {

            $sqlTipo = "SELECT tipo_usuario from usuarios where correo = '$correo' and clave = '$clave'";
            $sqlidUsuario = "SELECT usuario_id from usuarios where correo = '$correo' and clave = '$clave'";
            $tipo = mysqli_fetch_column(mysqli_query($conexion,$sqlTipo));
            $usuario_id = mysqli_fetch_column(mysqli_query($conexion,$sqlidUsuario));
            $_SESSION["idSesion"] =  random_int(0,10000);
            $_SESSION["logueado"] = true;
            $_SESSION["tipoUsuario"] = $tipo;
            $_SESSION["usuario_id"] = $usuario_id;

            DataBaseConection::closeConection();

            header("location: ./home.php");
            exit();
        }
    }
?>


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
    <form method="post" action="#">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="correo">
            <div id="emailHelp" class="form-text">No compartiremos tu email con nadie más.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="clave" id="clave">
        </div>
        <div class="mb-3">
          <a href="./registro.php">Si no dispones de usuario, registrate en este enlace</a>
        </div>

        
        <button type="submit" class="btn btn-primary" >Accede con tu cuenta</button>
        <a type="submit" href="./home.php" class="btn btn-primary">Accede sin registro</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
