<?php

final class DatabaseConnection
{
    // 1. Declara las propiedades sin valor inicial
    private static $servidor;
    private static $usuario;
    private static $password;
    private static $database;
    private static $conexion = null;

    public static function getConnection()
    {
        return self::$conexion;
    }

    public static function openConnection()
    {
        if (self::$conexion !== null) {
            return;
        }

        // 2. Asigna los valores desde getenv() aquí, en tiempo de ejecución
        self::$servidor = getenv('DB_HOST') ?? 'localhost';
        self::$usuario  = getenv('DB_USER') ?? 'root';
        self::$password = getenv('DB_PASS') ?? '';
        self::$database = getenv('DB_NAME') ?? 'inmobiliaria';

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            self::$conexion = new mysqli(self::$servidor, self::$usuario, self::$password, self::$database);
            self::$conexion->set_charset('utf8mb4');
        } catch (mysqli_sql_exception $e) {
            error_log("Error de conexión a la BD: " . $e->getMessage());
            throw new mysqli_sql_exception("No se pudo conectar a la base de datos.");
        }
    }

    public static function closeConnection()
    {
        if (self::$conexion !== null) {
            self::$conexion->close();
            self::$conexion = null;
        }
    }
}