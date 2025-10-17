<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reservas de la Empresa</title>
  <link rel="stylesheet" href="../css/stylesReservas.css">
</head>
<body>
  <h1>Reservas Recibidas</h1>
  <div class="card-reserva" id="contenedorReservas"></div>
  <script src="../javascripts/appReservas.js"></script>  
</body>
</html>