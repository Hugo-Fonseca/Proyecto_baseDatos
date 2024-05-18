<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
require_once '../controllers/FacturaController.php';

$facturaId = $_GET['id'];
$factura = $facturaModel->obtenerFactura($facturaId);
$productos = $facturaModel->obtenerProductosPorFactura($facturaId);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Factura</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="factura-detalle-container">
        <h2>Detalle de la Factura</h2>
        <p><strong>Número de Referencia:</strong> <?php echo $factura['id']; ?></p>
        <p><strong>Fecha de Compra:</strong> <?php echo $factura['fecha']; ?></p>
        <p><strong>Estado:</strong> <?php echo $factura['estado']; ?></p>
        <fieldset>
            <legend>Información del Cliente</legend>
            <p><strong>Nombre:</strong> <?php echo $factura['cliente_nombre']; ?></p>
            <p><strong>Tipo de Documento:</strong> <?php echo $factura['cliente_tipo_documento']; ?></p>
            <p><strong>Número de Documento:</strong> <?php echo $factura['cliente_documento']; ?></p>
            <p><strong>Teléfono:</strong> <?php echo $factura['cliente_telefono']; ?></p>
            <p><strong>Email:</strong> <?php echo $factura['cliente_email']; ?></p>
        </fieldset>
        <fieldset>
            <legend>Productos</legend>
            <ul>
                <?php foreach ($productos as $producto): ?>
                    <li>
                        <?php echo $producto['nombre']; ?> - $<?php echo $producto['precio']; ?> x <?php echo $producto['cantidad']; ?> = $<?php echo $producto['precio'] * $producto['cantidad']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </fieldset>
        <p><strong>Descuento:</strong> <?php echo $factura['descuento']; ?>%</p>
        <p><strong>Total a Pagar:</strong> $<?php echo $factura['total']; ?></p>
    </div>
</body>
</html>
