<?php

namespace App\controllers;

use App\models\Factura;
use App\controllers\DataBaseController;

class FacturaController
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBaseController();
    }

    public function guardarFactura($facturaData)
    {
        $factura = new Factura(
            $facturaData['cliente_id'],
            $facturaData['descuento'],
            $facturaData['valor_factura']
        );

        $sql = "INSERT INTO facturas (fecha, idCliente, descuento, valorFactura, estado)
                VALUES (
                    NOW(), 
                    '{$factura->getClienteId()}', 
                    '{$factura->getDescuento()}', 
                    '{$factura->getValorFactura()}', 
                    '{$factura->getEstado()}'
                )";

        $this->db->execSql($sql);
        return $this->db->conex->insert_id;
    }

    public function obtenerFactura($id)
    {
        $sql = "SELECT * FROM facturas WHERE id = '$id'";
        $result = $this->db->execSql($sql);
        return $result->fetch_assoc();
    }
}
?>

