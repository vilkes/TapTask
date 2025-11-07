window.addEventListener('load', () => {
  const spanAcc = document.querySelector('.acc-option1');
  const input = document.querySelector('.contenedorAccesibilidad input');
  const logo = document.getElementById('logo');
  const logo2 = document.querySelector('.home-branding');

  // 🔄 Función que cambia todo el tema
  const aplicarTema = (tema) => {
    document.body.classList.remove('tema-claro', 'tema-oscuro');
    document.body.classList.add(tema);
    document.querySelectorAll('.tema-claro, .tema-oscuro').forEach(el => {
      el.classList.remove('tema-claro', 'tema-oscuro');
      el.classList.add(tema);
    });

    // Cambiar logos e indicador de texto
    if (tema === 'tema-claro') {
      spanAcc.textContent = "Tema actual: Lights on";
      if (logo) logo.src = logo.dataset.srcLight;
      if (logo2) logo2.src = logo2.dataset.srcLight;
    } else {
      spanAcc.textContent = "Tema actual: Lights off";
      if (logo) logo.src = logo.dataset.srcDark;
      if (logo2) logo2.src = logo2.dataset.srcDark;
    }
  };

  // Aplicar tema inicial
  if (input) {
  aplicarTema(input.checked ? 'tema-claro' : 'tema-oscuro');

  // Escuchar cambios
  input.addEventListener('click', () => {
    aplicarTema(input.checked ? 'tema-claro' : 'tema-oscuro');
  });
    }
});