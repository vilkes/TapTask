<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

require_once '../controladores/controladorMensaje.php';
$controlador = new ControladorMensaje();

$idchat = $_GET['idchat'] ?? null;
$ultimo = $_GET['ultimo'] ?? 0;

while (true) {
    $mensajes = $controlador->listarPorChat($idchat);
    $nuevos = array_filter($mensajes, fn($m) => $m['idmensajes'] > $ultimo);

    if ($nuevos) {
        echo "data: " . json_encode(array_values($nuevos)) . "\n\n";
        ob_flush();
        flush();
        $ultimo = end($nuevos)['idmensajes'];
    }

    sleep(2);
}