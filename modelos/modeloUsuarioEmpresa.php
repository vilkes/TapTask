<?php
include_once '../conexion/conexion.php';

class UsuarioEmpresa {
    public $empresaAsociada;
    public $rut;
    public $codigoPostal;
    public $rubro;
    public $logo;
    public $cualificaciones;
    public $reputacion_em;
    public $idUbicacion;
    public $email;
    public $historial;

    private $conexion;

    public function __construct($empresaAsociada=null,$historial=null, $rut=null,$email=null, $codigoPostal=null,$rubro=null,$logo=null,$cualificaciones=null,$reputacion_em=null, $idUbicacion=null) {
        global $pdo;
        $this->conexion = $pdo;

        if ($empresaAsociada !== null) {
            $this->empresaAsociada = $empresaAsociada;
        }
        if($email !== null){
            $this->email = $email;
        }
        if ($rut !== null) {
            $this->rut = $rut;
        }
        if( $codigoPostal !== null) {
            $this->codigoPostal = $codigoPostal;
        }
        if ($rubro !== null) {
            $this->rubro = $rubro;
        }

        if ($historial !== null) {
            $this->historial = $historial;
        }
        if ($logo !== null) {
            $this->logo = $logo;
        }
        if ($cualificaciones !== null) {
            $this->cualificaciones = $cualificaciones;
        }
        if ($reputacion_em !== null) {
            $this->reputacion_em = $reputacion_em;
        }
        if ($idUbicacion !== null) {
            $this->idUbicacion = $idUbicacion;
        }
    }

    // Método para registrar una nueva empresa
    function guardarEmpresa($id) {
        $sql = "INSERT INTO PROVEEDOR (iduser_proveedor,reputacion_em,empresa_asociada,historial, rut, codigo_postal, rubro_sector, foto_logo,cualificaciones,idubicacion_proveedor,email_em)
                VALUES (:iduser_proveedor,:reputacion_em,:empresa_asociada, :historial, :rut, :codigoPostal, :rubro, :logo,:cualificaciones,:idubicacion_proveedor, :email_em)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ':iduser_proveedor'=> $id,
            ':reputacion_em'    => $this->reputacion_em,
            ':empresa_asociada' => $this->empresaAsociada,
            ':rut'     => $this->rut,
            ':codigoPostal'     => $this->codigoPostal,
            ':rubro'            => $this->rubro,
            ':logo'             => $this->logo,
            ':historial'        => $this->historial,
            ':email_em'        => $this->email,
            ':cualificaciones'  => $this->cualificaciones,
            ':idubicacion_proveedor' => $id
        ]);

    } 

    public function extraerInformacionPorId($iduser) {
    $sql = "SELECT * FROM PROVEEDOR WHERE iduser_proveedor = ?";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([$iduser]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>