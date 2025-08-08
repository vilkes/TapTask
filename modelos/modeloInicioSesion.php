<?php
require_once '../conexion/conexion.php';

class modeloInicioSesion {
    private $conexion;

    public function __construct(){
        global $pdo;
        $this->conexion = $pdo;
    }

    public function verificarUsuario($email, $contrasena){

    
        // Consulta actualizada con JOIN para obtener el hash de contraseña y más
        $sql = 'SELECT U.iduser, U.nombreUsuario, U.contrasena, C.email_cl
                FROM USUARIOS U
                JOIN CLIENTES C ON U.iduser = C.iduser_clientes
                WHERE C.email_cl = :email';

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

       if (!$usuario) {
        error_log("Usuario con email $email no encontrado en la base de datos.");
        return false;
    }
        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            return $usuario;
        } else {
            return false;
        }
    }
}
?>