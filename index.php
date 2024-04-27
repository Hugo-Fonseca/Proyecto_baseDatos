<?php
include 'models/Model.php';
include 'models/Contacto.php';
include 'controllers/dataBaseController.php';
include 'controllers/facturaController.php';

use App\controllers\facturaController;

$controller = new facturaController();
$usuario = $controller->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
</head>

<body>
    <h1>Lista de contactos</h1>
    
</body>

</html>
