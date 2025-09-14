document.addEventListener("DOMContentLoaded", () => {

const precioInput = document.getElementById("precio");
const rut = document.getElementById("rut");
const nombreEmpresa = document.getElementById("nombreEmpresa");
const empresaAsociada= document.getElementById("empresaAsociada");
const mensaje = document.getElementById("mensaje");
const tel = document.getElementById('telefono');
const email = document.getElementById("email");
const contrasena = document.getElementById("contrasena");
const nombre = document.getElementById("nombre");
const apellido = document.getElementById("apellido");
const calle = document.getElementById("calle");
const numero = document.getElementById("numero");
const codigoPostal= document.getElementById("codigoPostal");
const nombreUsuario = document.getElementById("nombreUsuario"); 

if (calle) { // "calle" es tu input
  calle.addEventListener("input", (e) => {
    let valor = e.target.value;

    // quitar caracteres inválidos: todo que no sea letra, número, espacio, - o /
    let limpio = '';
    let tieneGuion = false;
    let tieneBarra = false;
    for (let i = 0; i < valor.length; i++) {
      const c = valor[i];
      console.log(c);

      // letra Unicode (mayúscula o minúscula)
      if (c.match(/\p{L}/u)) {
        limpio += c;
      }
      // dígito
      else if (c >= '0' && c <= '9') {
        limpio += c;
      }
      // espacio
      else if (c === ' ') {
        limpio += c;
      }
      // guion, solo uno
      else if (c === '-' && !tieneGuion && !tieneBarra) {
        limpio += c;
        tieneGuion = true;
      }
      // barra, solo una
      else if (c === '/' && !tieneBarra && !tieneGuion) {
        limpio += c;
        tieneBarra = true;
      }
      // ignorar todo lo demás
    }

    // limitar a 50 caracteres
    if (limpio.length > 24) {
      limpio = limpio.slice(0, 24);
    }

    e.target.value = limpio;
  });
}
if(nombre){
  nombre.addEventListener("input", (e) => {
    let soloLetras = e.target.value.replace(/[^\p{L}]/gu, '');
    if (soloLetras.length > 20) {
      soloLetras = soloLetras.slice(0, 20);
    }

    e.target.value = soloLetras;
  });
}
if(apellido){
  apellido.addEventListener("input", (e) => {
    let soloLetras = e.target.value.replace(/[^\p{L}]/gu, '');
    if (soloLetras.length > 20) {
      soloLetras = soloLetras.slice(0, 20);
    }

    e.target.value = soloLetras;
  });
}
if(nombreUsuario){
nombreUsuario.addEventListener("input", (e) => {
  let soloLetras = e.target.value.replace(/[^\p{L}\p{N}]/gu, '');
  if (soloLetras.length > 30) {
    soloLetras = soloLetras.slice(0, 30);
  }
  e.target.value = soloLetras;
});
}
if(numero){
numero.addEventListener("input", (e) => {
  let soloDigitos = e.target.value.replace(/\W/g, '');
  if (soloDigitos.length > 5) {
    soloDigitos = soloDigitos.slice(0, 5);
  }
  e.target.value = soloDigitos;
});
}
if(codigoPostal){
codigoPostal.addEventListener("input", (e) => {
  let soloDigitos = e.target.value.replace(/\D/g, '');
  if (soloDigitos.length > 4) {
    soloDigitos = soloDigitos.slice(0, 5);
  }
  e.target.value = soloDigitos;
});
}
if(empresaAsociada){
empresaAsociada.addEventListener("input", (e) => {
  let soloLetras = e.target.value.replace(/[^\p{L}\p{N}]/gu, '');
  if (soloLetras.length > 30) {
    soloLetras = soloLetras.slice(0, 30);
  }
  e.target.value = soloLetras;
});
}
if(nombreEmpresa){
nombreEmpresa.addEventListener("input", (e) => {
  let soloLetras = e.target.value.replace(/[^\p{L}\p{N}]/gu, '');
  if (soloLetras.length > 30) {
    soloLetras = soloLetras.slice(0, 30);
  }
  e.target.value = soloLetras;
});
}
if(tel){
  tel.addEventListener('input', (e) => {
  let valor = e.target.value.replace(/\D/g, '');
  if(valor.length >9){
    valor =  valor.slice(0,9);
  }
  e.target.value = valor;
});
}
  if(precioInput){
  precioInput.addEventListener("input", (e) => {
  let soloDigitos = e.target.value.replace(/\D/g, '');
  if (soloDigitos.length > 10) {
    soloDigitos = soloDigitos.slice(0, 10);
    mensaje.style.display = "block";
  } else {
    mensaje.style.display = "none";
  }
  e.target.value = soloDigitos;
});
}
if (rut) {
    rut.addEventListener("input", (e) => {
        let valor = e.target.value.trim().replace(/\D/g,'');
        if(valor.length > 12){
          valor = valor.slice(0,12)
        }
        e.target.value = valor;
    });
}
if(email){
email.addEventListener("input", (e) => {
  // convertir a minúsculas y eliminar espacios
  let valor = e.target.value.toLowerCase().replace(/\s/g, '');
  e.target.value = valor;
});
}
if(contrasena){
contrasena.addEventListener("input", (e) => {
  // eliminar espacios
  let valor = e.target.value.replace(/\s/g, '');
  e.target.value = valor;
});
}
});
