<?php
require_once '../conexion/conexion.php';

class Chat {
    private $conexion;

    public function __construct() {
        global $pdo;
        $this->conexion = $pdo;
    }
    public function crearChat($iduser1, $iduser2) {
        try {
            $sqlCheck = "SELECT idchat FROM CHAT 
                         WHERE (iduser_1 = ? AND iduser_2 = ?) 
                            OR (iduser_1 = ? AND iduser_2 = ?)";
            $stmtCheck = $this->conexion->prepare($sqlCheck);
            $stmtCheck->execute([$iduser1, $iduser2, $iduser2, $iduser1]);

            $existe = $stmtCheck->fetch(PDO::FETCH_ASSOC);
            if ($existe) {
                return $existe['idchat']; // Ya existe el chat
            }
            $sql = "INSERT INTO CHAT (iduser_1, iduser_2, creacion, eliminacion) 
                    VALUES (?, ?, NOW(), 0)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$iduser1, $iduser2]);

            return $this->conexion->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error al crear chat: " . $e->getMessage());
            return false;
        }
    }
    public function obtenerChatsPorUsuario($iduser) {
        try {
            $sql = "SELECT 
                        c.idchat, 
                        c.iduser_1, 
                        c.iduser_2, 
                        c.creacion,
                        u1.nombreUsuario AS nombre_1,
                        u2.nombreUsuario AS nombre_2
                    FROM CHAT c
                    JOIN USUARIOS u1 ON c.iduser_1 = u1.iduser
                    JOIN USUARIOS u2 ON c.iduser_2 = u2.iduser
                    WHERE (c.iduser_1 = ? OR c.iduser_2 = ?) AND c.eliminacion = 0
                    ORDER BY c.creacion DESC";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$iduser, $iduser]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener chats: " . $e->getMessage());
            return [];
        }
    }
    public function eliminarChat($idchat) {
        try {
            $sql = "UPDATE CHAT SET eliminacion = 1 WHERE idchat = ?";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([$idchat]);
        } catch (PDOException $e) {
            error_log("Error al eliminar chat: " . $e->getMessage());
            return false;
        }
    }
}