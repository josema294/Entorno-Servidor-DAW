<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/ejercicio4.css">
    <title>ejercicio4 tema3</title>

</head>

<body>

    <h4>Escriba los datos siguientes:</h4>

    <form action="ejercicio4result.php" method="post">

        <div class="row1">

            <div class="nombre">

                <label class="labeltitulo" for="nombre">Nombre: </label>
                <input type="text" id="nombre">
            </div>

            <div class="apellidos">

                <label class="labeltitulo" for="apellidos" >Apellidos: </label>
                <input type="text" id="apellidos" value="">
            </div>
            <div class="edad">
                <div>
                    <label class="labeltitulo" for="edad">Edad: </label>
                    <select id="edad">
                        <option value="0_19">Entre 0 y 19 años</option>
                        <option value="20_39">Entre 20 y 39 años</option>
                        <option value="40_59">Entre 40 y 59 años</option>
                        <option value="60+">60+</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row2">

            <div class="peso">
                <label class="labeltitulo" for="peso">Peso: </label>
                <input id="peso" type="number">
            </div>

            <div class="sexo">
                <label class="labeltitulo" for="sexo">Sexo: </label>
                <input type="radio" name="sexo" id="sexohombre" value="hombre"> <label for="sexohombre">Hombre</label>
                <input type="radio" name="sexo" id="sexomujer" value="mujer"> <label for="sexomujer">Mujer</label>
            </div>

            <div class="estado_civil">
                <label class="labeltitulo" for="estado_civil">Estado civil: </label>
                <input type="radio" name="estado_civil" id="soltero" value="soltero"> <label for="soltero">Soltero</label>
                <input type="radio" name="estado_civil" id="casado" value="casado"> <label for="casado">Casado</label>
                <input type="radio" name="estado_civil" id="otro" value="casado"> <label for="otro">Otro</label>
            </div>
        </div>
        <div class="row3">

            <div>
                <label for="aficiones">Aficiones:</label>
                <input type="checkbox" id="cine" name="aficiones[]" value="cine"> <label for="cine">Cine</label>
                <input type="checkbox" id="literatura" name="aficiones[]" value="literatura"> <label for="literatura">literatura</label>
                <input type="checkbox" id="tebeos" name="aficiones[]" value="tebeos"> <label for="tebeos">Tebeos</label>
                <input type="checkbox" id="deporte" name="aficiones[]" value="deporte"> <label for="deporte">Deporte</label>
                <input type="checkbox" id="musica" name="aficiones[]" value="musica"> <label for="musica">Musica</label>
                <input type="checkbox" id="television" name="aficiones[]" value="television"> <label for="television">Television</label>

            </div>

        </div>
            

        <div class="botones">
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </div>

    </form>
</body>

</html>