<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: views/dashboard.php');
} else {
    header('Location: views/login.php');
}
?>
