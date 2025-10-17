document.getElementById('form-servicio').addEventListener('submit', function(e) {
    const titulo = document.getElementById('titulo').value.trim();
    const descripcion = document.getElementById('descripcion').value.trim();
    const precio = document.getElementById('precio').value.trim();
    const disponibilidad = document.getElementById('disponibilidad').value;
    const departamento = document.getElementById('departamento').value.trim();
    const localidad = document.getElementById('localidad').value.trim();
    const barrio = document.getElementById('barrios').value;
    const calle = document.getElementById('calle').value.trim();
    const numero = document.getElementById('numero').value.trim();

    if (!titulo || !descripcion || !precio || !disponibilidad || !departamento || !localidad || !barrio || !calle || !numero) {
        alert("Todos los campos son obligatorios.");
        e.preventDefault(); // Detiene el envío del formulario
    }

    if (isNaN(precio) || parseFloat(precio) <= 0) {
        alert("Por favor ingresa un precio válido.");
        e.preventDefault();
    }
});