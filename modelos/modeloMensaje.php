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
        return $this->conexion->lastInsertId(); // devolver id del nuevo mensaje
    }

    // Obtener mensajes de un chat
    public function obtenerMensajesPorChat($idchat) {
        $sql = "SELECT * FROM MENSAJES WHERE idchat_mensajes = :idchat ORDER BY idmensajes ASC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idchat', $idchat);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Borrar mensaje (si se elimina)
    public function eliminarMensaje($idmensaje) {
        $sql = "DELETE FROM MENSAJES WHERE idmensajes = :idmensaje";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':idmensaje', $idmensaje);
        return $stmt->execute();
    }
}