<?php
require_once '../controladores/controladorMensaje.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $idchat = $data['idchat'] ?? null;
    $iduser = $data['emisor'] ?? null;
    $contenido = $data['texto'] ?? '';

    if (!$idchat || !$iduser || !$contenido) {
        echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
        exit;
    }

    $controlador = new ControladorMensajes();
    $ok = $controlador->enviar($idchat, $iduser, $contenido);

    echo json_encode(['success' => $ok]);
}