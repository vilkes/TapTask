let data = [];

    // 🔹 Leemos el CSV desde la ruta del servidor
    Papa.parse("../assets/localidades-29-7nm.csv", { // <-- poné la ruta correcta
      download: true,   // ⚡ obligatorio para leer desde URL
      header: true,
      skipEmptyLines: true,
      complete: function(results) {
        data = results.data; 
        cargarDepartamentos(data);
      }
    });

    function cargarDepartamentos(datos) {
      const depSelect = document.getElementById("departamento");
      const departamentos = [...new Set(datos.map(item => item.departamento))]; // únicos

      departamentos.forEach(dep => {
        let option = document.createElement("option");
        option.value = dep;
        option.textContent = dep;
        depSelect.appendChild(option);
      });
    }

    document.getElementById("departamento").addEventListener("change", function() {
      const locSelect = document.getElementById("localidad");
      locSelect.innerHTML = "<option value=''>-- Selecciona una localidad --</option>";

      const depSeleccionado = this.value;
      const localidades = data
        .filter(item => item.departamento === depSeleccionado)
        .map(item => item.localidad);

      localidades.forEach(loc => {
        let option = document.createElement("option");
        option.value = loc;
        option.textContent = loc;
        locSelect.appendChild(option);
      });
    });