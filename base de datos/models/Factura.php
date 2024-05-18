<?php
class Factura {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function crearFactura($clienteId, $productos, $total, $descuento) {
        $stmt = $this->conexion->prepare("INSERT INTO facturas (cliente_id, total, descuento) VALUES (?, ?, ?)");
        $stmt->bind_param("idd", $clienteId, $total, $descuento);
        if ($stmt->execute()) {
            $facturaId = $this->conexion->insert_id;
            foreach ($productos as $producto) {
                $stmtProducto = $this->conexion->prepare("INSERT INTO factura_productos (factura_id, producto_id, cantidad) VALUES (?, ?, ?)");
                $stmtProducto->bind_param("iii", $facturaId, $producto['id'], $producto['cantidad']);
                $stmtProducto->execute();
            }
            return $facturaId;
        } else {
            return false;
        }
    }

    public function obtenerFactura($facturaId) {
        $stmt = $this->conexion->prepare("SELECT * FROM facturas WHERE id = ?");
        $stmt->bind_param("i", $facturaId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function obtenerProductosPorFactura($facturaId) {
        $stmt = $this->conexion->prepare("SELECT fp.*, p.nombre, p.precio FROM factura_productos fp JOIN productos p ON fp.producto_id = p.id WHERE fp.factura_id = ?");
        $stmt->bind_param("i", $facturaId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function cambiarEstado($facturaId, $estado) {
        $stmt = $this->conexion->prepare("UPDATE facturas SET estado = ? WHERE id = ?");
        $stmt->bind_param("si", $estado, $facturaId);
        return $stmt->execute();
    }
}
?>
