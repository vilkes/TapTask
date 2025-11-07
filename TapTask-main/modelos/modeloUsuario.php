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
    public function obtenerUsuarios() {
        $sql = "SELECT * FROM USUARIOS";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function actualizar($iduser, $datos) {
        $sql = "UPDATE USUARIOS SET nombreUsuario = :nombreUsuario WHERE iduser = :iduser";
        $stmt = $this->conexion->prepare($sql);
        $ok = $stmt->execute([
            ':nombreUsuario' => $datos['nombreUsuario'],
            ':iduser' => $iduser
        ]);
        return $ok; // true si se actualizó
    }
    public function eliminarUsuario($idUsuario) {
    try {
        $sql = "DELETE FROM USUARIOS WHERE iduser = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return ["success" => true, "message" => "Usuario eliminado correctamente"];
        } else {
            return ["success" => false, "message" => "No se encontró el usuario"];
        }
    } catch (PDOException $e) {
        return ["success" => false, "message" => "Error: " . $e->getMessage()];
    }
}   
    public function nombreUsuarioExisteUpdate($id,$nombreUsuario) {
        $sql = "SELECT COUNT(*) FROM USUARIOS WHERE nombreUsuario = :nombreUsuario AND iduser != :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':nombreUsuario' => $nombreUsuario,
                        ':id' =>$id]);
        return $stmt->fetchColumn() > 0;
    }
    public function actualizarUsuarioAdmin($iduser, $nombreUsuario) {
        if (!$nombreUsuario) return false;

        // Evita intentar actualizar con el mismo nombre
        $sqlCheck = "SELECT nombreUsuario FROM USUARIOS WHERE iduser = :iduser";
        $stmtCheck = $this->conexion->prepare($sqlCheck);
        $stmtCheck->execute([':iduser' => $iduser]);
        $actual = $stmtCheck->fetchColumn();

        if ($actual === $nombreUsuario) {
            return false; // No hay cambios reales
        }

        $sql = "UPDATE USUARIOS SET nombreUsuario = :nombreUsuario WHERE iduser = :iduser";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':nombreUsuario' => $nombreUsuario,
            ':iduser' => $iduser
        ]);

        return $stmt->rowCount() > 0; // Solo devuelve true si cambió algo
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

    public function cambiarContrasena($iduser, $contrasenaActual, $contrasenaNueva, $contrasenaNuevaConfirmar) {
        if ($contrasenaNueva !== $contrasenaNuevaConfirmar) {
            header('Location: ../vistas/pruebas.php');
            return;
        }
        $stmt = $this->conexion->prepare("SELECT contrasena FROM USUARIOS WHERE iduser = ?");
        $stmt->execute([$iduser]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$usuario) {
            header('Location: ../vistas/vistaRegistroUsuario.php');
           return;
        }
        if (!password_verify($contrasenaActual, $usuario['contrasena'])) {
            header('Location: ../vistas/pruebas.php');
            return;   
        }

        $nuevaHash = password_hash($contrasenaNueva, PASSWORD_BCRYPT);
        $update = $this->conexion->prepare("UPDATE USUARIOS SET contrasena = ? WHERE iduser = ?");
        $update->execute([$nuevaHash, $iduser]);
        header('Location: ../vistas/vistaPrincipal.php');
    }
}

?>