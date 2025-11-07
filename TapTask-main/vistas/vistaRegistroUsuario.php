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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taptask</title>
    <link rel="stylesheet" href="../css/stylesUsuario.css" /> 
    <link rel="stylesheet" href="../css/styles.css" />
    <link href="../css/stylesPaginaPrincipal.css" rel="stylesheet" />
    <style data-tag="reset-style-sheet">
    html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;  -webkit-font-smoothing: antialiased;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  appearance: button;  color: #000000;  background-color: #80FF44;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}summary::-webkit-details-marker {  display: none;}[data-thq="accordion"] [data-thq="accordion-content"] {  max-height: 0;  overflow: hidden;  transition: max-height 0.3s ease-in-out;  padding: 0;}[data-thq="accordion"] details[data-thq="accordion-trigger"][open] + [data-thq="accordion-content"] {  max-height: 1000vh;}details[data-thq="accordion-trigger"][open] summary [data-thq="accordion-icon"] {  transform: rotate(180deg);}html { scroll-behavior: smooth  }
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
        background: var(--dl-color-gray-white);
        fill: var(--dl-color-gray-black);
      }
    </style>
    <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css"
    />
  <link rel="stylesheet" href="https://unpkg.com/animate.css@4.1.1/animate.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
    data-tag="font" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
    data-tag="font" />
  <link rel="stylesheet" href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
</head>
        <navbar-wrapper class="navbar-wrapper" rootclassname="navbarundefined">
          <!--Navbar component-->
          <header id="main-header" class="navbar-navbar navbarroot-class-name">
            <a href="vistaPaginaPrincipal.php">
            <img
              alt="Planical7012"
              src="../imagenesGNRL/PNGs/taptaskPNGwhite.png"
              class="navbar-branding-logo"
            /></a>
            <div class="navbar-nav-content">
              <div class="navbar-nav-links1">
                <span class="navbar-link1 nav-link">Categorías</span>
                <span class="nav-link">Sobre nosotros</span>
                <span class="nav-link">Ayuda</span>
                <span class="nav-link">Contacto</span>
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
              <div id="open-mobile-menu" class="navbar-hamburger get-started">
                <img
                  alt="image"
                  src="../imagenesGNRL/iconos/hamburger-200h.png"
                  class="navbar-image1"
                />
    </div>
            </div>
            <div id="mobile-menu" class="navbar-mobile-menu close">
              <div class="navbar-branding">
                <img
                  alt="image"
                  src="../imagenesGNRL/PNGs/taptaskPNGwhite.png"
                  class="navbar-image2"
                />
                <div id="close-mobile-menu" class="navbar-container1">
                  <svg viewBox="0 0 1024 1024" class="navbar-icon1">
                    <path
                      d="M225.835 286.165l225.835 225.835-225.835 225.835c-16.683 16.683-16.683 43.691 0 60.331s43.691 16.683 60.331 0l225.835-225.835 225.835 225.835c16.683 16.683 43.691 16.683 60.331 0s16.683-43.691 0-60.331l-225.835-225.835 225.835-225.835c16.683-16.683 16.683-43.691 0-60.331s-43.691-16.683-60.331 0l-225.835 225.835-225.835-225.835c-16.683-16.683-43.691-16.683-60.331 0s-16.683 43.691 0 60.331z"
                    ></path>
                  </svg>
                </div>
              </div>
              <div class="navbar-nav-links2">
                <span class="nav-link">Categorias</span>
                <span class="nav-link">Sobre nosotros</span>
                <span class="nav-link">Ayuda</span>
                <span class="nav-link">Contacto</span>
              </div>
            <a href="vistaInicioSesion.php" class="get-started" id="mobile-register">
              <span class="navbar-text3">Registrate</span>
            </a>
            <a href="vistaInicioSesion.php" class="get-started" id="mobile-register">
              <span class="navbar-text3">Iniciar Sesión</span>
            </a>
            </div>
            <div>
              <div class="navbar-container3">
                <script defer="">

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
                      // Mobile menu
                      const mobileMenu = document.querySelector('#mobile-menu')

                      // Buttons
                      const closeButton = document.querySelector('#close-mobile-menu')
                      const openButton = document.querySelector('#open-mobile-menu')

                      // On openButton click, set the mobileMenu position left to -100vw
                      openButton && openButton.addEventListener('click', function() {
                          mobileMenu.classList.add("open")
                          mobileMenu.classList.remove("close")
                      })

                      // On closeButton click, set the mobileMenu position to 0vw
                      closeButton && closeButton.addEventListener('click', function() {
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
            <input id="contrasena" name="contrasena" type="password" placeholder="Contrasena" required />
            <label for="file-input" class="file-label">Subir foto de perfil</label>
            <input name="fotoPerfil" accept="image/*" type="file" id="file-input" hidden>
            <input name="form" type="hidden" value="Cliente">
            <button type="submit">Registrarse</button>
          </form>
          <div class="login-link">
            <input type="checkbox" required>
            He leído y acepto los <a href="../assets/Términos-de-uso.pdf">Términos y condiciones de uso</a>, y 
            la <a href="../assets/Política-de-privacidad.pdf">Política de privacidad</a>
          </div>
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

     <footer class="home-footer">
        <div class="home-content6">
          <main class="home-main-content">
            <div class="home-content7">
              <header class="home-main4">
                <div class="home-header19">
                  <img alt="image" src="../imagenesGNRL/PNGs/vilke'sPNGwhite.png" class="home-branding" />
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
</body>
<script src="../javascripts/appValidaciones.js"></script>
</html>