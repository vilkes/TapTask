<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once '../controladores/controladorServicio.php';
header('Content-Type: application/json');
$controladorServicios = new controladorServicio();
$idServicio = $_GET['id'] ?? null;
if (!$idServicio) {
  echo json_encode(["error" => "ID de servicio no proporcionado"]);
  exit;
}

$resultado = $controladorServicios->obtenerServicio($idServicio);
if ($resultado === null) {
  echo json_encode(["error" => "Servicio no encontrado"]);
} else {
  echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
}

?>