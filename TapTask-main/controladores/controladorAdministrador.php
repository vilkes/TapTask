<?php
require_once '../modelos/modeloAdministrador.php';
class controladorAdministrador {
    private $modelo;

    public function __construct() {
        $this->modelo = new ModeloAdministrador();
    }

    public function obtenerAdministradorPorId($iduser) {
        return $this->modelo->extraerInformacionPorId($iduser);
    }
    public function obtenerDatosUsuariosAdministrador() {
        return $this->modelo->obtenerDatosUsuariosAdministrador();
    }
}
?>