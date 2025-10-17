<?php
require_once '../modelos/modeloMensaje.php';
require_once '../modelos/modeloEstado.php';

class ControladorMensaje {
    private $modeloMensaje;
    private $modeloEstado;

    public function __construct() {
        $this->modeloMensaje = new Mensaje();
        $this->modeloEstado = new Estado();
    }

    public function crearMensaje($idchat, $iduser, $contenido) {
        $idmensaje = $this->modeloMensaje->crearMensaje($idchat, $iduser, $contenido);
        $this->modeloEstado->crearEstado($idmensaje);
        return $idmensaje;
    }
    public function listarPorChat($idchat){
        return $this->modeloMensaje->obtenerMensajesPorChat($idchat);
    }

    public function obtenerMensajes($idchat) {
        return $this->modeloMensaje->obtenerMensajesPorChat($idchat);
    }

    public function eliminarMensaje($idmensaje) {
        $this->modeloEstado->marcarEliminado($idmensaje);
        return $this->modeloMensaje->eliminarMensaje($idmensaje);
    }

    public function marcarLeido($idmensaje) {
        $this->modeloEstado->marcarLeido($idmensaje);
    }
}