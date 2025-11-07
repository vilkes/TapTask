<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
} 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración</title>
  <link rel="stylesheet" href="../css/stylesPanelAdmin.css">
</head>
<body>
  <div class="panel">
    <aside class="sidebar">
      <h2>Panel Admin</h2>
        <button id="btnUsuarios">👤 Usuarios</button>
        <button id="btnServicios">🛠 Servicios</button>
    </aside>

    <main class="contenido">
      <div id="contenido">
        <h3>Bienvenido al panel, administrador.</h3>
        <p>Selecciona una sección del menú para comenzar.</p>
      </div>
    </main>
  </div>

  <script src="../javascripts/appPanelAdministrador.js"></script>
</body>
</html>