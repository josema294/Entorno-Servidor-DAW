<?php

class Pruebas {
    
    //Cambia esta variable si quieres cambiar de pruebas a produccion para la base de datos.
    private static $entornoPruebas = true;

    public static function entornoPruebas() : bool {
        
        
        return  Pruebas::$entornoPruebas;
    }

}

?>