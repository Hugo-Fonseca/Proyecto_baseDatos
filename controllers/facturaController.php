<?php

namespace App\controllers;

require_once 'DataBaseController.php';
require_once '../models/Factura.php';
use App\models\Factura;

class FacturaController
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBaseController();
    }

    public function obtenerFactura($id)
    {
        $sql = "SELECT * FROM facturas WHERE id = '$id'";
        $result = $this->db->execSql($sql);
        $data = $result->fetch_assoc();

        return new Factura(
            $data['referencia'],
            $data['fecha'],
            $data['idCliente'],
            $data['descuento'],
            $data['valorFactura']
        );
    }

    public function guardarFactura($facturaData)
{
    $sql = "INSERT INTO facturas (fecha, idCliente, descuento, valorFactura)
            VALUES (
                NOW(), 
                '{$facturaData['idCliente']}', 
                '{$facturaData['descuento']}', 
                '{$facturaData['valor_factura']}'
            )";

    $this->db->execSql($sql);
    return $this->db->conex->insert_id;
}

    public function obtenerTodasLasFacturas()
    {
        $sql = "SELECT * FROM facturas";
        $result = $this->db->execSql($sql);
        $facturas = [];

        while ($data = $result->fetch_assoc()) {
            $facturas[] = new Factura(
                $data['refencia'],
                $data['fecha'],
                $data['idCliente'],
                $data['descuento'],
                $data['valorFactura']
            );
        }

        return $facturas;
    }

    public function calcularDescuento($valorFactura)
    {
        if ($valorFactura > 650000) {
            return 8;
        } elseif ($valorFactura > 200000) {
            return 4;
        } elseif ($valorFactura > 100000) {
            return 2;
        } else {
            return 0;
        }
    }
}

?>
