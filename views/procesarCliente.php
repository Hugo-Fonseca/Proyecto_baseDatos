<?php
session_start();
if (!isset($_SESSION['iniciarSesion'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../controllers/ClienteController.php';
require_once '../controllers/FacturaController.php';

use App\controllers\ClienteController;
use App\controllers\FacturaController;

$clienteController = new ClienteController();
$facturaController = new FacturaController();

$clienteData = [
    'nombreCompleto' => $_POST['nombreCompleto'],
    'tipoDocumento' => $_POST['tipoDocumento'],
    'numeroDocumento' => $_POST['numeroDocumento'],
    'email' => $_POST['email'],
    'telefono' => $_POST['telefono']
];

$clienteId = $clienteController->guardarCliente($clienteData);

$valorFactura = $_POST['valorFactura'];
$descuento = 0;

if ($valorFactura > 650000) {
    $descuento = 8;
} elseif ($valorFactura > 200000) {
    $descuento = 4;
} elseif ($valorFactura > 100000) {
    $descuento = 2;
}

$facturaData = [
    'cliente_id' => $clienteId,
    'descuento' => $descuento,
    'valor_factura' => $valorFactura
];

$facturaId = $facturaController->guardarFactura($facturaData);

header("Location: verFactura.php?id=$facturaId");
exit();
?>
