<?php 
include_once '../conexion/conexion.php';
class UsuarioTelefono{
    
    public $telefono;

    private $conexion;
    function __construct($telefono){

        global $pdo;
        $this->conexion = $pdo;

        $this->telefono = $telefono;
    
    }

    function guardarTelefono ($id){

        $sql="INSERT INTO TELEFONOS(iduser_telefonos,telefonos) VALUES (:iduser_telefonos,:telefono)"; 
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':telefono'=>$this->telefono,
            ':iduser_telefonos'=>$sql
        ]);

    }


    public function extraerInformacionPorId($iduser) {
        $sql = "SELECT * FROM TELEFONOS WHERE iduser_telefonos = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$iduser]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
  }
    public static function telefonoUsuarioExiste($telefono) {
        $sql = "SELECT COUNT(*) FROM TELEFONOS WHERE telefonos = :telefono";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':telefono' => $telefono]);
        return $stmt->fetchColumn() > 0;
}


}


?>