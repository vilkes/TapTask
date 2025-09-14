<?php
require_once '../modelos/modeloUbicacion.php';

header('Content-Type: application/json');

// Asegúrate de que el usuario esté logueado y tengas $iduser
session_start();
$iduser = $_SESSION['usuario_id'] ?? null;
if ($iduser) {
    $ubicacion = new Ubicacion();
    $datos = $ubicacion->extraerInformacionPorId($iduser);

    if ($datos) {
        echo json_encode([
            'success' => true,
            'direccion' => $datos['calle'] . ' ' . $datos['numero'] . ', ' . $datos['localidad'] . ', ' . $datos['departamento']
        ]);
    } else {
        echo json_encode(['success' => false, 'mensaje' => 'No se encontró la empresa']);
    }
} else {
    echo json_encode(['success' => false, 'mensaje' => 'Usuario no logueado']);
}
?>