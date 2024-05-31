<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
require_once '../controllers/FacturaController.php';

$facturas = $facturaModel->obtenerFacturas(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Facturas</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="facturas-container">
        <h2>Facturas</h2>
        <ul>
            <?php foreach ($facturas as $factura): ?>
                <li>
                    <a href="ver_factura.php?id=<?php echo $factura['id']; ?>">Factura #<?php echo $factura['id']; ?> - Estado: <?php echo $factura['estado']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>