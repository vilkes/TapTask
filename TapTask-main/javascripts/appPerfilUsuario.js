fetch("../apis/apiPerfilUsuario.php")
  .then(res => res.text()) 
  .then(txt => {
    console.log("Respuesta cruda de la API:", txt); 

    try {
      const data = JSON.parse(txt);  // intentamos convertir a JSON
      console.log("Parseado:", data);

      // ---- acá va tu código normal ----
      if (data.error) {
        console.error(data.error);
        return;
      }
      document.getElementById("nombreUsuario").value = data.usuario?.nombreUsuario || "";
      document.getElementById("email").value = data.cliente?.email_cl || "";
      document.getElementById("nombre").value = data.cliente?.nombre || "";
      document.getElementById("apellido").value = data.cliente?.apellido || "";
      document.getElementById("fechaNacimiento").value = data.cliente?.fecha_nacimiento || "";
      document.getElementById("telefono").value = data.telefono?.telefonos || "";

      const img = document.getElementById("fotoPerfil");
      img.src = data.cliente?.foto_perfil || "../imagenesGNRL/defaultprofilepic.png";

    } catch (e) {
      console.error("El texto no es JSON válido:", e);
    }
  })
  .catch(err => console.error("Error cargando datos:", err));

  