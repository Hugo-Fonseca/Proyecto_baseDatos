<?php
require '../models/Usuario.php';
require '../controllers/UsuarioController.php';

use App\models\Usuario;
use App\controllers\UsuarioController;

$usuario = new Usuario();
$usuario->setUsuario($_POST['user']);
$usuario->setPwd($_POST['pwd']);
$controlador = new UsuarioController();
$iniciarSesion = $controlador->validarInicioSesion($usuario);

if ($iniciarSesion) {
    session_start();
    $_SESSION['iniciarSesion'] = true;
    header('Location: ingresarCliente.php');
    exit();
} else {
    echo '<h1>Datos Incorrectos</h1>';
    echo '<br>';
    echo '<a href="../index.php">Volver</a>';
}
?>
