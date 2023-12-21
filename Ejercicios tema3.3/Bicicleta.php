<?php
include_once 'Vechiculo.php';

class Bicicleta extends Vehiculo {

private $numero_de_marchas;

public function __construct($marchas = 0) {
    $this->numero_de_marchas = $marchas;
    parent::__construct();
}

public function hazCaballito (){
    print("Caballito...");
}   

}
?>