<?php
include_once '../conexion/conexion.php';

class Usuario {
    public $nombreUsuario;
    public $hash;

    private $conexion;


    public function __construct($nombreUsuario = null, $contrasena = null) {
    global $pdo; 
    $this->conexion = $pdo;

    if ($nombreUsuario !== null) {
        $this->nombreUsuario = $nombreUsuario;
    }

    if ($contrasena !== null) {
        $this->hash = password_hash($contrasena, PASSWORD_BCRYPT);
    }
}

    public function nombreUsuarioExiste($nombreUsuario) {
    $sql = "SELECT COUNT(*) FROM USUARIOS WHERE nombreUsuario = :nombreUsuario";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([':nombreUsuario' => $nombreUsuario]);
    return $stmt->fetchColumn() > 0;
}

    public function nombreUsuarioExisteUpdate($id,$nombreUsuario) {
    $sql = "SELECT COUNT(*) FROM USUARIOS WHERE nombreUsuario = :nombreUsuario AND iduser != :id";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([':nombreUsuario' => $nombreUsuario,
                    ':id' =>$id]);
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

    public function extraerInformacionPorId($iduser) {
        $sql = "SELECT * FROM USUARIOS WHERE iduser = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$iduser]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function cambiarNombreUsuariosUpdate($iduser,$nombreUsuario){
        $usuarioExiste = $this->nombreUsuarioExiste($iduser,$nombreUsuario);
        if ($usuarioExiste){
            return false;
        }
        $sql = "UPDATE USUARIOS
        SET nombreUsuario = :nombreUsuario
        WHERE iduser = :iduser";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
        ':nombreUsuario' => $nombreUsuario,
        ':iduser' => $iduser
    ]);
        return true;
    }

    public function cambiarContrasena($iduser, $contraseñaActual, $contraseñaNueva, $contraseñaNuevaConfirmar) {
        if ($contraseñaNueva !== $contraseñaNuevaConfirmar) {
            header('Location: ../vistas/pruebas.php');
            return;
        }
        $stmt = $this->conexion->prepare("SELECT contrasena FROM USUARIOS WHERE iduser = ?");
        $stmt->execute([$iduser]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$usuario) {
            header('Location: ../vistas/vistaRegistroUsuario.html');
           return;
        }
        if (!password_verify($contraseñaActual, $usuario['contrasena'])) {
            header('Location: ../vistas/pruebas.html');
            return;   
        }

        $nuevaHash = password_hash($contraseñaNueva, PASSWORD_BCRYPT);
        $update = $this->conexion->prepare("UPDATE USUARIOS SET contrasena = ? WHERE iduser = ?");
        $update->execute([$nuevaHash, $iduser]);
        header('Location: ../vistas/vistaPrincipal.html');
    }
}

?>