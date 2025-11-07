<?php
header("Content-Type: application/json; charset=UTF-8");
include_once("../controladores/controladorReserva.php");

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data["idreserva"])) {
    echo json_encode(["success" => false, "mensaje" => "Falta el ID de la reserva"]);
    exit;
}
file_put_contents("debug_api.txt", print_r(file_get_contents("php://input"), true));
$idreserva = $data["idreserva"];
try {

    $controlador = new controladorReserva();
    $resultado = $controlador->confirmarReserva($idreserva);
    echo json_encode([
        "success" => $resultado,
        "mensaje" => $resultado ? "Reserva confirmada correctamente." : "No se pudo confirmar la reserva."
    ]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "mensaje" => $e->getMessage()]);
}
