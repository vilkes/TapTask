<?php
require_once '../controladores/controladorPerfilUsuario.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
header('Content-Type: application/json');
$iduser = $_SESSION['usuario_id'] ?? null;
if (!$iduser) {
    echo json_encode(["error" => "Usuario no autenticado"], JSON_UNESCAPED_UNICODE);
    exit;
}
$controlador = new controladorPerfilUsuario();
$datos = $controlador->obtenerDatosUsuarioCliente($iduser);
if (!$datos) {
    echo json_encode(["error" => "Usuario no encontrado"], JSON_UNESCAPED_UNICODE);
    exit;
}
echo json_encode($datos, JSON_UNESCAPED_UNICODE);