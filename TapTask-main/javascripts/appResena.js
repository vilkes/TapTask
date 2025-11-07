document.addEventListener("DOMContentLoaded", () => {
    // Elementos del DOM
    console.log("JS de resenas cargado");
    const resenaInput = document.getElementById("opinion"); // textarea o input del comentario
    const enviarBtn = document.getElementById("btnPublicarOpinion"); // botón para enviar la resena
    let idProveedor = null;
    const observer = new MutationObserver(() => {
        const linkProveedor = document.getElementById("linkChatProveedor");
        if (linkProveedor) {
            idProveedor = linkProveedor.dataset.id;
            console.log("Elemento detectado ✅ ID del proveedor:", idProveedor);
            observer.disconnect();
        }
    });
    observer.observe(document.body, { childList: true, subtree: true });
    // Al hacer clic en el botón de enviar resena
    enviarBtn.addEventListener("click", async (e) => {
        console.log("Enviando resena...");
        const servicioInput = document.getElementById("idServicio");
        if (!servicioInput) {
            console.error("No se encontró el ID del servicio 😩");
            return;
        };

        e.preventDefault(); // Evita que recargue la página
        const rating = document.querySelector('input[name="rating"]:checked');
        const opinion = resenaInput.value.trim();

        // Validaciones básicas
        if (!rating) {
            alert("Por favor seleccioná una calificación ⭐");
            return;
        }
        if (opinion === "") {
            alert("Por favor escribí una resena 📝");
            return;
        }
        console.log("preparando apra resenar");
        
        // Enviar la resena al servidor (API PHP)
        try {
            console.log(rating.value + " " + opinion + " " + servicioInput.value);
            const resp = await fetch("../apis/apiSubirResena.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                rating: rating.value,
                opinion: opinion,
                servicioId: servicioInput.value
                })
            });
            const data = await resp.json();
            console.log(data);
            if (data.success) {
                resenaInput.value = "";
                const radios = document.querySelectorAll('input[name="rating"]');
                radios.forEach(r => r.checked = false);
            }

        } catch (error) {
            console.error("Error al enviar resena:", error);
            alert("Ocurrió un error al guardar la resena.");
        }
    });
});