<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/stylesAgendaProveedores.css">
  <link rel="stylesheet" href="../css/styles.css" />
  <link href="../css/stylesPaginaPrincipal.css" rel="stylesheet" />
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
<div id="agenda-wrapper" data-usuario-id="<?php echo $_SESSION['iduser'] ?? 0; ?>">
    <div id="calendar-column">
        <div id="calendar-container" class="left-column-box">
            <div id="agenda-year" class="agenda-year"></div>
            <div class="agenda-header">
                <div id="prev-day-box" class="small-date-box"></div>
                <div id="current-date-box">
                    <div id="current-date"></div>
                </div>
                <div id="next-day-box" class="small-date-box"></div>
            </div>
            <div id="calendar-popup" class="calendar-popup">
                <div id="calendar-header">
                    <button id="prev-month">&#8249;</button>
                    <span id="calendar-month-year"></span>
                    <button id="next-month">&#8250;</button>
                </div>
                <div id="calendar-days"></div>
            </div>
        </div>

        <div id="reputation-container" class="left-column-box">
            <h2 class="reputation-title">REPUTACIÓN TOTAL</h2>
            <div id="reputation-content">
                <img id="reputation-image" src="https://via.placeholder.com/150" alt="Reputación">
                <div id="reputation-rank">Madera</div>
            </div>
        </div>
    </div>

    <div id="events-column">
        <div id="events-container">
            <h2 class="events-title">PEDIDOS<br>EN CURSO</h2>
            <div id="agenda-events"></div>
        </div>

        <div id="history-container">
            <h2 class="events-title">HISTORIAL<br>DE PEDIDOS</h2>
            <div id="agenda-history"></div>
        </div>
    </div>
</div>
</body>

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
                    <span>Subscríbete</span>
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

<script src="../javascripts/appAgendaProveedores.js"></script>
<script src="../javascripts/appTemas.js"></script>
<script src="../javascripts/appRatings.js"></script>
<?php include_once 'vistaMensajeria.php'; ?>
</html>