<?php

class Vehiculo {

    private static $Kms_totales;
    private static $VehiculosCreados=0;
    private $km_recorridos =0;

    public function __construct($km = 0) {
        $this->km_recorridos = $km;
        self::$Kms_totales += $km;
        self::$VehiculosCreados ++;
    }

    public function recorre($recorridos) {
        $this->km_recorridos += $recorridos;
        self::$Kms_totales += $recorridos;
    }

    public static function getVehiculosCreados(){
        return self::$VehiculosCreados;
    }

    public static function getKmTotales() {
        return self::$Kms_totales;
    }

    public function getKmRecorridos(){
        return $this->km_recorridos;
    }

 
}


?>