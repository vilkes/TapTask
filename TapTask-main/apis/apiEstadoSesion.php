<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header('Content-Type: application/json');
if (isset($_SESSION['usuario_id'])) {
    echo json_encode([
        "logeado" => true,
        "usuario_id" => $_SESSION['usuario_id'],
        "tipo"       => $_SESSION['tipo']
    ]);
} else {
    echo json_encode([
        "logeado" => false
    ]);
}