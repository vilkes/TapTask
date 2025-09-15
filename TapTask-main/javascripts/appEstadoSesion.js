document.addEventListener("DOMContentLoaded", async () => {
    try {
        const resp = await fetch("../apis/apiEstadoSesion.php");
        const data = await resp.json();

        const btnLogin = document.getElementById("btnLogin");
        const btnRegistro = document.getElementById("btnRegistro");
        const btnLogout = document.getElementById("btnLogout");
        console.log(data);
        if (data.logeado) {
            if (btnLogin) btnLogin.style.display = "none";
            if (btnRegistro) btnRegistro.style.display = "none";
            if (btnLogout) btnLogout.style.display = "block";
        } else {
            if (btnLogin) btnLogin.style.display = "block";
            if (btnRegistro) btnRegistro.style.display = "block";
            if (btnLogout) btnLogout.style.display = "none";
        }
    } catch (error) {
        console.error("Error comprobando sesión: ", error);
    }
});