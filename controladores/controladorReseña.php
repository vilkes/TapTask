<?php
require_once '../modelos/modeloReseña.php';
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
class ControladorReseña{
    private $modeloReseña;

    public function __construct(){
        $this->modeloReseña = new Reseña();
    }

    public function crearReseña($usuarioId, $servicioId, $calificacion, $contenido) {
        $this->modeloReseña->setUsuarioId($usuarioId);
        $this->modeloReseña->setServicioId($servicioId);
        $this->modeloReseña->setCalificacion($calificacion);
        $this->modeloReseña->setContenido($contenido);
        return $this->modeloReseña->crearReseña();
    }
    public function obtenerReseñasPorServicio($servicioId) {
        $this->modeloReseña->setServicioId($servicioId);
        return $this->modeloReseña->obtenerReseñasPorServicio();
    }
}
?>