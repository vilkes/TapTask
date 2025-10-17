<?php
header("Content-Type: application/json; charset=UTF-8");
include_once("../controladores/controladorReserva.php");

$data = json_decode(file_get_contents("php://input"), true);
<<<<<<< HEAD

=======
file_put_contents("debug_api.txt", print_r($data, true));
>>>>>>> b7ede9e (Avances en chat)
if (!isset($data["idreserva"])) {
    echo json_encode(["success" => false, "mensaje" => "Falta el ID de la reserva"]);
    exit;
}
<<<<<<< HEAD

$idreserva = $data["idreserva"];

try {
    
=======
file_put_contents("debug_api.txt", print_r(file_get_contents("php://input"), true));
$idreserva = $data["idreserva"];
try {

>>>>>>> b7ede9e (Avances en chat)
    $controlador = new controladorReserva();
    $resultado = $controlador->confirmarReserva($idreserva);
    echo json_encode([
        "success" => $resultado,
        "mensaje" => $resultado ? "Reserva confirmada correctamente." : "No se pudo confirmar la reserva."
    ]);
} catch (Exception $e) {
<<<<<<< HEAD
    echo json_encode(["success" => false, "mensaje" => $e->getMessage()]);
}
=======
    echo json_encode(["succ ess" => false, "mensaje" => $e->getMessage()]);
}
>>>>>>> b7ede9e (Avances en chat)
