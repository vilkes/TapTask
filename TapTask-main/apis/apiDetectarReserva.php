<?php
include '../conexion/conexion.php';

try {
    $stmt = $pdo->query("SELECT idreserva, iduser_reserva, idservice_reserva, disponibilidad, fecha_inicio, fecha_final, cancelacion, confirmacion FROM reservas ORDER BY fecha_inicio DESC");
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $hoy = new DateTime();
    $data = [];

    foreach ($reservas as $r) {
        $fechaInicio = new DateTime($r['fecha_inicio']);
        $fechaFinal = new DateTime($r['fecha_final'] ?? $r['fecha_inicio']);

        $cancelado = (int)$r['cancelacion'] === 1;
        $confirmado = (int)$r['confirmacion'] === 1;

        // Determinar el estado del pedido
        if ($cancelado) {
            $estado = 'cancelado';
        } elseif ($confirmado) {
            $estado = 'completado';
        } elseif ($fechaInicio <= $hoy && $hoy <= $fechaFinal && !$cancelado && !$confirmado) {
            $estado = 'en_curso';
        } elseif ($hoy > $fechaFinal && !$confirmado && !$cancelado) {
            $estado = 'retrasado';
        } else {
            $estado = 'pendiente';
        }

        $data[] = [
            'idreserva' => $r['idreserva'],
            'user' => "Usuario #{$r['iduser_reserva']}",
            'product' => "Servicio #{$r['idservice_reserva']}",
            'date' => substr($r['fecha_inicio'], 0, 10),
            'fecha_final' => $r['fecha_final'],
            'estado' => $estado,
            'time' => substr($r['fecha_inicio'], 11, 5)
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($data);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>