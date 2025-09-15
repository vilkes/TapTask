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
    <title>Servicios</title>
    <link rel="stylesheet" href="../css/styleServicio.css">
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
  <header>
<div class="home-container1">
        <navbar-wrapper class="navbar-wrapper" rootclassname="navbarundefined">
          <!--Navbar component-->
          <header class="navbar-navbar navbarroot-class-name">
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
                <span class="nav-link">Mis compras.</span>
              </div>
              <div class="get-started navbar-get-started1">
                <span class="navbar-text1">Iniciar Sesión</span>
              </div>
              <div class="get-started navbar-get-started2">
                <span class="navbar-text2">Registrarse</span>
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
    <div class="producto-container">
        <div class="izq">
            <div class="imagen-producto">
                <img class="imagenProducto" id="detalleServicio" src="../imagenesGNRL/fondos/default.png" alt="Imagen del servicio">
            </div>
        </div>

        <div class="der" id="info">
            <h2 id="tituloServicio">Titulo</h2>
    <p id="descripcionServicio">Descripcion</p>
    <p id="etiquetasServicio">Etiquetas</p>
    <p id="ubicacionServicio">Ubicacion</p>
    <div class="precio" id="precioServicio">$U10000</div>
    <button id="btnComprar">Reservar</button>
        </div>
    </div>

    <div id="toast"></div>

    <script src="../javascripts/appServicio.js"></script>
    <script src="../javascripts/appEstadoSesion.js"></script>
</body>
</html>