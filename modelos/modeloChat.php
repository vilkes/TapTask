<?php
require_once '../conexion/conexion.php';

class Chat {
    private $conexion;

    public function __construct() {
        global $pdo;
        $this->conexion = $pdo;
    }

    public function crearChat($iduser1, $iduser2) {
        $sql = "INSERT INTO CHAT (iduser_1, iduser_2) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$iduser1, $iduser2]);
    }

    public function obtenerChatsPorUsuario($iduser) {
        $sql = "SELECT * FROM CHAT 
                WHERE (iduser_1 = ? OR iduser_2 = ?) AND eliminacion = 0";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$iduser, $iduser]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarChat($idchat) {
        $sql = "UPDATE CHAT SET eliminacion = 1 WHERE idchat = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$idchat]);
    }
}