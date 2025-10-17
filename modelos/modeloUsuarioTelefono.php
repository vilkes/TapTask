    <?php 
include_once '../conexion/conexion.php';
class UsuarioTelefono{
    
    public $telefono;

    private $conexion;
    function __construct($telefono=null){

        global $pdo;
        $this->conexion = $pdo;

        if ($telefono !== null)
        $this->telefono = $telefono;
    
    }
    function guardarTelefono ($id){

        $sql="INSERT INTO TELEFONOS(iduser_telefonos,telefonos) VALUES (:iduser_telefonos,:telefono)"; 
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':telefono'=>$this->telefono,
            ':iduser_telefonos'=>$id
        ]); 
    }
    public function cambiarTelefono($id, $telefono){
    $telefonoExiste = $this->telefonoUsuarioExiste($telefono);
    if ($telefonoExiste){
        return false;
    }
    $sql = "UPDATE TELEFONOS
            SET telefonos = :telefono
            WHERE iduser_telefonos = :iduserTelefono";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([
        ':iduserTelefono' => $id,
        ':telefono' => $telefono
    ]);
    return true;
}


    public function extraerInformacionPorId($iduser) {
        $sql = "SELECT * FROM TELEFONOS WHERE iduser_telefonos = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$iduser]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
  }
    public function telefonoUsuarioExiste($telefono) {
        $sql = "SELECT COUNT(*) FROM TELEFONOS WHERE telefonos = :telefono";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':telefono' => $telefono]);
        return $stmt->fetchColumn() > 0;
}


}


?>