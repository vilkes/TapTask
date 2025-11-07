<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="../css/stylesPerfilEmpresa2.css">
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/stylesPaginaPrincipal.css">
    <style data-tag="reset-style-sheet">
    html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;  -webkit-font-smoothing: antialiased;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  appearance: button;  color: #000000;  background-color: #80FF44;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}details {  display: block;  margin: 0;  padding: 0;}summary::-webkit-details-marker {  display: none;}[data-thq="accordion"] [data-thq="accordion-content"] {  max-height: 0;  overflow: hidden;  transition: max-height 0.3s ease-in-out;  padding: 0;}[data-thq="accordion"] details[data-thq="accordion-trigger"][open] + [data-thq="accordion-content"] {  max-height: 1000vh;}details[data-thq="accordion-trigger"][open] summary [data-thq="accordion-icon"] {  transform: rotate(180deg);}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }
      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background: var(--dl-color-gray-white);
        fill: var(--dl-color-gray-black);
      }
    </style>
    <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css"
    />
</head>
<body>
  <header class="header-header">
        <navbar-wrapper class="navbar-wrapper" rootclassname="navbarundefined">
          <!--Navbar component-->
          <header class="navbar-navbar navbarroot-class-name">
    <?php
// Verificamos usando los mismos datos que tu API
$logeado = isset($_SESSION['usuario_id']);

$tipo = $_SESSION['tipo'] ?? null;

