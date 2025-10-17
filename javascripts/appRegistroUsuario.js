window.addEventListener('load', () => {
  const form = document.querySelector('form[action="../controladores/controladorRegistroUsuario.php"]');

  const inputNombreUsuario = form.nombreUsuario;
  const inputNombre = document.getElementById('nombre');
  const inputApellido = form.apellido;
  const inputTelefono = form.telefono;
  const inputEmail = form.email;
  const inputContrasena = form.contrasena;
  const inputFecha = document.getElementById('fechaNacimiento');



  // Función para eliminar números de cualquier texto
  function eliminarNumeros(texto) {
    return texto.replace(/[0-9]/g, '');
  }

  // Bloquear que se escriban números en keydown
  function bloquearNumeros(e) {
    const teclasPermitidas = ['Backspace', 'ArrowLeft', 'ArrowRight', 'Tab', 'Delete', 'Home', 'End', 'Enter', ' '];
    if (teclasPermitidas.includes(e.key)) return;
    if (e.key >= '0' && e.key <= '9') {
      e.preventDefault();
    }
  }

  // Validar y limpiar input en tiempo real (por si pegan texto con números)
  function validarInputEnTiempoReal(input, errorSpan) {
    input.addEventListener('keydown', bloquearNumeros);
    input.addEventListener('input', () => {
      const valorSinNumeros = eliminarNumeros(input.value);
      if (input.value !== valorSinNumeros) {
        input.value = valorSinNumeros;
        errorSpan.textContent = "No se permiten números.";
      } else {
        errorSpan.textContent = "";
      }
    });
  }

  validarInputEnTiempoReal(inputNombre, document.getElementById('error-nombre'));
  validarInputEnTiempoReal(inputApellido, document.getElementById('error-apellido'));

  // Evitar envío si campos están vacíos o con números (extra validación)
  document.getElementById('formulario').addEventListener('submit', (e) => {
    if (inputNombre.value.trim() === '' || inputApellido.value.trim() === '') {
      e.preventDefault();
      alert('Por favor, completa todos los campos sin números.');
    }
  });
  
  function validarNombreUsuario() {
    const val = inputNombreUsuario.value.trim();
    if (!/^[a-zA-Z0-9_]{3,15}$/.test(val)) {
      mostrarError(inputNombreUsuario, 'El nombre de usuario debe tener 3-15 caracteres, solo letras, números y guiones bajos.');
      return false;
    } else {
      eliminarError(inputNombreUsuario);
      return true;
    }
  }

  function validarNombre() {
    const val = inputNombre.value.trim();
    if (!/^[a-zA-ZÀ-ÿ\s]{2,}$/.test(val)) {
      mostrarError(inputNombre, 'El nombre debe tener al menos 2 letras y solo contener letras y espacios.');
      return false;
    } else {
      eliminarError(inputNombre);
      return true;
    }
  }

  function validarApellido() {
    const val = inputApellido.value.trim();
    if (!/^[a-zA-ZÀ-ÿ\s]{2,}$/.test(val)) {
      mostrarError(inputApellido, 'El apellido debe tener al menos 2 letras y solo contener letras y espacios.');
      return false;
    } else {
      eliminarError(inputApellido);
      return true;
    }
  }

  function validarTelefono() {
    const val = inputTelefono.value.trim();
    if (val.length > 0 && !/^\d{7,15}$/.test(val)) {
      mostrarError(inputTelefono, 'El teléfono debe tener entre 7 y 15 números, sin espacios ni símbolos.');
      return false;
    } else {
      eliminarError(inputTelefono);
      return true;
    }
  }

  function validarEmail() {
    const val = inputEmail.value.trim();
    if (!/^\S+@\S+\.\S+$/.test(val)) {
      mostrarError(inputEmail, 'Ingresa un email válido.');
      return false;
    } else {
      eliminarError(inputEmail);
      return true;
    }
  }

  function validarContrasena() {
    const val = inputContrasena.value;
    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/.test(val)) {
      mostrarError(inputContrasena, 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un símbolo.');
      return false;
    } else {
      eliminarError(inputContrasena);
      return true;
    }
  }

  function validarFechaNacimiento() {
    const val = inputFecha.value;
    if (!val) {
      mostrarError(inputFecha, 'Por favor, ingresa tu fecha de nacimiento.');
      return false;
    }

    const fecha = new Date(val);
    const hoy = new Date();
    hoy.setHours(0, 0, 0, 0);

    const edadMin = 16;
    const edadMax = 100;

    const fechaMaxima = new Date(hoy.getFullYear() - edadMin, hoy.getMonth(), hoy.getDate());
    const fechaMinima = new Date(hoy.getFullYear() - edadMax, hoy.getMonth(), hoy.getDate());

    if (fecha > hoy) {
      mostrarError(inputFecha, 'La fecha no puede estar en el futuro.');
      return false;
    } else if (fecha > fechaMaxima) {
      mostrarError(inputFecha, 'Debes tener al menos 16 años.');
      return false;
    } else if (fecha < fechaMinima) {
      mostrarError(inputFecha, 'La edad máxima permitida es 100 años.');
      return false;
    } else {
      eliminarError(inputFecha);
      return true;
    }
  }

  // --- Validar nombre sin números en tiempo real y bloquear num en keydown ---
  inputNombre.addEventListener('keydown', (e) => {
    const teclasPermitidas = ['Backspace', 'ArrowLeft', 'ArrowRight', 'Tab', 'Delete', 'Home', 'End'];
    if (teclasPermitidas.includes(e.key)) return;
    if (e.key >= '0' && e.key <= '9') e.preventDefault();
  });
  inputNombre.addEventListener('input', () => {
    inputNombre.value = inputNombre.value.replace(/[0-9]/g, '');
    validarNombre();
  });

  // --- Escuchar input en todos para validar en tiempo real ---
  inputNombreUsuario.addEventListener('input', validarNombreUsuario);
  inputApellido.addEventListener('input', validarApellido);
  inputTelefono.addEventListener('input', validarTelefono);
  inputEmail.addEventListener('input', validarEmail);
  inputContrasena.addEventListener('input', validarContrasena);
  inputFecha.addEventListener('change', validarFechaNacimiento);

  // --- Validar todo al enviar ---
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    eliminarErrores();

    const valido =
      validarNombreUsuario() &&
      validarNombre() &&
      validarApellido() &&
      validarTelefono() &&
      validarEmail() &&
      validarContrasena() &&
      validarFechaNacimiento();

    if (valido) {
      form.submit();
    }
  });

  // --- Mostrar y eliminar errores ---
  function mostrarError(input, mensaje) {
    let error = input.parentNode.querySelector('.error-validacion');
    if (!error) {
      error = document.createElement('span');
      error.className = 'error-validacion';
      error.style.color = 'red';
      error.style.fontSize = '0.9em';
      input.parentNode.appendChild(error);
    }
    error.textContent = mensaje;
  }

  function eliminarError(input) {
    const error = input.parentNode.querySelector('.error-validacion');
    if (error) error.remove();
  }

  function eliminarErrores() {
    document.querySelectorAll('.error-validacion').forEach(e => e.remove());
  }
});