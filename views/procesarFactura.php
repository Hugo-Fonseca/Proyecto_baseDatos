<?php
session_start();
if (!isset($_SESSION['iniciarSesion'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../controllers/FacturaController.php';

use App\controllers\FacturaController;

$facturaController = new FacturaController();

$clienteId = $_POST['cliente_id'];
$valorFactura = $_POST['valorFactura'];

// Calcular el descuento
$descuento = $facturaController->calcularDescuento($valorFactura);

// Guardar la factura
$facturaData = [
    'idCliente' => $clienteId,
    'descuento' => $descuento,
    'valor_factura' => $valorFactura
];
$facturaId = $facturaController->guardarFactura($facturaData);

header("Location: verFactura.php?id=$facturaId");
exit();
?>
