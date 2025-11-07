document.addEventListener("DOMContentLoaded", () => {
    if (!document.getElementById("chat-widget")) return;

    idUser = document.getElementById("usuarioId").value;
    const urlParams = new URLSearchParams(window.location.search);
    idChat = urlParams.get("idchat");

    cargarContactosReales();

    const body = document.getElementById("chat-body");
    if (body) body.classList.remove("hidden");

    const inputArea = document.querySelector(".chat-input-container");
    if (inputArea) inputArea.classList.remove("hidden");

    iniciarIdleTimer();
});

let isExpanded = false;
let idChat;
let idUser;
let eventSource = null;
let ultimoId = 0;
const mensajesPorChat = {}; // { chatId: [ { idmensajes, contenido, emisor, idEmisor } ] }
let ultimoChatActivo = null;
let idleTimer = null;

function toggleChat() {
    const widget = document.getElementById("chat-widget");
    const body = document.getElementById("chat-body");
    const contactList = document.getElementById("contact-list");

    if (!isExpanded) {
        // Expandir widget
        widget.classList.remove("minimized");
        widget.classList.add("expanded");

        // Mostrar contactos y mensajes
        contactList.classList.remove("hidden");
        if (ultimoChatActivo) {
            body.classList.remove("hidden"); // mostrar mensajes del último chat activo
            ultimoChatActivo.div.classList.add("active");
        }

    } else {
        // Minimizar widget
        widget.classList.remove("expanded");
        widget.classList.add("minimized");

        // Ocultar solo la lista de contactos
        contactList.classList.add("hidden");

        // ⚡ Mantener visibles los mensajes del último chat
        if (ultimoChatActivo) {
            body.classList.remove("hidden");
        }
    }

    isExpanded = !isExpanded;
    resetIdleTimer();
}

// -------------------- SSE --------------------
function iniciarSSE() {
    if (!idChat) return;

    // cerrar la conexión anterior si existe
    if (eventSource) {
        try { eventSource.close(); } catch (e) { /* ignore */ }
        eventSource = null;
    }

    // iniciar SSE con el último id de mensaje conocido
    eventSource = new EventSource(`../apis/apiStream.php?idchat=${idChat}&ultimo=${ultimoId}`);

    eventSource.onmessage = (event) => {
        try {
            const data = JSON.parse(event.data); // data: array de mensajes
            data.forEach(msg => {
                const idmens = msg.idmensajes ?? null;
                const chatIdMsg = msg.idchat;

                // ⚡ Si el chat no está en contact-list, agregar contacto automáticamente
                const lista = document.getElementById("contact-list");
                if (!Array.from(lista.children).some(c => c.dataset.id == chatIdMsg)) {
                    const nombre = msg.nombreUsuario ?? 'Desconocido';
                    agregarContacto(nombre, chatIdMsg);
                }

                // evitar procesar mensajes que ya tenemos en cache
                if (idmens && mensajesPorChat[chatIdMsg] && mensajesPorChat[chatIdMsg].some(m => m.idmensajes == idmens)) {
                    if (idmens > ultimoId) ultimoId = idmens;
                    return;
                }

                // mostrar mensaje en el DOM
                mostrarMensaje(
                    msg.contenido,
                    msg.nombreUsuario ?? 'Desconocido',
                    chatIdMsg,
                    msg.iduser_mensajes,
                    idmens,
                    { persist: true }
                );

                if (idmens && idmens > ultimoId) ultimoId = idmens;
            });
        } catch (e) {
            console.error("Error parseando SSE:", e);
        }

        resetIdleTimer();
    };

    eventSource.addEventListener("close", () => {
        try { eventSource.close(); } catch (e) {}
        eventSource = null;
        setTimeout(iniciarSSE, 500);
    });

    eventSource.onerror = () => {
        try { eventSource.close(); } catch (e) {}
        eventSource = null;
        setTimeout(iniciarSSE, 1000);
    };
}

