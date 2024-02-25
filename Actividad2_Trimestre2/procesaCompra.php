<?php include('./config/sesion.php');  ?>
<?php include('./templates/head.php'); ?>
<?php include('./templates/header.php'); ?>

<main>

<div class="container mt-5">
    <h1 class="mb-4">Compra de Propiedad</h1>
    
    <?php
    // Verificamos si se ha enviado el formulario de compra
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Comprobamos si se ha comprado un piso ya o esta haciendose el formulario de compra

        if (condition) {
            # code...
        }
       
        print_r($_POST);
        $idComprador = $_SESSION["usuario_id"];
        $idPiso = $_POST["Codigo_piso"];


       print ('
       
       <form method="post">
       <div class="mb-3">
           <label for="usuario_comprador" class="form-label" > Usuario comrpador</label>
           <input type="text" class="form-control" id="usuario_comprador" name="usuario_comprador" value="'. $idComprador.'" disabled required>
       </div>
       <div class="mb-3">
           <label for="codigo_piso" class="form-label" disable >Codigo del piso a comprar</label>
           <input type="text" class="form-control" id="codigo_piso" value="'. $idPiso.'"name="codigo_piso" disabled required>
       </div>
       <div class="mb-3">
           <label for="precio_final" class="form-label">Precio Final:</label>
           <input type="text" class="form-control" id="precio_final" name="precio_final" required>
       </div>
       <button type="submit" class="btn btn-primary">Comprar Propiedad</button>
   </form>
</div>');
        
    
    }
    ?>

   

</main>
<?php include('./templates/footer.php'); ?>