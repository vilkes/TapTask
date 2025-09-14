<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../modelos/modeloUsuario.php';
include '../modelos/modeloUsuarioCliente.php';
include '../modelos/modeloUsuarioTelefono.php';
include '../modelos/modeloUsuarioEmpresa.php';
include '../modelos/modeloUbicacion.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form'])) {
if ($_POST['form']=='Cliente'){
    $nombreUsuario = $_POST['nombreUsuario'];
    $nombre = trim($_POST['nombre']);
    $apellido = $_POST['apellido'];
    $email = trim($_POST['email']);
    $reputacion = "Faltan datos suficientes";
    $telefono = $_POST['telefono'];
    $contrasena = trim($_POST['contrasena']);
    $fechaNacimiento = $_POST['fechaNacimiento'];

    
    if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK) {
    $nombreImagen = $_FILES['fotoPerfil']['name'];
    $rutaTemporal = $_FILES['fotoPerfil']['tmp_name'];
    $carpetaDestino = '../imagenesUsuarios/fotoPerfil/'; 
    $nombreUnico = uniqid() . "_" . basename($nombreImagen);
    $rutaFinal = $carpetaDestino . $nombreUnico;

        if (move_uploaded_file($rutaTemporal, $rutaFinal)) {
            $rutaImagen = $rutaFinal;
        } else {
            $rutaImagen = null;
        }
        } else {
            $rutaImagen = null;
        }       
$usuario = new Usuario($nombreUsuario,$contrasena);
$usuarioTelefono = new UsuarioTelefono($telefono);
$usuarioCliente = new UsuarioCliente($nombre, $apellido, $fechaNacimiento,$rutaFinal,$email,$reputacion);

class RegistrarCliente {
    public function guardarUsuarioCliente($usuario, $usuarioTelefono, $usuarioCliente) {
        if (!$usuario->nombreUsuarioExiste($usuario->nombreUsuario)) {
            $idUsuario = $usuario->guardarUsuario();
            $_SESSION['id_usuario'] = $idUsuario;
            $usuarioTelefono->guardarTelefono($idUsuario);
            $usuarioCliente->guardarCliente($idUsuario);
            
        } else {
            echo "El nombre de usuario ya está registrado, por favor usa otro.";
            exit;
        }
        header('Location: ../vistas/vistaRegistroUsuario.html');
    }
}
$controladorCliente = new RegistrarCliente();
$controladorCliente->guardarUsuarioCliente($usuario,$usuarioTelefono,$usuarioCliente);


} elseif ($_POST['form']=='Empresa'){
    $departamento = $_POST['departamento'];
    $localidad = $_POST['localidadBarrio'];
    $barrio = $_POST['localidadBarrio'];
    $calle = ucfirst($_POST['calle']);
    $numero = $_POST['numero'];
    $nombreUsuario = $_POST['nombreEmpresa'];
    $empresaAsociada = $_POST['empresaAsociada'];
    $rut = $_POST['RUT'];
    $email = strtolower($_POST['email']);
    $telefono = $_POST['telefono'];
    $codigoPostal = $_POST['codigoPostal'];
    $rubro = $_POST['rubro'];
    $contrasena = $_POST['contrasena'];
    $cualificaciones = "";
    $reputacion_em = "Faltan datos suficientes";
    $historial = "Faltan datos suficientes";
    $nombreImagen = $_FILES['logo']['name'];
    $rutaTemporal = $_FILES['logo']['tmp_name'];
    $carpetaDestino = '../imagenesUsuarios/logosEmpresas/'; 
    $nombreUnico = uniqid() . "_" . basename($nombreImagen);
    $rutaFinal = $carpetaDestino . $nombreUnico;
    if (move_uploaded_file($rutaTemporal, $rutaFinal)) {
        $logo = $rutaFinal;
    } else {
        $logo = null;
    }
$usuario = new Usuario($nombreUsuario,$contrasena);
$usuarioTelefono = new UsuarioTelefono($telefono);
$usuarioEmpresa = new UsuarioEmpresa($empresaAsociada,$historial, $rut,$email, $codigoPostal,$rubro,$logo,$cualificaciones,$reputacion_em);
$ubicacion = new Ubicacion($departamento,$localidad,$barrio,$calle,$numero);

class RegistrarEmpresa{
    public function guardarUsuarioEmpresa($usuario,$usuarioTelefono,$usuarioEmpresa,$ubicacion){
         if (!$usuario->nombreUsuarioExiste($usuario->nombreUsuario)) {
            $idUsuario = $usuario->guardarUsuario();
            $_SESSION['id_usuario'] = $idUsuario;
            $usuarioTelefono->guardarTelefono($idUsuario);
            $ubicacion->identificarBarrioLocalidad();
            $ubicacion->guardarUbicacion($idUsuario);
            $usuarioEmpresa->guardarEmpresa($idUsuario);
            header('Location: ../vistas/vistaInicioSesion.html');
        } else {
            echo "El nombre de usuario o el email ya están registrados. Por favor usa otros.";
            exit;
        }
    }
}
$controladorEmpresa = new RegistrarEmpresa();
$controladorEmpresa->guardarUsuarioEmpresa($usuario,$usuarioTelefono,$usuarioEmpresa,$ubicacion);

}
} else {
    echo "Acceso no válido";
    exit;
}


?>