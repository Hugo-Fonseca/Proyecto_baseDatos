<?php
use App\controllers\DataBaseController;
require_once '../database.php';
require_once '../models/Factura.php';

$db = conectar();
$facturaModel = new DataBaseController($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clienteId = $_POST['cliente_id'];
    $productos = $_POST['productos'];
    $total = $_POST['total'];
    $descuento = $_POST['descuento'];

    $facturaId = $facturaModel->crearFactura($clienteId, $productos, $total, $descuento);

    if ($facturaId) {
        header('Location: ../views/ver_factura.php?id=' . $facturaId);
    } else {
        echo "Error al crear la factura.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $facturaId = $_GET['id'];
    $factura = $facturaModel->obtenerFactura($facturaId);
    $productos = $facturaModel->obtenerProductosPorFactura($facturaId);
}
?>