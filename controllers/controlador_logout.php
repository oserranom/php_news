<?php

session_start();

// Destruir la sesión si está iniciada
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    // Destruir la sesión
    session_destroy();
}

// Redirigir a la página de inicio o a donde desees después de cerrar sesión
header("Location: ../views/index.php");
exit();

?>
