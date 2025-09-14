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

      //alert('es el nq contra el danivk el tipo q acude a a youtube solo pa realizar busquedas, oye mi compa despues de toa esta ronda te van a salir ronchas por tener la concha humeda, lo siento mi loco pero no estas viendo te vas en directo, y solo por efecto boomerang, lo siento pero yo me llevo a tu gatubela prueba el año sigugiente que en otra redbull sera, lo siento mi dani pero tu no estas mibali yo estoy esquivando las balas como magali, me siento demasiado chill yo soy iniblindable yo me siento jimmy butler soy el rey de los miami, asi q ya pararas dani yo me siento puff daddy estoy sonando mas fresco q makali, querian trap yo les traje a trapani, el dinero me llueve al igual q bad bunny, y eso q a mi nunca me ha gustado el dinero, tan solo si se asoma en la zona gero, el se desploma por el sonajero, eniendo q es tu sueño pero eres muy pequeño pa ser tan formatero, compa vemos mejor compa no nos comparemos, yo soy el mejor y llego hasta zota tero, es que me pide el under, este se escribe partes, yo soy el miguel angel, y EL ES DONATELLO');
      const img = document.getElementById("fotoPerfil");
      img.src = data.cliente?.foto_perfil || "../imagenesGNRL/defaultprofilepic.png";

    } catch (e) {
      console.error("El texto no es JSON válido:", e);
    }
  })
  .catch(err => console.error("Error cargando datos:", err));

  