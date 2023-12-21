<?php

include_once 'Vechiculo.php';

class Coche extends Vehiculo {

private $cilindrada;

public function __construct($cil = 0) {
    $this->cilindrada = $cil;
    parent::__construct();
}

public function quemaRueda (){
    print("Ruedasssss...");
}

}
?>