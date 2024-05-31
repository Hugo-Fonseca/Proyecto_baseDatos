<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Bienvenido, <?php echo $_SESSION['usuario']['username']; ?></h1>
        <a href="crear_factura.php">Crear Factura</a>
        <a href="consultar_facturas.php">Consultar Facturas</a>
        <a href="../controllers/LogoutController.php">Cerrar Sesión</a>
    </div>
</body>
</html>