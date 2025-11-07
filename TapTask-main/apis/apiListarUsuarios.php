<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../controladores/controladorPerfilEmpresa.php';
require_once '../controladores/controladorPerfilUsuario.php';
require_once '../controladores/controladorAdministrador.php';
header('Content-Type: application/json');

$controladorCliente = new controladorPerfilUsuario();
$controladorEmpresa = new controladorPerfilEmpresa();
$controladorAdministrador = new controladorAdministrador();

$resultado = [
    "clientes" => $controladorCliente->obtenerDatosUsuariosCliente(),
    "empresas" => $controladorEmpresa->obtenerDatosUsuariosEmpresa(),
    "administrador" => $controladorAdministrador->obtenerDatosUsuariosAdministrador()
];

echo json_encode($resultado);
?>