<?php
require_once '../controladores/controladorPerfilUsuario.php';
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'] ?? null;
$tipo = $data['tipo'] ?? null;
$datos = $data['datos'] ?? [];

if (!$id || !$tipo) {
    echo json_encode(["error" => "Faltan datos"], JSON_UNESCAPED_UNICODE);
    exit;
}

// Convertir "null" string a null real
foreach ($datos as $k => $v) {
    if ($v === "null") $datos[$k] = null;
}

$controlador = new controladorPerfilUsuario();
$resultado = false;

switch ($tipo) {
    case "usuario":
        $resultado = $controlador->actualizarUsuarioPorAdmin($id, $datos);
        break;
    default:
        echo json_encode(["error" => "Tipo desconocido"]);
        exit;
}

if ($resultado) {
    echo json_encode(["success" => true], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["error" => "No se pudo actualizar"], JSON_UNESCAPED_UNICODE);
}