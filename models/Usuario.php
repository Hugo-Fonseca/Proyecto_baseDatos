<?php
namespace App\models;

class Usuario
{
    private $usuario;
    private $pwd;

    public function __construct($usuario, $pwd)
    {
        $this->usuario = $usuario;
        $this->pwd = $pwd;
    }

    public function getUsuario() { return $this->usuario; }
    public function getPwd() { return $this->pwd; }
}
?>
