<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Taptask</title>
  <meta property="og:title" content="Planical modern template" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
  <meta property="twitter:card" content="summary_large_image" />
  <link rel="stylesheet" href="../css/styles.css" />
  <link href="../css/stylesPaginaPrincipal.css" rel="stylesheet" />
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
      color: inherit;
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
  <div>
    <div class="home-container1">
      <navbar-wrapper class="navbar-wrapper" rootclassname="navbarundefined">
        <!--Navbar component-->
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
            <div class="get-started navbar-get-started1">
              <a href="vistaInicioSesion.php">
                <span class="navbar-text1">Iniciar Sesión</span>
              </a>
            </div>
            <div class="get-started navbar-get-started2">
              <span class="navbar-text2">Registrarse</span>
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
              <span class="nav-link">Categorías</span>
              <span class="nav-link">Sobre nosotros</span>
              <span class="nav-link">Ayuda</span>
              <span class="nav-link">Mis compras</span>
            </div>
            <div class="get-started">
              <span class="navbar-text3">Registrate</span>
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
                  openButton && openButton.addEventListener('click', function () {
                    mobileMenu.classList.add("open")
                    mobileMenu.classList.remove("close")
                  })
                  // On closeButton click, set the mobileMenu position to 0vw
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
      </navbar-wrapper>
      <section class="home-section10">
        <div class="home-hero">
          <div class="home-content1">
            <main class="home-main1">
              <header class="home-header10">
                <h1 class="home-heading10">
                  Todos tus servicios, en tu pantalla, para vos.
                </h1>
              </header>
              <span class="home-caption1">
                Descubrí nuevas oportunidades para vos con nuestra web.
              </span>
              <div class="home-buttons1">
                <div class="home-get-started1 button">
                  <span class="home-text10">Empezar</span>
                </div>
                <div class="home-get-started2 button">
                  <span class="home-text11">Saber sobre TapTask</span>
                </div>
              </div>
            </main>
            <div class="home-highlight">
              <div class="home-avatars">
                <img alt="image"
                  src="https://images.unsplash.com/photo-1552234994-66ba234fd567?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDN8fHBvdHJhaXR8ZW58MHx8fHwxNjY3MjQ0ODcx&amp;ixlib=rb-4.0.3&amp;w=200"
                  class="home-image10 avatar" />
                <img alt="image"
                  src="https://images.unsplash.com/photo-1610276198568-eb6d0ff53e48?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDF8fHBvdHJhaXR8ZW58MHx8fHwxNjY3MjQ0ODcx&amp;ixlib=rb-4.0.3&amp;w=200"
                  class="home-image11 avatar" />
                <img alt="image"
                  src="https://images.unsplash.com/photo-1618151313441-bc79b11e5090?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDEzfHxwb3RyYWl0fGVufDB8fHx8MTY2NzI0NDg3MQ&amp;ixlib=rb-4.0.3&amp;w=200"
                  class="home-image12 avatar" />
              </div>
              <label class="home-caption2">
                Querido por +10.000 personas como vos.
              </label>
            </div>
          </div>
          <div class="home-image13">
            <img alt="image" src="../imagenesGNRL/imagenesSection/heroimage-1500h.png" class="home-image14" />
          </div>
          <div class="home-image15">
            <img alt="image" src="../imagenesGNRL/imagenesSection/heroimage-1500h.png" class="home-image16" />
          </div>
        </div>
      </section>
      <section class="home-section11">
        <header class="home-header11">
          <h2 class="home-text12">¿Por qué deberías usar TapTask?</h2>
          <span class="home-text13">
            En TapTask creemos que contratar o ofrecer un servicio no debería
            ser complicado ni inseguro. Nuestra plataforma conecta clientes y
            proveedores en un entorno confiable, con perfiles verificados,
            sistema de reservas y comunicación directa. Ofrecemos
            transparencia a través de reseñas y calificaciones, y damos a los
            proveedores las herramientas necesarias para organizar su trabajo
            y llegar a más personas. TapTask es la forma simple, segura y
            moderna de encontrar y ofrecer servicios.
          </span>
        </header>
        <section class="home-note1">
          <div class="home-image17">
            <img alt="image" src="../imagenesGNRL/imagenesSection/group%201428-1200w.png" class="home-image18" />
          </div>
          <div class="home-content2">
            <div class="home-main2">
              <div class="home-caption3">
                <span class="section-head">FEATURES</span>
              </div>
              <div class="home-heading11">
                <h2 class="section-heading">Tus tareas, simplificadas.</h2>
                <p class="section-description">
                  Con taptask podés organizar tu día de manera fácil y rápida.
                  Creá listas, fijá recordatorios y gestioná tus prioridades
                  sin complicaciones. Todo en un solo lugar, siempre accesible
                  y con un diseño pensado para vos.
                </p>
              </div>
            </div>
            <div class="home-get-started3 button">
              <span class="home-text14">Registrarse</span>
            </div>
          </div>
        </section>
        <section class="home-note2">
          <div class="home-image19">
            <img alt="image" src="../imagenesGNRL/imagenesSection/group%201449-1200w.png" class="home-image20" />
          </div>
          <div class="home-content3">
            <main class="home-main3">
              <header class="home-caption4">
                <span class="home-section13 section-head">features</span>
              </header>
              <main class="home-heading13">
                <header class="home-header12">
                  <h2 class="section-heading">
                    Servicios cuando los necesites, donde los necesites.
                  </h2>
                  <p class="section-description">
                    Con taptask tenés todo lo que necesitás para administrar
                    tu tiempo de forma simple y productiva.
                  </p>
                </header>
                <div class="home-checkmarks">
                  <mark-wrapper class="mark-wrapper">
                    <!--Mark component-->
                    <div class="mark-mark">
                      <div class="mark-icon1">
                        <svg viewBox="0 0 1024 1024" class="mark-icon2">
                          <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                        </svg>
                      </div>
                      <p class="mark-label">
                        <span>Soluciones rápidas y seguras</span>
                      </p>
                    </div>
                  </mark-wrapper>
                  <mark-wrapper-q7v6 class="mark-wrapper-q7v6">
                    <!--Mark component-->
                    <div class="mark-mark1">
                      <div class="mark-icon4">
                        <svg viewBox="0 0 1024 1024" class="mark-icon5">
                          <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                        </svg>
                      </div>
                      <p class="mark-label1">
                        <span>Profesionales en múltiples áreas</span>
                      </p>
                    </div>
                  </mark-wrapper-q7v6>
                  <mark-wrapper-pda8 class="mark-wrapper-pda8">
                    <!--Mark component-->
                    <div class="mark-mark2">
                      <div class="mark-icon7">
                        <svg viewBox="0 0 1024 1024" class="mark-icon8">
                          <path d="M384 690l452-452 60 60-512 512-238-238 60-60z"></path>
                        </svg>
                      </div>
                      <p class="mark-label2">
                        <span>Confianza en cada servicio</span>
                      </p>
                    </div>
                  </mark-wrapper-pda8>
                </div>
              </main>
            </main>
            <div class="home-get-started4 button">
              <span class="home-text15">Registrarse</span>
            </div>
          </div>
        </section>
      </section>
      <section class="home-section14">
        <div class="home-note3">
          <div class="home-image21">
            <img alt="image" src="../imagenesGNRL/imagenesSection/iphone%2014%20pro%20max-1200w.png"
              class="home-image22" />
          </div>
          <div class="home-content4">
            <div class="home-caption5">
              <span class="section-head">features</span>
            </div>
            <div class="home-heading15">
              <div class="home-header13">
                <h2 class="section-heading">
                  Contacto con absolutamente todas los profesionales de
                  nuestra plataforma.
                </h2>
              </div>
              <div class="home-container2">
                <accordion-wrapper class="accordion-wrapper" rootclassname="accordionundefined">
                  <!--Accordion component-->
                  <div class="accordion-accordion accordionroot-class-name">
                    <div data-role="accordion-container" class="accordion-element1 accordion-element">
                      <div class="accordion-details1">
                        <span class="accordion-text1">
                          <span>
                            Mensajería con las empresas y los proveedores.
                          </span>
                        </span>
                        <span data-role="accordion-content" class="accordion-text2">
                          <span>
                            En nuestra plataforma, creemos que la comodidad y
                            la confianza lo son todo, tanto para los usuarios
                            como para los proveedores, así que brindamos
                            nuestro servicio de mensajería privado dentro de
                            la web a la hora de hacer consultas y reservar
                            servicios.
                          </span>
                        </span>
                      </div>
                      <svg viewBox="0 0 1024 1024" data-role="accordion-icon" class="accordion-icon1">
                        <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                      </svg>
                    </div>
                    <div data-role="accordion-container" class="accordion-element2 accordion-element">
                      <div class="accordion-details2">
                        <span class="accordion-text3">
                          <span>Agendas, calendarios y recordatorios.</span>
                        </span>
                        <span data-role="accordion-content" class="accordion-text4">
                          <span>
                            Nuestra plataforma se encarga de agendar y mostrar
                            en el calendario de la web cuando un servicio fue
                            reservado, nos encargamos de hacerte recordar
                            cuando sea la hora de los servicios acordados.
                          </span>
                        </span>
                      </div>
                      <svg viewBox="0 0 1024 1024" data-role="accordion-icon" class="accordion-icon3">
                        <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                      </svg>
                    </div>
                  </div>
                </accordion-wrapper>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="home-section16">
        <header class="home-header14">
          <header class="home-left1">
            <span class="section-head">general features</span>
            <h2 class="home-heading17 section-heading">
              Donde la confianza se encuentra con la tecnología.
            </h2>
          </header>
          <p class="home-paragraph3 section-description">
            La experiencia TapTask se resume con todas nuestras cualidades
            como plataforma. Para vos y para todos.
          </p>
          <div class="home-right1"></div>
        </header>
        <main class="home-cards1">
          <card-wrapper class="card-wrapper" rootclassname="cardundefined">
            <section class="card-card cardroot-class-name">
              <div class="card-icon1">
                <img alt="image" src="../imagenesGNRL/iconos/group%201316-200w.png" class="card-icon2" />
              </div>
              <main class="card-content">
                <h1 class="card-header">
                  <span>Confianza y reputación.</span>
                </h1>
                <p class="card-description">
                  <fragment class="home-fragment1">
                    <span class="home-text16">
                      El sistema de reseñas y calificaciones transparentes
                      asegura confianza. Cada interacción suma a la reputación
                      de los proveedores, creando una comunidad sólida y
                      responsable.
                    </span>
                  </fragment>
                </p>
              </main>
            </section>
          </card-wrapper>
          <card-wrapper-nrpl class="card-wrapper-nrpl" rootclassname="cardundefined">
            <!--Card component-->
            <section class="card-card1 cardroot-class-name1">
              <div class="card-icon3">
                <img alt="image" src="../imagenesGNRL/iconos/group%201314-200h.png" class="card-icon4" />
              </div>
              <main class="card-content1">
                <h1 class="card-header1">
                  <span>Hecho para todo el mundo</span>
                </h1>
                <p class="card-description1">
                  <fragment class="home-fragment2">
                    <span class="home-text17">
                      <span>
                        Una experiencia accesible, adaptable y pensada para
                        todos. Con funciones de accesibilidad, perfiles claros
                        y navegación simple, nadie queda afuera.
                      </span>
                      <br />
                      <br />
                    </span>
                  </fragment>
                </p>
              </main>
            </section>
          </card-wrapper-nrpl>
          <card-wrapper-4vvp class="card-wrapper-4vvp" rootclassname="cardundefined">
            <!--Card component-->
            <section class="card-card2 cardroot-class-name2">
              <div class="card-icon5">
                <img alt="image" src="../imagenesGNRL/iconos/group%201317-200h.png" class="card-icon6" />
              </div>
              <main class="card-content2">
                <h1 class="card-header2">
                  <span>Un diseño seguro y confiable.</span>
                </h1>
                <p class="card-description2">
                  <fragment class="home-fragment3">
                    <span class="home-text21">
                      TapTask protege tu información con contraseñas
                      encriptadas, verificación en dos pasos y cifrado en
                      todas las conexiones. La seguridad es parte esencial de
                      la plataforma.
                    </span>
                  </fragment>
                </p>
              </main>
            </section>
          </card-wrapper-4vvp>
        </main>
      </section>
      <section class="home-section18">
        <main class="home-banner">
          <div class="home-header15">
            <h2 class="section-heading">
              Taptask hace que tus necesidades esten a la alcance de tu mano.
            </h2>
          </div>
          <div class="home-buttons2">
            <div class="home-get-started5 button">
              <span class="home-text22">Registrarse</span>
            </div>
            <div class="home-book-demo button">
              <span class="home-text23">Iniciar Sesión</span>
            </div>
          </div>
        </main>
      </section>
      <section class="home-section19">
        <header class="home-header16">
          <header class="home-left3">
            <span class="section-head">reseñas</span>
            <h2 class="home-heading19 section-heading">
              Lo que los usuarios dicen sobre nosotros.
            </h2>
          </header>
          <div class="home-right2">
            <p class="home-paragraph4 section-description">
              En TapTask creemos que la confianza se construye con
              experiencias reales. Por eso, cada reseña proviene de personas
              que ya utilizaron la plataforma y completaron una contratación.
              Sus opiniones reflejan la calidad del servicio, la transparencia
              en la comunicación y la seguridad de nuestra comunidad.
            </p>
          </div>
        </header>
        <main class="home-cards2">
          <div class="home-container3">
            <review-wrapper class="review-wrapper" rootclassname="reviewundefined">
              <!--Review component-->
              <section class="review-card reviewroot-class-name">
                <div class="review-stars">
                  <svg viewBox="0 0 1024 1024" class="review-icon10">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon12">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon14">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon16">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon18">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg>
                </div>
                <main class="review-content">
                  <p class="review-quote">
                    <span>
                    </span>
                  </p>
                  <div class="review-author1">
                    <img alt="image"
                      src="https://images.unsplash.com/photo-1610276198568-eb6d0ff53e48?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDF8fHBvdHJhaXR8ZW58MHx8fHwxNjY3NzU5NDE3&amp;ixlib=rb-4.0.3&amp;w=200"
                      class="review-avatar" />
                    <div class="review-details">
                      <h1 class="review-author2">
                        <span>Sima Mosbacher</span>
                      </h1>
                      <label class="review-position">
                        <span>Manager</span>
                      </label>
                    </div>
                  </div>
                </main>
              </section>
            </review-wrapper>
            <review-wrapper-0jrt class="review-wrapper-0jrt" rootclassname="reviewundefined">
              <!--Review component-->
              <section class="review-card1 reviewroot-class-name">
                <div class="review-stars1">
                  <svg viewBox="0 0 1024 1024" class="review-icon20">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon22">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon24">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon26">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon28">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg>
                </div>
                <main class="review-content1">
                  <p class="review-quote1">
                    <span>
                    </span>
                  </p>
                  <div class="review-author3">
                    <img alt="image"
                      src="https://images.unsplash.com/photo-1610276198568-eb6d0ff53e48?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDF8fHBvdHJhaXR8ZW58MHx8fHwxNjY3NzU5NDE3&amp;ixlib=rb-4.0.3&amp;w=200"
                      class="review-avatar1" />
                    <div class="review-details1">
                      <h1 class="review-author4">
                        <span>Sima Mosbacher</span>
                      </h1>
                      <label class="review-position1">
                        <span>Manager</span>
                      </label>
                    </div>
                  </div>
                </main>
              </section>
            </review-wrapper-0jrt>
          </div>
          <div class="home-container4">
            <review-wrapper-jtr1 class="review-wrapper-jtr1" rootclassname="reviewundefined">
              <!--Review component-->
              <section class="review-card2 reviewroot-class-name">
                <div class="review-stars2">
                  <svg viewBox="0 0 1024 1024" class="review-icon30">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon32">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon34">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon36">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon38">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg>
                </div>
                <main class="review-content2">
                  <p class="review-quote2">
                    <span>
                    </span>
                  </p>
                  <div class="review-author5">
                    <img alt="image"
                      src="https://images.unsplash.com/photo-1610276198568-eb6d0ff53e48?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDF8fHBvdHJhaXR8ZW58MHx8fHwxNjY3NzU5NDE3&amp;ixlib=rb-4.0.3&amp;w=200"
                      class="review-avatar2" />
                    <div class="review-details2">
                      <h1 class="review-author6">
                        <span>Sima Mosbacher</span>
                      </h1>
                      <label class="review-position2">
                        <span>Manager</span>
                      </label>
                    </div>
                  </div>
                </main>
              </section>
            </review-wrapper-jtr1>
            <review-wrapper-bav1 class="review-wrapper-bav1" rootclassname="reviewundefined">
              <!--Review component-->
              <section class="review-card3 reviewroot-class-name">
                <div class="review-stars3">
                  <svg viewBox="0 0 1024 1024" class="review-icon40">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon42">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon44">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon46">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon48">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg>
                </div>
                <main class="review-content3">
                  <p class="review-quote3">
                    <span>
                    </span>
                  </p>
                  <div class="review-author7">
                    <img alt="image"
                      src="https://images.unsplash.com/photo-1610276198568-eb6d0ff53e48?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDF8fHBvdHJhaXR8ZW58MHx8fHwxNjY3NzU5NDE3&amp;ixlib=rb-4.0.3&amp;w=200"
                      class="review-avatar3" />
                    <div class="review-details3">
                      <h1 class="review-author8">
                        <span>Sima Mosbacher</span>
                      </h1>
                      <label class="review-position3">
                        <span>Manager</span>
                      </label>
                    </div>
                  </div>
                </main>
              </section>
            </review-wrapper-bav1>
          </div>
          <div class="home-container5">
            <review-wrapper-5dhf class="review-wrapper-5dhf" rootclassname="reviewundefined">
              <section class="review-card4 reviewroot-class-name">
                <div class="review-stars4">
                  <svg viewBox="0 0 1024 1024" class="review-icon50">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon52">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon54">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon56">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon58">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg>
                </div>
                <main class="review-content4">
                  <p class="review-quote4">
                    <span>
                    </span>
                  </p>
                  <div class="review-author9">
                    <img alt="image"
                      src="https://images.unsplash.com/photo-1610276198568-eb6d0ff53e48?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDF8fHBvdHJhaXR8ZW58MHx8fHwxNjY3NzU5NDE3&amp;ixlib=rb-4.0.3&amp;w=200"
                      class="review-avatar4" />
                    <div class="review-details4">
                      <h1 class="review-author10">
                        <span>Sima Mosbacher</span>
                      </h1>
                      <label class="review-position4">
                        <span>Manager</span>
                      </label>
                    </div>
                  </div>
                </main>
              </section>
            </review-wrapper-5dhf>
            <review-wrapper-xsf2 class="review-wrapper-xsf2" rootclassname="reviewundefined">
              <section class="review-card5 reviewroot-class-name">
                <div class="review-stars5">
                  <svg viewBox="0 0 1024 1024" class="review-icon60">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon62">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon64">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon66">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg><svg viewBox="0 0 1024 1024" class="review-icon68">
                    <path d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                  </svg>
                </div>
                <main class="review-content5">
                  <p class="review-quote5">
                    <span>
                    </span>
                  </p>
                  <div class="review-author11">
                    <img alt="image"
                      src="https://images.unsplash.com/photo-1610276198568-eb6d0ff53e48?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDF8fHBvdHJhaXR8ZW58MHx8fHwxNjY3NzU5NDE3&amp;ixlib=rb-4.0.3&amp;w=200"
                      class="review-avatar5" />
                    <div class="review-details5">
                      <h1 class="review-author12">
                        <span>Sima Mosbacher</span>
                      </h1>
                      <label class="review-position5">
                        <span>Manager</span>
                      </label>
                    </div>
                  </div>
                </main>
              </section>
            </review-wrapper-xsf2>
          </div>
        </main>
        <div class="home-view-more">
          <p class="home-text24">View more</p>
        </div>
      </section>
      <section class="home-section21">
        <header class="home-header17">
          <span class="section-head">FAQ</span>
          <h2 class="home-heading20 section-heading">
            Preguntas frecuentes
          </h2>
        </header>
        <main class="home-accordion">
          <faq-wrapper class="faq-wrapper" rootclassname="fa-qundefined">
            <!--FAQ component-->
            <div class="faq-accordion fa-qroot-class-name">
              <div data-role="accordion-container" class="faq-element1 accordion-element">
                <div class="faq-details1">
                  <span class="faq-text10">
                    1. ¿Cómo funciona la TapTask para contratar un servicio?
                  </span>
                  <span data-role="accordion-content" class="faq-text11">
                    Primero, debes registrarte en Taptask.
                    Luego puedes buscar el servicio que necesitas, comparar perfiles, leer reseñas y contactar
                    directamente al proveedor. Una vez que acuerdes los detalles,podrás contratar y pagar de forma
                    segura desde la página.
                  </span>
                </div>
                <div data-role="accordion-icon">
                  <svg viewBox="0 0 1024 1024" class="faq-icon10">
                    <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                  </svg>
                </div>
              </div>
              <div data-role="accordion-container" class="faq-element2 accordion-element">
                <div class="faq-details2">
                  <span class="faq-text12">
                    2. ¿Es seguro pagar a través TapTask?
                  </span>
                  <span data-role="accordion-content" class="faq-text13">
                    Sí, utilizamos métodos de pago seguros y encriptados para proteger tus datos. Además, el pago se
                    libera al proveedor solo cuando confirmas que el servicio fue completado satisfactoriamente. Esto
                    protege tanto al cliente como al proveedor del servicio.
                  </span>
                </div>
                <div data-role="accordion-icon">
                  <svg viewBox="0 0 1024 1024" class="faq-icon12">
                    <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                  </svg>
                </div>
              </div>
              <div data-role="accordion-container" class="faq-element3 accordion-element">
                <div class="faq-details3">
                  <span class="faq-text14">
                    3. ¿Ofrecen garantía en sus servicios?
                  </span>
                  <span data-role="accordion-content" class="faq-text15">
                    Sí, todos nuestros servicios cuentan con garantía. El tiempo varía según el tipo de servicio
                    contratado.
                  </span>
                </div>
                <div data-role="accordion-icon">
                  <svg viewBox="0 0 1024 1024" class="faq-icon14">
                    <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                  </svg>
                </div>
              </div>
              <div data-role="accordion-container" class="faq-element4 accordion-element">
                <div class="faq-details4">
                  <span class="faq-text16">
                    4. ¿Cómo puedo ofrecer mis servicios en TapTask?
                  </span>
                  <span data-role="accordion-content" class="faq-text17">
                    Claro, solo necesitas crear una cuenta, configurar tu perfil profesional y publicar tus servicios.
                    Asegúrate de incluir una buena descripción, precios claros y ejemplos de tu trabajo para atraer más
                    clientes. La plataforma te permite gestionar tus solicitudes y pagos fácilmente.
                  </span>
                </div>
                <div data-role="accordion-icon">
                  <svg viewBox="0 0 1024 1024" class="faq-icon16">
                    <path d="M366 708l196-196-196-196 60-60 256 256-256 256z"></path>
                  </svg>
                </div>
              </div>
            </div>
          </faq-wrapper>
        </main>
      </section>
      <footer class="home-footer">
        <div class="home-content6">
          <main class="home-main-content">
            <div class="home-content7">
              <header class="home-main4">
                <div class="home-header19">
                  <img alt="image" src="../imagenesGNRL/PNGs/vilke'sPNG.png" class="home-branding" />
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
                    <span class="footer-header">Solutions</span>
                  </div>
                  <div class="home-links1">
                    <span class="footer-link">Responsive Web Design</span>
                    <span class="footer-link">Responsive Prototypes</span>
                    <span class="footer-link">Design to Code</span>
                    <span class="footer-link">Static Website Builder</span>
                    <span class="footer-link">Static Website Generator</span>
                  </div>
                </div>
                <div class="home-category2">
                  <div class="home-header21">
                    <span class="footer-header">Company</span>
                  </div>
                  <div class="home-links2">
                    <span class="footer-link">About</span>
                    <span class="footer-link">Team</span>
                    <span class="footer-link">News</span>
                    <span class="footer-link">Partners</span>
                    <span class="footer-link">Careers</span>
                    <span class="footer-link">Press &amp; Media</span>
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
              <h1 class="home-heading22">Subscribe to our newsletter</h1>
              <div class="home-input-field">
                <input type="email" placeholder="Enter your email" class="home-textinput input" />
                <div class="home-buy button">
                  <span class="home-text42">-&gt;</span>
                  <span class="home-text43">
                    <span>Subscribe now</span>
                    <br />
                  </span>
                </div>
              </div>
            </main>
            <h1 class="home-notice">
              By subscribing to our newsletter you agree with our Terms and
              Conditions.
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
      <div>
        <div class="home-container7">

          <script>
            const listenForUrlChangesAccordion = () => {
              let url = location.href;
              document.body.addEventListener(
                'click',
                () => {
                  requestAnimationFrame(() => {
                    if (url !== location.href) {
                      runAccordionCodeEmbed();
                      url = location.href;
                    }
                  });
                },
                true
              );
            };
            const runAccordionCodeEmbed = () => {
              const accordionContainers = document.querySelectorAll('[data-role="accordion-container"]');
              const accordionContents = document.querySelectorAll('[data-role="accordion-content"]');
              const accordionIcons = document.querySelectorAll('[data-role="accordion-icon"]');
              accordionContents.forEach((accordionContent) => {
                accordionContent.style.display = 'none';
              });
              accordionContainers.forEach((accordionContainer, index) => {
                accordionContainer.addEventListener('click', () => {
                  accordionContents.forEach((accordionContent) => {
                    accordionContent.style.display = 'none';
                  });
                  accordionIcons.forEach((accordionIcon) => {
                    accordionIcon.style.transform = 'rotate(0deg)';
                  });
                  accordionContents[index].style.display = 'flex';
                  accordionIcons[index].style.transform = 'rotate(180deg)';
                });
              });
            }
            runAccordionCodeEmbed();
            listenForUrlChangesAccordion();
          </script>
        </div>
      </div>
    </div>
  </div>
<script src="../javascripts/appEstadoSesion.js"></script>
</body>
</html>