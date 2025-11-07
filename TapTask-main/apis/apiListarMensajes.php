<?php
require_once '../controladores/controladorMensaje.php';
header('Content-Type: application/json');

$idchat = $_GET['idchat'] ?? null;

if (!$idchat) {
    echo json_encode(['success' => false, 'error' => 'Falta idchat']);
}
$controlador = new ControladorMensaje();
$mensajes = $controlador->listarPorChat($idchat);
echo json_encode(['success' => true, 'mensajes' => $mensajes]);