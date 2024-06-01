<?php
namespace App\controllers;

require_once '../models/Usuario.php';
require_once 'DataBaseController.php';

use App\models\Usuario;

class UsuarioController
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBaseController();
    }

    public function validarInicioSesion($usuario)
    {
        $u = $usuario->getUsuario();
        $p = $usuario->getPwd();
        $sql = "SELECT * FROM usuarios WHERE usuario = '$u' AND pwd = '$p'";
        $resultado = $this->db->execSql($sql);

        if ($resultado->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>
