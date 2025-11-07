<?php
require_once '../modelos/modeloResena.php';
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
class ControladorResena{
    private $modeloResena;

    public function __construct(){
        $this->modeloResena = new Resena();
    }

    public function crearResena($usuarioId, $servicioId, $calificacion, $contenido) {
        $this->modeloResena->setUsuarioId($usuarioId);
        $this->modeloResena->setServicioId($servicioId);
        $this->modeloResena->setCalificacion($calificacion);
        $this->modeloResena->setContenido($contenido);
        return $this->modeloResena->crearResena();
    }
    public function obtenerResenasPorServicio($servicioId) {
        $this->modeloResena->setServicioId($servicioId);
        return $this->modeloResena->obtenerResenasPorServicio();
    }
    public function obtenerCalificaciones($servicioId) {
        $this->modeloResena->setServicioId($servicioId);
        return $this->modeloResena->obtenerCalificaciones();
    }
    public function obtenerDistribucionSimple($servicioId) {
    $this->modeloResena->setServicioId($servicioId);
    $calificaciones = $this->modeloResena->obtenerCalificacionesPorServicio();
    $ratings = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
    foreach ($calificaciones as $valor) {
        $valor = (int)$valor;
        if (isset($ratings[$valor])) {
            $ratings[$valor]++;
        }
    }
    return $ratings;
}
}
?>