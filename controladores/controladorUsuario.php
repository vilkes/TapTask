<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../modelos/modeloUsuario.php';
include '../modelos/modeloUsuarioCliente.php';
include '../modelos/modeloUsuarioTelefono.php';
include '../modelos/modeloUsuarioEmpresa.php';

// Verificar si llegaron los datos por POST



if ($_POST['form']=='Cliente'){
    $nombreUsuario = $_POST['nombreUsuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $reputacion = "Faltan datos suficientes";
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena'];
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

// Instancio las clases de los modelos correspondientes pasnado los parametros
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
            header('Location: ../vistas/vistaRegistroUsuario.html');
        } else {
            echo "El nombre de usuario o el email ya están registrados. Por favor usa otros.";
            exit;
        }
    }
}
$controladorCliente = new RegistrarCliente();
$controladorCliente->guardarUsuarioCliente($usuario,$usuarioTelefono,$usuarioCliente);


} elseif ($_POST['form']=='Empresa'){
    
    $nombreUsuario = $_POST['nombreEmpresa'];
    $empresaAsociada = $_POST['empresaAsociada'];
    $rut_nit_cuit = $_POST['RUT'];
    $email = strtolower($_POST['email']);
    $telefono = $_POST['telefono'];;
    $direccion = $_POST['direccion'];;
    $codigoPostal = $_POST['codigoPostal'];
    $rubro = $_POST['rubro'];
    $contrasena = $_POST['contrasena'];
    $nombreImagen = $_FILES['logo']['name'];
    $rutaTemporal = $_FILES['logo']['tmp_name'];
    $carpetaDestino = '../imagenesUsuarios/logosEmpresas/'; 
    $nombreUnico = uniqid() . "_" . basename($nombreImagen);
    $rutaFinal = $carpetaDestino . $nombreUnico;
    $cualificaciones = "si";

if (move_uploaded_file($rutaTemporal, $rutaFinal)) {
    $logo = $rutaFinal;
} else {
    $logo = null;
}
$usuario = new Usuario($nombreUsuario,$contrasena);
$usuarioTelefono = new UsuarioTelefono($telefono);
$usuarioEmpresa = new UsuarioEmpresa($empresaAsociada, $rut_nit_cuit,$direccion, $codigoPostal,$rubro,$logo,$cualificaciones);
class RegistrarEmpresa{
    public function guardarUsuarioEmpresa($usuario,$usuarioTelefono,$usuarioEmpresa){
         if (!$usuario->nombreUsuarioExiste($usuario->nombreUsuario)) {

            $idUsuario = $usuario->guardarUsuario();
            $_SESSION['id_usuario'] = $idUsuario;
            $usuarioTelefono->guardarTelefono($idUsuario);
            $usuarioEmpresa->guardarEmpresa($idUsuario);
        header('Location: ../vistas/vistaRegistroEmpresa.html');
        } else {
            echo "El nombre de usuario o el email ya están registrados. Por favor usa otros.";
            exit;
        }
    }
}
$controladorEmpresa = new RegistrarEmpresa();
$controladorEmpresa->guardarUsuarioEmpresa($usuario,$usuarioTelefono,$usuarioEmpresa);

}

$_SESSION['id_usuario']=$idInsertado;
?>