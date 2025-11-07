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
            
            if ($usuario['tipo'] === 'administrador') {
                $_SESSION['rol_admin'] = $usuario['tipo_admin']; // moderador, tecnico, etc.
            }
            switch ($usuario['tipo']) {
                case 'cliente':
                    header("Location: ../vistas/vistaListarServicios.php");
                    break;
                case 'proveedor':
                    header("Location: ../vistas/vistaPublicacionServicio.php");
                    break;
                case 'administrador':
                    switch ($usuario['tipo_admin']) {
                        case 'admin':
                            header("Location: ../vistas/vistaAdministrador.php");
                            break;
                        case 'moderador':
                            header("Location: ../vistas/vistaModerador.php");
                            break;
                        case 'soporte':
                            header("Location: ../vistas/vistaSoporte.php");
                            break;
                        default:
                            header("Location: ../index.php");
                            break;
                    }
                    break;
                default:
                    header("Location: ../index.php");
                    break;
            }
            exit;
        } else {
            return "Email o contrasena incorrectos.";
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