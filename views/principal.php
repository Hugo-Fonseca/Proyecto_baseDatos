<?php
session_start();
if (!isset($_SESSION['iniciarSesion'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../controllers/FacturaController.php';

use App\controllers\FacturaController;

$facturaController = new FacturaController();
$facturas = $facturaController->obtenerTodasLasFacturas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
</head>
<body>
    <h2>Facturas</h2>
    <table border="1">
        <tr>
            <th>Referencia</th>
            <th>Fecha</th>
            <th>Cliente ID</th>
            <th>Descuento</th>
            <th>Valor Factura</th>
        </tr>
        <?php foreach ($facturas as $factura): ?>
            <tr>
                <td><?php echo $factura->getReferencia(); ?></td>
                <td><?php echo $factura->getFecha(); ?></td>
                <td><?php echo $factura->getIdCliente(); ?></td>
                <td><?php echo $factura->getDescuento(); ?>%</td>
                <td><?php echo $factura->getValorFactura(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <button onclick="window.location.href='cliente.php'">Crear Nuevo Cliente</button>
    <button onclick="window.location.href='modificarFactura.php'">Modificar Tabla</button>
    <button onclick="window.location.href='cerrarSesion.php'">Cerrar Sesión</button>
</body>
</html>
