<?php

if (session_status() == PHP_SESSION_NONE) {
   session_start();
   print_r($_SESSION);

   if (isset($_SESSION["idSesion"])) {
   } else {
    $_SESSION["idSesion"] = null;
    $_SESSION["logueado"] = null;
    $_SESSION["tipoUsuario"] = null;
   }

} elseif (session_status() == PHP_SESSION_DISABLED) {
    //Desactivada las sesiones
} elseif (session_status() == PHP_SESSION_ACTIVE) {
    
}

?>          