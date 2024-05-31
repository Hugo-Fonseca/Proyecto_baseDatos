<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
require_once '../controllers/ProductoController.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Factura</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="factura-container">
        <h2>Crear Factura</h2>
        <form action="../controllers/FacturaController.php" method="POST">
            <fieldset>
                <legend>Información del Cliente</legend>
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="documento">Número de Documento:</label>
                <input type="text" id="documento" name="documento" required>
                <label for="tipo_documento">Tipo de Documento:</label>
                <input type="text" id="tipo_documento" name="tipo_documento" required>
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </fieldset>
            <fieldset>
                <legend>Productos</legend>
                <?php foreach ($productos as $producto): ?>
                    <div class="producto-item">
                        <label>
                            <input type="checkbox" name="productos[]" value="<?php echo $producto['id']; ?>">
                            <?php echo $producto['nombre']; ?> - $<?php echo $producto['precio']; ?>
                        </label>
                        <label for="cantidad_<?php echo $producto['id']; ?>">Cantidad:</label>
                        <input type="number" id="cantidad_<?php echo $producto['id']; ?>" name="cantidades[<?php echo $producto['id']; ?>]" min="1" max="100">
                    </div>
                <?php endforeach; ?>
            </fieldset>
            <button type="submit">Generar Factura</button>
        </form>
    </div>
</body>
</html>