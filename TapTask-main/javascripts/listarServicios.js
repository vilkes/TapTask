async function cargarServicios() {
    try {
        const titulo = document.getElementById("buscarNombre").value;
        const categoria = document.getElementById("filtroCategoria").value;
        const precioMmin = document.getElementById("precioMin").value;
        const precioMax = document.getElementById("precioMax").value;

        // Construir la query string
        const query = new URLSearchParams({
            accion: "listar",
            titulo,       
            etiquetas: categoria, 
            precio_min: document.getElementById("precioMin").value,
            precio_max: document.getElementById("precioMax").value
        });

        const res = await fetch("../apis/apiServicio.php?" + query.toString());
        const data = await res.json();

        const container = document.getElementById("serviciosContainer");
        container.innerHTML = "";
        if (data.length === 0) {
            container.innerHTML = "<p>No se encontraron servicios.</p>";
            return;
        }

        data.forEach(servicio => {
            const div = document.createElement("div");
            div.classList.add("carta");
            console.log(servicio);
            div.innerHTML = `
                <div class="imagen-contenedor"><img src="${servicio.imagenes[0].imagenes}" alt="Imagen del servicio"></div>
                <div class="titulo">${servicio.titulo}</div>
                <div class="precio">$${servicio.precio}</div>
                <a href="../vistas/vistaServicio.html?id=${servicio.idservice}" class="btn-ver-detalle">Ver detalle</a>
                `;
            container.appendChild(div);
        });
    } catch (error) {
        console.error("Error al cargar servicios:", error);
    }
}
document.getElementById("buscarNombre").addEventListener("input", cargarServicios);
document.getElementById("filtroCategoria").addEventListener("change", cargarServicios);
document.getElementById("precioMin").addEventListener("input", cargarServicios);
document.getElementById("precioMax").addEventListener("input", cargarServicios);
cargarServicios();