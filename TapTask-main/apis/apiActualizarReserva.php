<?php
include '../conexion/conexion.php';

if (!isset($_POST['id']) || !isset($_POST['accion'])) {
    echo json_encode(['success' => false, 'message' => 'Datos incompletos.']);
    exit;
}

$id = (int)$_POST['id'];
$accion = $_POST['accion'];

try {
    $stmt = $pdo->prepare("SELECT * FROM reservas WHERE idreserva = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() === 0) {
        echo json_encode(['success' => false, 'message' => 'Reserva no encontrada.']);
        exit;
    }

    if ($accion === 'cancelar') {
        $update = $pdo->prepare("UPDATE reservas SET cancelacion = 1 WHERE idreserva = ?");
        $update->execute([$id]);
        echo json_encode(['success' => true, 'message' => 'Pedido cancelado con éxito.']);
    } elseif ($accion === 'completar') {
        $update = $pdo->prepare("UPDATE reservas SET confirmacion = 1 WHERE idreserva = ?");
        $update->execute([$id]);
        echo json_encode(['success' => true, 'message' => 'Pedido completado correctamente.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Acción no reconocida.']);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error interno: ' . $e->getMessage()]);
}
?>