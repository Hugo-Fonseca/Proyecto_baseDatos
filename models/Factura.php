<?php

namespace App\models;

class Factura
{
    private $refencia;
    private $fecha;
    private $idCliente;
    private $descuento;
    private $valorFactura;

    public function __construct($refencia, $fecha, $idCliente, $descuento, $valorFactura)
    {
        $this->refencia = $refencia;
        $this->fecha = $fecha;
        $this->idCliente = $idCliente;
        $this->descuento = $descuento;
        $this->valorFactura = $valorFactura;
    }

    public function getRefencia()
    {
        return $this->refencia;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function getValorFactura()
    {
        return $this->valorFactura;
    }
}
?>
