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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Cliente</title>
</head>
<body>
    <form action="procesarCliente.php" method="post">
        <label for="nombreCompleto">Nombre Completo</label>
        <input type="text" name="nombreCompleto" required>
        <br>
        <label for="tipoDocumento">Tipo de Documento</label>
        <input type="text" name="tipoDocumento" required>
        <br>
        <label for="numeroDocumento">Número de Documento</label>
        <input type="text" name="numeroDocumento" required>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <br>
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" required>
        <br>
        <button type="submit">Guardar Cliente</button>
    </form>
</body>
</html>
