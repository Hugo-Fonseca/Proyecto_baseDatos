<?php
session_start();
if (!isset($_SESSION['iniciarSesion'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../controllers/ClienteController.php';

use App\controllers\ClienteController;

$clienteController = new ClienteController();

$clienteData = [
    'nombreCompleto' => $_POST['nombreCompleto'],
    'tipoDocumento' => $_POST['tipoDocumento'],
    'numeroDocumento' => $_POST['numeroDocumento'],
    'email' => $_POST['email'],
    'telefono' => $_POST['telefono']
];

$clienteId = $clienteController->guardarCliente($clienteData);

header("Location: factura.php?cliente_id=$clienteId");
exit();
?>
