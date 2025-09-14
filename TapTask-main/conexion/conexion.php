<?php

try {
    $usuario = 'root';
    $contrasena = '';
    $pdo = new PDO('mysql:host=localhost;dbname=TapTaskServiceDB', $usuario, $contrasena);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

?>