<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Factura</title>
</head>
<body>
    <h2>Ingresar Datos de la Factura</h2>
    <form action="procesarFactura.php" method="post">
        <label for="cliente_id">ID del Cliente:</label>
        <input type="text" id="cliente_id" name="cliente_id" required>
        <br>
        <label for="descuento">Descuento:</label>
        <input type="text" id="descuento" name="descuento" required>
        <br>
        <label for="valor_factura">Valor de la Factura:</label>
        <input type="text" id="valor_factura" name="valor_factura" required>
        <br>
        <button type="submit">Guardar Factura</button>
    </form>
</body>
</html>
