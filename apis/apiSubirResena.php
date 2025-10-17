<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
} 
require_once '../controladores/controladorReseña.php';
header('Content-Type: application/json; charset=UTF-8');

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
$usuarioId = $_SESSION['usuario_id'] ?? null;
$servicioId = $data['servicioId'] ?? null;
$calificacion = $data['rating'] ?? null;
$contenido = $data['opinion'] ?? null;

if (!$usuarioId || !$servicioId || !$calificacion || !$contenido) {
    echo json_encode([
        'success' => false,
        'msg' => 'Faltan datos para guardar la resena.'
    ]);
    exit;
}

$controlador = new ControladorReseña();
$resultado = $controlador->crearReseña($usuarioId, $servicioId, $calificacion, $contenido);

if ($resultado) {
    echo json_encode([
        'success' => true,
        'msg' => 'Resena guardada correctamente.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'msg' => 'Error al guardar la resena en la base de datos.'
    ]);
}