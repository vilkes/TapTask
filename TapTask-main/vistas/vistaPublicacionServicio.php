<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publicar Servicio</title>
  <link rel="stylesheet" href="../css/stylesSubirServicio.css">
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="stylesheet" href="../css/stylesPaginaPrincipal.css">
  <style data-tag="reset-style-sheet">
    html {
      line-height: 1.15;
    }
    body {
      margin: 0;
    }
    * {
      box-sizing: border-box;
      border-width: 0;
      border-style: solid;
      -webkit-font-smoothing: antialiased;
    }
    p,
    li,
    ul,
    pre,
    div,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    figure,
    blockquote,
    figcaption {
      margin: 0;
      padding: 0;
    }
    button {
      background-color: transparent;
    }
    button,
    input,
    optgroup,
    select,
    textarea {
      font-family: inherit;
      font-size: 100%;
      line-height: 1.15;
      margin: 0;
    }
    button,
    select {
      text-transform: none;
    }
    button,
    [type="button"],
    [type="reset"],
    [type="submit"] {
      appearance: button;
      color: #000000;
      background-color: #80FF44;
    }
    button::-moz-focus-inner,
    [type="button"]::-moz-focus-inner,
    [type="reset"]::-moz-focus-inner,
    [type="submit"]::-moz-focus-inner {
      border-style: none;
      padding: 0;
    }
    button:-moz-focus,
    [type="button"]:-moz-focus,
    [type="reset"]:-moz-focus,
    [type="submit"]:-moz-focus {
      outline: 1px dotted ButtonText;
    }
    a {
      color: inherit;
      text-decoration: inherit;
    }
    input {
      padding: 2px 4px;
    }

    img {
      display: block;
    }
    details {
      display: block;
      margin: 0;
      padding: 0;
    }
    summary::-webkit-details-marker {
      display: none;
    }
    [data-thq="accordion"] [data-thq="accordion-content"] {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease-in-out;
      padding: 0;
    }
    [data-thq="accordion"] details[data-thq="accordion-trigger"][open]+[data-thq="accordion-content"] {
      max-height: 1000vh;
    }
    details[data-thq="accordion-trigger"][open] summary [data-thq="accordion-icon"] {
      transform: rotate(180deg);
    }
    html {
      scroll-behavior: smooth
    }
  </style>
  <style data-tag="default-style-sheet">
    html {
      font-family: Inter;
      font-size: 16px;
    }
    body {
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      letter-spacing: normal;
      line-height: 1.15;
      color: var(--dl-color-gray-black);
      background: var(--dl-color-gray-white);
      fill: var(--dl-color-gray-black);
    }
  </style>
  <link rel="stylesheet" href="https://unpkg.com/animate.css@4.1.1/animate.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
    data-tag="font" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    data-tag="font" />
  <link rel="stylesheet" href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
