<?php

namespace App\controllers;

require_once '../models/Cliente.php';
require_once 'DataBaseController.php';

use App\models\Cliente;

class ClienteController
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBaseController();
    }

    public function guardarCliente($data)
    {
        $cliente = new Cliente(
            $data['nombreCompleto'],
            $data['tipoDocumento'],
            $data['numeroDocumento'],
            $data['email'],
            $data['telefono']
        );

        $sql = "INSERT INTO clientes (nombreCompleto, tipoDocumento, numeroDocumento, email, telefono) VALUES (
            '{$cliente->getNombreCompleto()}',
            '{$cliente->getTipoDocumento()}',
            '{$cliente->getNumeroDocumento()}',
            '{$cliente->getEmail()}',
            '{$cliente->getTelefono()}'
        )";

        $this->db->execSql($sql);
        return $this->db->getInsertId();
    }

    public function obtenerCliente($id)
    {
        $sql = "SELECT * FROM clientes WHERE id = '$id'";
        $result = $this->db->execSql($sql);
        $data = $result->fetch_assoc();

        return new Cliente(
            $data['nombreCompleto'],
            $data['tipoDocumento'],
            $data['numeroDocumento'],
            $data['email'],
            $data['telefono'],
            $data['id']
        );
    }
}
?>
