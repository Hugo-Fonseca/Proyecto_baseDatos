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
        $username = $usuario->get('usuario');
        $password = $usuario->get('pwd');

        $sql = "SELECT * FROM usuarios WHERE usuario = '$username' AND pwd = '$password'";
        $result = $this->db->execSql($sql);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
?>
