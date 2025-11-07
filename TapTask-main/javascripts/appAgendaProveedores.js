class Agenda {
    constructor() {
        this.currentDate = new Date();
        this.currentDate.setHours(0, 0, 0, 0);

        this.popupMonth = this.currentDate.getMonth();
        this.popupYear = this.currentDate.getFullYear();

        this.eventos = []; // Se cargarán desde la BD

        // binding para manejo global de cierre de menús
        this._boundCloseMenus = this._closeAllMenus.bind(this);

        this.init();
        this.cargarEventosDesdeBD();
    }

    async cargarEventosDesdeBD() {
        try {
            const response = await fetch("../apis/apiDetectarReserva.php");
            const data = await response.json();
            this.eventos = data;
            this.updateView();
        } catch (error) {
            console.error("Error cargando eventos:", error);
        }
    }

    init() {
        document.getElementById('prev-day-box').addEventListener('click', () => this.changeDay(-1));
        document.getElementById('next-day-box').addEventListener('click', () => this.changeDay(1));
        document.getElementById('current-date').addEventListener('click', (e) => {
            e.stopPropagation();
            this.toggleCalendar();
        });

        // Listener para cerrar popup calendario si se clickea fuera
        document.addEventListener('click', (e) => {
            const popup = document.querySelector('.calendar-popup');
            if (popup && popup.style.display === 'block' && !popup.contains(e.target) && e.target.id !== 'current-date') {
                popup.style.display = 'none';
            }
        });

        // Listener global para cerrar menús de opciones (uno solo)
        document.addEventListener('click', this._boundCloseMenus);

        this.updateView();
    }

    _closeAllMenus(e) {
        // si el click vino de un .event-options o su menú, no cerrar (se gestiona en el toggle)
        if (e && (e.target.closest && e.target.closest('.event-options'))) return;
        const menus = document.querySelectorAll('.options-menu.active');
        menus.forEach(m => m.classList.remove('active'));
    }

    formatDate(date) {
        let month = date.getMonth() + 1, day = date.getDate();
        if (month < 10) month = '0' + month;
        if (day < 10) day = '0' + day;
        return `${date.getFullYear()}-${month}-${day}`;
    }

    formatDateBox(date) {
        const dayNames = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
        const monthNames = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
        return `
            <div class="day-name">${dayNames[date.getDay()]}</div>
            <div class="day-number">${date.getDate()}</div>
            <div class="month-name">${monthNames[date.getMonth()]}</div>
        `;
    }

    changeDay(offset) {
        const newDate = new Date(this.currentDate);
        newDate.setDate(newDate.getDate() + offset);
        if (newDate.getFullYear() < 2025) return;
        this.currentDate = newDate;
        this.popupMonth = this.currentDate.getMonth();
        this.popupYear = this.currentDate.getFullYear();
        this.updateView();
    }

    updateView() {
        document.getElementById('current-date').innerHTML = this.formatDateBox(this.currentDate);
        document.getElementById('agenda-year').textContent = this.currentDate.getFullYear();

        const prevDate = new Date(this.currentDate); prevDate.setDate(prevDate.getDate() - 1);
        const nextDate = new Date(this.currentDate); nextDate.setDate(nextDate.getDate() + 1);

        document.getElementById('prev-day-box').innerHTML = this.formatDateBox(prevDate);
        document.getElementById('next-day-box').innerHTML = this.formatDateBox(nextDate);

        this.renderEvents();
        this.renderCalendarPopup();
    }

    renderEvents() {
        const eventsContainer = document.getElementById('agenda-events');
        const historyContainer = document.getElementById('agenda-history');
        eventsContainer.innerHTML = '';
        historyContainer.innerHTML = '';

        const todayStr = this.formatDate(this.currentDate);

        // Incluir 'pendiente' como posible en_curso si la fecha coincide con hoy
        const eventosHoy = this.eventos.filter(ev => ev.date === todayStr && (ev.estado === "en_curso" || ev.estado === "pendiente"));
        const historial = this.eventos.filter(ev => ev.estado === "completado");
        const retrasados = this.eventos.filter(ev => ev.estado === "retrasado");

        if (eventosHoy.length === 0 && retrasados.length === 0) {
            eventsContainer.innerHTML = '<p>No hay pedidos en curso para este día.</p>';
        } else {
            eventosHoy.forEach(ev => this.crearCartaEvento(ev, eventsContainer));
            // mostrar retrasados también (si los hay) al final de la lista de en curso
            retrasados.forEach(ev => this.crearCartaEvento(ev, eventsContainer, true));
        }

        if (historial.length === 0) {
            historyContainer.innerHTML = '<p>No hay pedidos completados.</p>';
        } else {
            historial.forEach(ev => {
                const div = document.createElement('div');
                div.classList.add('event-item');
                div.style.backgroundColor = '#87CEFA';
                div.innerHTML = `
                    <div class="event-title">Pedido de ${ev.user}</div>
                    <div class="event-product">Producto: ${ev.product}</div>
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
            <div class="event-product">Producto: ${ev.product}</div>
            <div class="event-time">Horario: ${ev.time || '—'}</div>
        `;

        const optionsBtn = document.createElement('div');
        optionsBtn.classList.add('event-options');
        optionsBtn.textContent = '⋮';
        div.appendChild(optionsBtn);

        const menu = document.createElement('div');
        menu.classList.add('options-menu');
        menu.innerHTML = `
            <div class="option-cancel">Cancelar pedido</div>
            <div class="option-complete">Completar pedido</div>
        `;
        div.appendChild(menu);

        // Toggle del menú usando clase 'active' (no se crean listeners globales repetidos)
        optionsBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            // cerrar otros menús antes de abrir éste
            this._closeAllMenus();
            menu.classList.toggle('active');
        });

        // Acciones del menú
        const btnCancel = menu.querySelector('.option-cancel');
        const btnComplete = menu.querySelector('.option-complete');

        btnCancel.addEventListener('click', async (e) => {
            e.stopPropagation();
            // validación: no permitir cancelar si está retrasado? (según tus reglas)
            if (ev.estado === 'retrasado') {
                alert('No se puede cancelar un pedido que está marcado como retrasado.');
                menu.classList.remove('active');
                return;
            }
            try {
                const res = await fetch("../apis/apiActualizarReserva.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `id=${encodeURIComponent(ev.idreserva)}&accion=cancelar`
                });
                const result = await res.json();
                alert(result.message);
                this.cargarEventosDesdeBD();
            } catch (err) {
                console.error(err);
                alert('Error al cancelar.');
            } finally {
                menu.classList.remove('active');
            }
        });

        btnComplete.addEventListener('click', async (e) => {
            e.stopPropagation();
            try {
                const res = await fetch("../apis/apiActualizarReserva.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `id=${encodeURIComponent(ev.idreserva)}&accion=completar`
                });
                const result = await res.json();
                alert(result.message);
                this.cargarEventosDesdeBD();
            } catch (err) {
                console.error(err);
                alert('Error al completar.');
            } finally {
                menu.classList.remove('active');
            }
        });

        contenedor.appendChild(div);
    }

    toggleCalendar() {
        const popup = document.querySelector('.calendar-popup');
        popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
    }

    changePopupMonth(offset) {
        this.popupMonth += offset;
        if (this.popupMonth < 0) { this.popupMonth = 11; this.popupYear--; }
        if (this.popupMonth > 11) { this.popupMonth = 0; this.popupYear++; }
        if (this.popupYear < 2025) { this.popupYear = 2025; this.popupMonth = 0; }
        this.renderCalendarPopup();
    }

    renderCalendarPopup() {
        const popup = document.querySelector('.calendar-popup');
        popup.innerHTML = '';
        popup.addEventListener('click', e => e.stopPropagation());

        const monthNames = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
        const month = this.popupMonth, year = this.popupYear;
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        const header = document.createElement('div');
        header.id = 'calendar-header';
        const prevBtn = document.createElement('button');
        prevBtn.textContent = '<';
        prevBtn.addEventListener('click', e => { e.stopPropagation(); this.changePopupMonth(-1); });
        const nextBtn = document.createElement('button');
        nextBtn.textContent = '>';
        nextBtn.addEventListener('click', e => { e.stopPropagation(); this.changePopupMonth(1); });
        const title = document.createElement('span');
        title.textContent = `${monthNames[month]} ${year}`;
        header.appendChild(prevBtn); header.appendChild(title); header.appendChild(nextBtn);
        popup.appendChild(header);

        const daysGrid = document.createElement('div'); daysGrid.id = 'calendar-days';
        for (let i = 0; i < firstDay; i++) daysGrid.appendChild(document.createElement('div'));
        for (let d = 1; d <= lastDate; d++) {
            const dayDiv = document.createElement('div'); dayDiv.classList.add('calendar-day');
            if (d === this.currentDate.getDate() && month === this.currentDate.getMonth() && year === this.currentDate.getFullYear())
                dayDiv.classList.add('selected');
            dayDiv.textContent = d;
            const dayStr = `${year}-${(month + 1).toString().padStart(2, '0')}-${d.toString().padStart(2, '0')}`;
            if (this.eventos.some(ev => ev.date === dayStr)) {
                const indicator = document.createElement('div');
                indicator.classList.add('event-indicator');
                dayDiv.appendChild(indicator);
            }
            dayDiv.addEventListener('click', e => {
                e.stopPropagation();
                this.currentDate = new Date(year, month, d);
                this.popupMonth = month;
                this.popupYear = year;
                this.updateView();
                this.toggleCalendar();
            });
            daysGrid.appendChild(dayDiv);
        }
        popup.appendChild(daysGrid);
    }
}

document.addEventListener('DOMContentLoaded', () => new Agenda());