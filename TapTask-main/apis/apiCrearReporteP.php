<?php
require_once '../controladores/controladorReporteP.php';
header('Content-Type: application/json');

$controlador = new ControladorReporteP();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipoReporte = $_POST['tipoReporte'] ?? '';
    $contenido = $_POST['contenido'] ?? '';
    $idProveedor = $_POST['idProveedor'] ?? '';
    $idUser = $_POST['idUser'] ?? '';

    if (empty($tipoReporte) || empty($contenido) || empty($idProveedor) || empty($idUser)) {
        echo json_encode(["success" => false, "error" => "Faltan datos para crear el reporte"]);
        exit;
    }

    $exito = $controlador->crearReporte($tipoReporte, $contenido, $idProveedor, $idUser);

    if ($exito) {
        echo json_encode(["success" => true, "message" => "Reporte de proveedor creado correctamente"]);
    } else {
        echo json_encode(["success" => false, "error" => "Error al crear el reporte"]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Método no permitido"]);
}
?>