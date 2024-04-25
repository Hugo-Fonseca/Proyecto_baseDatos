<?php
$host = 'localhost';
$db = 'facturacion_tienda_db';
$user = 'tendero@tend.com';
$pass = '123456td';

$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT password FROM usuarios WHERE username = ?");
    $stmt->execute([$username]);
    $stored_password = $stmt->fetchColumn();

    if ($stored_password && password_verify($password, $stored_password)) {
       
        header("Location: pagina_principal.php");
        exit();
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>
