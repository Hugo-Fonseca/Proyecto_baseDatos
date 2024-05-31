<?php
require '../models/usuarios.php';
include '../controllers/UsuarioController.php';

use app\controllers\UsuarioController;

$controller = new UsuarioController();
$controller->validarSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido a la App 
        <?php echo $_SESSION['iniciarSesion']?>
    </h1>
    <br>
    <a href="cerrarSesion.php">Cerrar sesion</a>
</body>
</html>