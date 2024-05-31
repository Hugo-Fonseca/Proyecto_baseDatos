<?php
use App\controllers\DataBaseController;
require_once '../database.php';
require_once '../models/Producto.php';

$db = conectar();
$productoModel = new DataBaseController($db);

$productos = $productoModel->set('nombre',$_POST['user']);
?>