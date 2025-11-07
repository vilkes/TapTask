<?php
require_once '../controladores/controladorMensaje.php';
header('Content-Type: application/json');
ini_set('display_errors', 0);
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $idchat = $data['idchat'] ?? null;
    $iduser = $data['emisor'] ?? null;
    $contenido = $data['texto'] ?? '';
    if (!$idchat || !$iduser || !$contenido) {
        echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
        exit;
    }

    $controlador = new ControladorMensaje();
    $idmensaje = $controlador->crearMensaje($idchat, $iduser, $contenido);

    if ($idmensaje) {
        echo json_encode([
            'success' => true,
            'mensaje' => [
                'idmensajes' => $idmensaje,
                'contenido' => $contenido,
                'iduser_mensajes' => $iduser,
                'nombreUsuario' => 'Tú',
                'idchat' => $idchat
            ]
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => 'No se pudo crear el mensaje']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No conectado a POST']);
}