const signUpButton = document.getElementById('signUp')
const signInButton = document.getElementById('signIn')
const container = document.getElementById('container')
const background = document.getElementById('background-blur')

signUpButton.addEventListener('click', () => {
  container.classList.add('right-panel-active')
})

signInButton.addEventListener('click', () => {
  container.classList.remove('right-panel-active')
})

window.addEventListener('load', () => {
  const form = document.querySelector('.sign-in-container form');

  form.addEventListener('submit', (event) => {
    event.preventDefault();

    eliminarErrores();

    let esValido = true;

    const email = form.querySelector('input[type="email"]').value.trim();
    const password = form.querySelector('input[type="password"]').value;

    // Validar email
    if(!/^\S+@\S+\.\S+$/.test(email)) {
      mostrarError(form.querySelector('input[type="email"]'), 'Ingresa un email válido.');
      esValido = false;
    }

    // Validar contraseña (no vacía)
    if(password.length === 0) {
      mostrarError(form.querySelector('input[type="password"]'), 'La contraseña no puede estar vacía.');
      esValido = false;
    }

    if(esValido) {
      form.submit();
    }
  });

  function mostrarError(input, mensaje) {
    let error = input.parentNode.querySelector('.error-validacion');
    if(!error) {
      error = document.createElement('span');
      error.className = 'error-validacion';
      error.style.color = 'red';
      error.style.fontSize = '0.9em';
      input.parentNode.appendChild(error);
    }
    error.textContent = mensaje;
    input.focus();
  }

  function eliminarErrores() {
    const errores = document.querySelectorAll('.error-validacion');
    errores.forEach(error => error.remove());
  }
});