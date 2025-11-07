<a href="vistaPaginaPrincipal.php">
            <img id="logo" alt="Planical7012" src="../imagenesGNRL/PNGs/taptaskPNGwhite.png" 
            data-src-dark="../imagenesGNRL/PNGs/taptaskPNGwhite.png" 
            data-src-light="../imagenesGNRL/PNGs/taptaskPNG.png" class="navbar-branding-logo" />
          </a>
          <div class="navbar-nav-content">
            <div class="navbar-nav-links1">
              <a class="navbar-link" href="vistaListarServicios.php"><span class="navbar-link1 nav-link">Servicios</span></a>
              <a class="navbar-link" href="vistaPaginaPrincipal.php"><span class="nav-link">Sobre nosotros</span></a>
              <a class="navbar-link" href="vistaListarServicios.php"><span class="nav-link">Ayuda</span></a>
              <a class="navbar-link" href="vistaListarServicios.php"><span class="nav-link">Mis compras</span></a>
            </div>
            <div class="tooltip">
            <div id="btnAjustes" class="get-started navbar-get-started1">
            <a>
            <span title="Ajustes" class="navbar-icon1"><img src="../imagenesGNRL/iconos/settings.png" class="iconImgs"></span>
            </a>
          </div>
          <div id="btnPerfil" class="get-started navbar-get-started2">
            <a id="linkPerfil" href="#">
            <span title="Perfil" class="navbar-icon2"><img src="../imagenesGNRL/iconos/user.png" class="iconImgs"></span>
            </a>
          </div>

        </div>
          <div class="contenedorAccesibilidad">
            <h2 class="title-acc">Opciones de accesibilidad</h2>
            <div class="contenedorOpciones1">
            <span class="acc-option1">Tema actual: Lights off</span>
            <input id="toggle1" type="checkbox">
                </div>
              </div>
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
                  <path d="M225.835 286.165l225.835 225.835-225.835 225.835c-16.683 16.683-16.683 43.691 0 60.331s43.691 16.683 60.331 0l225.835-225.835 225.835 225.835c16.683 16.683 43.691 16.683 60.331 0s16.683-43.691 0-60.331l-225.835-225.835 225.835-225.835c16.683-16.683 16.683-43.691 0-60.331s-43.691-16.683-60.331 0l-225.835 225.835-225.835-225.835c-16.683-16.683-43.691-16.683-60.331 0s-16.683 43.691 0 60.331z">
                  </path>
                </svg>
              </div>
            </div>
            <div class="navbar-nav-links2">
              <span class="nav-link">Categorías</span>
              <span class="nav-link">Sobre nosotros</span>
              <span class="nav-link">Ayuda</span>
              <span class="nav-link">Mis compras</span>
            </div>
            <div class="get-started">
              <a class="navbar-text3">Registrate</a>
              <a class="navbar-text3">Inicia Sesión</a>
            </div>
          </div>
          <div>
            <div class="navbar-container3">
              <script defer="">
document.addEventListener('DOMContentLoaded', () => {
  // Selecciono por clase o por id — cualquiera de las dos funciona ahora porque las declaramos en el HTML.
  const btn = document.querySelector('#btnAjustes');
  const contenedor = document.querySelector('.contenedorAccesibilidad');

  btn.addEventListener('click', (e) => {
    e.stopPropagation();
    contenedor.classList.toggle('mostrar');
    // accesibilidad: actualizar aria-hidden
    const visible = contenedor.classList.contains('mostrar');
    contenedor.setAttribute('aria-hidden', String(!visible));
  });

  // Cerrar al hacer click fuera
  document.addEventListener('click', (e) => {
    if (!contenedor.contains(e.target) && !btn.contains(e.target)) {
      contenedor.classList.remove('mostrar');
      contenedor.setAttribute('aria-hidden', 'true');
    }
  });
});

document.addEventListener('DOMContentLoaded', () => {
    <?php if (isset($_SESSION['tipo'])): ?>
        const tipoUsuario = "<?php echo $_SESSION['tipo']; ?>";
        const linkPerfil = document.getElementById('linkPerfil');

        if(tipoUsuario === "proveedor"){
            linkPerfil.href = "../vistas/vistaPerfilEmpresa.php";
        } else if(tipoUsuario === "cliente"){
            linkPerfil.href = "../vistas/vistaPerfilUsuario.php";
        } else if(tipoUsuario === "administrador"){
            linkPerfil.href = "../vistas/vistaPerfilAdmin.php";
        }
    <?php else: ?>
        const linkPerfil = document.getElementById('linkPerfil');
        linkPerfil.href = "../vistas/login.php"; // si no hay sesión
    <?php endif; ?>
});
</script>

