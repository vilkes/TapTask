<?php
require_once '../conexion/conexion.php';

class ReporteP {
    private $conexion;

    public function __construct() {
        global $pdo;
        $this->conexion = $pdo;
    }

    public function crearReporte($tipoReporte, $contenido, $idProveedor, $idUser) {
        try {
            $sql = "INSERT INTO REPORTES_P (iduser_reportado, iduser_reportes, tipo, contenido, solucion)
                    VALUES (:idproveedor_report, :iduser_reportes, :tipo, :contenido, :solucion)";
            $stmt = $this->conexion->prepare($sql);
            $exito = $stmt->execute([
                ':idproveedor_report' => $idProveedor,
                ':iduser_reportes' => $idUser,
                ':tipo' => $tipoReporte,
                ':contenido' => $contenido,
                ':solucion' => "Pendiente"
            ]);
    
            if ($exito) {
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                return ["error" => "Error al ejecutar la consulta: " . $errorInfo[2]];
            }
        } catch (PDOException $e) {
            return ["error" => "Excepción capturada: " . $e->getMessage()];
        }
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