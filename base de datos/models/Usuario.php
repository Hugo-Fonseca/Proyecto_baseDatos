<?php
class Usuario {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function login($username, $password) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