async function enviar() {
    const input = document.getElementById("chat-input");
    const texto = input.value.trim();
    if (!texto) return;

    try {
        const resp = await fetch("../apis/apiEnviarMensaje.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ idchat: idChat, emisor: idUser, texto })
        });

        // si la ruta devuelve HTML por error, esto lanzará -> manejamos con try/catch
        const data = await resp.json();

        if (data.success && data.mensaje) {
            const msg = data.mensaje;
            // msg debe traer: idmensajes, contenido, iduser_mensajes, nombreUsuario, idchat
            mostrarMensaje(msg.contenido, msg.nombreUsuario ?? msg.username ?? 'Tú', msg.idchat ?? idChat, msg.iduser_mensajes, msg.idmensajes, { persist: true });
            input.value = "";
            // ajustar ultimoId para que SSE no reenvíe lo mismo
            if (msg.idmensajes && msg.idmensajes > ultimoId) ultimoId = msg.idmensajes;
        } else {
            console.error("Error al enviar mensaje:", data);
            alert("Error al enviar mensaje: " + (data.error || "respuesta inválida"));
        }
    } catch (err) {
        console.error("Error al enviar mensaje:", err);
        alert("Error al enviar mensaje (ver consola).");
    }

    resetIdleTimer();
}

/**
 * Mostrar mensaje en DOM.
 * options:
 *  - persist: si true, lo guarda en mensajesPorChat (por defecto true)
 *  - idmensajes: id del mensaje (puede venir del backend)
 */
function mostrarMensaje(texto, emisor, chatIdActual = idChat, idEmisor = null, idmensajes = null, options = { persist: true }) {
    if (!texto && texto !== "") return;

    const chat = document.getElementById("chat-messages");
    if (!chat) return;

    // Evitar duplicar en DOM si ya existe un elemento con ese idmensajes
    if (idmensajes && Array.from(chat.children).some(c => c.dataset.idmensajes == idmensajes)) {
        return;
    }

    const div = document.createElement("div");
    const esPropio = (idEmisor != null) ? (String(idEmisor) === String(idUser)) : (emisor === "Tú" || emisor === idUser);

    div.className = esPropio ? "msg self" : "msg other";
    div.textContent = `${esPropio ? "Tú" : emisor}: ${texto}`;
    if (idmensajes) div.dataset.idmensajes = idmensajes;
    chat.appendChild(div);
    chat.scrollTop = chat.scrollHeight;

    // Guardar en memoria por chat (solo si persist)
    if (options.persist) {
        if (!mensajesPorChat[chatIdActual]) mensajesPorChat[chatIdActual] = [];
        // evitar doble push por idmensajes si ya existe
        if (idmensajes && mensajesPorChat[chatIdActual].some(m => m.idmensajes == idmensajes)) return;
        mensajesPorChat[chatIdActual].push({
            idmensajes: idmensajes ?? null,
            contenido: texto,
            emisor: emisor,
            idEmisor: idEmisor
        });
    }
}

