<?php
require_once '../modelos/modeloChat.php';

class ControladorChat {
    private $modelo;

    public function __construct() {
        $this->modelo = new Chat();
    }

    public function crearChat($id1, $id2) {
        return $this->modelo->crearChat($id1, $id2);
    }

    public function obtenerChats($iduser) {
        return $this->modelo->obtenerChatsPorUsuario($iduser);
    }

    public function eliminarChat($idchat) {
        return $this->modelo->eliminarChat($idchat);
    }
}