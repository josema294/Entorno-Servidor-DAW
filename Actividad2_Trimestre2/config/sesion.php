<?php
// Si no hay una sesión activa, la iniciamos.
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Si la variable de sesión 'logueado' no ha sido definida,
// inicializamos todas las variables de sesión a null.
if (!isset($_SESSION["logueado"])) {
    $_SESSION["idSesion"] = null;
    $_SESSION["logueado"] = null;
    $_SESSION["tipoUsuario"] = null;
}
?>