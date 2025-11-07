<?php
require_once '../conexion/conexion.php';

class ModeloAdministrador {
  private $conexion;

  public function __construct() {
    global $pdo;
    $this->conexion = $pdo;
  }

  public function extraerInformacionPorId($iduser) {
    $sql = "SELECT * FROM ADMINISTRADORES WHERE iduser_administradores = ?";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([$iduser]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }   
  public function obtenerDatosUsuariosAdministrador() {
      $sql = "SELECT * FROM ADMINISTRADORES";
      $stmt = $this->conexion->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>