<?php
session_start();
if (!isset($_SESSION['iniciarSesion'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../controllers/FacturaController.php';
require_once '../controllers/ClienteController.php';

use App\controllers\FacturaController;
use App\controllers\ClienteController;

$facturaController = new FacturaController();
$clienteController = new ClienteController();

if(isset($_GET['id'])) {
    $facturaId = $_GET['id'];
    $factura = $facturaController->obtenerFactura($facturaId);
    $cliente = $clienteController->obtenerCliente($factura->getIdCliente());
} else {
    echo "Error: No se ha proporcionado un ID de factura.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Factura</title>
</head>
<body>
    <h2>Detalle de la Factura</h2>
    <p><strong>Número de Referencia:</strong> <?php echo $factura->getReferencia(); ?></p>
    <p><strong>Fecha de Compra:</strong> <?php echo $factura->getFecha(); ?></p>
    <fieldset>
        <legend>Información del Cliente</legend>
        <p><strong>Nombre:</strong> <?php echo $cliente->getNombreCompleto(); ?></p>
        <p><strong>Tipo de Documento:</strong> <?php echo $cliente->getTipoDocumento(); ?></p>
        <p><strong>Número de Documento:</strong> <?php echo $cliente->getNumeroDocumento(); ?></p>
        <p><strong>Teléfono:</strong> <?php echo $cliente->getTelefono(); ?></p>
        <p><strong>Email:</strong> <?php echo $cliente->getEmail(); ?></p>
    </fieldset>
    <p><strong>Descuento:</strong> <?php echo $factura->getDescuento(); ?>%</p>
    <p><strong>Total a Pagar:</strong> $<?php echo $factura->getValorFactura() * (1 - $factura->getDescuento() / 100); ?></p>
    <p><a href="../views/principal.php">Volver a la página principal</a></p>
</body>
</html>
