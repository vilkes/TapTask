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
              <label for="horario_domicilio">´Duración de servicio</label>
              <div class="precio">
                <input type="time" id="domicilio_duracion" name="domicilio_duracion" placeholder="Ej: 02:00">
              </div>
            </div>
            <!-- Campos dinámicos Local -->
            <div id="campo-local" class="campo-extra" style="display:none;">
              <input type="hidden" id="ubicacion" name="ubicacion">
              <p>📍 La dirección de tu local ya está registrada en tu perfil de empresa.</p>
              <label for="horario_local_inicio">Duracion de servicio</label>
              <div class="precio">
                <input type="time" id="local_duracion" name="local_duracion" placeholder="Ej: 02:00">
              </div>
            </div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>
            <p id="mensaje" style="color:red; display:none;">Has alcanzado el máximo de 10 dígitos.</p>
            <label for="imagenes">Imágenes (Seleccione varias al mismo tiempo):</label>
            <input type="file" accept="image/*" id="imagenes" name="imagenes[]" multiple>
            

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
                      <label for="horario_local">Duracion de servicio:</label>
                        <div class="precio">
                      <input type="time" id="local_duracion" name="local_duracion" placeholder="Ej: 02:00">
                    </div>`;
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
                <input type="email" placeholder="Ingresa tu email" id="suscribeteInput" class="home-textinput input" />
                <div class="home-buy button">
                  <span class="home-text43">
                    Subscríbete</span>
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

        <script src="../javascripts/appValidaciones.js"></script>
        <script src="../javascripts/appTemas.js"></script>
        <?php include_once '../apis/apiChatWidget.php'; ?>
      </body>
</html>