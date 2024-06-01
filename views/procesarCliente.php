<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../controllers/ClienteController.php';
require_once '../controllers/DataBaseController.php';

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

header("Location: ingresarFactura.php?cliente_id=$clienteId");
exit();
?>
