document.addEventListener("DOMContentLoaded", async () => {
    try {
        const resp = await fetch("../apis/apiEstadoSesion.php");
        const data = await resp.json();

        const btnLogin = document.getElementById("btnLogin");
        const btnRegistro = document.getElementById("btnRegistro");
        const btnLogout = document.getElementById("btnLogout");
        const btnPerfil = document.getElementById("btnPerfil");
        const linkPerfil = document.getElementById("linkPerfil");

        console.log(data);
        if (data.logeado) {
            if (btnLogin) btnLogin.style.display = "none";
            if (btnRegistro) btnRegistro.style.display = "none";
            if (btnLogout) btnLogout.style.display = "block";
            if (btnPerfil) btnPerfil.style.display = "block";
            if (btnPerfil) {
                if (data.tipo === "proveedor") {
                    linkPerfil.setAttribute("href", "../vistas/vistaPerfilEmpresa.php");
                } else if (data.tipo === "cliente") {
                    linkPerfil.setAttribute("href", "../vistas/vistaPerfilCliente.php");
                }
            }
        } else {
            if (btnLogin) btnLogin.style.display = "block";
            if (btnRegistro) btnRegistro.style.display = "block";
            if (btnLogout) btnLogout.style.display = "none";
            if (btnPerfil) btnPerfil.style.display = "none";
        }
    } catch (error) {
        console.error("Error comprobando sesión: ", error);
    }
<<<<<<< HEAD
});
=======
});
>>>>>>> b7ede9e (Avances en chat)
