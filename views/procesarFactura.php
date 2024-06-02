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

    
    $descuento = 0; 

    if ($valorFactura > 400000) {
        $descuento = 10; 
    } elseif ($valorFactura > 100000) {
        $descuento = 5; 
    }

    $facturaData = [
        'idCliente' => $clienteId,
        'descuento' => $descuento,
        'valorFactura' => $valorFactura
    ];
    $facturaReferencia = $facturaController->guardarFactura($facturaData);

    header("Location: principal.php");
    exit();
} else {
    echo "Error: No se ha proporcionado un ID de cliente.";
    exit();
}
?>