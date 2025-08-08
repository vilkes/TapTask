<?php
require_once '../modelos/modeloInicioSesion.php';

class controladorInicioSesion {
    private $usuarioModelo;

    public function __construct(){
        $this->usuarioModelo = new modeloInicioSesion();
    }

    public function ingreso($email, $contrasena){
        $usuario = $this->usuarioModelo->verificarUsuario($email, $contrasena);
        
        if ($usuario) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['iduser'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['nombre_usuario'] = $usuario['nombreUsuario'];

            header('Location: ../vistas/vistaPerfilUsuario.php'); 
        } else {
            echo "Usuario o contraseña incorrectos";
           
        }
    }
}

// Procesar formulario POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower($_POST['email'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';

    $controlador = new controladorInicioSesion();
    $controlador->ingreso($email, $contrasena);
}
?>