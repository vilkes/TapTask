<?php
header("Content-Type: application/json");

// Conexión a la BD
$pdo = new PDO("mysql:host=localhost;dbname=tu_base;charset=utf8", "usuario", "clave");

// Verificar si pasaron el departamento
if (!isset($_GET["departamento"])) {
    echo json_encode([]);
    exit;
}

$departamento = $_GET["departamento"];

// Buscar localidades según el departamento
$stmt = $pdo->prepare("SELECT id_localidad, nombre FROM localidades WHERE departamento = ?");
$stmt->execute([$departamento]);
$localidades = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver en JSON
echo json_encode($localidades);