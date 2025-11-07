<?php
require_once '../controladores/controladorPerfilUsuario.php';
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Acceso no válido"]);
    exit;
}

// Leer el cuerpo JSON
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["id"])) {
    echo json_encode(["success" => false, "message" => "Falta el ID"]);
    exit;
}

$id = $data["id"];

// Llamar al controlador
$controlador = new ControladorPerfilUsuario();
$resultado = $controlador->eliminarUsuarioControlador($id);

if ($resultado) {
    echo json_encode(["success" => true, "message" => "Usuario eliminado"]);
} else {
    echo json_encode(["success" => false, "message" => "No se pudo eliminar"]);
}