<?php

namespace App\controllers;

require_once '../models/Factura.php';
require_once 'DataBaseController.php';

use App\models\Factura;

class FacturaController
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBaseController();
    }

    public function guardarFactura($data)
    {
        $factura = new Factura(
            $data['refencia'],
            $data['fecha'],
            $data['idCliente'],
            $data['descuento'],
            $data['valorFactura']
        );

        $sql = "INSERT INTO facturas (refencia, fecha, idCliente, descuento, valorFactura) VALUES (
            '{$factura->getRefencia()}',
            '{$factura->getFecha()}',
            '{$factura->getIdCliente()}',
            '{$factura->getDescuento()}',
            '{$factura->getValorFactura()}'
        )";

        $this->db->execSql($sql);
        return $this->db->getInsertId();
    }

    public function obtenerFactura($refencia)
    {
        $sql = "SELECT * FROM facturas WHERE refencia = '$refencia'";
        $result = $this->db->execSql($sql);
        $data = $result->fetch_assoc();

        return new Factura(
            $data['refencia'],
            $data['fecha'],
            $data['idCliente'],
            $data['descuento'],
            $data['valorFactura']
        );
    }
}
?>

