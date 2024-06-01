<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Factura</title>
</head>
<body>
    <h2>Ingresar Factura</h2>
    <form action="procesarFactura.php" method="post">
        <label for="valorFactura">Valor de la Factura:</label>
        <input type="number" id="valorFactura" name="valorFactura" required><br><br>
        <input type="submit" value="Guardar Factura">
    </form>
</body>
</html>
