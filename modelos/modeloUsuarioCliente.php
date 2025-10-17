<?php 
include_once '../conexion/conexion.php';
class UsuarioCliente{
    

    public $nombre;
    public $apellido;
    public $fechanacimiento;
    public $fotoPerfil;
    public $email_cl;
    public $reputacion_cl;

    private $conexion;
    public function __construct(
    $nombre = null, $apellido = null, $fechanacimiento = null, $fotoPerfil = null, $email_cl = null, $reputacion_cl = null
) {
    global $pdo;
    $this->conexion = $pdo;

    if ($nombre !== null) {
        $this->nombre = $nombre;
    }
    if ($apellido !== null) {
        $this->apellido = $apellido;
    }
    if ($fechanacimiento !== null) {
        $this->fechanacimiento = $fechanacimiento;
    }
    if ($fotoPerfil !== null) {
        $this->fotoPerfil = $fotoPerfil;
    }
    if ($email_cl !== null) {
        $this->email_cl = $email_cl;
    }
    if ($reputacion_cl !== null) {
        $this->reputacion_cl = $reputacion_cl;
    }
}
    function guardarCliente ($id){

        $sql="INSERT INTO CLIENTES(iduser_clientes,nombre,apellido,fecha_nacimiento,foto_perfil,email_cl,reputacion_cl) 
              VALUES (:iduser_clientes,:nombre,:apellido,:fecha_nacimiento,:foto_perfil,:email_cl,:reputacion_cl)"; 
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':iduser_clientes'=>$id,
            ':nombre'=>$this->nombre,
            ':apellido'=>$this->apellido,
            ':fecha_nacimiento'=>$this->fechanacimiento,
            ':foto_perfil'=>$this->fotoPerfil,
            ':email_cl'=>$this->email_cl,
            ':reputacion_cl'=>$this->reputacion_cl
        ]);
    }

    public function extraerInformacionPorId($iduser) {
    $sql = "SELECT * FROM CLIENTES WHERE iduser_clientes = ?";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([$iduser]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
    public function emailExiste($email,$iduser=null){
        $sql = "SELECT COUNT(*) FROM CLIENTES WHERE email_cl=:email AND iduser_clientes != :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':email'=>$email,
            ':id' => $iduser
        ]);
        return $stmt->fetchColumn()>0;

    }

    public function modificarCliente($id,$nombre, $apellido,$fechaNacimiento){

        $sql = "UPDATE CLIENTES
        SET fecha_nacimiento = :fechaN,
        nombre = :nombre,
        apellido = :apellido
        WHERE iduser_clientes = :id";
        $stmt = $this->conexion->prepare($sql);
        $resultado = $stmt->execute([
            ':fechaN' => $fechaNacimiento,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':id'=>$id
        ]);
        return $resultado;

    }
        


}


?>