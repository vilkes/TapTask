<?php
require_once '../conexion/conexion.php';

class modeloInicioSesion {
    private $conexion;

    public function __construct(){
        global $pdo;
        $this->conexion = $pdo;
    }

    public function buscarUsuarioPorEmail($email) {
        // 1. Buscar en clientes
        $sql = "SELECT u.iduser, u.contrasena, 'cliente' AS tipo
                FROM CLIENTES c
                INNER JOIN USUARIOS u ON c.iduser_clientes = u.iduser
                WHERE c.email_cl = :email";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario) return $usuario;
        // 2. Si no se encuentra, buscar en proveedores
        $sql = "SELECT u.iduser, u.contrasena, 'proveedor' AS tipo
                FROM PROVEEDOR p
                INNER JOIN USUARIOS u ON p.iduser_proveedor = u.iduser
                WHERE p.email_em = :email";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario ?: null;
    }
}
?>