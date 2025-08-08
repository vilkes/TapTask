<?php
include_once '../conexion/conexion.php';

class Usuario {
    public $nombreUsuario;
    public $hash;

    private $conexion;


    public function __construct($nombreUsuario, $contrasena) {
        global $pdo; 
        $this->conexion = $pdo; // Conexión a la base de datos


        $this->nombreUsuario = $nombreUsuario;
        $this->hash = password_hash($contrasena, PASSWORD_BCRYPT);
    }

    public function nombreUsuarioExiste($nombreUsuario) {
    $sql = "SELECT COUNT(*) FROM USUARIOS WHERE nombreUsuario = :nombreUsuario";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([':nombreUsuario' => $nombreUsuario]);
    return $stmt->fetchColumn() > 0;
}

    public function guardarUsuario() {
        if ($this->nombreUsuarioExiste($this->nombreUsuario)) {
        echo "El nombre de usuario ya está registrado. Por favor elija otro.";
        exit;
}
        $sql = "INSERT INTO USUARIOS (nombreUsuario,  contrasena) 
                VALUES (:nombreUsuario, :contrasena)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':nombreUsuario' => $this->nombreUsuario,
            ':contrasena' => $this->hash
        ]);
        return $this->conexion->lastInsertId();
    }

    public static function extraerInformacionPorId($iduser) {
        $sql = "SELECT * FROM USUARIOS WHERE iduser = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$iduser]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>