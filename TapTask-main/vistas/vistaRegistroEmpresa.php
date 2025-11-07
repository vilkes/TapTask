<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="../css/stylesEmpresa.css">
    <link rel="stylesheet" href="../css/stylesServicio.css">
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
        <div id="btnPerfil" class="get-started navbar-get-started3" style="display: none;">
        <a href="../vistas/vistaPerfilUsuario.php">
          <span id="spanPerfil" class="navbar-text2">Mi Perfil</span>
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
                <span class="nav-link">Categorías</span>
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
            </navbar-wrapper>
</header>        
<body>

  <div class="container">
    <div class="registro-card">
      <div class="form-section">
        <div class="form-wrapper">
          <h2>Registrar empresa</h2>
            <form method="post" enctype="multipart/form-data" action="../controladores/controladorUsuario.php">
            <input id="nombreEmpresa" name="nombreEmpresa" type="text" placeholder="Nombre de la empresa" required />
            <input id="empresaAsociada" name="empresaAsociada" type="text" placeholder="Razón social" required />
            <input id="rut" name="RUT" type="text" placeholder="RUT" required />
            <input id="email" name="email" type="email" placeholder="Correo corporativo" required />
            <input id="telefono" name="telefono" type="tel" placeholder="Teléfono de contacto" required />
            <select name="departamento" id="departamento">
              <option value="" disabled selected>Selecciona un departamento</option>
            </select>
            <select name="localidadBarrio" id="localidadBarrio">
             <option value="" disabled selected>Selecciona una localidad</option>
            </select>
            <input id="calle" name="calle" type="text" placeholder="Calle" required />
            <input id="numero" name="numero" type="text" placeholder="Numero de Puerta" required />
            <input id="codigoPostal" name="codigoPostal" type="text" placeholder="Código postal" required />
            <input id="rubro" name="rubro" type="text" placeholder="Rubro o sector" required />
            <input id="contrasena" name="contrasena" type="password" placeholder="Contrasena" autocomplete="off" required />
            <label for="file-input" class="file-label">Subir foto de perfil</label>
            <input name="logo" accept="image/*" type="file" id="file-input" hidden>
            <input name="form" type="hidden" value="Empresa">
            <button type="submit">Registrarse</button>
          </form>
          <div class="login-link">
            ¿Ya tienen una cuenta? <a href="vistaInicioSesion.php">Iniciar sesión</a>
          </div>
        </div>
      </div>
      <div class="visual-section">
        <div class="graphic">
          <h3>¡Bienvenido!</h3>
          <p>Conectá tu empresa con miles de oportunidades</p>
          <img src="imgs/4.png" alt="Logo Empresa" class="personaje" />
        </div>
      </div>
    </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/papaparse@5.3.2/papaparse.min.js"></script>
<script>
    let data = [];

    Papa.parse("../assets/localidades-29-7nm.csv", {
      download: true, 
      header: true,
      skipEmptyLines: true,
      complete: function(results) {
        data = results.data; 
        cargarDepartamentos(data);
      }
    });

    const barrios = [
    "Parque Rodo","Palermo","Punta Carretas","Barrio Sur","Punta Gorda",
    "Malvin","Buceo","Pocitos","Cordon","Carrasco","Ciudad Vieja","Aguada",
    "Carrasco Norte","Paso de las Duranas","La Comercial","Colon Sureste, Abayuba",
    "Centro","Malvin Norte","Parque Battle, Villa Dolores","Tres Cruces","Larranaga",
    "Jacinto Vera","La Blanqueada","Banados de Carrasco","Aires Puros","Prado, Nueva Savona",
    "La Figurita","Lezica, Melilla","Brazo Oriental","Villa Garcia, Manga Rural","Capurro, Bella Vista",
    "Las Canteras","Atahualpa","Reducto","Tres Ombues, Victoria","Paseo de la arena","Villa Espanola",
    "Mercado Modelo, Bolivar","Villa Munoz, Retiro","Penarol, Lavalleja","Cerrito",
    "Conciliacion","Nuevo Paris","Sayago","Colon Centro y Noroeste","Castro, Perez Castellanos",
    "La Teja","Manga, Toledo chico","Ituzaingo","Manga","Jardines del Hipodromo",
    "Maronas, Parque Guarani","La Paloma, Tomkinson","Casabo, Pajas Blancas",
    "Punta Rieles, Bella Italia","Las Acacias","Piedras Blancas","Union","Belvedere",
    "Casavalle","Flor de Maronas","Cerro"
  ];

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
       if (depSeleccionado === "MONTEVIDEO") {
        // Cargar barrios del array
        barrios.forEach(loc => {
          console.log(loc);
          let option = document.createElement("option");
          option.value = loc;
          option.textContent = loc;
          locSelect.appendChild(option);
        });
      } else {
        const localidades = data
          .filter(item => item.departamento === depSeleccionado)
          .map(item => item.localidad);

        localidades.forEach(loc => {
          let option = document.createElement("option");
          option.value = loc;
          option.textContent = loc;
          locSelect.appendChild(option);
        });
      }
    });
</script>

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
                <input type="email" id="inputemail" placeholder="Ingresa tu email" class="home-textinput input" />
                <div class="home-buy button">
                  <span class="home-text43">Subscríbete</span>
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
</body>
</html>