async function cargarMensajes(chatId) {
    try {
        const resp = await fetch(`../apis/apiListarMensajes.php?idchat=${chatId}`);
        const data = await resp.json();
        if (!data.success) return;

        const chat = document.getElementById("chat-messages");
        chat.innerHTML = "";
        mensajesPorChat[chatId] = [];

        // Guardar primero, renderizar sin volver a persistir (persist: false)
        data.mensajes.forEach(msg => {
            const idmens = msg.idmensajes ?? null;
            const contenido = msg.contenido ?? '';
            const idEmisor = msg.iduser_mensajes ?? null;
            const nombreUser = msg.nombreUsuario ?? msg.username ?? (idEmisor == idUser ? "Tú" : "Desconocido");

            // Guardar en cache una sola vez
            mensajesPorChat[chatId].push({
                idmensajes: idmens,
                contenido,
                emisor: nombreUser,
                idEmisor: idEmisor
            });

            // actualizar ultimoId
            if (idmens && idmens > ultimoId) ultimoId = idmens;
        });

        // Renderizar desde cache SIN volver a persistir (evita duplicados)
        mensajesPorChat[chatId].forEach(m => {
            mostrarMensaje(m.contenido, m.emisor, chatId, m.idEmisor, m.idmensajes, { persist: false });
        });

        chat.scrollTop = chat.scrollHeight;
    } catch (e) {
        console.error("Error cargando mensajes:", e);
    }
}
async function cargarContactosReales() {
    try {
        const resp = await fetch(`../apis/apiCrearChat.php?iduser=${idUser}`);
        const data = await resp.json();
        if (!data.success) return;

        data.chats.forEach(c => {
            const nombre = (c.iduser_1 == idUser) ? (c.nombre_2 ?? 'Contacto') : (c.nombre_1 ?? 'Contacto');
            agregarContacto(nombre, c.idchat);
        });
    } catch (e) {
        console.error("Error cargando contactos:", e);
    }
}
function agregarContacto(nombre, chatId) {
    const lista = document.getElementById("contact-list");
    if (!lista) return;

    // Evitar duplicados DOM
    if (Array.from(lista.children).some(c => c.dataset.id == chatId)) return;

    const contacto = document.createElement("div");
    contacto.className = "contact";
    contacto.dataset.id = chatId;
    contacto.textContent = nombre;
    contacto.onclick = () => seleccionarChat(chatId, nombre, contacto);
    lista.appendChild(contacto);
}

async function seleccionarChat(chatId, nombre, contactoDiv) {
    document.querySelectorAll(".contact").forEach(c => c.classList.remove("active"));
    contactoDiv.classList.add("active");

    // cerrar conexión SSE previa inmediatamente para evitar que lleguen mensajes duplicados
    if (eventSource) {
        try { eventSource.close(); } catch (e) {}
        eventSource = null;
    }

    idChat = chatId;
    ultimoChatActivo = { id: chatId, nombre, div: contactoDiv };

    const chat = document.getElementById("chat-messages");
    if (!chat) return;
    chat.innerHTML = "";

    // cargar mensajes desde la API si no los tenemos
    if (!mensajesPorChat[chatId] || mensajesPorChat[chatId].length === 0) {
        await cargarMensajes(chatId);
    } else {
        // renderizar desde cache (no persistir otra vez)
        mensajesPorChat[chatId].forEach(msg => {
            mostrarMensaje(msg.contenido, msg.emisor, chatId, msg.idEmisor, msg.idmensajes, { persist: false });
        });
    }

    // fijar ultimoId al mayor id de la cache para evitar que SSE nos reenvíe antiguos
    if (mensajesPorChat[chatId] && mensajesPorChat[chatId].length) {
        const max = mensajesPorChat[chatId].reduce((acc, m) => m.idmensajes && m.idmensajes > acc ? m.idmensajes : acc, ultimoId);
        if (max > ultimoId) ultimoId = max;
    }

    // iniciar SSE para este chat
    iniciarSSE();
    resetIdleTimer();
}

// -------------------- Idle --------------------
function iniciarIdleTimer() { resetIdleTimer(); }
function resetIdleTimer() {
    clearTimeout(idleTimer);
    idleTimer = setTimeout(() => {
        const widget = document.getElementById("chat-widget");
        if (!widget) return;
        if (!isExpanded) widget.classList.add("idle");
    }, 5000);
}

document.getElementById("chat-widget")?.addEventListener("mousemove", () => {
    const widget = document.getElementById("chat-widget");
    if (!widget) return;
    if (widget.classList.contains("idle")) widget.classList.remove("idle");
    resetIdleTimer();
});

document.getElementById("chat-widget")?.addEventListener("click", () => {
    const widget = document.getElementById("chat-widget");
    if (!widget) return;
    if (widget.classList.contains("idle")) widget.classList.remove("idle");
    resetIdleTimer();
});