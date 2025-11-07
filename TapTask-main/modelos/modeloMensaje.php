<?php
require_once '../conexion/conexion.php';

class Mensaje {
    private $conexion;

    public function __construct() {
        global $pdo;
        $this->conexion = $pdo;
    }

    // Crear mensaje
    public function crearMensaje($idchat, $iduser, $contenido) {
        $sql = "INSERT INTO MENSAJES (idchat_mensajes, iduser_mensajes, contenido)
                VALUES (:idchat, :iduser, :contenido)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idchat', $idchat);
        $stmt->bindParam(':iduser', $iduser);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->execute();
        return $this->conexion->lastInsertId();
    }

    public function obtenerMensajesPorChat($idchat) {
    $sql = "SELECT m.*, u.nombreUsuario 
            FROM MENSAJES m
            LEFT JOIN usuarios u ON m.iduser_mensajes = u.iduser
            WHERE m.idchat_mensajes = :idchat
            ORDER BY m.idmensajes ASC";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindParam(':idchat', $idchat);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // Borrar mensaje
    public function eliminarMensaje($idmensaje) {
        $sql = "DELETE FROM MENSAJES WHERE idmensajes = :idmensaje";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idmensaje', $idmensaje);
        return $stmt->execute();
    }
}