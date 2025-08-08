<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perfil de Usuario - Taptask</title>
  <link rel="stylesheet" href="stylesPerfilUsuario.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>
<body>
  <div class="header">
    <img src="../imagenesGNRL/PNGs/taptaskPNGwhite.png" alt="Logo" class="logo" />
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

  <main class="perfil-wrapper">
    <section id="taptask-ID" class="perfil-contenedor">
      <div class="avatar-section">
        <div class="avatar">
          <img src="../imagenesGNRL/defaultprofilepic.png" alt="Avatar" />
        </div>
        <p class="upload-instruction">Sube tu foto de perfil aquí</p>
        <label for="foto" class="file-label">Seleccionar archivo</label>
        <input type="file" id="foto" style="display:none;" />
      </div>
      <div class="form-section">
        <h2>Taptask ID</h2>
        <form>
          <div class="form-row">
            <div class="form-group">
              <label>Nombre de Usuario</label>
              <input type="text" placeholder="" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" placeholder="" />
            </div>
          </div>
          <div class="form-buttons">
            <button type="submit" class="guardar">Guardar cambios</button>
          </div>
        </form>
      </div>
    </section>

    <section id="seccion-personal" class="perfil-contenedor personal-container">
      <div class="form-section">
        <h2>Información personal</h2>
        <form>
          <div class="form-row">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="" />
            </div>
            <div class="form-group">
              <label>Apellido</label>
              <input type="text" placeholder="" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Fecha de nacimiento</label>
              <input type="date"/>
            </div>
            <div class="form-group">
              <label>Teléfono</label>
              <input type="text" placeholder="" />
            </div>
          </div>
          <div class="form-buttons">
            <button type="submit" class="guardar">Guardar cambios</button>
          </div>
        </form>
      </div>
    </section>

    <section id="seccion-localidad" class="perfil-contenedor localidad-container">
            <div class="form-section">
        <h2>Localidad</h2>
        <form>
            <div class="form-row">
            <div class="form-group">
              <label>Departamento</label>
              <input type="text" placeholder="" />
            </div>
            <div class="form-group">
              <label>Barrio</label>
              <input type="text" placeholder="" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Calle</label>
              <input type="text" placeholder="" />
            </div>
            <div class="form-group">
              <label>Número de puerta</label>
              <input type="text" placeholder="" />
            </div>
            </div>
          <div class="form-row">
            <div class="form-group">
              <label>Número de apartamento</label>
              <input type="text" placeholder="(No obligatorio)" />
            </div>
            </div>
            <div class="form-row">
            <div class="form-group">
            <div class="form-buttons">
            <button type="submit" class="guardar">Guardar cambios</button>
          </div>
          </div>
        </div>
    </section>

    <section id="seccion-password" class="perfil-contenedor password-container">
      <div class="form-section">
        <h2>Cambiar contraseña</h2>
        <form>
          <div class="form-row">
            <div class="form-group">
              <label>Contraseña antigua</label>
              <input type="password" placeholder="" />
            </div>
            <div class="form-group">
              <label>Contraseña nueva</label>
              <input type="password" placeholder="" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Confirmar constraseña nueva</label>
              <input type="password" placeholder="" />
            </div>
          </div>
          <div class="form-buttons">
            <button type="submit" class="guardar">Guardar cambios</button>
          </div>
        </form>
      </div>
    </section>
    <div class="tailer">
  <img src="../imagenesGNRL/PNGs/copyright.png" alt="Copy" class="copy">
</div>
  </main>
</body>
</html>