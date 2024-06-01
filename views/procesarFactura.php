<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../controllers/FacturaController.php';
require_once '../controllers/DataBaseController.php';

use App\controllers\FacturaController;

$facturaController = new FacturaController();

$facturaData = [
    'cliente_id' => $_POST['cliente_id'],
    'descuento' => $_POST['descuento'],
    'valor_factura' => $_POST['valor_factura']
];

$facturaId = $facturaController->guardarFactura($facturaData);

header("Location: verFactura.php?id=$facturaId");
exit();
?>

