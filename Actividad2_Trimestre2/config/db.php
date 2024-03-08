<?php

final class DataBaseConection
{

//Datos
private static $servername = "sql108.infinityfree.com";
private static $username = "if0_36061776";
private static $password = "YTl2gJAD7Lt";
private static $database = "if0_36061776_inmobiliaria";
private static $conexion = null;

public static function getConexion (){
    return self::$conexion;
}

public static function openConection() : bool{
    
    self::$conexion = new mysqli(self::$servername, self::$username, self::$password, self::$database);

    if (self::$conexion->connect_error) {
        die("Conexión fallida: " . self::$conexion->connect_error);
    } 
    return true;
}

public static function closeConection() {
  if (self::$conexion == null) {
    return "No hay conexion activa";
  }else{
    mysqli_close(self::$conexion);
    return "No hay conexion activa";
  }
}

    
}

?>

