<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="styles/estilo.css">
</head>
<body class="login">
     <div class="login-container">
        <h2>Inicio de Sesión</h2>
        <form action="views/validarInicioSesion.php" method="post">
            <label for="user">Usuario:</label>
            <input type="text" id="user" name="user" required><br><br>
            <label for="pwd">Contraseña:</label>
            <input type="password" id="pwd" name="pwd" required><br><br>
            <input type="submit" value="Iniciar Sesión">
    </form>
    </div>
</body>
</html>