if ($logeado) {
    include 'vistaHeaderModificado.php';
} else {
    include 'vistaHeaderDefault.php';
}
?>
</header>
</navbar-wrapper>
</header>
<body>
  <div class="perfil-layout">
  <nav class="menu-navegacion">
    <label>Gestión de cuenta</label>
    <ul>
      <li><a href="#taptask-ID">Taptask ID</a></li>
      <li><a href="#seccion-personal">Información personal</a></li>
      <li><a href="#seccion-localidad">Localidad</a></li>
      <li><a href="#seccion-password">Contrasena</a></li>
      <li><a href="vistaAgendaProveedores.php">Agenda de pedidos</a></li>
    </ul>
  </nav>

  <!-- Contenido principal -->
  <main class="perfil-wrapper">
  <form id="form-de-group">
    <!-- Sección Taptask ID -->
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
              <label>Nombre de fantasía</label>
              <input id="nombreUsuario" type="text" placeholder="" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input id="email" type="email" placeholder="" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
            <label>Razón social</label>
              <input id="razonSocial" type="text" placeholder="" />
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
              <label>RUT</label>
              <input id="nombre" type="text" placeholder="" />
            </div>
            <div class="form-group">
              <label>Rubro</label>
              <input id="Rubro" type="text" placeholder="" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Fecha de nacimiento</label>
              <input id="fechaNacimiento" type="date" />
            </div>
            <div class="form-group">
              <label>Teléfono</label>
              <input id="telefono" type="text" />
            </div>
          </div>
      </div>
    </section>

    <!-- Sección Localidad -->
    <section id="seccion-localidad" class="perfil-contenedor localidad-container">
      <div class="form-section">
        <h2>Localidad (De momento no está disponible)</h2>
          <div class="form-row">
            <select id="departamento">
              <option value="">-- Selecciona un departamento --</option>
              <option value="Montevideo">Montevideo</option>
              <option value="Canelones">Canelones</option>
            </select>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Localidad / Barrio</label>
              <select id="localidad">
                <option value="">-- Selecciona una localidad --</option>
              </select>
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
              
            </div>
          </div>
          <div class="form-buttons">
            <button type="submit" class="guardar">Guardar cambios</button>
          </div>
      </div>
    </section>
  </form>

    <!-- Sección Contrasena -->
    <section id="seccion-password" class="perfil-contenedor password-container">
      <div class="form-section">
        <h2>Cambiar contrasena</h2>
        <form method="POST" action="../controladores/controladorPerfilUsuario.php">
          <div class="form-row">
            <div class="form-group">
              <label>Contrasena actual</label>
              <input name="contrasenaActual" type="password" placeholder="" />
            </div>
            <div class="form-group">
              <label>Contrasena nueva</label>
              <input name="contrasenaNueva" type="password" placeholder="" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Confirmar constrasena nueva</label>
              <input name="contrasenaNuevaConfirmar" type="password" placeholder="" />
            </div>
          </div>
          <input name="accion" value="cambiarContrasena" type="hidden">
          <div class="form-buttons">
            <button type="submit"  class="guardar">Guardar cambios</button>
          </div>
        </form>
      </div>
    </section>
                </div>

   <footer class="home-footer">
        <div class="home-content6">
          <main class="home-main-content">
            <div class="home-content7">
              <header class="home-main4">
                <div class="home-header19">
                  <img alt="image" src="../imagenesGNRL/PNGs/vilke'sPNGwhite.png" 
                  data-src-dark="../imagenesGNRL/PNGs/vilke'sPNGwhite.png" 
                  data-src-light="../imagenesGNRL/PNGs/vilke'sPNG" class="home-branding"/>
                  <span class="home-text27">
                    Impulsamos tu negocio con tecnología innovadora y soluciones de software a medida.
                  </span>
                </div>
                <div class="home-socials">
                  <a href="https://example.com" target="_blank" rel="noreferrer noopener" class="home-link1">
                    <img alt="image" src="../imagenesGNRL/iconos/linkedin-200h.png" class="social" />
                  </a>
                  <a href="https://example.com" target="_blank" rel="noreferrer noopener" class="home-link2">
                    <img alt="image" src="../imagenesGNRL/iconos/instagram-200h.png" class="social" />
                  </a>
                  <a href="https://example.com" target="_blank" rel="noreferrer noopener" class="home-link3">
                    <img alt="image" src="../imagenesGNRL/iconos/twitter-200h.png" class="social" />
                  </a>
                </div>
              </header>
              <header class="home-categories">
                <div class="home-category1">
                  <div class="home-header20">
                    <span class="footer-header">Soluciones</span>
                  </div>
                  <div class="home-links1">
                    <span class="footer-link">Diseno de Páginas Web Adaptables</span>
                    <span class="footer-link">Prototipos Adaptables</span>
                    <span class="footer-link">Disena a Código</span>
                    <span class="footer-link">Herramienta para Páginas Web Estáticas</span>
                    <span class="footer-link">Generador de Páginas Web Estáticas</span>
                  </div>
                </div>
                <div class="home-category2">
                  <div class="home-header21">
                    <span class="footer-header">Empresa</span>
                  </div>
                  <div class="home-links2">
                    <span class="footer-link">Sobre nosotros</span>
                    <span class="footer-link">El equipo</span>
                    <span class="footer-link">Noticias</span>
                    <span class="footer-link">Colaboradores</span>
                    <span class="footer-link">Carreras</span>
                    <span class="footer-link">Prensa &amp; Redes Sociales</span>
                  </div>
                </div>
              </header>
            </div>
            <section class="home-copyright1">
              <span class="home-text41">
                ©2025 Vilke's, Inc. Taptask y cualquier logotipo asociado con marcas comerciales, marcas de servicio o
                marcas registradas de Vilke's, Inc.
              </span>
            </section>
          </main>
          <main class="home-subscribe">
            <main class="home-main5">
              <h1 class="home-heading22">Subscríbete a nuestro boletín</h1>
              <div class="home-input-field">
                <input type="email" placeholder="Ingresa tu email" class="home-textinput input" />
                <div class="home-buy button">
                  <span class="home-text42">-&gt;</span>
                  <span class="home-text43">
                    <span>Subscríbete ahora</span>
                    <br />
                  </span>
                </div>
              </div>
            </main>
            <h1 class="home-notice">
              Al suscribirte a nuestro boletín aceptas nuestros Términos y Condiciones.
            </h1>
          </main>
          <section class="home-copyright2">
            <span class="home-text46">
              ©2025 Vilke's, Inc. Taptask y cualquier logotipo asociado con marcas comerciales, marcas de servicio o
              marcas registradas de Vilke's, Inc.
            </span>
          </section>
        </div>
      </footer>
  </main>

  <script src="../javascripts/appPerfilEmpresa.js"></script>
  <script src="../javascripts/appTemas.js"></script>
  <?php include_once 'vistaMensajeria.php'; ?>
</body>
</html>