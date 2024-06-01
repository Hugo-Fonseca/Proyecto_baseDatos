<?php
namespace App\controllers;

require_once '../models/Cliente.php'; // Asegúrate de que la ruta sea correcta

use App\models\Cliente; // Asegúrate de que el espacio de nombres sea correcto

class ClienteController
{
    private $db;

    public function __construct()
    {
        $this->db = new DataBaseController();
    }

    public function guardarCliente($clienteData)
    {
        $nombreCompleto = $clienteData['nombreCompleto'];
        $tipoDocumento = $clienteData['tipoDocumento'];
        $numeroDocumento = $clienteData['numeroDocumento'];
        $email = $clienteData['email'];
        $telefono = $clienteData['telefono'];

        // Resto del código...
    }
}
?>
