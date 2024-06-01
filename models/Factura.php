<?php
namespace App\models;

class Factura
{
    protected $referencia;
    protected $fecha;
    protected $idCliente;
    protected $descuento;
    protected $valorFactura;

    public function __construct($referencia, $fecha, $idCliente, $descuento, $valorFactura)
    {
        $this->referencia = $referencia;
        $this->fecha = $fecha;
        $this->idCliente = $idCliente;
        $this->descuento = $descuento;
        $this->valorFactura = $valorFactura;
    }

    public function getReferencia() { return $this->referencia; }
    public function getFecha() { return $this->fecha; }
    public function getIdCliente() { return $this->idCliente; }
    public function getDescuento() { return $this->descuento; }
    public function getValorFactura() { return $this->valorFactura; }
}

?>
