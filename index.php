<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
</head>
<body>
    <h2>Inicio de Sesión</h2>
    <form action="views/validarInicioSesion.php" method="post">
        <label for="user">Usuario:</label>
        <input type="text" id="user" name="user" required><br><br>
        <label for="pwd">Contraseña:</label>
        <input type="password" id="pwd" name="pwd" required><br><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
