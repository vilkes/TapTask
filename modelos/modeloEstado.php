<?php
require_once '../conexion/conexion.php';

class Estado {
    private $conexion;

    public function __construct() {
        global $pdo;
        $this->conexion = $pdo;
    }

    // Crear estado nuevo al enviar mensaje
    public function crearEstado($idmensaje) {
        $sql = "INSERT INTO ESTADO (idmensajes_estado, editado, eliminado)
                VALUES (:idmensaje, 0, 0)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idmensaje', $idmensaje);
        $stmt->execute();
    }

    // Marcar como leído
    public function marcarLeido($idmensaje) {
        $sql = "UPDATE ESTADO SET leido = NOW() WHERE idmensajes_estado = :idmensaje";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idmensaje', $idmensaje);
        $stmt->execute();
    }

    // Marcar como entregado
    public function marcarEntregado($idmensaje) {
        $sql = "UPDATE ESTADO SET entregado = NOW() WHERE idmensajes_estado = :idmensaje";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idmensaje', $idmensaje);
        $stmt->execute();
    }

    // Editar mensaje (cambiar bandera)
    public function marcarEditado($idmensaje) {
        $sql = "UPDATE ESTADO SET editado = 1 WHERE idmensajes_estado = :idmensaje";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idmensaje', $idmensaje);
        $stmt->execute();
    }

    // Eliminar mensaje lógicamente
    public function marcarEliminado($idmensaje) {
        $sql = "UPDATE ESTADO SET eliminado = 1 WHERE idmensajes_estado = :idmensaje";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idmensaje', $idmensaje);
        $stmt->execute();
    }
}