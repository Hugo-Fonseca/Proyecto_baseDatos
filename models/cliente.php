<?php

namespace App\models;

class Cliente extends Model
{
    protected $id;
    protected $nombreCompleto;
    protected $tipoDocumento;
    protected $numeroDocumento;
    protected $email;
    protected $telefono;

    // Constructor
    public function __construct($nombreCompleto, $tipoDocumento, $numeroDocumento, $email, $telefono)
    {
        $this->nombreCompleto = $nombreCompleto;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
        $this->email = $email;
        $this->telefono = $telefono;
    }

    // Otros métodos de la clase Cliente...
}

?>
