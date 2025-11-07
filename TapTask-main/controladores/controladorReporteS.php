<?php
require_once '../modelos/modeloReporteS.php';

class ControladorReporteS {
    private $modelo;

    public function __construct() {
        $this->modelo = new ReporteS();
    }

    public function crearReporte($tipoReporte, $contenido, $idServicio, $idUser) {
        $this->modelo->crearReporte($tipoReporte, $contenido, $idServicio, $idUser);
    }

    public function obtenerReporteUsuarios() {
        return $this->modelo->obtenerReporteUsuarios();
    }

    public function obtenerReporteVentas($fechaInicio, $fechaFin) {
        return $this->modelo->obtenerReporteVentas($fechaInicio, $fechaFin);
    }
}
?>