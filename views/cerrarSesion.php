<?php
// Inicia la sesión si no está iniciada
session_start();

// Destruye todas las variables de sesión
$_SESSION = array();

// Finaliza la sesión
session_destroy();

// Redirige al usuario a la página de inicio (index.php en este caso)
header("Location: ../index.php");
exit();
?>
