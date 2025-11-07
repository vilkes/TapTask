document.addEventListener("DOMContentLoaded", () => {
async function cargarServicio(id) {
    try {
        const query = new URLSearchParams({ accion: "obtener", id: id });
        const res = await fetch("../apis/apiServicio.php?" + query.toString());
        const data = await res.json();

        const carousel = document.querySelector('.carousel');
        const informacion = document.getElementById("info");

        if (data.error) {
            const defaultImg = "../imagenesGNRL/fondos/default.png";
            carousel.innerHTML = `<img class="carousel-image active" src="${defaultImg}">`;
            return;
        }

        // Carousel
        let carouselHTML = `<button class="prev">&#10094;</button>`;
        if (data.servicio.imagenes && data.servicio.imagenes.length > 0) {
            data.servicio.imagenes.forEach((imgObj, index) => {
                carouselHTML += `<img class="carousel-image ${index === 0 ? 'active' : ''}" src="${imgObj.imagenes}">`;
            });
        } else {
            carouselHTML += `<img class="carousel-image active" src="../imagenesGNRL/fondos/default.png">`;
        }
        carouselHTML += `<button class="next">&#10095;</button>`;
        carousel.innerHTML = carouselHTML;

        // Info del servicio
        let html = '';
        if (data.servicio.titulo) html += `<h2>${data.servicio.titulo}</h2>`;
        if (data.servicio.descripcion) html += `<p>Descripción: ${data.servicio.descripcion}</p>`;
        if (data.servicio.etiquetas) html += `<p>Categoría: ${data.servicio.etiquetas}</p>`;
        if (data.servicio.ubicacion) html += `<p>Ubicación: ${data.servicio.ubicacion}</p>`;
        if (data.servicio.tiposervicio) html += `<p>Tipo de servicio: ${data.servicio.tiposervicio}</p>`;
        if (data.servicio.duracion) html += `<p>Duración: ${data.servicio.duracion}</p>`;
        if (data.usuario.nombreUsuario) html += `<a href="#" id="linkChatProveedor" data-id="${data.servicio.iduser_servicio}">
        <p>Proveedor: ${data.usuario.nombreUsuario}</p></a>`;
        if (data.precio) html += `<div class="precio">Precio: $${data.precio}</div>`;
        html += `
        <form id="reservaForm" method="POST" action="../controladores/controladorReserva.php">
            <label for="fechaReserva">Selecciona fecha y hora:</label>
            <input type="datetime-local" id="fechaReserva" name="fechaReserva" min="<?= date('Y-m-d\TH:i') ?>">
            <input type="hidden" id="idService" name="idService" value="${data.idservice}">
            <button id="btnComprar" type="submit">Reservar</button>
        </form>`;
        informacion.innerHTML = html;

        // Click en link de chat → crear chat y redirigir
// Click en link de chat → crear chat y agregar contacto al widget
const linkChat = document.getElementById("linkChatProveedor");
const idCliente = document.getElementById("idCliente").value;

if (linkChat) {
    linkChat.addEventListener("click", async (e) => {
        e.preventDefault();
        const idProveedor = linkChat.dataset.id;

        try {
            const resp = await fetch(`../apis/apiCrearChat.php`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ iduser1: idCliente, iduser2: idProveedor })
            });

            const dataChat = await resp.json();

            if (dataChat.success) {
                const idChat = dataChat.idchat;
                const nombreProveedor = linkChat.textContent.replace("Proveedor: ", "").trim();

                // ⚡ Agregar el chat como contacto en el widget
                agregarContacto(nombreProveedor, idChat);

                // Seleccionar el chat recién creado
                const contactList = document.getElementById("contact-list");
                const contactoDiv = Array.from(contactList.children)
                    .find(c => c.textContent.trim() === nombreProveedor);
                if (contactoDiv) seleccionarChat(idChat, nombreProveedor, contactoDiv);

            } else {
                alert(dataChat.error || "Error al crear el chat");
            }
        } catch (err) {
            console.error("Error al crear chat:", err);
            alert("Hubo un error al iniciar el chat");
        }
    });
}

        initCarousel();

    } catch (error) {
        console.error("Error al cargar servicio:", error);
    }
}

const params = new URLSearchParams(window.location.search);
const idServicio = params.get("id");
if (idServicio) cargarServicio(idServicio);

function initCarousel() {
    const prevBtn = document.querySelector('.carousel .prev');
    const nextBtn = document.querySelector('.carousel .next');
    const images = document.querySelectorAll('.carousel-image');
    let currentIndex = 0;

    function showImage(index) {
        images.forEach((img, i) => img.classList.toggle('active', i === index));
    }

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    });
}
});