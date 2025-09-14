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

        info.innerHTML = `
            <h2>${data.titulo}</h2>
            <p>Descripición:  ${data.descripcion}</p>
            <p>Descripición:  ${data.etiquetas}</p>
            <p>Ubicacion:  ${data.ubicacion}</p>
            <div class="precio">Precio: $${data.precio}</div>
            <button id="btnComprar">Reservar</button>
            </a>
        `;
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
            showToast("Servicio adquirido correctamente 🐎💯");
        });
        console.log(data);
    } catch (error) {
        console.error("Error al cargar servicio:", error);
    }
}

const params = new URLSearchParams(window.location.search);
const idServicio = params.get("id");
if (idServicio) {
    cargarServicio(idServicio);
}
/*<h2>${data.titulo}</h2>
<p>${data.descripcion}</p>
<div class="precio">Precio: $${data.precio}</div>
<button id="btnComprar">Comprar</button> */