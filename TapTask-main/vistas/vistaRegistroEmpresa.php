<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro Empresa</title>
  <link rel="stylesheet" href="../css/stylesEmpresa.css" />
</head>
<body>
  <div class="header">
  <img src="../imagenesGNRL/PNGs/taptaskPNGwhite.png" alt="Logo" class="logo" />
</div>
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
            <input id="contrasena" name="contrasena" type="password" placeholder="Contraseña" autocomplete="off" required />
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
  <div class="tailer">
  <img src="../imagenesGNRL/PNGs/copyright.png" alt="Copy" class="copy">
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
      const localidades = data
        .filter(item => item.departamento === depSeleccionado)
        .map(item => item.localidad);

      localidades.forEach(loc => {
        let option = document.createElement("option");
        option.value = loc;
        option.textContent = loc;
        locSelect.appendChild(option);
      });
    });
</script>
<script src="../javascripts/appValidaciones.js"></script>
</body>
</html>