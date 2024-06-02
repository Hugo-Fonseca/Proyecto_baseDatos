<?php
session_start();
if (!isset($_SESSION['iniciarSesion'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../controllers/FacturaController.php';

use App\controllers\FacturaController;

$facturaController = new FacturaController();

if (isset($_POST['cliente_id'])) {
    $clienteId = $_POST['cliente_id'];
    $valorFactura = $_POST['valorFactura'];

    // Calcular el descuento
    $descuento = $facturaController->calcularDescuento($valorFactura);

    // Guardar la factura
    $facturaData = [
        'idCliente' => $clienteId,
        'descuento' => $descuento,
        'valorFactura' => $valorFactura  // Corregido a 'valorFactura'
    ];
    $facturaReferencia = $facturaController->guardarFactura($facturaData);

    // Redirigir a la página principal
    header("Location: principal.php");
    exit();
} else {
    echo "Error: No se ha proporcionado un ID de cliente.";
    exit();
}
?>
