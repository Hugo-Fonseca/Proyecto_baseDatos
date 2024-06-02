<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Factura</title>
    <link rel="stylesheet" href="../styles/estilo.css">
</head>
<body class="ingresar">
    <h2>Ingresar Factura</h2>
    <form action="procesarFactura.php" method="post">
        <!-- Campo oculto para cliente_id -->
        <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $_GET['cliente_id']; ?>">
        
        <label for="valorFactura">Valor de la Factura:</label>
        <input type="number" id="valorFactura" name="valorFactura" required><br><br>
        <input type="submit" value="Guardar Factura">
    </form>
</body>
</html>
