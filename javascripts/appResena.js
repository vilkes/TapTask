document.addEventListener("DOMContentLoaded", () => {
    // Elementos del DOM
    console.log("JS de reseñas cargado");
    const reseñaInput = document.getElementById("opinion"); // textarea o input del comentario
    const enviarBtn = document.getElementById("enviarReseña"); // botón para enviar la reseña
    // Al hacer clic en el botón de enviar reseña
    enviarBtn.addEventListener("click", async (e) => {
        const servicioInput = document.getElementById("idService");
        if (!servicioInput) {
            console.error("No se encontró el ID del servicio 😩");
            return;
        };

        e.preventDefault(); // Evita que recargue la página
        const rating = document.querySelector('input[name="rating"]:checked');
        const opinion = reseñaInput.value.trim();

        // Validaciones básicas
        if (!rating) {
            alert("Por favor seleccioná una calificación ⭐");
            return;
        }
        if (opinion === "") {
            alert("Por favor escribí una reseña 📝");
            return;
        }
        console.log("preparando apra reseñar");
        
        // Enviar la reseña al servidor (API PHP)
        try {
            console.log(rating.value + " " + opinion + " " + servicioInput.value);
            const resp = await fetch("http://localhost/TapTask-main10102025/TapTask-main/apis/apiSubirResena.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                rating: rating.value,
                opinion: opinion,
                servicioId: servicioInput.value
                })
            });
            const data = await resp.json();
            alert(data.msg);
            console.log(data);
            if (data.success) {
                reseñaInput.value = "";
                const radios = document.querySelectorAll('input[name="rating"]');
                radios.forEach(r => r.checked = false);
            }

        } catch (error) {
            console.error("Error al enviar reseña:", error);
            alert("Ocurrió un error al guardar la reseña.");
        }
    });
});