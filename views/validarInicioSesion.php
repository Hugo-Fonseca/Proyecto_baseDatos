<?php
require '../models/model.php';
require '../models/usuarios.php';
include '../controllers/UsuarioController.php';

use app\models\Usuario;
use app\controllers\UsuarioController;

$usuario = new Usuario();
$usuario->set('usuario',$_POST['user']);
$usuario->set('pwd',$_POST['pwd']);
$controlador = new UsuarioController();
$iniciarSesion = $controlador->validarInicioSesion($usuario);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar Sesión</title>
</head>
<body>
<div class="factura-detalle-container">
        <h2>Detalle de la Factura</h2>
        <p><strong>Número de Referencia:</strong> <?php echo $factura['id']; ?></p>
        <p><strong>Fecha de Compra:</strong> <?php echo $factura['fecha']; ?></p>
        <p><strong>Estado:</strong> <?php echo $factura['estado']; ?></p>
        <fieldset>
            <legend>Información del Cliente</legend>
            <p><strong>Nombre:</strong> <?php echo $factura['cliente_nombre']; ?></p>
            <p><strong>Tipo de Documento:</strong> <?php echo $factura['cliente_tipo_documento']; ?></p>
            <p><strong>Número de Documento:</strong> <?php echo $factura['cliente_documento']; ?></p>
            <p><strong>Teléfono:</strong> <?php echo $factura['cliente_telefono']; ?></p>
            <p><strong>Email:</strong> <?php echo $factura['cliente_email']; ?></p>
        </fieldset>
        <fieldset>
            <legend>Productos</legend>
            <ul>
                <?php foreach ($productos as $producto): ?>
                    <li>
                        <?php echo $producto['nombre']; ?> - $<?php echo $producto['precio']; ?> x <?php echo $producto['cantidad']; ?> = $<?php echo $producto['precio'] * $producto['cantidad']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </fieldset>
        <p><strong>Descuento:</strong> <?php echo $factura['descuento']; ?>%</p>
        <p><strong>Total a Pagar:</strong> $<?php echo $factura['total']; ?></p>
    </div>
    <?php
       if($iniciarSesion){
        session_start();
        $_SESSION['iniciarSesion'] = true;
        header('Location: inicio.php');
       }else{
        echo '<h1>Datos Incorrectos</h1>';
        echo '<br>';
        echo '<a href="../index.php">Volver</a>';
       }
    ?>
</body>
</html>