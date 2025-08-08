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
    function __construct($nombre, $apellido,$fechanacimiento,$fotoPerfil,$email_cl,$reputacion_cl){

        global $pdo;
        $this->conexion = $pdo;

        $this->email_cl = $email_cl;
        $this->nombre = $nombre;  
        $this->apellido = $apellido;  
        $this->fechanacimiento = $fechanacimiento;  
        $this->fotoPerfil = $fotoPerfil;   
        $this->reputacion_cl = $reputacion_cl; 
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

    public static function extraerInformacionPorId($iduser) {
    $sql = "SELECT * FROM CLIENTES WHERE iduser_clientes = ?";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([$iduser]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }



}


?>