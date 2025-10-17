async function cargarServicio(id) {
    try {
        const query = new URLSearchParams({ accion: "obtener", id: id });
        const res = await fetch("../apis/apiServicio.php?" + query.toString());
        const data = await res.json();

        const img = document.getElementById("detalleServicio");
        const informacion= document.getElementById("info");
        if (data.error) {
            img.src = "../imagenesGNRL/fondos/default.png";
            return;
        }
        img.src = data.imagenes[0]?.imagenes || "../imagenesGNRL/fondos/default.jpg";
        let html = '';
        if (data.titulo) {
            html += `<h2>${data.titulo}</h2>`;
        }
        if (data.descripcion) {
            html += `<p>Descripción: ${data.descripcion}</p>`;
        }
        if (data.etiquetas) {
            html += `<p>Categoría: ${data.etiquetas}</p>`;
        }
        if (data.ubicacion) {
            html += `<p>Ubicación: ${data.ubicacion}</p>`;
        }
        if (data.tipoServicio) {
            html += `<p>Tipo de servicio: ${data.tipoServicio}</p>`;
        }
        if (data.hora_inicio && data.hora_final) {
            html += `<p>Horario: ${data.hora_inicio} - ${data.hora_final}</p>`;
        }
        if (data.duracion) {
            html += `<p>Duración: ${data.duracion} horas</p>`;
        }
        if (data.precio) {
            html += `<div class="precio">Precio: $${data.precio}</div>`;
        }
        html += `
        <form id="reservaForm" method="POST" action="../controladores/controladorReserva.php">
            <label for="fechaReserva">Selecciona fecha y hora:</label>
            <input type="datetime-local" id="fechaReserva" name="fechaReserva" min="<?= date('Y-m-d\TH:i') ?>">
            <input type="hidden" id="idService" name="idService" value="${data.idservice}"> <!-- Aquí va el id del servicio -->
            <button id="btnComprar" type="submit">Reservar</button>
        </form>`;
        info.innerHTML = html;
        /*
        function showToast(mensaje) {
            const toast = document.getElementById("toast");
            toast.innerText = mensaje;
            toast.style.visibility = "visible";
            toast.style.opacity = 1;
            setTimeout(() => {
                toast.style.opacity = 0;
                toast.style.visibility = "hidden";
            }, 3000);
        }*/
        // Uso:
        document.getElementById("btnComprar").addEventListener("click", () => {
            const fechaSeleccionada = document.getElementById("fechaReserva").value;

    if (!fechaSeleccionada) {
        alert("Por favor, selecciona un día para la reserva.");
        return;
    }

    // Aquí iría tu lógica de reserva, por ejemplo enviar por fetch a tu API
    showToast(`Servicio reservado para el ${fechaSeleccionada}`);
        });
        console.log(data);
    } catch (error) {
        console.error("Error al cargar servicio:", error);
    }
    flatpickr("#fechaReserva", {
    minDate: "today",        // No permite fechas pasadas
    dateFormat: "Y-m-d H:i",
    enableTime: true, 
    time_24hr: true,  
});
}

const params = new URLSearchParams(window.location.search);
const idServicio = params.get("id");
if (idServicio) {
    cargarServicio(idServicio);
}
