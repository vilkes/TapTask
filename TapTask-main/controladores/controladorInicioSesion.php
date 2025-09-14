<?php
require_once '../modelos/modeloInicioSesion.php';

class controladorInicioSesion {
    private $modelo;

    public function __construct() {
        $this->modelo = new modeloInicioSesion();
    }

    public function login($email, $contrasena) {
        $usuario = $this->modelo->buscarUsuarioPorEmail($email);

        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['iduser'];
            $_SESSION['tipo']   = $usuario['tipo'];

            if ($usuario['tipo'] === 'cliente') {
                header("Location: ../vistas/vistaListarServicios.html");
            } else {
                header("Location: ../vistas/vistaPublicacionServicio.html");
            }
            exit;
        } else {
            return "Email o contraseña incorrectos.";
        }
    }
}

// 👉 Se instancia y se usa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador = new ControladorInicioSesion();
    $mensaje = $controlador->login($_POST['email'], $_POST['contrasena']);

    if ($mensaje) echo $mensaje;
}
?>