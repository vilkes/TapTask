async function cargarDatos(apiRuta) {
  const contenedor = document.getElementById("contenido");

  try {
    const response = await fetch(`../apis/${apiRuta}.php`);
    if (!response.ok) throw new Error("Error al obtener datos del servidor");

    const datos = await response.json();
    console.log("Datos recibidos:", datos);

    // Detectar si es un objeto con múltiples arrays (usuarios) o un array plano (servicios)
    let arrayDatos = [];
    if (datos.clientes || datos.empresas || datos.administrador) {
      // Fusionar usuarios sin duplicados
      const usuariosMap = {};
      const procesarArray = (array, tipo) => {
        (array || []).forEach(fila => {
          const id = fila.usuario?.iduser || fila.iduser_administradores || fila.iduser_proveedor;
          if (!id) return;

          if (!usuariosMap[id]) {
            usuariosMap[id] = {
              id,
              nombreUsuario: fila.usuario?.nombreUsuario || fila.usuario?.nombre || fila.empresa?.empresa_asociada || "-",
              email: "-",
              tipo: "-"
            };
          }
          if (tipo === "Cliente" && fila.cliente?.email_cl) {
            usuariosMap[id].email = fila.cliente.email_cl;
            usuariosMap[id].tipo = "Cliente";
          } else if (tipo === "Empresa" && fila.empresa?.email_em) {
            usuariosMap[id].email = fila.empresa.email_em;
            usuariosMap[id].tipo = "Empresa";
          } else if (tipo === "Administrador" && fila.tipo_admin) {
            usuariosMap[id].email = fila.email_admin;
            usuariosMap[id].tipo = fila.tipo_admin;
          }
        });
      };
      procesarArray(datos.clientes, "Cliente");
      procesarArray(datos.empresas, "Empresa");
      procesarArray(datos.administrador, "Administrador");
      arrayDatos = Object.values(usuariosMap);
    } else if (Array.isArray(datos)) {
      arrayDatos = datos; // servicios, resenas, etc.
    } else {
      contenedor.innerHTML = `<p>No se encontraron resultados.</p>`;
      return;
    }

    if (arrayDatos.length === 0) {
      contenedor.innerHTML = `<p>No se encontraron resultados.</p>`;
      return;
    }

    // Generar tabla
    let html = `<table border="1" style="border-collapse:collapse; width:100%;">`;

    // Encabezados
    html += "<tr>";
    Object.keys(arrayDatos[0]).forEach(clave => {

      html += `<th>${clave}</th>`;
    });
    html += "</tr>";

    // Filas
    arrayDatos.forEach(fila => {
    html += "<tr>";

    Object.entries(fila).forEach(([clave, valor]) => {
      if (valor === false || valor === null) valor = "-";
      else if (typeof valor === "object") valor = Object.values(valor).join(" | ");

      // Determinar el tipo de dato: usuario o servicio
      const tipo = (datos.clientes || datos.empresas || datos.administrador) ? "usuario" : "servicio";

      // Detectar si la columna es un ID válido
      if (clave.toLowerCase().includes("id") && !isNaN(valor) && valor !== "-") {
        html += `<td><a href="../vistas/vistaAdminDetallada.php?tipo=${tipo}&id=${valor}" target="_blank">${valor}</a></td>`;
      } else {
        html += `<td>${valor}</td>`;
      }
    });

    html += "</tr>";
  });

    html += "</table>";
    contenedor.innerHTML = html;

  } catch (error) {
    contenedor.innerHTML = `<p style="color:red;">${error.message}</p>`;
  }
}

// DOM listo
document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM cargado, activando botones");

  document.getElementById("btnUsuarios").addEventListener("click", () => cargarDatos("apiListarUsuarios"));
  document.getElementById("btnServicios").addEventListener("click", () => cargarDatos("apiMostrarServicios"));
});