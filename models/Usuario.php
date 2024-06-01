<?php

namespace App\models;

class Usuario extends Model
{
    protected $id;
    protected $usuario;
    protected $pwd;

    public function __construct($usuario, $pwd)
    {
        $this->usuario = $usuario;
        $this->pwd = $pwd;
    }

    // Otros métodos de la clase Usuario...
}

?>
