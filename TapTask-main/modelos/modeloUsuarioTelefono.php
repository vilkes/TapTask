<?php
include_once '../conexion/conexion.php';

class UsuarioTelefono {
    public $telefono;
    private $conexion;

    function __construct($telefono = null) {
        global $pdo;
        $this->conexion = $pdo;

        if ($telefono !== null) {
            $this->telefono = $telefono;
        }
    }

    // 🟩 Inserta un telefono nuevo para un usuario
    function guardarTelefono($id) {
        $sql = "INSERT INTO TELEFONOS (iduser_telefonos, telefonos)
                VALUES (:iduser_telefonos, :telefono)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ':telefono' => $this->telefono,
            ':iduser_telefonos' => $id
        ]);
    }

    // 🟨 Actualiza el telefono, o lo inserta si no existe
    public function cambiarTelefono($id, $telefono) {
        if (!$telefono) return false;

        // Verificar si el usuario ya tiene un telefono
        $sqlCheck = "SELECT COUNT(*) FROM TELEFONOS WHERE iduser_telefonos = :iduser";
        $stmtCheck = $this->conexion->prepare($sqlCheck);
        $stmtCheck->execute([':iduser' => $id]);
        $existe = $stmtCheck->fetchColumn() > 0;

        // Si el número ya lo tiene otro usuario, no permitir duplicado
        $sqlDup = "SELECT COUNT(*) FROM TELEFONOS WHERE telefonos = :telefono AND iduser_telefonos != :iduser";
        $stmtDup = $this->conexion->prepare($sqlDup);
        $stmtDup->execute([':telefono' => $telefono, ':iduser' => $id]);
        if ($stmtDup->fetchColumn() > 0) {
            return false; // ya existe ese telefono en otro usuario
        }

        if ($existe) {
            // Actualiza el telefono del usuario
            $sql = "UPDATE TELEFONOS
                    SET telefonos = :telefono
                    WHERE iduser_telefonos = :iduser";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([':telefono' => $telefono, ':iduser' => $id]);
            return $stmt->rowCount() > 0;
        } else {
            // Inserta un nuevo telefono si no tenía
            $sql = "INSERT INTO TELEFONOS (iduser_telefonos, telefonos)
                    VALUES (:iduser, :telefono)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([':iduser' => $id, ':telefono' => $telefono]);
            return true;
        }
    }

    // Obtener info del telefono del usuario
    public function extraerInformacionPorId($iduser) {
        $sql = "SELECT * FROM TELEFONOS WHERE iduser_telefonos = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$iduser]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>