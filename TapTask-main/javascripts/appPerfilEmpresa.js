fetch("../apis/apiDatosEmpresa.php")
  .then(res => res.text()) 
  .then(txt => {
    console.log("Respuesta cruda de la API:", txt); 

    try {
      const data = JSON.parse(txt);  // intentamos convertir a JSON
      console.log("Parseado:", data);

      if (data.error) {
        console.error(data.error);
        return;
      }
        document.getElementById("nombreUsuario").value = data.usuario?.nombreUsuario || "";
        document.getElementById("email").value = data.empresa?.email_em || "";
        document.getElementById("razonSocial").value = data.empresa?.empresa_asociada || "";
        document.getElementById("nombre").value = data.empresa?.rut || "";
        document.getElementById("Rubro").value = data.empresa?.rubro_sector || "";
        document.getElementById("telefono").value = data.telefono?.telefonos || "";
      const img = document.getElementById("fotoPerfil");
      img.src = data.empresa?.foto_logo || "../imagenesGNRL/defaultprofilepic.png";

    } catch (e) {
      console.error("El texto no es JSON válido:", e);
      console.log("Texto recibido:", txt);
    }
  })
  .catch(err => console.error("Error cargando datos:", err));