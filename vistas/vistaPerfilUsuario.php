<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perfil de Usuario - Taptask</title>
  <link rel="stylesheet" href="../css/stylesPerfilUsuarios.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>
<body>
  <div class="header">
    <a href="vistaPaginaPrincipal.php">
      <img src="../imagenesGNRL/PNGs/taptaskPNGwhite.png" alt="Logo" class="logo" />
    </a>
  </div>
  <nav class="menu-navegacion">
    <label>Gestión de cuenta</label>
    <ul>
      <li><a href="#taptask-ID">Taptask ID</a></li>
      <li><a href="#seccion-personal">Información personal</a></li>
      <li><a href="#seccion-localidad">Localidad</a></li>
      <li><a href="#seccion-password">Contraseña</a></li>
    </ul>
  </nav>
  <!-- Contenido principal -->
  <main class="perfil-wrapper">
  <form id="form-de-group" action="../controladores/controladorPerfilUsuario.php" method="POST">
    <input type="hidden" name="accion" value="cambiarDatosUsuario">
    <section id="taptask-ID" class="perfil-contenedor">
      <div class="avatar-section">
        <div class="avatar">
          <img id="fotoPerfil" alt="Avatar" />
        </div>
        <p class="upload-instruction">Sube tu foto de perfil aquí</p>
        <label for="foto" class="file-label">Seleccionar archivo</label>
        <input type="file" id="foto" style="display:none;" />
      </div>
      <div class="form-section">
        <h2>Taptask ID</h2>
          <div class="form-row">
            <div class="form-group">
              <label>Nombre de Usuario</label>
              <input name="nombreUsuario" id="nombreUsuario" type="text" placeholder="" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input disabled name="email" id="email" type="email" placeholder="" />
            </div>
          </div>
      </div>
    </section>
    <!-- Sección Información personal -->
    <section id="seccion-personal" class="perfil-contenedor personal-container">
      <div class="form-section">
        <h2>Información personal</h2>
          <div class="form-row">
            <div class="form-group">
              <label>Nombre</label>
              <input name="nombre" id="nombre" type="text" placeholder="" />
            </div>
            <div class="form-group">
              <label>Apellido</label>
              <input name="apellido" id="apellido" type="text" placeholder="" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Fecha de nacimiento</label>
              <input name="fechaNacimiento" id="fechaNacimiento" type="date" />
            </div>
            <div class="form-group">
              <label>Teléfono</label>
              <input name="telefono" id="telefono" type="text" />
            </div>
          </div>
      </div>
    </section>
    <!-- Sección Localidad -->
    <section id="seccion-localidad" class="perfil-contenedor localidad-container">
      <div class="form-section">
        <h2>Localidad (De momento no está disponible)</h2>
          <div class="form-row">
            <div class="form-group">
              <label>Departamento</label>
              <select name="departamento" id="departamento">
                <option value="">-- Selecciona un departamento --</option>
              </select>
            </div>
            <div class="form-group">
              <label>Localidad / Barrio</label>
              <select id="localidadBarrio" name="localidadBarrio" id="localidad">
                <option value="">-- Selecciona una localidad --</option>
              </select>
            </div>
          </div>
            <div class="form-row">
            <div class="form-group">
              <label>Calle</label>
              <input name="calle" id="calle" type="text" placeholder="" />
            </div>          
            <div class="form-group">
              <label>Numero de puerta</label>
              <input name="numero" id="numero" type="text" placeholder="(No obligatorio)" />
            </div>          
        </div>
              <button type="submit"  class="guardar">Guardar cambios</button>
          </div>
      </div>
    </section>
  </form>
    <!-- Sección Contraseña -->
    <section id="seccion-password" class="perfil-contenedor password-container">
      <div class="form-section">
        <h2>Cambiar contraseña</h2>
        <form method="POST" action="../controladores/controladorPerfilUsuario.php">
          <div class="form-row">
            <div class="form-group">
              <label>Contraseña actual</label>
              <input name="contraseñaActual" type="password" placeholder="" />
            </div>
            <div class="form-group">
              <label>Contraseña nueva</label>
              <input name="contraseñaNueva" type="password" placeholder="" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Confirmar constraseña nueva</label>
              <input name="contraseñaNuevaConfirmar" type="password" placeholder="" />
            </div>
          </div>
          <input name="accion" value="cambiarContraseña" type="hidden">
          <div class="form-buttons">
            <button type="submit"  class="guardar">Guardar cambios</button>
          </div>
        </form>
      </div>
    </section>
   

    <script src="../javascripts/appPerfilUsuario.js"></script>
    <div class="tailer">
      <img src="../imagenesGNRL/PNGs/copyright.png" alt="Copy" class="copy">
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/papaparse@5.3.2/papaparse.min.js"></script>
  <script>
    let data = [];

    // 🔹 Leemos el CSV desde la ruta del servidor
    Papa.parse("../assets/localidades-29-7nm.csv", { // <-- poné la ruta correcta
      download: true,   // ⚡ obligatorio para leer desde URL
      header: true,
      skipEmptyLines: true,
      complete: function(results) {
        data = results.data; 
        cargarDepartamentos(data);
      }
    });
    function cargarDepartamentos(datos) {
      const depSelect = document.getElementById("departamento");
      const departamentos = [...new Set(datos.map(item => item.departamento))]; // únicos

      departamentos.forEach(dep => {
        let option = document.createElement("option");
        option.value = dep;
        option.textContent = dep;
        depSelect.appendChild(option);
      });
    }
    document.getElementById("departamento").addEventListener("change", function() {
      const locSelect = document.getElementById("localidadBarrio");
      locSelect.innerHTML = "<option value=''>-- Selecciona una localidad --</option>";

      const depSeleccionado = this.value;
      const localidades = data
        .filter(item => item.departamento === depSeleccionado)
        .map(item => item.localidad);

      localidades.forEach(loc => {
        let option = document.createElement("option");
        option.value = loc;
        option.textContent = loc;
        locSelect.appendChild(option);
      });
    });
  </script>
  <script src="../javascripts/appPerfilUsuario.js"></script>
  <script src="../javascripts/appValidaciones.js"></script>
  <script src="../javascripts/appEstadoSesion.js"></script>
</body>
</html>