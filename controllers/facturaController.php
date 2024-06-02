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
        $sql = "SELECT * FROM facturas WHERE referencia = '$id'";
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
    $referencia = uniqid();

    $sql = "INSERT INTO facturas (refencia, fecha, idCliente, descuento, valorFactura)
            VALUES (
                '$referencia', 
                NOW(), 
                '{$facturaData['idCliente']}', 
                '{$facturaData['descuento']}', 
                '{$facturaData['valorFactura']}'
            )";

    $this->db->execSql($sql);
    return $referencia; 
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
        $descuento = 0;

        if ($valorFactura > 650000) {
            $descuento = 10;
        } elseif ($valorFactura > 100000) {
            $descuento = 5;
        }

        return $descuento;
    }
}
?>
