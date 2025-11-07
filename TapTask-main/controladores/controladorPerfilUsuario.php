<?php
require_once '../modelos/modeloUsuario.php';
require_once '../modelos/modeloUsuarioCliente.php';
require_once '../modelos/modeloUsuarioTelefono.php';
require_once '../modelos/modeloUsuarioEmpresa.php';
require_once '../modelos/modeloUbicacion.php';
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
class controladorPerfilUsuario {
    private $usuario;
    private $cliente;
    private $telefono;
    private $ubicacion; 

    public function __construct() {
        $this->usuario  = new Usuario();
        $this->cliente  = new UsuarioCliente();
        $this->telefono = new UsuarioTelefono();
        $this->ubicacion = new Ubicacion();
    }

    public function extraerInformacionPorId($iduser) {
        return $this->usuario->extraerInformacionPorId($iduser);
    }
    public function obtenerDatosUsuarioCliente($iduser) {
        $datos = [];
        $datos['usuario']  = $this->usuario->extraerInformacionPorId($iduser);
        $datos['cliente']  = $this->cliente->extraerInformacionPorId($iduser);
        $datos['telefono'] = $this->telefono->extraerInformacionPorId($iduser);
        $datos['ubicacion']= $this->ubicacion->extraerInformacionPorId($iduser);

        return $datos;
    }
    public function eliminarUsuarioControlador($idUsuario) {
    return $this->usuario->eliminarUsuario($idUsuario);
}
    public function actualizarUsuarioPorAdmin($iduser, $datos) {
        $resultado = false;
        $contrasena = $datos['contrasena'] ?? null;
        if ($contrasena === null) unset($datos['contrasena']);
        if (!empty($datos['nombreUsuario'])) {
            $ok1 = $this->usuario->actualizar($iduser, $datos);
            if (!$ok1) return false;
            $resultado = true;
        }
        $nombre   = $datos['nombre'] ?? null;
        $apellido = $datos['apellido'] ?? null;
        $fechaNacimiento = $datos['fechaNacimiento'] ?? null;
        if ($nombre || $apellido || $fechaNacimiento) {
            $ok2 = $this->cliente->modificarCliente($iduser, $nombre, $apellido, $fechaNacimiento);
            if (!$ok2) return false;
            $resultado = true;
        }
        // Actualizar teléfono
        $telefono = $datos['telefono'] ?? null;
        if ($telefono) {
            $ok3 = $this->telefono->cambiarTelefono($iduser, $telefono);
            if ($ok3 === false) return false; // teléfono duplicado
            $resultado = true;
        }
        return $resultado;
    }

    public function actualizarUsuarioSeguro($iduser, $datos) {
    $resultado = false;

    // Campos editables
    $nombreUsuario = $datos['nombreUsuario'] ?? null;
    $nombre        = $datos['nombre'] ?? null;
    $apellido      = $datos['apellido'] ?? null;
    $fechaNacimiento = $datos['fecha_nacimiento'] ?? null;
    $foto          = $datos['foto_perfil'] ?? null;
    $telefono      = $datos['telefonos'] ?? null;
    $reputacion    = $datos['reputacion_cl'] ?? null;
    if ($nombreUsuario) {
        $ok = $this->usuario->actualizarUsuarioAdmin($iduser, $nombreUsuario);
        if ($ok) $resultado = true;
    }
    if ($nombre || $apellido || $fechaNacimiento || $foto) {
        $ok = $this->cliente->modificarClienteCompleto($iduser, $nombre, $apellido, $fechaNacimiento, $foto);
        if ($ok) $resultado = true;
    }
    if ($telefono) {
        $ok = $this->telefono->cambiarTelefono($iduser, $telefono);
        if ($ok !== false) $resultado = true;
    }
    if ($reputacion !== null) {
        $stmt = $this->usuario->conexion->prepare(
            "UPDATE CLIENTES SET reputacion_cl = :reputacion WHERE iduser_clientes = :iduser"
        );
        $ok = $stmt->execute([
            ':reputacion' => $reputacion,
            ':iduser' => $iduser
        ]);
        if ($ok) $resultado = true;
    }

    return $resultado;
}
    public function obtenerDatosUsuariosCliente() {
        $usuarios = $this->usuario->obtenerUsuarios();
        foreach ($usuarios as $u) {
        $id = $u['iduser'];

        $info = [];
        $info['usuario']   = $u;
        $info['cliente']   = $this->cliente->extraerInformacionPorId($id);
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
$controlador = new controladorPerfilUsuario();
if(isset($_POST['accion'])){
    if($_POST['accion']==='cambiarDatosUsuario'){
        $controlador->cambiarDatosUsuarios();
    } elseif($_POST['accion']==='cambiarContrasena'){
        $controlador->manejarCambioContrasena();
    }
}