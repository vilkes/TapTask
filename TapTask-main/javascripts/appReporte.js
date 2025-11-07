document.addEventListener("DOMContentLoaded", () => {
  console.log("JS de reportes cargado 💬");

  const checkboxes = document.querySelectorAll(".report-checkbox");
  const textarea = document.getElementById("report");
  const btnEnviar = document.getElementById("btnEnviarReporte");
  const idUser = document.getElementById("idCliente")?.value;
  const idServicio = document.getElementById("idServicio")?.value;

  let idProveedor = null;

  // Detectar dinámicamente el ID del proveedor (si aparece después)
  const observer = new MutationObserver(() => {
    const linkProveedor = document.getElementById("linkChatProveedor");
    if (linkProveedor) {
      idProveedor = linkProveedor.dataset.id;
      console.log("Elemento detectado ✅ ID del proveedor:", idProveedor);
      observer.disconnect();
    }
  });
  observer.observe(document.body, { childList: true, subtree: true });

  // ✅ Solo permitir un checkbox marcado a la vez
  checkboxes.forEach((chk) => {
    chk.addEventListener("change", () => {
      if (chk.checked) {
        checkboxes.forEach((other) => {
          if (other !== chk) other.checked = false;
        });
      }
    });
  });

  // 📨 Enviar reporte
  btnEnviar.addEventListener("click", async () => {
    const seleccionado = Array.from(checkboxes).find((c) => c.checked);
    const contenido = textarea.value.trim();

    if (!seleccionado) {
      alert("Selecciona un motivo antes de enviar");
      return;
    }

    if (contenido.length < 10) {
      alert("Por favor, describe el problema con más detalle");
      return;
    }

    if (!idUser) {
      alert("Debes iniciar sesión para enviar un reporte");
      return;
    }

    // ✅ Usamos el value numérico (0, 1, 2, etc.)
    const tipoReporte = seleccionado.value;

    // ✅ Detectamos si es un reporte a proveedor o a servicio
    const esProveedor = seleccionado.closest(".contenido-reportar-der") !== null;

    let urlAPI = "";
    let datos = {};

    if (esProveedor && idProveedor) {
      urlAPI = "../apis/apiCrearReporteP.php";
      datos = { tipoReporte, contenido, idProveedor, idUser };
    } else if (!esProveedor && idServicio) {
      urlAPI = "../apis/apiCrearReporteS.php";
      datos = { tipoReporte, contenido, idServicio, idUser };
    } else {
      alert("No se encontró el destino del reporte 😕");
      return;
    }

    try {
      const resp = await fetch(urlAPI, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams(datos),
      });

      const result = await resp.json();
      console.log("Respuesta del servidor:", result);

      if (result.success) {
        alert("Reporte enviado correctamente ✅");
        textarea.value = "";
        checkboxes.forEach((c) => (c.checked = false));
      } else {
        alert(result.error || "Error al enviar el reporte ❌");
      }
    } catch (err) {
      console.error("Error al enviar reporte:", err);
      alert("Error al conectar con el servidor ⚠️");
    }
  });
});