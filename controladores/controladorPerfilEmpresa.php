<?php
require_once '../modelos/modeloUsuario.php';
require_once '../modelos/modeloUsuarioTelefono.php';
require_once '../modelos/modeloUsuarioEmpresa.php';
require_once '../modelos/modeloUbicacion.php';

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

class controladorPerfilEmpresa {
    private $usuario;
    private $empresa;
    private $telefono;
    private $ubicacion; 

    public function __construct() {
        $this->usuario  = new Usuario();
        $this->empresa  = new UsuarioEmpresa();
        $this->telefono = new UsuarioTelefono();
        $this->ubicacion = new Ubicacion();
    }

    public function obtenerDatosUsuarioEmpresa($iduser) {
        $datos = [];

        $datos['usuario']  = $this->usuario->extraerInformacionPorId($iduser);
        $datos['empresa']  = $this->empresa->extraerInformacionPorId($iduser);
        $datos['telefono'] = $this->telefono->extraerInformacionPorId($iduser);
        $datos['ubicacion']= $this->ubicacion->extraerInformacionPorId($iduser);
        return $datos;
    }

   public function cambiarDatosUsuarios(){
    echo "entré a funcion cambiar datos usuario";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $idUsuario = $_SESSION['usuario_id'] ?? null;
        if (!$idUsuario) {
            echo "Usuario no logueado.";
            exit;
        }
        $nombreUsuario = $_POST['nombreUsuario'] ?? '';
        $nombre = trim($_POST['nombre'] ?? '');
        $apellido = $_POST['apellido'] ?? '';
        $fechaNacimiento = $_POST['fechaNacimiento'] ?? '';
        $telefono = trim($_POST['telefono'] ?? '');
        $departamento = $_POST['departamento'] ?? '';
        $localidad = $_POST['localidadBarrio'] ?? '';
        $barrio = $_POST['localidadBarrio'] ?? '';
        $calle =$_POST['calle'] ?? '';
        $numero = trim($_POST['numero'] ?? '');
        echo "hola $nombre, $nombreUsuario, $fechaNacimiento, $telefono,$apellido";
        if ($nombreUsuario !== '') {
            echo "antes de controlador cambiar";
            $resultado = $this->usuario->cambiarNombreUsuariosUpdate($idUsuario, $nombreUsuario);
            if (!$resultado) {
                echo "El nombre de usuario ya existe. Por favor elige otro.";
                exit;
            }
        }
        if ($nombre !== '' || $apellido !== '' || $fechaNacimiento !== '') {
            $resultado = $this->cliente->modificarCliente($idUsuario, $nombre, $apellido, $fechaNacimiento);
            if (!$resultado) {
                echo "El email ya está registrado por otro usuario.";
                exit;
            }
        }
        if ($telefono !== '') {
            $resultado = $this->telefono->cambiarTelefono($idUsuario, $telefono);
            if ($resultado === false) {
                echo "El teléfono ya está registrado en otro usuario.";
                exit;
            }

        }
    }
} 

   public function manejarCambioContrasena() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'cambiarContraseña') {
            echo "entré a cambiar contraseña";
            $iduser = $_SESSION['usuario_id'] ?? null;
            $contraseñaActual = trim($_POST['contraseñaActual'] ?? '');
            $contraseñaNueva = trim($_POST['contraseñaNueva'] ?? '');
            $contraseñaNuevaConfirmar = trim($_POST['contraseñaNuevaConfirmar'] ?? '');

            if (!$iduser || $contraseñaActual === '' || $contraseñaNueva === '' || $contraseñaNuevaConfirmar === '') {
                return ["error" => "Todos los campos son obligatorios"];
            }
            return $this->usuario->cambiarContrasena($iduser, $contraseñaActual, $contraseñaNueva, $contraseñaNuevaConfirmar);
            header('Location: ../vistas/vistaPerfilUsuario.php');
    }  
}
}
$controladorUsuario = new controladorPerfilEmpresa();
if(isset($_POST['accion'])){
    if($_POST['accion']==='cambiarDatosUsuario'){
        $controlador->cambiarDatosUsuarios();
    } elseif($_POST['accion']==='cambiarContraseña'){
        $controlador->manejarCambioContrasena();
    }
}