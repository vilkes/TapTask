<?php
require_once '../modelos/modeloPerfilUsuario.php';
require_once '../modelos/modeloPerfilUsuarioCliente.php';
require_once '../modelos/modeloPerfilUsuarioEmail.php';
require_once '../modelos/modeloPerfilUsuarioTelefono.php';
require_once '../modelos/modeloPerfilUsuarioEmpresa.php';

session_start();

class controladorPerfilUsuario {
    private $usuario;
    private $cliente;
    private $email;
    private $telefono;

    public function __construct() {
        $this->usuario  = new perfilUsuario();
        $this->cliente  = new perfilUsuarioCliente();
        $this->email    = new perfilUsuarioEmail();
        $this->telefono = new perfilUsuarioTelefono();
    }

    public function obtenerDatosUsuarioCliente($iduser) {
        $datos = [];

        $datos['usuario']  = $this->usuario->extraerInformacionPorId($iduser);
        $datos['cliente']  = $this->cliente->extraerInformacionPorId($iduser);
        $datos['email']    = $this->email->extraerInformacionPorId($iduser);
        $datos['telefono'] = $this->telefono->extraerInformacionPorId($iduser);

        return $datos;

    }
}
?>