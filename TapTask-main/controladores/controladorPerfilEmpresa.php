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
    public function obtenerDatosUsuariosEmpresa() {
        $usuarios = $this->usuario->obtenerUsuarios();
        foreach ($usuarios as $u) {
        $id = $u['iduser'];

        $info = [];
        $info['usuario']   = $u;
        $info['empresa']   = $this->empresa->extraerInformacionPorId($id);
        $info['telefono']  = $this->telefono->extraerInformacionPorId($id);
        $info['ubicacion'] = $this->ubicacion->extraerInformacionPorId($id);

        $datos[] = $info;
    }
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
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'cambiarContrasena') {
            echo "entré a cambiar contrasena";
            $iduser = $_SESSION['usuario_id'] ?? null;
            $contrasenaActual = trim($_POST['contrasenaActual'] ?? '');
            $contrasenaNueva = trim($_POST['contrasenaNueva'] ?? '');
            $contrasenaNuevaConfirmar = trim($_POST['contrasenaNuevaConfirmar'] ?? '');

            if (!$iduser || $contrasenaActual === '' || $contrasenaNueva === '' || $contrasenaNuevaConfirmar === '') {
                return ["error" => "Todos los campos son obligatorios"];
            }
            return $this->usuario->cambiarContrasena($iduser, $contrasenaActual, $contrasenaNueva, $contrasenaNuevaConfirmar);
            header('Location: ../vistas/vistaPerfilUsuario.php');
    }  
}
}
$controladorUsuario = new controladorPerfilEmpresa();
if(isset($_POST['accion'])){
    if($_POST['accion']==='cambiarDatosUsuario'){
        $controlador->cambiarDatosUsuarios();
    } elseif($_POST['accion']==='cambiarContrasena'){
        $controlador->manejarCambioContrasena();
    }
}