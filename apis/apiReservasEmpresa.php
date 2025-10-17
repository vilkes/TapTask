<?php
header("Content-Type: application/json; charset=UTF-8");
include_once("../controladores/controladorReserva.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
try {
    // Verificar que el usuario esté logueado y sea proveedor
    if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] !== 'proveedor') {
        echo json_encode([
            "success" => false,
            "mensaje" => "Acceso no autorizado. Solo los proveedores pueden ver sus reservas."
        ]);
        exit;
    }

    $idEmpresa = $_SESSION['usuario_id'];

    $modeloReserva = new controladorReserva();
    $reservas = $modeloReserva->obtenerReservasPorEmpresa($idEmpresa);

    if ($reservas && count($reservas) > 0) {
        echo json_encode([
            "success" => true,
            "reservas" => $reservas
        ]);
    } else {
        echo json_encode([
            "success" => true,
            "reservas" => [],
            "mensaje" => "No tienes reservas aún."
        ]);
    }

} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "mensaje" => "Error al obtener reservas: " . $e->getMessage()
    ]);
}
?>
