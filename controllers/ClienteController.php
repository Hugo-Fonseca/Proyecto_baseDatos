<?php
use App\controllers\DataBaseController;
require_once '../database.php';
require_once '../models/cliente.php';

$db = DataBaseController();
$clienteModel = new DataBaseController($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $documento = $_POST['documento'];
    $tipoDocumento = $_POST['tipo_documento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $cliente = $clienteModel->obtenerClientePorDocumento($documento);

    if ($cliente) {
        $clienteModel->actualizarCliente($cliente['id'], $nombre, $documento, $tipoDocumento, $telefono, $email);
    } else {
        $clienteModel->registrarCliente($nombre, $documento, $tipoDocumento, $telefono, $email);
    }

    header('Location: ../views/crear_factura.php');
}
?>