document.addEventListener("DOMContentLoaded", async () => {
    try {
        const resp = await fetch("../apis/apiReservasEmpresa.php");
        const data = await resp.json();

        console.log(data); // Depuración

        if (data.success) {
            const cont = document.getElementById("contenedorReservas");

            if (data.reservas.length === 0) {
                cont.innerHTML = "<p>No tienes reservas aún.</p>";
                return;
            }

            data.reservas.forEach(reserva => {
                const div = document.createElement("div");
                div.classList.add("card-reserva");
                // Determinar el estado de la reserva
                let estado = "Pendiente";
                if (reserva.cancelacion) estado = "Cancelada";
                else if (reserva.confirmacion) estado = "Confirmada";
                // Formatear fechas
                const inicio = new Date(reserva.fecha_inicio).toLocaleString();
                const fin = new Date(reserva.fecha_final).toLocaleString();
                console.log(reserva);
                div.innerHTML = `
                    <h3>${reserva.servicio.titulo}</h3>
                    <p><strong>Cliente:</strong> ${reserva.usuario.nombreUsuario} </p>
                    <p><strong>Precio:</strong> $${reserva.servicio.precio}</p>
                    <p><strong>Inicio:</strong> ${inicio}</p>
                    <p><strong>Fin:</strong> ${fin}</p>
                    <p><strong>Estado:</strong><span class="estado"> ${estado}</span></p>
                    <p><strong>ID Reserva:</strong> ${reserva.idreserva}</p>
                    <hr>
                `;
                console.log("ID que voy a enviar:", reserva.idreserva);

                if (estado === "Confirmada" || estado  === "Pendiente"){
                    const btnCancelar = document.createElement("button");
                    btnCancelar.textContent = "Cancelar";
                    btnCancelar.classList.add("btn-cancelar");
                    // Evento click para cancelar reserva

                    btnCancelar.addEventListener("click", async () => {
                        const cancelar  = confirm(`¿Cancelar la reserva #${reserva.idreserva}?`);
                        if (!cancelar) return;
                        try {
                            const resp = await fetch("../apis/apiCancelarReserva.php", {
                                method: "POST",
                                headers: { "Content-Type": "application/json" },
                                body: JSON.stringify({ idreserva: reserva.idreserva })
                            });

                            const result = await resp.json();
                            if (result.success) {
                                alert("Reserva cancelada");
                                div.querySelector(".estado").textContent = "Cancelada";
                                btnCancelar.remove();
                            } else {
                                console.log(result);
                                alert("Error: " + result.mensaje);
                            }
                        } catch (error) {
                            console.error("Error al cancelar:", error);
                            alert("Hubo un error al cancelar la reserva");
                        }
                    })
                    div.appendChild(btnCancelar);

                }
                if (estado === "Pendiente") {
                    const btnConfirmar = document.createElement("button");
                    btnConfirmar.textContent = "Confirmar";
                    btnConfirmar.classList.add("btn-confirmar");
                    // Evento click para confirmar reserva
                    btnConfirmar.addEventListener("click", async () => {
                        const confirmar = confirm(`¿Confirmar la reserva #${reserva.idreserva}?`);
                        if (!confirmar) return;
                        try {
                            const resp = await fetch("../apis/apiConfirmarReserva.php", {
                                method: "POST",
                                headers: { "Content-Type": "application/json" },
                                body: JSON.stringify({ idreserva: reserva.idreserva })
                            });
                            const result = await resp.json();
                            if (result.success) {
                                alert("Reserva confirmada");
                                div.querySelector(".estado").textContent = "Confirmada";
                                btnConfirmar.remove();
                            } else {
                                console.log(result);
                                alert("Error: " + result.mensaje);
                            }
                        } catch (error) {
                            console.error("Error al confirmar:", error);
                            alert("Hubo un error al confirmar la reserva");
                        }
                    });
                    div.appendChild(btnConfirmar);
                }
                cont.appendChild(div);
            });
        } else {
            console.error(data.mensaje);
        }
    } catch (error) {
        console.error("Error al cargar las reservas:", error);
    }
});
