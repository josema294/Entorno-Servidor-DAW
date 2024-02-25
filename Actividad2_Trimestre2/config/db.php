<?php

final class DataBaseConection
{

//Datos
private static $servername = "sql11.freesqldatabase.com";
private static $username = "sql11686379";
private static $password = "JhJ4hdzQxM";
private static $database = "sql11686379";
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

