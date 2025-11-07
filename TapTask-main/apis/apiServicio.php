<?php

include_once '../controladores/controladorServicio.php';
include_once '../controladores/controladorPerfilUsuario.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
$controladorServicio = new controladorServicio();
$controladorPerfilUsuario = new controladorPerfilUsuario();
$accion = $_GET['accion'] ?? '';
if ($accion === 'listar') {
    $controladorServicio->listarServicios();
} elseif ($accion === 'obtener') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $datos = [];
        $servicio = $controladorServicio->obtenerServicio($id);
        $usuario = $controladorPerfilUsuario->extraerInformacionPorId($servicio['iduser_servicio']);
        $datos['servicio'] = $servicio;
        $datos['usuario'] = $usuario;
        if ($servicio) {
            echo json_encode($datos); // devolvé JSON válido
        } else {
            echo json_encode(['error' => 'Servicio no encontrado']);
        }
    } else {
        echo json_encode(['error' => 'Falta el parámetro id']);
    }
}
?>