<style>
  body {
  transition: background-color 0.4s ease, color 0.4s ease;
  min-height: 100vh;
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
  background-color: #0f0f0f;
}

body.tema-claro {
  background-color: #ffffffff;
  color: #000000;
}

body.tema-oscuro {
  background-color: #0f0f0f;
  color: #ffffff;
}

body.tema-claro,
body.tema-oscuro,
body.tema-claro * ,
body.tema-oscuro * {
  transition: background-color 0.4s ease, color 0.4s ease, border-color 0.4s ease;
}

.header-header .navbar-navbar {
  width: 100%;
  display: flex;
  z-index: 1000;
  position: relative;
  max-width: 1200px;
  align-self: auto;
  align-items: center;
  flex-shrink: 1;
  justify-self: center;
  padding-top: var(--dl-layout-space-twounits);
  padding-left: var(--dl-layout-space-oneandhalfunits);
  padding-right: var(--dl-layout-space-oneandhalfunits);
}

.get-started {
    cursor: pointer;
    display: flex;
    transition: 0.3s;
    align-items: center;
    border-color: transparent;
    padding-left: var(--dl-layout-space-oneandhalfunits);
    border-radius: 58px;
    padding-right: var(--dl-layout-space-oneandhalfunits);
    justify-content: center;
    text-decoration: none;
    background-color: rgba(42, 42, 42, 1);
}

.tooltip {
    display: flex;
    gap: 40px;
}

.tooltip .tooltiptext {
  display: flex;
  width: auto;
  color: #fff;
  border-radius: 8px;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  bottom: 125%; /* posición encima del botón */
  left: 50%;
  transform: translateX(-50%);
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip:hover .tooltiptext {
  border-radius: 6px;
  color: #fff;
  background-color: #2f2f2f;
  visibility: visible;
  opacity: 1;
}

.navbar-branding-logo {
  box-sizing: content-box;
  height: 150px;
  padding-left: 60px;
}
 
.navbar-nav-content {
  gap: var(--dl-layout-space-threeunits);
  display: flex;
  align-items: center;
  flex-direction: row;
  justify-content: space-between;
  padding-left: 60px;
}
 
.navbar-nav-links1 {
  gap: var(--dl-layout-space-threeunits);
  display: flex;
  align-items: flex-start;
  border-color: transparent;
  color: #fff;
}

.navbar-link {
  color: #fff;
}

body.tema-oscuro .navbar-link {
  color: #fff;
}

body.tema-claro .navbar-link {
  color: #000000;
}
 
.navbar-link1 {
  text-decoration: none;
}
 
.navbar-icon1 {
  color: rgb(255, 255, 255);
  align-self: auto;
  font-style: Medium;
  text-align: left;
  font-family: "Poppins";
  font-weight: 500;
  font-stretch: normal;
  text-decoration: none;
}

.iconImgs {
  width: 20px;
  height: 20px;
}
 
.navbar-icon2 {
  color: rgb(255, 255, 255);
  align-self: auto;
  font-style: Medium;
  text-align: left;
  font-family: "Poppins";
  font-weight: 500;
  font-stretch: normal;
  text-decoration: none;
}
 
.navbar-hamburger {
  display: none;
}
 
.navbar-image1 {
  width: 100px;
  object-fit: cover;
}
 
.navbar-mobile-menu {
  gap: var(--dl-layout-space-twounits);
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  display: none;
  padding: var(--dl-layout-space-twounits);
  z-index: 100;
  position: fixed;
  animation: menuAnimation 0.3s;
  align-items: stretch;
  flex-direction: column;
  background-color: #fff;
}
 
.navbar-branding {
  display: flex;
  align-items: center;
  flex-direction: row;
  justify-content: space-between;
}
 
.navbar-image2 {
  width: 100px;
  filter: brightness(0) saturate(100%);
  object-fit: cover;
}
 
.navbar-container1 {
  display: flex;
  align-items: center;
  flex-direction: row;
  justify-content: space-between;
}
 
.navbar-icon1 {
  width: 24px;
  height: 24px;
}
 
.navbar-nav-links2 {
  gap: var(--dl-layout-space-unit);
  color: var(--dl-color-gray-black);
  display: flex;
  flex-direction: column;
}
 
.navbar-text3 {
  color: rgba(255, 255, 255, 1);
  align-self: auto;
  font-style: Medium;
  text-align: left;
  font-family: Poppins;
  font-weight: 500;
  font-stretch: normal;
  text-decoration: none;
}
 
.navbar-container3 {
  display: contents;
}

a {
    color: #80FF44;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
}

.contenedorAccesibilidad {
  position: fixed;
  top: 50%;
  left: 50%;
  height: 600px;
  width: 850px;
  transform: translate(-50%, -50%);
  background-color: #2f2f2f;
  color: white;
  padding: 35px;
  border-radius: 12px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
  display: none;
  z-index: 9999;
}

body.tema-claro .contenedorAccesibilidad {
  background-color: #ffffff;
  color: #000000;
}

body.tema-oscuro .contenedorAccesibilidad {
  background-color: #2f2f2f;
  color: #ffffff;
}

@keyframes aparecerAccesibilidad {
  0% {
    opacity: 0;
    transform: translate(-50%, -45%);
  }
  100% {
    opacity: 1;
    transform: translate(-50%, -50%);
  }
}

.contenedorAccesibilidad.mostrar {
  display: block;
  animation: aparecerAccesibilidad 0.35s ease-in-out;
}

.title-acc {
  text-align: center;
  margin-bottom: 30px;
  width: 100%;
}

.contenedorOpciones1 {
  border-radius: 20px;
  display: flex;
  flex-direction: row;
  padding: 20px 0px 20px 20px;
  align-items: center;
  justify-items: left;
  margin: 10px;
  gap: 450px;
  background-color: #3f3f3f;
}

body.tema-oscuro .contenedorOpciones1 {
  background-color: #3f3f3f;
}

body.tema-claro .contenedorOpciones1 {
  background-color: #eeeeee;
}

.acc-option1 {
  font-size: 14px;
}

#toggle1 {
  --s: 30px; /* adjust this to control the size*/
  height: calc(var(--s) + var(--s)/5);
  width: auto; /* some browsers need this */
  aspect-ratio: 2.25;
  border-radius: var(--s);
  margin: calc(var(--s)/2);
  display: grid;
  cursor: pointer;
  border: 2.5px solid #ffffff;
  background-color:transparent;
  box-sizing: content-box;
  overflow: hidden;
  transition: .3s .1s;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

#toggle1:before{
  content: "";
  padding: calc(var(--s)/10);
  --_g: radial-gradient(circle closest-side at calc(100% - var(--s)/2) 50%,#ffffff 96%,#0000);
  background: 
    var(--_g) 0 /var(--_p,var(--s)) 100% no-repeat content-box,
    var(--_g) var(--_p,0)/var(--s)  100% no-repeat content-box,
    #ffffff00;
  transition: .4s, background-position .4s .1s,
    padding cubic-bezier(0,calc(var(--_i,-1)*200),1,calc(var(--_i,-1)*200)) .25s .1s;
}
#toggle1:checked {
  background-color: #85ff7a;
  border: 2.5px solid transparent;
}
#toggle1:checked:before {
  padding: calc(var(--s)/10 + .05px) calc(var(--s)/10);
  --_p: 100%;
  --_i: 1;
}

