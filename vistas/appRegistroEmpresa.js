window.addEventListener('load', () => {
  const form = document.querySelector('form[action="../controladores/controladorRegistroUsuario.php"]');

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    eliminarErrores();
    let esValido = true;

    const nombreEmpresa = form.nombreEmpresa.value.trim();
    const empresaAsociada = form.empresaAsociada.value.trim();
    const RUT = form.RUT.value.trim();
    const email = form.email.value.trim();
    const telefono = form.telefono.value.trim();
    const direccion = form.direccion.value.trim();
    const codigoPostal = form.codigoPostal.value.trim();
    const rubro = form.rubro.value.trim();
    const contrasena = form.contrasena.value;

    // nombreEmpresa: letras, números, espacios, guiones y puntos permitidos, mínimo 2 caracteres
    if(!/^[a-zA-Z0-9\s\-\.\&]{2,}$/.test(nombreEmpresa)) {
      mostrarError(form.nombreEmpresa, 'El nombre de la empresa debe tener al menos 2 caracteres y solo letras, números, espacios, "-", ".", "&".');
      esValido = false;
    }

    // empresaAsociada: letras, números, espacios, mínimo 2 caracteres
    if(!/^[a-zA-Z0-9\s]{2,}$/.test(empresaAsociada)) {
      mostrarError(form.empresaAsociada, 'La razón social debe tener al menos 2 caracteres y solo letras, números y espacios.');
      esValido = false;
    }

    // RUT: formato general, números, letras y guion (Ej: 12345678-9 o 12.345.678-9)
    if(!/^[0-9.\-Kk]{7,15}$/.test(RUT)) {
      mostrarError(form.RUT, 'Ingrese un RUT/NIT/CUIT válido (números, puntos, guion y K).');
      esValido = false;
    }

    // Email
    if(!/^\S+@\S+\.\S+$/.test(email)) {
      mostrarError(form.email, 'Ingrese un correo válido.');
      esValido = false;
    }

    // Teléfono (7 a 15 dígitos)
    if(!/^\d{7,15}$/.test(telefono)) {
      mostrarError(form.telefono, 'El teléfono debe tener entre 7 y 15 números, sin espacios ni símbolos.');
      esValido = false;
    }

    // Dirección: mínimo 3 caracteres, letras, números, espacios, comas, puntos, guiones
    if(!/^[a-zA-Z0-9\s\.,\-#]{3,}$/.test(direccion)) {
      mostrarError(form.direccion, 'Ingrese una dirección válida.');
      esValido = false;
    }

    // Código postal: 3-10 caracteres, números o letras
    if(!/^[a-zA-Z0-9]{3,10}$/.test(codigoPostal)) {
      mostrarError(form.codigoPostal, 'Código postal inválido.');
      esValido = false;
    }

    // Rubro: solo letras y espacios, mínimo 2 caracteres
    if(!/^[a-zA-Z\s]{2,}$/.test(rubro)) {
      mostrarError(form.rubro, 'Ingrese un rubro válido (solo letras y espacios).');
      esValido = false;
    }

    // Contraseña
    if(!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/.test(contrasena)) {
      mostrarError(form.contrasena, 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo.');
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