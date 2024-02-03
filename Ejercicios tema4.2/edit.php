<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir/Modificar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <!-- El título del formulario cambia según sea añadir o modificar -->
                    <h5 class="card-title" id="formTitle">Añadir Nuevo Usuario</h5>
                    
                    <form action="destino_formulario.php" method="POST">
                        <div class="mb-3">
                            <label for="nombreUsuario" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreUsuario" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailUsuario" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailUsuario" name="email" required>
                        </div>
                        <!-- Añade más campos según sea necesario -->

                        <!-- Botones de acción -->
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                        <a href="javascript:history.back()" class="btn btn-secondary">Volver Atrás</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
