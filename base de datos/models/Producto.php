<?php
class Producto {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function obtenerProductos() {
        $result = $this->conexion->query("SELECT * FROM productos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
