<?php
require_once '../modelos/modeloUbicacion.php';
require_once '../controladores/controladorPerfilEmpresa.php';

header('Content-Type: application/json');

// Asegúrate de que el usuario esté logueado y tengas $iduser
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$iduser = $_SESSION['usuario_id'] ?? null;
if ($iduser) {
    $controlador = new controladorPerfilEmpresa();
    $datos = $controlador->obtenerDatosUsuarioEmpresa($iduser);

    if ($datos) {
        echo json_encode([
            'success' => true,
            'usuario' => $datos['usuario'],
            'empresa' => $datos['empresa'],
            'telefono' => $datos['telefono'],
            'ubicacion' => $datos['ubicacion'],
            'direccion' => ($datos['ubicacion']['calle'] ?? '') . ' ' . ($datos['ubicacion']['numero'] ?? '') . ', ' .
                   ($datos['ubicacion']['localidad'] ?? '') . ', ' . ($datos['ubicacion']['departamento'] ?? '')
        ]);
    } else {
        echo json_encode(['success' => false, 'mensaje' => 'No se encontró la empresa']);
    }
} else {
    echo json_encode(['success' => false, 'mensaje' => 'Usuario no logueado']);
}
?>