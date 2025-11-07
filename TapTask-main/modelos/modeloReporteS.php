<?php
require_once '../conexion/conexion.php';

class ReporteS {
    private $conexion;

    public function __construct() {
        global $pdo;
        $this->conexion = $pdo;
    }

    public function crearReporte($tipoReporte,$contenido,$idServicio,$idUser) {
        $sql ="INSERT INTO REPORTES_S (idservicio_report, iduser_reportes, tipo, contenido, solucion) VALUES (:idservicio_report, :iduser_reportes, :tipo, :contenido, :solucion)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':idservicio_report' => $idServicio,
            ':iduser_reportes' => $idUser,
            ':tipo' => $tipoReporte,
            ':contenido' => $contenido,
            ':solucion' => "Pendiente"
        ]);
    }
    public function obtenerReporteUsuarios() {
        $sql = "SELECT id, nombre, email, fecha_registro FROM usuarios";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerReporteVentas($fechaInicio, $fechaFin) {
        $conn = $this->conexion->getConexion();
        $sql = "SELECT id, producto, cantidad, total, fecha_venta FROM ventas WHERE fecha_venta BETWEEN :fechaInicio AND :fechaFin";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fechaInicio', $fechaInicio);
        $stmt->bindParam(':fechaFin', $fechaFin);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>