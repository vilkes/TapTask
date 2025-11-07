<?php
require_once '../modelos/modeloReporteP.php';

class ControladorReporteP {
    private $modelo;

    public function __construct() {
        $this->modelo = new ReporteP();
    }

    public function crearReporte($tipoReporte, $contenido, $idProveedor, $idUser) {
        $resultado = $this->modelo->crearReporte($tipoReporte, $contenido, $idProveedor, $idUser);
    
        if (is_array($resultado) && isset($resultado["error"])) {
            return ["success" => false, "msg" => $resultado["error"]];
        }
        if ($resultado) {
            return ["success" => true, "msg" => "Reporte guardado correctamente."];
        } else {
            return ["success" => false, "msg" => "Error al guardar el reporte."];
        }
    }

    public function obtenerReporteUsuarios() {
        return $this->modelo->obtenerReporteUsuarios();
    }

    public function obtenerReporteVentas($fechaInicio, $fechaFin) {
        return $this->modelo->obtenerReporteVentas($fechaInicio, $fechaFin);
    }
}
?>