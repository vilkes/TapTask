<?php
include_once '../conexion/conexion.php';

class UsuarioEmpresa {
    // Atributos públicos
    public $empresaAsociada;
    public $rut_nit_cuit;
    public $direccion;
    public $codigoPostal;
    public $rubro;
    public $logo;
    public $cualificaciones;
    public $reputacion_em;

    private $conexion;

    // Constructor
    public function __construct($empresaAsociada, $rut_nit_cuit,$direccion, $codigoPostal,$rubro,$logo,$cualificaciones,$reputacion_em) {
        global $pdo;
        $this->conexion = $pdo;

        // Asignamos los parámetros a los atributos
        $this->empresaAsociada = $empresaAsociada;
        $this->rut_nit_cuit = $rut_nit_cuit;
        $this->direccion = $direccion;
        $this->codigoPostal = $codigoPostal;
        $this->rubro = $rubro;
        $this->logo= $logo;
        $this->cualificaciones=$cualificaciones;
        $this->reputacion_em =$reputacin_em;
    }

    // Método para registrar una nueva empresa
    function guardarEmpresa($id) {
           try {


        $sql = "INSERT INTO PROVEEDOR (iduser_proveedor,reputacion_em,empresa_asociada, rut_nit_cuit,  direccion, codigo_postal, rubro_sector, foto_logo,cualificaciones)
                VALUES (:iduser_proveedor,:reputacion_em,:empresa_asociada, :rut_nit_cuit, :direccion, :codigoPostal, :rubro, :logo,:cualificaciones)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([
            ':iduser_proveedor_servicio'=> $id,
            ':reputacion_em'    => $this->reputacion_em,
            ':empresa_asociada' => $this->empresaAsociada,
            ':rut_nit_cuit'     => $this->rut_nit_cuit,
            ':direccion'        => $this->direccion,
            ':codigoPostal'     => $this->codigoPostal,
            ':rubro'            => $this->rubro,
            ':logo'             => $this->logo,
            ':cualificaciones'  => $this->cualificaciones
        ]);
    }catch (PDOException $e) {
        echo "Error al guardar empresa: " . $e->getMessage();
    }
    } 

    public static function extraerInformacionPorId($iduser) {
    $sql = "SELECT * FROM PROVEEDOR WHERE iduser_proveedor = ?";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([$iduser]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
?>