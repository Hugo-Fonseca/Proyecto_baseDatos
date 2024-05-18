<?php
require_once 'config.php';

function conectar() {
    $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conexion->connect_error) {
        die('Error de Conexión (' . $conexion->connect_errno . ') ' . $conexion->connect_error);
    }

    return $conexion;
}
?>
