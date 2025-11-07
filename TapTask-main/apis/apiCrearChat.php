<?php
require_once '../controladores/controladorChat.php';
header('Content-Type: application/json');

$controlador = new ControladorChat();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $iduser1 = $data['iduser1'] ?? null;
        $iduser2 = $data['iduser2'] ?? null;

        if (!$iduser1 || !$iduser2) {
            echo json_encode(['success' => false, 'error' => 'Faltan parámetros']);
            exit;
        }

        $idchat = $controlador->crearChat($iduser1, $iduser2);
        echo json_encode(['success' => $idchat ? true : false, 'idchat' => $idchat]);
        break;

    case 'GET':
        if (isset($_GET['iduser'])) {
            $chats = $controlador->obtenerChats($_GET['iduser']);
            echo json_encode(['success' => true, 'chats' => $chats]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Falta iduser']);
        }
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        $idchat = $_DELETE['idchat'] ?? null;
        if (!$idchat) {
            echo json_encode(['success' => false, 'error' => 'Falta idchat']);
            exit;
        }

        $ok = $controlador->eliminarChat($idchat);
        echo json_encode(['success' => $ok]);
        break;

    default:
        echo json_encode(['success' => false, 'error' => 'Método no permitido']);
}