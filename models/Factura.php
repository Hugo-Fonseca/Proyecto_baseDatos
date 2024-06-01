<?php

namespace App\models;

class Factura extends Model
{
    protected $referencia;
    protected $fecha;
    protected $idCliente;
    protected $estado;
    protected $descuento;

    // Constructor
    public function __construct($referencia, $fecha, $idCliente, $estado, $descuento)
    {
        $this->referencia = $referencia;
        $this->fecha = $fecha;
        $this->idCliente = $idCliente;
        $this->estado = $estado;
        $this->descuento = $descuento;
    }

    // Otros métodos de la clase Factura...
}

?>
