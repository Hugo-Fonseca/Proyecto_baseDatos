<?php
require_once '../database.php';
require_once '../models/Producto.php';

$db = conectar();
$productoModel = new Producto($db);

$productos = $productoModel->obtenerProductos();
?>
