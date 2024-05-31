
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <form action="views/validarInicioSesion.php" method="post">
        <label for="">Usuario</label>
        <input type="text" name="user" required>
        <br>
        <label for="">Contraseña</label>
        <input type="password" name="pwd" required>
        <br>
        <button type="submit">Inicar Sesión</button>
    </form>
</body>
</html>