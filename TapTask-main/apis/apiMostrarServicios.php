<?php
require_once '../controladores/controladorServicio.php';
header('Content-Type: application/json');
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$controlador = new controladorServicio();
echo json_encode($controlador->listarServiciosCompletos());

?>