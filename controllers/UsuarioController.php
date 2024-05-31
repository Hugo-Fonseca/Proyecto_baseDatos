<?php
namespace app\controllers;

require_once '../controllers/DatabaseController.php';  
require_once '../models/model.php';  

use app\models\Usuario;

class UsuarioController {
    function validarInicioSesion($usuario) {
        $db = new DataBaseController();
        $u = $usuario->get('usuario');
        $p = $usuario->get('pwd');
        $sql = "SELECT * FROM usuarios WHERE usuario = '$u' AND pwd = '$p'";
        $resultado = $db->execSql($sql);
        // Preparar y ejecutar la consulta
        // $stmt = $db->prepare("SELECT * FROM usuarios WHERE usuario = ? AND pwd = ?");
        // $stmt->bind_param("ss", $usuario->get('usuario'), $usuario->get('pwd'));
        // $stmt->execute();

        // $resultado = $stmt->get_result();
        
        if ($resultado->num_rows > 0) {
            // $stmt->close();
            $db->close();
            return true;
        } else {
            // $stmt->close();
            $db->close();
            return false;
        }
    }

    function validarSession() {
        session_start();
        if (empty($_SESSION['iniciarSesion'])) {
            header('Location: ../index.php');
            exit();  
        }
    }
}
?>