<?php

include_once '../controladores/controladorServicio.php';
$controlador = new controladorServicio();

// Endpoint simple: si se llama con ?accion=listar
$accion = $_GET['accion'] ?? '';
if ($accion === 'listar') {
    $controlador->listarServicios();
} elseif ($accion === 'obtener') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $controlador->obtenerServicio($id);
    } else {
        echo json_encode(['error' => 'Falta el parámetro id']);
    }
} else {
    echo json_encode(['error' => 'Accion no definida']);
}
?>