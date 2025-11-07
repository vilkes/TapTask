class HistorialClientes {
    constructor() {
        this.currentDate = new Date();
        this.eventos = [];
        this.init();
        this.cargarEventosDesdeBD();
    }

    async cargarEventosDesdeBD() {
        try {
            const response = await fetch("../apis/apiDetectarReserva.php");
            const data = await response.json();

            // Filtrar solo los eventos del usuario logueado
            this.eventos = data.filter(ev => ev.user_id === USUARIO_ID || ev.iduser_reserva == USUARIO_ID);

            this.updateView();
        } catch (error) {
            console.error("Error cargando eventos:", error);
        }
    }

    init() {
        this.updateView();
    }

    updateView() {
        const eventsContainer = document.getElementById('agenda-events');
        const historyContainer = document.getElementById('agenda-history');
        eventsContainer.innerHTML = '';
        historyContainer.innerHTML = '';

        const todayStr = this.formatDate(this.currentDate);

        // Separar eventos según estado
        const eventosHoy = this.eventos.filter(ev => ev.date === todayStr && (ev.estado === "en_curso" || ev.estado === "pendiente"));
        const historial = this.eventos.filter(ev => ev.estado === "completado");
        const retrasados = this.eventos.filter(ev => ev.estado === "retrasado");

        // Eventos en curso
        if (eventosHoy.length === 0 && retrasados.length === 0) {
            eventsContainer.innerHTML = '<p>No hay servicios en curso para este día.</p>';
        } else {
            eventosHoy.forEach(ev => this.crearCartaEvento(ev, eventsContainer));
            retrasados.forEach(ev => this.crearCartaEvento(ev, eventsContainer, true));
        }

        // Historial
        if (historial.length === 0) {
            historyContainer.innerHTML = '<p>No hay servicios completados.</p>';
        } else {
            historial.forEach(ev => {
                const div = document.createElement('div');
                div.classList.add('event-item');
                div.style.backgroundColor = '#87CEFA';
                div.innerHTML = `
                    <div class="event-title">Pedido de ${ev.user}</div>
                    <div class="event-product">Servicio: ${ev.product}</div>
                    <div class="event-time">Completado: ${ev.fecha_final || '—'}</div>
                `;
                historyContainer.appendChild(div);
            });
        }
    }

    crearCartaEvento(ev, contenedor, retrasado = false) {
        const div = document.createElement('div');
        div.classList.add('event-item');
        if (retrasado) div.classList.add('retrasado');

        div.innerHTML = `
            <div class="event-title">Pedido de ${ev.user}</div>
            <div class="event-product">Servicio: ${ev.product}</div>
            <div class="event-time">Horario: ${ev.time || '—'}</div>
        `;

        contenedor.appendChild(div);
    }

    formatDate(date) {
        let month = date.getMonth() + 1, day = date.getDate();
        if (month < 10) month = '0' + month;
        if (day < 10) day = '0' + day;
        return `${date.getFullYear()}-${month}-${day}`;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (!USUARIO_ID) {
        console.warn("Usuario no logueado");
        return;
    }
    new HistorialClientes();
});