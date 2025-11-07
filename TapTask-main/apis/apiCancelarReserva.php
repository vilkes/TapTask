<?php
header("Content-Type: application/json; charset=UTF-8");
include_once("../controladores/controladorReserva.php");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["idreserva"])) {
    echo json_encode(["success" => false, "mensaje" => "Falta el ID de la reserva"]);
    exit;
}   

$idreserva = $data["idreserva"];

try {
    
    $controlador = new controladorReserva();
    $resultado = $controlador->cancelarReserva($idreserva);
    echo json_encode([
        "success" => $resultado,
        "mensaje" => $resultado ? "Reserva canceladada correctamente." : "No se pudo cancelar la reserva."
    ]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "mensaje" => $e->getMessage()]);
}
?>