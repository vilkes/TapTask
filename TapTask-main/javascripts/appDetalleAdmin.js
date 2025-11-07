document.addEventListener("DOMContentLoaded", async () => {
  const params = new URLSearchParams(window.location.search);
  const id = params.get("id");
  const tipo = params.get("tipo");
  const contenedor = document.getElementById("detalleContainer");
  const btnEliminar = document.getElementById("btnEliminar");
  console.log("ID:", id, "Tipo:", tipo);

  if (!id || !tipo) {
    contenedor.innerHTML = "<h2 style='color:red;'>Faltan parámetros en la URL.</h2>";
    return;
  }
  if (tipo === "usuario") {
  document.getElementById("btnEliminar").style.display = "inline-block";
}

  let apiURL = "";
  if (tipo === "servicio") {
    apiURL = `../apis/apiMostrarServicioDetallado.php?id=${id}`;
  } else if (tipo === "usuario") {
    apiURL = `../apis/apiMostrarUsuarioDetallado.php?id=${id}`;
  } else {
    contenedor.innerHTML = "<h2 style='color:red;'>Tipo desconocido.</h2>";
    return;
  }

  try {
    const res = await fetch(apiURL);
    const data = await res.json();
    console.log(data);
    if (data.error) {
      contenedor.innerHTML = `<h2 style='color:red;'>${data.error}</h2>`;
      console.log("mal");
      return;
    }
    console.log(data);
    let html = `<h1>Detalles del ${tipo === "servicio" ? "Servicio" : "Usuario"} #${id}</h1><table>`;
    for (const [clave, valor] of Object.entries(data)) {
      if (clave === "imagenes" && Array.isArray(valor)) {
        html += `<tr><th>Imágenes</th><td>`;
        valor.forEach(img => {
          html += `<img src="${img.imagenes}" alt="imagen servicio">`;
        });
        html += `</td></tr>`;
      } else {
       if (typeof valor === "object" && valor !== null) {
        // Si es un objeto, mostrás sus claves y valores
        const contenido = Object.entries(valor)
          .map(([k, v]) => `${k}: ${v}`)
          .join("<br>");
        html += `<tr><th>${clave}</th><td>${contenido}</td></tr>`;
      } else {
        html += `<tr><th>${clave}</th><td>${valor ?? "-"}</td></tr>`;
      }
      }
    }
    html += `</table>`;
    if (tipo === "servicio" && data.iduser_servicio) {
      html += `<p>Usuario dueno: <a href="vistaAdminDetallada.php?tipo=usuario&id=${data.iduser_servicio}" style="color:blue;">Ver usuario</a></p>`;
    }

    contenedor.innerHTML = html;
  } catch (err) {
    contenedor.innerHTML = `<h2 style='color:red;'>Error al cargar detalles: ${err.message}</h2>`;
  }

  let modoEdicion = false;

document.getElementById("btnEditar").addEventListener("click", () => {
  const contenedor = document.getElementById("detalleContainer");
  const filas = contenedor.querySelectorAll("table tr");

  filas.forEach(fila => {
    const th = fila.querySelector("th");
    const td = fila.querySelector("td");
    if (!td || !th) return;

    const lineas = td.innerHTML.split("<br>");
    let nuevoContenido = "";

    lineas.forEach(linea => {
      const partes = linea.split(":");
      if (partes.length < 2) return;

      const clave = partes[0].trim();
      const valor = partes.slice(1).join(":").trim();

      // Campos no editables
      const noEditable = ["iduser","iduser_telefonos","iduser_clientes", "email_cl", "contrasena", "creacion", "eliminacion", "suspension"];
      if (noEditable.includes(clave.toLowerCase()) || clave === "") {
        nuevoContenido += `${clave}: ${valor}<br>`;
      } else {
        // Campos editables
        nuevoContenido += `${clave}: <input type="text" name="${clave}" value="${valor}" style="width:90%; padding:5px;"><br>`;
      }
    });

    td.innerHTML = nuevoContenido;
  });

  document.getElementById("btnEditar").style.display = "none";
  document.getElementById("btnGuardar").style.display = "inline-block";
  modoEdicion = true;
});

btnEliminar.addEventListener("click", async () => {
  const confirmar = confirm("¿Seguro que quieres eliminar este usuario? Esta acción no se puede deshacer ⚠️");
  if (!confirmar) return;

  const params = new URLSearchParams(window.location.search);
  const id = params.get("id");
  const tipo = params.get("tipo");

  if (tipo !== "usuario") {
    alert("Solo se pueden eliminar usuarios desde esta vista.");
    return;
  }

  try {
    const res = await fetch("../apis/apiEliminarUsuario.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id })
    });
    const data = await res.json();
    console.log("Respuesta del servidor:", data);

    if (data.success == true) {
      alert("✅ Usuario eliminado correctamente");
      setTimeout(() => {
        window.location.href = "../vistas/vistaAdministrador.php"; // o donde quieras ir
      }, 1000);
    } else {
      alert("❌ Error: " + data.message);
    }
  } catch (err) {
    alert("⚠️ Error al eliminar: " + err.message);
  }
});

document.getElementById("btnGuardar").addEventListener("click", async () => {
  if (!modoEdicion) return;

  const inputs = document.querySelectorAll("#detalleContainer input");
  const datosActualizados = {};

  inputs.forEach(input => {
    datosActualizados[input.name] = input.value;
  });
  console.log("Datos a guardar:", datosActualizados);
  try {
    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");
    const tipo = params.get("tipo");
    console.log("ID:", id, "Tipo:", tipo, "Datos:", datosActualizados);
    const res = await fetch("../apis/apiEditarUsuario.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id, tipo, datos: datosActualizados })
    });
    const resultado = await res.json();
    if (resultado.success) {
      alert("Datos actualizados correctamente ✅");
      location.reload();
    } else {
      alert("Error: " + resultado.error);
    }
  } catch (err) {
    alert("Error al guardar: " + err.message);
  }
});
});