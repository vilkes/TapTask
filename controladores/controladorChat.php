<?php
require_once '../modelos/modeloChat.php';

class ControladorChat {
    private $chatModel;

    public function __construct() {
        $this->chatModel = new Chat();
    }

    public function crear($id1, $id2) {
        return $this->chatModel->crearChat($id1, $id2);
    }

    public function listar($iduser) {
        return $this->chatModel->obtenerChatsPorUsuario($iduser);
    }

    public function eliminar($idchat) {
        return $this->chatModel->eliminarChat($idchat);
    }
}