@media (max-width: 769px) {
  * {
    font-size: 0.95rem;
    box-sizing: border-box; /* aplica globalmente */
  }

  html, body {
    position: relative;
    left: 0;
    right: 0;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    overflow-y: auto;
    width: 100%;
    min-height: 100%;
    align-items: center;
  }

  .navbar-navbar {
    width: unset;
  }

  .navbar-nav-links1 {
    display: none;
  }

  .navbar-wrapper {
    max-width: 425px;
  }

  .navbar-branding-logo {
    padding-left: 0px;
  }

  .navbar-nav-content {
    padding-left: 50px;
  }

  /* ocultar botones innecesarios */
  #btnRegistro,
  #btnLogin {
    display: none;
  }

  #open-mobile-menu, #mobile-get-started {
    padding-top: 15px;
    padding-bottom: 15px;
  }

.contenedorAccesibilidad {
  width: 95%;
}

.contenedorOpciones1 {
  gap: 10px;
}

#toggle1 {
  --s: 25px; /* tamano del toggle más pequeno */
  height: calc(var(--s) + var(--s)/5);
  width: 60px; /* ajustar al espacio disponible */
  user-select: none;
}

#toggle1:before {
  padding: calc(var(--s)/10);
  --_g: radial-gradient(circle closest-side at calc(100% - var(--s)/2) 50%,#ffffff 96%,#0000);
  background: 
    var(--_g) 0 /var(--_p,var(--s)) 100% no-repeat content-box,
    var(--_g) var(--_p,0)/var(--s)  100% no-repeat content-box,
    #ffffff00;
    user-select: none;
}

#toggle1:checked:before {
  padding: calc(var(--s)/10 + 0.05px) calc(var(--s)/10);
  user-select: none;
}

.tooltip {
  gap: 25px;
}
}
</style>