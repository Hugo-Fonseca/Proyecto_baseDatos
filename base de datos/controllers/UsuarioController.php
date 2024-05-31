<?php
session_start();
require_once '../database.php';
require_once '../models/Usuario.php';

$db = conectar();
$usuarioModel = new Usuario($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usuario = $usuarioModel->login($username, $password);

    if ($usuario) {
        $_SESSION['usuario'] = $usuario;
        header('Location: ../views/dashboard.php');
    } else {
        header('Location: ../views/login.php?error=1');
    }
}
?>
