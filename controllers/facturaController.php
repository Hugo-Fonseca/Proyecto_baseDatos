<?php

namespace App\controllers;

require_once 'DataBaseController.php';

use App\models\Factura;

class FacturaController
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBaseController();
    }

    // Otros métodos del controlador...

    public function obtenerTodasLasFacturas()
    {
        $sql = "SELECT * FROM facturas";
        $result = $this->db->execSql($sql);
        $facturas = [];

        while ($data = $result->fetch_assoc()) {
            $facturas[] = new Factura(
                $data['referencia'],
                $data['fecha'],
                $data['idCliente'],
                $data['descuento'],
                $data['valorFactura']
            );
        }

        return $facturas;
    }
}

?>
