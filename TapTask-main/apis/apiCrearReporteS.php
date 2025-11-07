<?php
require_once '../controladores/controladorReporteS.php';
header('Content-Type: application/json');

$controlador = new ControladorReporteS();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipoReporte = $_POST['tipoReporte'] ?? '';
    $contenido = $_POST['contenido'] ?? '';
    $idServicio = $_POST['idServicio'] ?? '';
    $idUser = $_POST['idUser'] ?? '';

    if (empty($tipoReporte) || empty($contenido) || empty($idServicio) || empty($idUser)) {
        echo json_encode(["success" => false, "error" => "Faltan datos para crear el reporte"]);
        exit;
    }

    $exito = $controlador->crearReporte($tipoReporte, $contenido, $idServicio, $idUser);

    if ($exito) {
        echo json_encode(["success" => true, "message" => "Reporte de servicio creado correctamente"]);
    } else {
        echo json_encode(["success" => false, "error" => "Error al crear el reporte"]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Método no permitido"]);
}
?>