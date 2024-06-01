<?php

require '../models/Usuario.php'; // Asegúrate de que la ruta sea correcta
require '../controllers/UsuarioController.php'; // Asegúrate de que la ruta sea correcta

use App\models\Usuario;
use App\controllers\UsuarioController;

// Recibe los datos del formulario
$user = $_POST['user'];
$pwd = $_POST['pwd'];

// Crea una nueva instancia de la clase Usuario
$usuario = new Usuario($user, $pwd);

// Llama al controlador para procesar la autenticación del usuario
$usuarioController = new UsuarioController();
$iniciarSesion = $usuarioController->validarInicioSesion($usuario);

if ($iniciarSesion) {
    session_start();
    $_SESSION['usuario'] = $_POST['user'];
    header('Location: ingresarCliente.php');
} else {
    echo '<h1>Datos Incorrectos</h1>';
    echo '<br>';
    echo '<a href="../index.php">Volver</a>';
}
?>
