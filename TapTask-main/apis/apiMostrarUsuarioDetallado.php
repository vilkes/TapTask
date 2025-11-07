<?php
if(session_status() === PHP_SESSION_NONE ) {
  session_start();
}
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once '../controladores/controladorPerfilUsuario.php';
header('Content-Type: application/json');
$controladorUsuarios = new controladorPerfilUsuario();
$idUsuario = $_GET['id'] ?? null;
if (!$idUsuario) {
  echo json_encode(["error" => "ID de usuario no proporcionado"]);
  exit;
}

$resultado = $controladorUsuarios->obtenerDatosUsuarioCliente($idUsuario);
echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
?>