</head>
<header>
  <div class="home-container1">
    <navbar-wrapper class="navbar-wrapper" rootclassname="navbarundefined">
      <header class="navbar-navbar navbarroot-class-name">
        <a href="vistaPaginaPrincipal.php">
          <img alt="Planical7012" src="../imagenesGNRL/PNGs/taptaskPNGwhite.png" class="navbar-branding-logo" /></a>
        <div class="navbar-nav-content">
          <div class="navbar-nav-links1">
            <span class="navbar-link1 nav-link">Categorías</span>
            <span class="nav-link">Sobre nosotros</span>
            <span class="nav-link">Ayuda</span>
            <span class="nav-link">Mis compras.</span>
          </div>
          <div id="btnLogin" class="get-started navbar-get-started1">
            <a href="../vistas/vistaInicioSesion.php">
            <span class="navbar-text1">Iniciar Sesión</span>
            </a>
          </div>
          <div id="btnRegistro" class="get-started navbar-get-started2">
            <a href="../vistas/vistaInicioSesion.php">
            <span class="navbar-text2">Registrarse</span>
            </a>
          </div>
          <div style="display: none;" id="btnLogout" class="get-started navbar-get-started2">
            <a href="vistaPaginaPrincipal.php" id="btnLogout">
              <span id="spanLogout"  class="navbar-text2">Cerrar Sesión</span>
            </a>
        </div>
          <div id="open-mobile-menu" class="navbar-hamburger get-started">
            <img alt="image" src="../imagenesGNRL/iconos/hamburger-200h.png" class="navbar-image1" />
          </div>
        </div>
        <div id="mobile-menu" class="navbar-mobile-menu close">
          <div class="navbar-branding">
            <img alt="image" src="../imagenesGNRL/PNGs/taptaskPNGwhite.png" class="navbar-image2" />
            <div id="close-mobile-menu" class="navbar-container1">
              <svg viewBox="0 0 1024 1024" class="navbar-icon1">
                <path
                  d="M225.835 286.165l225.835 225.835-225.835 225.835c-16.683 16.683-16.683 43.691 0 60.331s43.691 16.683 60.331 0l225.835-225.835 225.835 225.835c16.683 16.683 43.691 16.683 60.331 0s16.683-43.691 0-60.331l-225.835-225.835 225.835-225.835c16.683-16.683 16.683-43.691 0-60.331s-43.691-16.683-60.331 0l-225.835 225.835-225.835-225.835c-16.683-16.683-43.691-16.683-60.331 0s-16.683 43.691 0 60.331z">
                </path>
              </svg>
            </div>
          </div>
          <div class="navbar-nav-links2">
            <span class="nav-link">Features</span>
            <span class="nav-link">Why us</span>
            <span class="nav-link">Prices</span>
            <span class="nav-link">Contact</span>
          </div>
          <div class="get-started">
            <span class="navbar-text3">Get started</span>
          </div>
        </div>
        <div>
          <div class="navbar-container3">
            <script defer="">
              /*Mobile menu - Code Embed*/
              /* listenForUrlChangesMobileMenu() makes sure that if you changes pages inside your app,
              the mobile menu will still work*/
              const listenForUrlChangesMobileMenu = () => {
                let url = location.href;
                document.body.addEventListener('click', () => {
                  requestAnimationFrame(() => {
                    if (url !== location.href) {
                      runMobileMenuCodeEmbed();
                      url = location.href;
                    }
                  });
                },
                  true
                );
              };
              const runMobileMenuCodeEmbed = () => {
                const mobileMenu = document.querySelector('#mobile-menu')
                const closeButton = document.querySelector('#close-mobile-menu')
                const openButton = document.querySelector('#open-mobile-menu')
                openButton && openButton.addEventListener('click', function () {
                  mobileMenu.classList.add("open")
                  mobileMenu.classList.remove("close")
                })
                closeButton && closeButton.addEventListener('click', function () {
                  mobileMenu.classList.remove("open")
                  mobileMenu.classList.add("close")
                })
              }
              runMobileMenuCodeEmbed()
              listenForUrlChangesMobileMenu()
            </script>
          </div>
        </div>
      </header>
      <body>
        <div class="form-container">
          <h1>Publicar Servicio</h1>
          <form action="../controladores/controladorServicio.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="accion" value="subirServicio" />
            <label for="titulo">Título del servicio:</label>
            <input type="text" id="titulo" name="titulo" required>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
              <option value="">-- Selecciona una categoría --</option>
              <option value="jardineria">Jardinería</option>
              <option value="tecnologia">Tecnología</option>
              <option value="electricidad">Electricidad</option>
              <option value="limpieza">Limpieza</option>
            </select>
            <label for="modalidad">Modalidad <span style="color:red;">*</span>:</label>
            <select id="modalidad" class="select-modalidad" name="modalidad" required>
              <option value="">-- Selecciona modalidad --</option>
              <option value="Online">Online</option>
              <option value="A domicilio">A domicilio</option>
              <option value="En sitio">Presencial en local</option>
            </select>
            <!-- Campos dinámicos Online -->
            <div id="campo-online" class="campo-extra" style="display:none;">
              <label for="plataforma">Plataforma de contacto:</label>
              <input type="text" id="plataforma" name="plataforma" placeholder="Ej: Zoom, Discord, Email">
            </div>
            <!-- Campos dinámicos A domicilio -->
            <div id="campo-domicilio" class="campo-extra" style="display:none;">
              <label for="zona_servicio">Zona de servicio:</label>
              <input type="text" id="zona_servicio" name="zona_servicio" placeholder="Ej: Montevideo, Canelones">
              <label for="horario_domicilio">Horario de atención:</label>
              <input type="time" id="horario_domicilio" name="horario_domicilio" placeholder="Ej: 09:00 a 18:00">
            </div>
            <!-- Campos dinámicos Local -->
            <div id="campo-local" class="campo-extra" style="display:none;">
              <input type="hidden" id="ubicacion" name="ubicacion">
              <p>📍 La dirección de tu local ya está registrada en tu perfil de empresa.</p>
              <label for="horario_local">Horario de atención:</label>
              <input type="time" id="horario_local" name="horario_local" placeholder="Ej: 09:00 a 18:00">
            </div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>
            <p id="mensaje" style="color:red; display:none;">Has alcanzado el máximo de 10 dígitos.</p>

            <label for="imagenes">Imágenes:</label>
            <input type="file" id="imagenes" name="imagenes[]" multiple>

            <button type="submit">Publicar servicio</button>
          </form>
          <script>
            document.addEventListener("DOMContentLoaded", () => {
              const modalidadSelect = document.getElementById('modalidad');
              const campoOnline = document.getElementById('campo-online');
              const campoDomicilio = document.getElementById('campo-domicilio');
              const campoLocal = document.getElementById('campo-local');
              const ubicacionHidden = document.getElementById('ubicacion');
              if (modalidadSelect) {
                modalidadSelect.addEventListener('change', function () {
                  campoOnline.style.display = 'none';
                  campoDomicilio.style.display = 'none';
                  campoLocal.style.display = 'none';
                  if (this.value === 'Online') {
                    campoOnline.style.display = 'block';
                  } else if (this.value === 'A domicilio') {
                    campoDomicilio.style.display = 'block';
                  } else if (this.value === 'En sitio') {
                    campoLocal.style.display = 'block';
                    fetch('../apis/apiDatosEmpresa.php')
                      .then(res => res.json())
                      .then(data => {
                        if (data.success) {
                          console.log(data);
                          campoLocal.innerHTML = `
                      <input class="campo-ubicacion" type="text" value=" 📍 La dirección de tu local es: ${data.direccion}" disabled>
                      <label for="horario_local">Horario de atención:</label>
                      <input type="time" id="horario_local" name="horario_local" placeholder="Ej: 09:00 a 18:00">`;
                          ubicacionHidden.value = data.direccion;
                        } else {
                          campoLocal.innerHTML = `<p style="color:red;">${data}</p>`;
                        }
                      })
                      .catch(err => console.error("Error al cargar dirección:", err));
                  }
                });
              } else {
                console.error("No se encontró el select #modalidad");
              }
            });
          </script>
        </div>
        <div class="tailer">
          <img src="../imagenesGNRL/PNGs/copyright.png" alt="Copy" class="copy">
        </div>
        <script src="../javascripts/appValidaciones.js"></script>
        <script src="../javascripts/appEstadoSesion.js"></script>
      </body>
</html>