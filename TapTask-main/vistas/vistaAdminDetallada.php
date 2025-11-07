<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Vista Detallada</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      padding: 20px;
    }
    .card {
      background: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      max-width: 900px;
      margin: auto;
    }
    h1 {
      text-align: center;
      color: #333;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
    }
    th {
      background: #efefef;
    }
    img {
      max-width: 200px;
      border-radius: 10px;
      margin-top: 10px;
    }
    .volver {
      display: block;
      margin: 20px auto 0;
      width: fit-content;
      text-decoration: none;
      color: white;
      background: #007bff;
      padding: 10px 20px;
      border-radius: 6px;
    }
    .volver:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
<div class="card" id="detalleContainer">
  <h1>Cargando detalles...</h1>
</div>
<div class="card" id="detalleContainer">
  <h1>Cargando detalles...</h1>
</div>

<div style="text-align:center; margin-top:20px;">
  <button id="btnEditar" style="padding:10px 20px; border:none; background:#28a745; color:white; border-radius:6px;">Editar</button>
  <button id="btnGuardar" style="padding:10px 20px; border:none; background:#007bff; color:white; border-radius:6px; display:none;">Guardar</button>
  <button id="btnEliminar" style="padding:10px 20px; border:none; background:#dc3545; color:white; border-radius:6px; display:none;">Eliminar usuario</button>
</div>
<a class="volver" href="../vistas/vistaAdministrador.php">← Volver al panel</a>
<script src="../javascripts/appDetalleAdmin.js"></script>
</body>
</html>