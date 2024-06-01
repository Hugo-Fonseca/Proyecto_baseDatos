<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingresar Cliente</title>
</head>
<body>
    <h2>Ingresar Cliente</h2>
    <form action="procesarCliente.php" method="post">
        <label for="nombreCompleto">Nombre Completo:</label>
        <input type="text" id="nombreCompleto" name="nombreCompleto" required><br><br>
        <label for="tipoDocumento">Tipo de Documento:</label>
        <input type="text" id="tipoDocumento" name="tipoDocumento" required><br><br>
        <label for="numeroDocumento">Número de Documento:</label>
        <input type="text" id="numeroDocumento" name="numeroDocumento" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required><br><br>
        <input type="submit" value="Guardar Cliente">
    </form>
</body>
</html>
