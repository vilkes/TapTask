<?php
require_once '../controladores/controladorResena.php';
header("Content-Type: application/json; charset=UTF-8");

$idServicio = $_GET['idServicio'] ?? null;

if (!$idServicio) {
    echo json_encode(["success" => false, "error" => "Falta idServicio"]);
    exit;
}
$controlador = new ControladorResena();
$ratings = $controlador->obtenerDistribucionSimple($idServicio);

echo json_encode(["success" => true, "ratings" => $ratings], JSON_UNESCAPED_UNICODE);