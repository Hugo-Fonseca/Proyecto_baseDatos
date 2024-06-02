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
    $descuento = 0; // Inicializar el descuento en 0

    // Verificar las condiciones para aplicar descuento
    if ($valorFactura > 400000) {
        $descuento = 10; // 10% de descuento si el valor de la factura es mayor a 400000
    } elseif ($valorFactura > 100000) {
        $descuento = 5; // 5% de descuento si el valor de la factura es mayor a 100000
    }

    // Guardar la factura
    $facturaData = [
        'idCliente' => $clienteId,
        'descuento' => $descuento,
        'valorFactura' => $valorFactura
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