<?php
session_start();
if(isset($_SESSION['mensaje'])){
    echo "<b><p style='color:darkgreen; text-align:center;'>" . $_SESSION['mensaje'] . "</p></b>";
    unset($_SESSION['mensaje']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro Usuario</title>
  <link rel="stylesheet" href="../css/stylesUsuario.css" />
 
</head>
<body>
  <div class="header">
  <img src="../imagenesGNRL/PNGs/taptaskPNGwhite.png" alt="Logo" class="logo" />
</div>
  <div class="container">
    <div class="registro-card">
      <div class="form-section">
        <div class="form-wrapper">
          <h2>Registrar usuario</h2>
          <form id="form" action="../controladores/controladorUsuario.php" method="post" enctype="multipart/form-data">
            <input id="nombreUsuario" name="nombreUsuario" type="text" placeholder="Nombre de usuario" required />
            <input id="nombre" name="nombre" type="text" placeholder="Nombre" required />
            <input id="apellido" name="apellido" type="text" placeholder="Apellido" required />
            <input id="fechaNacimiento" name="fechaNacimiento" type="date" required />
            <input id="telefono" name="telefono" type="tel" placeholder="Teléfono" pattern="[0-9]{9}" required autocomplete/>
            <input id="email" name="email" type="email" placeholder="Email" required autocomplete>
            <input id="contrasena" name="contrasena" type="password" placeholder="Contraseña" required />
            <label for="file-input" class="file-label">Subir foto de perfil</label>
            <input name="fotoPerfil" accept="image/*" type="file" id="file-input" hidden>
            <input name="form" type="hidden" value="Cliente">
            <button type="submit">Registrarse</button>
            
          </form>

          <div class="login-link">
            ¿Ya tienes una cuenta? <a href="vistaInicioSesion.php">Iniciar sesión</a>
          </div>
        </div>
      </div>
      <div class="visual-section">
        <div class="graphic">
          <h3>¡Bienvenido!</h3>
          <p>Descubrí nuevas oportunidades con tu perfil</p>
          <img src="imgs/2.png" alt="Personaje" class="personaje"/>
        </div>
      </div>
    </div>
  </div>
  <div class="tailer">
  <img src="../imagenesGNRL/PNGs/copyright.png" alt="Copy" class="copy">
</div>
<script src="../javascripts/appValidaciones.js"></script>
</body>
</html>