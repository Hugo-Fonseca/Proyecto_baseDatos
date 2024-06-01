<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../controllers/FacturaController.php';
require_once '../controllers/ClienteController.php';
require_once '../controllers/DataBaseController.php';

use App\controllers\FacturaController;
use App\controllers\ClienteController;

$facturaController = new FacturaController();
$clienteController = new ClienteController();

$facturaId = $_GET['id'];
$factura = $facturaController->obtenerFactura($facturaId);
$cliente = $clienteController->obtenerCliente($factura['idCliente']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Factura</title>
</head>
<body>
    <h2>Detalle de la Factura</h2>
    <p><strong>Número de Referencia:</strong> <?php echo $factura['id']; ?></p>
    <p><strong>Fecha de Compra:</strong> <?php echo $factura['fecha']; ?></p>
    <p><strong>Estado:</strong> <?php echo $factura['estado']; ?></p>
    <fieldset>
        <legend>Información del Cliente</legend>
        <p><strong>Nombre:</strong> <?php echo $cliente['nombreCompleto']; ?></p>
        <p><strong>Tipo de Documento:</strong> <?php echo $cliente['tipoDocumento']; ?></p>
        <p><strong>Número de Documento:</strong> <?php echo $cliente['numeroDocumento']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $cliente['telefono']; ?></p>
        <p><strong>Email:</strong> <?php echo $cliente['email']; ?></p>
    </fieldset>
    <p><strong>Descuento:</strong> <?php echo $factura['descuento']; ?>%</p>
    <p><strong>Total a Pagar:</strong> $<?php echo $factura['valorFactura'] * (1 - $factura['descuento'] / 100); ?></p>
</body>
</html>
